angular.module('myApp').directive('mylist', function(){
    return {
        // template: 'this is my hello world program'
        templateUrl: 'directives/mylist.html',
/*        scope: {
            name: '@',
            age: '@',
            street: '@',
            state: '@',
            zip: '@'
        }*/  //local scope blocks access to parent scope
        scope: {
            personObj: '=',
            faf: '&'
        }
    }
})