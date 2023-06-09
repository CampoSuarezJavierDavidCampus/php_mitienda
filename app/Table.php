<?php
namespace App;
interface Table{
    public function get_params():array;   
    public function get_datos():array; 
    public function get_id():array;
}

