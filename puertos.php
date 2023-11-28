<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Puertos</title>
</head>
<body>
    <?php
    include("components/nav.php");
    include("components/connection.php");
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
        $socket = fsockopen($host, $port, $errno, $errstr, 0.2);
        print("<tr>");
        if($socket){
            print("<td><img src='img/botonverde.png' width='20px'></td>");
            fclose($socket);
        }else{
            print("<td><img src='img/botonrojo.png' width='20px'></td>");
        };
        
        print("<td>$port</td>");
        print("<td>$service</td>");
        print("</tr>");
    };
};
//tabla bbdd con los hosts
//tabla bbdd que relacione hosts y puertos
//tabla bbdd con todos los servicios
//panel de admin para modificar servicios de cada host
    ?>
    </table>
    <?php
    include("components/footer.php");
    ?>
</body>
</html>