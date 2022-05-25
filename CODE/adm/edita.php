<?php

include('../sql/sql.php');

$id = $_GET['id'];

$listar = $conexao->prepare("select * from chamados where id_chamado=?");
$listar->execute(array($id));
$linha = $listar->fetchAll(PDO::FETCH_OBJ);

foreach ($linha as $func) {  //a cada linha, ele percorre o banco de dados (a partir doq vc fatiou)
    $id = $func->id_chamado;
    $nomerua = $func->nrua;
    $numero = $func->numero;
    $referencial = $func->referencial;
    $detalhes = $func->detalhes;
    $imagem = $func->imagem;
    $status = $func->status;
?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <div class="container" style="width: 400px; margin-top: 100px;">
        <h4> Editar chamado </h4>
        <br>
        <form action="atualiza.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label>Nome da rua </label>
                <input value="<?php echo $nomerua ?>" type="text" name="nomerua" class="form-control" required autocomplete="off" placeholder="Nome da rua onde o problema se encontra">
            </div>
            <input type="number" class="form-control" name="id" value="<?php echo $id?>" style="display: none">
            <div class="form-group">
                <label>Numero </label>
                <input value="<?php echo $numero ?>" type="number" name="numero" class="form-control" required autocomplete="off" placeholder="Numero da casa">
            </div>
            <div class="form-group">
                <label> Referencia </label>
                <input value="<?php echo $referencial ?>" type="text" name="referencial" class="form-control" required autocomplete="off" placeholder="Uma referencia do local">
            </div>
            <div class="form-group">
                <label> detalhes: </label>
                <br>
                <div class="form-floating">
                    <input value="<?php echo $detalhes ?>" name="detalhes" class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></input>
                </div>
            </div>
            <br>
            <div class="form-group">
                <select class="form-select" name="status" aria-label="Default select example" onchange="muda(this);">
                    <option selected> Status atual: <?php echo $status ?></option>
                    <option value="Em análise">Em análise</option>
                    <option value="Em progresso">Em progresso</option>
                    <option value="Finalizado">Finalizado</option>
                </select>
            </div>
            <div class="form-group" id="caixa1" style="display: none;">
                <br> <label> Informações de fechamento: </label> <br>
                <div class="form-floating">
                    <textarea name="inf_fechamento" class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px" require></textarea>
                </div>
            </div>
            <br>
            <div style="text-align: right">
                <a class="btn btn-sm btn-primary" href="../menuadm.php">voltar</a>
                <button type="submit" class="btn btn-sm btn-success" id="button_att"> Atualizar </button>
            </div>
        
            <!-- Modal -->
            <div class="modal fade" id="modalExemplo<?php echo$id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Deseja realmente finalizar esse chamado?</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                Ao finalizar esse chamado não será mais possivel editar!
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                <button type="submit" class="btn btn-danger" id="button_att"> Finalizar </button>
                            </div>
                        </div>
                    </div>
            </div>
            
        </form>
    </div>

<?php } ?>

<script type='text/javascript'>

    function muda(obj){ 
        var index = obj.selectedIndex; 
        var option = obj.options[index].value; 
        if (option=='finalizado') { 
    			document.getElementById('caixa1').style.display="block";
                document.getElementById('button_att').setAttribute('type', 'button');
                document.getElementById('button_att').setAttribute("data-toggle", "modal");
                document.getElementById('button_att').setAttribute("data-target", "#modalExemplo<?php echo$id?>");

        }else
        if (option=='analise') { 
    			document.getElementById('caixa1').style.display="none"; 
                document.getElementById('button_att').setAttribute('type', 'submit');
                document.getElementById('button_att').removeAttribute("data-toggle");
                document.getElementById('button_att').removeAttribute("data-target");
    	} else
        if (option=='progresso') { 
    			document.getElementById('caixa1').style.display="none";
                document.getElementById('button_att').setAttribute('type', 'submit');
                document.getElementById('button_att').removeAttribute("data-toggle");
                document.getElementById('button_att').removeAttribute("data-target");
    	}
    }

</script>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>