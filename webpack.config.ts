import * as path from "path";
import * as fs from "fs";
import MiniCssExtractPlugin from "mini-css-extract-plugin";
import * as webpack from 'webpack'

// get all view entrypoints
const views = fs.readdirSync(path.resolve(__dirname, "source/views"));

const config: webpack.Configuration = {
  mode: "production",
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

export default config;