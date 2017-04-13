'use strict';

app
    .factory('AdvantagesService', ['$resource', function ($resource) {

        return $resource(apiHost + 'advantages');

    }]);