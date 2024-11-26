<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuario_nuevo</title>
</head>
<body>
    <font size="7">
        <table border="5" cellpadding="15">
            <tr>
                <td><a href="registro_sesion.php">VOLVER </a> </td>
            </tr>
        </table>
    </font>
    <center>
        <br>
        <font size="5">
            <h1>CREAR USUARIO</h1>
        </font>
        <font size="5"  >
        <form method="post" action="registration.php" style="border: #000000 2px solid; width: 400px; height:225px;">
            <p >USUARIO: <input type="text" name="username"></p>
            <p > CONTRASEÑA: <input type="password" name="password"></p>
            <p > NOMBRE: <input type="text" name="nombre"></p>
            <P > EMAIL: <input type="text" name="email"> </P> 
            <button type="submit" name="register" value="register">Registrar</button>
        </form>
        </font>
    </center>
</body>
</html>