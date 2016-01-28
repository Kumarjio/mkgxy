// JavaScript Document

//$scope injected dynamically
angular.module('customersApp').controller('CustomersController', ['$scope', function($scope) {
	$scope.sortBy = 'name';
	$scope.reverse = false;
	$scope.people = [{name:'Dave', city:'San Jose', orderTotal: 19.99, joined:'2001-10-03'}, {name:'Jeff', city:'San Francisco', orderTotal: 9.99, joined:'2010-02-12'},{name:'Heedy', city:'Pleasanton', orderTotal: 0.99, joined:'2005-04-26'},{name:'Danny', city:'New York', orderTotal:29.99, joined:'2015-02-01'}];
	$scope.doSort = function(propName) {
		$scope.sortBy = propName;
		$scope.reverse = !$scope.reverse;
	};
}]);