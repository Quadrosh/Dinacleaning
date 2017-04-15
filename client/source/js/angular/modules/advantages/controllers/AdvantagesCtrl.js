'use strict';

app
    .controller('AdvantagesCtrl', [
        '$scope',
        '$timeout',
        'advantagesData', function($scope,
                                   $timeout,
                                   advantagesData){
            $scope.advantagesData = advantagesData;
            $scope.i = 0;

            $scope.goNextAdvantage = function(){
                //TweenLite.to("#advantageName", 1, {scaleX:0.2});
                var tlIn = new TimelineMax({paused:true});
                tlIn.to("#advantageName", 2, {autoAlpha:0}, "clearWorkspace")
                    .to("#advantageText", 2, {autoAlpha:0}, "clearWorkspace")
                ;
                var newI= $scope.i+1;
                var goNext = function(){
                    if (newI < $scope.advantagesData.length) {
                        $scope.i = newI;
                    } else {
                        $scope.i = 0;
                    }
                }
                $timeout(goNext,2000);


                var tlOut = new TimelineMax({paused:true});
                tlOut.to("#advantageName", 2, {autoAlpha:1}, "Start")
                    .to("#advantageText", 2, {autoAlpha:1}, "Start")
                ;
                var masterTl = new TimelineMax()
                    .add(tlIn.play(),"in")
                    .add(tlOut.play(),"out")
                ;


            }
        }
    ]);