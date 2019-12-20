up: docker-up

init: docker-clear docker-up api-composer frontend-install frontend-build

docker-clear:
	docker-compose down --remove-orphans

docker-up:
	docker-compose up --build -d

frontend-install:
	docker-compose exec frontend-nodejs npm install

frontend-build:
	docker-compose exec frontend-nodejs npm run build

api-composer:
	docker-compose exec api-php-cli composer install