
# TodoList Lionsoftware

Projeto prossui uma tasklist, individual para cada usuario. 

## Stack utilizada

**Front-end:** Vite + Bootstrap

**Back-end:** Laravel + mysql


## Instalação

Instale meu projeto 
```bash
 git clone https://github.com/JohnPonciano/Backend_Laravel_lionsoft.git
```
```bash
 composer install
```
    
```bash
 cp .env.example .env
```

## Crie o database e faça update das credenciais
```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=admin
DB_PASSWORD=admin
```

## Rode as Migrations
```bash
    php artisan migrate
```
## Rode os seeders
```bash
    php artisan db:seed --class=UsersTableSeeder
```

```bash
    php artisan db:seed --class=TodosTableSeeder
```

### Os seeder criam esse usuario e popula com umas 5 tarefas.
```bash
    email: yoda@jedi.com
    Password: vidalonga
```

# Start server
```bash
    php artisan key:generate
    php artisan serve
```
## Execute o frontend
```bash
    npm install && npm run dev
```
"Que sinceramente não entendi o pq da execução do vite externamente pelo npm,mas foi com estava na documentação para conseguir montar o frontend com bootstrap.

Estou aberto a ouvir soluções melhores para esse caso realmente fiquei curioso, ou pode ser só algum problema de config do projeto."




## Documentação da API

### Como autenticar
##### Abra o postman ou insominia


```http
  POST localhost:8000/api/login
```
### E no corpo coloque esse Json
```json
{
    "email":"yoda@jedi.com",
	"password":"vidalonga"
}
```
### Ele retornara um token semelhante a este:
```
{
	"access_token": "1|wrKNT3mlFoTsHGGelBfs7JASDzNxNX5TlrBGmm1M19bd78d3"
}

```
### Selecione a opção de API Key Auth 
```
key: access_token
value: token gerado
add to: header
```
Com isso você consegue fazer as demais requisições

#### Corpo padrão das request
```json
        {   
			"title": "Titulo da task",
			"description": "descrição da task",
			"completed": 0
		}
```

#### Retorna todos os itens

```http
  GET /api/tasks
```
#### Retorna um item
```http
  GET /api/tasks/${id}
```
#### Adiciona um item
```http
  POST /api/tasks
```
#### Edita um item 
```http
  PUT /api/tasks/${id}
```

#### Deleta  um item 
```http
  DELETE /api/tasks/${id}
```
