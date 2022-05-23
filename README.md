# movie test

## installation
```shell
$ cd movie-test
$ docker run --rm --interactive --tty --volume $PWD:/app --user $(id -u):$(id -g) composer install
$ cp .env.example .env
$ docker-compose run --no-deps --rm app php artisan key:generate
$ docker-compose run --no-deps --rm app npm install
$ docker-compose run --no-deps --rm app npm run dev
$ docker-compose run --rm app php artisan migrate
```

## start app
```shell
$ docker-compose up -d
```
