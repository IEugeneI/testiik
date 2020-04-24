#
## Для запуска проекта:
***
#####1)git clone https://github.com/IEugeneI/testiik.git
***
#####2)chmod 775 -R storage
***
#####3)composer install
***
#####4)cp .env.example .env
***
#####5)Заменить параметры в .env на свои DB_CONNECTION ,DB_HOST,DB_PORT,DB_DATABASE,DB_USERNAME,DB_PASSWORD
***
#####6)php artisan storage:link
***
#####7)php artisan key:generate
***
#####8)php artisan migrate
***
#####9)php artisan db:seed
***
#####8)В .env заменить APP_URL на свой
