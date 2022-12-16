SHELL=/bin/bash -o pipefail

docker.init_containers:
	docker-compose build

docker.start:
	docker-compose up -d

docker.stop:
	docker-compose stop

app.init_data:
	docker-compose exec php bin/console doctrine:schema:update
	docker-compose exec php bin/console doctrine:fixtures:load -n

app.asset-dev:
	docker-compose run js npm ci && npm run dev
app.asset-watch:
	docker-compose run js npm ci && npm run watch
app.asset-prod:
	docker-compose run js npm ci && npm run build
