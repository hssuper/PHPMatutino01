<?php
include_once 'C:/xampp/htdocs/PHPMatutino01/controller/FornecedorController.php';
include_once 'C:/xampp/htdocs/PHPMatutino01/model/fornecedor.php';
$fr = new fornecedor();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Cadastro</title>
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <style>
            .btInput{
                padding: 10px 20px 10px 20px;
                margin-top: 20px;
                margin-bottom: 20px;
            }
            .pad15{
                padding-bottom: 15px; padding-top: 15px;
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
                <div class="col-md-4">
                    <div class="card-header bg-dark text-center border
                         text-white"><strong>Cadastro de Fornecedor</strong>
                    </div>
                    <div class="card-body border">
                        <?php
                        //envio dos dados para o BD
                        if (isset($_POST['cadastrarFornecedor'])) {
                            $nomeFornecedor = trim($_POST['nomeFornecedor']);
                            if ($nomeFornecedor != "") {
                                $logradouro = $_POST['logradouro'];
                                $numero = $_POST['numero'];
                                $bairro = $_POST['bairro'];
                                $cidade = $_POST['cidade'];
                                $uf = $_POST['uf'];
                                $cep = $_POST['cep'];
                                $representante = $_POST['representante'];
                                $email = $_POST['email'];
                                $telFixo = $_POST['telFixo'];
                                $telCel = $_POST['telCel'];
                                $complemento = $_POST['complemento'];


                                $fc = new FornecedorController();
                                unset($_POST['cadastrarFornecedor']);
                                echo $fc->inserirFornecedor($nomeFornecedor, $logradouro, $numero, $bairro, $cidade, $uf, $cep, $representante, $email, $telFixo, $telCel, $complemento);
                                echo "<META HTTP-EQUIV='REFRESH' CONTENT=\"2;
                                    URL='cadastroFornecedor.php'\">";
                            }
                        }

                        //método para atualizar dados do produto no BD
                        if (isset($_POST['atualizarFornecedor'])) {
                            $nomeFornecedor = trim($_POST['nomeFornecedor']);
                            if ($nomeFornecedor != "") {
                                $idfornecedor = $_POST['idFornecedor'];
                                $logradouro = $_POST['logradouro'];
                                $numero = $_POST['numero'];
                                $bairro = $_POST['bairro'];
                                $cidade = $_POST['cidade'];
                                $uf = $_POST['uf'];
                                $cep = $_POST['cep'];
                                $representante = $_POST['representante'];
                                $email = $_POST['email'];
                                $telFixo = $_POST['telFixo'];
                                $telCel = $_POST['telCel'];
                                $complemento = $_POST['complemento'];

                                $fc = new FornecedorController();
                                unset($_POST['atualizarFornecedor']);
                                echo $fc->atualizarFornecedor($idFornecedor, $nomeFornecedor, $logradouro, $numero, $bairro, $cidade, $uf, $cep, $representante, $email, $telFixo, $telCel, $complemento);
                                echo "<META HTTP-EQUIV='REFRESH' CONTENT=\"2;
                                    URL='cadastroFornecedor.php'\">";
                            }
                        }

                        if (isset($_POST['excluirFornecedor'])) {
                            if ($fr != null) {
                                $idFornecedor = $_POST['idFornecedor'];
                                $fc = new FornecedorController();
                                $fc->excluirFornecedor($idFornecedor);
                            }
                        }

                        if (isset($_POST['limpar'])) {
                            $fr = null;
                            unset($_GET['idFornecedor']);
                            header("Location: cadastroFornecedor.php");
                        }
                        if (isset($_GET['idFornecedor'])) {
                            $idFornecedor = $_GET['idFornecedor'];
                            $fc = new FornecedorController();
                            $fr = $fc->pesquisarFornecedorId($idFornecedor);
                        }
                        ?>
                        <form method="post" action="">
                            <div class="row">
                                <div class="col-md-12">
                                    <strong>Código: <label style="color:blue;">
                                            <?php
                                            if ($fr != null) {

                                                echo
                                                $fr->getIdFornecedor();
                                                ?>
                                            </label></strong>
                                        <input type="hidden" name="idFornecedor" 
                                               value="<?php echo $fr->getIdFornecedor(); ?>"><br>
                                               <?php
                                           }
                                           ?>   

                                    <label>Nome Fornecedor</label>  
                                    <input class="form-control" type="text" 
                                           name="nomeFornecedor" 
                                           value="<?php echo $fr->getNomeFornecedor(); ?>">

                                    <label>Logradouro</label>  
                                    <input class="form-control" type="text" 
                                           value="<?php echo $fr->getLogradouro(); ?>" name="logradouro">

                                    <label>Numero</label>  
                                    <input class="form-control" type="number" 
                                           value="<?php echo $fr->getNumero(); ?>" name="numero"> 

                                    <label>Bairro</label>  
                                    <input class="form-control" type="text" 
                                           value="<?php echo $fr->getBairro(); ?>" name="bairro">

                                    <label>Cidade</label>  
                                    <input class="form-control" type="text" 
                                           value="<?php echo $fr->getCidade(); ?>" name="cidade">

                                    <label>Uf</label>  
                                    <input class="form-control" type="text" 
                                           value="<?php echo $fr->getUf(); ?>" name="uf">

                                    <label>Cep</label>  
                                    <input class="form-control" type="number" 
                                           value="<?php echo $fr->getCep(); ?>" name="cep">

                                    <label>Representante</label>  
                                    <input class="form-control" type="text" 
                                           value="<?php echo $fr->getRepresentante(); ?>" name="representante">

                                    <label>Email</label>  
                                    <input class="form-control" type="text" 
                                           value="<?php echo $fr->getEmail(); ?>" name="email">
                                    <label>TelFixo</label>  
                                    <input class="form-control" type="number" 
                                           value="<?php echo $fr->getTelFixo(); ?>" name="telFixo">
                                    <label>TelCel</label>  
                                    <input class="form-control" type="number" 
                                           value="<?php echo $fr->getTelCel(); ?>" name="telCel">
                                    <label>Complemento</label>  
                                    <input class="form-control" type="text" 
                                           value="<?php echo $fr->getComplemento(); ?>" name="complemento">

                                    <input type="submit" name="cadastrarFornecedor"
                                           class="btn btn-success btInput" value="Enviar">
                                    <input type="submit" name="atualizarFornecedor"
                                           class="btn btn-light btInput" value="Atualizar">
                                    <button type="button" class="btn btn-warning btInput" 
                                            data-bs-toggle="modal" data-bs-target="#ModalExcluir">
                                        Excluir
                                    </button>
                                    <!-- Modal para excluir -->
                                    <div class="modal fade" id="ModalExcluir" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" 
                                                        id="exampleModalLabel">
                                                        Confirmar Exclusão</h5>
                                                    <button type="button" 
                                                            class="btn-close" 
                                                            data-bs-dismiss="modal"
                                                            aria-label="Close">
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <h5>Deseja Excluir?</h5>
                                                </div>
                                                <div class="modal-footer">
                                                    <input type="submit" name="excluirFornecedor"
                                                           class="btn btn-success "
                                                           value="Sim">
                                                    <input type="submit" 
                                                           class="btn btn-light btInput" 
                                                           name="limpar" value="Não">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- fim do modal para excluir -->
                                    &nbsp;&nbsp;
                                    <input type="submit" 
                                           class="btn btn-light btInput" name="limpar" value="Limpar">
                                </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-striped table-responsive"
                               style="border-radius: 3px; overflow:hidden;">
                            <thead class="table-dark">
                                <tr><th>Código</th>
                                    <th>Nome Fornecedor</th>
                                    <th>Logradouro</th>
                                    <th>Numero</th>
                                    <th>Bairro</th>
                                    <th>Cidade</th>
                                    <th>Uf</th>
                                    <th>Cep</th>
                                    <th>Representante</th>
                                    <th>Email</th>
                                    <th>TelFixo</th>
                                    <th>TelCel</th>
                                    <th>Complemento</th>
                                    <th>Ações</th></tr>
                            </thead>
                            <tbody>
                                <?php
                                $fTable = new FornecedorController();
                                $listaFornecedor = $fTable->listarFornecedor();
                                $a = 0;
                                if ($listaFornecedor != null) {
                                    foreach ($listaFornecedor as $lf) {
                                        $a++;
                                        ?>
                                        <tr>
                                            <td><?php print_r($lf->getIdFornecedor()); ?></td>
                                            <td><?php print_r($lf->getNomeFornecedor()); ?></td>
                                            <td><?php print_r($lf->Logradouro()); ?></td>
                                            <td><?php print_r($lf->Numero()); ?></td>
                                            <td><?php print_r($lf->Bairro()); ?></td>
                                            <td><?php print_r($lf->Cidade()); ?></td>
                                            <td><?php print_r($lf->Uf()); ?></td>
                                            <td><?php print_r($lf->Cep()); ?></td>
                                            <td><?php print_r($lf->Representante()); ?></td>
                                            <td><?php print_r($lf->Email()); ?></td>
                                            <td><?php print_r($lf->TelFixo()); ?></td>
                                            <td><?php print_r($lf->TelCel()); ?></td>
                                            <td><?php print_r($lf->Complemento()); ?></td>
                                            <td><a href="cadastroFornecedor.php?id=<?php echo $lf->getIdFornecedor(); ?>"
                                                   class="btn btn-light">
                                                    <img src="img/edit.png" width="32"></a>
                                                </form>
                                                <button type="button" 
                                                        class="btn btn-light" data-bs-toggle="modal" 
                                                        data-bs-target="#exampleModal<?php echo $a; ?>">
                                                    <img src="img/delete.png" width="32"></button></td>
                                        </tr>
                                        <!-- Modal -->
                                    <div class="modal fade" id="exampleModal<?php echo $a; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                                    <button type="button" class="btn-close" 
                                                            data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form method="get" action="controller/excluiFornecedor.php">
                                                        <label><strong>Deseja excluir o Fornecedor 
                                                                <?php echo $f->getNomeFornecedor(); ?>?</strong></label>
                                                        <input type="hidden" name="idFornecedor" 
                                                               value="<?php echo $f->getIdFornecedor(); ?>">
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-primary">Sim</button>
                                                            <button type="reset" class="btn btn-secondary" 
                                                                    data-bs-dismiss="modal">Não</button>
                                                        </div>
                                                    </form>
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
            </div>
        </div>     
    </div>


    <script src="js/bootstrap.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script>
        var myModal = document.getElementById('myModal')
        var myInput = document.getElementById('myInput')

        myModal.addEventListener('shown.bs.modal', function () {
            myInput.focus()
        })
    </script> 
</body>
</html>





