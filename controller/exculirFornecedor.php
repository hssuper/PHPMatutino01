<?php
include_once './FornecedorController.phpller.php';
$id = $_REQUEST['ide'];
$fc = new FornecedorController();
$fc->excluirFornecedor($idFornecedor);

