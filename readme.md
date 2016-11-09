## About me
- [Github profile](https://github.com/henriale)
- [LinkedIn profile](https://www.linkedin.com/in/araujoalexandre)
- [StackOverflow profile](http://stackoverflow.com/users/4707820/henriale)

## About the exam
The application shows a basic setup for an REST API.<br>
It's easily scalable and supports both template engine and json response.

#### Running
make sure you have a docker machine created, then:
```bash
$ cd .docker
$ docker-compose stop
$ docker-compose up -d
``` 

#### What's missing?
- Middlewares
- API Authentication & throttling
- The file uploading

#### What was done?
- Resource routing from scratch
- Application Kernel from scratch
- Structure based on modularization
- Basic modeling class
- IoC on controllers methods
- Basic JSON API
- Easy docker deployment
- Simple environment variable setup

## API
- GET users - show all users
- GET users/:id - show specific user
- PUT users/:id - update specific user
- DELETE users/:id - update specific user