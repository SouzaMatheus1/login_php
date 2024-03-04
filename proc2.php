<?php
$user = 'root';
$password = 'Coxa1909';
$database = 'php_local';
$host = 'localhost';

$conn = new mysqli($host, $user, $password, $database);

if($conn->error){
    die(''. $conn->error);
}

if(isset($_POST['username']) && isset($_POST['password'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $result = $conn->query("INSERT INTO users SET username = '$username', password = '$password'");
    $result = $result->fetch_assoc();

    if($result){
        var_dump('sucesso!');
    }else{
        var_dump('falha');
    }

}