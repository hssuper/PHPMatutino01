<?php
include_once 'C:/xampp/htdocs/PHPMatutino01/bd/Conecta.php';
include_once 'C:/xampp/htdocs/PHPMatutino01/model/Produto.php';
class daoProduto {
    public function inserir(Produto $produto){
        $conn = new Conecta();
        if($conn->conectadb()){
            $nomeProduto = $produto->getNomeProduto();
            $vlrCompra = $produto->getVlrCompra();
            $vlrVenda = $produto->getVlrVenda();
            $c = $produto->getQtdEstoque();
            $sql = "insert into produto values(null,'$nomeProduto','$vlrCompra ','$vlrVenda','$vlrVenda')";
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
    public function listarProdutosDAO(){
        $conn = new Conecta();
        if($conn->conectadb()){
            $sql = "select * from produto";
           $query = mysqli_query($conn->conectadb(), $sql);
           $lista = mysqli_fetch_array($query);
           return $lista;
        }
    }
}
