<?php
/**
* Template Name: Angular
*
* This is the template that displays Our angular app.
* Please note that this is the WordPress construct of pages
* and that other 'pages' on your WordPress site may use a
* different template.
* http://openweathermap.org/img/w/{{ v }}.png
* @link https://codex.wordpress.org/Template_Hierarchy
*
* @package WordPress
* @subpackage Twenty_Seventeen
* @since 1.0
* @version 1.0
*/

get_header(); ?>

<div class="wrap">
  <div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">

    <div class="alert alert-success" role="alert">
     Angular Meteo
    </div>

    <div ng-controller="WeatherController as weather">
      <p>Insert a city to get the Weather in real time.</p>

      <form ng-submit="weather.addLocation()" class="form-inline">
        <div class="form-group">
          <input type="text" class="form-control-plaintext" ng-model="weather.where"  size="30" placeholder="Check location">
        </div>
        <button class="btn btn-success" type="submit">Check Weather</button>
      </form>

      <div ng-show="complete">
        {{ dati_meteo }}
        <img ng-src="{{ icon_url }}">

      </div>
      

      <div>
        <i class="fa fa-smile-o fa-5x"></i>
      </div>
    </div>


    </main><!-- #main -->
  </div><!-- #primary -->
</div><!-- .wrap -->

<?php get_footer();
