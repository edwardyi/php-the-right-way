<?php

declare(strict_types=1);

namespace App\ServerInfo;

use app\ServerInfo\Exception\ViewPathNotFoundException;

class View
{

    public function __construct(protected string $view, protected array $params = [])
    {
        
    }
    public static function make(string $view, array $params = [])
    {
        return new self($view, $params);
    }

    public function render(bool $withinLayout = false)
    {
        $viewPath = VIEW_PATH.'/'.$this->view.'.php';

        if (!file_exists($viewPath)) {
            throw new ViewPathNotFoundException();
        }

        // http://your-host/server_info.php/home/test?viewPath=/app/php_the_right_ways/class_constants/src/ServerInfo/.env
        // extract($this->params);

        // var_dump($viewPath, $this->params);
        // echo __DIR__;

        // exit;
        // var_dump($viewPath, file_exists($viewPath));

        // create variable from key 
        foreach ($this->params as $key => $value) {
            $$key = $value;
        }
        
        ob_start();

        include($viewPath);
        // get current buffer and delete output buffer  
        $content = ob_get_clean();
        
        if ($withinLayout) {
            include VIEW_PATH.'/_layout/index.php';
            $layoutData = ob_get_clean();
            $content = str_replace('%%content%%', $content, $layoutData);
        }

        return $content;
    }

    /**
     * use render() to output content from view
     *
     * @return string
     */
    public function __toString()
    {
        return $this->render(true);
    }

    public function __get($name)
    {
        echo "call magic get method <br/>";
        return $this->params[$name];
    }
}