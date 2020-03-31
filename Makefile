
.PHONY: composer composer-install composer-update npm npm-install install watch dev build

composer:
	docker run -it --rm -v $(CURDIR):/app -w=/app composer /bin/bash

composer-install:
	docker run -it --rm -v $(CURDIR):/app -w=/app composer install

composer-update:
	docker run -it --rm -v $(CURDIR):/app -w=/app composer update

npm:
	docker run -it --rm -v $(CURDIR):/app -w=/app node /bin/bash

npm-install:
	docker run -it --rm -v $(CURDIR):/app -w=/app node npm install

install:
	docker run -it --rm -v $(CURDIR):/app -w=/app composer install \
	&& docker run -it --rm -v $(CURDIR):/app -w=/app node npm install

watch:
	docker run -it --rm -p 127.0.0.1:35729:35729 -v $(CURDIR):/app -w=/app node npm run watch

dev:
	docker run -it --rm -v $(CURDIR):/app -w=/app node npm run dev

build:
	docker run -it --rm -v $(CURDIR):/app -w=/app node npm run build
