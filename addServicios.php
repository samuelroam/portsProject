<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        include('nav.php');
        include('connection.php');
        ?>
        <form action="addServicios.php" method="POST">
            <table>
                <tr>
                    <td><label>Puerto: <input type="text" name="puerto" id="puerto"></label></td>
                </tr>
                <tr>
                    <td><label>Servicio: <input type="text" name="servicio" id="servicio"></label></td>
                </tr>
                <tr>
                    <td><input type="submit" value="add" name="add"></td>
                </tr>
            </table>
        </form>
        <?php
            if(isset($_POST['add'])){
                echo("buenos dias");
                $puerto = $_POST['puerto'];
                $servicio = $_POST['servicio'];
                echo "$puerto.$servicio";
                $sql = "INSERT INTO estadopuertos (puerto,servicio) VALUES ('$puerto','$servicio')";
                $insert = mysqli_query($conn,$sql);
            }else{
                echo "buenas noches";
            };
        ?>
</body>
</html>