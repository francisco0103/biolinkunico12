<?php

namespace App\Controllers;

use Core\Controller;
use Core\Database;

class linkController extends Controller {


    public function index() {
       
       $userId = $_SESSION['user_id'];
       $this->view('/biolink/biolink2');

   }

   public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
           $title = $_POST['title'];
           $url = $_POST['url'];
           $userId = $_SESSION['user_id'];
           
           $db = Database::connect();

           $stm = $db->prepare("INSERT INTO tabela (campo1, campo2) VALUES (:campo1, :campo2)");//adicionar as coisas que tem na tabela
           
       
     
           $stm->bindParam(":name", $name);
           $stm->bindParam(":name", $name);
           $stm->bindParam(":username", $username);
        
           
             if($stm->execute()) {
               $this->redirect('/biolink/biolink2');
             }

           
        }
        $this->view('biolink/create');
    }
}

