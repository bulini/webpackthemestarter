const webpack = require('webpack');

const ExtractText = require('extract-text-webpack-plugin');
const CopyWebpack = require('copy-webpack-plugin');
const PurifyCSS = require('purifycss-webpack');
const Compression = require('compression-webpack-plugin');
const Autoprefixer = require('autoprefixer');

const path = require('path');
const glob = require('glob');

const isProduction = process.env.NODE_ENV === 'production';

module.exports = {
  devtool: false, //(!isProduction && 'source-map'),
  entry: {
    main: [
      "./assets/sass/style.scss",
      "./js/app.js"
    ],
  },
  stats: {
    assets: true,
    hash: false,
    version: true,
    chunks: false,
    modules: false,
    children: false,
    source: false,
    timings: false
  },
  output: {
    path: __dirname,
    filename: "dist/[name].js"
  },
  resolve: {
    // alias: {
    //   angular: "angular/angular.min.js"
    // },
    extensions: ['.js'],
    modules: [
      path.resolve(__dirname, './js'),
      './node_modules'
    ],
  },
  module: {
    rules: [
      {
        test: /\.js$/,
        include: __dirname,
        loader: "babel-loader"
      },
      {
        test: /\.(sass|scss|less)$/,
        include: [path.resolve(__dirname, './assets/sass'), path.resolve(__dirname, './')],
        loader: ExtractText.extract({
          fallback: 'style-loader',
          use: [
            { loader: 'css-loader' },
            {
              loader: 'sass-loader',
              options: {
                includePaths: [
                  path.resolve(__dirname, './node_modules/bootstrap/scss')
                ]
              }
            }
          ]
        }),
      },
      {
        test: /\.(jpe?g|gif|png|eot|svg|woff|woff2|ttf)$/,
        loader: 'file-loader?name=[path][name].[ext]&context=./documentation/assets/images'
      },
      {
        test: /\.styl$/,
        use: [ "style-loader", "css-loader"]
      },
      {
        test: /\.(js|jsx)$/,
        exclude: /node_modules/,
        loader: 'babel-loader',
        query: {compact : false}
      }
    ]
  },
  node: {
    fs: "empty"
  },
  plugins: [
    // new CopyWebpack([
    //   { from: path.resolve(__dirname, './node_modules/font-awesome/fonts'), to: 'fonts/font-awesome' },
    //   { from: "./documentation/assets/images", to: "images" }
    // ]),
    new ExtractText({filename: 'style.css'}),
    Autoprefixer
  ]
};

if (isProduction) {
  module.exports.devtool = false
  module.exports.plugins = module.exports.plugins.concat([
    new webpack.DefinePlugin({
      'process.env': { NODE_ENV: '"production"' }
    }),
    new webpack.LoaderOptionsPlugin({
      minimize: true
    }),
    new webpack.optimize.UglifyJsPlugin({
      sourceMap: false,
      ecma: 7,
      compress: { warnings: false }
    }),
    new Compression({
      asset: "[path].gz[query]",
      algorithm: "gzip",
      test: /\.js$|\.css$/,
      threshold: 0, //10240,
      minRatio: 0.8
    })
  ])
}
