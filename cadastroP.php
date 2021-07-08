<?php
include_once 'controller/ProdutoController.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Login</title>
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <style>
            .btInput{
                padding: 10px 20px 10px 20px;
                margin-top: 20px;
                margin-bottom: 20px;
            }
        </style>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Navbar</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Features</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Pricing</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Dropdown link
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container-fluid">
            <div class="row" style="margin-top: 30px;">
                <div class="col-8 offset-2">

                    <div class="card-header bg-light text-center border"
                         style="padding-bottom: 15px; padding-top: 15px;">
                        Cadastro de Produto
                    </div>
                    <div class="card-body border">
                        <?php
                        //envio dos dados para o BD
                        if (isset($_POST['cadastrarProduto'])) {
                            $nomeProduto = $_POST['nomeProduto'];
                            $vlrCompra = $_POST['vlrCompra'];
                            $vlrVenda = $_POST['vlrVenda'];
                            $qtdEstoque = $_POST['qtdEstoque'];

                            $pc = new ProdutoController();
                            echo $pc->inserirProduto($nomeProduto, $vlrCompra, $vlrVenda, $qtdEstoque);
                            $_POST['cadastrarProduto'] = null;
                        }
                        ?>
                        <form method="post" action="">
                            <div class="row">
                                <div class="col-md-6 offset-md-3">
                                    <label>Código: </label> <br> 
                                    <label>Produto</label>  
                                    <input class="form-control" type="text" 
                                           name="nomeProduto">
                                    <label>Valor de Compra</label>  
                                    <input class="form-control" type="text" 
                                           name="vlrCompra">  
                                    <label>Valor de Venda</label>  
                                    <input class="form-control" type="text" 
                                           name="vlrVenda"> 
                                    <label>Qtde em Estoque</label>  
                                    <input class="form-control" type="number" 
                                           name="qtdEstoque">
                                    <input type="submit" name="cadastrarProduto"
                                           class="btn btn-success btInput" value="Enviar">
                                    &nbsp;&nbsp;
                                    <input type="reset" 
                                           class="btn btn-light btInput" value="Limpar">
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row" style="margin-top: 30px;">
            <table class="table table-striped table-responsive">
                <thead class="table-dark">
                    <tr><th>Código</th>
                        <th>Nome</th>
                        <th>Compra (R$)</th>
                        <th>Venda (R$)</th>
                        <th>Estoque</th>
                        <th>Ações</th></tr>
                </thead>
                <tbody>
                    <?php
                    $pcTable = new ProdutoController();
                    $listaProdutos = $pcTable->listarProdutos();
                    $a = 0;
                    if ($listaProdutos != null) {
                        foreach ($listaProdutos as $lp) {
                            $a++;
                            ?>
                            <tr>
                                <td><?php print_r($lp->getIdProduto()); ?></td>
                                <td><?php print_r($lp->getNomeProduto()); ?></td>
                                <td><?php print_r($lp->getVlrCompra()); ?></td>
                                <td><?php print_r($lp->getVlrVenda()); ?></td>
                                <td><?php print_r($lp->getQtdEstoque()); ?></td>
                                <td><a class="btn btn-light" 
                                       href="#?id=<?php echo $lp->getIdProduto(); ?>">
                                        <img src="img/edita.png" width="32"></a>
                                    <button type="button" 
                                            class="btn btn-light" data-bs-toggle="modal" 
                                            data-bs-target="#exampleModal<?php echo $a;?>">
                                        <img src="img/delete.png" width="32"></button></td>
                            </tr>
                    <!-- Modal -->
                  <div class="modal-header">
                                        <div id="excluir" class="uk-modal" >
                                            Contexto....<?php echo $lp->getIdProduto(); ?>
                                            <div class="uk-modal-dialog">
                                                <div class="uk-modal-header">Excluir</div>
                                                Deseja mesmo excluir a tarefa?
                                                <div class="uk-modal-footer uk-text-right">
                                                    <a class="uk-button" href="">Não</a>
                                                    <a class="uk-button uk-button-primary" type="submit" name="botaoConfirma" value="true" href="painel_constru.php?constru=tarefas">Sim</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                        <?php
                    }
                }
                ?>
                </tbody>
            </table>
        </div>     
    </div>
    <script src="js/bootstrap.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>

