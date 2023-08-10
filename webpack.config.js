const path = require("path");
const fs = require("fs");
const MiniCssExtractPlugin = require("mini-css-extract-plugin");

// get all view entrypoints
const views = fs.readdirSync(path.resolve(__dirname, "source/views"));

/** @type {import('webpack').Configuration} */
module.exports = {
  mode: "development",
  entry: {
    app: path.resolve(__dirname, "source/app.ts"),
    // reduce view entry points
    ...views.reduce(
      (output, viewFileName) => ({
        ...output,
        [viewFileName.split(".")[0]]: path.resolve(
          __dirname,
          "source/views",
          viewFileName
        ),
      }),
      {}
    ),
  },
  output: {
    path: path.resolve(__dirname, "server/public/"),
    filename: "[name].bundle.js",
  },
  resolve: {
    extensions: [".tsx", ".ts", ".js"],
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
      {
        test: /\.tsx?$/,
        use: "ts-loader",
        exclude: /node_modules/,
      },
    ],
  },
};
