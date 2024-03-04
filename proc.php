<?php
$user = 'root';
$password = 'Coxa1909';
$database = 'php_local';
$host = 'localhost';

$conn = new mysqli($host, $user, $password, $database);

if($conn->error){
    die(''. $conn->error);
}

$sql = "CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP
)";

if($conn->query($sql) === TRUE) {
    echo "Tabela de usuários criada com sucesso!";
} else {
    echo "Erro ao criar tabela de usuários: " . $conn->error;
}

// phpinfo();

if(isset($_POST['username']) && isset($_POST['password'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $_SESSION['username'] = $username;

    $result = $conn->query("SELECT * FROM users WHERE username = '$username' AND password = '$password'");
    $result = $result->fetch_assoc();

    if($result){
        header('Location: http://localhost:8000/painel.html');
        exit;
    }else{
        header('Location: http://localhost:8000/login_incorreto.html');
        exit;
    }
    
} else {
    var_dump('oii');
}
?>