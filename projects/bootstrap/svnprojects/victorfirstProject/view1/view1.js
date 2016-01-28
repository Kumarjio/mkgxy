'use strict';

angular.module('myApp.view1', ['ngRoute'])

.config(['$routeProvider', function($routeProvider) {
  $routeProvider.when('/view1', {
    templateUrl: 'view1/view1.html',
    controller: 'View1Ctrl'
  });
}])

.directive('dirH1', function() {
  return {
    templateUrl: "view1/dirH1.html",
	scope: {
	},
	link: function(scope, elem, attrs) {
	  scope.dosomething = function() {
		console.log('I pressed the first button');
	  };
	  scope.dosomething2 = function() {
		console.log('I pressed the second button');
	  };
	  scope.dosomething3 = function() {
		console.log('I pressed the third button');
	  };
	  scope.dosomething4 = function() {
		console.log('I pressed the fourth button');
	  };
	}
  }
})

.controller('View1Ctrl', [function() {

}]);