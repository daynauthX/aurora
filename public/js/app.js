'use strict';

var bakeryApp = angular.module('bakeryApp', [
    'ngRoute',
    'ui.bootstrap',
    'restangular'
]).config(function($routeProvider){
    $routeProvider
            .when('/', {
                templateUrl: '/js/views/main.html', 
                controller: 'HelloController'
    })
            .when('/login', {
                templateUrl: '/js/views/login.html',
                controller: 'LoginController'
    })
            .when('/dashboard', {
                templateUrl: '/js/views/dashboard.html'
                
    })
            .when('/standingorders',{
                templateUrl: '/js/views/standingorders.html',
                controller: 'StandingOrdersController'
    })
            .when('/test', {
                templateUrl: '/js/views/test.html',
                controller: 'testController'
    })
            .when('/orders', {
                templateUrl: '/js/views/orders.html',
                controller: 'OrdersController'
    })
            .otherwise({
                redirectTo: '/'
    });
});