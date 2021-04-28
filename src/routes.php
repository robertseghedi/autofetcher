<?php

Route::get('calculator', function(){
	echo 'Hello from the calculator package!';
});
Route::get('/test/{y?}', 'RobertSeghedi\Autofetcher\AutofetchController@test');
