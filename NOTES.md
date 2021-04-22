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
the routing module going to use the same mapping routes for MVC pattern *ok*


addition of app/generalsettings, 
kernel has been moved to Core/Kernel
creation of Core with the essential code, like Request, Site and interfaces for strategy pattern
use of Config::init function for initialize each module
changes in controllerProcessor for Config class and rename Http to Route then Routing.
Addition of some functionalities to Logger class
removed Test module
Tested the new functionality, 
from index to composer.json files map


   _t( "este es un texto muy simple" );

   _t( "otro texto" );            // "another text"

   en_US.php

   {
       "este es un texto muy simple": "this is a very simple text"
   },
   {
       "otro texto" : "another text"
   }

   es_MX.php

   {
       "este es un texto muy simple": "este es un texto muy simple"
   },
   {
       "otro texto" : "otro texto"
   }



   crear una función global que recibe una cadena de texto,
   luego analiza el idioma actual del sitio,
   luego con este dato busca si existe un archivo de traducción tipo json en la carpeta lang del proyecto,
   si es así busca la cadena de texto solicitada como clave (key) del json,
   si la encuentra muestra el valor (value) del json.



   para el config::init
   va a recopilar todos los lenguages permitidos,
   si el primer slug del a uri coincide con algún lenguaje,
        poner el lenguaje en el sitio,
        borrar el primer slug de la uri del sitio,
    sino, poner el lenguaje por defecto en el sitio.

    en _t buscar el lenguaje del sitio y hacer lo antes visto



    hace falta la documentación

IMPORTANT:

Url\Parser must not be initialized because it makes the implementation for rightPath function
Util\functions.php must be loaded with composer.json because it implements also rightPath function