<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.


##
comandos 
docker compose up -d --build
composer install 
docker compose exec app cp. env.example
php artisan key:generate
locallhost:8000

## endpoints
lista todos os usuario http://localhost:8989/api/users
metodo get

autoriza usuario gernado token jwt metodo post http://localhost:8989/api/auth/login

criacao de usuario metodo post http://localhost:8989/api/users

atualizar usuario metodo put http://localhost:8989/api/users/3 o 3 representa o id do usuario no banco

apagar usuario metodo delete http://localhost:8989/api/users/3 o id representa o id do usuario

autoriza usuario gernado token jwt metodo post http://localhost:8989/api/auth/login

Introdução:

A API é projetada para oferecer funcionalidades de gerenciamento de produtos e usuários. Ela permite que os usuários realizem operações básicas em produtos, como criar, ler, atualizar e excluir (CRUD), bem como operações semelhantes em usuários. Além disso, a API oferece autenticação JWT para proteger as rotas e recursos.

Rotas da API:

Aqui estão exemplos de como fazer solicitações para cada rota da API:

GET /api/products:

Para obter uma lista de produtos, faça uma solicitação GET para /api/products.
GET /api/products/{id}:

Para obter um produto específico com base no ID, faça uma solicitação GET para /api/products/{id}, onde {id} é o ID do produto desejado.
POST /api/products:

Para criar um novo produto, faça uma solicitação POST para /api/products e forneça os dados do produto no corpo da solicitação.
PUT/PATCH /api/products/{id}:

Para atualizar um produto existente, faça uma solicitação PUT ou PATCH para /api/products/{id} e forneça os dados atualizados no corpo da solicitação.
DELETE /api/products/{id}:

Para excluir um produto, faça uma solicitação DELETE para /api/products/{id}, onde {id} é o ID do produto a ser excluído.
O mesmo padrão de solicitações se aplica às rotas de usuário.

Autenticação JWT:

A autenticação JWT (JSON Web Token) é usada para proteger as rotas da API. Para obter um token JWT, os usuários devem fazer uma solicitação POST para /api/auth/login com as credenciais (email e senha). Um token JWT será gerado e retornado na resposta. Esse token deve ser incluído nos cabeçalhos de autorização das solicitações subsequentes para acessar as rotas protegidas.

Configuração e Requisitos:

O aplicativo requer o framework Laravel instalado.
Dependências e bibliotecas necessárias são gerenciadas pelo Composer.
Certifique-se de que um banco de dados esteja configurado e funcional, pois o Laravel utiliza o Eloquent ORM.
Instruções de Execução:

Para configurar e executar o aplicativo em um ambiente local:

Clone o repositório.
Configure o arquivo .env com suas configurações de banco de dados.
Execute composer install para instalar as dependências.
Execute php artisan migrate para criar as tabelas do banco de dados.
Execute php artisan serve para iniciar o servidor de desenvolvimento.
Exemplos de Códigos:

Você pode encontrar exemplos de código para fazer solicitações à API em várias linguagens de programação no README.md. Isso ajudará os desenvolvedores a entender como interagir com sua API.

Licença:

Especifique a licença sob a qual seu aplicativo/API é disponibilizado. Por exemplo, você pode usar uma licença MIT, GPL, ou outra licença de código aberto.

Contribuição:

Se desejar, explique como outros desenvolvedores podem contribuir para o projeto. Isso pode incluir informações sobre como reportar problemas, enviar solicitações de pull ou colaborar de outras formas.

Contato:

Forneça informações de contato, como um endereço de e-mail ou um link para um repositório do GitHub, onde os desenvolvedores possam entrar em contato caso tenham dúvidas ou queiram colaborar.



# API de Gerenciamento de Produtos e Usuários

## Introdução

A API é projetada para oferecer funcionalidades de gerenciamento de produtos e usuários. Ela permite que os usuários realizem operações básicas em produtos, como criar, ler, atualizar e excluir (CRUD), bem como operações semelhantes em usuários. Além disso, a API oferece autenticação JWT para proteger as rotas e recursos.

## Rotas da API

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

## Autenticação JWT

A autenticação JWT (JSON Web Token) é usada para proteger as rotas da API. Para obter um token JWT, os usuários devem fazer uma solicitação POST para `/api/auth/login` com as credenciais (email e senha). Um token JWT será gerado e retornado na resposta. Esse token deve ser incluído nos cabeçalhos de autorização das solicitações subsequentes para acessar as rotas protegidas.

## Configuração e Requisitos

- O aplicativo requer o framework Laravel instalado.
- Dependências e bibliotecas necessárias são gerenciadas pelo Composer.
- Certifique-se de que um banco de dados esteja configurado e funcional, pois o Laravel utiliza o Eloquent ORM.

## Instruções de Execução

Para configurar e executar o aplicativo em um ambiente local:

1. Clone o repositório.
2. Configure o arquivo `.env` com suas configurações de banco de dados.
3. Execute `composer install` para instalar as dependências.
4. Execute `php artisan migrate` para criar as tabelas do banco de dados.
5. Execute `php artisan serve` para iniciar o servidor de desenvolvimento.

## Exemplos de Códigos

Você pode encontrar exemplos de código para fazer solicitações à API em várias linguagens de programação no README.md. Isso ajudará os desenvolvedores a entender como interagir com sua API.

## Licença

Este aplicativo/API é disponibilizado sob a licença MIT.

## Contribuição

Se desejar, explique como outros desenvolvedores podem contribuir para o projeto. Isso pode incluir informações sobre como reportar problemas, enviar solicitações de pull ou colaborar de outras formas.

## Contato

- E-mail: newtonplay007@gmail.com
- Telefone: 98 984212805

