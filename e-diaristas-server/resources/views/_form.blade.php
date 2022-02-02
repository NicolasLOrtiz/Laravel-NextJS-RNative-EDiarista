@csrf
<div class="mb-3">
    <label for="full_name" class="form-label">Nome completo</label>
    <input type="text" class="form-control" id="full_name" name="full_name" required maxlength="100" value="{{ @$professional->full_name }}">
</div>
<div class="mb-3">
    <label for="document" class="form-label">CPF</label>
    <input type="text" class="form-control" id="document" name="document" required maxlength="14" value="{{ @$professional->document }}">
</div>
<div class="mb-3">
    <label for="email" class="form-label">Email</label>
    <input type="email" class="form-control" id="email" name="email" required maxlength="100" value="{{ @$professional->email }}">
</div>
<div class="mb-3">
    <label for="phone" class="form-label">Telefone</label>
    <input type="text" class="form-control" id="phone" name="phone" required maxlength="15" value="{{ @$professional->phone }}">
</div>
<div class="mb-3">
    <label for="address" class="form-label">Logradouro</label>
    <input type="text" class="form-control" id="address" name="address" required maxlength="255" value="{{ @$professional->address }}">
</div>
<div class="mb-3">
    <label for="number" class="form-label">Número</label>
    <input type="text" class="form-control" id="number" name="number" required maxlength="20" value="{{ @$professional->number }}">
</div>
<div class="mb-3">
    <label for="complement" class="form-label">Complemento</label>
    <input type="text" class="form-control" id="complement" name="complement" maxlength="50" value="{{ @$professional->complement }}">
</div>
<div class="mb-3">
    <label for="zip_code" class="form-label">CEP</label>
    <input type="text" class="form-control" id="zip_code" name="zip_code" required maxlength="9" value="{{ @$professional->zip_code }}">
</div>
<div class="mb-3">
    <label for="neighborhood" class="form-label">Bairro</label>
    <input type="text" class="form-control" id="neighborhood" name="neighborhood" required maxlength="50" value="{{ @$professional->neighborhood }}">
</div>
<div class="mb-3">
    <label for="city" class="form-label">Cidade</label>
    <input type="text" class="form-control" id="city" name="city" required maxlength="50" value="{{ @$professional->city }}">
</div>
<div class="mb-3">
    <label for="state" class="form-label">Estado</label>
    <input type="text" class="form-control" id="state" name="state" required maxlength="2" value="{{ @$professional->state }}">
</div>

<div class="mb-3">
    <label for="avatar" class="form-label">Foto</label>
    <input type="file" class="form-control" id="avatar" name="avatar">
</div>

<button type="submit" class="btn btn-primary">Salvar</button>
