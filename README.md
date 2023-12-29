# Laravel System README

Este é o README para o sistema Laravel configurado com as seguintes instruções.

## Pré-requisitos

Certifique-se de ter os seguintes requisitos instalados em seu sistema antes de começar:

- PHP >= 7.4
- Composer
- Node.js >= 14
- NPM
- Laravel CLI
- Banco de dados MySQL

## Configuração do Ambiente

1. **Clonar o repositório:**
   ``bash``
   git clone https://github.com/WalefyHG/Trabalho-PW.git
   cd SalasIFPI

2- **Instalando Dependencias:**

composer install

3- **Instalando NPM**

npm install

4- **Configurações da ENV**

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=salasifpi
DB_USERNAME=root
DB_PASSWORD=

5- **Crie o Banco de dados com o nome e realize as migrações**

php artisan serve

6- **Em um novo terminal, iniciar o mix para compilar os ativos:**

npm run dev

7- **Imagem dos Diagramas**

![Imagem do Diagrama](/SalasIFPI/public/Diagrama.jpg)