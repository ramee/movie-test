# movie test

## installation
```shell
$ cd movie-test
$ docker run --rm --interactive --tty --volume $PWD:/app --user $(id -u):$(id -g) composer install
$ cp .env.example .env
$ docker-compose run --no-deps --rm app php artisan key:generate
```

## start app
```shell
$ docker-compose up -d
```
