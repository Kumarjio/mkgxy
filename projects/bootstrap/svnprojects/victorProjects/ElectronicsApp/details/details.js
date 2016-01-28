'use strict';

angular.module('myApp.details', ['ngRoute'])

.config(['$routeProvider', function($routeProvider) {
  $routeProvider.when('/details', {
    templateUrl: 'details/details.html',
    controller: 'DetailsCtrl'
  });
}])

.controller('DetailsCtrl', ['$scope', '$http', function($scope, $http) {
	$http({
		method: 'GET',
		url: 'json/products.json'
	}).then(function successCallback(response) {
		console.log(response.data);
    $scope.apiResponse = response.data;
  }, function errorCallback(response) {
    console.log("http didn't work");
  });
}]);