'use strict';

angular.module('myApp.tablets', ['ngRoute'])

.config(['$routeProvider', function($routeProvider) {
  $routeProvider.when('/tablets', {
    templateUrl: 'tablets/tablets.html',
    controller: 'TabletsCtrl'
  });
}])

.controller('TabletsCtrl', ['$scope', '$http', function($scope, $http) {
	$http({
		method: 'GET',
		url: 'json/tablets.json'
	}).then(function successCallback(response) {
		console.log(response.data);
    $scope.apiResponse = response.data;
  }, function errorCallback(response) {
    console.log("http didn't work");
  });
	
}]);