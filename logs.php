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
    if(!isset($_SESSION['user'])){
        header('Location: index.php');
    }else{
        if($_SESSION['rol']!='admin'){
            echo "No tienes permiso para ver esta página";
        }else{
            
    ?>
    <form action="#" method="post">
        
        <input type="text" name="command" id="command" autofocus>
        <input type="submit" value="ejecutar" name="ejecutar">
        <br>
        <textarea name="" id="" cols="150" rows="50" value="asdf">
    
    <?php
    if(isset($_POST['ejecutar'])){
        $command=$_POST['command'];
        $output = array();
passthru($command,$output);
        /*$filename = "comando.txt";
    file_put_contents($filename, $command);
        
        $outputFilename = "salida.txt";
        $command = "cat $filename > $outputFilename";
        shell_exec($command);
        $output = file_get_contents($outputFilename);
        echo nl2br($output);*/
        $logsql = "INSERT INTO terminalLog (command) values ('$command')";
        $logs = mysqli_query($conn, $logsql);;




         foreach($output as $line){
            echo $line . PHP_EOL;
            
        } 
    };
}
    }
    ?>
</textarea></form>
    <?php
    /*$command = "tail -n 1 /var/log/syslog";
    $output = system($command);
    echo $output ;*/
    ?>
</body>
</html>