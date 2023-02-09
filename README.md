# Arabic admin panel with laravel multi auth system

this help to fast start my admin panel with multiauth guards and easy to customize package.

  - Enable multi Auth system for any guards you need (default: user & admin).
  - publish views for the admin panel so you can overrride it.
  - Adds another views-admin directory avialble to seperate your admin views from your site views
  - Configrable setting to mange it as you want (prefix - redirect url - guard name - table name)
  - Built in roles and permissions

### Installation
Install the package to laravel via composer.

```sh
$ composer require cobraprojects/laravel-multiauth
```

Puplish `config`, `migration`, `migrate the database`, `assets`, `views`, install all dependencies via `npm`, run `laravel mix` and `seed` admin user.
all above with the next `artisan` command:

```sh
$ php artisan multiauth:install
```

### Defult Settings
By default it will install every thing you need to start your multiauth and the admin panel.

You can login to your admin panel by `http://yourdomain.com/admin`
the default username is `super@admin.com`.
the default password is `password`.
you can change these values from the `config/multiauth.php` file



### Config file

| Key | default value | action |
| ------ | ------ | ------ |
| admin_active | true | enable / disable the admin panel |
| admin.validations | empty | array for validate admin register form |
| prefix | admin | the prefix for your routes to access the admin panel (http://domain.com/`prefix`) this will also change the login email address super@ `prefix`.com |
| registration_notification_email | false | enable/disable notify new registerd admin via email |
| redirect_after_login | admin.home | the route name of your admin home page to redirect logged admis to it |
| models.admin | CobraProjects\Multiauth\Model\Admin::class | the admin class if you need to use your own |
| models.role | CobraProjects\Multiauth\Model\Role::class| the role class if you need to use your own |
| models.permission | CobraProjects\Multiauth\Model\permission::class| the permission class if you need to use your own |



### Create new role
you can use the admin panel or `artisan` command.

1- Using artisan command
```sh
$ php artisan multiauth:role rolename
```

2- Using Interface Just go to https://domain.com/admin/roles
you can add, edit or delete roles from this page
Note: only admin with the role `super` can view this page.

### Create new permission
1. Create a new crud permissions for any model:
```sh
$ php artisan multiauth:permissions {model}
```
Here {model} means for which model you want to create crud permissions for. For example, 
if you run `php artisan multiauth:permissions blog` then it will create following permissions:

- CreateBlog
- ReadBlog
- UpdateBlog
- DeleteBlog

2. You can create single permission for any model
```sh
$ php artisan multiauth:permission --name={permissionName} {model}
```
or example, if you run `php artisan multiauth:permissions blog --name=Publish` It will create a permission in your database called `PublishBlog`.


### Todos

 - permissions views to add from admin panel
 - command to link role with permissions

License
----
MIT
