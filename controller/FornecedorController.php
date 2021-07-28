<?php

include_once 'C:/xampp/htdocs/PHPMatutino01/dao/daoFornecedor.php';
include_once 'C:/xampp/htdocs/PHPMatutino01/model/fornecedor.php';
class FornecedorController {
    public function inserirFornecedor($nomeFornecedor, $logradouro, 
            $numero, $bairro, $cidade, $uf, $cep, $representante, $email, $telFixo, $telCel, $complemento ){
        $fornecedor = new Fornecedor();
        $fornecedor->setNomeFornecedor($nomeFornecedor);
        $fornecedor->setlogradouro($logradouro);
        $fornecedor->setNumero($numero);
        $fornecedor->setBairro($bairro);
        $fornecedor->setCidade($cidade);
        $fornecedor->setUf($uf);
        $fornecedor->setCep($cep);
        $fornecedor->setRepresentante($representante);
        $fornecedor->setEmail($email);
        $fornecedor->setTelFixo($telFixo);
        $fornecedor->setTelCel($telCel);
        $fornecedor->setComplemento($complemento);
        
        $daoFonecedor = new daoFornecedor();
        return $daofonecedor->inserir($fornecedor);
    }
    
    //método para atualizar dados de produto no BD
    public function atualizarFornecedor($idFornecedor, $nomeFornecedor, $logradouro, 
            $numero, $bairro, $cidade, $uf, $cep, $representante, $email, $telFixo, $telCel, $complemento){
        $fornecedor = new Fornecedor();
        $fornecedor->setIdFornecedor($idFornecedor);
        $fornecedor->setNomeFornecedor($nomeFornecedor);
        $fornecedor->setlogradouro($logradouro);
        $fornecedor->setNumero($numero);
        $fornecedor->setBairro($bairro);
        $fornecedor->setCidade($cidade);
        $fornecedor->setUf($uf);
        $fornecedor->setCep($cep);
        $fornecedor->setRepresentante($representante);
        $fornecedor->setEmail($email);
        $fornecedor->setTelFixo($telFixo);
        $fornecedor->setTelCel($telCel);
        $fornecedor->setComplemento($complemento);
        
        $daoFornecedor = new daoFornecedor();
        return $daoFornecedor->atualizarFornecedorDAO($fornecedor);
    }
    
    //método para carregar a lista de fornecedores que vem da DAO
    public function listarFornecedor(){
        $daoFornecedor = new daoFornecedor();
        return $daoFornecedor->listarFornecedorDAO();
    }
    
    //método para excluir fornecedor
    public function excluirFornecedor($idFornecedor){
        $daoFornecedor = new daoFornecedor();
        $daoFornecedor->excluirFornecedorDAO($idFornecedor);
    }
    
    //método para retornar objeto produto com os dados do BD
    public function pesquisarFornecedorId($idFornecedor){
        $daoFornecedor = new daoFornecedor();
        return $daoFornecedor->pesquisarFornecedorIdDAO($idFornecedor);
    }
    
    //método para editar produto
    
    
    //método para limpar formulário
    public function limpar(){
        return $fc = new fornecedor();
    }
}
