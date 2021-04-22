
# get started #

download from https://github.com/angeldomp49/nanokit

## Modules ##

-> Util
-> Translations
-> Database
-> Routing
-> Mail

## global functions ##

    void view( String $view, Array $params )

Extract the array values in $params and include the specified view name located in src/Views directory

    String rightPath( String $filename )

The $filename should be referenced from the base directory, returns the absolute path for the file

    void _t( String $message )

Display if exist a translation for $message

    void addSettingsFile( String $filename )

Include the specified filename based on the relative path

## Util ##

By default Util module functions file is loaded.

class Logger

static methods

    public static void log( String $message )

Display the message in p html tag

    public static void logDump( Object $obj )

Display var_dump in p html tag

    public static void logBool( Bool $condition )

Display support for booleans in p html tag

    public static void err( String $err )

Trigger an user error message like Notice



## Url ##

class Parser

static methods

    public static Array paramsNamesFromSlugs( Array $slugs )

Returns an array with all parameters founds in the url slugs surroundeds by curly brackets ( {} )

    public static Array slugsFromUri( String $uri )

Returns an array of all slugs in the uri separated by slash ( / )

    public static String rootPath()

Returns the absolute root path for the current project directory

    public static equalSlashes( String $reference, String $target )

Returns the $target string with the same slash type of the $reference ( / ) or ( \ )

    public static String removeSlugOfUri( String $uri, String $slug )

Returns the uri without the specified slug

    public static String uriFromSlugs( Array $slugs )

Returns an uri formed by the $slugs array

    public static String removeAroundSlashes( String $uri )

Removes the first and last slash if they exisst

    public static String removeAroundCurlyBrackets( String $uri )

Removes the first and last curly brackets if the exist

    public static String removeAroundChars( String $str, String $firstChar, String $lastChar )

Removes the first and last chars if the exist

    public static Array divideString( String $str, String $divider )

Array with two elements, the first and second part

    public static String removeFirstSlug( String $uri )

Remove the first slug

    public static String removeLastSlug( String $uri )

Remove the last slug

## Template ##

class Template

methods

    public __construct( String $filename, Array $params )

Create a template from the specified file and $params

    public String getContent()

The template content in a string

## Routing with params ##