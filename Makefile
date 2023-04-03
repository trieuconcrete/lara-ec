# docker
build:
	docker compose up -d --build
	docker compose exec app composer install
	docker compose exec app cp .env.dev .env
	@make optimize
	@make migrate
	@make seed
	docker compose exec app php artisan storage:link
	docker compose exec app chmod 777 /var/log
rebuild:
	@make destroy
	@make build
destroy:
	docker compose down --rmi all --volumes
up:
	docker-compose up -d
build:
	docker compose build --no-cache --force-rm
stop:
	docker compose stop
down:
	docker compose down

app:
	docker compose exec app bash

# laravel
migrate:
	docker compose exec app php artisan migrate
fresh:
	docker compose exec app php artisan migrate:fresh --seed
seed:
	docker compose exec app php artisan db:seed
rollback-test:
	docker compose exec app php artisan migrate:fresh
	docker compose exec app php artisan migrate:refresh
tinker:
	docker compose exec app php artisan tinker
cache:
	docker compose exec app composer dump-autoload -o
cache-clear:
	@make optimize-clear
test:
	docker compose exec app php artisan config:clear
	docker compose exec app php artisan test
optimize:
	docker compose exec app php artisan optimize
optimize-clear:
	docker compose exec app php artisan optimize:clear
