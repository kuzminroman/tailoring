'use strict'
const webpack = require('webpack');
const merge = require('webpack-merge');
const path = require('path');
const baseWebpackConfig = require('./webpack.base.conf');
const HtmlWebpackPlugin = require('html-webpack-plugin');
const devWebpackConfig = merge(baseWebpackConfig, {
    // BUILD settings gonna be here
    mode: 'development',
    devtool: 'cheap-module-eval-source-map',

    plugins: [
        new HtmlWebpackPlugin({
            hash: false,
            template: './frontend/web/index.html',
            filename: 'index.html'
        }),
        new webpack.HotModuleReplacementPlugin(),
        new webpack.SourceMapDevToolPlugin({
            filename: '[file].map'
        })

    ],


    devServer: {
      //  port: 8081,
        hot: true,
        open: true,
        historyApiFallback: true,
        contentBase: path.resolve(__dirname, 'frontend/web/source/dist'),

        //contentBase: './frontend/web'
    }
});

// export buildWebpackConfig
module.exports = new Promise((resolve, reject) => {
    resolve(devWebpackConfig)
})