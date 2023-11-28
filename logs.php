<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consola</title>
</head>

<body>
    <?php
    include("components/nav.php");
    include("components/connection.php");

    function ejecutar($command){
                $output = array();
                passthru($command, $output);
                return $output;
                foreach ($output as $line) {
                    echo $line . PHP_EOL;
                };
                
    }

    if (!isset($_SESSION['user'])) {
        header('Location: index.php');
    } else {
        if ($_SESSION['rol'] != 'admin') {
            echo "No tienes permiso para ver esta página";
        } else {

    ?>
    <div>
            <form action="#" method="post">
                <input type="text" name="command" id="command" autofocus>
                <input type="submit" value="ejecutar" name="ejecutar">
                </form>
    </div>
                <br>
    <div>
        <table>
            <tr>
        <?php
            $ls='ls';
            $moo='apt moo';
        print("
            <td><a href='logs.php?command=$ls' class='button-default'>ls</a></td>
            <td><a href='logs.php?command=$moo' class='button-default'>moo</a></td>
            "); 
            ?>
            </tr>
        </table>
    </div>
                <br>
    <div>
                <textarea name="" id="" cols="150" rows="50" value="">
    
    <?php
            if (isset($_POST['ejecutar'])) {
                $command = $_POST['command'];
                $output = array();
                passthru($command, $output);

                //$output = ejecutar($command);

                foreach ($output as $line) {
                    echo $line . PHP_EOL;
                };
                $fecha = date("Y-m-s H:i:s");
                $logsql = "INSERT INTO terminalLog (command,fecha) values ('$command','$fecha')";
                $logs = mysqli_query($conn, $logsql);
            };
            if(!empty($_GET['command'])){
                $command = $_GET['command'];
                ejecutar($command);
            };
        };
    };
    ?>
</textarea>
    </div>
            
            <?php
            include("components/footer.php");
            ?>
</body>
</html>