# 🚀 Laravel Autofetcher
 The most powerful and efficient Laravel plugin for proper data-fetching
 
 This is a fresh Laravel plugin which gets data from your database, caches it and gets it ready for your Vue component. It is really simple to use, so it might not be problematic. 
 
 ## Instalation
 First, you have to install the package using composer in your project root folder:
 ```
 composer require robertseghedi/laravue-autofetcher
 ```
  Edit your root-project's composer.json and add
  ```json
 "autoload": {
    "psr-4": {
        "RobertSeghedi\\Autofetcher\\": "vendor/robertseghedi/laravue-autofetcher/src"
    }
},
   ```
 Then, you have to add the provider to your ```config/app.php``` like that:
 ```php
 // your providers

RobertSeghedi\Autofetcher\AutofetcherProvider::class, 
 ```
 
## Information
 
| Command name | What it does |
| --- | --- |
| Autofetch::database($table, $time - in seconds) | Lists all the results from the table you mention|
| Autofetch::result($table, $type (first/last), $time - in seconds) | Lists only the first/last result from the table you mention|
| Autofetch::select($table, $selected_fields, $time - in seconds) | Lists all the results from the table you mention, but only the mentioned fields|
| Autofetch::top($table, $orderby, $number_of_results, $time - in seconds, $type) | Lists all the results from the table you mention, but only the mentioned fields|
   
## Usage

Now you can start using the package.

### 1. Include it in your controller

 ```php
use RobertSeghedi\Autofetcher\Models\Autofetch;
  ```
   
### 2. Start extracting fresh data

```php
public function fetch_table($table = null)
{
    $x = Autofetch::database($table);
    return $x;
}
```

```php
public function fetch_top_donators($table = null)
{
    $x = Autofetch::top($table, 'donated_money', 10, 1800, 'public');
    return $x;
}
```

- **$table** - the table's name that you want to extract data from
- **'donated_money'** - the order-by-field's name 
- **10** - number of results (so the above code will return a top 10)
- **1800** - the number of seconds for which the data will be cached
- **'public'** - the public option is for efficient data-caching & displaying the data on a public website which doesn't require refresh-updated data. If you use the public option, your user-cached data won't refresh until the specified time is up. If you use the private option, your user-cached data will refresh instantly. The private option is good if you are developing an admin dashboard or a limited-access app.
### 3. Display it as you wish

Follow this package for future updates
