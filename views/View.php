<?php
namespace Views;
interface View{
    public function render($datos = null):string;
}