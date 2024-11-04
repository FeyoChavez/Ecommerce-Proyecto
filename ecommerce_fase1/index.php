<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecommerce</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style>
        body {
            display: flex;
            min-height: 100vh;
            flex-direction: column;
            background-image: url("img/fondo.jpg");
            background-repeat: no-repeat;
            background-size: cover;
            background-attachment: fixed;
            font-family: 'Arial', sans-serif;
        }
        nav {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
        }
        .container {
            margin-top: 10%;
            max-width: 400px;
            background: rgba(255, 255, 255, 0.9);
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
            backdrop-filter: blur(10px);
        }
        h1 {
            text-align: center;
            color: #4A4A4A;
            margin-bottom: 20px;
            font-size: 2rem;
            font-weight: bold;
        }
        .form-control {
            border-radius: 25px;
            border: 2px solid #FF6F61;
            transition: border-color 0.3s;
        }
        .form-control:focus {
            border-color: #FF6F61;
            box-shadow: 0 0 5px rgba(255, 111, 97, 0.5);
        }
        .btn-primary {
            width: 100%;
            border-radius: 25px;
            background: linear-gradient(90deg, #FF6F61, #FFB347);
            border: none;
            transition: background 0.3s, transform 0.2s;
        }
        .btn-primary:hover {
            background: linear-gradient(90deg, #FFB347, #FF6F61);
            transform: translateY(-2px);
        }
        .footer {
            margin-top: auto;
            text-align: center;
            padding: 15px;
            color: #fff;
            background-color: rgba(0, 0, 0, 0.5);
            font-size: 0.9rem;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-info">
        <a href="#" class="navbar-brand mx-auto" style="font-size: 1.5rem;">Ecommerce</a>
    </nav>

    <div class="container mx-auto">
        <h1>Inicio de sesión</h1>
        <div class="form-group">
            <input type="email" id="correo" class="form-control form-control-lg" placeholder="Correo" required>
        </div>
        <div class="form-group">
            <input type="password" id="pass" class="form-control form-control-lg" placeholder="Contraseña" required>
        </div>
        <button type="submit" class="btn btn-primary" id="login">ENTRAR</button>
    </div>

    <footer class="footer">
        <p>&copy; 2024 Ecommerce. Todos los derechos reservados.</p>
    </footer>

    <script type="module" src="js/app.js"></script>
</body>
</html>
