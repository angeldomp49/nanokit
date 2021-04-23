
## Routing ##

1.- Enable the module in app/modules.php file, it should be included after __Util__ module
2.- Register a route in the app/routes.php file

    Route::get( '/home', [ HomeController::class, 'home' ] );

You should declare the use of the controller class also

    use App\HomeController;

3.- Create your controller adding a file with the same class name in the src/Controllers directory

src
   |
    --->Controllers
                  |
                  --->HomeController.php

4.- Create your class controller. Notice the method name has been declared in the app/routes.php like home,
then you need to create it. Inside we call the *home* view it can be different.

    <?php
    namespace App\Controllers;

    class HomeController{
        public function home(){
            view( 'home' );
        }
    }

5.- Create a view adding a file in the __src/Views__ directory

src
   |
    --->Views
            |
            --->home.php

6.- Fill your view with your html custom code.

    <h1>Hello world!</h1>

7.- Run the next command for update your created classes

    php composer.phar dump-autoload

8.- Start your local server using 

    php -S localhost:8000 -t public

9.- Then access to the browser with:

    http://localhost:8000/home

# Routing with parameters #

Usually you need to send and retrive data from the url. for make this 

1.- Into the __app/routes.php__ declare the route like

    Route::get( 'home/{name}/{lastName}', [ HomeController::class, 'home' ] );

2.- The __{name}__ and __{lastName}__ are the parameters names

3.- Declare your function controller using passing the two parameters

    class HomeController{
        public function home( $name, $lastName ){
            $all = $name . " " . $lastName;
            
        }
    }

4.- You can pass values to the view like

    view( 'home', [ 
        'all'=> $all,
        'from' => 'Home controller class'
        ] );

5.- For get the values in the view

    <p> <?php echo( $all ); ?> </p>
    <p> <?php echo( $from ); ? </p>

6.- Visit the url like this

    http://localhost:8000/home/jhon/Lennon/

7.- You'll see

<p>Jhon Lennon</p>
<p>Home controller class</p>