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
    ?>
    <table width=100%>
        <tr>
            <td><a href="index.php">inicio</a></td>
            <td><a href="puertos.php">puertos</a></td>
            <td><a href="addServicios.php">servicios</a></td>
            <td><a href="logs.php">logs</a></td>
            <td>
                <?php
                if(isset($_SESSION["user"])){
                    $user = $_SESSION["user"];
                    print "<a href='bye.php'>$user</a>";
                }else{
                    print "<a href='login.php'>Iniciar sesión</a>";
                };
                if(isset($_SESSION["rol"])){
                    print("
                        <td><a href='panelAdmin.php'>Panel admin</a></td>
                    ");
                };

                ?>
            </td>
        </tr>
    </table>
</body>
</html>