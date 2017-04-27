'use strict';

app
    .controller('HomeCtrl', [
        '$scope',
        '$interval',
        'homeData',
        'pageData',
        'allPages',
        '$timeout',
        'advantagesData',
        'partnersData',
        'reviewData',
        'orderData',
        'OrderService', function($scope,
                                 $interval,
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
            //$scope.newOrder = function(data){
            //    OrderService.post(data).then(function(){
            //        alert('заказ отправлен');
            //    }).catch(function(error){
            //        alert('неполучилось, ошибка '+ error);
            //    });
            //};
            $scope.newOrder = function(data){
                OrderService.post(data).then(
                    function(){
                        alert('заказ отправлен');
                    },
                    function(error){
                        console.log(error);
                        alert('неполучилось отправить, ошибка - '+ error.statusText);
                    }
                );
            };
            $scope.workPlaceOptions = {
                type1:'квартира',
                type2:'коттедж',
                type3:'другое',
            };
            $scope.cleanTypeOptions = {
                type1:'поддерживающая',
                type2:'генеральная',
                type3:'после ремонта',
            };
            $scope.areaOptions = {
                0:'?',
                1:'меньше 10-ти',
                2:'10',
                3:'15',
                4:'20',
                5:'25',
                6:'30',
                7:'35',
                8:'40',
                9:'45',
                10:'50',
                11:'60',
                12:'70',
                13:'80',
                14:'90',
                15:'100',
                16:'120',
                17:'150',
                18:'200',
                19:'больше 200 кв.м.',
            };
            $scope.order = {
                workplace:$scope.workPlaceOptions['type1'],
                work_type:$scope.cleanTypeOptions['type1'],
                area:$scope.areaOptions['0'],
            };

            $scope.DPvisibility = false;
            $scope.backFilter = 'backfilterOff';

            $scope.toggleDatePicker = function(){
                $scope.DPvisibility = !$scope.DPvisibility;
                if ($scope.DPvisibility == true) {
                    $scope.backFilter = 'backfilterOn';
                } else {
                    $scope.backFilter = 'backfilterOff';
                }
            };
            $scope.myHideCalendar = function(){
                $scope.DPvisibility = false;
                $scope.backFilter = 'backfilterOff';
            };


            //$interval(function setInterval() {
            //    //toggling manually everytime
            //    $scope.DPvisibility = !$scope.DPvisibility;
            //}, 3500);





        }
    ]);