<?php
// Path: Services\verificarEmail.php
// include connection file
include_once "connection.php";

// recebendo email do ajax
$email = $_POST['email'];

//verificando se o email já existe no banco de dados
$sql = "SELECT * FROM users WHERE email = '$email'";
// executando a query em pdo
$stmt = $pdo->prepare($sql);
$stmt->execute();

// se o email NÃO existir no banco de dados
if($stmt->rowCount() > 0){
    // retornar data = success para o ajax
    $data = array('data' => 'success');
    echo json_encode($data);
}else{
    // retornar data = error para o ajax
    $data = array('data' => 'error');
    echo json_encode($data);
}



?>