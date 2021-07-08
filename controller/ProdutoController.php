<?php
include_once 'C:/xampp/htdocs/PHPMatutino01/dao/DaoProduto.php';
include_once 'C:/xampp/htdocs/PHPMatutino01/model/Produto.php';

class ProdutoController {
    
    public function inserirProduto($nomeProduto, $vlrCompra, 
            $vlrVenda, $qtdEstoque){
        $produto = new Produto();
        $produto->setNomeProduto($nomeProduto);
        $produto->setVlrCompra($vlrCompra);
        $produto->setVlrVenda($vlrVenda);
        $produto->setQtdEstoque($qtdEstoque);
        
        $daoProduto = new DaoProduto();
        return $daoProduto->inserir($produto);
    }
    
    //método para carregar a lista de produtos que vem da DAO
    public function listarProdutos(){
        $daoProduto = new DaoProduto();
        return $daoProduto->listarProdutosDAO();
    }
    public function excluirProduto($id){
        $daoProduto =new DaoProduto();
        $daoProduto->excluirProduto($id);
    }
    //metodo para retornar objeto produto
    public function pesquisarProdutoId($id){
        $daoProduto = new daoProduto();
        return ;
    }




    //metodo para edtar produto
    public function editarProduto($id) {
        $daoProduto = new DaoProduto();
        return $daoProduto->editarProdutoDAO($id);;
        
    }
}
