# AlarmDroid Api
## Url base
La url base que tendrá la api es la siguiente:
`https://alarmdroid.herokuapp.com/`
## Endpoints
### Login (/api/login) [POST]
Para obtener cada uno de los datos es necesario enviar un token en cada petición
este token se obtiene iniciando sesión. Una vez obtenido el token, este podrá enviarse 
de varias maneras, la más sencilla será añadiendolo en forma de variable get en la url
de la sig. manera: `/api/alerts?api_token=mi_api_token`

Parámetros:
- email: string, max:255
- password: string, max,255

### Usuario (/api/user) [GET]
Retorna la información del usuario autenticado.

```json
{
  "data": {
    "id": 1,
    "name": "Oziel Martínez",
    "email": "oziel@alarmdroid.com",
    "created_at": "2018-03-06 03:47:00",
    "updated_at": "2018-03-06 03:47:00",
    "api_token": "xUjK49cviZHXmW1exZa8jC0Rm9fne82I3inr0oKW8pSH3WupfiuCa0v4i99S"
  } 
}
```

### Alertas (/api/alerts) [GET]
Este endpoint retorna un objeto json con un arreglo de alertas como el siguiente:

```json
{
  "data": [
    {},
    {},
    {}
  ],
  "links": {
    "first": "http://alarmdroid.herokuapp.com/api/alerts?page=1",
    "last": "http://alarmdroid.herokuapp.com/api/alerts?page=1",
    "prev": null,
    "next": null
  },
  "meta": {
    "current_page": 1,
    "from": 1,
    "last_page": 1,
    "path": "http://alarmdroid.herokuapp.com/api/alerts",
    "per_page": 5,
    "to": 3,
    "total": 3
  } 
}
```

### Alerta (/api/alerts/{id}) [GET]
Este endpoint retorna un objeto json que contiene solo una alerta
con su respectivo robot creador de dicha alerta, tal como el siguiente:

```json
{
  "data": {
    "id": 1,
    "robot": {
      "id": 1,
      "user_id": 1,
      "model": "reprehenderit",
      "zone": "recusandae qui recusandae",
      "created_at": "2018-03-06 03:47:00"
    },
    "type": "laudantium",
    "message": "Est ab similique voluptatem. Porro aut rerum quia quasi cupiditate et. Eum molestias molestiae libero odit.",
    "created_at": "2018-03-06 03:47:00"
  }
}
```

### Alerta (/api/alerts) [POST]
Este endpoint crea una nueva alerta y la retorna como un objeto json que contiene la alerta
con su respectivo robot creador, tal como el siguiente:

```json
{
  "data": {
    "id": 1,
    "robot": {
      "id": 1,
      "user_id": 1,
      "model": "reprehenderit",
      "zone": "recusandae qui recusandae",
      "created_at": "2018-03-06 03:47:00"
    },
    "type": "laudantium",
    "message": "Est ab similique voluptatem. Porro aut rerum quia quasi cupiditate et. Eum molestias molestiae libero odit.",
    "created_at": "2018-03-06 03:47:00"
  }
}
```

Parámetros:
- robot_id: required, integer
- type: required, string, max:100
- message: required, string

### Robot (/api/robots/{id}) [GET]
Este endpoint retorna un objeto json que contiene solo un robot
con su respectivo usuario, tal como el siguiente:

```json
{
  "data": {
    "id": 1,
    "user": {
      "id": 1,
      "robot_id": 1,
      "name": "Oziel Martínez",
      "email": "oziel@alarmdroid.com",
      "created_at": "2018-03-04 21:43:48"
    },
    "model": "excepturi",
    "zone": "voluptas aliquam quia",
    "created_at": "2018-03-04 21:43:48"
  }
}
```