<?php



$date = new DateTime();
$date2 = new DateTime("2025-02-09");
$date3 = new DateTime("now",new DateTimeZone("UTC"));

echo $date3->format("y-m-d H:i ") . "<br>";


$date3->add(new DateInterval("P1D"));  // add 1 day

echo $date3->format("y-m-d H:i ") . "<br>";

$date3->modify("+1 month");    // add 1 month

echo $date3->format("y-M-d H:i "). "<br>";








///////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////

/* 

namespace My_App;

require "user.php";
require "product.php";

use My_App\product;
use My_App\user;


$us = new user();

$pro = new product(); */










///////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////

/*  abstract class namex {
    public $model;
    abstract function getname($nm):string;
}
class child extends namex {
    
    function getname($nm): string
    {
        if($nm=="fady"){return "hello Mr fady <br>";}
        else{
            return "hello guest : $nm <br>";
        }
    }
} */

// $a = new child();
// echo $a->getname("fady"); 


///////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////



/* interface Animal {
    public function say();
}

trait message {
    public function msg(){
        echo "<h1>hello from trait message </h1><br>";
    }
}
trait message2{
    public function msg2(){
        echo "<h1 style='color :red'>samooooh</h1>";
    }
}

class cat extends child implements Animal {
    use message;
    use message2;
    public function say(){
        echo "hello baby <br>";
    }

}

$x = new cat();

$x->say();
$x->msg();
$x->msg2(); */

///////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////


class greeting {
    protected static function welcome(){

        echo "<h2 style='color:green;'> welcome bro </h2>";
    }

   /*  function __construct()
    {
       self::welcome();
    } */
}

class B extends greeting {

}



























///////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////


















/* abstract class car
{
    abstract protected function show(): string;
}

class audi extends car
{
    function show(): string
    {
        return "this is audi car <br>";
    }
}

class volvo extends car {
    function show():string{
        return 2233;
    }
}

$a = new audi();
echo $a->show();

$b = new volvo();
echo $b->show();
 */




/* abstract class cars
{
    private $name;

    function __construct($nm)
    {
        $this->name = $nm;
    }

    protected function show()
    {
        echo "this car name : $this->name <br>";
    }

     abstract public function msg():string;

   
}

class verna extends cars
{
    public function msg():string
    {
        return "hello <br>";
        // $this->show();
    }
  
} */


// $car = new verna("hyndai verna");
// echo $car->msg();





/* class fruit
{
    public $name;
    private $color;

    function __construct($nm, $co)
    {
        $this->name = $nm;
        $this->color = $co;
    }

    /*  function getFruit(){
        return $this->name;
    } */

 /*    function __destruct()
    {
        echo $this->name .  " " . $this->color;
    } */

 
// $app = new fruit("apple","red");







/* $x = 5;
$y = (int) $x;
echo gettype($y); */


/* function calc($x, $y, $op)
{
    if ($op == "+") {
        return $x + $y;
    }
} */

// echo "<h2>" . calc(5, 6, "+") . "</h2>"; 

// $arr = [00,11,22,33];

// $arr[count($arr)] = 44 ;


// $arr2 = ["first_name" => "fady" , "last_name" => "soliman" , "age" => 39 ];




/* $arr_obj = (object) $arr2;

echo "<pre>";
print_r($arr_obj);
echo "</pre>";

echo gettype($arr_obj);
 */
// $arr2["address"] = "Fay" ;

// $arr2 += ["id"=>1];

// asort($arr2);    // sort by value
// ksort($arr2);    // sort by key

// $arr_x = [1,4,55,0,123,12]; 

// echo rand( 0,999);

// asort($arr_x);
// rsort($arr_x);

/* foreach($arr2 as $x=>$y){
    echo "  $x  => $y <br> "; 
}
 */


/* foreach($arr2 as $x=>$y){
    echo "  $x => $y <br>"; 
} */

/* echo "<pre>";
print_r($arr);
echo "</pre>"; */