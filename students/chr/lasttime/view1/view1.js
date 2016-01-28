'use strict';

angular.module('myApp.view1', ['ngRoute'])

.config(['$routeProvider', function($routeProvider) {
  $routeProvider.when('/view1', {
    templateUrl: 'view1/view1.html',
    controller: 'View1Ctrl'
  });
}])

.controller('View1Ctrl', ['$scope', function($scope) {
  $scope.person = {
    name: "John Doe",
    age: "25",
    city: "San Jose",
    street: "255 Willow Steet",
    state: "CA",
    zip: "95117"};
    $scope.formattedaddr = function(p){
      return 'My new address is: ' + p.street + ', ' + p.state + ', ' + p.zip;
    }
}]);