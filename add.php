<?php 
include('database/database.php');
//decode json data
$_POST = json_decode(file_get_contents('php://input'), true);
if(isset($_POST) && !empty($_POST)){
    $nom = $_POST['nom'];
    $tel = $_POST['tel'];

    $query = "INSERT INTO contacts
            (  name ,  tel ) 
            VALUES ('$nom','$tel')";
        if(mysqli_query($con,$query)){
            echo '<div class="alert alert-success">Contact Added</div>';
        }else{
            echo 'erreur'.mysqli_error($con);
        }

}