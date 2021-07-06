<?php
include_once 'C:/xampp/htdocs/PHPMatutino01/bd/Conecta_1.php';
include_once 'C:/xampp/htdocs/PHPMatutino01/model/Livro.php';
class daoProduto {
    public function inserir(Livro $livro){
        $conn = new Conecta();
        if($conn->conectadb()){
            $titulo = $livro->getTitulo();
            $autor = $livro->getAutor();
            $editora = $livro->getEditora();
            $qtdEstoque = $livro->getQtdEstoque();
            $sql = "insert into produto values(null,'$titulo','$autor ','$editora','$qtdEstoque')";
            if(mysqli_query($conn->conectadb(), $sql)){
                $msg = "<p style='color:green;'>".
                        "Dados cadastrados com sucesso</p>";
            }
        }else{
            $msg = "<p style='color:red;'>".
                        "Erro na conexão com o banco de dados</p>";
        }
        mysqli_close($conn->conectadb());
        return $msg;
      
    }
}
