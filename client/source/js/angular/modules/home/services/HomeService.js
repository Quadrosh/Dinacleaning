'use strict';

app
    .factory('HomeService', ['$resource', function ($resource) {

        return $resource(apiHost + 'homeslides');

    }]);