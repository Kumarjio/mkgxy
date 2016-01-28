'use strict';

angular.module('myApp.laptops', ['ngRoute'])

.config(['$routeProvider', function($routeProvider) {
  $routeProvider.when('/laptops', {
    templateUrl: 'laptops/laptops.html',
    controller: 'LaptopsCtrl'
  });
}])

.controller('LaptopsCtrl', ['$scope', '$http', function($scope, $http) {
	$http({
		method: 'GET',
		url: 'json/laptops.json'
	}).then(function successCallback(response) {
		console.log(response.data);
    $scope.apiResponse = response.data;
  }, function errorCallback(response) {
    console.log("http didn't work");
  });
	
}]);