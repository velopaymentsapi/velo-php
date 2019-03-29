help:
	@echo ""
	@echo "\033[0;34m    Velo Payments - PHP Client (\033[1;34mvelo-php\033[0;34m) \033[0m"
	@echo ""
	@echo "    To dynamically generate the PHP client based on a spec issue the following command."
	@echo "    You can specify the spec by replacing the url parameter"
	@echo ""
	@echo "\033[92m    make WORKING_SPEC=https://apidocs.velopayments.com/openapi.json client \033[0m"
	@echo ""

clean:
	rm -Rf docs
	rm -Rf lib
	rm -Rf test
	rm -Rf .php_cs
	rm -f composer.json
	rm -f phpunit.xml.dist
	rm -f README.md

php-client:
	docker run --rm -v ${PWD}:/local openapitools/openapi-generator-cli generate \
		-i $$WORKING_SPEC \
		-g php \
		-o /local

trim:
	rm -Rf .openapi-generator
	rm .openapi-generator-ignore
	rm .travis.yml
	rm git_push.sh

info:
	# sed -i.bak 's/"name": "velo_payments_ap_is"/"name": "php-node"/' composer.json && rm composer.json.bak
	# sed -i.bak 's/"main": "src\/index.js"/"main": "dist\/index.js"/' composer.json && rm composer.json.bak
	# sed -i.bak 's/"test": "mocha/"clean": "rm \-rf dist \&\& mkdir dist", "build": "npm run clean \&\& babel src \-\-out\-dir dist", "test": "mocha/' composer.json && rm composer.json.bak
	@echo 'WE NEED TO UPDATE COMPOSER.JSON FILE'

client: clean php-client trim info