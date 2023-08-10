# Prerequisites

- php `brew install php`
- asdf `brew install asdf`

# Start

in one terminal instance

```sh
./serve.sh
```

and in another

```sh
./start.sh
```

# Plans

- set up an apache server, use this to serve locally
  - route all paths through index except
    - /api, _.css, _.js, and other filetypes i.e. images
- write a couple http endpoints that just serve stuff
- write a router that serves an initial view and the shell from the server based on the path, then a client side router that requests more markup as it moves between paths
- set up and connect a database (postgres?)
