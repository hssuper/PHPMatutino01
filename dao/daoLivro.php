<?php

include_once 'C:/xampp/htdocs/PHPMatutino01/bd/Conecta.php';
include_once 'C:/xampp/htdocs/PHPMatutino01/model/Livro.php';

class daoLivro {

    public function inserir(Livro $livro) {
        $conn = new Conecta();
        if ($conn->conectadb()) {
            $$titulo = $livro->getTitulo();
            $autor = $livro->getAutor();
            $editora = $livro->getEditora();
            $qtdEstoque = $livro->getQtdEstoque();
            $sql = "insert into produto values (null, '$$titulo',"
                    . "'$autor', '$editora', '$qtdEstoque')";
            if (mysqli_query($conn->conectadb(), $sql)) {
                $msg = "<p style='color: green;'>"
                        . "Dados Cadastrados com sucesso</p>";
            } else {
                $msg = "<p style='color: red;'>Erro na inserção dos dados.</p>";
            }
        } else {
            $msg = "<p style='color:red;'>" .
                    "Erro na conexão com o banco de dados</p>";
        }
        mysqli_close($conn->conectadb());
        return $msg;
    }

    //método para carregar lista de produtos do banco de dados
    public function listarLivroDAO() {
        $conn = new Conecta();
        if ($conn->conectadb()) {
            $sql = "select * from produto";
            $query = mysqli_query($conn->conectadb(), $sql);
            $result = mysqli_fetch_array($query);
            $lista = array();
            $a = 0;
            if ($result) {
                do {
                    $livro = new Livro();
                    $livro->setIdLivro($result['id']);
                    $livro->setTitulo($result['titulo']);
                    $livro->setAutor($result['autor']);
                    $livro->setEditora($result['editora']);
                    $livro->setQtdEstoque($result['qtdEstoque']);
                    $lista[$a] = $livro;
                    $a++;
                } while ($result = mysqli_fetch_array($query));
            }
            mysqli_close($conn->conectadb());
            return $lista;
        }
    }

}

