<?php

require_once 'C:/xampp/htdocs/PHPMatutino01/bd/Conecta.php';
require_once 'C:/xampp/htdocs/PHPMatutino01/model/fornecedor.php';

class daoFornecedor {

    public $conn;

    function inserir(fornecedor $fornecedor) {
        $conn = new Conecta();
        if ($conn->conectadb()) {
            
            $nomeFornecedor = $fornecedor->getNomeFornecedor();
            $logradouro = $fornecedor->getLogradouro();
            $numero = $fornecedor->getNumero();
            $bairro = $fornecedor->getBairro();
            $cidade = $fornecedor->getCidade();
            $uf = $fornecedor->getUf();
            $cep = $fornecedor->getCep();
            $representante = $fornecedor->getRepresentante();
            $email = $fornecedor->getEmail();
            $telFixo = $fornecedor->getTelFixo();
            $telCel = $fornecedor->getTelCel();
            $complemento = $fornecedor->getComplemento();

            $sql = "insert into fornecedor values(null, '$nomeFornecedor',"
                    . "'$logradouro','$numero','$bairro','$cidade','$uf','$cep','$representante','$email','$telFixo','$telCel','$complemento')";
            $resp = mysqli_query($conn->conectadb(), $sql) or 
                    die($conn->conectadb());
            if ($resp) {
                $msg = "<p style='color: green;'>"
                        . "Dados Cadastrados com sucesso</p>";
            } else {
                $msg = $resp;
            }
        } else {
            $msg = "<p style='color: red;'>"
                    . "Erro na conexão com o banco de dados.</p>";
        }
        mysqli_close($conn->conectadb());
        return $msg;
    }

    public function atualizarFornecedorDAO(fornecedor $fornecedor) {
        $conn = new Conecta();
        if ($conn->conectadb()) {
            $idFornecedor = $fornecedor->getIdFornecedor();
            $nomeFornecedor = $fornecedor->getNomeFornecedor();
            $logradouro = $fornecedor->getLogradouro();
            $numero = $fornecedor->getNumero();
            $bairro = $fornecedor->getBairro();
            $cidade = $fornecedor->getCidade();
            $uf = $fornecedor->getUf();
            $cep = $fornecedor->getCep();
            $representante = $fornecedor->getRepresentante();
            $email = $fornecedor->getEmail();
            $telFixo = $fornecedor->getTelFixo();
            $telCel = $fornecedor->getTelCel();
            $complemento = $fornecedor->getComplemento();

            $sql = "update fornecedor set nomeFornecedor = '$nomeFornecedor',"
                    . "logradouro = '$logradouro', numero = '$numero', "
                    . "bairro = '$bairro','cidade = '$cidade','uf = '$uf','cep = '$cep','representante = '$representante','email = '$email','telFixo = '$telFixo','telCel = '$telCel','complemento  =  '$complemento' where idFornecedor = '$idFornecedor'";
            $resp = mysqli_query($conn->conectadb(), $sql) or
                    die($conn->conectadb());
            if ($resp) {
                $msg = "<p style='color: blue;'>"
                        . "Dados atualizados com sucesso</p>";
            } else {
                $msg = $resp;
            }
        } else {
            $msg = "<p style='color: red;'>"
                    . "Erro na conexão com o banco de dados.</p>";
        }
        mysqli_close($conn->conectadb());
        return $msg;
    }

    public function listarFornecedorDAO() {
        $conn = new Conecta();
        if ($conn->conectadb()) {
            $sql = "select * from fornecedor";
            $query = mysqli_query($conn->conectadb(), $sql);
            $result = mysqli_fetch_array($query);
            $lista = array();
            $a = 0;
            if ($result) {
                do {
                    $fornecedor = new Fornecedor();
                    $fornecedor->setIdFornecedor($result['idFornecedor']);
                    $fornecedor->setNomeFornecedor($result['nomeFornecedor']);
                    $fornecedor->setLogradouro($result['logradouro']);
                    $fornecedor->setNumero($result['numero']);
                    $fornecedor->setBairro($result['bairro']);
                    $fornecedor->setCidade($result['cidade']);
                    $fornecedor->setUf($result['uf']);
                    $fornecedor->setCep($result['cep']);
                    $fornecedor->setRepresentante($result['representante']);
                    $fornecedor->setEmail($result['email']);
                    $fornecedor->setTelFixo($result['telFixo']);
                    $fornecedor->setTelCel($result['telCel']);
                    $fornecedor->setComplemento($result['Complemento']);

                    $lista[$a] = $fornecedor;
                    $a++;
                } while ($result = mysqli_fetch_array($query));
            }
            mysqli_close($conn->conectadb());
            return $lista;
        }
    }

    public function excluirFornecedorDAO() {
        $conn = new Conecta();
        $conecta = $conn->conectadb();
        if ($conecta) {
            $sql = "delete from fornecedor where idFornecedor = '$idFornecedor'";
            mysqli_query($conecta, $sql);
            header("Location: cadastroFornecedor.php");
            mysqli_close($conecta);
            exit;
        } else {
            echo "<script>alert('Banco inoperante!')</script>";
            echo "<META HTTP-EQUIV='REFRESH' CONTENT=\"0;
			 URL='../cadastroProduto.php'\">";
        }
    }

    public function pesquisarFornecedorIdDAO($id) {
        $conn = new Conecta();
        $conecta = $conn->conectadb();
        $fornecedor = new Livro();
        if ($conecta) {
            $sql = "select * from fornecedor where idFornecedor = '$idFornecedor'";
            $result = mysqli_query($conecta, $sql);
            $linha = mysqli_fetch_assoc($result);
            if ($linha) {
                do {
                    $fornecedor->setIdFornecedor($linha['idFornecedor']);
                    $fornecedor->setNomeFornecedor($linha['nomeFornecedor']);
                    $fornecedor->setLogradouro($linha['logradouro']);
                    $fornecedor->setNumero($linha['numero']);
                    $fornecedor->setBairro($linha['bairro']);
                    $fornecedor->setCidade($linha['cidade']);
                    $fornecedor->setUf($linha['uf']);
                    $fornecedor->setCep($linha['cep']);
                    $fornecedor->setRepresentante($linha['representante']);
                    $fornecedor->setEmail($linha['email']);
                    $fornecedor->setTelFixo($linha['telFixo']);
                    $fornecedor->setTelCel($linha['telCel']);
                    $fornecedor->setComplemento($linha['complemento']);
                } while ($linha = mysqli_fetch_assoc($result));
            }
            mysqli_close($conecta);
        } else {
            echo "<script>alert('Banco inoperante!')</script>";
            echo "<META HTTP-EQUIV='REFRESH' CONTENT=\"0;
			 URL='../PHPMatutino01/cadastroProduto.php'\">";
        }
        return $fornecedor;
    }

}
