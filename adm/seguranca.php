<?php
	function seguranca_adm(){
		if((empty($_SESSION['usuarioId'])) || (empty($_SESSION['usuarioEmail'])) || (empty($_SESSION['usuarioNiveisAcessoId']))){		
			$_SESSION['loginErro'] = "Área restrita";
			header("Location: index.php");
		}else{
			if($_SESSION['usuarioNiveisAcessoId'] != "1"){
				$_SESSION['loginErro'] = "Área restrita";
				header("Location: index.php");
			}
		}
	}
	
	function seguranca_colaborador(){
		if((empty($_SESSION['usuarioId'])) || (empty($_SESSION['usuarioEmail'])) || (empty($_SESSION['usuarioNiveisAcessoId']))){		
			$_SESSION['loginErro'] = "Área restrita";
			header("Location: index.php");
		}else{
			if($_SESSION['usuarioNiveisAcessoId'] != "2"){
				$_SESSION['loginErro'] = "Área restrita";
				header("Location: index.php");
			}
		}
	}
	
	function seguranca_cliente(){
		if((empty($_SESSION['usuarioId'])) || (empty($_SESSION['usuarioEmail'])) || (empty($_SESSION['usuarioNiveisAcessoId']))){		
			$_SESSION['loginErro'] = "Área restrita";
			header("Location: index.php");
		}else{
			if($_SESSION['usuarioNiveisAcessoId'] != "3"){
				$_SESSION['loginErro'] = "Área restrita";
				header("Location: index.php");
			}
		}
	}
	
	//Conteudo para o free, standard e ultimate
	function free_standard_ultimate(){				
		include("conexao/conexao.php");
		$usuario_id_pl_sg= $_SESSION['usuarioId'];
		$result_usuario_pl_sg = "SELECT * FROM usuarios_planos WHERE usuario_id='$usuario_id_pl_sg' LIMIT 1";
		$resultado_usuario_pl_sg = mysqli_query($conn, $result_usuario_pl_sg);
		$row_usuario_pl_sg = mysqli_fetch_assoc($resultado_usuario_pl_sg);
		$data_vencimento_pl_sg = $row_usuario_pl_sg['data_vencimento'];
		$data_vencimento_pl_sg_time = strtotime($data_vencimento_pl_sg);
		
		$data_atual_pl_sg = date("Y-m-d H:i:s");
		$data_atual_time_pl_sg = strtotime($data_atual_pl_sg);
		
		if($data_atual_time_pl_sg < $data_vencimento_pl_sg_time){
			
		}else{			
			$url = pg.'/adm/cliente.php?link=56';
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=$url'>
			";	
		}
	}
	
	//Conteudo para o standard e ultimate
	function standard_ultimate(){					
		include("conexao/conexao.php");
		$usuario_id_pl_sg= $_SESSION['usuarioId'];
		$result_usuario_pl_sg = "SELECT * FROM usuarios_planos WHERE usuario_id='$usuario_id_pl_sg' LIMIT 1";
		$resultado_usuario_pl_sg = mysqli_query($conn, $result_usuario_pl_sg);
		$row_usuario_pl_sg = mysqli_fetch_assoc($resultado_usuario_pl_sg);
		$data_vencimento_pl_sg = $row_usuario_pl_sg['data_vencimento'];
		$data_vencimento_pl_sg_time = strtotime($data_vencimento_pl_sg);
		$data_atual_pl_sg = date("Y-m-d H:i:s");
		$data_atual_time_pl_sg = strtotime($data_atual_pl_sg);
		
		if($data_atual_time_pl_sg < $data_vencimento_pl_sg_time){
			if(($row_usuario_pl_sg['plano_id'] == 2)||($row_usuario_pl_sg['plano_id'] == 3)){
				
			}else{			
				$url = pg.'/adm/cliente.php?link=57';
				echo "
					<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=$url'>
				";	
			}
		}else{			
			$url = pg.'/adm/cliente.php?link=56';
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=$url'>
			";	
		}
	}
	
	//Conteudo para o ultimate
	function ultimate(){						
		include("conexao/conexao.php");
		$usuario_id_pl_sg= $_SESSION['usuarioId'];
		$result_usuario_pl_sg = "SELECT * FROM usuarios_planos WHERE usuario_id='$usuario_id_pl_sg' LIMIT 1";
		$resultado_usuario_pl_sg = mysqli_query($conn, $result_usuario_pl_sg);
		$row_usuario_pl_sg = mysqli_fetch_assoc($resultado_usuario_pl_sg);
		$data_vencimento_pl_sg = $row_usuario_pl_sg['data_vencimento'];
		$data_vencimento_pl_sg_time = strtotime($data_vencimento_pl_sg);
		$data_atual_pl_sg = date("Y-m-d H:i:s");
		$data_atual_time_pl_sg = strtotime($data_atual_pl_sg);
		
		if($data_atual_time_pl_sg < $data_vencimento_pl_sg_time){
			if($row_usuario_pl_sg['plano_id'] == 3){
				
			}else{			
				$url = pg.'/adm/cliente.php?link=57';
				echo "
					<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=$url'>
				";	
			}
		}else{			
			$url = pg.'/adm/cliente.php?link=56';
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=$url'>
			";	
		}
		
	}
	
?>