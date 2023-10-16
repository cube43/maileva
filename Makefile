build: dup generate dothechown clean phpstan psalm
	@echo "Build done !"

generate:
	wget "https://www.maileva.com/app/uploads/2023/09/api-electronic_qualified_registered_mail-v1-3.yaml" -O .schema.json
	docker run --rm -v ${PWD}:/local openapitools/openapi-generator-cli generate -i /local/.schema.json -g php -o /local/ -c /local/config/envoi-et-suivi-de-lre-qualifiees.config.yml
	rm .schema.json
	wget "https://www.maileva.com/app/uploads/2023/09/api-notification_center-v2-6.yaml" -O .schema.json
	docker run --rm -v ${PWD}:/local openapitools/openapi-generator-cli generate -i /local/.schema.json -g php -o /local/ -c /local/config/notifications-webhooks.config.yml
	rm .schema.json
	docker-compose exec php php fix-composer.php
	docker-compose exec php composer update
	docker-compose exec php composer bump

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

phpstan:
	docker-compose exec php  ./vendor/bin/phpstan --memory-limit=1000M

psalm:
	docker-compose exec php  ./vendor/bin/psalm

dothechown:
	sudo chown -R $(USER):$(USER) .

dup:
	docker-compose up -d
