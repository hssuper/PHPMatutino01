<?php
include_once 'C:/xampp/htdocs/PHPMatutino01/dao/daoProduto.php';
include_once 'C:/xampp/htdocs/PHPMatutino01/model/Produto.php';
class ProdutoController {
    public function inserirproduto($nomeProduto,$vlrCompra,$vlrVenda,$qtdEstoque) {
       $produto = new Produto();
       $produto->setNomeProduto($nomeProduto);
       $produto->setVlrCompra($vlrCompra);
       $produto->setVlrVenda($vlrVenda);
       $produto->setQtdEstoque($qtdEstoque);
       
       $daoProduto = new daoProduto();
       return $daoProduto->inserir($produto);
 
       }
       public function listarProdutos(){
           
       }
        
}
