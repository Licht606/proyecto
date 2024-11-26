<?php
include('config.php');
session_start();
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $query = $connection->prepare("SELECT * FROM users WHERE USERNAME=:username");
    $query->bindParam("username", $username, PDO::PARAM_STR);
    $query->execute();
    $result = $query->fetch(PDO::FETCH_ASSOC);
    if (!$result) {
        echo '<p class="error">Username password combination is wrong!</p>';
    } else {
        if (password_verify($password, $result['password'])) {
            $_SESSION['user_id'] = $result['id'];
            header('Location: index.html');
        } else {
            echo '<p class="error">Username password combination is wrong!</p>';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
</head>
<body>
    <font size="7">
        <table border="5" cellpadding="15">
            <tr>
                <td><a href="index.php">INICIO </a> </td>
            </tr>
        </table>
        </font>
        <center>
            <br>
            <font size="5">
                <h1>Inicio de sesion</h1>
            </font>
            <form method="post" action="" style="border: #000000 2px solid; width: 400px; height:210px;">
                <font size="5"  >
                    <p > USUARIO: <input type="text" name= "username"></p>
                    <p > CONTRASEÑA: <input type="password" name= "password"></p>
                    <button type="submit" name="login" value="login">iniciar sesion</button>
                  
                </font>
                <br>
                <h3><a href="USUARIO_NUEVO.php">Registrarse</a></h3>
            </form>
        </center
</body>
</html>