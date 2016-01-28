'use strict';

angular.module('myApp.SuperAdmin', ['ngRoute'])

.config(['$routeProvider', function($routeProvider) {
  $routeProvider.when('/superAdmin', {
    templateUrl: 'viewSuperAdmin/viewSuperAdmin.html',
    controller: 'ViewSuperAdminCtrl'
  });
}])

.controller('ViewSuperAdminCtrl', [function() {

}]);