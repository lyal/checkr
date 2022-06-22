# Checkr for PHP

A simple PHP package for interacting with the www.checkr.com's API (documentation at https://docs.checkr.com/), 
focusing on ease of use.  

# Requirements
    
    PHP 8.0.*

# Installation

```sh
composer require lyal/checkr
```

# Basic Usage

```php
<?php
use Lyal\Checkr\Client;

$client = new Client('insert_checkr_api_key_here');

/**
 * Create a new user and send them an invitation
 */

$client->candidate(['email' => 'john.doe@johndoe.com'])->create()->invitation(['package' => 'tasker_pro'])->create();

```
# Environment Variables

There are several helpful environment variables.  In order for the API testing package to work, you must set
checkr_test_key either with the environment variable checkr_test_key or in PHPUnit's XML file.

```sh
checkr_api_key = 'xxxxxxxxxxx'
checkr_test_key = 'xxxxxxxxxxxx'
use_collections = true
```

