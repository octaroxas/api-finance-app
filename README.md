# Finance App - API

<a href="https://github.com/octaroxas/api-finance-app/tree/main/docs/api" target="_blank">
    Link Documentação
</a>

### 1. Requisitos para execução local do projeto

- <a href="https://docs.docker.com/desktop/">Docker</a>
- <a href="https://docs.docker.com/compose/">Docker Compose</a>

### 2. Execução do projeto

Clonar o repositório via SSH:
```
git clone git@github.com:octaroxas/api-finance-app.git
```

Entrar na pasta do projeto:
```
cd api-finance-app
```

Criar o arquivo ``.env``:
```
cp .env.example .env
```
> As configurações do banco de dados já estão no ``.env.example``


Criar os containers e executá-los:
```
docker-compose up -d --build
```
> Na primeira execução pode demorar alguns minutos para criar os containers, por conta do processo de build da image do container **finance-api-app**.

Instalar as dependências do projeto:
```
docker-compose exec app composer install
```

Gerar uma nova Application Key:
```
docker-compose exec app php artisan key:generate
```

Executa as ``migrations`` do sistema:
```
docker-compose exec app php artisan migrate:refresh --seed
```
> A flag ``--seed`` executa as Seeders do sistema

O projeto estará executando no endereço:

```
http://localhost:8000
```
Documentação
- <a href="https://github.com/octaroxas/api-finance-app/blob/main/docs/api/Auth.md">Autenticação</a>
- <a href="https://github.com/octaroxas/api-finance-app/blob/main/docs/api/Wallet.md">Wallet</a>
- <a href="https://github.com/octaroxas/api-finance-app/blob/main/docs/api/Transaction.md">Transaction</a>

Rotas
```
POST            api/v1/login
POST            api/v1/logout
POST            api/v1/register
GET|HEAD        api/v1/transaction
POST            api/v1/transaction
GET|HEAD        api/v1/transaction/{transaction}
PUT|PATCH       api/v1/transaction/{transaction}
DELETE          api/v1/transaction/{transaction}
GET|HEAD        api/v1/wallet
POST            api/v1/wallet
GET|HEAD        api/v1/wallet/{wallet}
PUT|PATCH       api/v1/wallet/{wallet}
DELETE          api/v1/wallet/{wallet}
```
