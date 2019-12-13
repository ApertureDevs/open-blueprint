dcr :=  docker-compose run --rm --no-deps

build: dist

node_modules: package-lock.json
	$(dcr) nodejs npm ci

dist: dist/css

dist/css: node_modules
	$(dcr) nodejs node_modules/.bin/node-sass --output-style compressed src/scss --output dist/css