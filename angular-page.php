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

      <div class="alert alert-primary" role="alert">
        Kush&Clouds meteo {{ meteo.name }}
      </div>

      <div class="panel" ng-controller="WeatherController">

        <ul class="list-unstyled">
          <li ng-repeat="(k,v) in meteo.weather[0]">{{ k }} {{ v }}</li>
        </ul>

      </div>


    </main><!-- #main -->
  </div><!-- #primary -->
</div><!-- .wrap -->

<?php get_footer();
