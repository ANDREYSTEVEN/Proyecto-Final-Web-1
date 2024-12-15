<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    session_start(); 
    $data = '{
    "email": "usuario@ejemplo.com",
    "Nombre": "Juan",
    "Apellido": "Pérez",
    "Dirección": "Calle 123, Ciudad",
    "Teléfono": "+57 300 123 4567",
    "Nacionalidad": "Colombiana",
    "Número de Identificación": "123456789",
    "Programa de Interés": "curso",
    "Contraseña": "123",
    "Confirmar Contraseña": "123"}';
        $url = 'https://web-i-f9f11-default-rtdb.firebaseio.com/c_Registro.json';
        $ch = curl_init();
        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,false);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
        curl_setopt($ch,CURLOPT_POST,1);
        curl_setopt($ch,CURLOPT_POSTFIELDS,$data);
        curl_setopt($ch,CURLOPT_HTTPHEADER,array('Content-Type: text/plain'));

        $response = curl_exec($ch);
        if(curl_errno($ch))
        {
            echo 'Error:'.curl_errno($ch);
        }
        else
        {
            echo 'datos insertados';
        }
    ?>
    
</body>
</html>