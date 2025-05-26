.PHONY: default up composer-install artisan-migrate-fresh

default: up composer-install artisan-migrate-fresh

up:
	@echo "Starting containers..."
	docker-compose up -d --build

composer-install:
	@echo "Installing composer dependencies..."
	docker-compose run -T --rm composer install

artisan-migrate-fresh:
	@echo "Running migrations..."
	docker-compose run -T --rm artisan migrate:fresh
