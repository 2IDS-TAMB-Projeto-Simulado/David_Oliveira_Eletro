<?php
session_start();
if(!isset($_SESSION['usuario'])){
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Página Inicial - Loja de Eletrodomésticos</title>
        <link rel="stylesheet" href="../css/style.css">
    </head>
    <body>
        <div class="navbar">
            <div class="container">
                <h1>Loja de Eletrodomésticos</h1>
                <div class="user-info">Bem vindo, <?php echo $_SESSION['usuario']['USU_NOME']; ?>!</div>
            </div>
        </div>
        <div class="container">
            <h2>Página Inicial</h2>
            <div style="text-align: center; margin-top: 50px;">
                <a href="cadastro_eletrodomestico.php" class="btn">Cadastro de Eletrodomésticos</a>
                <a href="gestao_estoque.php" class="btn">Gestão de Estoque</a>
                <a href="../controller/controller_usuario.php?acao=logout" class="btn btn-secondary">Logout</a>
            </div>
        </div>
    </body>
</html>
