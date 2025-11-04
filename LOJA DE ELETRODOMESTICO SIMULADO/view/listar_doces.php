<?php
require_once "./../controller/controller_doces.php";

if(!isset($_SESSION['usuario'])){
    header("Location: login.php");
    exit();
}

$doce = new Doce();
if (isset($_POST['botao_pesquisar'])) {
    $resultados = $doce->filtrar_doce($_POST['pesquisar']);
}
else {
    $resultados = $doce->listar_doces();
}
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Lista de Doces</title>
        <link rel="stylesheet" href="../css/style.css">
    </head>
    <body>
        <div class="navbar">
            <div class="container">
                <h1>Loja de Eletrodomésticos</h1>
                <div class="user-info">Lista de Doces</div>
            </div>
        </div>
        <div class="container">
            <h2>Lista de Doces</h2>
            <div class="form-card">
                <form method="POST">
                    <div class="form-group">
                        <label for="pesquisar">Pesquisar:</label>
                        <input type="search" id="pesquisar" name="pesquisar" placeholder="Pesquisar...">
                    </div>
                    <input type="submit" id="botao_pesquisar" name="botao_pesquisar" value="Filtrar" class="btn">
                </form>
            </div>

            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Título</th>
                        <th>Descrição</th>
                        <th>Autor</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        if(count($resultados) > 0){
                            foreach($resultados as $r){
                                echo "<tr>";
                                echo "<td>".$r["DOCE_ID"]."</td>";
                                echo "<td>".$r["DOCE_TITULO"]."</td>";
                                echo "<td>".$r["DOCE_DESCRICAO"]."</td>";
                                echo "<td>".$r["DOCE_AUTOR"]."</td>";
                                echo "<td class='actions'>";
                                echo "<a href='editar_doces.php?acao=editar_doce&id=".$r["DOCE_ID"]."'>Editar</a> | ";
                                echo "<a href='./../controller/controller_doces.php?acao=excluir_doce&id=".$r["DOCE_ID"]."' onclick='return confirm(\"Tem certeza que deseja excluir?\")' class='btn-danger-link'>Excluir</a>";
                                echo "</td>";
                                echo "</tr>";
                            }
                        }
                        else{
                            echo "<tr>";
                            echo "<td colspan='5'>Nenhum doce cadastrado!</td>";
                            echo "</tr>";
                        }
                    ?>
                </tbody>
            </table>

            <div style="text-align: center; margin-top: 30px;">
                <a href="cadastro_doce.php" class="btn">Cadastrar Doce</a>
                <a href="inicial.php" class="btn btn-secondary">Voltar</a>
            </div>
        </div>
    </body>
</html>
