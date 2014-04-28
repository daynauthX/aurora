'use strict';

bakeryApp.service('search', function(Restangular){
    this.cust = function(id){
        return Restangular.one('customers', id).getList();
    };
    
    this.sorders = function(id){
        return Restangular.one('customers', id).all('standingorder').getList();
    };
    
    this.sorderDetails = function(id, order){
        return Restangular.one('customers', id).one('standingorder', order).get();
    };
    
    this.addStandingOrders = function(id){
        return Restangular.one('customers', id).post('standingorder');
    };
    
    this.deleteStandingOrders = function(id){
        return Restangular.one('standingorders', id).remove();
    };
});