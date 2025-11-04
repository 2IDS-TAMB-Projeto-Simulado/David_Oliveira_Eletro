<?php
session_start();

if(!isset($_SESSION['usuario'])){
    header("Location: login.php");
    exit();
}

require_once __DIR__ . "/../controller/controller_eletrodomesticos.php";
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Cadastro de Eletrodomésticos</title>
        <link rel="stylesheet" href="../css/style.css">
    </head>
    <body>
        <div class="navbar">
            <div class="container">
                <h1>Loja de Eletrodomésticos</h1>
                <div class="user-info">Cadastro de Eletrodomésticos</div>
            </div>
        </div>
        <div class="container">
            <h2>Cadastro de Eletrodomésticos</h2>

            <!-- Formulário de Cadastro -->
            <div class="form-card">
                <form action="../controller/controller_eletrodomesticos.php" method="POST" id="form-cadastro">
                    <div class="form-group">
                        <label for="nome">Nome:</label>
                        <input type="text" id="nome" name="nome" placeholder="Nome do eletrodoméstico..." required>
                    </div>

                    <div class="form-group">
                        <label for="descricao">Descrição:</label>
                        <input type="text" id="descricao" name="descricao" placeholder="Descrição..." required>
                    </div>

                    <div class="form-group">
                        <label for="fornecedor">Fornecedor:</label>
                        <input type="text" id="fornecedor" name="fornecedor" placeholder="Fornecedor..." required>
                    </div>

                    <div class="form-group">
                        <label for="categoria">Categoria:</label>
                        <input type="text" id="categoria" name="categoria" placeholder="Categoria..." required>
                    </div>

                    <div class="form-group">
                        <label for="potencia">Potência:</label>
                        <input type="text" id="potencia" name="potencia" placeholder="Potência..." required>
                    </div>

                    <div class="form-group">
                        <label for="consumo_energetico">Consumo Energético:</label>
                        <input type="text" id="consumo_energetico" name="consumo_energetico" placeholder="Consumo energético..." required>
                    </div>

                    <div class="form-group">
                        <label for="garantia">Garantia:</label>
                        <input type="text" id="garantia" name="garantia" placeholder="Garantia..." required>
                    </div>

                    <div class="form-group">
                        <label for="prioridade_reposicao">Prioridade de Reposição:</label>
                        <select id="prioridade_reposicao" name="prioridade_reposicao" required>
                            <option value="Baixa">Baixa</option>
                            <option value="Média">Média</option>
                            <option value="Alta">Alta</option>
                        </select>
                    </div>

                    <input type="submit" name="cadastrar_eletrodomestico" value="Cadastrar" class="btn">
                </form>
            </div>

            <!-- Formulário de Busca -->
            <div class="form-card">
                <form action="" method="POST">
                    <div class="form-group">
                        <label for="campo">Buscar Eletrodoméstico:</label>
                        <input type="text" id="campo" name="campo" placeholder="Digite o nome...">
                    </div>
                    <input type="submit" name="filtrar_eletrodomesticos" value="Buscar" class="btn">
                </form>
            </div>

            <!-- Tabela de Listagem -->
            <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th>Fornecedor</th>
                    <th>Categoria</th>
                    <th>Potência</th>
                    <th>Consumo Energético</th>
                    <th>Garantia</th>
                    <th>Prioridade</th>
                    <th>Estoque</th>
                    <th>Limite Mínimo</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php if(isset($resultados) && !empty($resultados)): ?>
                    <?php foreach($resultados as $eletro): ?>
                        <tr>
                            <td><?php echo $eletro['ELETRO_ID']; ?></td>
                            <td><?php echo $eletro['ELETRO_NOME']; ?></td>
                            <td><?php echo $eletro['ELETRO_DESCRICAO']; ?></td>
                            <td><?php echo $eletro['ELETRO_FORNECEDOR']; ?></td>
                            <td><?php echo $eletro['ELETRO_CATEGORIA']; ?></td>
                            <td><?php echo $eletro['ELETRO_POTENCIA']; ?></td>
                            <td><?php echo $eletro['ELETRO_CONSUMO_ENERGETICO']; ?></td>
                            <td><?php echo $eletro['ELETRO_GARANTIA']; ?></td>
                            <td><?php echo $eletro['ELETRO_PRIORIDADE_REPOSICAO']; ?></td>
                            <td><?php echo $eletro['ESTOQUE_QUANTIDADE']; ?></td>
                            <td><?php echo $eletro['ESTOQUE_LIMITE_MINIMO']; ?></td>
                            <td class="actions">
                                <a href="?acao=editar_eletrodomestico&id=<?php echo $eletro['ELETRO_ID']; ?>">Editar</a> |
                                <a href="?acao=excluir_eletrodomestico&id=<?php echo $eletro['ELETRO_ID']; ?>" onclick="return confirm('Tem certeza que deseja excluir?')" class="btn-danger-link">Excluir</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr><td colspan="12">Nenhum eletrodoméstico encontrado.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>

            <!-- Formulário de Edição (oculto inicialmente) -->
            <?php if(isset($eletro_editar)): ?>
            <div class="form-card">
                <h2>Editar Eletrodoméstico</h2>
                <form action="../controller/controller_eletrodomesticos.php?id=<?php echo $eletro_editar['ELETRO_ID']; ?>" method="POST">
                    <div class="form-group">
                        <label for="edit-nome">Nome:</label>
                        <input type="text" id="edit-nome" name="nome" value="<?php echo $eletro_editar['ELETRO_NOME']; ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="edit-descricao">Descrição:</label>
                        <input type="text" id="edit-descricao" name="descricao" value="<?php echo $eletro_editar['ELETRO_DESCRICAO']; ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="edit-fornecedor">Fornecedor:</label>
                        <input type="text" id="edit-fornecedor" name="fornecedor" value="<?php echo $eletro_editar['ELETRO_FORNECEDOR']; ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="edit-categoria">Categoria:</label>
                        <input type="text" id="edit-categoria" name="categoria" value="<?php echo $eletro_editar['ELETRO_CATEGORIA']; ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="edit-potencia">Potência:</label>
                        <input type="text" id="edit-potencia" name="potencia" value="<?php echo $eletro_editar['ELETRO_POTENCIA']; ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="edit-consumo_energetico">Consumo Energético:</label>
                        <input type="text" id="edit-consumo_energetico" name="consumo_energetico" value="<?php echo $eletro_editar['ELETRO_CONSUMO_ENERGETICO']; ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="edit-garantia">Garantia:</label>
                        <input type="text" id="edit-garantia" name="garantia" value="<?php echo $eletro_editar['ELETRO_GARANTIA']; ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="edit-prioridade_reposicao">Prioridade de Reposição:</label>
                        <select id="edit-prioridade_reposicao" name="prioridade_reposicao" required>
                            <option value="Baixa" <?php if($eletro_editar['ELETRO_PRIORIDADE_REPOSICAO'] == 'Baixa') echo 'selected'; ?>>Baixa</option>
                            <option value="Média" <?php if($eletro_editar['ELETRO_PRIORIDADE_REPOSICAO'] == 'Média') echo 'selected'; ?>>Média</option>
                            <option value="Alta" <?php if($eletro_editar['ELETRO_PRIORIDADE_REPOSICAO'] == 'Alta') echo 'selected'; ?>>Alta</option>
                        </select>
                    </div>

                    <input type="submit" name="editar_eletrodomestico" value="Atualizar" class="btn">
                    <a href="cadastro_eletrodomestico.php" class="btn btn-secondary">Cancelar</a>
                </form>
            </div>
            <?php endif; ?>

            <div style="text-align: center; margin-top: 30px;">
                <a href="inicial.php" class="btn btn-secondary">Voltar</a>
            </div>
    </body>
</html>
