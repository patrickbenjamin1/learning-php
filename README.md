# Prerequisites

- php `brew install php`
- composer `brew install composer`
- asdf `brew install asdf`

# Setup

from the root of this repo, run

```sh
asdf install
npm install
```

and from `server/` run

```sh
composer install
```

# Start

in one terminal instance at the root of this repo, run

```sh
./serve.sh
```

and in another

```sh
./start.sh
```

# Explanation

This is a simple php server which serves a website and a rest api.

The entrypoint for the server is `server/index.php` which routes to the following depending on the composition of the path

- `server/api/index.php` - if it starts `/api/v1`
- `server/public/*` - if it ends with a filetype and exists in the public directory
- `server/www/index.php` - everything else

JS and CSS can be found in `source/` which is bundled by `webpack` into `server/public` then imported into `php`

There is also a JS bundle generated for each JS file in `source/views/`

# Plans

- connect to a prismic repository (https://github.com/prismicio-community/php-kit/blob/master/docs/02-query-the-api/01-how-to-query-the-api.md)
- move routes to a json file shared between server code and frontend js
- set up and connect a database (postgres?)
