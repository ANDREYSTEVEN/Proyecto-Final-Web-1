<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formulario de Registro</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
  <style>
    body {
      background-color: #e3f2fd;
      color: #1a237e;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      display: flex;
      flex-direction: column;
      height: 100vh;
    }
    .form-container {
      margin: auto;
      padding: 2rem;
      background-color: #ffffff;
      border-radius: 10px;
      box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
      width: 100%;
      max-width: 500px;
    }
    h2 {
      font-size: 1.5rem;
      font-weight: bold;
      color: #1565c0;
      margin-bottom: 1rem;
    }
    .btn-primary {
      background-color: #0d47a1;
      border: none;
      padding: 10px;
      width: 100%;
    }
    .btn-primary:hover {
      background-color: #1565c0;
    }
  </style>
</head>
<body>
  <div class="form-container">
    <h2 class="text-center">Registro</h2>
    <form id="registerFormElement" action="index_html.php" method="POST">
      <div class="mb-3">
        <label for="registerEmail" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="usuario@ejemplo.com" required>
      </div>
      <div class="mb-3">
        <label for="registerName" class="form-label">Nombre</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="Juan Pérez" required>
      </div>
      <div class="mb-3">
        <label for="registerLastName" class="form-label">Apellido</label>
        <input type="text" class="form-control" id="lastName" name="lastName" placeholder="Pérez" required>
      </div>
      <div class="mb-3">
        <label for="registerAddress" class="form-label">Dirección</label>
        <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Calle 123, Ciudad" required>
      </div>
      <div class="mb-3">
        <label for="registerPhone" class="form-label">Teléfono</label>
        <input type="tel" class="form-control" id="telefono" name="telefono" placeholder="+57 300 123 4567" required>
      </div>
      <div class="mb-3">
        <label for="registerNationality" class="form-label">Nacionalidad</label>
        <input type="text" class="form-control" id="nacionalidad" name="nacionalidad" placeholder="Colombiana" required>
      </div>
      <div class="mb-3">
        <label for="registerIdNumber" class="form-label">Número de Identificación</label>
        <input type="text" class="form-control" id="idNumber" name="idNumber" placeholder="123456789" required>
      </div>
      <div class="mb-3">
        <label for="registerProgram" class="form-label">Programa de Interés</label>
        <select class="form-control" id="program" name="program" required>
          <option value="" disabled selected>Selecciona un programa</option>
          <option value="cursos">Cursos</option>
        </select>
      </div>
      <div class="mb-3">
        <label for="registerPassword" class="form-label">Contraseña</label>
        <input type="password" class="form-control" id="password" name="password" required>
      </div>
      <div class="mb-3">
        <label for="registerConfirmPassword" class="form-label">Confirmar Contraseña</label>
        <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" required>
      </div>
      <div class="mb-3">
        <input type="checkbox" id="terms" name="terms" required>
        <label for="terms" class="form-check-label">Acepto los <a href="#">términos y condiciones</a>.</label>
      </div>
      <button type="submit" class="btn btn-primary">Registrarse</button>
    </form>
  </div>
</body>
</html>
