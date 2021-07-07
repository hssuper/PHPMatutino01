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


                        $pc = new ProdutoController();
                        echo "<p>" . $pc->inserirProduto($titulo, $autor, $editora, $qtdEstoque) . "</p>";
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
                    $livroTable = new LivroController();
                    $listaLivros = $livroTable->listarLivros();
                    foreach ($listaLivros as $l) {
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
            <div class="modal fade modal_a<?php echo $a;?>" role="dialog" tabindex="-1" aria-hidden="true">
            	<div class="modal-dialog">
                	<div class="modal-content">
                    	<div class="modal-header">
                        	<button type="button" class="close" data-dismiss="modal">
                            	<span aria-hidden="true">&times;</span>
                                <span class="sr-only">Confirmação de leitura do aviso</span>
                            </button>
                        	<h4 class="modal-title">Confirmar Leitura</h4>
                        </div>
                        <div class="modal-body">
                        	<form name="confirmaAviso" method="post" action="" >
                            <div class="form-group">
                        
                                Comandos de confirmação
                                <div class="form-group"><br>
                                    <input type="submit" name="confirmar" value="&nbsp; Confirmo a leitura &nbsp;" class="btn btn-primary btn-lg" />
                                    <input type="reset" value="&nbsp;&nbsp; Cancelar &nbsp;&nbsp;" class="btn btn-danger btn-lg" data-dismiss="modal"/>
                                     </form>
	                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> 
        <!-- // janela modal Confirm. de Leitura -->
                        <?php
                    }
                
                ?>
                </tbody>
            </div>
        </div>            
        <script src="js/bootstrap.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>



