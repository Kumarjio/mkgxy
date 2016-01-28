'use strict';

angular.module('myApp.view1', ['ngRoute'])

.config(['$routeProvider', function($routeProvider) {
  $routeProvider.when('/view1', {
    templateUrl: 'view1/view1.html',
    controller: 'View1Ctrl'
  });
}])

.controller('View1Ctrl', [function() {
    var ref = new Firebase('https://mycontacts12.firebaseio.com/diltesting');
    var postRef = ref.child('posts');
    var variable = {user_id: 1, title: 'my first post', desc: 'my description'};
    postRef.push(variable);
    var variable2 = {user_id: 1, title: 'my secon post', desc: 'my description'};
    postRef.push(variable2);
}]);