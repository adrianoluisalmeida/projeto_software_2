# projeto_software_2

*Comandos necessários para instalar o projeto:*


```
#!shell
//Execute o comando para instalar as dependecias do projeto
# composer install


//Obs.: Caso não funcione o comando acima, execute esses dois:
# rm -rf composer.lock
# composer update --no-scripts

//Duplique o arquivo de exemplo de configurações do projeto
$ cp .env.example .env

//Cria uma key generica que é usada na criptografia do projeto
$ php artisan key:generate

//Abra o arquivo ".env" e altere as configurações de conexão com o banco de dados
vim .env


//Comando do npm para baixar depências do projeto (JS) e compilar e unir os arquivos do frontend
# npm install
# npm run dev //para compilar ambiente desenvolvimento
# npm run watch //para compilar ambiente desenvolvimento e ficar escutando as modificações


//E por fim para rodar o servidor embutido do php/laravel:
$ php artisan serve

```

