<table class="table">
  <tr>
    <td>Nome</td>
    <td> <input class="form-control" type="text" name="nome" value="<?=$produto->getNome()?>"></td>
  </tr>
  <tr>
    <td>Preço</td>
    <td><input  class="form-control" type="number" name="preco" value="<?=$produto->getPreco()?>"></td>
  </tr>
  <tr>
    <td>Descrição</td>
    <td><textarea class="form-control" name="descricao"><?=$produto->getDescricao()?></textarea></td>
  </tr>
  <tr>
  <td>Categoria</td>
  <td>
      <select name="categoria_id" class="form-control">
      <?php
          foreach($categorias as $categoria) :
              $essaEhACategoria = $produto->getCategoria()->getId() == $categoria->getId();
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
    <td>Foto Jogo</td>
    <td><input class="form-control" type="file" name="foto" /></td>
  </tr>
  <div>
    <table class="table">
      <tr>
        <td><input type="checkbox" name="catalogo" <?=$produto->getUsado()?> value="true"> Meu catalogo</td>
        <td><input type="checkbox" name="troca" <?=$produto->getUsado()?> value="true"> Para trocar</td>
        <td><input type="checkbox" name="desejo" <?=$produto->getUsado()?> value="true"> Meu desejo</td>
        <td></td>
      </tr>
