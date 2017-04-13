'use strict';

app.controller('SiteCtrl', [
    '$scope',
    'pageCollection', function($scope,
                               pageCollection){
            $scope.message = 'This is message from SiteCtrl ';
            $scope.pageCollection = pageCollection;
        }
]);

