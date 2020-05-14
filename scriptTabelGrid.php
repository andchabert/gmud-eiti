<!--
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
</script>-->


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