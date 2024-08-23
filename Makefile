CONSOLE := php bin/console
PHPUNIT := php bin/phpunit

reset-test-db:
	$(CONSOLE) doctrine:database:drop --env=test --force --if-exists
	$(CONSOLE) doctrine:database:create --env=test
	$(CONSOLE) doctrine:migrations:migrate --env=test --no-interaction
	$(CONSOLE) doctrine:fixtures:load --env=test --no-interaction

tests: reset-test-db
	$(PHPUNIT)