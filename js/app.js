import Angular from 'angular';

Angular.module('WeatherApp', [])
.controller('WeatherController', function($scope, $http) {
  $scope.complete = false;
  var weather = this;

  weather.addLocation = function() {
    $scope.complete = false
    $scope.icon_url = ''
    //vars
    var where = weather.where
    var app_id = "fd5581745f97c7bcab5b5d80a837a808"
    var url = "https://api.openweathermap.org/data/2.5/weather?q="+where+"&appid="+app_id
    //request
    $http.get(url)
    .then(function(response) {
      $scope.complete = true
      var icon = response.data.weather[0].icon
      $scope.city = response.data.name
      $scope.temp = (response.data.main.temp - 273.15)
      $scope.temp_min = (response.data.main.temp_min - 273.15)
      $scope.temp_max = (response.data.main.temp_max - 273.15)
      $scope.humidity = response.data.main.humidity
      $scope.icon_url = 'http://openweathermap.org/img/w/'+icon+'.png'
      $scope.mood = $scope.temp > 15 ? 'sad.svg' : 'happy.svg'
      console.log($scope.icon_url)
      //reset input
      weather.where = ''
    });
  };

});
