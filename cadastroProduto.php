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
                        Cadastro de Produto
                    </div>
                    <?php
                    //envio dos dados para o BD
                    if (isset($_POST['cadastrarProduto'])) {
                        include_once 'controller/ProdutoController.php';
                        $nomeProduto = $_POST['nomeProduto'];
                        $vlrCompra = $_POST['vlrCompra'];
                        $vlrVenda = $_POST['vlrVenda'];
                        $qtdEstoque = $_POST['qtdEstoque'];
                        

                        $pc = new ProdutoController();
                        echo "<p>" . $pc->inserirProduto($nomeProduto, $vlrCompra, $vlrVenda, $qtdEstoque) . "</p>";
                    }
                    ?>
                    <div class="card-body border">
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
                                    <label>Quantidade de Estoque</label>  
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
                            <div class="row" style="margin-top:30px">
                                <div class="table table_striped table-responsive" >
                                    <thead class="table-dark" >
                                        <th>Código</th>
                                        <th>Nome</th>
                                        <th>Compra (R$)</th>
                                        <th>Venda (R$)</th>
                                        <th>Estoque</th>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $pcTable = new ProdutoController();
                                        $lp = $pcTable->listarProdutos();
                                        foreach ($listaProdutos as $lp){
                                            print_r("<tr><td>".$lp['id']."</td>");
                                            print_r("<tr><td>".$lp['nome']."</td>");
                                            print_r("<tr><td>".$lp['vlrCompra']."</td>");
                                            print_r("<tr><td>".$lp['vlrVenda']."</td>");
                                            print_r("<tr><td>".$lp['qtdEstoque']."</td>");                                     
                                        }
 
                                        ?>
                                    </tbody>
                            </div>
                </div>            
                <script src="js/bootstrap.js"></script>
                <script src="js/bootstrap.min.js"></script>
                </body>
                </html>

