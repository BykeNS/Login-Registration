<?php

// class Balance 
// {
//     protected $balance ;

//     public function __construct( $balance)
//     {
//         $this->balance = $balance;
      
//     }
//       /**
//        * 
//      * Set the value of balance
//      *
//      * @return  self
//      */ 
//     public function setBalance($amounth)
//     {
//         $this->balance += $amounth;

//         return $this;
//     }

//     /**
//      * Get the value of balance
//      */ 
//     public function getBalance() 
//     {
//         return $this->balance;
//     }

//     public function withdraw($amounth){

//         if ($amounth <= $this->balance) {
//             $this->balance -= $amounth;
//             echo "The amount is withdrawn " .$amounth . '$'."<br>";
//             echo "Remaining balance is " .$this->balance  . '$';
//         }else {
//             echo "Insuficient funds !!!";
//         }
//     }
    

  
// }


// $class = new Balance(30);
// //$class->setBalance(1020);
// //$class->getBalance();
// $class->withdraw(20);

// interface Lawnmower{
//    public function cut_grass();
       
   
// }
// class Scissors implements Lawnmower {
//     public function cut_grass(){
//         return 'Finished cutting the grass in 14.2 hours.';
//     }
// }
 
// class Landscaper
// {
//     protected $mower;
//     protected $customer;
    
//     public function __construct(Lawnmower $mower, $customer = ''){
//         $this->mower = $mower;
//         $this->customer = $customer;
//     }
    
//     public function help_customer(){
//         return 'Finished mowing '. $this->customer .' lawn';
//     }
// }
 
// $landscaper = new Landscaper(new Scissors, 'The McFlys');
// var_dump($landscaper->help_customer());

interface Lawnmower {
    public function cut_grass();
}
 
class Kubota implements Lawnmower {
    public function cut_grass(){
        return 'cutting major grass';
    }
}
 
class JohnDeere implements Lawnmower {
    public function cut_grass(){
        return 'cutting grass like a champion';
    }
}
 
class Landscaper
{
    protected $mower;
    protected $customer;
    
    public function __construct(JohnDeere $mower, $customer){
        $this->mower = $mower;
        $this->customer = $customer;
    }
    public function __toString() {}

    
    public function help_customer(){
        return 'Finished mowing '. $this->customer .' lawn';
    }
}
 
$landscaper = new Landscaper(new JohnDeere, 'The Johnsons','Mahindra');
var_dump($landscaper->help_customer());
// string 'Finished mowing The Johnsons lawn' (length=33)