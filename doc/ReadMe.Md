### Init laravel application

#### Origin application

###### Init
  - Program entry： public/index.php.
  - index.php load bootstrap/app.php to init Illuminate\Foundation\Application instance.
  - Create container.

###### Http/console kernel
  - Request will be sent to Http kernel or Console Kernel, all request will be handled by Http kernel and Console Kernel.
  - Http kernel extends Illuminate\Foundation\Htpp\Kernel
    * bootsrappers array
    * middleware
    * kernel get a request and return a response
  - ServiceProvider
    * config/app.php
    * excute register method.
    * boot method will be excute after all Serviceprovider register
  - Request dispatch

#### My laravel

  - Extends Illuminate\Foundation\Application in App\Foundation\Application and overwrite project path method
  - init .env.pro1 and call loadEnvironmentFrom(file) to load it
  - modify config/view.php to change view path
  - Create Kernel.php
  - Create ServiceProvider change config/app.php to resiger them
  - Create proj1.routes.php and modify RouteServiceProvider to change route file and controller namespace
  - Init Models
