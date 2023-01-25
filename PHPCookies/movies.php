<?php
class Movies{

private $movies=[];

//Constructor method
public function __construct(){

}
//Méthod to add a Movie to an array of Movies
public function add($m1){
    if (($m1->getName() == "") && ($m1->getIsan() == "")) {
        echo "<p style='color:red;'>The Movie name and the Movie isan cannot be empty.</p>";
        unset($this->movies[null]);
    }else{
        foreach ($this->movies as $key => $i){
            if($key==$m1->getIsan()){
                if($m1->getName() == ""){
                    unset($this->movies[$m1->getIsan()]);
                }
            }else{
                if(($m1->getName() != "") && ($m1->getIsan() == "")){
                    if(str_contains($i->getName(),$m1->getName())){
                        echo "<p>".$i->getName()." from ".$i->getYear()."</p>";
                        unset($this->movies[null]);
                    }
                }else{
                    $this->movies[$m1->getIsan()]=$m1;
                }
            }
        } 
    }
}

//Método display
public function toString(){
    $counter = 0;
    foreach($this->movies as $i){
        if($counter != 0){
            echo "<p>" . $counter . "-" . $i->getName() . " " . $i->getIsan() . " " . $i->getYear() . " " . $i->getPoints() . "</p>";
        }
        $counter++;
    }
}
}
?>