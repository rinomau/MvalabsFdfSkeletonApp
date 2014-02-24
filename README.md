Mvlabs Fdf
=======================

Introduction
------------
This is a simple, skeleton application using the ZF2 MVC layer and module
systems. This application is meant to be used as a starting place for those
looking to get their feet wet with Mvlabs Fdf.

Installation
============
## Composer

The suggested installation method is via [composer](http://getcomposer.org/):

```sh
php composer.phar require rinomau/mva-crud:dev-master
```

or

1. Add this project in your composer.json:

    ```json
    "require": {
        "rinomau/mva-crud": "dev-master"
    }
    ```

2. Now tell composer to download MvaCrud by running the command:

    ```bash
    $ php composer.phar update
    ```

## Git Submodule

 Clone this project into your `./vendor/` directory

    ```sh
    cd vendor
    git clone https://github.com/rinomau/MvaCrud.git
    ```

Usage
-----

 Usage is very simple:

- Create an associative array of data you want to insert in fdf files.
- The key of that array must match the pdf fields names
- Configure fdf_filename and pdf_filename with the name you want to give to your fdf files and the name of the pdf file contains modules you want to fill
- Call the createFdf function

```php
$dati = array(
    'nome' => 'MvLabs',
    'country' => 'Italy',
    'mail' => 'info@mvlabs.it',
    'team' => array(
        'Stefano Maraspin','Stefano Valle','Diego Drigani','David Contavalli','Mauro Rainis'
    )
);
$this->I_fdfService->createFdf($dati);
```