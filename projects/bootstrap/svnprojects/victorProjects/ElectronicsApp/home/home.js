(function() {

	'use strict';

	angular.module('myApp.home', ['ngRoute'])

	.config(['$routeProvider', function($routeProvider) {
		$routeProvider.when('/home', {
			templateUrl: 'home/home.html',
			controller: 'HomeCtrl'
		});
	}])

	.controller('HomeCtrl', ['$scope', '$http', function($scope, $http) {
		$http.get('json/products.json')
		.then(function successCallback(response) {
			$scope.allProducts = response.data;
		});
	}]);
	
})();