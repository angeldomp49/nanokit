
## Translation ##

1.- Enable the module in the app/modules.php file

2.- Define the default language in the app/generalsettings.php file

    define( 'DEFAULT_LANGUAGE', 'es_MX' );

3.- Create one file for each language with his same short name in the __lang__ directory and .json termination

    lang > en_US.json es_MX.json ...

4.- Add the strings to translate in an json object array format like this

    [
        { "hello world":"hola mundo" },
        { "hi":"hola" },
        { "i'm here":"estoy aqui" },
    ]

5.- Use the **_t( $message )** instead of **echo( $message )** for display the content because if the original string
not have translation it's displayed normally

    <?php _t( "hello world" ); ?>

6.- Go to your view in the browser ( [starting php development server](https://github.com/angeldomp49/nanokit/blob/docs/docs/get-started) )
and prove the result