<?php
include_once './ProdutoContoller.php';
$id = $_REQUEST['ide'];
$pc = new ProdutoController();
$pc->excluirProduto($id);