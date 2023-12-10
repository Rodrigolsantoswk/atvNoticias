<?php
    include "../conexao/conexao.php";
    $titulo = $_POST['titulo'];
    $texto = $_POST['texto'];
    echo $texto;

    $diretorio="../imgs";
	$total=0;
    //Verifica se o diretório da imagem é realmente um diretório
    if(!is_dir($diretorio)){
		die("Diretório '$diretorio' não existe.");
		exit();
	}else{
        $arquivo= isset($_FILES['imagemNoticia']) ? $_FILES['imagemNoticia'] : FALSE; 
        //Objeto _UP contendo todos os parametros de upload
        $_UP['pasta'] = $diretorio; //Dir
        $_UP['tamanho'] = 1024*1024*15; //tamanho máximo 15mb
        $_UP['extensao'] = array('png', 'jpg', 'jpeg'); //extensões permitidas
        $_UP['renomeia']=true; //true = renomeia o arquivo aleatoriamente.
        $_UP['erros'][0]= 'Não houveram erros.';
        $_UP['erros'][1] = 'O arquivo no upload é maior que o limite permitido. (PHP)';
        $_UP['erros'][2] = 'O arquivo no upload é maior que o limite permitido. (HTML)';
        $_UP['erros'][3] = 'O upload do arquivo foi feito parcialmente';
        $_UP['erros'][4] = 'Não foi feito o upload do arquivo';
        if($arquivo['error'] !=0){
            die("Não foi possível fazer o upload da imagem. Erro: ". $_UP['erros'][$arquivo['error'][$i]]);
            exit();
        }
        //Verificando se a extensão está dentro do requisitdado no objeto _UP.
        $explode= explode('.', $arquivo['name']);
        $extensao= strtolower(end($explode));
        if(array_search($extensao, $_UP['extensao']) === false){
            die("Extensão não corresponde ao requisitado.");
            exit();
        //Verificando se o tamanho é menor que o requisitado. 
        }else if($_UP['tamanho'] < $arquivo['size']){
            die("Tamanho da imagem muito grande"); 
            exit();
        }
        $nomeFinal= time().".". $extensao;
        sleep(2);
        //$nomeFinal= $arquivo['name'];
        $destino = $diretorio."/".$nomeFinal;
        //$destino = $diretorio."/".$arquivo['name'];
        if(move_uploaded_file($arquivo['tmp_name'], $destino)){
            echo "upload realizado com sucesso <br>";
            //inserindo notícia no banco de dados:
            $query = "INSERT INTO noticia(TituloNoticia, ConteúdoNoticia, ImagemNoticia) VALUES (?,?,?)";
            $stmt = $conexao->prepare($query);
            $stmt->bind_param("sss", $titulo, $texto, $nomeFinal);
            $stmt->execute();
            mysqli_close($conexao);
            header("location: ../pagina/PublicarNoticia.php?msg=2");
        }else{
            die("Erro ao fazer Upload do arquivo");
            exit();
        }
    }  
?>