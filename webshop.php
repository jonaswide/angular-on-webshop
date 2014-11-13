<?php 
$thisPage = "webshop";
include "include/head.php"; ?>
</head>
<!-- Her deklareres vores Angular app -->
<body ng-app="webshopApp">

	<?php include "include/header.php"; ?>

	<!-- Her starter vi vores main controller, sådan at alt inde i view'et kan tilgå produktlisten -->
	<div class="container main" ng-controller="productController">
		
		<!-- Vores Angular routes blev vist i vores ng-view her nedenfor -->
		<div ng-view></div>

	</div> <!-- .container -->

	<?php include "include/footer.php"; ?>