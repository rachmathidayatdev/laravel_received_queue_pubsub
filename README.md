# laravel_received_queue_pubsub

Tutorial Instalasi
1. Create new project in local computer
2. Install redis package in project: composer require predis/predis
3. Clone this project
4. Copy file in app/Console/Commands/SubscribeSendQueueEmail.php
5. Copy file in app/Mail/TestingMail.php
6. Copy file in resources/views/welcome.blade.php
7. run artisan command: php artisan command:SubscribeSendQueueEmail

Note:
1. the program will automatically run, if redis have data to be sent via email.
2. the program will receive data from the laravel_sender_queue_pubsub (https://github.com/rachmathidayatdev/laravel_sender_queue_pubsub)
