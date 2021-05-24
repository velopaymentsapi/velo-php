.PHONY: tests

help:
	@echo ""
	@echo "\033[0;34m    Velo Payments - PHP Client (\033[1;34mvelopaymentsapi/velo-php\033[0;34m) \033[0m"
	@echo ""
	@echo "    To dynamically generate the PHP client based on a spec issue the following command."
	@echo "    You can specify the spec by replacing the url parameter"
	@echo ""
	@echo "\033[92m    make WORKING_SPEC=https://raw.githubusercontent.com/velopaymentsapi/VeloOpenApi/master/spec/openapi.yaml client \033[0m"
	@echo ""

version:
	@docker run -i --rm mikefarah/yq:3 sh -c "apk -q add curl && curl -s $$WORKING_SPEC -o /tmp/oa3.yaml;  yq r /tmp/oa3.yaml info.version" 2>&1

oa3config:
	sed -i.bak 's/"artifactVersion": ".*"/"artifactVersion": "${VERSION}"/g' oa3-config.json && rm oa3-config.json.bak

clean:
	rm -Rf docs
	rm -Rf lib
	rm -Rf test
	rm -Rf .php_cs
	rm -f composer.json
	rm -f phpunit.xml.dist
	rm -f README.md

generate:
	docker run --rm -v ${PWD}:/local openapitools/openapi-generator-cli generate \
		-i $$WORKING_SPEC \
		-g php \
		-o /local \
		-c /local/oa3-config.json

trim:
	rm -Rf .openapi-generator
	rm .openapi-generator-ignore
	rm .travis.yml
	rm git_push.sh

info:
	# curl https://raw.githubusercontent.com/velopaymentsapi/changelog/main/README.md --output CHANGELOG.md
	sed -i.bak 's/"name": "GIT_USER_ID\/GIT_REPO_ID"/"name": "velopaymentsapi\/velo-php"/' composer.json && rm composer.json.bak
	sed -i.bak '4s/.*/    "description": "This library provides a PHP client that simplifies interactions with the Velo Payments API.",/' composer.json && rm composer.json.bak
	sed -i.bak 's/"name": "OpenAPI-Generator contributors"/"name": "VeloPayments contributors"/' composer.json && rm composer.json.bak
	sed -i.bak 's/"homepage": "https:\/\/openapi-generator.tech"/"homepage": "https:\/\/github.com\/velopaymentsapi\/velo-php"/g' composer.json && rm composer.json.bak
	sed -i.bak 's/"openapitools",/"velo",/' composer.json && rm composer.json.bak
	sed -i.bak 's/"openapi-generator",/"velo-payments",/' composer.json && rm composer.json.bak
	# 
	sed -i.bak 's/GIT_USER_ID\/GIT_REPO_ID/velopaymentsapi\/velo-php/' README.md && rm README.md.bak
	sed -i.bak '/# OpenAPIClient-php/G' README.md && rm README.md.bak
	sed -i.bak '1s/.*/# PHP client for Velo/' README.md && rm README.md.bak
	sed -i.bak '2s/.*/[![License](https:\/\/img.shields.io\/badge\/License-Apache%202.0-blue.svg)](https:\/\/opensource.org\/licenses\/Apache-2.0) [![npm version](https:\/\/badge.fury.io\/ph\/velopaymentsapi%2Fvelo-php.svg)](https:\/\/badge.fury.io\/ph\/velopaymentsapi%2Fvelo-php) [![CircleCI](https:\/\/circleci.com\/gh\/velopaymentsapi\/velo-php.svg?style=svg)](https:\/\/circleci.com\/gh\/velopaymentsapi\/velo-php)\\/' README.md && rm README.md.bak
	sed -i.bak '3s/.*/ /' README.md && rm README.md.bak
	sed -i.bak '4s/.*/This library provides a PHP client that simplifies interactions with the Velo Payments API. For full details covering the API visit our docs at [Velo Payments APIs](https:\/\/apidocs.velopayments.com). Note: some of the Velo API calls which require authorization via an access token, see the full docs on how to configure./' README.md && rm README.md.bak
	

build_client:
	#

client: clean generate trim info build_client

tests:
 	# TODO: test/Model since generated model tests are empty remove for now
	rm -Rf test/Model
	# overwrite the generated test stubs
	cp -Rf tests/ test/
	docker run -t -v $(PWD):/app --env KEY=${KEY} --env SECRET=${SECRET} --env PAYOR=${PAYOR} -e APIURL=${APIURL} -e APITOKEN="" --rm composer install
	docker run -t -v $(PWD):/app --env KEY=${KEY} --env SECRET=${SECRET} --env PAYOR=${PAYOR} -e APIURL=${APIURL} -e APITOKEN="" composer  ./vendor/bin/phpunit

commit:
	sed -i.bak 's/"version": ".*"/"version": "${VERSION}"/g' composer.json && rm composer.json.bak
	git add --all
	git commit -am 'bump version to ${VERSION}'
	git push --set-upstream origin master

build:
	@echo "Packagist polls tags on github ... tag and push"

publish:
	git tag $(VERSION)
	git push origin tag $(VERSION)