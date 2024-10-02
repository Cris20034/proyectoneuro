from flask import Flask, render_template, request, redirect, url_for, session ,make_response
import psycopg2, re 
from werkzeug.security import generate_password_hash, check_password_hash
import mysql.connector
import psycopg2.extras
import random
from flask import Flask, request, session, redirect, url_for, render_template, flash
import string
from flask_mail import Mail, Message
#------------------------------------------

#_----------------------------------------
app = Flask(__name__)

app.secret_key = 'cairocoders-ednalan'

app.config['MAIL_SERVER'] = 'smtp.gmail.com'
app.config['MAIL_PORT'] = 587
app.config['MAIL_USE_TLS'] = True
app.config['MAIL_USERNAME'] = 'davidcisneros689@gmail.com'
app.config['MAIL_PASSWORD'] = 'tksl gyqp dovg pcvs'
mail = Mail(app)

#----------------------------------------
#____________________________________________________________________________________________
@app.route('/logout')  
def logout():
    session.clear()
    return redirect(url_for('home'))
#------------------------------------------------LOGIN--------------------------------------------------

@app.route('/')
def home():
    return render_template('rutas.html')
def get_db_connection():
    return mysql.connector.connect(
        host='localhost',
        database='db_n',
        user='angelo',
        password='angelo'
    )

@app.route('/register', methods=['GET', 'POST'])
def register():
    conexion = get_db_connection()
    cursor = conexion.cursor(dictionary=True)

    if request.method == 'POST':
        nombres = request.form.get('nombre')
        apellidos = request.form.get('apellido')
        contraseña = request.form.get('contraseña')
        correo = request.form.get('correo')
        cedula = request.form.get('cedula')
        telefono = request.form.get('telefono')
    
        _hashed_password = generate_password_hash(contraseña)

        try:
            cursor.execute('SELECT * FROM users WHERE cedula = %s', (cedula,))
            account = cursor.fetchone()
            
            cursor.execute('SELECT * FROM users WHERE correo = %s', (correo,))
            email_account = cursor.fetchone()

            if account:
                flash('El número de cédula se encuentra registrado')
            elif email_account:
                flash('Correo electrónico ya registrado!')
            elif not re.match(r'[^@]+@[^@]+\.[^@]+', correo):
                flash('Dirección de correo electrónico no válida!')
            elif not re.match(r'[A-Za-z0-9]+', correo):
                flash('El nombre de usuario debe contener solo caracteres y números!')
            elif not re.match(r'^\d{1,10}$', cedula):
                flash('La cédula debe contener solo números y tener hasta 10 dígitos!')
            elif not re.match(r'^\d{10}$', telefono):
                flash('El teléfono celular debe contener 10 dígitos!')
            elif not nombres or not apellidos or not contraseña or not correo or not cedula or not telefono:
                flash('Por favor rellena el formulario completamente!')
            else:
                    cursor.execute('SELECT id_roles FROM roles WHERE tipo_rol = "empleados"')
                    role_data = cursor.fetchone()

                    if not role_data:
                        flash('No se pudo encontrar el rol de consultor!')
                    else:
                        # Enviar el código de verificación por correo electrónico
                        verification_code = ''.join(random.choices(string.ascii_letters + string.digits, k=6))
                        msg = Message('Código de verificación', sender='davidcisneros689@gmail.com', recipients=[correo])
                        msg.body = f'Su código de verificación es {verification_code}.'
                        mail.send(msg)
                        # Guardar los datos en la sesión temporalmente
                        session['registration_data'] = {
                            'nombre': nombres,
                            'apellido': apellidos,
                            'contraseña': _hashed_password,
                            'correo': correo,
                            'cedula': cedula,
                            'telefono': telefono,
                            'verification_code': verification_code,
                            'id_roles': role_data['id_roles'], 
                        }
                        return redirect(url_for('verify_email'))

        except mysql.connector.Error as e:
            conexion.rollback()  # Rollback en caso de error
            flash(f'Ocurrió un error: {str(e)}')
        finally:
            cursor.close()

    return render_template('register.html')

@app.route('/verify_email', methods=['GET', 'POST'])
def verify_email():
    if request.method == 'POST':
        verification_code = request.form.get('verification_code')
        registration_data = session.get('registration_data')

        if registration_data and verification_code == registration_data['verification_code']:
            conexion = get_db_connection()
            cursor = conexion.cursor(dictionary=True)
            try:
                cursor.execute(""" 
                    INSERT INTO users (cedula, nombre, apellido, correo, contraseña, telefono, id_roles) 
                    VALUES (%s, %s, %s, %s, %s, %s, %s)""",
                    (registration_data['cedula'], registration_data['nombre'], registration_data['apellido'],
                    registration_data['correo'], registration_data['contraseña'], registration_data['telefono'], 
                    registration_data['id_roles']))

                conexion.commit()
                flash('Se ha registrado exitosamente!')
                return redirect(url_for('login'))
            except mysql.connector.Error as e:
                conexion.rollback() 
                flash(f'Ocurrió un error: {str(e)}')
            finally:
                cursor.close()
                conexion.close()
        else:
            flash('Código de verificación incorrecto!')

    return render_template('verify_email.html')



@app.route('/recuperar', methods=['GET', 'POST'])
def recuperar():
    if request.method == 'POST':
        step = session.get('step', 1)
        email = request.form.get('email')

        if step == 1:
            # Generar un código de verificación aleatorio
            verification_code = ''.join(random.choices(string.ascii_letters + string.digits, k=6))
            msg = Message('Código de verificación', sender='davidcisneros689@gmail.com', recipients=[email])
            msg.body = f'Su código de verificación es {verification_code}.'
            mail.send(msg)

            # Guardar código de verificación y correo en la sesión
            session['verification_code'] = verification_code
            session['email'] = email
            session['step'] = 2

            flash('El código de verificación ha sido enviado a su correo electrónico.', 'info')
            return render_template('recover_password.html', email=email, step=2)

        elif step == 2:
            codigo_ingresado = request.form['codigo']
            nuevo_password = request.form['password']
            confirmar_password = request.form['confirm_password']

            if codigo_ingresado == session.get('verification_code'):
                if nuevo_password == confirmar_password:
                    email = session.get('email')
                    hashed_password = generate_password_hash(nuevo_password, method='pbkdf2:sha256')

                    try:
                        connection = get_db_connection()
                        cursor = connection.cursor()

                        # Actualizar la contraseña en la base de datos
                        update_query = "UPDATE users SET contraseña = %s WHERE correo = %s"
                        cursor.execute(update_query, (hashed_password, email))
                        connection.commit()

                        # Comprobar si la contraseña fue actualizada correctamente
                        cursor.execute("SELECT contraseña FROM users WHERE correo = %s", (email,))
                        result = cursor.fetchone()

                        if result:
                            updated_password = result[0]
                            print(f"Contraseña actualizada: {updated_password}")

                            if updated_password == hashed_password:
                                flash('Su contraseña ha sido actualizada exitosamente.', 'success')
                                return redirect('/login')
                            else:
                                flash('Hubo un problema al actualizar la contraseña.', 'danger')
                        else:
                            flash('No se encontró el correo electrónico en la base de datos.', 'danger')

                    except Exception as e:
                        print(f"Error: {e}")
                        flash('Ocurrió un error al actualizar la contraseña. Inténtelo de nuevo.', 'danger')

                    finally:
                        cursor.close()
                        connection.close()
                else:
                    flash('Las contraseñas no coinciden.', 'danger')
            else:
                flash('Código de verificación incorrecto.', 'danger')

    else:
        session['step'] = 1
        email = ''

    return render_template('recover_password.html', email=email, step=session.get('step', 1))


@app.route('/login', methods=['GET', 'POST'])
def login():
    if request.method == 'POST':
        correo = request.form['correo']
        contraseña = request.form['contraseña']
        conection = get_db_connection()
        cursor = conection.cursor()
        cursor.execute("SELECT correo, contraseña, cedula, id_roles FROM users WHERE correo = %s", (correo,))
        user = cursor.fetchone()

        if user and check_password_hash(user[1], contraseña):
            cursor.execute("SELECT nombre, apellido,cedula,id_roles FROM users WHERE correo = %s", (correo,))
            user_data = cursor.fetchone()

            if user_data:
                session['correo'] = correo
                session['nombre'] = user_data[0]
                session['apellido'] = user_data[1]
                session['cedula'] = user[2]
                session['id_roles'] = user[3]

            cursor.close()

            return redirect(url_for('inicio'))

        else:
            conection.close()
            return render_template('login.html', error='Credenciales incorrectas')

    response = make_response(render_template('login.html'))
    response.headers['Cache-Control'] = 'no-cache, no-store, must-revalidate'
    response.headers['Pragma'] = 'no-cache'
    response.headers['Expires'] = '0'
    print(session)
    return response



@app.route('/base')
def base():
    nombre_usuario = session.get('nombre')
    apellidos_usuario = session.get('apellido')
    correo_usuario = session.get('correo')
    print(session)

    return render_template('base.html', nombre_usuario=nombre_usuario, apellidos_usuario=apellidos_usuario, correo_usuario=correo_usuario)

@app.route('/rutas')
def rutas():
    return render_template('rutas.html')

@app.route('/subscription')
def subscription():
    return render_template('subscription.html')

def es_cedula_valida(cedula):
    """Valida que la cédula tenga exactamente 10 dígitos numéricos."""
    return bool(re.match(r'^\d{10}$', cedula))

def es_celular_valido(telefono):
    """Valida que el celular tenga exactamente 10 dígitos numéricos."""
    return bool(re.match(r'^\d{10}$', telefono))

def es_correo_valido(correo):
    """Valida que el correo tenga un formato válido."""
    return bool(re.match(r'^[\w\.-]+@[\w\.-]+\.\w+$', correo))

@app.route('/configuracion', methods=['GET', 'POST'])
def configuracion():
    conexion = get_db_connection()
    cursor = conexion.cursor(dictionary=True)
    if request.method == 'POST':
        # Obtener datos del formulario
        cedula = request.form['cedula']
        nombres = request.form['nombre']
        apellidos = request.form['apellido']
        correo = request.form['correo']
        contraseña = request.form['contraseña']
        telefono = request.form['telefono']
        rol = request.form['rol']

        # Validaciones de campos
        if not es_cedula_valida(cedula):
            flash('La cédula debe tener exactamente 10 dígitos numéricos.')
            return redirect(url_for('configuracion'))  
        elif not es_correo_valido(correo):
            flash('El correo electrónico no tiene un formato válido.')
            return redirect(url_for('configuracion'))
        elif not es_celular_valido(telefono):
            flash('El número de teléfono debe tener exactamente 10 dígitos numéricos.')
            return redirect(url_for('configuracion'))
        else:
            try:
                # Iniciar conexión con la base de datos
                conexion = get_db_connection()
                cursor = conexion.cursor(dictionary=True)

                # Hash de la contraseña antes de almacenarla
                hashed_password = generate_password_hash(contraseña, method='pbkdf2:sha256')

                # Verificar si la cédula ya existe
                cursor.execute('SELECT * FROM users WHERE cedula = %s', (cedula,))
                cedula_existente = cursor.fetchone()

                # Verificar si el correo ya existe
                cursor.execute('SELECT * FROM users WHERE correo = %s', (correo,))
                correo_existente = cursor.fetchone()

                # Verificar si el teléfono ya existe
                cursor.execute('SELECT * FROM users WHERE telefono = %s', (telefono,))
                telefono_existente = cursor.fetchone()

                if cedula_existente:
                    flash('La cédula ya está registrada en el sistema.')
                elif correo_existente:
                    flash('El correo electrónico ya está registrado en el sistema.')
                elif telefono_existente:
                    flash('El número de teléfono ya está registrado en el sistema.')
                else:
                    # Insertar usuario en tablas específicas según el rol
                    if rol == '2':
                        cursor.execute(
                            """
                            INSERT INTO users (cedula, nombre, apellido, correo, contraseña, telefono,id_roles)
                            VALUES (%s, %s, %s, %s, %s, %s, %s)
                            """, (cedula, nombres, apellidos, correo,hashed_password, telefono,"2"))
                    
                    elif rol == '3':
                        cursor.execute(
                            """
                            INSERT INTO users (cedula, nombre, apellido, correo, contraseña, telefono,id_roles)
                            VALUES (%s, %s, %s, %s, %s, %s,%s)
                            """, (cedula, nombres, apellidos, correo,hashed_password, telefono,"3"))
                    conexion.commit()
                    return redirect(url_for('configuracion'))

            except psycopg2.Error as e:
                print(f"Error en la inserción de usuario: {e}")
                conexion.rollback()
                return render_template('configuracion.html', error='Ocurrió un error durante el registro.')
            finally:
                cursor.close()
    try:
        conexion = get_db_connection()
        cursor = conexion.cursor()
        nombre_usuario = session.get('nombre')
        apellidos_usuario = session.get('apellido')
        cedula_sesion = session.get('cedula')
        cursor.execute("""
            SELECT u.cedula, u.nombre, u.apellido, u.correo, u.telefono, r.tipo_rol
            FROM users u
            LEFT JOIN roles r ON u.id_roles = r.id_roles
        """)
        usuarios = cursor.fetchall()


        cursor.close()
        return render_template(
            'configuracion.html',
            cedula_sesion=cedula_sesion,
            usuarios=usuarios,
            nombre_usuario=nombre_usuario,
            apellidos_usuario=apellidos_usuario,
        )

    except psycopg2.Error as e:
        # Manejar excepciones al obtener usuarios
        print(f"Error al obtener usuarios: {e}")

    finally:
        # Cerrar el cursor
        cursor.close()

    # Renderizar la plantilla con la lista de usuarios (puede estar vacía si hay un error)
    return render_template('configuracion.html', usuarios=[])

@app.route('/eliminar_usuario/<string:cedula>', methods=['POST'])
def eliminar_usuario(cedula):
    try:
        conexion = get_db_connection()
        cursor = conexion.cursor(dictionary=True)
        cursor.execute("DELETE FROM users WHERE cedula = %s", (cedula,))
    
        conexion.commit()

        return redirect(url_for('configuracion'))

    except psycopg2.Error as e:
        print(f"Error al eliminar usuario: {e}")
        conexion.rollback()

    finally:
        cursor.close()

# #----------------------------------------------------INICIO-------------------------------------------------

@app.route('/inicio')
def inicio():
    try:
        nombre_usuario = session.get('nombre')
        apellidos_usuario = session.get('apellido')
        correo_usuario=session.get('correo')
        


        return render_template('inicio.html', nombre_usuario=nombre_usuario, apellidos_usuario=apellidos_usuario,correo_usuario=correo_usuario)
    except Exception as e:
        # Manejar excepciones
        print(f"Error: {e}")
        # Redirigir a una página de error o manejar según tus necesidades
        return render_template('error.html', mensaje='Hubo un error al obtener el contador de temas')


@app.route('/cambiar_contraseña', methods=['POST'])
def cambiar_contraseña():
    cedula = request.form['cedula']
    nueva_contraseña = request.form['nueva_contraseña']
    confirmar_contraseña = request.form['confirmar_contraseña']
    conexion = get_db_connection()
    cursor = conexion.cursor(dictionary=True)
    # Validación de que las contraseñas coinciden
    if nueva_contraseña != confirmar_contraseña:
        flash('Las contraseñas no coinciden', 'danger')
        return redirect(url_for('recuperar_contraseña'))

    # Verificación de la existencia del usuario
    cursor.execute("SELECT * FROM usuarios WHERE cedula = %s", (cedula,))
    usuario = cursor.fetchone()

    if not usuario:
        flash('No se encontró el usuario con la cédula proporcionada', 'danger')
        return redirect(url_for('recuperar_contraseña'))

    # Hash de la contraseña antes de almacenarla
    hashed_password = generate_password_hash(nueva_contraseña, method='pbkdf2:sha256')

    # Actualización de la contraseña del usuario
    try:
        cursor.execute(
            "UPDATE usuarios SET contraseña = %s WHERE cedula = %s",
            (hashed_password, cedula)
        )
        conexion.commit()
        flash('Contraseña actualizada exitosamente', 'success')
    except mysql.connector.Error as err:
        flash(f'Error al actualizar la contraseña: {err}', 'danger')

    return redirect(url_for('configuracion'))

# #-------------------------------------------PERFIL---------------------------------------------------------------------------
@app.route('/perfil_usuario')
def perfil_usuario():
    if 'correo' not in session:
        return redirect(url_for('login'))

    correo = session['correo']
    conexion = get_db_connection()
    cursor = conexion.cursor()
    cursor.execute("SELECT cedula, nombre, apellido, correo, telefono FROM users WHERE correo = %s", (correo,))
    usuario = cursor.fetchone()

    if not usuario:
        return redirect(url_for('login'))

    cedula = usuario[0]
    nombres = usuario[1]
    apellidos = usuario[2]
    correo = usuario[3]
    telefono = usuario[4]


    # Obtén el nombre y apellidos del usuario desde la sesión
    nombre_usuario = session.get('nombre')
    apellidos_usuario = session.get('apellido')

    return render_template('perfil_usuario.html',
                            nombre_usuario=nombre_usuario,
                            apellidos_usuario=apellidos_usuario,
                            cedula=cedula,
                            nombres=nombres,
                            apellidos=apellidos,
                            correo=correo,
                            telefono=telefono
                            )



@app.route('/plan', methods=['GET'])
def plan():
        return render_template('o/plan.html')

if __name__ == '__main__':
    app.run(debug=True)

