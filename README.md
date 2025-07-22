# Sistema de Cadastro de Usuários com Laravel + API ViaCEP

Este projeto é um sistema simples de cadastro de usuários desenvolvido com **Laravel**, integrado à **API ViaCEP** para preenchimento automático de endereço. Ele utiliza **Docker** para facilitar o ambiente de desenvolvimento e produção.

---

## Funcionalidades

- Cadastro de usuários com validação (FormRequest)
- Preenchimento automático de endereço via [ViaCEP](https://viacep.com.br/)
- Listagem de usuários com paginação
- Busca por **nome**, **email** e **CEP**
- Atualização e exclusão de usuários
- Testes automatizados

---

## Tecnologias

- PHP 8.2 / Laravel 10
- MySQL (via Docker)
- Blade + Bootstrap 5
- Docker + Docker Compose

---

##  Como rodar localmente com Docker

1. Clone este repositório:

```bash
git clone https://github.com/spramsy/cadastro_de-_usuario.git
cd cadastro_de-_usuario
## 

2. Suba os containers:
docker-compose up -d

3. Gere a chave da aplicação:
docker-compose exec app php artisan key:generate

4. rodar as migração:
php artisan migrate


5.Acesse: http://localhost:8080

Comandos úteis:
php artisan test – Rodar testes

