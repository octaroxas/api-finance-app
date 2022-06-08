## AUTH
### REGISTER
```
[POST]: api/v1/register
```
Body:

```json
{
    "name": "Ian Azevedo",
    "email": "ian@ianbrito.com.br",
    "password": "password"
}
```
Response:

```Status Code 200```

```json
{
  "user": {
      "id": 1,
      "email": "ian@ianbrito.com.br",
      "account": {
          "id": 1,
          "name": "Ian Azevedo"
      }
  },
  "token": "5|YDQX82O4vHjqpePUaQITO0UqSlFdgpI7KfwEwWGn"
}
```
### LOGIN
```
[POST]: api/v1/login
```
Response:

```Status Code 200```

```json
{
  "user": {
      "id": 1,
      "email": "ian@ianbrito.com.br",
      "account": {
          "id": 1,
          "name": "Ian Azevedo"
      }
  },
  "token": "5|YDQX82O4vHjqpePUaQITO0UqSlFdgpI7KfwEwWGn"
}
```

### LOGOUT
```
[POST]: api/v1/logout
```
Response:

```Status Code 200```

