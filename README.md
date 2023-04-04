## How to run this project

- Install docker and docker compose so as to run rabbitmq instance on docker
- Install docker network by run "docker network create ubx-net"
- Run docker compose up -d
- copy .env.example to .env on project directory
- create a mysql database and change the credential on .env
- create mailtrap account then change the credential on .env
- create a migration "php artisan migrate"
- run project "php artisan serve"
- run queue worker "php artisan queue:work"

