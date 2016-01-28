// JavaScript Document

//$scope injected dynamically
customersAppModule.controller('Page2Controller', ['$scope', '$route', '$routeParams', '$location', function($scope, $route, $routeParams, $location) {
	$scope.$route = $route;
    $scope.$location = $location;
    $scope.$routeParams = $routeParams;
}]);