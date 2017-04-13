'use strict';

app
    .factory('SiteService', ['$resource', function ($resource) {
        return $resource(apiHost + 'pages');
        //return $resource(apiHost + 'pages:pagesId',{pagesId:'@id'});
    }]);




