<?php

$host="localhost";
$user="root";
$password="";
$db="bca4thsemproject";

$conn = mysqli_connect($host,$user,$password,$db);

if(!$conn){
    echo "Database connection failed";
}