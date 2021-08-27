# Teste Knewin

Inclusão e Recuperação de documentos

### Faça uma cópia do arquivo `.env.example` para `.env`

-   Altere as informações do banco de dados caso necessário.

```
    DB_CONNECTION=pgsql
    DB_HOST=127.0.0.1
    DB_PORT=5432
    DB_DATABASE=testknewin
    DB_USERNAME=postgres
    DB_PASSWORD=admin
```

-   Crie um database com o nome `testknewin`.

### Criar tabelas no banco de dados

```
    php artisan migrate
```

### Compilar assets

```
    npm run dev
```

### Iniciar o localhost

```
    php artisan serve
```

Após isso basta realizar o acesso a pagina no navegador pelo endereço `localhost:8000`.

Ao pressionar no botão `Cadastrar noticias` será encaminhado a página em que pode ser feito o upload do arquivo de noticias `noticias.json` na pasta base do projeto.

Após registradas, as noticias irão aparecer listadas na tela inicial e ao clicar em cada titulo de noticia, será direcionado para a pagina com todas informações.

## Rotas

```
+--------+----------+-----------------------+----------------+----------------------------------------------------------+--------------+
| Domain | Method   | URI                   | Name           | Action                                                   | Middleware   |
+--------+----------+-----------------------+----------------+----------------------------------------------------------+--------------+
|        | GET|HEAD | /                     | index          | Closure                                                  | web          |
|        | GET|HEAD | notices/create        | notices.create | App\Http\Controllers\NoticesController@create            | web          |
|        | GET|HEAD | notices/show/{id}     | notices.show   | App\Http\Controllers\NoticesController@show              | web          |
|        | POST     | api/notices           |                | App\Http\Controllers\NoticesController@storeJson         | api          |
|        | GET|HEAD | api/notices/show/{id} |                | App\Http\Controllers\NoticesController@getSpecificNotice | api          |
|        | GET|HEAD | api/notices/titles    |                | App\Http\Controllers\NoticesController@getAllTitles      | api          |
+--------+----------+-----------------------+----------------+----------------------------------------------------------+--------------+
```

### Tecnologias utilizadas

-   Laravel 6.2
-   Postgres 13
-   Bootstrap
-   Javascript
