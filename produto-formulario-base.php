<table class="table">
  <tr>
    <td>Motivo da solicitação</td>
    <td> <input class="form-control" type="text" name="nome" value="<?=$produto->getNome()?>"></td>
  </tr>
  <tr>
    <td>
    <div class="input-group">
        <div class="input-group-prepend">
        <span class="input-group-text">Data / hora inicio / hora fim</span>
        </div>
    </td>
    <td>
  <input class="form-control" type="date" name="data" value="<?=$produto->getData()?>">
  <input class="form-control" type="time"name="hinicio" value="<?=$produto->getHinicio()?>">
  <input class="form-control" type="time" name="hfim" value="<?=$produto->getHfim()?>">
    </td>
    </div>    
  </tr>
  <tr>
    <td>Justificativa da solicitação</td>
    <td><input  class="form-control" type="text" name="justificativa" value="<?=$produto->getJustificativa()?>"></td>
  </tr>
  <tr>
    <td>Descrição da solicitação</td>
    <td><textarea class="form-control" name="descricao"><?=$produto->getDescricao()?></textarea></td>
  </tr>
  <tr>
    <td>Riscos envolvidos na mudança</td>
    <td><textarea class="form-control" name="riscos"><?=$produto->getRiscos()?></textarea></td>
  </tr>

<tr>
  <td><div class="form-check">
  <input class="form-control" type="checkbox" value="">
  <td><label>Indisponibilidade (downtime)</label></td>
</tr>

<tr>
<td><div class="form-check">
  <input class="form-control" type="checkbox" value="" >
  <td><label >intermitência</label></td>
</div>
</tr>

<tr>
<td><div class="form-check">
  <input class="form-control" type="checkbox" name="usado" <?=$produto->getUsado()?> value="true">
<td><label  for="defaultCheck3">Alteração no ambiente</label></td>
</div>
</tr>

<tr>
    <td>Plano de rollback</td>
    <td><textarea class="form-control" name="riscos"><?=$produto->getRiscos()?></textarea></td>
</tr>

  <tr>
    <td>Fila do OTRS</td>
    <td><input  class="form-control" type="text" name="ticket" value="<?=$produto->getCliente()?>"></td>
  </tr>

<tr>
<td><div class="form-check">
  <input class="form-control" type="checkbox" id="otrs" name="orts" <?=$produto->getTicket()?> value="true" onclick="myFunction()">
  <td><label >Já tem ticket no OTRS</label></td>
</div>
</tr>

  <script>
function myFunction() {
  var checkBox = document.getElementById("otrs");
  var text = document.getElementById("nrticket");
  var label = document.getElementById("label");
  if (checkBox.checked == true){
    text.style.display = "block";
    label.style.display = "block";
  } else {
     text.style.display = "none";
     label.style.display = "none";
  }
}
</script>
  <tr>
    <td><label style="display:none" id="label">Ticket no OTRS</label></td>
    <td><input style="display:none" class="form-control"  type="text" id="nrticket" name="nrticket" value="<?=$produto->getNrticket()?>"></td>
  </tr>

  <tr>
    <td>
    <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8"><h2>Steps <b>GMUD</b></h2></div>
                    <div class="col-sm-4">
                        <button type="button" class="btn btn-info add-new"><i class="fa fa-plus"></i> Novo Step</button>
                    </div>
                </div>
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Step</th>
                        <th>Detalhes</th>
                        <th>Tempo</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Backup do firewall</td>
                        <td>Add no sharepoint do cliente</td>
                        <td>15 min</td>
                        <td>
							<a class="add" title="Add" data-toggle="tooltip"><i class="material-icons">&#xE03B;</i></a>
                            <a class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                            <a class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>
                        </td>
                    </tr>
                    <tr>
                        <td>Avisar incio downtime</td>
                        <td>Informar o inicio do downtime</td>
                        <td>15 min</td>
                        <td>
							<a class="add" title="Add" data-toggle="tooltip"><i class="material-icons">&#xE03B;</i></a>
                            <a class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                            <a class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>  
  </td> 
  </tr>

  <tr>
  <td>E-mail para aprovação interno</td>
  <td>
      <select name="categoria_id" class="form-control">
 <!--     <?php
  ///       foreach($categorias as $categoria) :
  //          $essaEhACategoria = $produto->getEmail()->getId() == $categoria->getId();
  //            $selecao = $essaEhACategoria ? "selected='selected'" : "";
 //       ?>
 //          <option value="<?//=$categoria->getId()?>" <?//=$selecao?>>
 //                 <?//=$categoria->getNome()?>
            </option>
       <?php //endforeach ?> 
-->
      </select>
  </td>
</tr>
<tr>
  <td>E-mail para aprovação cliente</td>
  <td>
      <select name="categoria_id" class="form-control">
      <?php
          foreach($categorias as $categoria) :
              $essaEhACategoria = $produto->getEmail()->getId() == $categoria->getId();
              $selecao = $essaEhACategoria ? "selected='selected'" : "";
        ?>
            <option value="<?=$categoria->getId()?>" <?=$selecao?>>
                  <?=$categoria->getNome()?>
            </option>
      <?php endforeach ?>
      </select>
  </td>
</tr>
<tr>
    <div class="input-group mb-3">
  <div class="input-group-prepend">
    <td>
      <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
    <td>  
    </div>
  <div class="custom-file">
    <input type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
    <label class="custom-file-label" for="inputGroupFile01"></label>
  </div>
  </div>
  </td>
  </tr>
<tr>
    <td>E-mail apoio e informativo</td>
    <td><input type="text" name="notificados"  class="form-control" value="" placeholder="lista de e-mail separar com ;"></td> 
</tr>

<!--
<tr>
  <td>Urgência x Impacto</td>
<td>
<table class="table-teste table-bordered" style="width:400px" >
  <thead>
    <tr>
      <th scope="col">U / I</th>
      <th scope="col">Alta</th>
      <th scope="col">Media</th>
      <th scope="col">Baixa</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">Alta</th>
      <td bgcolor="#FA5858"><button type="button" style="background-color:#FA5858;border:none;" value="<?=$produto->getNivel()?>">1</button></td>
      <td bgcolor="#F4FA58"><button type="button" style="background-color:#F4FA58;border:none;" value="<?=$produto->getNivel()?>">2</button></td>
      <td bgcolor="#F4FA58"><button type="button" style="background-color:#F4FA58;border:none;" value="<?=$produto->getNivel()?>">3</button></td>
    </tr>
    <tr>
      <th scope="row">Media</th>
      <td bgcolor="#F4FA58"><button type="button" style="background-color:#F4FA58;border:none;" value="<?=$produto->getNivel()?>">2</button></td>
      <td bgcolor="#F4FA58"><button type="button" style="background-color:#F4FA58;border:none;" value="<?=$produto->getNivel()?>">3</button></td>
      <td bgcolor="#64FE2E"><button type="button" style="background-color:#64FE2E;border:none;" value="<?=$produto->getNivel()?>">4</button></td>
    </tr>
    <tr>
      <th scope="row">Baixa</th>
      <td bgcolor="#F4FA58"><button type="button" style="background-color:#F4FA58;border:none;" value="<?=$produto->getNivel()?>">3</button></td>
      <td bgcolor="#64FE2E"><button type="button" style="background-color:#64FE2E;border:none;" value="<?=$produto->getNivel()?>">4</button></td>
      <td bgcolor="#2E64FE"><button type="button" style="background-color:#2E64FE;border:none;" value="<?=$produto->getNivel()?>">5</button></td>
          </td>
    </tr>
    <tr>
  </tbody>
</table>
          -->


