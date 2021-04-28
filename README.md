# Laravel & VueJS Autofetcher
 The most powerful and efficient Laravel plugin for proper data-fetching
 
 This is a fresh Laravel plugin which gets data from your database, caches it and gets it ready for your Vue component. It is really simple to use, so it might not be problematic. 
 
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
 
Now you can start using the package.
 
| Command name | What it does |
| --- | --- |
| Autofetch::database($table, $time (in seconds)) | Lists all the results from the table you mention|
| Autofetch::result($table, $type (first/last), $time (in seconds)) | Lists only the first/last result from the table you mention|
| Autofetch::select($table, $selected_fields, $time (in seconds)) | Lists all the results from the table you mention, but only the mentioned fields|
| Autofetch::top($table, $orderby, $number_of_results, $time (in seconds), $type) | Lists all the results from the table you mention, but only the mentioned fields|
   
Follow this package for future updates
