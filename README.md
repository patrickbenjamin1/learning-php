# Prerequisites

- php `brew install php`
- asdf `brew install asdf`
- apache anywhere (for local dev) `https://github.com/julianbrowne/apache-anywhere`

# Start

in one terminal instance

```sh
./serve.sh
```

and in another

```sh
./start.sh
```

# Explanation

This is a simple php server which serves a website and a rest api.

The entrypoint for the server is `server/index.php` which routes to the following depending on the path

- `server/www/index.php`
- `server/api/index.php`
- `server/public/*`

JS and CSS can be found in `source/` which is bundled by `webpack` into `server/public`.

There is also a JS bundle generated for each JS file in `source/views/`

# Plans

- set up an apache server, use this to serve locally
  - route all paths through index except
    - /api, _.css, _.js, and other filetypes i.e. images
- write a couple http endpoints that just serve stuff
- write a router that serves an initial view and the shell from the server based on the path, then a client side router that requests more markup as it moves between paths
- set up and connect a database (postgres?)
