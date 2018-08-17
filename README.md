# Checkr for PHP

[![Build Status](https://travis-ci.org/lyal/checkr.svg?branch=master)](https://travis-ci.org/lyal/checkr)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/lyal/checkr/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/lyal/checkr/?branch=master)
[![FOSSA Status](https://app.fossa.io/api/projects/git%2Bgithub.com%2Flyal%2Fcheckr.svg?type=shield)](https://app.fossa.io/projects/git%2Bgithub.com%2Flyal%2Fcheckr?ref=badge_shield)

A simple PHP package for interacting with the www.checkr.com's API (documentation at https://docs.checkr.com/), 
focusing on ease of use.  

# Requirements
    
    PHP 7.1+

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

$client->candidate(['email' => 'john.doe@johndoe.com'])->create()->invitiation(['package' => 'tasker_pro'])->create();

```
# Environment Variables

There are several helpful environment variables.  In order for the API testing package to work, you must set
checkr_test_key either with the environment variable checkr_test_key or in PHPUnit's XML file.

```sh
checkr_api_key = 'xxxxxxxxxxx'
checkr_test_key = 'xxxxxxxxxxxx'
use_collections = true
```




## License
[![FOSSA Status](https://app.fossa.io/api/projects/git%2Bgithub.com%2Flyal%2Fcheckr.svg?type=large)](https://app.fossa.io/projects/git%2Bgithub.com%2Flyal%2Fcheckr?ref=badge_large)