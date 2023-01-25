<?php
    class Movies{
        private $movies = [];

        public function __construct($session){
            $this->convertToArray($session);
        }

        //Method to add a Movie to an array of Movies
        public function add($m1){
            $this->movies[$m1->getIsan()] = $m1;
        }

        //Method to convert a string into an array
        public function convertToArray($session){
            $movie = explode("$", $session);
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

        //Method display
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