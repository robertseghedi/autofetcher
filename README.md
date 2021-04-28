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

// other providers
 ```
 
 Let's say that you use axios and you want a link to fetch all your users database. Below are the steps you have to follow in order to get a fresh, efficient-cached .json result.
 
 Add the axios method and add it to your 

 ```js
data()
{
     return {
        users: []
     }
}
created()
{
     this.fetch_users();
},
methods: {
     fetch_users: async function()
     {
         let t = this;
         axios.get('/test/users').then(function(users){
             users = users.data;
             t.users = users;
         });
     }
}
 ```
 
| Command name | What it does |
| --- | --- |
| 
  ```json
 "autoload": {
    "psr-4": {
        
        "RobertSeghedi\\Autofetcher\\": "vendor/robertseghedi/laravue-autofetcher/src"
    }
},
   ```
| Lists all the results from the table you mention|

Now, you can use the result in your Vue component
 ```html
<template>
    <div>
        <ul>
            <li v-for="a in users" :key="a.id">{{a.name}}</li>
        </ul>
    </div>
</template>
   ```
   
Follow this package for future updates
