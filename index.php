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
    $comando = 'ls /home';
    $ejecucion = shell_exec($comando);
    print($ejecucion);
    ?>
    <p>index</p>
</body>
</html>