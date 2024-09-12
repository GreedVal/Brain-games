install:
	composer install

brain-games:
	./bin/brain-games

brain-even:
	./bin/brain-even

brain-even:
	./bin/brain-calc

brain-progression:
	./bin/brain-progression

brain-prime:
	./bin/brain-prime

validate:
	composer validate

lint:
	composer exec --verbose phpcs -- --standard=PSR12 src bin