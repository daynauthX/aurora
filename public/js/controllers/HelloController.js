'use strict';

bakeryApp.controller('HelloController',
    function HelloController($scope){
        $scope.hello = {
            message: "Hello World",
            date: '1/1/2014'
        };
    }

);