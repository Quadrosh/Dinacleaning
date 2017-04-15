'use strict';

//app
//    .factory('OrderService', ['$resource', function ($resource) {
//        return $resource(apiHost + 'orders');
//    }]);


app.service('OrderService', function($http){
    this.get = function(){
        return $http.get(apiHost + 'orders');
    };
    this.post = function(data){
        return $http.post(apiHost + 'orders', data);
    };
    this.put = function(id,data){
        return $http.put(apiHost + 'orders/'+id, data);
    };
    this.delete = function(id){
        return $http.delete(apiHost + 'orders/'+id);
    };
});
