<?php
session_start();
session_destroy();
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login - Loja de Eletrodomésticos</title>
        <link rel="stylesheet" href="../css/style.css">
    </head>
    <body>
        <div class="container">
            <h1>Login - Loja de Eletrodomésticos</h1>
            <div class="form-card">
                <form action="../controller/controller_usuario.php" method="POST">
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" placeholder="Email..." required>
                    </div>

                    <div class="form-group">
                        <label for="senha">Senha:</label>
                        <input type="password" id="senha" name="senha" placeholder="Senha..." required>
                    </div>

                    <?php
                        session_start();
                        if(isset($_SESSION['erro_login'])){
                            echo "<div class='alert alert-error'>" . $_SESSION['erro_login'] . "</div>";
                            unset($_SESSION['erro_login']);
                        }
                    ?>

                    <input type="submit" id="login" name="login" value="Acessar" class="btn">
                </form>
            </div>
        </div>
    </body>
</html>
