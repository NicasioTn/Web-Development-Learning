<?php
    session_start();
    if(!isset($_SESSION['student'])){
        $_SESSION['student'] = array();
    }
    class student{
        public $id;
        public $fullname;
        public $gpa;

        public function __construct($id, $fullname, $gpa){
            $this->id = $id;
            $this->fullname = $fullname;
            $this->gpa = $gpa;
            
        }

       
    }
    // receive
    $id = $_GET['id'];
    $fullname = $_GET['fullname'];
    $gpa = $_GET['gpa'];
    $mode = $_GET['mode'];

    if($mode == "add"){
        $student = new Student($id, $fullname, $gpa);
        array_push($_SESSION['student'], $student);
    }elseif($mode == "show"){
        foreach($_SESSION['student'] as $s){
            echo $s->id . " ". $s->fullname . " " . $s->gpa . "<br>" ;
        }
    }elseif($mode == "delete"){
        $idx = 0;
        foreach($_SESSION['student'] as $s){
            if($s->id == $id){
                array_splice($_SESSION['student'], $idx, 1);
            }else{
                $idx++;
            }

        }
    }
?>