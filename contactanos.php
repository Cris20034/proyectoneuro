<?php
// index.php

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styles.css">
    <title>ClubNeuroVida-Contactanos</title>
</head>
<body>
    <header class="header">
        <div class="menu container">
            <a href="index.php" class="logo"><img src="./neuro/images/favicon.png" alt=""></a>
            <input type="checkbox"  id="menu"/>
            <label for="menu">
                <img src="../images/menu-hamburguesa.png" class="menu-icono" alt="">
            </label>
            <nav class="navbar">
                <ul>
                    <li><a href="./index.php">Home</a></li>
                    <li><a href="./quienes_somos.php">¿Quienes somos?</a></li>
                    <li><a href="./contactanos.php">Contactanos</a></li>
                    <li><a href="./servicios.php">Servicios</a></li>
                </ul>
            </nav>
        </div>

        <div class="header-content container">
            <h1> Contactanos </h1>
            <p>Transformando vidas, impulsando bienestar integral.
            </p>
            <a href="https://www.tu-link.com">
                <button class="boton-flecha">
                    <i class="fas fa-arrow-right"></i> WhatsApp
                </button>
            </a>
        </div>
    </header>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            text-decoration: none;
            list-style: none;
        }

        body {
            min-height: 100vh;
            box-sizing: border-box;
            font-family: 'Poppins', 'sans-serif';
        }

        .container {
            max-width: 3000px;
            margin: 0 auto;
        }

        .header {
            background-image: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), 
            url(./neuro/images/imagen\ portada.jpg);
            background-position: center bottom;
            background-repeat: no-repeat;
            background-size: cover;
            background-attachment: fixed;
            min-height: 70vh;
            display: flex;
            align-items: center;
        }

        .menu {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .logo {
            color: #fffdfc;
            font-size: 25px;
            font-weight: 800;
            margin-left: 28px;
        }

        .menu .navbar {
            display: flex;
            flex: 1;
            /* Habilita el flexbox en la barra de navegación */
            justify-content: center;
        }

        .menu .navbar ul {
            padding: 0;
            /* Elimina el padding por defecto */
            margin: 0;
            /* Elimina el margen por defecto */
            list-style: none;
            /* Elimina las viñetas de la lista */
            display: flex;
            /* Usa flexbox para alinear los elementos */
        }

        .menu .navbar ul li {
            position: relative;
            margin: 0 15px;
            /* Espaciado entre los elementos */
        }

        .menu .navbar ul li a {
            font-size: 18px;
            padding: 20px;
            color: #fffdfc;
            display: block;
            font-weight: 600;
        }

        .menu .navbar ul li a:hover {
            color: rgba(180, 120, 235, 0.438);
        }

        #menu {
            display: none;
        }

        .menu-icono {
            width: 30px;
        }

        .menu label {
            cursor: pointer;
            display: none;
        }

        .header-content {
            text-align: center;
        }

        .header-content h1 {
            font-size: 80px;
            line-height: 100px;
            color: aliceblue;
            text-transform: uppercase;
            margin-bottom: 35px;
        }

        .header-content p {
            font-size: 16px;
            color: aliceblue;
            padding: 0 250px;
            margin-bottom: 25px;

        }

        .btn-1 {
            display: inline-block;
            padding: 11px 35px;
            background: linear-gradient(to bottom right, #87cfeb, #6a0dad);
            color: #fffdfc;
            text-transform: uppercase;
            border-radius: 25px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .btn-1:hover {
            background: linear-gradient(to bottom right, #6a0dad, #87cfeb);
            transform: translateY(-10px);
        }

        .frase {
            padding: 90px 0;
            background-color: #cccece;
            position: relative;
        }

        .frase-content {
            text-align: center;
        }

        .frase-content h2 {
            font-size: 55px;
            line-height: 70px;
            color: #323337;
            padding: 0 250px;
            margin-bottom: 15px;
        }

        .txt-p {
            font-size: 16px;
            color: #414247;
            padding: 0 250px;
            margin-bottom: 35px;

        }

        .coffe-group {
            display: flex;
            justify-content: space-between;
            margin-bottom: 50px;
        }

        .coffe-1 {
            padding: 25px;
        }

        .coffe-1 img {
            width: 200px;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s ease;
        }

        .coffe-1 img:hover {
            transform: translateY(-10px);
        }

        .coffe-2 img {
            width: 250px;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s ease;
        }

        .coffe-2 img:hover {
            transform: translateY(-10px);
        }

        .coffe-2 {
            padding: 25px;
        }

        .frase-img {
            width: 300px;
            position: absolute;
            top: 0;
            right: 0;
        }

        .coffe-1 h3 {
            color: rgb(64, 13, 80);
            font-size: 30px;
            margin-bottom: 15px;
        }

        .coffe-2 h3 {
            color: rgb(64, 13, 80);
            font-size: 30px;
            margin-bottom: 15px;
        }

        .servicios {
            background-image: linear-gradient(rgba(0, 0, 0, 0.7),
                    rgba(0, 0, 0, 0.7)),
                url(../images/yoga.jpg);
            background-position: center bottom;
            background-repeat: no-repeat;
            background-size: cover;
            background-attachment: fixed;
            padding: 100px 0;
        }

        .servicios-content h2 {
            font-size: 55px;
            line-height: 70px;
            color: #f9fafc;
            text-transform: uppercase;
            margin-bottom: 50px;
        }

        .servicios-content {
            text-align: center;
        }

        .servicios-content p {
            font-size: 20px;
            color: #c5c5c5;
            margin-bottom: 50px;
            padding: 0 100px;
        }

        .servicios-group {
            display: flex;
            justify-content: space-between;
            margin-bottom: 50px;
        }

        .servicio-1 {
            padding: 0 100px;
        }

        .servicio-1 img {
            width: 250px;
            margin-bottom: 15px;
            transition: transform 0.3s ease;
        }

        .servicio-1 img:hover {
            transform: translateY(-10px);
        }

        .servicio-1 h3 {
            color: #eaccb3;
            font-size: 18px;

        }

        .general {
            display: flex;
        }

        .general-1 {
            width: 50%;
            padding: 100px 250px 100px 100px;
            background-color: #e1e2e6;
        }

        .general-2 {
            background-image: url(./neuro/images/manualidades.jpg);
            background-position: center center;
            border-radius: 15px;
            background-repeat: no-repeat;
            background-size: cover;
            width: 50%;
        }

        .general-3 {
            background-image: url(./neuro/images/PortadaPanel.jpg);
            background-position: center center;
            border-radius: 15px;
            background-repeat: no-repeat;
            background-size: cover;
            width: 50%;
        }

        h2 {
            font-size: 55px;
            line-height: 70px;
            color: #323337;
            text-transform: uppercase;
            margin-bottom: 20px;
        }

        p {
            font-size: 16px;
            color: #414247;
            margin: 25px 0 45px 0;
        }

        .blog {
            padding: 100px 0;
            text-align: center;
        }

        .blog-content {
            display: flex;
        }

        .blog-1 {
            padding: 15px 55px;
        }

        .blog-1 img {
            width: 250px;
            border-radius: 15px;
            margin-bottom: 15px;
        }

        .footer {
            padding: 100px 0;
            background-color: #323337;
        }

        .footer-content {
            display: flex;
            justify-content: space-between;
        }

        link h3 {
            font-size: 18px;
            color: #f9fafc;
            margin-bottom: 15px;
        }

        .link a {
            font-size: 15px;
            color: #c5c5c5;
            display: block;
            margin-bottom: 15px;
        }

        .rating-section,
        .testimonials-section {
            max-width: 600px;
            margin: 20px auto;
            background: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        /* Encabezados de secciones */
        .rating-section h2,
        .testimonials-section h2 {
            margin-top: 0;
            color: #333;
        }

        /* Estilo para la calificación con estrellas */
        .star-rating {
            display: flex;
            flex-direction: row-reverse;
            justify-content: center;
        }

        .star-rating input {
            display: none;
        }

        .star-rating label {
            font-size: 2em;
            color: #ccc;
            cursor: pointer;
            transition: color 0.3s;
        }

        .star-rating input:checked~label {
            color: #f7d106;
        }

        .star-rating label:hover,
        .star-rating label:hover~label {
            color: #f7d106;
        }

        /* Estilo del área de texto */
        .testimonial-input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        /* Estilo del botón de enviar */
        .btn-submit {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
        }

        .btn-submit:hover {
            background-color: #45a049;
        }

        /* Estilo de cada testimonio */
        .testimonial-item {
            border-bottom: 1px solid #ddd;
            padding: 10px 0;
        }

        .testimonial-item:last-child {
            border-bottom: none;
        }

        .rating-display {
            color: #f7d106;
        }

        /* Media Queries para dispositivos móviles */
        @media (max-width: 768px) {
            body {
                padding: 10px;
            }

            .rating-section,
            .testimonials-section {
                margin: 10px;
                padding: 15px;
            }

            .star-rating label {
                font-size: 1.5em;
                /* Reducir el tamaño de las estrellas */
            }

            .testimonial-input {
                padding: 8px;
                font-size: 14px;
                /* Reducir el tamaño del texto del testimonio */
            }

            .btn-submit {
                padding: 8px 15px;
                font-size: 14px;
                /* Ajustar el tamaño del botón */
            }
        }

        @media (max-width: 768px) {
            .star-rating {
                flex-direction: row;
                /* Cambiar la dirección de las estrellas a filas */
            }

            .star-rating label {
                font-size: 1.2em;
                /* Reducir aún más el tamaño de las estrellas */
            }

            .rating-section,
            .testimonials-section {
                padding: 10px;
            }

            .testimonial-input {
                font-size: 12px;
                /* Reducir el tamaño del texto para pantallas muy pequeñas */
            }

            .btn-submit {
                padding: 10px;
                font-size: 12px;
                /* Ajustar el tamaño del botón */
            }
        }

        @media(max-width:768px) {
            .menu {
                padding: 30px;
            }

            .menu label {
                display: initial;
            }

            .menu .navbar {
                position: absolute;
                top: 100%;
                left: 0;
                right: 0;
                background-color: #323337;
                display: none;
            }

            .menu .navbar ul li {
                width: 100%;
            }

            #menu:checked~.navbar {
                display: initial;
            }

            .header {
                max-height: 0vh;
            }

            .header-content {
                padding: 100px 30px;
            }

            .header-content p {
                padding: 0;
            }

            .header-content h1 {
                font-size: 40px;
            }

            .frase {
                padding: 30px;
            }

            .frase-content h2 {
                padding: 0;
            }

            .txt-p {
                padding: 0;
            }

            .coffe-group {
                flex-direction: column;
                margin-bottom: none;
            }

            .frase-img {
                display: none;
            }

            .servicios {
                padding: 30px;
            }

            .servicios-content p {
                padding: 0;
            }

            .servicios-group {
                flex-direction: column;
                margin-bottom: 0;
            }

            .servicio-1 {
                margin-bottom: 25px;
            }

            .general {
                flex-direction: column;
            }

            .general-1 {
                width: 100%;
                padding: 30px;
                text-align: center;
            }

            .general-2,
            .general-3 {
                display: none;
            }

            .blog {
                padding: 30px;
            }

            .blog {
                padding: 30px;
            }

            .blog-content {
                flex-direction: column;
            }

            .blog-1 {
                padding: 0;
            }

            .footer {
                padding: 30px;
            }

            .footer-content {
                flex-direction: column;
                text-align: center;
            }
        }

        .modal {
            display: none;
            position: fixed;
            z-index: 50;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.5);
        }

        .modal-content {
            background-color: white;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            max-width: 500px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
        }

        .fade-in {
            animation: fadeIn 0.5s;
        }

        .slide-in {
            animation: slideIn 0.5s;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        @keyframes slideIn {
            from {
                transform: translateY(-20px);
                opacity: 0;
            }

            to {
                transform: translateY(0);
                opacity: 1;
            }
        }


        .boton_cartas {
            background-color: #007bff;
            /* Color de fondo azul */
            color: white;
            /* Color del texto */
            border: none;
            /* Sin borde */
            padding: 11px 35px;
            /* Espaciado interno */
            font-size: 16px;
            /* Tamaño de la fuente */
            border-radius: 8px;
            /* Bordes redondeados */
            cursor: pointer;
            /* Cambia el cursor al pasar por el botón */
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            /* Sombra para darle profundidad */
            transition: background-color 0.3s ease, box-shadow 0.3s ease;
            /* Transiciones para suavizar cambios */
            display: inline-block;

        }

        .boton_cartas:hover {
            background-color: #0056b3;
            /* Color de fondo más oscuro en hover */
            box-shadow: 0px 6px 8px rgba(0, 0, 0, 0.2);
            /* Sombra más intensa en hover */
            transform: scale(1.05);
        }

        .boton_cartas:focus {
            outline: none;
            /* Elimina el contorno predeterminado */
            box-shadow: 0px 0px 0px 3px rgba(0, 123, 255, 0.5);
            /* Añade un contorno suave al hacer clic */
        }
    </style>
</body>
</html>