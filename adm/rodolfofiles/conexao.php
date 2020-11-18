<?php
//conexao
$conexao = new mysqli("localhost", "root", "usbw", "biblioteca");
if(!$conexao){
    echo "Problemas com a conexão";
}
// Editora
function CadastrarEditora($nome){
    $sql = 'INSERT INTO tb_editora VALUES(null,"'.$nome.'")';
    $res = $GLOBALS['conexao']->query($sql);
    if($res){
        alert("Editora Cadastrada com sucesso");
    }else{
        alert("Erro ao cadastrar Editora");
    }
}
function ListarEditora($cd){
    $sql = 'SELECT * FROM tb_editora ';
    if($cd>0){
        $sql.=' WHERE cd_editora='.$cd;
    }
    $res = $GLOBALS['conexao']->query($sql);
    return $res;
}
function ExcluirEditora($cd){
    $sql = 'DELETE FROM tb_editora WHERE cd_editora='.$cd;
    $res = $GLOBALS['conexao']->query($sql);
    if($res){
        alert("Editora Excluida com sucesso");
    }else{
        alert("Erro ao excluir Editora");
    }
}
function AtualizarEditora($cd,$nome){
    $sql = 'UPDATE tb_editora SET nm_editora="'.$nome.'" WHERE cd_editora='.$cd;
    $res = $GLOBALS['conexao']->query($sql);
    if($res){
        alert("Editora Atualizada com sucesso");
    }else{
        alert("Erro ao atualizar Editora");
    }
}

// ------------------ Editora ---------------------------

//--------------- funcoes -----------------//
function alert($texto){
    echo '<script>
            alert("'.$texto.'");
         </script>';
}