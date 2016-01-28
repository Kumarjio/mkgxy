'use strict';

angular.module('myApp', [
  'ngRoute',
  'myApp.view1',
  'myApp.view2'
]).

config(['$routeProvider', function($routeProvider) {
  $routeProvider.otherwise({redirectTo: '/view1'});
}])
.controller('homeApp', ['$scope', function($scope) {
    $scope.register = {};
    $scope.registerForm = function() {
        console.log($scope.register);
    };
}]);
