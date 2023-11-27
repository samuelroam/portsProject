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
    $host = 'llavia.ddns.net';
    if(!isset($_SESSION['user'])){
        header('location: index.php');
    }else{
    ?>
    <table>
        <tr>
            <td><p>Estado</p></td>
            <td><p>Puerto</p></td>
            <td><p>Servicio</p></td>
        </tr>
    <?php
    $sql = "SELECT puerto, servicio from estadopuertos;";
    $result = mysqli_query($conn,$sql);
    $cantidad = mysqli_num_rows($result);
    
    for ($i = 0; $i < $cantidad; $i++) {$row = mysqli_fetch_array($result);
        $port = $row['puerto'];
        $service = $row['servicio'];
        $socket = @fsockopen($host, $port, $errno, $errstr, 5);
        print("<tr>");
        if($socket){
            print("<td>On</td>");
            fclose($socket);
        }else{
            print("<td>Off</td>");
        };
        
        print("<td>$port</td>");
        print("<td>$service</td>");
        print("</tr>");
    };
};
    ?>
    </table>
</body>
</html>