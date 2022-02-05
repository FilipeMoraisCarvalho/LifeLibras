<?php
session_start();
include('conexao.php');

if (empty($_POST['usuariologin']) || empty($_POST['senhalogin'])) {
	header('Location: index.php');
	exit();
}

$usuario = mysqli_real_escape_string($conexao, $_POST['usuariologin']);
$senha = mysqli_real_escape_string($conexao, $_POST['senhalogin']);

$query = "select usuario from usuario where usuario = '{$usuario}' and senha = md5('{$senha}')";

$result = mysqli_query($conexao, $query);

$row = mysqli_num_rows($result);

if ($row == 1) {
	$_SESSION['usuario'] = $usuario;
	header('Location: menu.php');
	exit();
} else {
	$_SESSION['nao_autenticado'] = true;
	header('Location: index.php');
	exit();
}



