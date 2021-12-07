<?php

class AppController{
    protected function render(string $page , string $template = null){
        $templatePath = 'public/views/' . $page . '/html/' . $template . '.php';
        $output = 'File not found';
        
        if (file_exists($templatePath)){
            ob_start();
            include $templatePath;
            $output = ob_get_clean();
        }
        print $output;
    }
}