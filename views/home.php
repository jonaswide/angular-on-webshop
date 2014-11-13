<div class="col-md-12 display-768"><h1>Webshop</h1></div>
<div class="col-md-3 col-sm-12 col-xs-12">
	<h3>Kateogri</h3>
	<!-- Her er vores filtermuligheder -->
	<select class="styled-select" ng-model="filterItem.store" ng-options="item.name for item in filterOptions.stores">
	</select>

	<h3>Sorter</h3>
	<ul class="nav nav-pills">
		<!-- Her bruger vi ng-click til at ændre sorteringen af listen -->
      	<li ng-class="{'active': predicate=='-product_id'}"><a href="#" ng-click="predicate = '-product_id'">Nyeste først</a></li>
      	<li ng-class="{'active': predicate=='product_id'}"><a href="" ng-click="predicate = 'product_id'">Ældste først</a></li>
      	<li ng-class="{'active': predicate=='price'}"><a href="" ng-click="predicate = 'price'">Pris (stigende)</a></li>
      	<li ng-class="{'active': predicate=='-price'}"><a href="" ng-click="predicate = '-price'">Pris (faldende)</a></li>
    </ul>

</div>
	
<div class="col-md-9 col-sm-12 col-xs-12 webshop_products_background">
	<h1 class="hide-768 webshop-h1">Webshop</h1>
	<div class="row bottom-buffer">
		<div class="col-md-4 col-sm-12 col-xs-12">
		<!-- Her kan vi søge efter produkter, som live updater med ng-model som two-way data binder til ng-repeat -->
		<input type="text" class="form-control" placeholder="Søg efter produkt" ng-model="search.title">
		</div>
		<div class="col-md-8 text-right hide-768">
			<!-- Her kalder vi vores angular funktion sizeClick, som ændrer størrelsen af enkelte produkter -->
			<a href="#" ng-class="{'active-view': productSize=='col-md-3'}" ng-click="sizeClick(1)"><img src="img/vis4.png"></a>
			<a href="#" ng-class="{'active-view': productSize=='col-md-4'}" ng-click="sizeClick(2)"><img src="img/vis3.png"></a>
			<a href="#" ng-class="{'active-view': productSize=='col-md-6'}" ng-click="sizeClick(3)"><img src="img/vis2.png"></a>
		</div>
	</div>
			
	<!-- Her kommer vores ng-repeat, som skriver vores produktliste ud. -->
	<!-- Der sorteres efter predicate, som vi har defineret i Angular,  -->
	<!-- Og vi tilkobler et filter, der hedder search, som vores search model kan bruge -->
	<!-- Vi har også lavet et custom filter, som kil filtrere efter valgt kategori -->
	<div class="col-xs-6 col-sm-4 {{productSize}} webshop_product my-repeat-animation" ng-repeat="product in products | orderBy:predicate | filter:search | filter:customFilter">
		<a href="#/item/{{product.product_id-1}}"><img class="img-responsive" src="img/{{product.picture}}"></a>
       	<h4 class="text-center">{{product.title}}</h4>
       	<a href="#/item/{{product.product_id-1}}" class="btn btn-primary btn-block">{{product.price}}</a>
	</div>
			
</div> <!-- .webshop_products_background -->

