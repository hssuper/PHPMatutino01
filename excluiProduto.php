<?php
include_once './contoller/ProdutoContoller.php';
$id = $_REQUEST['ide'];
$pc = new ProdutoController();
$pc->excluirProduto($id);