spustenie projektu . 

Premenujte .env.example na .env 
Pripojte sa na DB ktoru si vytvorite


DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=forum
DB_USERNAME=root
DB_PASSWORD=12345BJS


potom spustite:
composer install 

php artisan migrate

npm install a npm run dev 
niekedy to treba spustit dva krát po sebe 

-> aplikácia obsahuje 
tagy , 
komentare 
je tam paginacia pre obe .
vyhladavanie v zaznamoch vsetky parametre len pomocou js 

login 
ak je uzivatel prihlaseny moze vytvárat nové 
rss som uz nestihol 
vymazaním príspevku sa zmazu aj vsetky comentáre
