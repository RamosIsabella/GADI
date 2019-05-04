<?php

/*
-------- Regras Login -------
usuário Admin Cria Contas e tem acesso a qualquer conta usuando a senha do Admin

Niveis de Login
1 - Admin
2 - Vendedor

testes
usuário: Admin
senha: admin
entra na conta do Admin com Nível 1 - Admin

usuário: demo
senha: admin //É a senha que o Admin estiver usando no momento
entra na conta Demo com nível 2 - Vendedor

usuário: demo
senha: 123
entra na conta Demo com nível 2 - Vendedor

usuário: demo
senha: 567
senha errada, dá erro e diz que a senha do usuário está errada

usuário: marcos
senha: 123
usuário estão certos, porém o usuário está Inativo, só pode ser acessado utilizando a senha do Admin
*/

session_start();
include('conexao.php');


if(empty($_POST['usuario']) || empty($_POST['senha'])) {
	header('Location: index.php');
	exit();
}
	// Recebe Usuário e Senha por _Post
	$usuario = mysqli_real_escape_string($conexao, $_POST['usuario']);
	$senha = mysqli_real_escape_string($conexao, $_POST['senha']);
	
	// Faz a consulta no banco para ver se a senha é igual a do Admin
	$senhaAdmin = "select * from usuarios where usuario_usuario = 'admin' and senha_usuario = md5('{$senha}')";

	// Salva os dados encontados na variável $resultadoSenhaAdmin
	$resultadoSenhaAdmin = mysqli_query($conexao, $senhaAdmin);

	// Faz a consulta no banco para ver se usuário e senha confere
	$senhaUsuario = "select * from usuarios where usuario_usuario = '{$usuario}' and senha_usuario = md5('{$senha}')";

	// Salva os dados encontados na variável $resultadoSenhaUsuario
	$resultadoSenhaUsuario = mysqli_query($conexao, $senhaUsuario);
	
	//Verifica se está fazendo o Login com a senha do Admin
	if (mysqli_num_rows($resultadoSenhaAdmin) == 1) {
		$query = "select * from usuarios where usuario_usuario = '{$usuario}'";
		// Salva os dados encontados na variável $resultado
		$result = mysqli_query($conexao, $query);

		$resultado = mysqli_fetch_assoc($result);
		  // Se a sessão não existir, inicia uma
		  if (!isset($_SESSION)) session_start();
		  // Salva os dados encontrados na sessão
			$_SESSION['usuario_id'] = $resultado['id_usuario'];
			$_SESSION['nome'] = $resultado['nome_usuario'];
			$_SESSION['usuario'] = $resultado['usuario_usuario'];
			$_SESSION['senha'] = $resultado['senha_usuario'];
			$_SESSION['email'] = $resultado['email_usuario'];
			$_SESSION['UsuarioNivel'] = $resultado['nivel_usuario'];
			$_SESSION['empresa'] = $resultado['empresa_usuario'];
			//Se logar usando a senha do Admin ignora se está ativo ou não
			//$_SESSION['ativo'] = $resultado['ativo_usuario'];
			$_SESSION['cadastro'] = $resultado['cadastro_usuario'];

	}else{
		if (mysqli_num_rows($resultadoSenhaUsuario) == 1) {
			$senhaUsuario = "select * from usuarios where usuario_usuario = '{$usuario}' and senha_usuario = md5('{$senha}')";
			// Salva os dados encontados na variável $resultado
			$result = mysqli_query($conexao, $senhaUsuario);

			$resultado = mysqli_fetch_assoc($result);
			  // Se a sessão não existir, inicia uma
			  if (!isset($_SESSION)) session_start();
			  // Salva os dados encontrados na sessão
				$_SESSION['usuario_id'] = $resultado['id_usuario'];
				$_SESSION['nome'] = $resultado['nome_usuario'];
				$_SESSION['usuario'] = $resultado['usuario_usuario'];
				$_SESSION['senha'] = $resultado['senha_usuario'];
				$_SESSION['email'] = $resultado['email_usuario'];
				$_SESSION['UsuarioNivel'] = $resultado['nivel_usuario'];
				$_SESSION['ativo'] = $resultado['ativo_usuario'];
				$_SESSION['empresa'] = $resultado['empresa_usuario'];
				$_SESSION['cadastro'] = $resultado['cadastro_usuario'];
				
				//Testa se o Usuário está ativo
				if($_SESSION['ativo'] == 0)
				{
					$_SESSION['nao_ativado'] = true;
					header('Location: index.php');
					exit();
				}
		}else{
			//Usuário e senha não confere
			$_SESSION['nao_autenticado'] = true;
			header('Location: index.php');
			exit();
		}
	}
	
	
			if($_SESSION['UsuarioNivel'] == 1){ //Permissão: 1 - Admin
				// Redireciona para a área destinada
				header("Location: painel-admin.php");
				exit;
				}
			if($_SESSION['UsuarioNivel'] == 2){ //Permissão: 2 - User: Vendedor
				// Redireciona para a área destinada
				header("Location: painel-vendedor.php");
				exit;
				}
			if($_SESSION['UsuarioNivel'] == 3){ //Permissão: 3 - Logística
				// Redireciona para a área destinada
				header("Location: painel-logistica.php");
				exit;
				}
			if($_SESSION['UsuarioNivel'] == 4){ //Permissão: 4 - Cobrador
				// Redireciona para a área destinada
				header("Location: painel-cobrador.php");
				exit;
				}


	
