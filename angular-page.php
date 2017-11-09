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


      <div ng-controller="WeatherController as weather" class="row" ng-cloak>

        <div class="card col-md-6 weatherform">
          <div class="card-body">
            <h4 class="card-title">Meteo</h4>
            <h6 class="card-subtitle mb-2 text-muted">Insert a city to get the Weather in real time.</h6>
            <form ng-submit="weather.addLocation()" class="form-inline">
              <div class="form-group mx-sm-3">
                <input type="text" class="form-control" ng-keyup="check()" ng-model="weather.where"  placeholder="Check location">
              </div>
              <button class="btn btn-success btn-lg" type="submit">Check Weather</button>
            </form>
          </div>
        </div>


        <div ng-show="complete" class="col-md-6 result">
          <div class="media">
            <img ng-src="<?php echo get_stylesheet_directory_uri(); ?>/img/{{ mood }}" alt="{{ mood }}" class="d-flex mr-3">
            <div class="media-body">
              <h5 class="mt-0">{{ city }}</h5>
              <ul class="list-unstyled">
                <li><img ng-src="{{ icon_url }}" alt="Card image cap" class="d-flex mr-3"></li>
                <li><h5>Temp: {{ temp.toFixed(2) }}</h5></li>
                <li>Min: {{ temp_min }}</li>
                <li>Max: {{ temp_max }}</li>
              </ul>
            </div>
          </div>
        </div>


        <div>
          <i class="fa fa-smile-o fa-5x"></i>
        </div>
      </div>


    </main><!-- #main -->
  </div><!-- #primary -->
</div><!-- .wrap -->

<?php get_footer();
