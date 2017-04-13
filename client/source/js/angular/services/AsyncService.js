app.factory('AsyncService', ['$q', function Async($q)
{
    return function (ResCall, params) {
        var d = $q.defer();
        if (angular.isFunction(ResCall))
        {
            ResCall(params, function(response) {
                d.resolve(response);
            });
            return d.promise;
        }
        throw new Error('wrong invocation with ' + ResCall.toString());
    };
}]);