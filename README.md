## Variavel de ambiente

Antes da instalação, é necessário criar o arquivo .env na raiz do projeto, para isso, execute o comando:

> cp .env.example .env

Algumas variaveis de ambiente que podem ser alteradas caso necessário.

> APP_AlIAS={alias_do_nome_do_projeto}

obs: será usado para os nomes dos containers

> APP_PORT=8001

obs: porta que será usada para acessar o projeto

> SO_USER={usuario_do_sistema}
> 
> SO_USER_ID={id_usuario_do_sistema}

obs: Isso serve para que os arquivos criados dentro do container docker fique com usuario do sistema. Para saber o id do usuario do sistema, execute o comando `id -u` no terminal

> DOCKER_HOST_IP=172.17.0.1

obs: 172.17.0.1 normalemnte é o padrão do docker, mas caso não seja, execute o comando `docker network inspect bridge` e pegue o ip do gateway

> DOCKER_EXTERNAL_DB_PORT=5455

obs: porta do banco de dados para ser acessado por fora do container

> DOCKER_REDIS_EXTERNAL_PORT=6380

obs: porta do redis para ser acessado por fora do container

## Instalação

> docker-compose up -d

> docker exec -it {alias_do_nome_do_projeto}_web sh

> composer install

> php artisan key:generate

> php artisan migrate

> php artisan db:seed

> php artisan passport:install

> exit

> sudo chmod 777 storage/logs -R

> sudo chmod 777 storage/framework -R


## Documentação

Para acessar a documentação do projeto, acesse o link:

> http://localhost:{APP_PORT}/documentation

obs: Essa documentação foi gerada automaticamente pelo pacote [rakutentech/laravel-request-docs], é uma 
alternativa rapida para projetos bem pequenos, onde é gerado atraves das rotas criadas. É possivel interagir semelhante ao swagger.

Tambem foi criado um arquivo em [collections/Laratest.postman_collection.json] para ser importado no postman, para testar as rotas. 
junto ao arquivo tambem existe outro [collections/laratest.postman_environment.json] que são as variaveis de ambiente para 
serem usadas no postman.

## Testes

Foram criados 11 testes de integração, para executar, execute o comando:

> docker-compose exec -it {alias_do_nome_do_projeto}_web sh

> ./vendor/bin/phpunit
