const autoprefixer = require('autoprefixer');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const path = require('path');

module.exports = {
	mode: 'production' ,
	entry: ['./src/js/index.js', './src/sass/style-v2.0.scss'],
	output: {
		path: path.resolve(__dirname, 'assets/'),
		filename: 'js/script.js',
	},
	optimization: {
        minimize: false
    },
	devtool: "source-map", // any "source-map"-like devtool is possible
	plugins: [
		new MiniCssExtractPlugin({
		  filename: '/css/style.css',
		  chunkFilename: '[id].css',
		}),
	  ],
	module: {
		rules: [
			{
				test: /\.scss$/,
				use: [
					MiniCssExtractPlugin.loader,
					{
						loader: 'css-loader',
						options: {
							sourceMap: true
						  }
					},
					{
						loader: 'resolve-url-loader',
					},
					{
						loader: 'postcss-loader'
					},
					{
						loader: 'sass-loader',
						options: {
							implementation: require("sass"),
							sourceMap: true,
						  }
					}
				]
			},
			{
				test: /\.(eot|svg|ttf|woff|woff2)$/,
				use: {
					loader: 'file-loader',
					options: {
						name: '[name].[ext]',
						outputPath: 'webfonts/'
					},
				},
			},
		]
	},
};