<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    include("components/nav.php");
    if(isset($_SESSION['user'])){
    print ("hasta pronto, ".$_SESSION['user']);
    }else{header('location: index.php');
    }
    session_destroy();
    include("components/footer.php");
    ?>
</body>
</html>