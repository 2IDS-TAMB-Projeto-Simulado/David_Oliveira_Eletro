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
        <title>Cadastro de Doces</title>
        <link rel="stylesheet" href="../css/style.css">
    </head>
    <body>
        <div class="navbar">
            <div class="container">
                <h1>Loja de Eletrodomésticos</h1>
                <div class="user-info">Cadastro de Doces</div>
            </div>
        </div>
        <div class="container">
            <h2>Cadastro de Doces</h2>
            <div class="form-card">
                <form action="./../controller/controller_doces.php" method="POST">
                    <div class="form-group">
                        <label for="titulo">Título:</label>
                        <input type="text" id="titulo" name="titulo" placeholder="Título..." required>
                    </div>

                    <div class="form-group">
                        <label for="descricao">Descrição:</label>
                        <input type="text" id="descricao" name="descricao" placeholder="Descricao..." required>
                    </div>

                    <div class="form-group">
                        <label for="autor">Autor:</label>
                        <input type="text" id="autor" name="autor" placeholder="Autor..." required>
                    </div>

                    <input type="submit" id="cadastrar_doce" name="cadastrar_doce" value="Cadastrar" class="btn">
                </form>
            </div>
            <div style="text-align: center; margin-top: 30px;">
                <a href="inicial.php" class="btn btn-secondary">Voltar</a>
            </div>
        </div>
    </body>
</html>
