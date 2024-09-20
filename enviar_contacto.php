<?php 

require_once('bd.php');

/* http_response_code(500); */
if(isset($_POST['nome'],$_POST['email'], $_POST['mensagem'] )){
    $nome= filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $email= filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $mensagem= filter_input(INPUT_POST, 'mensagem', FILTER_SANITIZE_FULL_SPECIAL_CHARS);


//criar tabela para armazenar mensagem

$stmt= $pdo-> prepare("INSERT INTO contatos(nome, email,mensagem) VALUES (?,?,?)");
$stmt->execute([$nome,$email,$mensagem]);

echo "Mensagem Enviada!!";}

else {
     http_response_code(500);

}

?>