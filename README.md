<h1>Docker</h1>
<p>Esse sistema foi feito para rodar no Docker, aqui estão os arquivos para fazer a Build da imagem e posteiormente rodar os 3 container em networks.</p>
<h3>Comando: docker-compose build</h3>
<h1>PostMan</h1>
<p>Json para importar no postman e fazer as requisições:</p>
{
"info": {
"_postman_id": "8f60d8fe-d914-49ff-bbb4-45f6ec2a3a73",
"name": "Adoorei Api - Walison Douglas",
"description": "# 🚀 Get started here\n\nThis template guides you through CRUD operations (GET, POST, PUT, DELETE), variables, and tests.\n\n## 🔖 **How to use this template**\n\n#### **Step 1: Send requests**\n\nRESTful APIs allow you to perform CRUD operations using the POST, GET, PUT, and DELETE HTTP methods.\n\nThis collection contains each of these [request](https://learning.postman.com/docs/sending-requests/requests/) types. Open each request and click \"Send\" to see what happens.\n\n#### **Step 2: View responses**\n\nObserve the response tab for status code (200 OK), response time, and size.\n\n#### **Step 3: Send new Body data**\n\nUpdate or add new data in \"Body\" in the POST request. Typically, Body data is also used in PUT request.\n\n```\n{\n    \"name\": \"Add your name in the body\"\n}\n\n ```\n\n#### **Step 4: Update the variable**\n\nVariables enable you to store and reuse values in Postman. We have created a [variable](https://learning.postman.com/docs/sending-requests/variables/) called `base_url` with the sample request [https://postman-api-learner.glitch.me](https://postman-api-learner.glitch.me). Replace it with your API endpoint to customize this collection.\n\n#### **Step 5: Add tests in the \"Tests\" tab**\n\nTests help you confirm that your API is working as expected. You can write test scripts in JavaScript and view the output in the \"Test Results\" tab.\n\n<img src=\"https://content.pstmn.io/b5f280a7-4b09-48ec-857f-0a7ed99d7ef8/U2NyZWVuc2hvdCAyMDIzLTAzLTI3IGF0IDkuNDcuMjggUE0ucG5n\">\n\n## 💪 Pro tips\n\n- Use folders to group related requests and organize the collection.\n- Add more [scripts](https://learning.postman.com/docs/writing-scripts/intro-to-scripts/) in \"Tests\" to verify if the API works as expected and execute workflows.\n    \n\n## 💡Related templates\n\n[API testing basics](https://go.postman.co/redirect/workspace?type=personal&collectionTemplateId=e9a37a28-055b-49cd-8c7e-97494a21eb54&sourceTemplateId=ddb19591-3097-41cf-82af-c84273e56719)  \n[API documentation](https://go.postman.co/redirect/workspace?type=personal&collectionTemplateId=e9c28f47-1253-44af-a2f3-20dce4da1f18&sourceTemplateId=ddb19591-3097-41cf-82af-c84273e56719)  \n[Authorization methods](https://go.postman.co/redirect/workspace?type=personal&collectionTemplateId=31a9a6ed-4cdf-4ced-984c-d12c9aec1c27&sourceTemplateId=ddb19591-3097-41cf-82af-c84273e56719)",
"schema": "https://schema.getpostman.com/json/collection/v2.1.0/collection.json",
"_exporter_id": "14235909"
},
"item": [
{
"name": "Listar Produtos",
"event": [
{
"listen": "test",
"script": {
"type": "text/javascript",
"exec": [
"pm.test(\"Status code is 200\", function () {",
"    pm.response.to.have.status(200);",
"});"
]
}
}
],
"request": {
"method": "GET",
"header": [],
"url": {
"raw": "{{base_url}}/info?id=1",
"host": [
"{{base_url}}"
],
"path": [
"info"
],
"query": [
{
"key": "id",
"value": "1"
}
]
},
"description": "This is a GET request and it is used to \"get\" data from an endpoint. There is no request body for a GET request, but you can use query parameters to help specify the resource you want data on (e.g., in this request, we have `id=1`).\n\nA successful GET response will have a `200 OK` status, and should include some kind of response body - for example, HTML web content or JSON data."
},
"response": []
},
{
"name": "Listar vendas",
"event": [
{
"listen": "test",
"script": {
"type": "text/javascript",
"exec": [
"pm.test(\"Status code is 200\", function () {",
"    pm.response.to.have.status(200);",
"});"
]
}
}
],
"request": {
"method": "GET",
"header": [],
"url": {
"raw": "{{base_url}}/info?id=1",
"host": [
"{{base_url}}"
],
"path": [
"info"
],
"query": [
{
"key": "id",
"value": "1"
}
]
},
"description": "This is a GET request and it is used to \"get\" data from an endpoint. There is no request body for a GET request, but you can use query parameters to help specify the resource you want data on (e.g., in this request, we have `id=1`).\n\nA successful GET response will have a `200 OK` status, and should include some kind of response body - for example, HTML web content or JSON data."
},
"response": []
},
{
"name": "Adicionar venda",
"event": [
{
"listen": "test",
"script": {
"type": "text/javascript",
"exec": [
"pm.test(\"Successful POST request\", function () {",
"    pm.expect(pm.response.code).to.be.oneOf([200, 201]);",
"});",
""
]
}
}
],
"request": {
"method": "POST",
"header": [],
"body": {
"mode": "raw",
"raw": "{\n\t\"name\": \"Add your name in the body\"\n}",
"options": {
"raw": {
"language": "json"
}
}
},
"url": {
"raw": "{{base_url}}/info",
"host": [
"{{base_url}}"
],
"path": [
"info"
]
},
"description": "This is a POST request, submitting data to an API via the request body. This request submits JSON data, and the data is reflected in the response.\n\nA successful POST request typically returns a `200 OK` or `201 Created` response code."
},
"response": []
},
{
"name": "Atualizar vendas",
"request": {
"method": "GET",
"header": []
},
"response": []
},
{
"name": "Cancelar",
"event": [
{
"listen": "test",
"script": {
"type": "text/javascript",
"exec": [
"pm.test(\"Successful DELETE request\", function () {",
"    pm.expect(pm.response.code).to.be.oneOf([200, 202, 204]);",
"});",
""
]
}
}
],
"request": {
"method": "DELETE",
"header": [],
"body": {
"mode": "raw",
"raw": "",
"options": {
"raw": {
"language": "json"
}
}
},
"url": {
"raw": "{{base_url}}/info?id=1",
"host": [
"{{base_url}}"
],
"path": [
"info"
],
"query": [
{
"key": "id",
"value": "1"
}
]
},
"description": "This is a DELETE request, and it is used to delete data that was previously created via a POST request. You typically identify the entity being updated by including an identifier in the URL (eg. `id=1`).\n\nA successful DELETE request typically returns a `200 OK`, `202 Accepted`, or `204 No Content` response code."
},
"response": []
}
],
"event": [
{
"listen": "prerequest",
"script": {
"type": "text/javascript",
"exec": [
""
]
}
},
{
"listen": "test",
"script": {
"type": "text/javascript",
"exec": [
""
]
}
}
],
"variable": [
{
"key": "id",
"value": "1"
},
{
"key": "base_url",
"value": "https://postman-rest-api-learner.glitch.me/"
}
]
}
