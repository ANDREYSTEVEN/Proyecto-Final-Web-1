<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Información en Firebase</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            background-color: #f0f8ff;
        }
        .container {
            max-width: 600px;
            margin-top: 50px;
        }
        .card {
            background-color: #e0f7fa;
            border-radius: 15px;
        }
        .card-header {
            background-color: #0288d1;
            color: white;
            border-top-left-radius: 15px;
            border-top-right-radius: 15px;
        }
        .btn-primary {
            background-color: #0288d1;
            border-color: #0277bd;
        }
        .btn-primary:hover {
            background-color: #0277bd;
            border-color: #01579b;
        }
        .btn-secondary {
            background-color: #01579b;
            border-color: #013f6d;
        }
        .btn-secondary:hover {
            background-color: #013f6d;
            border-color: #011e34;
        }
        .form-control:focus {
            border-color: #0288d1;
            box-shadow: 0 0 0 0.2rem rgba(2, 136, 209, 0.25);
        }
        label {
            color: #01579b;
        }
        .footer {
            text-align: center;
            margin-top: 30px;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="card">
        <div class="card-header text-center">
            <h4>Registro a base de datos Firebase</h4>
        </div>
        <div class="card-body">
            <?php
            session_start(); 
            // Verificar si se envió el formulario
            if ($_SERVER["REQUEST_METHOD"] === "POST") {
                // Capturar datos del formulario
                $nombre = $_POST["name"];
                $apellido = $_POST["lastName"];
                $email = $_POST["email"];
                $direccion = $_POST["direccion"];
                $telefono = $_POST["telefono"];
                $nacionalidad = $_POST["nacionalidad"];
                $idNumber = $_POST["idNumber"];
                $programa = $_POST["program"];
                $password = $_POST["password"];
                $confirmPassword = $_POST["confirmPassword"];

                // Validar que las contraseñas coincidan
                if ($password !== $confirmPassword) {
                    echo "Las contraseñas no coinciden.";
                    exit();
                }
                // Crear un vector (JSON) para almacenar los datos
                $data = json_encode([
                    "Nombre" => $nombre,
                    "Apellido" => $apellido,
                    "email" => $email,
                    "Direccion" => $direccion,
                    "Telefono" => $telefono,
                    "Nacionalidad" => $nacionalidad,
                    "ID" => $idNumber,
                    "Programa" => $programa,
                    "Password" => $password
                ]);
                // Configuración de Firebase
                $url = "https://web-i-f9f11-default-rtdb.firebaseio.com/c_Registro.json";

                // Inicializar cURL para enviar datos a Firebase
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
                curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

                // Ejecutar la solicitud cURL
                $response = curl_exec($ch);
                if ($response === FALSE) {
                    echo "Error al conectar con Firebase: " . curl_error($ch);
                } else {
                    echo "Datos almacenados con éxito.";
                }
                curl_close($ch);
            }
            ?>
        </div>
        <div class="card-footer text-center">
            <a href="consulta.php" class="btn btn-secondary">Iniciar sesión</a>
        </div>
    </div>
</div>
<div class="footer">
    <p>&copy; 2024 Registro de Información. Todos los derechos reservados.</p>
</div>
</body>
</html>
