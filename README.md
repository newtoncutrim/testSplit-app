<p align="center">
  <a href="https://laravel.com" target="_blank">
    <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo">
  </a>
</p>

<p align="center">
  <a href="https://github.com/laravel/framework/actions">
    <img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status">
  </a>
  <a href="https://packagist.org/packages/laravel/framework">
    <img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads">
  </a>
  <a href="https://packagist.org/packages/laravel/framework">
    <img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version">
  </a>
  <a href="https://packagist.org/packages/laravel/framework">
    <img src="https://img.shields.io/packagist/l/laravel/framework" alt="License">
  </a>
</p>

## TESTE PROPOSTO

Desafio Nível JR (com Teste Unitário e Paginação) - Implementando CRUD em API RESTful com PHP

Implemente as operações básicas de CRUD (Create, Read, Update e Delete) para gerenciar informações de produtos utilizando uma API RESTful com PHP. Para isso, você pode usar um banco de dados MySQL.

### Requisitos:

A API deve ser implementada em PHP e seguir o padrão RESTful.
O banco de dados deve ter uma tabela "produtos" com os campos "id", "nome", "descricao", "preco" e "quantidade".
As operações de CRUD devem ser implementadas para gerenciar os dados da tabela "produtos".
Os dados devem ser retornados em formato JSON.
É necessário implementar testes unitários para garantir a qualidade do código.
O retorno do cadastro deve ser paginado.
Etapas sugeridas:

Implemente a operação de "leitura" para listar todos os produtos.
Implemente a operação de "criação" para adicionar um novo produto.
Implemente a operação de "leitura" para buscar um produto pelo seu ID.
Implemente a operação de "atualização" para atualizar os dados de um produto existente.
Implemente a operação de "exclusão" para remover um produto existente.
Crie testes unitários para validar as operações de CRUD.
Implemente a paginação no retorno da operação de "leitura".
Observações:

Teste cada operação individualmente utilizando o Postman ou ferramenta similar.
O código deve ser organizado, de fácil leitura e com comentários.
O uso do framework PHP Slim pode ser uma boa alternativa para implementar uma API RESTful.
Os testes unitários devem ser implementados utilizando PHPUnit.
Exemplo de retorno de um cadastro paginado:

### Retorno Api Products

```json
{
    "pagina_atual": 1,
    "total_paginas": 5,
    "total_registros": 25,
    "registros_por_pagina": 5,
    "registros": [
        {
            "id": 1,
            "nome": "Produto 1",
            "descricao": "Descrição do produto 1",
            "preco": 10.99,
            "quantidade": 100
        },
        {
            "id": 2,
            "nome": "Produto 2",
            "descricao": "Descrição do produto 2",
            "preco": 20.99,
            "quantidade": 200
        },
   ]
}
```

# API de Gerenciamento de Produtos e Usuários

## Introdução

A API é projetada para oferecer funcionalidades de gerenciamento de produtos e usuários. Ela permite que os usuários realizem operações básicas em produtos, como criar, ler, atualizar e excluir (CRUD), bem como operações semelhantes em usuários. Além disso, a API oferece autenticação JWT para proteger as rotas e recursos.

## Rotas da API Products

Aqui estão exemplos de como fazer solicitações para cada rota da API:

- **GET /api/products**:
  - Para obter uma lista de produtos, faça uma solicitação GET para `/api/products`.

- **GET /api/products/{id}**:
  - Para obter um produto específico com base no ID, faça uma solicitação GET para `/api/products/{id}`, onde `{id}` é o ID do produto desejado.

- **POST /api/products**:
  - Para criar um novo produto, faça uma solicitação POST para `/api/products` e forneça os dados do produto no corpo da solicitação.

- **PUT/PATCH /api/products/{id}**:
  - Para atualizar um produto existente, faça uma solicitação PUT ou PATCH para `/api/products/{id}` e forneça os dados atualizados no corpo da solicitação.

- **DELETE /api/products/{id}**:
  - Para excluir um produto, faça uma solicitação DELETE para `/api/products/{id}`, onde `{id}` é o ID do produto a ser excluído.

O mesmo padrão de solicitações se aplica às rotas de usuário.

## API de Usuários

### Obter Usuários (GET)
- **URL:** `http://localhost:8989/api/users`
- **Método:** GET
- **Descrição:** Obtém informações dos usuários no sistema.

### Autenticar Usuário para Obter Token JWT (POST)
- **URL:** `http://localhost:8989/api/auth/login`
- **Método:** POST
- **Descrição:** Gera um token JWT para autenticar um usuário. Credenciais (nome de usuário e senha) são enviadas para obter o token.

### Criar Novo Usuário (POST)
- **URL:** `http://localhost:8989/api/users`
- **Método:** POST
- **Descrição:** Cria um novo usuário no sistema. Dados do usuário, como nome, email e senha, são enviados.

### Atualizar Usuário (PUT)
- **URL:** `http://localhost:8989/api/users/3`
- **Método:** PUT
- **Descrição:** Atualiza as informações de um usuário específico identificado pelo ID 3. Novos dados do usuário são enviados.

### Excluir Usuário (DELETE)
- **URL:** `http://localhost:8989/api/users/3`
- **Método:** DELETE
- **Descrição:** Remove um usuário específico identificado pelo ID 3 do sistema.

### Reautenticar Usuário para Obter Novo Token JWT (POST)
- **URL:** `http://localhost:8989/api/auth/login`
- **Método:** POST
- **Descrição:** Gera um novo token JWT para autenticar um usuário. Credenciais (nome de usuário e senha) são enviadas novamente.

## Autenticação JWT

A autenticação JWT (JSON Web Token) é usada para proteger as rotas da API. Para obter um token JWT, os usuários devem fazer uma solicitação POST para `/api/auth/login` com as credenciais (email e senha). Um token JWT será gerado e retornado na resposta. Esse token deve ser incluído nos cabeçalhos de autorização das solicitações subsequentes para acessar as rotas protegidas.

## Configuração e Requisitos

- Docker instalado

- Linux https://www.digitalocean.com/community/tutorials/how-to-install-and-use-docker-on-ubuntu-20-04
- Windows https://docs.docker.com/desktop/install/windows-install/

## Instruções de Execução

Para configurar e executar o aplicativo em um ambiente local:

1. Clone o repositório.
```
git clone https://github.com/newtoncutrim/testSplit-app.git
cd testSplit-app
```
2. Execute os seguintes comandos para configurar o ambiente:
```
docker compose up -d --build
docker compose exec app composer install
docker compose exec app cp .env.example .env
docker compose exec app php artisan key:generate
docker compose exec app php artisan migrate
```
3. Configure o arquivo `.env` com as seguintes configurações para o ambiente de desenvolvimento:

```env
DB_CONNECTION=mysql
DB_HOST=db
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=root
```
4. Para popular o Banco Laravel (usar api)
```
docker-compose exec app php artisan migrate
docker-compose exec app php artisan db:seed
```
5. Para realizar testes de TDD, utilize os seguintes comandos Banco teste:
```
docker-compose exec app php artisan migrate:refresh --env=test
docker-compose exec app php artisan db:seed --env=test
docker-compose exec app php artisan test --env=test
```

## Exemplos de Códigos
link do projeto http://localhost:8989/
### Json

```json
{
	"pagina_atual": 1,
	"total_paginas": 80,
	"total_registros": 400,
	"registros_por_pagina": 5,
	"registros": [
		{
			"id": 1,
			"name": "Cydney Maggio",
			"description": "Atque tempore est illo quas a est.",
			"price": 79.45,
			"amount": 87,
			"created_at": "2023-11-09T12:35:20.000000Z",
			"updated_at": "2023-11-09T12:35:20.000000Z",
			"user_id": 1
		},
		{
			"id": 2,
			"name": "Jeromy Zboncak",
			"description": "Et commodi ratione ut ipsam.",
			"price": 73.53,
			"amount": 59,
			"created_at": "2023-11-09T12:35:20.000000Z",
			"updated_at": "2023-11-09T12:35:20.000000Z",
			"user_id": 1
		},
		{
			"id": 3,
			"name": "Mr. Richmond VonRueden",
			"description": "Dolorum voluptatem perferendis quo ut rerum ut cum.",
			"price": 39.06,
			"amount": 56,
			"created_at": "2023-11-09T12:35:20.000000Z",
			"updated_at": "2023-11-09T12:35:20.000000Z",
			"user_id": 1
		},
		{
			"id": 4,
			"name": "Adell Lesch",
			"description": "Voluptatem ipsa expedita est pariatur maxime quis sed hic.",
			"price": 48.86,
			"amount": 18,
			"created_at": "2023-11-09T12:35:20.000000Z",
			"updated_at": "2023-11-09T12:35:20.000000Z",
			"user_id": 1
		},
		{
			"id": 5,
			"name": "Eduardo Hirthe",
			"description": "Est provident sit in cumque et.",
			"price": 4.78,
			"amount": 65,
			"created_at": "2023-11-09T12:35:20.000000Z",
			"updated_at": "2023-11-09T12:35:20.000000Z",
			"user_id": 1
		}
	]
}
```

## Licença

Este aplicativo/API é disponibilizado sob a licença MIT.


## Contato

- E-mail: newtonplay007@gmail.com
- Telefone: (98) 984212805
