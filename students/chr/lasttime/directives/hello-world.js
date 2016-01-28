angular.module('myApp').directive('helloWorld', function(){
    return {
        restrict: 'AEC',
        // template: 'this is my hello world program'
        templateUrl: 'directives/hello-world.html'
    }
})