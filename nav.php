<?php
session_start();
include('conexao.php');

if (!$_SESSION['usuario']) {
    header('Location: index.php');
    exit();
}
?>

<head>

    <link rel="shortcut icon" href="./img/icone.png" />


</head>
<input type="checkbox" id="chec">
<label for="chec">&#9776;</label>
<nav class="menu">
    <ul>
        <li><a href="menu.php">HOME</a></li>
        <?php
        //subcategoria.nome = s.nome
        $sql = "SELECT * FROM categoria ORDER BY id_cat";
        $result = $conexao->query($sql);
        while ($line = mysqli_fetch_array($result)) {
            $busca_sub = "SELECT s.nome, s.idPai FROM subcategoria s JOIN categoria c ON c.id_cat = s.idPai WHERE s.idPai = '" . $line['id_cat'] . "' ORDER BY s.idPai";
            $sub_buscado = $conexao->query($busca_sub);
        ?>
            <div class="dropdown">
                <li>
                    <a href="licaocat.php" value="<?= $line['nome']; ?>">
                        <?= $line['nome']; ?>
                    </a>
                    <ul>
                        <?php
                        while ($sub = mysqli_fetch_array($sub_buscado)) {
                        ?>
                            <li>
                                <a href="licaosub.php" value="<?= $sub['nome']; ?>">
                                    <?= $sub['nome']; ?>
                                </a>
                            </li>
                        <?php
                        }
                        ?>
                    </ul>
                <?php
            }
                ?>
                <li><a href="alfabeto.php">Alfabeto</a></li>
                <li><a href="#">Atividades</a></li>
                <li><a href="logout.php">Sair</a></li>
            </div>
    </ul>
</nav>