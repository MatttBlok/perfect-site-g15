migrate:
	mysql -u root -p < migrations/0-init.sql
	mysql -u root -p uneanneedevoyages < migrations/1-tables.sql

start:
	php -S localhost:8000 -t public/
