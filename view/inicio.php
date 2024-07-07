
<?php 

    session_start();

    if(isset($_SESSION['usuario'])){
    
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <?php  require_once"menu.php"; ?>

</head>
<body>
    
    <h1>aqui va la bienvenida bien bonita, lo hare con más calma</h1>


</body>
</html>


<?php 

    }else{
        header("location:../index.php");
    }

?>




