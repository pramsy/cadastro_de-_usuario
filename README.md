# 📦 Sistema de Cadastro de Usuários com Laravel + API ViaCEP

Este projeto é um sistema simples de cadastro de usuários desenvolvido com **Laravel**, integrado à **API ViaCEP** para preenchimento automático de endereço. Ele utiliza **Docker** para facilitar o ambiente de desenvolvimento e produção.

---

## 🚀 Funcionalidades

- Cadastro de usuários com validação (FormRequest)
- Preenchimento automático de endereço via [ViaCEP](https://viacep.com.br/)
- Listagem de usuários com paginação
- Filtro por **estado** e **cidade**
- Busca por **nome**, **email** e **CEP**
- Atualização e exclusão de usuários
- Testes automatizados
- Deploy via **Railway**

---

## 🧱 Tecnologias

- PHP 8.2 / Laravel 10
- MySQL (via Docker ou Railway)
- Blade + Bootstrap 5
- Docker + Docker Compose
- Railway (para deploy gratuito)

---

## 🐳 Como rodar localmente com Docker

1. Clone este repositório:

```bash
git clone https://github.com/seuusuario/seurepositorio.git
cd seurepositorio

3. Suba os containers:

docker-compose up -d

2. Gere a chave da aplicação:
docker-compose exec app php artisan key:generate

rodar as migração:
php artisan migrate


4.Acesse: http://localhost:8080

Comandos úteis
php artisan migrate – Rodar as migrações

php artisan test – Rodar testes

Contato
Criado por Ramses Pierre
Email: [seu-email-aqui]
LinkedIn: https://linkedin.com/in/seu-perfil
