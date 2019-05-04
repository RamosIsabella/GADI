<?php
define('HOST', 'localhost');
define('USUARIO', 'busca817_gadi');
define('SENHA', 'gadi3904#');
define('DB', 'busca817_gadi');

$conexao = mysqli_connect(HOST, USUARIO, SENHA, DB) or die ('Não foi possível conectar');