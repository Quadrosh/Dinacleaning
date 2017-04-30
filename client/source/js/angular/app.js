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
    '720kb.datepicker',
    'angular-carousel',
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