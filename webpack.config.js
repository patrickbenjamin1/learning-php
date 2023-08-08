const path = require("path");
const MiniCssExtractPlugin = require("mini-css-extract-plugin");

/** @type {import('webpack').Configuration} */
module.exports = {
  mode: "development",
  entry: {
    app: path.resolve(__dirname, "./source/app.js"),
  },
  output: {
    path: path.resolve(__dirname, "./server"),
    filename: "[name].js",
  },
  plugins: [
    new MiniCssExtractPlugin({
      filename: "styles.css",
    }),
  ],
  module: {
    rules: [
      {
        test: /\.css$/,
        use: [MiniCssExtractPlugin.loader, "css-loader"],
      },
    ],
  },
};
