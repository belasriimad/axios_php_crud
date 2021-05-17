<?php 
include('database/database.php');
    $_POST = json_decode(file_get_contents('php://input'), true);
    $id = htmlspecialchars(trim($_POST['id']));
    $nom = $_POST['nom'];
    $tel = htmlspecialchars(trim($_POST['tel']));

    $sql = "UPDATE contacts SET name='$nom',tel='$tel' WHERE id='$id'";
    if(mysqli_query($con,$sql)){
        echo '<div class="alert alert-success">Contact Updated</div>';
    }else{
        echo 'erreur'.mysqli_error($con);
    }