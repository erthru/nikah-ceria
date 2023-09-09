Just creating this project to play with laravel 10

## How to setup

-   clone this project
-   create database named <b>nikahceria</b>
-   setup env, just change the APP_NAME to <b>"Nikah Ceria"</b> & DB_DATABASE to <b>nikahceria</b>
-   run <code>php artisan key:generate</code>
-   run <code>php artisan migrate</code>
-   run <code>php artisan db:seed</code>, the seeder generated default user for admin, look into the database seeder.
-   run <code>php artisan serve</code>
-   not using any vite configuration, so no need to run <code>npm run dev</code> or <code>npm run build</code>

## Creating Product

The default code that available to create is <b>p1</b>, <b>p2</b>, <b>p3</b>, and <b>p4</b>. if you want to add new product, you have to create the layout first in the <b>resource/views/layouts</b> folder, then put the layout name on the code field when creating the product.
