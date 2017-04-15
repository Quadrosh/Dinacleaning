'use strict';

app
    .factory('ReviewService', ['$resource', function ($resource) {

        return $resource(apiHost + 'review');

    }]);