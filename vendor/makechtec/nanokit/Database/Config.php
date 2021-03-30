<?php
namespace MakechTec\Nanokit\Database;

use MakechTec\Nanokit\Core\Site;
use MakechTec\Nanokit\Core\Interfaces\Initializable;
use Illuminate\Database\Capsule\Manager as DB;

class Config implements Initializable{

    public static function init( Site &$site ){
        $DB = new DB();

        $DB->addConnection([
            "driver" => DBDRIVER,
            "host" => DBHOST,
            "database" => DBNAME,
            "username" => DBUSER,
            "password" => DBPASSWORD
        ]);

        $DB->setAsGlobal();
        $DB->bootEloquent();
    }
}