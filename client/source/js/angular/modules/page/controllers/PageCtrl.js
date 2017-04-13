'use strict';

app
    .controller('PageCtrl', [
        '$scope',
        'pageData', function($scope,
                             pageData){
            $scope.pageData = pageData;
        }
    ]);