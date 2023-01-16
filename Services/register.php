<?php
// Path:
// include connection
include_once '../statics/connections.php';


// recebe dados do ajax json
$data = json_decode(file_get_contents("php://input"));
$username = $data->username;
$password = $data->password;
$email = $data->email;

// verifica se o username já existe
$sql = "SELECT * FROM users WHERE username = '$username'";

// executa a query PDO
$stmt = $pdo->prepare($sql);
$stmt->execute();

if($stmt->rowCount() > 0){
    // retorna data = error para o ajax
    $data = array('data' => 'error');
    echo json_encode($data);
}else{
    // se o username não existir, insere no banco de dados
    $sql = "INSERT INTO users (username, password, email) VALUES ('$username', '$password', '$email')";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    // retorna data = success para o ajax
    $data = array('data' => 'success');
    echo json_encode($data);
}  


?>