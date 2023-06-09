<?php 
namespace Views;
use Views\View;
class Template implements View{
    private string $path;
    private string $name;
    public function __construct(        
        private ?array $result
    ){
        return $this;
    }

    public function name($name){
        $this->name = $name;                
        $this->path = __DIR__."/template/resourses/$this->name";
        return $this;
    }
    
    public function render($result = null):string{                  
        return $this->get_layouts('Ciudades');
    }

    private function set_layouts(){
        $head =file_get_contents(__DIR__.'/template/head.php');
        $nav = file_get_contents(__DIR__.'/template/nav.php');
        $main = file_get_contents(__DIR__.'/template/main.php');
        $modal = file_get_contents(__DIR__.'/template/modal.php');
        $aside =file_get_contents(__DIR__.'/template/aside.php');
        
        return [
            $head,
            $nav,
            $main,
            $modal,
            $aside
        ];
    }

    private function get_layouts($name){
        list(
            $head,
            $nav,
            $main,
            $modal,
            $aside) = $this->set_layouts();
        $main_contents = $this->extend_content($this->path.'/show.php',$this->result);
        $modal_contents = $this->extend_content($this->path.'/register.php',$this->result);
        $main = str_replace(['@title','@content'],[$name,$main_contents],$main);
        $modal = str_replace(['@title','@form'],[$name,$modal_contents],$modal);
        $base = str_replace(
            ['@head','@nav','@main','@modal','@aside'],
            [$head,$nav,$main,$aside,$modal],
            file_get_contents(__DIR__.'/template/base.php')
        );
        return $base;
    }

    private function extend_content($path,$result){
        ob_start();
        if($result){
            extract($result);              
        }        
        include_once($path);
        $content = ob_get_contents();

        ob_end_clean();
        return $content;
    }
}