const path = require('path');
const MiniCssExtractPlugin = require("mini-css-extract-plugin");
const CleanWebpackPlugin = require('clean-webpack-plugin');
const dotenv = require('dotenv').config();

const ImageminPlugin = require("imagemin-webpack");
const imageminGifsicle = require("imagemin-gifsicle");
const imageminJpegtran = require("imagemin-jpegtran");
const imageminOptipng = require("imagemin-optipng");
const imageminSvgo = require("imagemin-svgo");

const LiveReloadPlugin = require('webpack-livereload-plugin');

module.exports = {
	entry: {
		app: './assets/index.js'
	}
	, output: {
		filename: 'js/[name].bundle.js'
		, path: path.resolve(__dirname, process.env.THEME_ROOT_PATH + process.env.THEME_ASSETS_FOLDER_NAME + '/')
		, publicPath: process.env.PUBLIC_RELATIVE_PATH
	}
	, devtool: 'hidden-source-map'
	, mode: 'development'
	, module: {
		rules: [
			{
				test: /\.scss$/
				, use: [
					{
						loader: MiniCssExtractPlugin.loader
					}
					, {
						loader: 'css-loader'
						, options: {
							sourceMap: true
							, importLoaders: 2
						}
					}
					, {
						loader: 'postcss-loader'
						, options: {
							sourceMap: true
						}
					}
					, {
						loader: 'sass-loader'
						, options: {
							sourceMap: true
						}
					}
				]
			}
			, {
				test: /\.(jpe?g|png|gif|svg)$/i
				, use: [{
					loader: 'file-loader'
					, options: {
						name: '[name].[ext]'
						, outputPath: 'images/'
					}
				}]
			}
			, {
				test: /\.(woff(2)?|ttf|eot)(\?v=\d+\.\d+\.\d+)?$/
				, use: [{
					loader: 'file-loader'
					, options: {
						name: '[name].[ext]'
						, outputPath: 'fonts/'
					}
				}]
			}
		]
	}
	, plugins: [
		new CleanWebpackPlugin([process.env.THEME_ASSETS_FOLDER_NAME], {root: path.resolve(__dirname, process.env.THEME_ROOT_PATH)})
		, new MiniCssExtractPlugin({
			filename: 'css/styles.min.css'
		})
		, new ImageminPlugin({
			bail: false
			, cache: true
			, imageminOptions: {
				plugins: [
					imageminGifsicle({
						interlaced: true
					})
					, imageminJpegtran({
						progressive: true
					})
					, imageminOptipng({
						optimizationLevel: 5
					})
					, imageminSvgo({
						removeViewBox: false
					})
				]
			}
		})
		, new LiveReloadPlugin()
	]
};