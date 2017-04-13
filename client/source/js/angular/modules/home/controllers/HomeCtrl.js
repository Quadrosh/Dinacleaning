'use strict';

app
    .controller('HomeCtrl', [
        '$scope',
        'homeData',
        'pageData',
        'allPages', function($scope,
                             homeData,
                             pageData,
                             allPages){
            $scope.homeData = homeData;
            $scope.pageData = pageData;
            $scope.allPages = allPages;



        }
    ]);