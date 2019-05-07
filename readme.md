<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>


## Project Test

This is mini project CRUD users with unit test, docker

## Installation

Build Docker
```
docker-compose -f .docker/docker-compose.yml up --build -d
```

## Unit test

run unit test
```
docker exec -it <CONTAINERID> ./vendor/bin/phpunit
```

## Run project 

project run on port 8000
```
http://127.0.0.1:8000
```

## Router

List users
```
link: http://127.0.0.1:8000/api/v1/users/{id}
method: GET
params: []
```

Detail users
```
link: http://127.0.0.1:8000/api/v1/users
method: GET
params: 
    - query: no required
```

Create users
```
link: http://127.0.0.1:8000/api/v1/users
method: POST
params: 
    - email: string|required
    - name: string|required
    - password: string|required
```

Update users
```
link: http://127.0.0.1:8000/api/v1/users/{id}
method: PUT
params: 
    - email: string|required
    - name: string|required
    - password: string|required
```

Delete users
```
link: http://127.0.0.1:8000/api/v1/users/{id}
method: DELETE
params: []
```

## Author

```
    Name:  Lý Hợi
    Email: lyhoi.2204@gmail.com
    Skype: lyhoi.22
```
Thanks for watching!
