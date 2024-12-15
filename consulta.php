<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultar Registro Específico</title>
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
        }
        .btn-primary {
            background-color: #0288d1;
            border-color: #0277bd;
        }
        .btn-primary:hover {
            background-color: #0277bd;
            border-color: #01579b;
        }
        .form-control:focus {
            border-color: #0288d1;
            box-shadow: 0 0 0 0.2rem rgba(2, 136, 209, 0.25);
        }
        label {
            color: #01579b;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="card">
    <div class="card-header text-center">
    <h4>Iniciar Sesión</h4>
</div>
<div class="card-body">
    <form action="" method="POST">
        <div class="mb-3">
            <label for="email" class="form-label">Correo Electrónico:</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Ingrese su correo electrónico" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Contraseña:</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Ingrese su contraseña" required>
        </div>
        <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
    </form>
</div>
    <?php
    session_start(); 
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST["email"]) && isset($_POST["password"])) {
        $email = $_POST["email"];
        $password = $_POST["password"];

        $url = 'https://web-i-f9f11-default-rtdb.firebaseio.com/c_Registro.json';

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        $response = curl_exec($ch);

        if (curl_errno($ch)) {
            echo 'Error: ' . curl_error($ch);
        } else {
            $data = json_decode($response, true);

            $registroEncontrado = false;
            foreach ($data as $key => $record) {
                if (strcasecmp($record['email'], $email) == 0 && $record['Password'] === $password) {
                    $registroEncontrado = true;
                    $_SESSION['email'] = $email;
                    $_SESSION['password'] = $password;
                    header("Location: main.html");
                    exit();
                }
            }
            if (!$registroEncontrado) {
                echo '<p>No se encontraron registros con el correo electrónico o la contraseña: ' . htmlspecialchars($email) . '</p>';               
            }
        }
        curl_close($ch);
    } else {
        echo "<p>Por favor ingrese tanto el correo electrónico como la contraseña.</p>";
    }
}
?>
        </div>
    </div>
</div>
</body>
</html>
