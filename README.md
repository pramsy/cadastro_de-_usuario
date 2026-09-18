# Cadastro de Usuários e Endereços

Aplicação web desenvolvida com Laravel para cadastrar usuários e seus endereços. Ao informar um CEP válido, o sistema consulta a [API ViaCEP](https://viacep.com.br/) e preenche os dados de logradouro, bairro, cidade e estado.

## Funcionalidades

- Cadastro de usuário com nome, e-mail e CEP.
- Validação dos campos obrigatórios, formato do e-mail e quantidade de dígitos do CEP.
- Preenchimento do endereço por meio da API ViaCEP.
- Listagem paginada de usuários, com cinco registros por página.
- Busca por nome, e-mail ou CEP.
- Visualização, edição e exclusão de usuários.
- Exclusão em cascata do endereço relacionado ao usuário.

## Tecnologias

- PHP 8.3 no ambiente Docker.
- Laravel 12.
- MySQL 5.7.
- Blade e Vite.
- Nginx e PHP-FPM.
- Docker Compose.
- PHPUnit para testes automatizados.

## Pré-requisitos

- Docker Desktop com Docker Compose.
- Git.
- Para executar o Vite fora do container: Node.js e npm.

## Como executar com Docker

Clone o repositório e acesse a pasta do projeto:

```bash
git clone https://github.com/pramsy/cadastro_de-_usuario.git
cd cadastro_de-_usuario
```

Crie o arquivo de ambiente, caso ele ainda não exista:

```bash
cp .env.example .env
```

Suba os serviços da aplicação:

```bash
docker compose up -d --build
```

Instale as dependências PHP, gere a chave da aplicação e execute as migrations:

```bash
docker compose exec app composer install
docker compose exec app php artisan key:generate
docker compose exec app php artisan migrate
```

A aplicação estará disponível em [http://localhost:8000](http://localhost:8000).

> O banco MySQL é criado com banco `laravel`, usuário `laravel`, senha `laravel` e senha do root `root`, conforme o arquivo `docker-compose.yml`. O host do banco para a aplicação é `db`.

## Front-end

As dependências JavaScript ficam no projeto raiz. Para instalar e gerar os assets:

```bash
npm install
npm run build
```

Durante o desenvolvimento, o Vite pode ser executado com:

```bash
npm run dev
```

## Testes

Execute a suíte de testes dentro do container:

```bash
docker compose exec app php artisan test
```

Os testes de funcionalidade cobrem o cadastro com dados válidos e a validação dos campos obrigatórios.

## Comandos úteis

```bash
docker compose ps                         # Lista os serviços
docker compose logs -f app                 # Acompanha os logs do Laravel
docker compose exec app php artisan migrate:status
docker compose exec app php artisan route:list
docker compose down                        # Para e remove os containers
```

## Estrutura principal

```text
app/Http/Controllers/Web/  Controlador das telas de usuários
app/Models/                Modelos Usuario e Endereco
database/migrations/       Estrutura das tabelas usuarios e enderecos
resources/views/           Templates Blade
routes/web.php             Rotas da aplicação web
tests/Feature/             Testes de funcionalidade
```

## Rotas web

| Método | URI | Finalidade |
| --- | --- | --- |
| GET | `/` | Página inicial |
| GET | `/create` | Formulário de cadastro |
| POST | `/users` | Cria um usuário e consulta o ViaCEP |
| GET | `/users` | Lista e busca usuários |
| GET | `/read/{id}` | Exibe um usuário |
| GET | `/edit/{id}` | Formulário de edição |
| PUT | `/edit/{id}` | Atualiza um usuário e seu endereço |
| DELETE | `/delete/{id}` | Exclui um usuário e seu endereço |

