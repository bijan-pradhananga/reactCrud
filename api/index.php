<?php
require_once "connection.php";
// Allow requests from any origin
header("Access-Control-Allow-Origin: *");

// Allow requests with the GET method
header("Access-Control-Allow-Methods: GET");

// Specify the content type as JSON
header("Content-Type: application/json");

$server =$_SERVER['REQUEST_METHOD'];

function getUser(){
    $sql = "SELECT * FROM users";
    $result = mysqli_query($GLOBALS['conn'], $sql);
    $users = mysqli_fetch_all($result, MYSQLI_ASSOC);
    echo json_encode($users);
}
if ($server == "GET"){
    getUser();
}else if($server == "POST"){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $sql = "INSERT INTO users (name, email, address) VALUES ('$name', '$email', '$address')";
    if (mysqli_query($conn, $sql)){
        echo json_encode(array("status"=>"success"));
    }else{
        echo json_encode(array("status"=>"failure"));
    }
}else if($server=="DELETE"){
    $myEntireBody = file_get_contents('php://input'); 
    $myBody = json_decode($myEntireBody);
    $id = $myBody->id;
    $sql = "DELETE FROM users WHERE id = $id";
    if (mysqli_query($conn, $sql)){
        echo json_encode(array("status"=>"success"));
    }else{
        echo json_encode(array("status"=>"failure"));
    }
   
}else if($server=="PUT"){
    $myEntireBody = file_get_contents('php://input');
    $myBody = json_decode($myEntireBody);
    $id = $myBody->id;
    $name = $myBody->name;
    $address = $myBody->address;
    $sql="UPDATE users SET name='$name', address='$address' WHERE id=$id";
    if (mysqli_query($conn, $sql)){
        echo json_encode(array("status"=>"success"));
    }else{
        echo json_encode(array("status"=>"failure"));
    }

}else{
    echo "Invalid request";
}


