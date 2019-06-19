<div class="row">
  <div class="col-md-7">
    <fieldset class="form-group">
      <label for="descricao">Descrição <i class="text-danger">*</i></label>
      <input id="descricao" type="text" class="form-control" name="descricao" required>
    </fieldset>
  </div>
  <div class="col-md-5">
    <fieldset class="form-group">
      <label for="preco">Preço <i class="text-danger">*</i></label>
      <div class="row">
        <div class="col-lg-6">
          <div class="input-group">
            <span class="input-group-btn">
              <button class="btn btn-secondary" type="button">R$</button>
            </span>
            <input id="preco" type="text" class="form-control"name="preco" required>
          </div>
        </div>
      </div>
      <script type="text/javascript">
        $(document).ready(function() {
          $('#preco').mask('0000.00', {reverse:'true'});
        });
      </script>
    </div>
  </fieldset>
</div>
