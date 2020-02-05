up: docker-up
down: docker-down
restart: docker-down docker-up
rebuild: docker-down docker-build
init: docker-down docker-down-clear docker-build docker-up

docker-up:
	docker-compose up -d

docker-down:
	docker-compose down --remove-orphans

docker-down-clear:
	docker-compose down -v --remove-orphans

docker-pull:
	docker-compose pull

docker-build:
	docker-compose up -d --build