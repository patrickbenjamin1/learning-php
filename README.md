# Prerequisites

- php `brew install php`
- composer `brew install composer`
- asdf `brew install asdf`

# Setup

from the root of this repo, run

```sh
asdf install
npm install
composer install
```

# Start

in one terminal instance at the root of this repo, run

```sh
npm start
```

this starts the js/scss bundler.

and in another

```sh
composer start
```

this starts the php dev server.

# Plans

- connect to a prismic repository (https://github.com/prismicio-community/php-kit/blob/master/docs/02-query-the-api/01-how-to-query-the-api.md)
- move routes to a json file shared between server code and frontend js
- set up and connect a database (postgres?)
