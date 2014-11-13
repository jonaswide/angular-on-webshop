		<div class="row webshop_products_background">
		<div class="col-md-8 col-sm-8 col-xs-12 item-img">
			<img src="img/{{currItem.picture}}">
		</div>

		<div class="col-md-4 col-sm-4 col-xs-12">
			<h1>{{currItem.title}}</h1>
			<h3>DKK {{currItem.price}},-</h3>
			<p>{{currItem.description}}</p>

			<!-- her kalder vi vores controller, som har tilkoblet vores funktion, -->
			<!-- der lader os gå tilbage til vores main route, altså produktoversigten -->
			<div class="item_choice" ng-controller="choiceCtrl">
				<button class="btn btn-success btn-block">Læg i kurv</button><br>
				<a href="" class="btn btn-danger btn-block" ng-click="goHome()">Tilbage</a>
			</div>
		</div>
		</div> <!-- .webshop_products_background -->
