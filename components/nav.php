
<link rel="stylesheet" type="text/css" href="/styles/styles.css">
    <?php
    session_start();
    ?>
    <table width=100%>
        <tr>
            <td><a href="index.php" class="nav-button button-green">inicio</a></td>
            <td><a href="puertos.php" class="nav-button button-green">puertos</a></td>
            <td><a href="addServicios.php" class="nav-button button-green">servicios</a></td>
            <td><a href="logs.php" class="nav-button button-green">logs</a></td>
            <td>
                <?php
                if(isset($_SESSION["user"])){
                    $user = $_SESSION["user"];
                    print "<a href='bye.php' class='nav-button button-black'>$user</a>";
                }else{
                    print "<a href='login.php' class='nav-button button-red'>Iniciar sesión</a>";
                };
                if(isset($_SESSION["rol"])){
                    print("
                        <td><a href='panelAdmin.php' class='nav-button button-green'>Panel admin</a></td>
                    ");
                };

                ?>
            </td>
        </tr>
    </table>
