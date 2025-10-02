<?php 
// Sempre incluir o header.php primeiro. Ele inicia a conexão e a seção.
include_once('header.php');
?>

<h1>Últimos Anúncios</h1>
<div class="anuncios-grid">
    <?php 
    // dentro desse bloco PHP, a variavel $conexao já existe(vinda do header.php)
    // Query com JOIN para buscar dados de 3 tabelas
    $sql = "SELECT a.id, a.titulo, a.preco, a.descricao, 
    c.nome AS categoria_nome, 
    u.nome AS usuario_nome 
    FROM anuncios a 
    -- join faz o relacionamento 
    JOIN categoria c ON a.id_categoria = c.id
    JOIN usuarios u ON a.id_usuario = u.id 
    -- order coloca em order decrescente
    ORDER BY a.data_publicacao DESC";

    // Executa a QUERY na conexão que já foi estabelecida
    $resultado = $conexao -> query($sql);

    if ($resultado && $resultado->num_rows > 0){
        while ($anuncio = $resuldado -> fetch_assoc()) {
            echo "<div class='anuncio-card'>";
            // htmlspecialchars: protocolo de segurança (xsl) do login do usuario 
            echo "<h3>".htmlspecialchars($anuncio['titulo'])."</h3>";
            // number_format : formata o número para o real brasileiro
            echo "<p class='preco'>R$ ".number_format($anuncio['preco'], 2, ',',',')."</p>";
            echo "<p class='categoria'>". htmlspecialchars($anuncio['categoria_nome'])."</p>";

            // usamos nl2br() para que as quebras de linha na descrição sejam exibudas

            echo "<p>". nl2br(htmlspecialchars($anuncio['descricao'])) . "</p>";
            echo "<small> Publicado por: ". htmlspecialchars($anuncio['usuario_nome']). "</small>";
            echo "</div>";
        }
    }else{
        echo "<p> Nenhum anúncio encontrado.</p>"; 
    }
    ?>
</div>
<?php 
// Inclui o footer.php no final para fechar as tags html e a conexão com o banco de dados
include_once('footer.php');
?>