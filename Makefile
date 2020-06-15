
.PHONY: composer composer-install composer-update npm npm-install npm-watch npm-dev npm-build install

composer:
	docker run -it --rm -v $(PWD):/app -w=/app composer /bin/bash

composer-install:
	docker run -it --rm -v $(PWD):/app -w=/app composer install

composer-update:
	docker run -it --rm -v $(PWD):/app -w=/app composer update

npm:
	docker run -it --rm -v $(PWD):/app -w=/app/assets node /bin/bash

npm-install:
	docker run -it --rm -v $(PWD):/app -w=/app/assets node npm install

npm-watch:
	docker run -it --rm -p 127.0.0.1:35729:35729 -v $(PWD):/app -w=/app/assets node npm run watch

npm-dev:
	docker run -it --rm -v $(PWD):/app -w=/app/assets node npm run dev

npm-build:
	docker run -it --rm -v $(PWD):/app -w=/app/assets node npm run build

install:
	docker run -it --rm -v $(PWD):/app -w=/app composer install \
	&& docker run -it --rm -v $(PWD):/app -w=/app/assets node npm install
