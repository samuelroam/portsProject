<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
</head>
<body>
    <?php
    include("components/nav.php");
    
    ?>
    <form action="#" method="post">
        <label for="user">usuario</label>
        <input type="text" name="user" id="user">
        <br>
        <label for="pass">password</label>
        <input type="password" name="pass" id="pass">
        <br>
        <input type="submit" name="send" value="send">
    </form>

    <?php
    include("components/connection.php");
    if(isset($_POST['send'])){
        $user = $_POST['user'];
        $pass = $_POST['pass'];

        $sql = "SELECT user,pass,rol from users where user='$user' and pass='$pass'";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) > 0){
            $row = mysqli_fetch_array($result);
            $_SESSION['user']= $row['user'];
            $_SESSION['rol']=$row['rol'];
            header('location: index.php');
        }
        $fecha = date("Y-m-d H:i:s");
        $logsql = "INSERT INTO logsUserTries (user,pass,fecha) values ('$user','$pass','$fecha')";
        $logs = mysqli_query($conn, $logsql);
        
    };include("components/footer.php");
    ?>
</body>
</html>