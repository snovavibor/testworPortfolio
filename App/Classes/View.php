<?php




class View
{
    public $path;
    public $route;
    public $layout = 'default';


    public function __construct($route)
    {
        $this->route = $route;
        $this->path = $route['controller'] . '/' . $route['action'];
       
    }

    public function render($title, $vars = [])
    {

        bufferView($this->path, $this->layout, $vars, $title);
    }

    public static function errors($code)
    {
        http_response_code($code);

        bufferView('page404');
        exit;
    }
}
