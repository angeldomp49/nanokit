
# Templates #

0.- suppose we have one variable to display in the template like "Jhon". The template file going to be created

1.- Add the class with

    use MakechTec\Template\Template;

2.- Create a file with the content to save

    example.php

The dummy content is:

    <?php 
        global $data;
    ?>
        <h1>A title</h2>
        <p> <?php echo( $data['name']); ?> </p>

Notice we use the global $data variable it contains all params passed
we save the file and copy the relative file name

3.- Create a new template object with an array key-value and the relative file name


    $template = new Template( "example.php", [ 'name' => 'Jhon' ] );

As you can see we use the file name and we pass an array with the key __name__ this is because into the __example.php__ file 
we call __$data['name']__. If your script have problems finding the file you can use the __rightPath( $relativeName )__ functon helper
to get the absolute path.

    $absPath = rightPath( "example.php" );
    $template = new Template( $absPath, [ 'name' => 'Jhon' ] );

you can pass multiple strings and receive their in the file 

    $vars = [
        'name' => 'jhon',
        'lastName' => 'Lennon'
    ];

    $template = new Template( "example.php", $vars );

4.- For retrive the string content use

    $toString = $template->getContent();

5.- Test it with __echo()__

    echo( $toString );

or using a translation

    _t( $toString );