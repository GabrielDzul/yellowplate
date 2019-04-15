const MiniCssExtractPlugin = require("mini-css-extract-plugin");
const BrowserSyncPlugin = require("browser-sync-webpack-plugin");
const CopyWebpackPlugin = require("copy-webpack-plugin");
const config = require("./config.js");
const webpack = require("webpack");
const path = require("path");

module.exports = {
  entry: {
    index: "./src/index.js",
    filter: "./src/secondary.js"
  },
  output: {
    path: path.resolve(__dirname, "dist"),
    filename: "[name].bundle.js",
    publicPath: "/dist/"
  },
  plugins: [
    new MiniCssExtractPlugin({
      filename: "main.css"
    }),
    new BrowserSyncPlugin({
      proxy: config.url,
      files: ["**/*.php", "**/*.html"],
      reloadDelay: 0
    }),
    new CopyWebpackPlugin([{ from: "src/img", to: "img" }])
  ],
  module: {
    rules: [
      {
        test: /\.js$/,
        use: {
          loader: "babel-loader",
          options: { presets: ["es2015"] }
        }
      },
      {
        test: /\.scss$/,
        use: [
          {
            loader: "style-loader" // creates style nodes from JS strings
          },
          {
            loader: MiniCssExtractPlugin.loader // separates css from js
          },
          {
            loader: "css-loader",
            options: { url: true, minimize: true, url: false } // translates CSS into CommonJS
          },
          {
            loader: "sass-loader" // compiles Sass to CSS
          },
          {
            // Loader for webpack to process CSS with PostCSS
            loader: "postcss-loader",
            options: {
              plugins: function () {
                return [require("autoprefixer")];
              }
            }
          }
        ]
      },
      {
        test: /\.(png|jpg|gif|svg)$/,
        use: [
          {
            loader: "file-loader",
            options: {
              name: "[name].[ext]",
              outputPath: "/dist/"
            }
          }
        ]
      }
    ]
  },
  devServer: {
    historyApiFallback: true,
    compress: true,
    port: 80,
    https: config.url.indexOf("https") > -1 ? true : false,
    publicPath: config.fullPath,
    proxy: {
      "*": {
        target: config.url,
        secure: false
      },
      "/": {
        target: config.url,
        secure: false
      }
    }
  }
};
