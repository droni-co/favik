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

