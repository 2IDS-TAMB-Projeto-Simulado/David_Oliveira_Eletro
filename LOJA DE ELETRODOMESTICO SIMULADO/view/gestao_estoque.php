<?php
session_start();

if(!isset($_SESSION['usuario'])){
    header("Location: login.php");
    exit();
}

require_once __DIR__ . "/../controller/controller_estoque.php";
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Gestão de Estoque</title>
        <link rel="stylesheet" href="../css/style.css">
    </head>
    <body>
        <div class="navbar">
            <div class="container">
                <h1>Loja de Eletrodomésticos</h1>
                <div class="user-info">Gestão de Estoque</div>
            </div>
        </div>
        <div class="container">
            <h2>Gestão de Estoque</h2>

            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Descrição</th>
                        <th>Fornecedor</th>
                        <th>Categoria</th>
                        <th>Quantidade no Estoque</th>
                        <th>Limite Mínimo</th>
                        <th>Status</th>
                        <th>Ação</th>
                        <th>Quantidade</th>
                        <th>Data da Movimentação</th>
                        <th>Movimentar Estoque</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        if(count($eletrodomesticos) > 0){
                            foreach($eletrodomesticos as $e){
                                $status = ($e["ESTOQUE_QUANTIDADE"] <= $e["ESTOQUE_LIMITE_MINIMO"]) ? "<span class='alerta'>Abaixo do mínimo</span>" : "OK";
                                echo "<form method='POST' action='../controller/controller_estoque.php'>";
                                echo "<tr>";
                                echo "<td><input type='number' name='eletro_id' value='".$e["ELETRO_ID"]."' readonly></td>";
                                echo "<td>".$e["ELETRO_NOME"]."</td>";
                                echo "<td>".$e["ELETRO_DESCRICAO"]."</td>";
                                echo "<td>".$e["ELETRO_FORNECEDOR"]."</td>";
                                echo "<td>".$e["ELETRO_CATEGORIA"]."</td>";
                                echo "<td>".$e["ESTOQUE_QUANTIDADE"]."</td>";
                                echo "<td>".$e["ESTOQUE_LIMITE_MINIMO"]."</td>";
                                echo "<td>".$status."</td>";
                                echo "<td>
                                            <select id='acao_estoque' name='acao_estoque' required>
                                                <option value=''>Selecione...</option>
                                                <option value='entrada'>Entrada no Estoque</option>
                                                <option value='saida'>Saída do Estoque</option>
                                            </select>
                                        </td>";
                                echo "<td><input type='number' id='qtd_movimentacao' name='qtd_movimentacao' min='1' required></td>";
                                echo "<td><input type='datetime-local' id='data_movimentacao' name='data_movimentacao' required></td>";
                                echo "<td><input type='submit' id='botao_movimentar' name='botao_movimentar' value='Movimentar' class='btn btn-secondary'></td>";
                                echo "</tr>";
                                echo "</form>";
                            }
                        }
                        else{
                            echo "<tr>";
                            echo "<td colspan='12'>Nenhum eletrodoméstico cadastrado!</td>";
                            echo "</tr>";
                        }
                    ?>
                </tbody>
            </table>

            <div style="text-align: center; margin-top: 30px;">
                <a href="inicial.php" class="btn btn-secondary">Voltar</a>
            </div>
    </body>
</html>
