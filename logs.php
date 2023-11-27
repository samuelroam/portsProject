<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    include("nav.php");
    include("connection.php");
    if (!isset($_SESSION['user'])) {
        header('Location: index.php');
    } else {
        if ($_SESSION['rol'] != 'admin') {
            echo "No tienes permiso para ver esta página";
        } else {

    ?>
            <form action="#" method="post">

                <input type="text" name="command" id="command" autofocus>
                <input type="submit" value="ejecutar" name="ejecutar">
                <br>
                <textarea name="" id="" cols="150" rows="50" value="asdf">

    <?php
            if (isset($_POST['ejecutar'])) {
                $command = $_POST['command'];
                $output = array();
                passthru($command, $output);
                $fecha = date("Y-m-s H:i:s");
                $logsql = "INSERT INTO terminalLog (command,fecha) values ('$command','$fecha')";
                $logs = mysqli_query($conn, $logsql);;
                foreach ($output as $line) {
                    echo $line . PHP_EOL;
                };
            };
        };
    };
    ?>
</textarea>
            </form>
            <?php
            include("footer.php");
            ?>
</body>

</html>