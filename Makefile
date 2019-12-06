build: dist

node_modules: package-lock.json
	npm ci

dist: dist/css

dist/css: node_modules
	node_modules/.bin/node-sass --output-style compressed src/scss --output dist/css