# Upute za instalaciju
### 1. preuzeti kod sa gita pomoću git clone ili preuzimanje zip datoteke te uraditi extract u xampp/htdocs
### 2. unutar terminala ući u direktorij
```sh
$ cd C:/xampp/htdocs/pis-main
```
### 3. pokrenuti naredbe 
```sh
    composer install
    npm install
    cp .env.example .env
    php artisan key:generate
```
### 4. uraditi import opg.sql u phpmyadminu 
### 5. podesiti u .env datoteci 
```sh
     DB_DATABASE=opg
```
### 6. podesiti dozvole za storage direktorij
    ```sh
        chmod 755 -R ../pis-main/
        chmod -R o+w ../pis-main/storage

``
