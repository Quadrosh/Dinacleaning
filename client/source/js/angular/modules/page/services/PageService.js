'use strict';

app
    .factory('PageService', ['$resource', function ($resource) {

        return $resource(apiHost + 'pages/:id', {id:'@id'});

    }]);