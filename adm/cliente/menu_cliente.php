<!-- Fixed navbar -->
<nav class="navbar navbar-inverse navbar-fixed-top">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="http://celke.com.br/">Celke</a>
		</div>
		<div id="navbar" class="navbar-collapse collapse">
			<ul class="nav navbar-nav">
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Minha Conta<span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href="cliente.php?link=2&id=<?php echo $_SESSION['usuarioId']; ?>">Perfil</a></li>
						<li><a href="cliente.php?link=53">Pagamento</a></li>
					</ul>
				</li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Free<span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href="cliente.php?link=50">Vantagem 1</a></li>
						<li><a href="cliente.php?link=61">Vantagem 2</a></li>
						<li><a href="cliente.php?link=62">Vantagem 3</a></li>
					</ul>
				</li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Standard<span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href="cliente.php?link=51">Vantagem 1</a></li>
						<li><a href="cliente.php?link=71">Vantagem 2</a></li>
						<li><a href="cliente.php?link=72">Vantagem 3</a></li>
						<li><a href="cliente.php?link=73">Vantagem 4</a></li>
						<li><a href="cliente.php?link=74">Vantagem 5</a></li>
					</ul>
				</li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Ultimate<span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href="cliente.php?link=52">Vantagem 1</a></li>
						<li><a href="cliente.php?link=81">Vantagem 2</a></li>
						<li><a href="cliente.php?link=82">Vantagem 3</a></li>
						<li><a href="cliente.php?link=83">Vantagem 4</a></li>
						<li><a href="cliente.php?link=84">Vantagem 5</a></li>
						<li><a href="cliente.php?link=85">Vantagem 6</a></li>
						<li><a href="cliente.php?link=86">Vantagem 7</a></li>
					</ul>
				</li>
			</ul>
			<div class="navbar-form navbar-right">					
				<a href="sair.php"><button type="submit" class="btn btn-success">Sair</button></a>
			</div>
		</div><!--/.nav-collapse -->				
	</div>
</nav>