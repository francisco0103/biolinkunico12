<h1>Adicionar Link</h1>

<form action="/biolink/linksadicionado" method="POST">
    <input type="text" name="title" placeholder="Título do Link" required>
    <input type="url" name="url" placeholder="URL do Link" required>
    <button type="submit">Adicionar Link</button>
</form>
<style>

    /* Estilização do formulário */
form {
    width: 100%;
    max-width: 400px;
    margin: 50px auto;
    padding: 20px;
    background-color: #f9f9f9;
    border: 1px solid #ddd;
    border-radius: 8px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

/* Estilização dos inputs */
form input[type="text"],
form input[type="url"] {
    width: 100%;
    padding: 12px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 6px;
    font-size: 16px;
    box-sizing: border-box;
    outline: none;
    transition: border-color 0.3s ease;
}

/* Foco nos inputs */
form input[type="text"]:focus,
form input[type="url"]:focus {
    border-color: #007BFF; /* Azul */
}

/* Botão */
form button {
    width: 100%;
    padding: 12px;
    background-color: #007BFF; /* Azul */
    color: white;
    border: none;
    border-radius: 6px;
    font-size: 16px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

/* Efeito hover no botão */
form button:hover {
    background-color: #0056b3; /* Azul mais escuro */
}

/* Placeholder */
form input::placeholder {
    color: #aaa;
}

/* Responsividade */
@media (max-width: 480px) {
    form {
        padding: 15px;
    }
    form input,
    form button {
        font-size: 14px;
    }
}

</style>
<?php
require_once 'core/Database.php';

use Core\Database;

try {
    $db = Database::getConnection();
    echo "Conexão bem-sucedida!";
} catch (Exception $e) {
    echo "Erro: " . $e->getMessage();
}
