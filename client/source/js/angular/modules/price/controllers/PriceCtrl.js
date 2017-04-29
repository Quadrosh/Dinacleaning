'use strict';

app
    .controller('PriceCtrl', [
        '$scope',
        'priceData', function($scope,
                              priceData){
            $scope.priceData = priceData;
        }
    ]);