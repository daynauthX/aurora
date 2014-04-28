'use strict';

bakeryApp.controller('OrdersController',
    function OrdersController($scope, $http) {
        
        
  $scope.getOrderInfo = function(id){
       $http.get('orders/'+id).
        success(function(data) {
            $scope.Orders = data;
            $scope.Order = [];
           
            angular.forEach($scope.Orders,function(value,index){
            
                $scope.Order.push(value.ORDERNO);
            });
        });
       
    };
    
    $scope.fillForm = function(order,id){
        $http.get('orderDetails/'+id+'/'+order).
            success(function(data) {
                $scope.allDetails = data;
                $scope.itemNo = [];
                $scope.packs = [];
                $scope.partNo = [];
         
         
                angular.forEach($scope.allDetails,function(value,index){
                    $scope.itemNo.push(value.ITEMNO);
                    $scope.itemNo.push(value.PACKS);
                    $scope.itemNo.push(value.PARTNO);   
                });
         
            });
    };
    
    
    $scope.Order= ' ';
    $scope.allDetails = ' ';
});
    