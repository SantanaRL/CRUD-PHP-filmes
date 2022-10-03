<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <title>Document</title>
    <style>
        .item_filme{
            text-align:center;
            padding: 2px;
            width: 400px;
            margin:auto;
            margin-bottom: 5px;
            margin-top: 10px;
        }
        .item_filme input{
            margin:auto;
            width:auto;
        }
        .aaa{
            display: block;
            margin: auto;
            padding: 0;
        }
    </style>
    <?php 
        $nome = "";
        $ano = 0;
        $genero = "";
        $faixaetaria = 0;
        $atorPrincipal = "";
        $diretor = "";
        $roterista = "";
        function esvasia(){
            $nome = "";
            $ano = 0;
            $genero = "";
            $faixaetaria = 0;
            $atorPrincipal = "";
            $diretor = "";
            $roterista = "";
        }
        include('conection.php');

        if (array_key_exists("envio",$_POST)) {
            if ($_POST["envio"]== "Buscar") {
                $nm_busca = $_POST["buscafilme"];
                $consultar = "select * from filme where nome like '%$nm_busca%'";
                $execultar = mysqli_query($conn,$consultar);
                $resultado = mysqli_fetch_array($execultar);
                if ($resultado != null) {
                    $nome = $resultado["nome"];
                    $ano = $resultado["ano"];
                    $genero = $resultado["genero"];
                    $faixaetaria = $resultado["faixa_etaria"];
                    $atorPrincipal = $resultado["estrela"];
                    $diretor = $resultado["diretor"];
                    $roterista = $resultado["roterista"];
                }else {
                    # code...
                }
                
            }
            if ($_POST["envio"]== "Adicionar") {
                $nome = $_POST["nome_filme"];
                $ano = $_POST["ano_filme"] ;
                $genero = $_POST["genero_filme"];
                $faixaetaria = $_POST["faixaetaria_filme"] ;
                $atorPrincipal = $_POST["atorPrincipal_filme"] ;
                $diretor = $_POST["diretor_filme"] ;
                $roterista = $_POST["roterista_filme"];
                $sql="insert into filme values(default,'$nome',$ano,'$genero','$diretor',$faixaetaria,'$atorPrincipal','$roterista')";
                $query = mysqli_query($conn,$sql);
                    
                    
                echo "<meta http-equiv='refresh' content='0'>";
            }
            
        }
    ?>
</head>
<body>
    <div class="container p-5">
        <h1 class="text-center">Titulo</h1>
        
        <form action="index.php" method="POST" class="border p-2 m-5">
            <div class="item_filme">
                <label for="nome_filme">nome</label>
                <input required type="text" name="nome_filme" value="<?php echo $nome?>">
            </div>
        
            <div class="item_filme">
                <label for="ano_filme">Ano</label>
                <input required type="number" name="ano_filme"  value="<?php echo $ano?>">
            </div>
            <div class="item_filme">
                <label for="genero_filme">gênero</label>
                <input required type="text" name="genero_filme"value="<?php echo $genero ?>">
            </div>
            <div class="item_filme">
                <label for="diretor_filme">diretor</label>
                <input required type="text" name="diretor_filme" value="<?php echo $diretor?>">
            </div>
            <div class="item_filme">
                <label for="faixaetaria_filme">faixa etária</label>
                <input required type="number" name="faixaetaria_filme" value="<?php echo $faixaetaria?>">
            </div>
            <div class="item_filme">
                <label for="atorPrincipal_filme">Estrela</label>
                <input required type="text" name="atorPrincipal_filme" value="<?php echo $atorPrincipal?>">
            </div>
            <div class="item_filme">
                <label for="roterista_filme">Roterista</label>
                <input required type="text" name="roterista_filme" value="<?php echo $roterista?>">
            </div>
            <div class="item_filme">
            <input name="envio" type="submit" value="Adicionar" class="btn btn-outline-dark d-inline m-auto">
            </div>
        </form>
        <form action="index.php" method="POST" class="item_filme">
        <div class="input-group mb-3">
            <label for="buscafilme" class="input-group-text">Digite o nome do filme</label>
            <input class="form-control" type="text" name="buscafilme" class="d-inline">
            <input type="submit" name="envio" value="Buscar" class="btn btn-primary d-inline">
            </div>
            <input name="envio" type="submit" value="Listar" class="btn btn-outline-dark d-inline m-auto">
        </form>
        <?php
            
            if (array_key_exists("envio",$_POST)) {
                if ($_POST["envio"]== "Remover os selecionados"){
                    foreach($_POST as $cod => $val){
                        if(is_int($cod)){
                            $sql="delete from filme where cod = $cod";
                            $query = mysqli_query($conn,$sql);
                        }
                    }
                }
            if($_POST["envio"]=="Listar"){
        ?>
        <form action="index.php" method="POST">
        <table class="table table-striped border border-dark">
        <thead>
        <tr>
            <th></th>
            <th scope="col">nome</th>
            <th scope="col">ano</e</th>
            <th scope="col">genero</th>
            <th scope="col">diretor</th>
            <th scope="col">faixa etaria</th>
            <th scope="col">estrela</th>
            <th scope="col">roterista</th>
        </tr>
        </thead>
        <tbody>
            <?php
            
                $consultar = "select * from filme";
                $execultar = mysqli_query($conn,$consultar);
                // cria uma nova linha para cada registro na tabela
                while($linha = mysqli_fetch_array($execultar)){
            ?>
            <tr>
                
                <th><input class="form-check-input mx-4" type="checkbox" name="<?php echo $linha["cod"]?>"></th>
                <th><?php echo $linha["nome"]?></th>
                <th><?php echo $linha["ano"]?></th>
                <th><?php echo $linha["genero"]?></th>
                <th><?php echo $linha["diretor"]?></th>
                <th><?php echo $linha["faixa_etaria"]?></th>
                <th><?php echo $linha["estrela"]?></th>
                <th><?php echo $linha["roterista"]?></th>
            </tr>
            <?php
            }
            ?>
            </tbody>
            </table>
                <input type="submit" class="btn btn-danger " name="envio" value="Remover os selecionados">
                </form>
            <?php
            }}
            ?>
        
    </div>
</body>
</html>