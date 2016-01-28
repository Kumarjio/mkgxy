// JavaScript Document

//$scope injected dynamically
customersAppModule.controller('Page1Controller', ['$scope', '$route', '$routeParams', '$location', function($scope, $route, $routeParams, $location) {
	$scope.$route = $route;
    $scope.$location = $location;
    $scope.$routeParams = $routeParams;																			
	$scope.sortBy = 'name';
	$scope.reverse = false;
	$scope.people = [
					 {
						 id: 1,
						 name:'Dave', 
						 city:'San Jose', 
						 orderTotal: 19.99, 
						 joined:'2001-10-03',
						 orders: [
								  {
									 order_id: 2,
									 product: 'Chess Book',
									 total: 44.9
								 }
								 ]
					 }, 
					 {
						 id: 2,
						 name:'Jeff', 
						 city:'San Francisco', 
						 orderTotal: 9.99, 
						 joined:'2010-02-12',
						 orders: [
								  {
									 order_id: 3,
									 product: 'Karate Book',
									 total: 22.3
								 }
								 ]
					},
					{
						 id: 3,
						name:'Heedy', 
						city:'Pleasanton', 
						orderTotal: 0.99, 
						joined:'2005-04-26',
						 orders: [
								  {
									 order_id: 4,
									 product: 'Cricket Book',
									 total: 101.9
								 }
								 ]
					},
					{
						 id: 4,
						name:'Danny', 
						city:'New York', 
						orderTotal:29.99, 
						joined:'2015-02-01',
						 orders: [
								  {
									 order_id: 4,
									 product: 'Judo Book',
									 total: 13.9
								 }
								 ]
					}
				];
	$scope.doSort = function(propName) {
		$scope.sortBy = propName;
		$scope.reverse = !$scope.reverse;
	};
	console.log('scope');
	console.log($scope);
}]);