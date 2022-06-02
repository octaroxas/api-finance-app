## Transaction
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
[GET|HEAD]: api/v1/transaction
```
Response:

```Status Code 200```
```json
[
    {
        "id": 1,
        "name": "Carteira Padrão",
        "transactions": [
            {
                "id": 1,
                "type": {
                    "type": "expense",
                    "display": "Despesa"
                },
                "description": "a",
                "amount": "117391.42",
                "date": "2022-05-24",
                "done": false,
                "category": {
                    "id": 1,
                    "name": "Saúde"
                }
            },
            {
                "id": 2,
                "type": {
                    "type": "income",
                    "display": "Rendimento"
                },
                "description": "consequatur",
                "amount": "10.69",
                "date": "2022-05-08",
                "done": true,
                "category": {
                    "id": 2,
                    "name": "Alimentação"
                }
            },
        ]
    }
]
```

### Store
```
[GET]: api/v1/transaction
```
Body:

```json
{
    "type": "expense",
    "description": "Crédito RU",
    "amount": "50.00",
    "date": "2022-06-01",
    "done": true,
    "category_id": 1,
    "wallet_id": 1
}
```
Response:

```Status Code 201```
```json
{
    "transaction": {
        "type": "expense",
        "description": "Crédito RU",
        "amount": "50.00",
        "date": "2022-06-01",
        "done": true,
        "category_id": 1,
        "wallet_id": 1,
        "updated_at": "2022-06-02T02:30:45.000000Z",
        "created_at": "2022-06-02T02:30:45.000000Z",
        "id": 103
    }
}
```

### Show
```
[GET|HEAD]: api/v1/transaction/{id}
```
Response:

```Status Code 200```
```json
{
    "id": 1,
    "type": {
        "type": "expense",
        "display": "Despesa"
    },
    "description": "Crédito RU",
    "amount": "50",
    "date": "2022-06-01",
    "done": true,
    "category": {
        "id": 1,
        "name": "Saúde"
    }
}
```

### Update
```
[PUT|PATCH]: api/v1/transaction/{id}
```
Body:

```json
{
    "description": "Crédito RU",
    "amount": "100.00"
}
```
Response:

```Status Code 200```
```json
{
    "id": 1,
    "type": {
        "type": "expense",
        "display": "Despesa"
    },
    "description": "Crédito RU",
    "amount": "100.00",
    "date": "2022-06-01",
    "done": true,
    "category": {
        "id": 1,
        "name": "Saúde"
    }
}
```
### Destroy
```
[DELETE]: api/v1/transaction/{id}
```
Response:

```Status Code 200```
