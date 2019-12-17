/**
 * Webpack Configuration File
 * @type {[type]}
 */

// /////////////////////////////////////////////////////////////////////////////
// Requires / Dependencies /////////////////////////////////////////////////////
// /////////////////////////////////////////////////////////////////////////////

const path = require('path');
const webpack = require('webpack');
const autoprefixer = require('autoprefixer')({ grid: true });
const FileManagerPlugin = require('filemanager-webpack-plugin');
const UglifyJsPlugin = require("uglifyjs-webpack-plugin");
const MiniCssExtractPlugin = require("mini-css-extract-plugin");
const OptimizeCSSAssetsPlugin = require("optimize-css-assets-webpack-plugin");
const WebpackAssetsManifest = require("webpack-assets-manifest");
const ExtraWatchWebpackPlugin = require("extra-watch-webpack-plugin");
const FixStyleOnlyEntriesPlugin = require("webpack-fix-style-only-entries");

// /////////////////////////////////////////////////////////////////////////////
// Paths ///////////////////////////////////////////////////////////////////////
// /////////////////////////////////////////////////////////////////////////////

const npmPackage = 'node_modules/';
const srcDir = path.resolve(__dirname, "lib");
const distDir = path.resolve(__dirname, "dist");
const srcSass = path.resolve(__dirname, "lib/scss");
const distSass = path.resolve(__dirname, "dist/css");
const srcJS = path.resolve(__dirname, "lib/js");
const distJS = path.resolve(__dirname, "dist/js");
const srcAssets = path.resolve(__dirname, "lib/assets");
const distAssets = path.resolve(__dirname, "dist/assets");

// /////////////////////////////////////////////////////////////////////////////
// Functions ///////////////////////////////////////////////////////////////////
// /////////////////////////////////////////////////////////////////////////////

// /////////////////////////////////////////////////////////////////////////////
// Config //////////////////////////////////////////////////////////////////////
// /////////////////////////////////////////////////////////////////////////////

// Start configuring webpack.
var webpackConfig = {
  // What am i?
  name: 'jumpstart_ui',
  // Allows for map files.
  devtool: 'source-map',
  // What build?
  entry: {
    "jumpstart_ui":         path.resolve(__dirname, srcJS + "/jumpstart_ui.js"),
    "jumpstart_ui.base":    path.resolve(__dirname, srcSass + "/jumpstart_ui.base.scss"),
    "jumpstart_ui.layout":  path.resolve(__dirname, srcSass + "/jumpstart_ui.layout.scss"),
    "alert":                path.resolve(__dirname, srcSass + "/components/alert.component.scss"),
    "brand-bar":            path.resolve(__dirname, srcSass + "/components/brand-bar.component.scss"),
    "button":               path.resolve(__dirname, srcSass + "/components/button.component.scss"),
    "card":                 path.resolve(__dirname, srcSass + "/components/card.component.scss"),
    "cta":                  path.resolve(__dirname, srcSass + "/components/cta.component.scss"),
    "global-footer":        path.resolve(__dirname, srcSass + "/components/global-footer.component.scss"),
    "hero":                 path.resolve(__dirname, srcSass + "/components/hero.component.scss"),
    "link":                 path.resolve(__dirname, srcSass + "/components/link.component.scss"),
    "lockup":               path.resolve(__dirname, srcSass + "/components/lockup.component.scss"),
    "logo":                 path.resolve(__dirname, srcSass + "/components/logo.component.scss"),
    "quote":                path.resolve(__dirname, srcSass + "/components/quote.component.scss")
  },
  // Where put build?
  output: {
    filename: "[name].js",
    path: path.resolve(__dirname, distJS)
  },
  // Relative output paths for css assets.
  resolve: {
    alias: {
      '#fortawesome-fonts': path.resolve(npmPackage, '@fortawesome/fontawesome-free/webfonts/'),
      '#decanter-img': path.resolve(npmPackage, 'decanter/core/src/img/')
    }
  },
  // Additional module rules.
  module: {
    rules: [
      // Drupal behaviors need special handling with webpack.
      // https://www.npmjs.com/package/drupal-behaviors-loader
      {
        test: /\.behavior.js$/,
        exclude: /node_modules/,
        options: {
          enableHmr: false
        },
        loader: 'drupal-behaviors-loader'
      },
      // Good ol' Babel.
      {
        test: /\.js$/,
        loader: 'babel-loader',
        query: {
          presets: ['@babel/preset-env']
        }
      },
      // Apply Plugins to SCSS/SASS files.
      {
        test: /\.s[ac]ss$/,
        use: [
          // Extract loader.
          MiniCssExtractPlugin.loader,
          // CSS Loader. Generate sourceMaps.
          {
            loader: 'css-loader',
            options: {
              sourceMap: true,
              url: true
            }
          },
          // Post CSS. Run autoprefixer plugin.
          {
            loader: 'postcss-loader'
          },
          // SASS Loader. Add compile paths to include bourbon.
          {
            loader: 'sass-loader',
            options: {
              implementation: require('sass'),
              sourceMap: true,
              sassOptions: {
                includePaths: [
                  path.resolve(__dirname, npmPackage),
                  path.resolve(__dirname, srcSass)
                ],
                lineNumbers: true,
                precision: 10
              }
            }
          }
        ]
      },
      // Apply plugin to font assets.
      {
        test: /\.(woff2?|ttf|otf|eot)$/,
        loader: 'file-loader',
        options: {
          name: "[name].[ext]",
          publicPath: "../assets/fonts",
          outputPath: "../assets/fonts"
        }
      },
      // Apply plugins to image assets.
      {
        test: /\.(png|jpg|gif)$/i,
        use: [
          // A loader for webpack which transforms files into base64 URIs.
          // https://github.com/webpack-contrib/url-loader
          {
            loader: 'url-loader',
            options: {
              // Maximum size of a file in bytes. 8.192 Kilobtyes.
              limit: 8192,
              fallback: {
                loader: "file-loader",
                options: {
                  name: "[name].[ext]",
                  publicPath: "../assets/img",
                  outputPath: "../assets/img"
                }
              }
            }
          }
        ]
      },
      // Apply plugins to svg assets.
      {
        test: /\.(svg)$/i,
        use: [
          // A loader for webpack which transforms files into base64 URIs.
          // https://github.com/webpack-contrib/url-loader
          {
            loader: 'url-loader',
            options: {
              // Maximum size of a file in bytes. 8.192 Kilobtyes.
              limit: 8192,
              fallback: {
                loader: "file-loader",
                options: {
                  name: "[name].[ext]",
                  publicPath: "../assets/svg",
                  outputPath: "../assets/svg"
                }
              }
            }
          }
        ]
      },
    ]
  },
  // Build optimizations.
  optimization: {
    // Uglify the Javascript & and CSS.
    minimizer: [
      // Shrink JS.
      new UglifyJsPlugin({
        cache: true,
        parallel: true,
        sourceMap: true
      }),
      // Shrink CSS.
      new OptimizeCSSAssetsPlugin({})
    ],
  },
  // Plugin configuration.
  plugins: [
    // Remove JS files from render.
    new FixStyleOnlyEntriesPlugin(),
    // Output css files.
    new MiniCssExtractPlugin({
      filename:  "../css/[name].css"
    }),
    // A webpack plugin to manage files before or after the build.
    // https://www.npmjs.com/package/filemanager-webpack-plugin
    new FileManagerPlugin({
      onStart: {
        delete: [distDir]
      },
      onEnd: {
        copy: [
          {
            source: npmPackage + "/decanter/core/src/templates/**/*.twig",
            destination: distDir + "/templates/decanter/"
          },
          {
            source: srcDir + "/assets/**/*",
            destination: distDir + "/assets/"
          }
        ],
      },
    }),
    // Add a plugin to watch other files other than that required by webpack.
    // https://www.npmjs.com/package/filewatcher-webpack-plugin
    new ExtraWatchWebpackPlugin( {
      files: [
        srcDir + '/**/*.twig',
        srcDir + '/**/*.json'
      ]
    }),
  ]
};

// Add the configuration.
module.exports = [ webpackConfig ];
