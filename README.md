# Configuração do Ambiente

Este repositório contém instruções para configurar o ambiente de desenvolvimento para o projeto dev-institucional.adventistas.org. Siga as etapas abaixo para configurar o ambiente corretamente.

## Passo 1: Gerar Certificados SSL Autoassinados

Certificados SSL autoassinados são necessários para fins de desenvolvimento. Execute o seguinte comando na pasta `config/certs/` para gerar os certificados:

```bash
openssl req -x509 -out cert.crt -keyout key.key \
  -newkey rsa:2048 -nodes -sha256 \
  -subj '/CN=dev-institucional.adventistas.org' -extensions EXT -config <( \
   printf "[dn]\nCN=dev-institucional.adventistas.org\n[req]\ndistinguished_name = dn\n[EXT]\nsubjectAltName=DNS:dev-institucional.adventistas.org\nkeyUsage=digitalSignature\nextendedKeyUsage=serverAuth")

```

## Passo 2: Configurar as Variáveis de Ambiente

Crie um arquivo .env e defina as seguintes variáveis de ambiente:

```makefile
WP_DB_NAME=nome_do_banco
WP_DB_USER=nome_do_usuario
WP_DB_PASSWORD=senha_do_usuario
WP_DB_HOST=host_do_banco
WP_S3_ACCESS_KEY=chave_de_acesso_S3
WP_S3_SECRET_KEY=chave_secreta_S3
WP_S3_BUCKET=nome_do_bucket_S3

```

## Passo 3: Clonar e Configurar o Tema pa-theme-sedes

Clone o repositório [pa-theme-sedes](https://github.com/igrejaadventista/pa-theme-sedes) na pasta app/wp-content/themes e siga as etapas abaixo:

### 3.1 Instale as Dependências JavaScript

Execute o seguinte comando para instalar as dependências JavaScript:

```bash
yarn
```

### 3.2 Compile os Arquivos JavaScript com Webpack

Compile os arquivos de dependência JavaScript com o seguinte comando:

```bash
yarn build
```

### 3.3 Instale as Dependências do Composer
Instale as dependências do Composer com o seguinte comando:

```bash
composer install
```

## Passo 4: Clonar e Configurar o Tema pa-theme-sedes

Clone o repositório [pa-theme-institucional](https://github.com/igrejaadventista/pa-theme-institucional) na pasta app/wp-content/themes e siga as etapas abaixo:

### 4.1 Instale as Dependências JavaScript

Execute o seguinte comando para instalar as dependências JavaScript:

```bash
yarn
```

### 4.2 Compile os Arquivos JavaScript com Webpack

Compile os arquivos de dependência JavaScript com o seguinte comando:

```bash
yarn build
```

### 4.3 Instale as Dependências do Composer
Instale as dependências do Composer com o seguinte comando:

```bash
composer install
```

## Passo 5: Subir o Container Docker
Por fim, suba o container Docker usando o docker-compose:

```bash
docker-compose up -d
```