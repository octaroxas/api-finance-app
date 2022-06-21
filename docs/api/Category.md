## Category
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
[GET|HEAD]: api/v1/category
```
Response:

```Status Code 200```
```json
[
	{
		"id": 1,
		"name": "Saúde"
	},
	{
		"id": 2,
		"name": "Alimentação"
	},
	{
		"id": 3,
		"name": "Casa"
	},
	{
		"id": 4,
		"name": "Outros"
	}
]
```

### Store
```
[GET]: api/v1/category
```
Body:

```json
{
    "name": "Alimentação",
}
```
Response:

```Status Code 201```
```json
{
    "id": 1,
    "name": "Alimentação"
}
```

### Show
```
[GET|HEAD]: api/v1/category/{id}
```
Response:

```Status Code 200```
```json
{
    "id": 1,
    "name": "Alimentação"
}
```

### Update
```
[PUT|PATCH]: api/v1/category/{id}
```
Body:

```json
{
    "name": "Saúde"
}
```
Response:

```Status Code 200```
```json
{
    "id": 1,
    "name": "Saúde"
}
```
### Destroy
```
[DELETE]: api/v1/category/{id}
```
Response:

```Status Code 200```
