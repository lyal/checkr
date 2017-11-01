<?php

Route::post('checkr/webhook', ['middleware' => 'checkr_webhook', 'uses' => 'Lyal\\Checkr\\Laravel\\Http\\Controllers\\CheckrController@handleWebhook']);
