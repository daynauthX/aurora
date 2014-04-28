'use strict';

bakeryApp.service('auth', function($http){
    this.login = function(user){
        return $http.post('/login', {email: user.email, password: user.password});
    };
});