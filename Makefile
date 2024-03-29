.PHONY: tests

.DEFAULT_GOAL := help

.PHONY: help
help: ## Display this help section
	@echo ""
	@echo "\033[0;34m    Velo Payments - PHP Client (\033[1;34mvelopaymentsapi/velo-php\033[0;34m) \033[0m"
	@echo ""
	@echo "    To dynamically generate the PHP client based on a spec issue the following command."
	@echo "    You can specify the spec by replacing the url parameter"
	@echo ""
	@echo "\033[92m    make client WORKING_SPEC=https://raw.githubusercontent.com/velopaymentsapi/VeloOpenApi/master/spec/openapi.yaml \033[0m"
	@echo ""
	@echo "     *** Available Targets ***"
	@echo ""
	@awk 'BEGIN {FS = ":.*?## "} /^[a-zA-Z0-9_-]+:.*?## / {printf "    \033[36m%-38s\033[0m %s\n", $$1, $$2}' $(MAKEFILE_LIST)
	@echo ""

version: ## Parse (via docker) spec file passed in WORKING_SPEC variable to print the version
	@docker run -i --rm mikefarah/yq:3 sh -c "apk -q add curl && curl -s $$WORKING_SPEC -o /tmp/oa3.yaml;  yq r /tmp/oa3.yaml info.version" 2>&1

oa3config: ## Set version on the openapi generator config to value of the VERSION variable
	sed -i.bak 's/"artifactVersion": ".*"/"artifactVersion": "${VERSION}"/g' oa3-config.json && rm oa3-config.json.bak

clean: ## Remove files & directories that are auto created by generator cli
	rm -Rf docs
	rm -Rf lib
	rm -Rf test
	rm -Rf .php_cs
	rm -f composer.json
	rm -f phpunit.xml.dist
	rm -f README.md

generate: ## Run (via docker) generator cli against a spec file passed in WORKING_SPEC variable to create files
	docker run --rm -v ${PWD}:/local openapitools/openapi-generator-cli generate \
		-i $$WORKING_SPEC \
		-g php \
		-o /local \
		-c /local/oa3-config.json

trim: ## Remove unused files that are auto geneated
	- rm -Rf .openapi-generator
	- rm .openapi-generator-ignore
	- rm .travis.yml
	- rm git_push.sh

info: ## Update the auto generated README.md with Velo info
	# sed -i.bak 's/"name": "GIT_USER_ID\/GIT_REPO_ID"/"name": "velopaymentsapi\/velo-php"/' composer.json && rm composer.json.bak
	sed -i.bak '3s/.*/    "description": "This library provides a PHP client that simplifies interactions with the Velo Payments API.",/' composer.json && rm composer.json.bak
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
	

build_client: ## Post generate client processing (optional per sdk)
	#

client: clean generate trim info build_client ## Generate sdk via cli

tests: ## Run (via docker) tests using supplied variables KEY, SECRET, PAYOR, APIURL
	rm -Rf test/Model
	cp -Rf tests/ test/
	rm composer.lock
	docker run -t -v $(PWD):/app --env KEY=${KEY} --env SECRET=${SECRET} --env PAYOR=${PAYOR} -e APIURL=${APIURL} -e APITOKEN="" --rm composer install
	docker run -t -v $(PWD):/app --env KEY=${KEY} --env SECRET=${SECRET} --env PAYOR=${PAYOR} -e APIURL=${APIURL} -e APITOKEN="" composer  ./vendor/bin/phpunit

commit: ## Commit & Push generated client to git repo
	sed -i.bak 's/"version": ".*"/"version": "${VERSION}"/g' composer.json && rm composer.json.bak
	git add --all
	git commit -am 'bump version to ${VERSION}'
	git push --set-upstream origin ${BRANCH}

build: ## Build compiled package (optional per sdk)
	@echo "Packagist polls tags on github ... tag and push"

publish: ## Tag & Push git ref, (optional per sdk) publish to 3rd party registry
	git tag $(VERSION)
	git push origin tag $(VERSION)