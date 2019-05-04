<?php
    if(!isset($_SESSION)) 
    { 
        //session_start(); 
		include('verifica_login.php');
		
    } 
	include('conexao.php');
	
?>
<!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="utf-8">
			<meta http-equiv="X-UA-Compatible" content="IE=edge">
				<!-- Tell the browser to be responsive to screen width -->
				<meta name="viewport" content="width=device-width, initial-scale=1">
					<meta name="description" content="">
						<meta name="author" content="">
							<!-- Favicon icon -->
							<link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
								<title>
									<?php
		IF($_SESSION['UsuarioNivel'] == 1){  //Permissão: 1 - Admin
			echo "Login: Administrador";
		}else{
			echo "Login: Você não tem permissão";
		}
	?> - Gerenciador de Vendas</title>
								<!-- Bootstrap Core CSS -->
								<link href="plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
									<!-- chartist CSS -->
									<link href="plugins/chartist-js/dist/chartist.min.css" rel="stylesheet">
										<link href="plugins/chartist-js/dist/chartist-init.css" rel="stylesheet">
											<link href="plugins/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css" rel="stylesheet">
												<!--This page css - Morris CSS -->
												<link href="plugins/c3-master/c3.min.css" rel="stylesheet">
													<!-- Custom CSS -->
													<link href="css/style.css" rel="stylesheet">
														<!-- You can change the theme colors from here -->
														<link href="css/colors/blue.css" id="theme" rel="stylesheet">
															<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
															<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
															<!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
														</head>

														<body class="fix-header fix-sidebar card-no-border">
															<!-- ============================================================== -->
															<!-- Preloader - style you can find in spinners.css -->
															<!-- ============================================================== -->
															<div class="preloader">
																<svg class="circular" viewBox="25 25 50 50">
																	<circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
															</div>
															<!-- ============================================================== -->
															<!-- Main wrapper - style you can find in pages.scss -->
															<!-- ============================================================== -->
															<div id="main-wrapper">
																<!-- ============================================================== -->
																<!-- Topbar header - style you can find in pages.scss -->
																<!-- ============================================================== -->
																<header class="topbar">
																	<nav class="navbar top-navbar navbar-toggleable-sm navbar-light">
																		<!-- ============================================================== -->
																		<!-- Logo -->
																		<!-- ============================================================== -->
																		<div class="navbar-header">
																			<a class="navbar-brand" href="painel-admin.php">
																				<!-- Logo icon --><b>
																					<!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->

																					<!-- Light Logo icon -->
																					<img src="images/logo-light-icon.png" alt="homepage" class="light-logo" />
																				</b>
																				<!--End Logo icon -->
																				<!-- Logo text --><span>

																					<!-- Light Logo text -->    
																					<img src="images/logo-light-text.png" class="light-logo" alt="homepage" /></span> </a>
																		</div>
																		<!-- ============================================================== -->
																		<!-- End Logo -->
																		<!-- ============================================================== -->
																		<div class="navbar-collapse">
																			<!-- ============================================================== -->
																			<!-- toggle and nav items -->
																			<!-- ============================================================== -->
																			<ul class="navbar-nav mr-auto mt-md-0">
																				<!-- This is  -->
																				<li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="mdi mdi-menu"></i></a> </li>
																				<!-- ============================================================== -->
																				<!-- Search -->
																				<!-- ============================================================== -->

																			</ul>
																			<!-- ============================================================== -->
																			<!-- User profile and search -->
																			<!-- ============================================================== -->
																			<ul class="navbar-nav my-lg-0">
																				<!-- ============================================================== -->
																				<!-- Profile -->
																				<!-- ============================================================== -->
																				<li class="nav-item dropdown">
																					<a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
																						<?php
									IF($_SESSION['UsuarioNivel'] == 1){   //Permissão: 1 - Admin
										echo "<i class=\"fa fa-cogs\"></i> ";
										echo "Login: Administrador ";
									}
								?>
																					</a>
																				</li>
																			</ul>
																		</div>
																	</nav>
																</header>
																<!-- ============================================================== -->
																<!-- End Topbar header -->
																<!-- ============================================================== -->
																<!-- ============================================================== -->
																<!-- Left Sidebar - style you can find in sidebar.scss  -->
																<!-- ============================================================== -->
																<aside class="left-sidebar">
																	<!-- Sidebar scroll-->
																	<div class="scroll-sidebar">
																		<!-- Sidebar navigation-->
																		<nav class="sidebar-nav">
																			<ul id="sidebarnav">
																				<?php
					// Menu Lateral
					IF($_SESSION['UsuarioNivel'] == 1) //Permissão: 1 - Admin
						{ 
				?>
																				<li> <a class="waves-effect waves-dark" href="painel-admin.php" aria-expanded="false"><i class="mdi mdi-gauge"></i><span class="hide-menu">Dashboard</span></a></li>
																					<?php
						} // Menu-Lateral - Fim Permissão: 1 - Admin
				?>
																				</ul>
																			</nav>
																			<!-- End Sidebar navigation -->
																		</div>
																		<!-- End Sidebar scroll-->
																		<!-- Bottom points-->
																		<div class="sidebar-footer">
																			<!-- item--><a href="" class="link" data-toggle="tooltip" title="Settings"><i class="ti-settings"></i></a>
																			<!-- item--><a href="" class="link" data-toggle="tooltip" title="Email"><i class="mdi mdi-gmail"></i></a>
																			<!-- item--><a href="logout.php" class="link" data-toggle="tooltip" title="Logout"><i class="mdi mdi-power"></i></a> </div>
																		<!-- End Bottom points-->
																	</aside>
																	<!-- ============================================================== -->
																	<!-- End Left Sidebar - style you can find in sidebar.scss  -->
																	<!-- ============================================================== -->
																	<!-- ============================================================== -->
																	<!-- Page wrapper  -->
																	<!-- ============================================================== -->
																	<div class="page-wrapper">
																		<!-- ============================================================== -->
																		<!-- Container fluid  -->
																		<!-- ============================================================== -->
																		<div class="container-fluid">
																			<!-- ============================================================== -->
																			<!-- Bread crumb and right sidebar toggle -->
																			<!-- ============================================================== -->
																			<div class="row page-titles">
																				<div class="col-md-5 col-8 align-self-center">
																					<h3 class="text-themecolor">Olá, <?php echo $_SESSION['nome'];?></h3>
																				</div>
																				<div class="col-md-7 col-4 align-self-center">
																					<a href="logout.php" class="btn waves-effect waves-light btn-danger pull-right hidden-sm-down">
							Sair
																					</a>
																				</div>
																			</div>
																			<!-- ============================================================== -->
																			<!-- End Bread crumb and right sidebar toggle -->
																			<!-- ============================================================== -->
																			<!-- ============================================================== -->
																			<!-- Start Page Content -->
																			<!-- ============================================================== -->
																			<!-- Row -->
																			<div class="row">
																				<?php
							IF($_SESSION['UsuarioNivel'] == 1){ //Permissão: 1 - Admin
						?>
							<div class="col-12">
								<div class="card">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
function ajax_get(url, callback) {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            console.log('responseText:' + xmlhttp.responseText);
            try {
                var data = JSON.parse(xmlhttp.responseText);
            } catch(err) {
                console.log(err.message + " in " + xmlhttp.responseText);
                return;
            }
            callback(data);
        }
    };

    xmlhttp.open("GET", url, true);
    xmlhttp.send();
}

ajax_get('http://187.49.93.234:3344/printer/api/Printer?apikey=8048370b-643f-4f0a-add2-12dd93d5ab12&a=stateList&data={}', function(data) {
    //document.getElementById("title").innerHTML = data.Printer.activeExtruder;
	document.getElementById("title").innerHTML = data.Printer.extruder[0].tempRead;
});


</script>
 <h3 class="box-title" style="margin: 15px 10px">Monitoramento</h3>
	<div class="card-body">
		
				<div class="form-group">
					<label class="col-md-12">Temperatura do bico: </label>
					<div class="col-md-12" id="title">
						
					</div>
				</div>
				
		
	</div>


								</div>
							</div>
	<?php
		//Fim Permissão: 1 - Admin
		}else{
				echo "Você não tem permissão!";
		}
	?>

																																				</div>
																																				<!-- Row -->

																																				<!-- ============================================================== -->
																																				<!-- End PAge Content -->
																																				<!-- ============================================================== -->
																																			</div>
																																			<!-- ============================================================== -->
																																			<!-- End Container fluid  -->
																																			<!-- ============================================================== -->
																																			<!-- ============================================================== -->
																																			<!-- footer -->
																																			<!-- ============================================================== -->
																																			<footer class="footer"> 2019 &copy; Gerenciador de Vendas </footer>
																																			<!-- ============================================================== -->
																																			<!-- End footer -->
																																			<!-- ============================================================== -->
																																		</div>
																																		<!-- ============================================================== -->
																																		<!-- End Page wrapper  -->
																																		<!-- ============================================================== -->
																																	</div>
																																	<!-- ============================================================== -->
																																	<!-- End Wrapper -->
																																	<!-- ============================================================== -->
																																	<!-- ============================================================== -->
																																	<!-- All Jquery -->
																																	<!-- ============================================================== -->
																																	<script src="plugins/jquery/jquery.min.js"></script>
																																	<!-- Bootstrap tether Core JavaScript -->
																																	<script src="plugins/bootstrap/js/tether.min.js"></script>
																																	<script src="plugins/bootstrap/js/bootstrap.min.js"></script>
																																	<!-- slimscrollbar scrollbar JavaScript -->
																																	<script src="js/jquery.slimscroll.js"></script>
																																	<!--Wave Effects -->
																																	<script src="js/waves.js"></script>
																																	<!--Menu sidebar -->
																																	<script src="js/sidebarmenu.js"></script>
																																	<!--stickey kit -->
																																	<script src="plugins/sticky-kit-master/dist/sticky-kit.min.js"></script>
																																	<!--Custom JavaScript -->
																																	<script src="js/custom.min.js"></script>
																																	<!-- ============================================================== -->
																																	<!-- This page plugins -->
																																	<!-- ============================================================== -->
																																	<!-- chartist chart -->
																																	<script src="plugins/chartist-js/dist/chartist.min.js"></script>
																																	<script src="plugins/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.min.js"></script>
																																	<!--c3 JavaScript -->
																																	<script src="plugins/d3/d3.min.js"></script>
																																	<script src="plugins/c3-master/c3.min.js"></script>
																																	<!-- Chart JS -->
																																	<script src="js/dashboard1.js"></script>
																																</body>

																															</html>
																															