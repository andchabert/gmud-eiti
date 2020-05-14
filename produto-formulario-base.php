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

<!-- Button trigger modal 
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Launch demo modal
</button>-->

<!-- Modal 
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>-->

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

<script type="text/javascript">
$(document).ready(function(){
	$('[data-toggle="tooltip"]').tooltip();
	var actions = $("table td:last-child").html();
	// Append table with add row form on add new button click
    $(".add-new").click(function(){
		$(this).attr("disabled", "disabled");
		var index = $("table tbody tr:last-child").index();
        var row = '<tr>' +
            '<td><input type="text" class="form-control" name="name" id="name"></td>' +
            '<td><input type="text" class="form-control" name="department" id="department"></td>' +
            '<td><input type="text" class="form-control" name="phone" id="phone"></td>' +
			'<td>' + actions + '</td>' +
        '</tr>';
    	$("table").append(row);		
		$("table tbody tr").eq(index + 1).find(".add, .edit").toggle();
        $('[data-toggle="tooltip"]').tooltip();
    });
	// Add row on add button click
	$(document).on("click", ".add", function(){
		var empty = false;
		var input = $(this).parents("tr").find('input[type="text"]');
        input.each(function(){
			if(!$(this).val()){
				$(this).addClass("error");
				empty = true;
			} else{
                $(this).removeClass("error");
            }
		});
		$(this).parents("tr").find(".error").first().focus();
		if(!empty){
			input.each(function(){
				$(this).parent("td").html($(this).val());
			});			
			$(this).parents("tr").find(".add, .edit").toggle();
			$(".add-new").removeAttr("disabled");
		}		
    });
	// Edit row on edit button click
	$(document).on("click", ".edit", function(){		
        $(this).parents("tr").find("td:not(:last-child)").each(function(){
			$(this).html('<input type="text" class="form-control" value="' + $(this).text() + '">');
		});		
		$(this).parents("tr").find(".add, .edit").toggle();
		$(".add-new").attr("disabled", "disabled");
    });
	// Delete row on delete button click
	$(document).on("click", ".delete", function(){
        $(this).parents("tr").remove();
		$(".add-new").removeAttr("disabled");
    });
});
</script>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <td>Steps GMUD</td>
                        <td><button type="button" class="btn btn-info add-new">Novo Step</button></td>
                    </tr>
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

