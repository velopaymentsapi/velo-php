help:
	@echo ""
	@echo "\033[0;34m    Velo Payments - PHP Client (\033[1;34mvelopaymentsapi/velo-php\033[0;34m) \033[0m"
	@echo ""
	@echo "    To dynamically generate the PHP client based on a spec issue the following command."
	@echo "    You can specify the spec by replacing the url parameter"
	@echo ""
	@echo "\033[92m    make WORKING_SPEC=https://raw.githubusercontent.com/velopaymentsapi/VeloOpenApi/master/spec/openapi.yaml client \033[0m"
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
	sed -i.bak 's/"name": "GIT_USER_ID\/GIT_REPO_ID"/"name": "velopaymentsapi\/velo-php"/' composer.json && rm composer.json.bak
	sed -i.bak '3s/.*/    "description": "This library provides a PHP client that simplifies interactions with the Velo Payments API.",/' composer.json && rm composer.json.bak
	sed -i.bak 's/OpenAPI\\\\Client/VeloPayments\\\\Client/' composer.json && rm composer.json.bak
	sed -i.bak 's/"name": "OpenAPI-Generator contributors"/"name": "VeloPayments contributors"/' composer.json && rm composer.json.bak
	sed -i.bak 's/"homepage": "https:\/\/openapi-generator.tech"/"homepage": "https:\/\/github.com\/velopaymentsapi\/velo-php"/g' composer.json && rm composer.json.bak
	sed -i.bak 's/"openapitools",/"velo",/' composer.json && rm composer.json.bak
	sed -i.bak 's/"openapi-generator",/"velo-payments",/' composer.json && rm composer.json.bak
	
	# 
	grep -rl 'OpenAPI' ./docs/Api | xargs sed -i.bak 's/OpenAPI\\Client/VeloPayments\\Client/g'
	grep -rl 'OpenAPI' ./docs/Model | xargs sed -i.bak 's/OpenAPI\\Client/VeloPayments\\Client/g'
	rm -Rf ./docs/*/*.bak
	# 
	grep -rl 'OpenAPI' ./lib/Api | xargs sed -i.bak 's/OpenAPI\\Client/VeloPayments\\Client/g'
	grep -rl 'OpenAPI' ./lib/Model | xargs sed -i.bak 's/OpenAPI\\Client/VeloPayments\\Client/g'
	grep -rl 'OpenAPI' ./lib | xargs sed -i.bak 's/OpenAPI\\Client/VeloPayments\\Client/g'
	rm -Rf ./lib/*/*.bak
	rm -Rf ./lib/*.bak
	# 
	grep -rl 'OpenAPI' ./test/Api | xargs sed -i.bak 's/OpenAPI\\Client/VeloPayments\\Client/g'
	grep -rl 'OpenAPI' ./test/Model | xargs sed -i.bak 's/OpenAPI\\Client/VeloPayments\\Client/g'
	rm -Rf ./test/*/*.bak
	# 
	sed -i.bak '/# OpenAPIClient-php/G' README.md && rm README.md.bak
	sed -i.bak '1s/.*/# PHP client for Velo/' README.md && rm README.md.bak
	sed -i.bak '2s/.*/[![Latest Stable Version](https:\/\/poser.pugx.org\/velopaymentsapi\/velo-php\/v\/stable.svg)](https:\/\/packagist.org\/packages\/velopaymentsapi\/velo-php) [![License](https:\/\/poser.pugx.org\/velopaymentsapi\/velo-php\/license.svg)](https:\/\/packagist.org\/packages\/velopaymentsapi\/velo-php)/' README.md && rm README.md.bak
	sed -i.bak '3s/.*/ /' README.md && rm README.md.bak
	sed -i.bak '4s/.*/This library provides a PHP client that simplifies interactions with the Velo Payments API. For full details covering the API visit our docs at [Velo Payments APIs](https:\/\/apidocs.velopayments.com). Note: some of the Velo API calls which require authorization via an access token, see the full docs on how to configure./' README.md && rm README.md.bak

client: clean php-client trim info