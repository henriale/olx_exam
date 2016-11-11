The application shows a basic setup for an REST API.<br>
It's easily scalable and supports both template engine and json response.

#### Running
make sure you have a docker machine created, then:

###### Download and install 
```bash
$ git clone git@gitlab.com:henriale/olx.git
$ cd olx
$ composer install
```

###### Setup environment
```bash
$ cp .env.example .env
# then, fill out your environment information
$ vim .env
```

###### Run server
```bash
$ cd .docker
$ docker-compose stop
$ docker-compose up -d
``` 

#### Framework Resources Built From Scratch
- Resource routing
- Application Kernel 
- Structure based on modularization
- Basic modeling class
- IoC on controllers methods
- Basic JSON API
- Easy docker deployment
- Simple environment variable setup
- Http Exception handling

## API Resources
- GET users - show all users
- GET users/:id - show specific user
- PUT users/:id - update specific user
- POST users/:id - update specific user with picture
- DELETE users/:id - delete specific user

[Postman Collection](https://www.getpostman.com/collections/9715b2c95452cae7374f)
 