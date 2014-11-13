
// Her deklareres vores module, hvor vores dependencies er 'ngRoute' og 'ngAnimate'
var webshop = angular.module('webshopApp', ['ngRoute', 'ngAnimate']);

// Vores factory, som hiver vores JSON array af produkter ud fra get-data.php
webshop.factory('items', ['$http', function($http){
  return {
    get: function(callback){
      $http.get('get-data.php').success(function(data){
        callback(data);
      });
    }
  };
}]);

// Config og routes - her opsætter vi vores routes til de forskellige undersider
// :id indikerer her den værdi, som bliver videresendt fra de enkelte produkter
webshop.config(function ($routeProvider){
  $routeProvider
    .when('/', {templateUrl:'views/home.php'})
    .when('/item/:id', {templateUrl: 'views/item.php', controller: 'itemDetailController'})

    .otherwise({redirectTo: '/', templateUrl:'views/home.php'});
  });



///////////////////////
// Vores controllers //
///////////////////////


// Vores main controller
webshop.controller('productController', function($scope, $route, $location, $http, items){
	
  //her hiver vi informationen i vores factory ud, så den er brugbar i vores controller og nested controllers
  items.get(function(response){
    $scope.products = response;
  });

  // Her får vi arrayet til at blive vist baglæns, således at sidst tilføjede produkt ligger øverst
  $scope.predicate = '-product_id';


  //Indeholder filtermuligheder
  $scope.filterOptions = {
    stores: [
      {name : 'Vis alle', category_id: 3 },
      {name : 'Sort/hvid', category_id: 1 },
      {name : 'Farver', category_id: 2 },
    ]
  };
  
  
  //Bestemmer startværdi for vores filter select
  $scope.filterItem = {
    store: $scope.filterOptions.stores[0]
  };
  

  //Custom filter - filtrerer listen
  $scope.customFilter = function (products) {
    if (products.category_id === $scope.filterItem.store.category_id) {
      return true;
    } else if ($scope.filterItem.store.category_id === 3) {
      return true;
    } else {
      return false;
    }
  }; 

  // Ændre størrelsen af produkter i oversigt
  $scope.productSize = "col-md-3";

      $scope.sizeClick = function (value){
        if (value == 1){
          $scope.productSize = "col-md-3";
        } else if (value == 2) {
          $scope.productSize = "col-md-4";
        } else if (value == 3) {
          $scope.productSize = "col-md-6";
        } else {
          $scope.productSize = "col-md-3";
        }
  };

});


// Controller til underside af forskellige produkter
webshop.controller('itemDetailController', function($scope, $routeParams){
    $scope.currItem = $scope.products[$routeParams.id];
});


// Funktion, der sender brugeren tilbage til vores main route, altså oversigten over produkter
webshop.controller('choiceCtrl', function($scope, $location) {
  $scope.goHome = function () {
    $location.path('/');
  };
});