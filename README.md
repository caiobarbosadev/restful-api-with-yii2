## Documentação da API RESTFUL com Yii2

```
  1. Execute composer update no terminal do projeto

  2. Configure o seu banco de dados em config/db.php

  3. Execute uma instância do MySQL no seu computador, recomendo Xampp

  4. Crie o seu banco de dados executando este comando:

    CREATE SCHEMA IF NOT EXISTS `webservice_unyleya` DEFAULT CHARACTER SET utf8mb4 ;
    USE `webservice_unyleya` ;

    CREATE TABLE IF NOT EXISTS `webservice_unyleya`.`users` (
    `id` INT(11) NOT NULL AUTO_INCREMENT,
    `document` VARCHAR(45) NULL DEFAULT NULL,
    `name` VARCHAR(255) NULL DEFAULT NULL,
    `address` VARCHAR(255) NULL DEFAULT NULL,
    `gender` VARCHAR(45) NULL DEFAULT NULL,
    PRIMARY KEY (`id`))
    ENGINE = InnoDB
    AUTO_INCREMENT = 7
    DEFAULT CHARACTER SET = utf8mb4;

  5. Execute o seguinte comando no terminal do projeto: ./yii serve localhost:8888

  6. Aproveite!
```

#

#### RECUPERAR TODOS OS USUÁRIOS
```http
  GET /users
```

#### RESPONSE JSON
```json
[
    {
        "id": 1,
        "document": "000.000.000-00",
        "name": "Username 1",
        "address": "Address",
        "gender": "M"
    },
    {
        "id": 2,
        "document": "000.000.000-00",
        "name": "Username 2",
        "address": "Address",
        "gender": "F"
    }
]
```

#

#### RECUPERA UM USUÁRIO ESPECÍFICO COM BASE NO PARÂMETRO "id"
```http
  GET /users/{id}
```

#### RESPONSE JSON
```json
[
  {
      "id": 1,
      "document": "000.000.000-00",
      "name": "Username 1",
      "address": "Address",
      "gender": "M"
  }
]
```

#

#### RECUPERA TODOS OS USUÁRIOS APENAS COM OS CAMPOS ESPECÍFICADOS
```http
  GET /users?fields={parameter},{parameter}
  Exemplo: /users?fields=document,name
```

#### RESPONSE JSON
```json
[
    {
        "document": "000.000.000-00",
        "name": "Username 1"
    },
    {
        "document": "000.000.000-00",
        "name": "Username 2"
    }
]
```

#

#### RECUPERA APENAS UM USUÁRIO ESPECÍFICADO COM BASE NO PARÂMETRO "id" E RETORNA SOMENTE OS ATRIBUTOS REQUISITADOS
```http
  GET /users/{id}?fields={parameter},{parameter}
  Exemplo: /users/1?fields=document,name
```

#### RESPONSE JSON
```json
[
  {
      "document": "000.000.000-00",
      "name": "Username 1"
  }
]
```

#

#### CRIAR UM USUÁRIO
```http
  POST /users
```

#### REQUEST JSON
```json
{
    "document": "000.000.000-00",
    "name": "Username 1",
    "address": "Address",
    "gender": "F"
}
```

#### RESPONSE JSON
```json
{
  "id": 1,
  "document": "000.000.000-00",
  "name": "Username 1",
  "address": "Address",
  "gender": "F"
}
```

#

#### EXCLUIR USUÁRIO COM BASE NO PARÂMETRO "id"
```http
  DELETE /users/{id}
```

#

#### EDITAR USUÁRIO COM BASE NO PARÂMETRO "id"
```http
  PUT /users/{id}
```

#### REQUEST JSON
```json
{
  "name": "Username 1 changed"
}
```

#### RESPONSE JSON
```json
{
  "id": 1,
  "document": "000.000.000-00",
  "name": "Username 1 changed",
  "address": "Address",
  "gender": "M"
}
```