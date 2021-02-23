## 構築

```
$ docker-compose up -d --build
$ docker-compose exec app sh
$ cp .env.sample .env
$ php artisan key:generate

http://localhost:10080/

```


## めも
```
$ docker-compose ps
       Name                     Command              State           Ports        
----------------------------------------------------------------------------------
laravue-todo_app_1   docker-php-entrypoint php-fpm   Up      9000/tcp             
laravue-todo_db_1    docker-entrypoint.sh mysqld     Up      3306/tcp, 33060/tcp  
laravue-todo_web_1   nginx -g daemon off;            Up      0.0.0.0:10080->80/tcp

$ docker ps -a
CONTAINER ID   IMAGE                 COMMAND                  CREATED         STATUS         PORTS                   NAMES
0270d609bbce   nginx:1.17.1-alpine   "nginx -g 'daemon of…"   6 seconds ago   Up 5 seconds   0.0.0.0:10080->80/tcp   laravue-todo_web_1
b8b5cc9f4312   laravue-todo_app      "docker-php-entrypoi…"   7 seconds ago   Up 6 seconds   9000/tcp                laravue-todo_app_1
a00e91dd0dc6   mysql:8.0.16          "docker-entrypoint.s…"   7 seconds ago   Up 6 seconds   3306/tcp, 33060/tcp     laravue-todo_db_1
```