const path = require('path');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');


module.exports = {
    entry: './src/app.js',
    output: {
        filename: 'bundle.js',
        path: path.resolve(__dirname, 'frontend/web/source/dist'),
        publicPath: "./dist"
    },
    module: {
        rules: [{
            test: /\.js$/,
            loader: 'babel-loader',
            exclude: '/node-modules/'
        },   {
            test: /\.scss$/,
            use: [
                'style-loader',
                MiniCssExtractPlugin.loader,
                {
                    loader: 'css-loader',
                    options: { sourceMap: true }
                }, {
                    loader: 'sass-loader',
                    options: { sourceMap: true }
                },
                {
                    loader: 'postcss-loader',
                    options: { sourceMap: true }
                }
            ]
        }, {
            test: /\.css$/,
            use: [
                'style-loader',
                MiniCssExtractPlugin.loader,
                {
                    loader: 'css-loader',
                    options: { sourceMap: true }
                }, {
                    loader: 'postcss-loader',
                    options: { sourceMap: true }
                }
            ]
        }
        ]

    },
    plugins: [
        new MiniCssExtractPlugin({
            filename: '[name].css'
            //  chunkFilename: "[id].css"
        })
    ]
}