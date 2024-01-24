## App for creating web modules

How to run the project

`docker compose up -d --build`
`docker exec -it appverk-php bash`
`composer install`
`cp .env.example .env`
`php artisan key:generate`
`php artisan migrate`

After that, you can exit the docker container and run the following inside the project roo
`npm install --no-save`

and then 
`npm run dev`

The project will be available at the link

`http://localhost:7127/`

For running tests you can make 

`php artisan test`