'use strict';

angular.module('myApp.viewAdmin', ['ngRoute'])

.config(['$routeProvider', function($routeProvider) {
  $routeProvider.when('/admin', {
    templateUrl: 'viewAdmin/viewAdmin.html',
    controller: 'ViewAdminCtrl'
  });
}])

.controller('ViewAdminCtrl', [function() {

}]);