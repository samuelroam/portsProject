<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AdminPanel</title>
</head>
<body>
    <?php
        include("components/nav.php");
        include("components/connection.php");
        $sql = "SELECT id,puerto, servicio from estadopuertos;";
    $result = mysqli_query($conn,$sql);
    $cantidad = mysqli_num_rows($result);
    print "<table>";
    for ($i = 0; $i < $cantidad; $i++) {$row = mysqli_fetch_array($result);
        $id = $row['id'];
        $port = $row['puerto'];
        $service = $row['servicio'];
        print("<form action='crud.php' method='post'>");
        print("<tr>");
        print("<td><input type='hidden' value='$id' name='id' id='id'></td>");
        print("<td><input type='text' value='$port' name='port' id='port'></td>");
        print("<td><input type='text' value='$service' name='service' id='service'></td>");
        
        print("<td><input type='submit' name='modificar' value='modificar'></td>");
        echo "<td><a href='crud.php?id=$id'><input type='button' value='delete'></button></a></td>";
        //print("<td><input type='submit' name='eliminar' value='eliminar'></td>");
        print("</tr>");
        print("</form>");
    };
    print "</table>";
    
    ?>
<a href="#"><input type="button" value="test"></a>

<?php
include("components/footer.php");
?>
</body>
</html>