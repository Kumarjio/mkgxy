'use strict';

angular.module('myApp.view1', ['ngRoute'])

.config(['$routeProvider', function($routeProvider) {
  $routeProvider.when('/view1', {
    templateUrl: 'view1/view1.html',
    controller: 'View1Ctrl'
  });
}])

.controller('View1Ctrl', ['$scope','$http',function($scope,$http) {
  var url = 'http://api.bestbuy.com/beta/products/mostViewed?apiKey=39xgdapgw2ry6tjeph654h3f&callback=JSON_CALLBACK';
  $http.jsonp(url).
    then(function(response) {
      var myData = response.data.results;
      console.log(myData);
    }, function(response) {
      // called asynchronously if an error occurs
      // or server returns response with an error status.
    });
}]);
