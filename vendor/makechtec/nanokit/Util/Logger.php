<?php
namespace MakechTec\Nanokit\Util;

class Logger {
    public static function p( $message ){
        ?>
            <p><?php echo( $message ); ?></p>
        <?php
    }
    public static function pDump( $message ){
        ?>
            <p><?php echo( $message ); ?></p>
        <?php
    }
}