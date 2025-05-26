PROJECT_NAME=game

up:
	docker-compose up -d --build

down:
	docker-compose down

composer-install:
	docker-compose run --rm composer install

artisan-migrate-fresh:
	docker-compose run --rm artisan migrate:fresh