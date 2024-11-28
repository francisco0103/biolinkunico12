<?php

namespace Core;

class Router
{
    public function run()
    {
        $url = $_SERVER['REQUEST_URI'];

        switch ($url) {
            case '/index':
                $controllerName = 'App\controllers\HomeController';
                $actionName = 'index';
                break;
            case '/tweet':
                $controllerName = 'App\controllers\DashController';
                $actionName = 'tweet';
                break;
            case '/dash':
                $controllerName = 'App\controllers\DashController';
                $actionName = 'dash';
                break;
            case '/register':
                $controllerName = 'App\controllers\AuthController';
                $actionName = 'register';
                break;
            case '/login':
                $controllerName = 'App\controllers\AuthController';
                $actionName = 'login';
                break;
            case '/biolink':
                $controllerName = 'App\controllers\LinkController';
                $actionName = 'biolink';
                break;
            case '/biolink/create':
                $controllerName = 'App\controllers\LinkController';
                $actionName = 'create';
                break;
            case '/biolink/linksadicionado':
                $controllerName = 'App\controllers\LinkController';
                $actionName = 'create';
                break;
                
                
                // case '/biolink':
                //     $controllerName = 'App\controllers\LinkController'; // Certifique-se de ter esse controller
                //     $actionName = 'create'; // Método que processará o formulário
                //     break;
                
                //     case '/biolink':
                //         $controllerName = 'App\controllers\LinkController';
                //         $actionName = 'linksadicionado'; // O método que exibe os links
                //         break;
                    
            default:
                http_response_code(404);
                echo "Página não encontrada!";
                exit;
        }

        // Verifica se a classe do controlador existe
        if (!class_exists($controllerName)) {
            http_response_code(500); // Erro interno do servidor
            echo "Controller '$controllerName' não foi encontrado!";
            exit;
        }

        // Instancia o controlador
        $controller = new $controllerName();

        // Verifica se o método do controlador existe
        if (!method_exists($controller, $actionName)) {
            http_response_code(500); // Erro interno do servidor
            echo "Método '$actionName' não foi encontrado no controller '$controllerName'!";
            exit;
        }

        // Executa o método do controlador
        $controller->$actionName();
    }
}
