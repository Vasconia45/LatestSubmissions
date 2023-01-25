<?php
    class Movie{
        private $name;
        private $isan;
        private $year;
        private $points;

        public function __construct($name, $isan, $year, $points){
            $this->name = $name;
            $this->isan = $isan;
            $this->year = $year;
            $this->points = $points;
        }

        public function getName(){
            return $this->name;
        }

        public function getIsan(){
            return $this->isan;
        }

        public function getYear(){
            return $this->year;
        }

        public function getPoints(){
            return $this->points;
        }

        public function toString(){
            return $this->name . "-" . $this->isan . "-" . $this->year . "-" . $this->points;
        }
    }
?>