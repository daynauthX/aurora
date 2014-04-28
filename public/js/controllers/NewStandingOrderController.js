'use strict';

bakeryApp.controller('NewStandingOrderController', 
    function NewStandingOrderController($scope, $modalInstance){

        $scope.ok = function () {
            $modalInstance.close();
        };

        $scope.cancel = function () {
            $modalInstance.dismiss('cancel');
        };
    }
);