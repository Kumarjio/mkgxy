'use strict';

angular.module('myApp.view1', ['ngRoute'])

.config(['$routeProvider', function($routeProvider) {
  $routeProvider.when('/view1', {
    templateUrl: 'view1/view1.html',
    controller: 'View1Ctrl'
  });
}])

.directive ('dirH1', function(){
  return {
    templateUrl: 'view1/dirH1.html',
    scope: {
    },
    link: function(scope, ele, attrs) {
        console.log('This is inside directive.');
        scope.name = 'mango';
        scope.dosomething = function() {
            console.log('hey, you clicked me');
        };
        scope.dosomething2 = function() {
            console.log('hey, you poked me');
        };
        scope.dosomething3 = function() {
            console.log('hey, you kicked me');
        };
        scope.dosomething4 = function() {
            console.log('hey, you hit me');
        };
        scope.dosomething5 = function() {
            console.log('hey, you tapped me');
        };
    }
  }
})

.controller('View1Ctrl', [function() {

}]);