<?php
/**********************************************************
* enqueue your parent theme style if needed
* in this case including twentyseventeen styles and scripts
**********************************************************/
add_action('wp_enqueue_scripts', 'twentyseventeen_enqueue_assets');

function twentyseventeen_enqueue_assets() {
  // enqueue style from your parent theme
  wp_enqueue_style( 'twentyseventeen-style', get_template_directory_uri() . '/style.css' );

}

/*********************************
* enqueue your compiled bundle.js
* and compiled style.css
* defined in webpack.config.js
*********************************/
add_action( 'wp_enqueue_scripts', 'webpack_enqueue_assets' );

function webpack_enqueue_assets() {
  wp_enqueue_script( 'bundle', get_stylesheet_directory_uri() . '/dist/main.js');
  wp_enqueue_style( 'webpacktheme-style', get_stylesheet_directory_uri() . '/style.css' );
}

// [weather api="YOUR API"]
function weather_widget( $atts ) {
    $a = shortcode_atts( array(
        'api' => 'YOURAPI'
    ), $atts );

    return '<div ng-controller="WeatherController as weather" class="row" ng-cloak>
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
                <img ng-src="'.get_stylesheet_directory_uri().'/img/{{ mood }}" alt="{{ mood }}" class="d-flex mr-3">
                <div class="media-body">
                  <h5 class="mt-0">{{ city }}</h5>
                  <ul class="list-unstyled">
                    <li><img ng-src="{{ icon_url }}" alt="Card image cap" class="d-flex mr-3"></li>
                    <li><h5>Temp: {{ temp.toFixed(2) }}</h5></li>
                    <li>Min: {{ temp_min }}</li>
                    <li>Max: {{ temp_max }}</li>
                    <li>Umid: {{ humidity }} %</li>
                  </ul>
                </div>
              </div>
            </div>

          </div>';
}
add_shortcode( 'weather', 'weather_widget' );
