The new structure is:

vendor/                    __dependencies__
    makechtec/
        nanokit/
            module1/
            module2/
            ...
    another-dependency/
    ...

public/                    __entry point modify only if necessary__
    index.php
    .htaccess

src/                        __client code__
    Models/
        Model1.php
        Model2.php
        ...
    Controllers/
        Controller1.php
        Controller2.php
        ...
    Views/
        View1.php
        View2.php

app/                        __for development__
    routes.php
    translations.php
    modules.php
    generalsettings.php
    tests/
        test1.php
        test2.php

composer.json
composer.lock
README.md



the eloquent dir going to be moved to database module,  *ok*
for the request publish subscribe pattern files will be removed,  *ok*
for mail we going to use strategy pattern for emails with data forms.  
for routes config the changes *ok*
for templates nothing for now
for translations config the changes
for Util and Url nothing for now *ok*


addition of app/generalsettings, 
kernel has been moved to Core/Kernel
creation of Core with the essential code, like Request, Site and interfaces for strategy pattern
use of Config::init function for initialize each module
changes in controllerProcessor for Config class and rename Http to Route then Routing.
Addition of some functionalities to Logger class
removed Test module
Tested the new functionality, 
from index to composer.json files map