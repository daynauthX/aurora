'use strict';

bakeryApp.controller('OrdersController',
    function OrdersController($scope, $location){
        $scope.isActive = function(path){
            return path === $location.path();
        };
    });
    