<?php
include_once('conexao.php');
?>
<div class="row" style="display: flex; align-items: center; justify-content: center;">
    <?php
    $licao = $conexao->query($query);
    while ($sql = mysqli_fetch_array($licao)) {
    ?>
        <div style="margin-top: 70px">
            <div class="col-sm">
                <div class="card card-text-gif">
                    <p style="text-align: center; font-size:20px; "><?= $sql['descricao']; ?></p>
                    <iframe class="gif-border" style="margin: 0 auto;" width="98%" height="auto" height="315" src="<?= $sql['url']; ?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    <?php
    }
    ?>
</div>

