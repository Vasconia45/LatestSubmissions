<?php
    class Movie{
        private $name;
        private $isan;
        private $year;
        private $points;

        //Constructor method
        public function __construct($name, $isan, $year, $points){
            $this->name = $name;
            $this->isan = $isan;
            $this->year = $year;
            $this->points = $points;
        }

        //Method to get the name of the movie
        public function getName(){
            return $this->name;
        }

        //Method to get the isan of the movie
        public function getIsan(){
            return $this->isan;
        }

        //Method to get the year of the movie
        public function getYear(){
            return $this->year;
        }

        //Method to get the points of the movie
        public function getPoints(){
            return $this->points;
        }

        //Method to display a Movie
        public function toString(){
            return $this->name . "-" . $this->isan . "-" . $this->year . "-" . $this->points;
        }
    }
?>