<?php
    class Movies{
        private $movies = [];

        //Constructor method
        public function __construct($hidden){
            $this->convertToArray($hidden);
        }

        //Méthod to add a Movie to an array of Movies
        public function add($m1){
            if($m1->getName() != null && $m1->getIsan() != null && $m1->getYear() != null && $m1->getPoints() != null){
                if(strlen($m1->getIsan()) >= 8){
                    $this->movies[$m1->getIsan()] = $m1;
                }
                else{
                    echo "<p style='color:red;'>Error.</p>"; 
                }
                /*foreach($this->movies as $key => $m){
                    if($key == $m1->getIsam()){
                        echo "dsa";
                    }
                }*/
            }
            else{
                if($m1->getName() == null && $m1->getIsan() == null){
                    echo "<p style='color:red;'>The Movie name and the Movie isan cannot be empty.</p>";
                    $this->movies[null];
                }
                elseif($m1->getName() == null){
                    unset($this->movies[$m1->getIsan()]);
                }
                elseif($m1->getIsan() == null && $m1->getName() != null){
                    foreach($this->movies as $key => $m){
                        if(str_contains($m->getName(), $m1->getName())){
                            echo "<p style='color:green;'>" . $m->getName() . " from " . $m->getYear() . "</p>";
                        }
                    }
                }
            }
        }

        //Method to convert a string into an array
        public function convertToArray($hidden){
            $movie = explode("$", $hidden);
            for($i = 0; $i < count($movie); $i++){
                $movie2 = explode(",", $movie[$i]);
                $m1 = new Movie($movie2[0], $movie2[1], $movie2[2], $movie2[3]);
                $this->movies[$m1->getIsan()] = $m1;
            }
        }

        //Method to convert an array into a string
        public function convertToString(){
            $val = "";
            foreach($this->movies as $i){
                if($i->getName() != " " && $i->getIsan() != " " && $i->getYear() != " " && $i->getPoints() != " "){
                    $val .= $i->getName() . "," . $i->getIsan() . "," . $i->getYear() . "," . $i->getPoints() ."$";
                }
            }
            return $val;
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