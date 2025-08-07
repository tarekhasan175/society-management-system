<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>


## Module Management 

Dear dear developer, This is a module base project. In here we do not use any package for manage module. That's why you can not get any help from google. For work with module you should follow instruction below.


- First go inside CRM/module
- Notice the Folder like Permission
- If you want to work with existing module. Just go inside the module and open.
- you can see Some directory as like
  - Controllers
  - database
    - migrations
    - seeds
  - Models
  - Providers (optional for you)
  - routes
  - views
- In here you should apply your code.
- If you want to use any command for specific module go to CRM/app/Console/Commands
- You can seed some command and study about that



## Create/Add New Module

- Copy one existing module and named it that you want.
- Go to CRM/app/Providers/RouteServiceProvider.php
- And add your route file path with condition
- If need add provider for your module so follow the AppServiceProvider code
- Go to CRM/app/Providers/AppServiceProvider.php
- For adding sidebar go to partials
- Go to CRM/resources/views/partials/_sidebar.blade.php and include your sidebar item
- Must be apply condition for the module in sidebar
- If you dont want to copy the module you can add manually. But follow one module file structure.


After done all process 

go to base_url/settings/modules and add you module and then active or deactive by clicking status button.
