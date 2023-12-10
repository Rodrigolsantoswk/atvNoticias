<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Noticias</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<?php
    include 'conexao/conexao.php';
    $query = "SELECT * FROM noticia ORDER BY 1 DESC";
    $result= mysqli_query($conexao, $query) or die(mysqli_error());
    mysqli_close($conexao);
?>
<body>
<header>
        <h1>Noticias Urgentes</h1>
        <nav>
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">Política</a></li>
                <li><a href="#">Esportes</a></li>
                <li><a href="#">Entretenimento</a></li>
                <li><a href="pagina/publicarNoticia.php">Publicar</a></li>
            </ul>
        </nav>
    </header>
    <section class="main-content">
        <?php
            while($row = mysqli_fetch_assoc($result)){
        ?>
                <article>
                    <h1><?= $row['TituloNoticia']?></h1>
                    <img src="imgs/<?= $row['ImagemNoticia'] ?>" alt="Imagem da Noticia" width="500px">
                    <p><?= $row['ConteúdoNoticia'] ?></p>
                </article>
        <?php 
            } 
        ?>
    </section>
    <br>
    <footer>
        <p>&copy; 2023 Noticias Urgentes. Todos os direitos reservados.</p>
    </footer>
</body>
</html>