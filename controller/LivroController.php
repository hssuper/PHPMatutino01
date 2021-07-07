<?php
include_once 'C:/xampp/htdocs/PHPMatutino01/dao/daoLivro.php';
include_once 'C:/xampp/htdocs/PHPMatutino01/model/Livro.php';

class LivroController {
    public function inserirLivro($titulo, $autor, 
            $editora, $qtdEstoque){
        $livro = new Livro();
        $livro->setTitulo($titulo);
        $livro->setAutor($autor);
        $livro->setEditora($editora);
        $livro->setQtdEstoque($qtdEstoque);
        
        $daoLivro = new daoLivro();
        return $daoLivro->inserir($livro);
    }
    
    //método para carregar a lista de produtos que vem da DAO
    public function listarLivros(){
        $daoLivro = new DaoLivro();
        return $daoLivro->listarLivroDAO();
    }
}
