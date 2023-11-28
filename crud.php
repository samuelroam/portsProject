<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de servicios</title>
</head>
<body>
    <?php
include("components/connection.php");
        if(isset($_POST['modificar'])){
            $id = $_POST['id'];
            $port = $_POST['port'];
            $service = $_POST['service'];
            $sql = "UPDATE estadopuertos SET puerto=$port,servicio='$service' where id = $id;";
            if(mysqli_query($conn,$sql )){
                echo "Registro actualizado.";
                header("Location: panelAdmin.php");
            } else {
                echo "ERROR: No se ejecuto $sql. " . mysqli_error($conn);
            };
        };
        

        $id= $_GET['id'];
        $sql = "DELETE from estadopuertos where id=$id";
        if(mysqli_query($conn,$sql )){
            echo 'Registro eliminado';
            header("Location: panelAdmin.php");
        } else {
            echo 'Error: '. mysqli_error($conn);
        };
        include("components/footer.php");
        ?>
</body>
</html>