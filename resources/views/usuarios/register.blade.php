
<h1>Registro de Usuarios</h1>
<form method="post" action="{{ route('') }}">
    <input type="text" name="nombre" placeholder="nombre"><br>
    <input type="text" name="apellido" placeholder="apellido"><br>
    <input type="email" name="email" placeholder="email"><br>
    <input type="password" name="contrasena" placeholder="contraseña"><br>
    <input type="date" name="fechaNac"><br><button type="submit">Registrar</button>

</form>
