'use strict';

app
    .controller('HomeCtrl', [
        '$scope',
        'homeData',
        'pageData',
        'allPages',
        '$timeout',
        'advantagesData',
        'partnersData',
        'reviewData',
        'orderData',
        'OrderService', function($scope,
                             homeData,
                             pageData,
                             allPages,
                             $timeout,
                             advantagesData,
                             partnersData,
                             reviewData,
                             orderData,
                             OrderService){
            $scope.homeData = homeData;
            $scope.pageData = pageData;
            $scope.allPages = allPages;
            $scope.advantagesData = advantagesData;
            $scope.partnersData = partnersData;
            $scope.reviewData = reviewData;
            $scope.orderData = orderData;

            $scope.i = 0;
            $scope.piter = 0;
            $scope.riter = 0;

            $scope.goNextAdvantage = function(){
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
                };
                $timeout(goNext,2000);
                var tlOut = new TimelineMax({paused:true});
                tlOut.to("#advantageName", 2, {autoAlpha:1}, "Start")
                    .to("#advantageText", 2, {autoAlpha:1}, "Start")
                ;
                var masterTl = new TimelineMax()
                    .add(tlIn.play(),"in")
                    .add(tlOut.play(),"out")
                    ;
            };
            $scope.goNextPartner = function(){
                var tlIn = new TimelineMax({paused:true});
                tlIn.to("#partnerName", 2, {autoAlpha:0}, "clearWorkspace")
                    .to("#partnerText", 2, {autoAlpha:0}, "clearWorkspace")
                    .to("#partnerImage", 2, {autoAlpha:0}, "clearWorkspace")
                ;
                var newI= $scope.piter+1;
                var goNext = function(){
                    if (newI < $scope.partnersData.length) {
                        $scope.piter = newI;
                    } else {
                        $scope.piter = 0;
                    }
                };
                $timeout(goNext,2000);
                var tlOut = new TimelineMax({paused:true});
                tlOut.to("#partnerName", 2, {autoAlpha:1}, "Start")
                    .to("#partnerText", 2, {autoAlpha:1}, "Start")
                    .to("#partnerImage", 2, {autoAlpha:1}, "Start")
                ;
                var masterTl = new TimelineMax()
                    .add(tlIn.play(),"in")
                    .add(tlOut.play(),"out")
                    ;
            };

            $scope.goNextReview = function(){
                var tlIn = new TimelineMax({paused:true});
                tlIn.to("#reviewName", 2, {autoAlpha:0}, "clearWorkspace")
                    .to("#reviewText", 2, {autoAlpha:0}, "clearWorkspace")
                ;
                var newI= $scope.riter+1;
                var goNext = function(){
                    if (newI < $scope.reviewData.length) {
                        $scope.riter = newI;
                    } else {
                        $scope.riter = 0;
                    }
                };
                $timeout(goNext,2000);
                var tlOut = new TimelineMax({paused:true});
                tlOut.to("#reviewName", 2, {autoAlpha:1}, "Start")
                    .to("#reviewText", 2, {autoAlpha:1}, "Start")
                ;
                var masterTl = new TimelineMax()
                    .add(tlIn.play(),"in")
                    .add(tlOut.play(),"out")
                    ;
            };
            $scope.newOrder = function(data){
                OrderService.post(data).then(function(){
                    alert('заказ отправлен');
                }).catch(function(error){
                    alert('неполучилось, ошибка '+ error);
                });
            }


        }
    ]);