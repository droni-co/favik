# Favik
This package provides authentication service using auth.favik, access to model for primary database and the onboarding to create a new app into Favik ecosystem,


##Instalation

`composer require favik/favik`

Add this vars to your enviroments

    FAVIK_DB_HOST=
    FAVIK_DB_DATABASE=
    FAVIK_DB_USERNAME=
    FAVIK_DB_PASSWORD=
    
    FAVIK_AUTH_URL=
    FAVIK_CLIENT_ID=
    FAVIK_CLIENT_SECRET=
    FAVIK_CALLBACK_URL=

`php artisan migrate`

## Usage

### Authentication
To authnticate an user just point to this route
```php
    /auht/login/redirect 
    // route('login.redirect')
```

## Using models

Call models using the Favik namespace
Example:
```php
use Favik\Favik\Models\Merchant;
...
...
$merchants = Merchant::all();
```
#### List of models
* AnalyticsItem
* Comment
* Follow
* Item
* Like
* Merchant
* Order
* OrderAddress
* Post
* ProductVariant
* Push
* user
* UserSocial

### Connect with projects API
##### You must invoque a GatewayController class, this have a logic of http requests
Example:
use Favik\Favik\Http\Controllers\GatewayController as myHttp;

##### The possible values of you can use are following:
* archimedes
* attribution
* reports

##### Examples of request:

* Get type: myHttp::get('archimedes', '/posts/report');
* Post type: myHttp::post('attribution', '/posts/report', ["example" => "body", "example2": "body2"]);
* Put type: myHttp::put('reports', '/posts/report/{$object_id}', ["example" => "body", "example2": "body2"]);
* Patch type: myHttp::patch('archimedes', '/posts/report/{$object_id}', ["example" => "body", "example2": "body2"];
* Delete type: myHttp::delete('attribution', '/posts/report/{$object_id}');

