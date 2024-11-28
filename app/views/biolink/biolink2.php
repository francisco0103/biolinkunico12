<h1>Meus Links</h1>
<a href="/biolink/create">Adicionar Novo Link</a>

<ul>
    <?php foreach ($links as $link): ?>
        <li>
            <a href="<?= htmlspecialchars($link['url']); ?>" target="_blank">
                <?= htmlspecialchars($link['title']); ?>
            </a>
        </li>
    <?php endforeach; ?>
</ul>
