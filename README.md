# productoApp

La forma más sencilla de descargar la aplicación es hacerlo desde la consola de cloud9:

    git clone https://github.com/dwesizv/productoApp.git

Una vez descargada la aplicación de github, hay que asegurar que se instalen todas las dependencias de la aplicación:

    composer install
 
Luego será necesario crear el archivo .env, para ello se puede renombrar el archivo .env.example a .env y después editar las líneas en las
que se definen la base de datos, el usuario y la clave de acceso. También es conveniente definir de forma correcta el valor de la variable
APP_URL, para ello se le debe indicar la ruta completa hasta la carpeta public de la aplicación.

Contenido del archivo .env:

    APP_NAME=Producto
    
    ...
    
    APP_URL=https://USUARIO.ies...s.es/laraveles/productoApp/public/
    
    ...
    
    DB_DATABASE=productoL
    DB_USERNAME=uproductoL
    DB_PASSWORD=cproductoL

Por último, quedaría crear la tablas de la base de datos, esto también se tiene que hacer desde la consola:
 
     php artisan migrate

Se han editado los archivos estrictamente necesarios para el funcionamiento de la aplicación:

[app/Http/Controllers/MainController.php](https://github.com/dwesizv/productoApp/blob/main/app/Http/Controllers/MainController.php)  
[app/Http/Controllers/ProductoController.php](https://github.com/dwesizv/productoApp/blob/main/app/Http/Controllers/ProductoController.php)  
[app/Http/Middleware/UserLogged.php](https://github.com/dwesizv/productoApp/blob/main/app/Http/Middleware/UserLogged.php)  
[app/Http/Kernel.php](https://github.com/dwesizv/productoApp/blob/main/app/Http/Kernel.php)  
[app/Models/Producto.php](https://github.com/dwesizv/productoApp/blob/main/app/Models/Producto.php)  
[database/migrations/2022_09_28_200709_create_productos_table.php](https://github.com/dwesizv/productoApp/blob/main/database/migrations/2022_09_28_200709_create_productos_table.php)  
[public/assets/js/product-modal-delete.js](https://github.com/dwesizv/productoApp/blob/main/public/assets/js/product-modal-delete.js)  
[resources/views/*](https://github.com/dwesizv/productoApp/tree/main/resources/views)  
[routes/web.php](https://github.com/dwesizv/productoApp/blob/main/routes/web.php)  

 
 
