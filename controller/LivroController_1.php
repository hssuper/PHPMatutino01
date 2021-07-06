<?php
include_once 'C:/xampp/htdocs/PHPMatutino01/dao/daoLivro.php';
include_once 'C:/xampp/htdocs/PHPMatutino01/model/Livro.php';
class ProdutoController {
    public function inserirproduto($titulo,$autor,$editora,$qtdEstoque) {
       $livro = new Livro();
       $livro->setTitulo($titulo);
       $livro->setAutor($autor);
       $livro->setEditora($editora);
       $livro->setQtdEstoque($qtdEstoque);
       
       $daoLivro = new daoLivro();
       return $daoLivro->inserir($livro);
    }
}
