#Importar libreias para el proyecto 
from flask import Flask, render_template, request, redirect, url_for, flash
from flask_mysqldb import MySQL


from config import config

app = Flask(__name__)

#Models
from models.ModelUser import ModelUser

#Entities
from models.entities.User import User


#Conexion a la base de datos
db  = MySQL(app)



#Rendizar index.html en la ruta raiz
@app.route('/')
def index():
    return render_template('index.html')




#Rendizar login.html
@app.route('/login', methods=[ 'POST'])
def login():
    if request.method == 'POST':
        User=(0, request.form['username'], request.form['password'])
        logged_user = ModelUser.login(db, User)
        if logged_user != None:
            if logged_user.password:
                return redirect(url_for('login.html'))
            else:
                flash("Contraseña incorrecta")
                return render_template('login.html')
        else:
            flash("Usuario no encontrado")
            return render_template('login.html')
        
        
    else:
        return render_template('login.html')



    
#Renderizar admin_panel.html+
@app.route('/admin_panel', methods=['GET', 'POST'])
def admin_panel():
    return render_template('admin_panel.html')




        
#Renderizar contactanos.html
@app.route('/contactanos', methods=['GET', 'POST'])
def contactanos():
    return contactanos('admin_panel.html')


#Rendizar cursos_de_computacion.html
@app.route('/Cursos_de_computacion', methods=['GET', 'POST'])
def Cursos_de_computacion():
    return render_template('Cursos_de_computacion.html')



#Rendizar gimnasia_cerebral.html  
@app.route('/gimnasia_cerebral', methods=['GET', 'POST'])
def gimnasia_cerebral():
    return render_template('gimnasia_cerebral.html')
        

#Renderizar servicios.html
@app.route('/servicios', methods=['GET', 'POST'])
def servicios():
    return render_template('servicios.html')





if __name__ == '__main__':
    app.config.from_object(config['development'])
    app.run()