# Setup di un progetto Laravel
## Questi sono i passi da seguire per creare un nuovo progetto Laravel:
1. creare la cartella del progetto
1. aprirla con vscode
1. aprire il terminale e installare Laravel con:
	```shell
	composer create-project --prefer-dist laravel/laravel:^7.0 .
	```
1. modificare il file **webpack.mix.js** aggingendo il metodo .options alla fine:
    ```js
    mix.js('resources/js/app.js', 'public/js')
        .sass('resources/sass/app.scss', 'public/css')
        .options({
            processCssUrls: false,
        });
    ```
1. aprire il file **package.json** e modificare la versione di laravel-mix che deve diventare:
    ```json
    "laravel-mix": "^6.0.49",
    ```
	oppure in alterntiva dare il comando nel terminale:
	```shell
	npm install laravel-mix@latest
	```
1. finita l'installazione installare le librerie js con:
	```shell
	npm install
	```
1. per installare bootstrap, installare la libreria dando il comando sul terminale (modificare il numero della versione in base alle necessità):
    ```shell
    npm install bootstrap@5.2.3
    ```
    potrebbe essere necessario installare anche la libreria popperjs:
    ```shell
    npm i @popperjs/core
    ```
    poi nel file **resources/sass/app.scss** aggiungere:
    ```scss
    @import "~bootstrap";
    ```
    e nel file **resources/js/app.js** aggiungere:
    ```js
    require('bootstrap'); // importa la libreria boostrap
    ```
1. per installare fonts andare su GoogleFonts e copiare l'@import nel file **resources/sass/app.scss** (i punti e virgola nell'url potrebbero generare errori, in questo caso sostituirli con %3b ), per esempio:
    ```scss
    // il comando
    @import url('https://fonts.googleapis.com/css2?family=Lora:wght@400;700&display=swap');

    // diventa:
    @import url('https://fonts.googleapis.com/css2?family=Lora:wght@400%3b700&display=swap');
    ```
1. per installare fontawesome, installare la libreria dando il comando sul terminale:
    ```shell
    npm i @fortawesome/fontawesome-free
    ```
    In **webpack.mix.js** aggiungere:
    ```js
    mix.copyDirectory( './node_modules/@fortawesome/fontawesome-free/webfonts/*', './dist/fonts/font-awesome' );
    ```
    In **resources/sass/app.scss** aggiungere:
    ```scss
    $fa-font-path: "./fonts/font-awesome" !default;
    @import "~@fortawesome/fontawesome-free/scss/fontawesome";
    @import "~@fortawesome/fontawesome-free/scss/regular";
    @import "~@fortawesome/fontawesome-free/scss/solid";
    @import "~@fortawesome/fontawesome-free/scss/brands";

    //resto del codice
    ```
1. avviare MAMP (serve per il database)
1. da phpMyAdmin creare il database del progetto
1. andare nel file **.env** e settare i dati del database (sostituendo alle [] i vostri valori)
    ```shell
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=[stessa porta settata su MAMP]
    DB_DATABASE=[nome che avete dato al database creato prima]
    DB_USERNAME=root
    DB_PASSWORD=root
    ```
1. avviare il server con:
	```shell
	php artisan serve
	```
    oppure (specialmmente se da errore la funzione asset)
    ```shell
    php -S localhost:8000 -t public
    ```
1. aprire un'altra tab del terminale e lanciare il watch per compilare le risorse:
	```shell
	npm run watch
	```
	(se da errore eseguire il comando una seconda volta)
1. aprire un'altra tab del terminale libera per lanciare eventuali altri comandi
1. per creare un controller (sostituire a NomeController il nome del controller):
    ```shell
    php artisan make:controller NomeController
    ```
1. per creare un model (sostituire a Nome il nome del model, che deve essere il singolare del nome della tabella associata e deve iniziare con la maiuscola):
    ```shell
    php artisan make:model Nome
    ```
1. per creare una migration che crea una tabella (sostituire a [nome_tabella] il nome della tabella, che dovrebbe essere un nome inglese al plurale):
    ```shell
    php artisan make:migration create_[nome_tabella]_table
    ```
1. per creare una migration che modifica una tabella (sostituire a [nome_tabella] il nome della tabella, che dovrebbe essere un nome inglese al plurale):
    ```shell
    php artisan make:migration update_[nome_tabella]_table --table=[nome_tabella]
    ```
    per poter eseguire la migration c'e' bisogno di installare una libreria:
    ```shell
    composer require doctrine/dbal:2.*
    ```
1. per creare il seeder di una tabella (sostituire a [NomeModel] il nome del model della tabella, che dovrebbe essere il singolare del nome della tabella):
    ```shell
    php artisan make:seeder [NomeModel]TableSeeder
    ```
    poi nel file **database/seeds/DatabaseSeeder.php** aggiungere nella funzione run():
    ```php
    public function run()
    {
        // $this->call(UserSeeder::class);
        $this->call(NomeModelTableSeeder::class); // sostituire NomeModel con il nome effettivo del model
    }
    ```
1. per installare la libreria Faker:
    eventualmente disinstallare la vecchia libreria faker:
    ```shell
    composer remove fzaninotto/faker
    ```
    ed installare la nuova:
    ```shell
    composer require fakerphp/faker
    ```
1. per installare la laravel-debugbar:
    ```shell
    composer require barryvdh/laravel-debugbar --dev
    ```
1. per eseguire le migration
    ```shell
    php artisan migrate
    ```
1. per eseguire i seed
    ```shell
    php artisan db:seed
    ```
1. per cancellare il database ed eseguire le migration e i seeder (reset del database):
    ```shell
    php artisan migrate:fresh --seed
    ```


## Passi per scaricare un progetto Laravel:
1. copiare **.env.example** nella stessa cartella e rinominarlo **.env**
1. installare le librerie php con:
	```
    composer install
    ```
1. sul terminale dare il comando
    ```
    php artisan key:generate
    ```
1. finita l'installazione installare le librerie js con:
    ```
	npm install
    ```
1. avviare MAMP (serve per il database)
1. da phpMyAdmin creare il database del progetto
1. andare nel file **.env** e settare i dati del database (sostituendo alle [] i vostri valori)
    ```shell
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=[stessa porta settata su MAMP]
    DB_DATABASE=[nome che avete dato al database creato prima]
    DB_USERNAME=root
    DB_PASSWORD=[password del db - di default vale root]
    ```
1. finita l'installazione avviare il server con:
    ```
	php artisan serve
	```
    oppure (specialmmente se da errore la funzione asset)
    ```
    php -S localhost:8000 -t public
    ```
1. aprire un'altra tab del terminale e lanciare il watch per compilare le risorse:
    ```
	npm run watch
    ```
	(se da errore eseguire il comando una seconda volta)
1. aprire un'altra tab del terminale e avviare le migrations e il seed del database:
    ```shell
    php artisan migrate
    ```
    ```shell
    php artisan db:seed
    ```
1. aprire un'altra tab del terminale libera per lanciare eventuali altri comandi
