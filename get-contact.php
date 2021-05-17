<?php 
include('database/database.php');
    $_POST = json_decode(file_get_contents('php://input'), true);
    $id = htmlspecialchars(trim($_POST['id']));
    $sql = "SELECT * FROM contacts WHERE id='$id'";
    $results = mysqli_query($con,$sql);
    if($results->num_rows > 0){
        while($row = $results->fetch_assoc()){
            echo json_encode($row);
        }
    }else{
        return false;
    }