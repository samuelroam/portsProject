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
    ?>
    <form action="#" method="post">
        <label for="user">usuario</label>
        <input type="text" name="user" id="user">
        <br>
        <label for="pass">password</label>
        <input type="text" name="pass" id="pass">
        <br>
        <input type="submit" name="send" value="send">
    </form>

    <?php
    if(isset($_POST['send'])){
        $user = $_POST['user'];
        $pass = $_POST['pass'];

        $sql = "SELECT user,pass from users where user='$user' and pass='$pass'";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) > 0){
            $row = mysqli_fetch_array($result);
            $_SESSION['user']= $row['user'];
            header('location: index.php');
        }
    };
    ?>
</body>
</html>