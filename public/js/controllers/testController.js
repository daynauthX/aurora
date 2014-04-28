'use strict';

bakeryApp.controller('testController',
    function testController($scope, search, $modal, Restangular){
        $scope.noStandingOrders = true;
        
        $scope.getCustomers = function(val){
            return search.cust(val).then(function(customer){
                var cust = [];
                angular.forEach(customer, function(item){
                    cust.push(item);
                });
                return cust;
            });
        };
        
        $scope.getStandingOrders = function(){            
            search.sorders($scope.selected.CUSTNO).then(function(data){
                $scope.sorders = data;
                
                if($scope.sorders[0].ORDERNO === - 1){
                    $scope.noStandingOrders = true;
                }
                else{
                    $scope.noStandingOrders = false; 
                }
            }, function(){
                console.log("failure");
            });
        };
        

        $scope.newStandingOrder = function(id){
            //console.log(id);
            
            search.addStandingOrders(id).then(function(){
                console.log('saved');
            }, function(){
                console.log('not saved');
            });
            
        };
        
        $scope.deleteStandingOrder = function(id){
            console.log("delete");
        };
        
        
        $scope.testOrderDialog = function(){
            var modalInstance = $modal.open({
                templateUrl:  '/js/views/newstandingorder.html',
                controller: 'NewStandingOrderController',
                resolve:{
                    //return  something here
                }
            });
            
            
        };
        
        $scope.sOrderDetails = function(custNum, orderNum){
            search.sorderDetails(custNum, orderNum).then(function(data){
                $scope.details = data;
                if($scope.details[0].ORDERNO === - 1){
                    $scope.noDetails = true;
                }
                else{
                    $scope.noDetails = false;
                }                
            });
            
        };
    }
);


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