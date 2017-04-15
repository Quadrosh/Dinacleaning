'use strict';

app
    .factory('PartnersService', ['$resource', function ($resource) {

        return $resource(apiHost + 'partners');

    }]);