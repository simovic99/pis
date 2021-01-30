Upute za instalaciju:
1. preuzeti kod sa gita pomoću git clone ili preuzimanje zip datoteke te uraditi extract u xampp/htdocs
2. unutar terminala ući u direktorij projekta
3. pokrenuti naredbe
    3.1 composer install
    3.2 npm install
    3.3 cp .env.example .env
    3.4 php artisan key:generate
4. uraditi import opg.sql u phpmyadminu 
5. podesiti u .env datoteci 
    5.1 DB_DATABASE=opg
6.  podesiti dozvole za storage direktorij
    6.1 chmod 755 -R ../pis-main/
    6.2 chmod -R o+w ../pis-main/storage
