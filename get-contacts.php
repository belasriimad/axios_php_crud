<?php 
include('database/database.php');

    $sql = 'SELECT * FROM contacts';
    $results = mysqli_query($con,$sql);
    if($results->num_rows > 0){
        while($row = $results->fetch_assoc()){
            echo '
                <tr>
                    <td>'.$row['name'].'</td>
                    <td>'.$row['tel'].'</td>
                    <td><a onclick="getContact('.$row['id'].')" title="update" class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i></a></td>
                    <td><a onclick="deleteContact('.$row['id'].')" title="delete" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a></td>
                </tr>
            ';
        }
    }else{
        return false;
    }