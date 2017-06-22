'use strict';

//app
//    .factory('OrderService', ['$resource', function ($resource) {
//        return $resource(apiHost + 'callme');
//    }]);

app.service('CallmeService', function($http){
    this.get = function(){
        return $http.get(apiHost + 'callme');
    };
    this.post = function(data){
        return $http.post(apiHost + 'callme', data);
    };
    this.put = function(id,data){
        return $http.put(apiHost + 'callme/'+id, data);
    };
    this.delete = function(id){
        return $http.delete(apiHost + 'callme/'+id);
    };
});
