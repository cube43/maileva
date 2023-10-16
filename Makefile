build: dup generate dothechown clean requirephpstan phpstan
	@echo "Build done !"

generate:
	wget "https://www.maileva.com/app/uploads/2023/09/api-electronic_qualified_registered_mail-v1-3.yaml" -O .schema.json
	docker run --rm -v ${PWD}:/local openapitools/openapi-generator-cli generate -i /local/.schema.json -g php -o /local/ -c /local/config/envoi-et-suivi-de-lre-qualifiees.config.yml
	rm .schema.json
	wget "https://www.maileva.com/app/uploads/2023/09/api-notification_center-v2-6.yaml" -O .schema.json
	docker run --rm -v ${PWD}:/local openapitools/openapi-generator-cli generate -i /local/.schema.json -g php -o /local/ -c /local/config/notifications-webhooks.config.yml
	rm .schema.json
	docker-compose exec php php fix-composer.php

clean:
	rm git_push.sh
	rm phpunit.xml.dist
	rm .travis.yml
	rm .php-cs-fixer.dist.php
	rm -rf test
	rm -rf docs
	rm -rf .openapi-generator

login:
	docker-compose exec php sh

requirephpstan:
	docker-compose exec php composer require --dev phpstan/phpstan

phpstan:
	docker-compose exec php  ./vendor/bin/phpstan --memory-limit=1000M

dothechown:
	sudo chown -R $(USER):$(USER) .

dup:
	docker-compose up -d
