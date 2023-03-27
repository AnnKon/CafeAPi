
CONFIGURATION
-------------

1. composer install
2. create database and edit file `config/db.php` with real data, for example:

```php
return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=localhost;dbname=yii2basic',
    'username' => 'root',
    'password' => '1234',
    'charset' => 'utf8',
];
```

3. `./yii migrate`


TESTING
-------

cafe.postman_collection.json
