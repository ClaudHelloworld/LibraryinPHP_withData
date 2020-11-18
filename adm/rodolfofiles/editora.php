<?php
    include('conexao.php');
    if(isset($_GET['editora'])){
        $registro = ListarEditora($_GET['editora']);
        $editora = $registro->fetch_array();
        echo json_encode($editora);
    }else{
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Sistema de Biblioteca</title>
         <!-- Bootstrap -->
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <!-- Meu style -->
        <link rel="stylesheet" href="../css/style.css">
    </head>
    <body>
        <div class="wrapper">           
            <?php
                include('menu.php');
            ?>
                <div id="content">
                    <nav class="navbar navbar-default" id="menu">
                        <div class="container-fluid">
                            <div class="navbar-header">
                                <button type="button" id="btn" class="btn btn-info navbar-btn">
                                   <i class="fas fa-align-left"></i>
                                    <span id="botao">Menu</span>
                                </button>
                            </div>
                            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                                <ul class="nav navbar-nav navbar-right">
                                    <li><a href="#" id="a1">Pagina 1</a></li>
                                    <li><a href="#" id="a2">Pagina 2</a></li>
                                    <li><a href="#">Pagina 3</a></li>
                                    <li><a href="#">Pagina ..</a></li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                    <h2 class="text-center">Gerenciador de Editoras</h2>

                    <h2 id="titulo2">Nova Editora</h2>
                    <div class="titulo2"> 
                        <form action="" method="post" id="cadastrar">
                            <input type="hidden" name="cd" value="" id="cd">
                            <label for="nome">Nome da Editora</label>
                            <input type="text" name="nome" id="nome">
                            <button type="submit">Cadastrar</button>
                        </form>
                        <span>
                    <?php
                        if($_POST){
                            if($_POST['cd'] == ""){
                                CadastrarEditora($_POST['nome']);
                            }else{
                                AtualizarEditora($_POST['cd'],$_POST['nome']);
                            }
                        }
                    ?>
                        </span>
                    </div>
                    <div class="line"></div>
                    <h2>Lista de Editoras</h2>
                    
                    <table border="1">
                        <thead>
                            <tr>
                                <td>Cód.</td>
                                <td>Nome</td>
                                <td>#</td>
                            </tr>
                        </thead>
                        <tbody>
            <?php
            if(isset($_GET['excluir']))
                    ExcluirEditora($_GET['excluir']);

            $registros = ListarEditora(0);
            while($editora = $registros->fetch_array()){
                echo '<tr>
                        <td>'.$editora['cd_editora'].'</td>
                        <td>'.$editora['nm_editora'].'</td>
                        <td>
                        <button class="editar" value="'.$editora['cd_editora'].'">
                        Editar 
                        </button>
                        <a href="?excluir='.$editora['cd_editora'].'">
                            Excluir
                        </a>
                        </td>
                    </tr>';
            }
            ?>
                        </tbody>
                    </table>
                  
                    <div class="line"></div>
                    <h2>Titulo 3</h2>
                    <p> asdasd asdasdasdas dasd asd asd asd as asd asdasdasd asd as dasdasdas dasdasdasdas
                    asdasdasda asdasdasd asd asd asdasd as dasdasd  asdasd asd asdsdas ads sdsdasasdasdasd asd as dasdasdas dasdasdasdas asdasd as dasdasd  asdasd asd asdsdas ads sdsdas</p>
                </div>
        </div>
        <!-- fontawesome -->
        <script src="https://kit.fontawesome.com/8d210d7cb2.js" crossorigin="anonymous"></script>
        <!-- jQuery -->
        <script src="../js/jquery-1.12.0.min.js"></script>
        <!-- Bootstrap-->
        <script src="../js/bootstrap.min.js"></script>
        <script>
        $(document).on('click','.editar',function(){
            var cd = $(this).val();
            var url = 'http://localhost/biblioteca/adm/editora.php?editora='+cd;
            
            $.getJSON(url, function(retorno){
                $('#nome').val(retorno.nm_editora);
                $('#cd').val(retorno.cd_editora);
                $('#cadastrar button').html("Salvar");
            });
            
            //alternativa com js puro:
            // fetch(url).then((response) => {
            //  response.json().then((json) => {
            //       console.log(json.nm_editora)
            //     });
            // });
          
        });


        $(document).ready(function(){
            $('#btn').click(function(){
                $('#sidebar').toggleClass('active');
            });
            $('#titulo2').click(function(){
                $('.titulo2').slideToggle();
             });

           
        });
        </script>
         
    </body>
</html>
<?php
}
?>