
# Emails #

1.- Enable the module

2.- Go to app/mailsettings.php file and configure your email server information host, user name and password
You can use this file putting email constants in the global environment but if you dont need this just leave empty

3.- In your controller import the EmailOrder and Sender class 

    use MakechTec\Nanokit\Mail\{ EmailOrder, Sender };

4.- Create an email template importing

    use MakechTec\Nanokit\Template\Template;

Then create it with the file name and data

    $params = [
        'name' => 'Jhon Lennon',
        'age' => '24'
    ];

    $template = new Template( 'myfile.php', $params );

No matter the variable name passed, you should get the array content inside the template file with $data

    <?php 
        global $data;
    ?>

    <p>My Name is: <?php echo( $data['name'] ); ?></p>
    <p>And i'm <?php echo($data['age']); ?> years old </p>

4.- Create a new EmailOrder with your custom configuration if you wish, you can call the email 
predefined variables in the app/mailsettings.php file

    $order = new EmailOrder();
    $order->host = "mail.example.com";
    $order->userName = "user@example.com";
    $order->password = "mypassword";
    $order->template = $template;

Notice $template is the same template before declared

Also is possible create an EmailOrder passing in her constructor an array listing attributes like

    $config = [
        'host' => 'mail.example.com',
        'userName' => 'user@example.com'
        ...
    ];

    $order = new EmailOrder( $config );

5.- Create a sender

    $sender = new Sender( $order );

6.- Send the email, surround this with try catch block for any exception lauched

    try{
        $sender->send();
        echo( "successfull sended" );
    }
    catch( Exception $e ){
        echo( $e->getMessage() );
    }


