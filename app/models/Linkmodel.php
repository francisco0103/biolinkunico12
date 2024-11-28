<?php

//class linkModel extends Database {
  // public function getLinksByUser($userId) {
      //  $query = "SELECT * FROM links WHERE user_id = :user_id";
     //   $stmt = $this->connect()->prepare($query);
      //  $stmt->bindParam(':user_id', $userId);
       // $stmt->execute();
      //  return $stmt->fetchAll(PDO::FETCH_ASSOC);
 //   }
//
   // public function addLink($userId, $title, $url) {
      //  $query = "INSERT INTO links (user_id, title, url) VALUES (:user_id, :title, :url)";
      //  $stmt = $this->connect()->prepare($query);
      //  $stmt->bindParam(':user_id', $userId);
     //   $stmt->bindParam(':title', $title);
   //     $stmt->bindParam(':url', $url);
   //     return $stmt->execute();
  //  }
//}
//namespace App\models;

//use Core\Database;

class LinkModel
{
    public function save($title, $url)
    {
        $db = Database::getConnection(); // Certifique-se de que a conexão está configurada
        $stmt = $db->prepare("INSERT INTO links (title, url, user_id) VALUES (?, ?, ?)");
        $stmt->execute([$title, $url, 1]); // Substitua `1` pelo ID do usuário logado, se necessário
    }
}

class LinkModel
{
    public function save($title, $url)
    {
        $db = Database::getConnection(); // Garante que a conexão está funcionando
        $stmt = $db->prepare("INSERT INTO links (title, url, user_id) VALUES (?, ?, ?)");
        $stmt->execute([$title, $url, 1]); // Substitua `1` pelo ID do usuário logado, se necessário
    }
}
//namespace App\models;

use Core\Database;

class LinkModel
{
    public function getAllLinks()
    {
        // Obtém a conexão com o banco de dados
        $db = Database::getConnection();

        // Prepara a consulta SQL
        $stmt = $db->prepare("SELECT * FROM links");

        // Executa a consulta
        $stmt->execute();

        // Retorna todos os resultados como um array associativo
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function save($title, $url)
    {
        // Obtém a conexão com o banco de dados
        $db = Database::getConnection();

        // Prepara e executa a consulta SQL para salvar o novo link
        $stmt = $db->prepare("INSERT INTO links (title, url, user_id) VALUES (?, ?, ?)");
        $stmt->execute([$title, $url, 1]); // 1 é o ID do usuário (substitua conforme necessário)
    }
}



class linkController
{
    public function index() // Método que exibe todos os links
    {
        // Chama o modelo para buscar os links
        $linkModel = new LinkModel();
        $links = $linkModel->getAllLinks();

        // Passa os links para a view (renderização da página)
        require_once 'App/views/links/index.php';
    }

    public function store() // Método que salva um novo link
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = $_POST['title'] ?? null;
            $url = $_POST['url'] ?? null;

            if ($title && $url) {
                $linkModel = new LinkModel();
                $linkModel->save($title, $url);
                header('Location: /biolink'); // Redireciona após salvar
                exit;
            } else {
                echo "Todos os campos são obrigatórios.";
            }
        } else {
            echo "Método inválido!";
        }
    }
}
class linkController
{
    public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = $_POST['title'] ?? null;
            $url = $_POST['url'] ?? null;

            if ($title && $url) {
                $linkModel = new LinkModel();
                $linkModel->save($title, $url);

                // Redirecione para uma página de sucesso ou de listagem
                header('Location: /biolink');
                exit;
            } else {
                echo "Todos os campos são obrigatórios.";
            }
        } else {
            echo "Método inválido!";
        }
    }
}
