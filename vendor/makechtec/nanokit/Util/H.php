<?php 
namespace MakechTec\PageManager\Util;
use MakechTec\PageManager\Page\Page;
use MakechTec\PageManager\Mail\MailSender;

class H{

    public static $page;
    public static $request;
    
    public static function p( $id = -1 ){
        
    
        if( $id == -1 ){
            self::$page = null;
        }
        self::$page =  Page::getPageById( $id );
    }
    
    public static function pt( $id = -1 ){
        
    
        if( $id == -1 ){
            return  self::$page->getTitle();
        }
        else{
            return Page::getPageById( $id )->getTitle();
        }
    }
    
    public static function pu( $id = -1 ){
        
    
        if( $id == -1 ){
            return self::$page->getUrl();
        }
        else{
            return Page::getPageById( $id )->getUrl();
        }
    }
    
    public static function ph( $id = -1 ){
        
    
        if( $id == -1 ){
            self::$page = null;
        }
        else{
            self::p( $id );
            include( Site::rightPath( "templates/header.php", false ) );
        }
    }
    
    public static function pht( $id = -1 ){
        
    
        if( $id == -1 ){
            self::$page = null;
        }
        else{
            self::p( $id );
            include( Site::rightPath( "templates/header.php", false ) );
            include( Site::rightPath( "templates/title.php", false ) );
        }
    }
    
    public static function addh(){
        include( Site::rightPath( "templates/header.php", false ) );
    }
    
    public static function addt(){
        include( Site::rightPath( "templates/title.php", false ) );
    }
    
    public static function addht(){
        include( Site::rightPath( "templates/header.php", false ) );
        include( Site::rightPath( "templates/title.php", false ) );
    }
    
    public static function addf(){
        include( Site::rightPath( "templates/footer.php", false ) );
    }
    
    public static function a( $pointer ){
        
        echo ( self::$page->getId() == $pointer ) ? "active" : "";
    }
    
    public static function addFormJs( $additionalLibs ){
        switch( $additionalLibs ){
            case 0:
                ?>
                <script src= <?php Site::rightUrl( "vendor/MakechTec/Mail/js/jqvalidate.js" ) ?> ></script>
                <?php
            break;
    
            case 1:
                ?>
                <script src= <?php Site::rightUrl( "vendor/MakechTec/Mail/js/jquery-validate.js" ) ?> ></script>
                <script src= <?php Site::rightUrl( "vendor/MakechTec/Mail/js/jqvalidate.js" ) ?> ></script>
                <?php
            break;
    
            case 2:
                ?>
                <script src= <?php Site::rightUrl( "vendor/MakechTec/Mail/js/jquery.js" ) ?> ></script>
                <script src= <?php Site::rightUrl( "vendor/MakechTec/Mail/js/jquery-validate.js" ) ?> ></script>
                <script src= <?php Site::rightUrl( "vendor/MakechTec/Mail/js/jqvalidate.js" ) ?> ></script>
                <?php
            break;
    
            default:
                ?>
                <script src= <?php Site::rightUrl( "vendor/MakechTec/Mail/js/jqvalidate.js" ) ?> ></script>
                <?php
        }
    }
    
    /*
    $items = [
        new class{
            public $name = "";
            public $url = "";
        },
        new class{
            public $name = "";
            public $url = "";
        },
        new class{
            public $name = "";
            public $url = "";
        },
    ];
    */
    
    public static function section( $toReply, $items ){
    
        foreach( $items as $item ){
            $toReply( $item );
        }
    }
    
    public static function s( $template, $params, $subject, $errorMsg, $successMsg ){
    
        $sender = new MailSender( 
            SEMAIL, 
            $subject, 
            $template, 
            $params, 
            [
                MailSender::$MIME_V1,
                MailSender::$CONTENT_TYPE_TEXT_HTML
            ],
            $successMsg,
            $errorMsg 
            );
    
        $response = $sender->send();
        return $response;
    }
    
    public static function fp( $key, $fname, &$arr ){
        $arr[ $key ] = $_POST[ $fname ];
    } 
}