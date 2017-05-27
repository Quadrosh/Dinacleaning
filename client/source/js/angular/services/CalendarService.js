'use strict';

app
    .factory('CalendarService', ['$resource', function ($resource) {

        return $resource(apiHost + 'calendar');

    }]);