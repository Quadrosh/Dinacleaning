'use strict';

app
    .factory('TaskService', ['$resource', function ($resource) {

        return $resource(apiHost + 'tasks');

    }]);