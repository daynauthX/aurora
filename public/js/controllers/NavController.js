'use strict';

bakeryApp.controller('NavController',
    function NavController($scope, $location){
        $scope.isActive = function(path){
            return path === $location.path();
        };
    });
    