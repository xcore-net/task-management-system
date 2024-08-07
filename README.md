<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[WebReinvent](https://webreinvent.com/)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Jump24](https://jump24.co.uk)**
- **[Redberry](https://redberry.international/laravel/)**
- **[Active Logic](https://activelogic.com)**
- **[byte5](https://byte5.de)**
- **[OP.GG](https://op.gg)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).


## Roles and Permissions

### Step 1: Install the Package
First, you need to install the package using Composer:
- composer require spatie/laravel-permission

### Step 2: Publish the Configuration File
Next, publish the package's configuration file and migration files:
- php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider"
### Step 3: Run the Migrations
Run the migrations to create the necessary tables in your database:
- php artisan migrate

### Step 4: Setting Up Models
Add the HasRoles trait to your User model. This trait will provide the necessary methods to assign and check roles and permissions:

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasRoles;

    // Other model code...
}

### Step 5: Creating Roles and Permissions
You can create roles and permissions using artisan commands or within your application code.

#### Using Artisan Commands:
    php artisan permission:create-role admin
    php artisan permission:create-permission edit articles

#### Using Application Code:
    use Spatie\Permission\Models\Role;
    use Spatie\Permission\Models\Permission;

    // Creating a role
    $role = Role::create(['name' => 'admin']);

    // Creating a permission
    $permission = Permission::create(['name' => 'edit articles']);

    // Assigning permission to a role
    $role->givePermissionTo($permission);

### Step 6: Assigning Roles to Users
You can assign roles to users using the assignRole method:
    $user = User::find(1);
    $user->assignRole('admin');

### Step 7: Checking Roles and Permissions
You can check roles and permissions using methods provided by the HasRoles trait:
// Check if the user has a specific role
if ($user->hasRole('admin')) {
    // User has the 'admin' role
}

// Check if the user has a specific permission
if ($user->can('edit articles')) {
    // User can edit articles
}

### Step 8: Middleware
To restrict access to certain routes based on roles or permissions, you can use middleware:

#### Define Middleware in app/Http/Kernel.php:
    protected $routeMiddleware = [
    // Other middleware...
    'role' => \Spatie\Permission\Middlewares\RoleMiddleware::class,
    'permission' => \Spatie\Permission\Middlewares\PermissionMiddleware::class,
    ];
#### Apply Middleware to Routes:
    Route::group(['middleware' => ['role:admin']], function () {
        // Only users with the 'admin' role can access these routes
    });

    Route::group(['middleware' => ['permission:edit articles']], function () {
        // Only users with the 'edit articles' permission can access these routes
    });

### Step 9: Handling Multiple Roles and Permissions
    The package supports handling multiple roles and permissions. You can assign multiple roles to a user and check for multiple permissions:
    // Assign multiple roles
    $user->assignRole(['admin', 'editor']);

    // Check for multiple roles
    if ($user->hasAnyRole(['admin', 'editor'])) {
        // User has at least one of the specified roles
    }

    // Check for multiple permissions
    if ($user->hasAllPermissions(['edit articles', 'publish articles'])) {
        // User has all of the specified permissions
    }
    
Conclusion
By following these steps, you can effectively manage roles and permissions in your Laravel application using the Spatie package. This setup ensures a scalable and maintainable approach to handling user authorization in your project.

https://medium.com/@miladev95/step-by-step-guide-to-user-role-and-permission-tutorial-in-laravel-10-1fecdabfdea0


php artisan db:seed --class=RolesAndPermissionsSeeder
