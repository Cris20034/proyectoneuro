<?php
// admin_paneñ.php

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Administrativo</title>
    <link rel="stylesheet" href="../css/dashboard.css">
    <style>
        /* Estilo general para el body */
        body {
            display: flex;
            justify-content: center;
            align-items: flex-start;
            flex-direction: column;
            min-height: 100vh;
            margin: 0;
            background-color: #f4f7fa;
            /* Color de fondo suave */
            font-family: 'Arial', sans-serif;
            /* Tipografía moderna */
            color: #333;
            /* Color de texto oscuro */
            padding-top: 70px;
            /* Espacio adicional para el encabezado */
        }

        /* Estilo del encabezado */
        .header {
            width: 100%;
            background-color: #000000da;
            /* Color azul */
            color: white;
            /* Texto blanco */
            padding: 20px;
            text-align: center;
            box-shadow: 0 4px 8px rgb(0, 132, 255);
            /* Sombra en el encabezado */
            position: fixed;
            /* Fijar el encabezado en la parte superior */
            top: 0;
            /* Alinear en la parte superior */
            left: 0;
            right: 0;
            /* Alinear a la derecha */
            z-index: 1000;
            /* Mantener el encabezado en la parte superior */
        }

        /* Estilo para el contenido */
        .content {
            display: none;
            padding: 30px;
            margin: 80px auto;
            /* Espaciado entre contenido */
            border-radius: 8px;
            max-width: 800px;
            /* Ancho máximo del contenido */
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            background-color: white;
            /* Fondo blanco para el contenido */
            transition: all 0.3s;
            /* Transición suave para el contenido */
        }

        /* Espaciado en los encabezados de sección */
        h2 {
            color: #2196F3;
            /* Color del encabezado */
            margin-bottom: 20px;
            border-bottom: 2px solid #e3f2fd;
            /* Línea debajo del título */
            padding-bottom: 10px;
        }

        /* Color de texto para párrafos */
        p {
            color: #555;
            /* Color de texto para párrafos */
            margin-bottom: 15px;
        }

        /* Estilo para la tabla */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            margin-bottom: 20px;
            background-color: white;
            /* Fondo blanco para la tabla */
        }

        th,
        td {
            border: 1px solid #000;
            /* Borde negro */
            padding: 10px;
            text-align: left;
            background-color: white;
            /* Fondo blanco para celdas */
        }

        th {
            background-color: #f2f2f2;
            /* Fondo gris claro para encabezados */
        }

        /* Caja de Descripción */
        .descripcion {
            border: 1px solid #000;
            padding: 10px;
            margin-top: 20px;
            background-color: white;
            /* Fondo blanco para la descripción */
        }

        /* Contenedor para Horario y Datos del niño */
        .horario-datos {
            display: flex;
            /* Usar flexbox para organización */
            justify-content: space-between;
            /* Espaciado entre elementos */
            margin-top: 20px;
        }

        /* Caja de Horario y Datos del niño */
        .horario,
        .datos-nino {
            width: 48%;
            /* Ocupa la mitad del espacio disponible */
            border: 1px solid #000;
            padding: 10px;
            background-color: white;
            /* Fondo blanco para horario y datos */
        }

        /* Agregar un estilo uniforme para todas las secciones */
        section {
            margin: 20px auto;
            /* Espaciado uniforme para todas las secciones */
            padding: 30px;
            border-radius: 8px;
            background-color: #fff;
            /* Fondo blanco para todas las secciones */
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        /* Estilo para los otros módulos */
        .module {
            margin: 20px auto;
            padding: 30px;
            border: 1px solid #ccc;
            border-radius: 8px;
            max-width: 800px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            background-color: #f9f9f9;
            /* Color gris claro */
        }
    </style>
</head>

<body>
    <header class="header">
        <div class="logo">Panel Administrativo</div>
        <input type="checkbox" id="toggle"></input>
        <label for="toggle"> <img class="menu" src="../images/menu-hamburguesa.png" alt="menu"> </label>
        <nav class="navigation">
            <ul>
                <li><a href="#" onclick="showContent('inicio')">Inicio</a></li>
                <li><a href="#">Servicios</a>
                    <ul>
                        <li><a href="#" onclick="showContent('yoga')">Yoga</a></li>
                        <li><a href="#" onclick="showContent('cursos-computacion')">Curso de Computación</a></li>
                        <li><a href="#" onclick="showContent('bailoterapia')">Bailoterapia</a></li>
                        <li><a href="#" onclick="showContent('tareas-asistidas')">Tareas Asistidas</a></li>
                        <li><a href="#" onclick="showContent('estiramientos')">Estiramientos</a></li>
                        <li>
                            <a href="#" onclick="showContent('cursos')">Cursos</a>
                            <ul>
                                <li><a href="#" onclick="showContent('curso-a')">Curso A</a></li>
                                <li><a href="#" onclick="showContent('curso-b')">Curso B</a></li>
                                <li><a href="#" onclick="showContent('curso-c')">Curso C</a></li>
                                <li><a href="#" onclick="showContent('curso-d')">Curso D</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li><a href="#">Horarios</a></li>
                <li><a href="#">Cupos</a></li>
            </ul>
        </nav>
    </header>
    <!-- APARTADO DE INICIO  -->
    <div id="inicio" class="content">
        <h2>Inicio</h2>
        <p>Bienvenido a nuestro portal. Aquí puedes encontrar un resumen de los diferentes apartados:</p>

        <div class="summary-container">
            <div class="summary-card">
                <h3>Tareas Dirigidas</h3>
                <p>Recibo materiales extras y asistencia en mis tareas. ¡Aprendamos juntos!</p>
                <a href="#tareas-asistidas" class="btn">Ver Más</a>
            </div>

            <div class="summary-card">
                <h3>Yoga</h3>
                <p>Descubre las diferentes posiciones de yoga y sus beneficios para tu bienestar.</p>
                <a href="#yoga" class="btn">Ver Más</a>
            </div>

            <div class="summary-card">
                <h3>Cursos de Computación</h3>
                <p>Ofrecemos cursos desde introducción hasta programación avanzada. ¡Únete!</p>
                <a href="#cursos-computacion" class="btn">Ver Más</a>
            </div>

            <div class="summary-card">
                <h3>Bailoterapia</h3>
                <p>Clases de bailoterapia que combinan ejercicio y diversión. ¡Baila y diviértete!</p>
                <a href="#bailoterapia" class="btn">Ver Más</a>
            </div>

            <div class="summary-card">
                <h3>Estiramientos</h3>
                <p>Realiza estiramientos esenciales para mantenerte flexible y saludable.</p>
                <a href="#estiramientos" class="btn">Ver Más</a>
            </div>

            <div class="summary-card">
                <h3>Cursos Disponibles</h3>
                <p>Explora nuestros cursos y selecciona el que más te interese. ¡Infórmate!</p>
                <a href="#cursos" class="btn">Ver Más</a>
            </div>
        </div>
    </div>

    <!-- APARTADO DE INICIO  -->

    <div id="tareas-asistidas" class="content">
        <h2>Tareas Dirigidas</h2>
        <p>Recibo materiales extras.</p>

        <!-- Tabla de productos -->
        <table>
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Cantidad</th>
                    <th>Descripción</th>
                    <th>Valor</th>
                    <th>Valor total de cada producto</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>166485</td>
                    <td>5</td>
                    <td>Hojas de papel</td>
                    <td>0.10</td>
                    <td>0.50</td>
                </tr>
                <tr>
                    <td colspan="5"></td> <!-- Fila vacía para más productos -->
                </tr>
            </tbody>
        </table>

        <!-- Descripción -->
        <div class="descripcion">
            <strong>Descripción:</strong>
            <p>"Lo que se hizo ese día, etc."</p>
        </div>

        <!-- Horario y Datos del niño -->
        <div class="horario-datos">
            <div class="horario">
                <strong>Horario:</strong>
                <p>Entrada - Salida</p>
            </div>

            <div class="datos-nino">
                <strong>Datos del niño:</strong>
                <p>Nombre: ________________<br>Apellido: ________________<br>Edad: ________________</p>
            </div>
        </div>
    </div>

    <div id="yoga" class="content">
        <h2>Yoga</h2>
        <p>Información sobre las clases de Yoga.</p>

        <!-- Tabla de Yoga -->
        <table>
            <thead>
                <tr>
                    <th>Posición</th>
                    <th>Duración (min)</th>
                    <th>Descripción</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Saludo al sol</td>
                    <td>10</td>
                    <td>Secuencia de movimientos para calentar el cuerpo.</td>
                </tr>
                <tr>
                    <td>Postura del guerrero</td>
                    <td>10</td>
                    <td>Fortalece las piernas y mejora el equilibrio.</td>
                </tr>
                <tr>
                    <td>Postura del árbol</td>
                    <td>5</td>
                    <td>Ayuda a mejorar la concentración y el equilibrio.</td>
                </tr>
            </tbody>
        </table>
    </div>

    <div id="cursos-computacion" class="content">
        <h2>Cursos de Computación</h2>
        <p>Detalles sobre los cursos de computación.</p>

        <!-- Tabla de Cursos de Computación -->
        <table>
            <thead>
                <tr>
                    <th>Curso</th>
                    <th>Duración (horas)</th>
                    <th>Descripción</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Introducción a la Computación</td>
                    <td>40</td>
                    <td>Fundamentos de la computación y uso básico de herramientas.</td>
                </tr>
                <tr>
                    <td>Programación Básica</td>
                    <td>50</td>
                    <td>Principios de programación utilizando lenguajes básicos.</td>
                </tr>
                <tr>
                    <td>Diseño Web</td>
                    <td>30</td>
                    <td>Creación y diseño de sitios web.</td>
                </tr>
            </tbody>
        </table>
    </div>

    <div id="bailoterapia" class="content">
        <h2>Bailoterapia</h2>
        <p>Detalles sobre las clases de bailoterapia.</p>

        <!-- Tabla de Bailoterapia -->
        <table>
            <thead>
                <tr>
                    <th>Clase</th>
                    <th>Duración (min)</th>
                    <th>Descripción</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Bailoterapia para principiantes</td>
                    <td>60</td>
                    <td>Clase enfocada en movimientos básicos de baile.</td>
                </tr>
                <tr>
                    <td>Bailoterapia avanzada</td>
                    <td>60</td>
                    <td>Clase para desarrollar técnicas y estilos más complejos.</td>
                </tr>
            </tbody>
        </table>
    </div>

    <div id="estiramientos" class="content">
        <h2>Estiramientos</h2>
        <p>A continuación se detallan los estiramientos realizados:</p>

        <!-- Tabla de estiramientos -->
        <table>
            <thead>
                <tr>
                    <th>Ejercicio</th>
                    <th>Duración (min)</th>
                    <th>Descripción</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Estiramiento de brazos</td>
                    <td>5</td>
                    <td>Estiramiento de los músculos del brazo y hombros.</td>
                </tr>
                <tr>
                    <td>Estiramiento de piernas</td>
                    <td>5</td>
                    <td>Estiramiento de los músculos de las piernas y caderas.</td>
                </tr>
                <tr>
                    <td>Estiramiento de espalda</td>
                    <td>5</td>
                    <td>Estiramiento de los músculos de la espalda.</td>
                </tr>
            </tbody>
        </table>
    </div>

    <div id="cursos" class="content">
        <h2>Cursos Disponibles</h2>
        <p>Selecciona un curso para ver más detalles:</p>
        <ul>
            <li><a href="#" onclick="showContent('curso-a')">Curso A</a></li>
            <li><a href="#" onclick="showContent('curso-b')">Curso B</a></li>
            <li><a href="#" onclick="showContent('curso-c')">Curso C</a></li>
            <li><a href="#" onclick="showContent('curso-d')">Curso D</a></li>
        </ul>
    </div>

    <div id="curso-a" class="content">
        <h2>Curso A</h2>
        <p>Detalles sobre el Curso A.</p>
    </div>

    <div id="curso-b" class="content">
        <h2>Curso B</h2>
        <p>Detalles sobre el Curso B.</p>
    </div>

    <div id="curso-c" class="content">
        <h2>Curso C</h2>
        <p>Detalles sobre el Curso C.</p>
    </div>

    <div id="curso-d" class="content">
        <h2>Curso D</h2>
        <p>Detalles sobre el Curso D.</p>
    </div>

    <style>
        .summary-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            margin-top: 20px;
        }

        .summary-card {
            background-color: #f9f9f9;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            margin: 15px;
            padding: 15px;
            width: 30%;
            /* Ajusta según el tamaño de la pantalla */
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .summary-card h3 {
            color: #333;
            margin-bottom: 10px;
        }

        .summary-card p {
            color: #555;
            margin-bottom: 15px;
        }

        .summary-card .btn {
            display: inline-block;
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            text-decoration: none;
            border-radius: 5px;
        }

        .summary-card:hover {
            transform: scale(1.05);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }

        /* Responsividad */
        @media (max-width: 768px) {
            .summary-card {
                width: 45%;
            }
        }

        @media (max-width: 480px) {
            .summary-card {
                width: 100%;
            }
        }
    </style>
    <script>
        function showContent(contentId) {
            const contents = document.querySelectorAll('.content');
            contents.forEach(content => {
                content.style.display = 'none'; // Ocultar todos los contenidos
            });
            document.getElementById(contentId).style.display = 'block'; // Mostrar el contenido específico
        }

        // Muestra el contenido del inicio por defecto al cargar la página
        window.onload = function() {
            showContent('inicio');
        }
    </script>
</body>

</html>