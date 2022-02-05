<?php
include("conexao.php");

$usuario = mysqli_real_escape_string($conexao, $_POST['usuariocadastro']);
$email = mysqli_real_escape_string($conexao, $_POST['emailcadastro']);
$senha = mysqli_real_escape_string($conexao, $_POST['senhacadastro']);

$query = "select usuario from usuario where usuario = '{$usuario}' or email = '{$email}'";

$result = mysqli_query($conexao, $query);

$row = mysqli_num_rows($result);

if ($row > 0) {
    http_response_code(500);
} else {
    mysqli_query($conexao, "insert into usuario(email, usuario, senha) values ('$email','$usuario',md5('$senha'))");
    http_response_code(200);
}
