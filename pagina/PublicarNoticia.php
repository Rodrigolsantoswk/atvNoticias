<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Noticias</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script> 
    <script src="https://cdn.quilljs.com/1.3.6/quill.image.js"></script>

</head>
<style>
    section {
        display: flex;
        align-items: center;
        justify-content: center; /* Centraliza horizontalmente */
    }
</style>
<body>
<header>
    <h1>Noticias Urgentes</h1>
    <nav>
        <ul>
            <li><a href="../index.php">Home</a></li>
            <li><a href="#">Política</a></li>
            <li><a href="#">Esportes</a></li>
            <li><a href="#">Entretenimento</a></li>
            <li><a href="#">Publicar</a></li>
        </ul>
    </nav>
</header>

<section>
    <form action="../php/enviarNoticia.php" id="formNoticia" name="formNoticia" method="POST" enctype="multipart/form-data">
        <label for="titulo">Título da notícia:</label><br>
        <input type="text" name="titulo" placeholder="Título da notícia" maxlength="50" autofocus="" maxlength="256"><br>

        <label for="texto">Conteúdo da notícia:</label><br>
        <div id="editor" style="height: 300px;"></div>
        <input type="text" id="texto" name="texto"> <!-- Campo oculto para armazenar o conteúdo do Quill -->

        <label for="imagemNoticia">Imagem da notícia: </label><br>
        <input type="file" name="imagemNoticia"><br><br>

        <button type="submit" id="btn" class="btn btn-primary" name="submit" value="enviar">Enviar</button>
    </form>
</section>
<br><br>
<footer>
    <p>&copy; 2023 Noticias Urgentes. Todos os direitos reservados.</p>
</footer>
<script src="../JS/quillInitializer.js"></script>
</body>
</html>
