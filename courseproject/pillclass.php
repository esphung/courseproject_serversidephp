<?php
// for debug purposes right now
//header('Content-Type: application/json');
/**
 * filename:    pillclass.php
 * @authorsl:   eric phung (esphung@gmail.com)
 * @date:       2017-07-10 00:21:04
 * @purpose:    optional custom pill class

 /$$$$$$$  /$$$$$$ /$$       /$$        /$$$$$$
| $$__  $$|_  $$_/| $$      | $$       /$$__  $$
| $$  \ $$  | $$  | $$      | $$      | $$  \__/
| $$$$$$$/  | $$  | $$      | $$      |  $$$$$$
| $$____/   | $$  | $$      | $$       \____  $$
| $$        | $$  | $$      | $$       /$$  \ $$
| $$       /$$$$$$| $$$$$$$$| $$$$$$$$|  $$$$$$/
|__/      |______/|________/|________/ \______/

 */

class Pill {
    // properties
    var $id;
    var $imageUrl;
    var $labeler;
    var $name;

    // overload constructor
    public function __construct(
        $value=         'id',
        $imageUrl=      'imageUrl',
        $labeler=       'labeler',
        $name=          'name'
    ){

        // set value properties ...
        $this->id =         $value;
        $this->imageUrl =   $imageUrl;
        $this->labeler =    $labeler;
        $this->name = $name;
    }// end overload

    // destroy obj
    public function __destruct(){
        # debug output about values this pill took with it
        //print("i am destroyed");
    }


}// end class def


