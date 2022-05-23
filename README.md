# movie test

## installation
```shell
cd movie-test
docker run --rm --interactive --tty --volume $PWD:/app composer install
cp .env.example .env
php artisan key:generate
```

## start app
```shell
docker-compose up -d
```
