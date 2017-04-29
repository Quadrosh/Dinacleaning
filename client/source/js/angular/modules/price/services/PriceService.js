'use strict';

app
    .factory('PriceService', ['$resource', function ($resource) {

        return $resource(apiHost + 'prices');

    }]);