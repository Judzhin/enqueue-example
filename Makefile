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

ferrari-cli:
	docker-compose run --rm bunny-ferrari-cli ${ARGS}

ferrari-console:
	docker-compose run --rm bunny-ferrari-cli php bin/console ${ARGS}

lamborghini-cli:
	docker-compose run --rm bunny-lamborghini-cli ${ARGS}

lamborghini-console:
	docker-compose run --rm bunny-lamborghini-cli php bin/console ${ARGS}