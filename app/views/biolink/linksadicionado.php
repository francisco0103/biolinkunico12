<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meus Links</title>
    <style>


/* Estilos gerais */
body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
}

/* Estilo do cabeçalho */
h1 {
    text-align: center;
    color: #333;
    margin-top: 20px;
}

/* Estilo da lista de links */
ul {
    list-style: none;
    padding: 0;
    max-width: 800px;
    margin: 20px auto;
}

/* Estilo dos itens da lista */
li {
    background-color: #fff;
    border: 1px solid #ddd;
    border-radius: 5px;
    margin-bottom: 10px;
    padding: 10px;
    display: flex;
    align-items: center;
    justify-content: space-between;
}

/* Estilo do link */
a {
    text-decoration: none;
    color: #007BFF;
    font-weight: bold;
    display: inline-block;
}

/* Estilo para o link quando estiver em hover */
a:hover {
    color: #0056b3;
}

/* Estilo para o botão "Adicionar novo link" */
a[href="/create"] {
    display: inline-block;
    padding: 10px 20px;
    background-color: #28a745;
    color: white;
    text-decoration: none;
    font-weight: bold;
    border-radius: 50px;
    margin-top: 10px;
    align-items: center;
}

/* Estilo quando o link de adicionar está em hover */
a[href="/linksadicionado"]:hover {
    background-color: #218838;
}


    </style>
</head>
<body>
    <h1>Links Adicionados</h1>

    <ul>
        <?php foreach ($links as $link): ?>
            <li>
                <a href="<?= $link['url']; ?>" target="_blank"><?= htmlspecialchars($link['title']); ?></a>
            </li>
        <?php endforeach; ?>
    </ul>

    <a href="/create">Adicionar novo link</a>

    
</body>
</html>
