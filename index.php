
<?php 
$thisPage = "index";
include "include/head.php"; ?>

</head>
<body ng-app="webshopApp">
<?php include "include/header.php"; ?>	

	<div class="jumbotron jumbotron-bg">
		<div class="container">
    		<h1>Angular webshop</h1>
 
    	</div>
	</div>

	<div class="container main" ng-controller="productController">
        <div class="row">

            <div class="col-xs-0 col-sm-0 col-md-2"></div>
            
            <!-- Her bliver de 4 sidst tilføjede produkter vist -->
            <div class="col-xs-6 col-sm-3 col-md-2" ng-repeat="product in products | orderBy:predicate | filter:customFilter | limitTo:4">
                <a href="webshop.php#/item/{{product.product_id-1}}"><img class="img-responsive" src="img/{{product.picture}}"></a>
                <h4 class="text-center">{{product.title}}</h4>
                <a href="webshop.php#/item/{{product.product_id-1}}" class="btn btn-info btn-block">{{product.price}}</a>
            </div>

            <div class="col-xs-0 col-sm-0 col-md-2"></div>
		</div> <!-- .row -->
    </div> <!-- .container -->

<?php include "include/footer.php"; ?>