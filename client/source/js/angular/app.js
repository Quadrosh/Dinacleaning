'use strict';

/**
 * Хост API сервера
 *
 * @type {string}
 */

if (document.location.host == 'dc.dev' || document.location.host == 'dcadmin.dev') {
    var apiHost = 'http://dcrest.dev/';
}
if (document.location.host == 'dinacleaning.ru') {
    var apiHost = 'http://api.dinacleaning.ru/';
}
if (document.location.host == 'www.dinacleaning.ru') {
    var apiHost = 'http://api.dinacleaning.ru/';
}

function getUtm(param) {
    var vars = {};
    window.location.href.replace( location.hash, '' ).replace(
        /[?&]+([^=&]+)=?([^&]*)?/gi, // regexp
        function( m, key, value ) { // callback
            vars[key] = value !== undefined ? value : '';
        }
    );

    if ( param ) {
        return vars[param] ? vars[param] : null;
    }
    return vars;
}

if(getUtm('utm_source')){
    var utmTags = {
        utm_source:getUtm('utm_source'),
        utm_medium:getUtm('utm_medium'),
        utm_campaign:getUtm('utm_campaign'),
        utm_term:getUtm('utm_term'),
        utm_content:getUtm('utm_content')
    };
    localStorage.setItem('utmTags', JSON.stringify(utmTags));
}


//var utmTags = JSON.parse(localStorage.getItem('utmTags'));



/**
 * Инициализация ангуляра
 */
var app = angular.module('dinaApp', [
    'ngRoute',
    'ngSanitize',
    'ngResource',
    'ui.router',
    //'ui.router.stateHelper',
    'ngTouch',
    //'720kb.datepicker',
    //'angular-carousel',
    //'ui.carousel',
    'slickCarousel',
    'angular-loading-bar',



]);






//app.config(['$httpProvider', function ($httpProvider) {
//    $httpProvider.defaults.useXDomain = true;
//    delete $httpProvider.defaults.headers.common['X-Requested-With'];
//}]);
//
//

// app.config(['$uiViewScrollProvider', function ($uiViewScrollProvider) {
//    $uiViewScrollProvider.useAnchorScroll();
//}]);

app.filter('trustAsResourceUrl', ['$sce', function ($sce) {
    return function (val) {
        return $sce.trustAsResourceUrl(val);
    };
}]);

app.config(["$locationProvider", function($locationProvider) {
    $locationProvider.html5Mode(true);
}]);

//app.config(['slickCarouselConfig', function (slickCarouselConfig) {
//    slickCarouselConfig.dots = true;
//    slickCarouselConfig.autoplay = true;
//}]);