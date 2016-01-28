// JavaScript Document
var customersAppModule = angular.module('customersApp', ['ngRoute']);

customersAppModule.config(function($routeProvider, $locationProvider) {
	//Routes go here
	$routeProvider
		.when('/',
			  {
				controller: 'Page1Controller',
				templateUrl: 'views/page1.html'
			  }
			  )
		.when('/page2',
			  {
				controller: 'Page2Controller',
				templateUrl: 'views/page2.html'
			  }
			  );
		/*
		.when('/orders',
			  {
				controller: 'Page2Controller',
				templateUrl: 'views/page2.html'
			  }
			  )
		.when('/editCustomer/:customerId', //editCustomer/123
			  {
				controller: 'PageEditController',
				templateUrl: 'view/pageEdit.html'
			  }
			  )
		.otherwise({redirectTo: '/'})*/
	// configure html5 to get links working on jsfiddle
  	//$locationProvider.html5Mode(true);
});