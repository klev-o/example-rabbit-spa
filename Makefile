up: docker-up

init: docker-clear docker-up api-composer frontend-install frontend-build

docker-clear:
	docker-compose down --remove-orphans

docker-up:
	docker-compose up --build -d

frontend-install:
	docker-compose run --rm frontend-nodejs npm install

frontend-build:
	docker-compose run --rm frontend-nodejs npm run build

api-composer:
	docker-compose run --rm api-php-cli composer install