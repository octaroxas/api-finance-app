## Account
```json
{
  "headers": {
    "Accept": "application/json",
    "Content-Type": "application/json",
    "Authorization": "Bearer 1|MRXAfie54ZeXfH3Ju5v6diCoetLzfv4zRf9OkUX3"
  }
}
```

### Store
```
[GET]: api/v1/account
```
Body:

```json
{
    "name": "João Godinho",
}
```
Response:

```Status Code 201```
```json
{
	"id": 1,
	"name": "João Godinho",
	"avatar": "http://localhost:8000/storage/avatars/JG.png"
}
```

### Show
```
[GET|HEAD]: api/v1/account/{id}
```
Response:

```Status Code 200```
```json
{
	"id": 1,
	"name": "João Godinho",
	"avatar": "http://localhost:8000/storage/avatars/JG.png"
}
```

### Update
```
[PUT|PATCH]: api/v1/account/{id}
```
Body:

```json
{
	"name": "Ian Azevedo",
}
```
Response:

```Status Code 200```
```json
{
	"id": 1,
	"name": "Ian Azevedo",
	"avatar": "http://localhost:8000/storage/avatars/IA.png"
}
