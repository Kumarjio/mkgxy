'use strict';

angular.module('myApp.tvs', ['ngRoute'])

.config(['$routeProvider', function($routeProvider) {
  $routeProvider.when('/tvs', {
    templateUrl: 'tvs/tvs.html',
    controller: 'TvsCtrl'
  });
}])

.controller('TvsCtrl', ['$scope', '$http', function($scope, $http) {
	$http({
		method: 'GET',
		url: 'json/tvs.json'
	}).then(function successCallback(response) {
		console.log(response.data);
    $scope.apiResponse = response.data;
  }, function errorCallback(response) {
    console.log("http didn't work");
  });
	
}]);