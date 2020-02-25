<?php

namespace ishop\base;

use Exception;

class View {

    public $route;
    public $controller;
    public $model;        
    public $view;
    public $prefix;
    public $layout;
    public $data = [];
    public $meta = [];

    
    public function __construct($route, $layout = '', $view = '', $meta= ''){
        $this->route = $route;
        $this->controller = $route['controller'];
        $this->view = $view;
        $this->model = $route['controller'];
        $this->prefix = $route['prefix'];
        $this->meta = $meta;

        if ($layout === false) {
            $this->layout = false;
        }else{
            $this->layout = $layout ?: LAYOUT;
        }
    }

    public function render(array $data){
       extract($data);  //функция создает переменные из данных массива, полученные из контроллера, которые потом можно использовать во view файлах
       $viewFile = APP."/views/{$this->prefix}{$this->controller}/{$this->view}.php";
       if(is_file($viewFile)){ 
           ob_start(); //буферизация последующего контента
           require_once $viewFile;
           $content = ob_get_clean();  //буфер записываем в переменную
       }else {
           throw new \Exception("Не найден вид {$viewFile}",404);
       }

       if($this->layout !== false) {
           $meta = $this->getMeta($this->meta);
           $layoutFile = APP . "/views/layouts/{$this->layout}.php";
           if(is_file($layoutFile)) require_once $layoutFile;
           else throw new Exception("Не найден шаблон {$layoutFile}",500);
       }
    }

    protected function getMeta($meta){
        $output = '<title>' . $meta['title'] . '</title>';
        $output .= '<meta name="decription" content="'. $meta['desc'].'">';
        $output .= '<meta name="keywords" content="'. $meta['keywords'].'">';


        return $output;
    }
    
}