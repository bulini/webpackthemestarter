//js/app.js

//import Slick from "slick"

//http://api.openweathermap.org/data/2.5/weather?q=Rome&appid=fd5581745f97c7bcab5b5d80a837a808

import Angular from "angular"

Angular.module('WeatherApp', [])
  .controller('WeatherController', function($scope, $http) {
    
    var weather = this;
    
    weather.locations = [
      {text:'Amsterdam', done:true},
      {text:'London', done:false}
    ];
 
    weather.addLocation = function() {
    	$scope.complete = false;
	    $scope.dati_meteo = {};
	    $scope.icon_url = '';
    	console.log(weather.where);
    	
    	var where = weather.where
	    
	    $http.get("http://api.openweathermap.org/data/2.5/weather?q="+where+"&appid=fd5581745f97c7bcab5b5d80a837a808")
	    .then(function(response) {
    		$scope.complete = true;
	        $scope.dati_meteo = response.data;
	        var icon = response.data.weather[1].icon
	        $scope.icon_url = 'http://openweathermap.org/img/w/'+icon+'.png'
	        console.log($scope.icon_url)	
	    });
    };
 
    // todoList.remaining = function() {
    //   var count = 0;
    //   angular.forEach(todoList.todos, function(todo) {
    //     count += todo.done ? 0 : 1;
    //   });
    //   return count;
    // };
 
    // todoList.archive = function() {
    //   var oldTodos = todoList.todos;
    //   todoList.todos = [];
    //   angular.forEach(oldTodos, function(todo) {
    //     if (!todo.done) todoList.todos.push(todo);
    //   });
    // };
  

  });