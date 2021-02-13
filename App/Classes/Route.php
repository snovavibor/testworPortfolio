<?php



class Route
{
   //для хранения маршрута
   private $routes = [];

   //для хранения данных если они переданы 
   private $params = [];

   //для хранения метода запроса
   private $methodHttp;


   /**
     * при создании класса подключается файл с маршрутами
     * Routes.php в котором указаны все маршруты приложения
     */
    public function __construct()
    {
        $this->routes = require_once __DIR__.'../../Lib/routes.php';
       
            $this->run();
    }

     /**
     * проверка на существоание роута
     *  в массиве роутов (Lib/routes.php)
     */
    private function match()
    {
       /**
        * определяем метод Htpp запроса для роутинга
        */
        $this->methodHttp = $_SERVER['REQUEST_METHOD'];

        
        $url = trim($_SERVER['REQUEST_URI'],'/');
        
        /**
         * цель: найти маршрут в файле роутов(Routes.php)
         * и сопоставить данные мршрута с получеными от клиента
         * определяется метод и маршрут
         */
        foreach($this->routes as $route =>$param)
        {
             
            if($route == $url && strtoupper($param['method']) == $this->methodHttp)
            {
               $this->params = $param;
                return true;
            }
        }
        return false;
    }


    public function run()
    {
        /**
         * после проверки существования маршрута
         * подключается требуемый класс с методом
         * в случае несовпадения отдается 404
         */
       if($this->match())
       {
           $controllerName = ucfirst($this->params['controller']).'Controller';
           $action = $this->params['action'];

           $controller = new $controllerName($this->params);
           $controller->$action();
           
       }else{
           
       View::errors(404);
           
       }
    }
}

