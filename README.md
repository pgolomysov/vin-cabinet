User cabinet

How to run:
1) docker-compose up -d
2) Then creating queue "reports" in rabbitmq: http://localhost:15672/ guest/guest
3) Run command in laravel container: "php artisan rabbitmq:consume --queue=reports" - there is some problem
to run in from command section in docker-composer
4) Run php artisan db:seed inside laravel container
