Laravel Study materials
------------------------
STEP : 1

\App\Events\PostCreated::class => [
    \App\Listeners\NotifyUser::class
]

# Generate missing events and listeners.
php artisan event:generate

STEP : 2
Event generate
---------------
php artisan make:event sendEmail
php artisan make:event PostCreated

Listener Creation
-------------------
php artisan make:listener SendMailFired --event="SendMail"
php artisan make:listener NotifyUser --event="PostCreated"

STEP : 3
Mail Creation
-------------
php artisan make:mail UserMail

Laravel job and queue
----------------------
STEP 1: php artisan make:controller RegisterController --resource

STEP 2: php artisan make:mail WelcomeMail

STEP 3: php artisan queue:table

STEP 4: php artisan make:job WelcomeEmailJob

STEP 5: php artisan queue:work

cron Schedule jobs
-------------------

STEP 1: php artisan make:command SendSms

STEP 2: php artisan make:mail UserAlert

STEP 3: php artisan send:sms


laravel 9 role base multiple authentication using ui package
-------------------------------------------------------------

Install laravel ui package by following commands

STEP 1: composer require laravel/ui

STEP 2: php artisan ui bootstrap

STEP 3: php artisan ui bootstrap --auth

STEP 4: npm install

STEP 5: npm run dev

STEP 6: Add auth middeleware in admin's dashboard route

Route::prefix('admin')->middleware(['auth'])->group(function (){

    Route::prefix('/dashboard',[DashboradController::class,'index']);

});

STEP 7:Add role column to users table by following command
php artisan make:migration add_role_to_users_table --table=users
Now goes to this migration files 

$table->integer('role')->default(0);

STEP 8: Now create a middleware named AdminMiddleware and register this middleware

kernal.php - 'is_admin' => '\App\Http\Middleware\AdminMiddleware::class, and write the following code into the 

 if(Auth::check()){
    if(Auth::user()->role = '1'){  //1 for admin 0 for normal user
        return $next($request);
    }
 }


Laravel Facade
----------------

STEP 1: Invoice class creation
    
    app\Facades\Invoice.php

STEP 2: InvoiceFacade class creation

    app\Facades\InvoiceFacade.php

STEP 3: Service Provider class creation 

    php artisan make:provider InvoiceServiceProvider 

STEP 4: Service Provider class below code added

    Path : app\Providers\InvoiceFacadesServiceProvider.php

 public function register()
    {
        $this->app->bind('Invoice', function($app) {
            return new Invoice();
        });
    }

STEP 5: Register the facede class  
    
    config\app.php

    'providers' => [
        App\Providers\InvoiceFacadesServiceProvider::class,
    ],

STEP 6:

    'aliases' => [
         'Invoice' => App\Facades\InvoiceFacade::class,
    ]


STEP 7: use the facade

Route::get('/invoice-facade', function() {
    return Invoice::CompanyName()."<br/>".Invoice::CurrentDate();
 });
