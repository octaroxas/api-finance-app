## Wallet
```json
{
  "headers": {
    "Accept": "application/json",
    "Content-Type": "application/json",
    "Authorization": "Bearer 1|MRXAfie54ZeXfH3Ju5v6diCoetLzfv4zRf9OkUX3"
  }
}
```
### Index
```
[GET|HEAD]: api/v1/wallet
```
Response:

```Status Code 200```
```json
[
    {
        "id": 1,
        "name": "Carteira Padrão"
    },
    {
        "id": 2,
        "name": "Nubank"
    }
]
```

### Store
```
[GET]: api/v1/wallet
```
Body:

```json
{
    "name": "Carteira Padrão"
}
```
Response:

```Status Code 201```
```json
{
    "id": 1,
    "name": "Carteira Padrão"
}
```

### Show
```
[GET|HEAD]: api/v1/wallet/{id}
```
Response:

```Status Code 200```
```json
{
    "id": 1,
    "name": "Carteira Padrão"
}
```

### Update
```
[PUT|PATCH]: api/v1/wallet/{id}
```
Body:

```json
{
    "name": "Carteira Padrão"
}
```
Response:

```Status Code 200```
```json
{
    "id": 1,
    "name": "Carteira Padrão"
}
```
### Destroy
```
[DELETE]: api/v1/wallet/{id}
```
Response:

```Status Code 200```
