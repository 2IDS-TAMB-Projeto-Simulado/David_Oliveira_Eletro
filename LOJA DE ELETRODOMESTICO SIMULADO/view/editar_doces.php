<?php
require_once "./../controller/controller_doces.php";

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
        <title>Editar Doce</title>
        <link rel="stylesheet" href="../css/style.css">
    </head>
    <body>
        <div class="navbar">
            <div class="container">
                <h1>Loja de Eletrodomésticos</h1>
                <div class="user-info">Editar Doce</div>
            </div>
        </div>
        <div class="container">
            <h2>Editar Doce</h2>
            <div class="form-card">
                <form action="" method="POST">
                    <div class="form-group">
                        <label for="titulo">Título:</label>
                        <input type="text" id="titulo" name="titulo" value="<?php echo $doce_editar["DOCE_TITULO"]; ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="descricao">Descrição:</label>
                        <input type="text" id="descricao" name="descricao" value="<?php echo $doce_editar["DOCE_DESCRICAO"]; ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="autor">Autor:</label>
                        <input type="text" id="autor" name="autor" value="<?php echo $doce_editar["DOCE_AUTOR"]; ?>" required>
                    </div>

                    <input type="submit" id="editar_doce" name="editar_doce" value="Salvar Alterações" class="btn">
                </form>
            </div>
            <div style="text-align: center; margin-top: 30px;">
                <a href="inicial.php" class="btn btn-secondary">Voltar</a>
            </div>
        </div>
    </body>
</html>
