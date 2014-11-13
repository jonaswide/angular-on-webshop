<div class="wrap">
	<div class="navbar navbar-default">
		<div class="container">
			
			<a href="index.php" class="navbar-brand">Angular Webshop</a>
			<!--  ng-click="goHome()" -->
			
			<button class="navbar-toggle" data-toggle="collapse" data-target=".navHeaderCollapse">Menu</button>

			<div class="collapse navbar-collapse navHeaderCollapse">
				<ul class="nav navbar-nav navbar-right">
					<li <?php if ($thisPage=="index") echo "class=\"active\"";?>><a href="index.php">Home</a></li>
					<li <?php if ($thisPage=="webshop") echo "class=\"active\"";?>><a href="webshop.php">Webshop</a></li>
					<li <?php if ($thisPage=="about") echo "class=\"active\"";?>><a href="#">About</a></li>
					<li <?php if ($thisPage=="contact") echo "class=\"active\"";?>><a href="#">Contact</a></li>
				</ul>
			</div>
		</div>
	</div>