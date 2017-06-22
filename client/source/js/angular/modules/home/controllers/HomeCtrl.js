'use strict';

app
    .controller('HomeCtrl', [
        '$scope',
        '$interval',
        'homeData',
        'pageData',
        'calendarData',
        'allPages',
        '$timeout',
        'advantagesData',
        'partnersData',
        'reviewData',
        'orderData',
        'OrderService',
        'CallmeService', function($scope,
                                 $interval,
                             homeData,
                             pageData,
                             calendarData,
                             allPages,
                             $timeout,
                             advantagesData,
                             partnersData,
                             reviewData,
                             orderData,
                             OrderService,
                             CallmeService){
            $scope.homeData = homeData;
            $scope.pageData = pageData;
            $scope.allPages = allPages;
            $scope.advantagesData = advantagesData;
            $scope.partnersData = partnersData;

            $scope.orderData = orderData;

            $scope.i = 0;
            $scope.piter = 0;
            $scope.riter = 0;


            //$scope.reviewData = reviewData;
            var getReviewData = function(data){
                for (var i = 0; i < data.length; i++) {
                    if (data[i].type == 1){
                        data[i].type = 'Повседневная уборка';
                    }
                    if (data[i].type == 2){
                        data[i].type = 'Генеральная уборка';
                    }
                    if (data[i].type == 3){
                        data[i].type = 'Уборка после ремонта';
                    }
                    if (data[i].type == 4){
                        data[i].type = 'Мойка окон';
                    }

                }
                return data;
            };

            $scope.reviewData = getReviewData(reviewData);

            //$scope.carouselSlideIn = function(){
            //    var slideIn = new TimelineMax();
            //    slideIn.fromTo(".caru_lead", 2, {css:{autoAlpha:0,rotationX:360, y:"-600"}, ease:Power1.easeOut},{css:{autoAlpha:1,rotationX:0, y:0}, ease:Power1.easeOut}, "clearWorkspace")
            //        //.to(".caru_lead", 2, {css:{x:0}, ease:Power1.easeOut})
            //    ;
            //};
            //$scope.carouselSlideOut = function(){
            //    var slideOut = new TimelineMax();
            //    slideOut.to(".caru_lead", 0.5, {css:{autoAlpha:0}, ease:Power1.easeIn})
            //
            //    ;
            //};

            $scope.slickTopConfig = {
                enabled: true,
                autoplay: true,
                arrows: false,
                draggable: false,
                autoplaySpeed: 10000,
                method: {},
                event: {
                    beforeChange: function (event, slick, currentSlide, nextSlide) {
                        var slideOut = new TimelineMax()
                            .set(".caru_lead", {css:{autoAlpha:0}, ease:Power1.easeIn})
                            .set("#callMeWrap", {css:{autoAlpha:0,rotationY:270,transformOrigin:"50% 100% 100"}})
                            .set(".caru_lead2", {css:{autoAlpha:0,rotationX:90, y:0, transformOrigin:"50% 100%"}})
                            .set(".caru_bgr_circle", {css:{autoAlpha:0}, ease:Power1.easeIn})
                            ;
                    },
                    afterChange: function (event, slick, currentSlide, nextSlide) {
                        var slideIn = new TimelineMax()

                            .fromTo(".caru_bgr_circle", 2,
                                {css:{autoAlpha:0, scale:0.7, transformOrigin:"50% 50% "}},
                                {css:{autoAlpha:1, scale:1.0}, ease: Elastic.easeOut.config(1, 0.3)}
                                , "circleIn")
                            .fromTo(".caru_lead", 1,
                                {css:{autoAlpha:0,rotationX:360, y:"-300"}, ease:Power1.easeOut},
                                {css:{autoAlpha:1,rotationX:0, y:0}, ease:Power1.easeOut}
                                , "circleIn+=1")
                            .to(".caru_lead2", 1,
                                {css:{autoAlpha:1,rotationX:0, y:0}, ease:Power3.easeOut}
                                , "lead2")
                            .to("#callMeWrap", 1,
                                {css:{autoAlpha:1, rotationY:0, y:0}, ease:Power3.easeIn}
                                , "lead2")
                            .to("#callMeBtn", 0.7,
                                {css:{ scaleY:1.2}, ease:Power1.easeIn}
                                , "lead2+=3")
                            .to("#callMeBtn", 1,
                                {css:{ scaleY:1}, ease: Elastic.easeOut}
                                )
                            ;
                    }
                }
            };
            $scope.slickTopGo = true;
            $scope.slickTopUpdate = function(){
                $scope.slickTopGo = false; // disable slick
                //number update
                $scope.slickTopGo = true; // enable slick
            };
            var getSlidesToShow = function(width){
                if (width>768) {
                    return 3;
                } else {
                    return 1;
                }
            }
            $scope.slickReviewConfig = {
                enabled: true,
                autoplay: true,
                slidesToShow:getSlidesToShow(window.innerWidth),
                arrows: false,
                draggable: true,
                autoplaySpeed: 6000,
                method: {},

            };
            $scope.slickReviewGo = true;

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
                tlIn.to("#partnerName", 1, {autoAlpha:0,  rotationY:"-=90", transformOrigin:"50% 100% 200", ease:Power1.easeInOut}, "clearWorkspace")
                    .to("#partnerText", 1, {autoAlpha:0, rotationY:"-=90",transformOrigin:"50% 100% 200", ease:Power1.easeInOut}, "clearWorkspace")
                    .to("#partnersArrowSvg", 1, {autoAlpha:0, rotationY:"-=90",transformOrigin:"50% 100% 200", ease:Power1.easeInOut}, "clearWorkspace")
                    .to("#partnersInfo", 1, {autoAlpha:0, rotationX:"-=90",transformOrigin:"50% 100% 70", ease:Power1.easeInOut}, "clearWorkspace")
                    .to("#partnersBtn", 1, {autoAlpha:0, rotationX:"-=90",transformOrigin:"50% 50%", ease:Power1.easeInOut}, "clearWorkspace")
                    .to("#partnerImage", 1, {autoAlpha:0, transformOrigin:"50% 50% ", ease:Power1.easeInOut}, "clearWorkspace")
                ;
                var newI= $scope.piter+1;
                var goNext = function(){
                    if (newI < $scope.partnersData.length) {
                        $scope.piter = newI;
                    } else {
                        $scope.piter = 0;
                    }
                };
                $timeout(goNext,1000);
                var tlOut = new TimelineMax({paused:true});
                tlOut.to("#partnerName", 1, {autoAlpha:1, rotationY:0, ease:Power1.easeIn}, "Start")
                    .to("#partnerText", 1, {autoAlpha:1, rotationY:0, ease:Power1.easeIn}, "Start")
                    .to("#partnersArrowSvg", 1, {autoAlpha:1, rotationY:"-=270", ease:Power1.easeIn}, "Start")
                    .to("#partnersInfo", 1, {autoAlpha:1, rotationX:0, ease:Power1.easeIn}, "Start")
                    .to("#partnersBtn", 1, {autoAlpha:1, rotationX:0, ease:Power1.easeIn}, "Start")
                    .to("#partnerImage", 1, {autoAlpha:1, rotationX:0, ease:Power1.easeIn}, "Start")
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
            $scope.callMe = function(data){
                CallmeService.post(data).then(
                    function(){

                        //yaCounter44480872.reachGoal('sendOrder');
                        //ga('send','event','order','send','sendOrder');
                        alert('мы перезвоним в течение 20 минут');
                    },
                    function(error){
                        console.log(error);
                        alert('неполучилось отправить, ошибка - '+ error.statusText);
                    }
                );
            };
            $scope.newOrder = function(data){
                OrderService.post(data).then(
                    function(){
                        yaCounter44480872.reachGoal('sendOrder');
                        ga('send','event','order','send','sendOrder');
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
                type4:'мойка окон',
            };

            $scope.dateOptions = calendarData;
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
                work_date:$scope.dateOptions['1'],
                area:$scope.areaOptions['0'],
            };




            //$scope.DPvisibility = false;
            //$scope.backFilter = 'backfilterOff';

            //$scope.toggleDatePicker = function(){
            //    $scope.DPvisibility = !$scope.DPvisibility;
            //    if ($scope.DPvisibility == true) {
            //        $scope.backFilter = 'backfilterOn';
            //    } else {
            //        $scope.backFilter = 'backfilterOff';
            //    }
            //};
            //$scope.myHideCalendar = function(){
            //    $scope.DPvisibility = false;
            //    $scope.backFilter = 'backfilterOff';
            //};


            //$interval(function setInterval() {
            //    //toggling manually everytime
            //    $scope.DPvisibility = !$scope.DPvisibility;
            //}, 3500);





        }
    ]);