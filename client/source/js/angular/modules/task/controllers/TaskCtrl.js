'use strict';

app
    .controller('TaskCtrl', [
        '$scope',
        'taskData', function($scope,
                             taskData){
            $scope.taskData = taskData;
        }
    ]);