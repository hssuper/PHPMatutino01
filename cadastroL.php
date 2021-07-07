<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Produto</title>
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
                        Cadastro de Livro
                    </div>

                    <?php
                    //envio dos dados para o BD
                    if (isset($_POST['cadastrarLivro'])) {
                        include_once 'controller/LivroController.php';
                        $titulo = $_POST['titulo'];
                        $autor = $_POST['autor'];
                        $editora = $_POST['editora'];
                        $qtdEstoque = $_POST['qtdEstoque'];


                        $l = new LivroController();
                        echo "<p>" . $l->inserirLivro($titulo, $autor, $editora, $qtdEstoque) . "</p>";
                    }
                    ?>
                    <div class="card-body border">
                        <form method="post" action="">
                            <div class="row">
                                <div class="col-md-6 offset-md-3">
                                    <label>Código: </label> <br> 
                                    <label>titulo</label>  
                                    <input class="form-control" type="text" 
                                           name="nomeProduto">
                                    <label>autor</label>  
                                    <input class="form-control" type="text" 
                                           name="vlrCompra">  
                                    <label>editora</label>  
                                    <input class="form-control" type="text" 
                                           name="vlrVenda"> 
                                    <label>Quantidade de Estoque</label>  
                                    <input class="form-control" type="number" 
                                           name="qtdEstoque">                    
                                    <input type="submit" name="cadastrarProduto"
                                           class="btn btn-success btInput" value="Enviar">
                                    &nbsp;&nbsp;
                                    <input type="reset" 
                                           class="btn btn-light btInput" value="Limpar">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row" style="margin-top:30px">
            <div class="table table_striped table-responsive">
                <thead class="table-dark" >
                    <tr><th>Código</th>
                        <th>Titulo</th>
                        <th>Autor</th>
                        <th>Editora</th>
                        <th>Estoque</th>
                        <th>Ações</th></tr>
                </thead>
                <tbody>
                    <?php
                    $pcTable = new LivroController();
                    $listaLivros = $pcTable->listarLivros();
                    $a = 0;
                    if ($listaLivros != null) {
                        foreach ($listaLivros as $l) {
                            $a++;
                            ?>
                        <tr>
                            <td><?php print_r($l->getIdLivro()); ?></td>
                            <td><?php print_r($l->getTitulo()); ?></td>
                            <td><?php print_r($l->getAutor()); ?></td>
                            <td><?php print_r($l->getEditora()); ?></td>
                            <td><?php print_r($l->getQtdEstoque()); ?></td>
                            <td><a class="btn btn-light" 
                                   href="#?id=<?php echo $l->getIdLivro(); ?>">
                                    <img src="" width="32"></a>
                                <button type="button" 
                                        class="btn btn-light" data-toggle="modal" 
                                        data-target=".modal_a<?php echo $a; ?>">
                                    <img src="" width="32"></button></td>
                        </tr>
                        <!-- janela modal Confirm. de Leitura -->
                   <!-- Modal -->
                   <div class="modal fade" id="exampleModal<?php echo $a;?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">deseja excluir</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Contexto....<?php echo $lp->getIdProduto(); ?>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary">Sim</button>
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Não</button>
                                            </div>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div> 
                    <!-- // janela modal Confirm. de Leitura -->
                    <?php
                }
                    }
                ?>
                </tbody>
            </div>
        </div>            
        <script src="js/bootstrap.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>



