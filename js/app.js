//js/app.js

//import Slick from "slick"

//http://api.openweathermap.org/data/2.5/weather?q=Rome&appid=fd5581745f97c7bcab5b5d80a837a808

import Angular from "angular"

var App = angular.module('WeatherApp', [])

App.run(function($rootScope, $http, $timeout) {
  console.log('ready')
  //carico intero json weather
  $http.get('http://api.openweathermap.org/data/2.5/weather?q=Roma,it&appid=fd5581745f97c7bcab5b5d80a837a808').
  then(function(response) {
    $rootScope.meteo = response.data;
    //console.log($rootScope.meteo);
    cache:true;
  });

})
.controller('WeatherController', function($rootScope, $scope, $http) {

});
