<?php
?>
<!doctype html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <title>Criar Currículo</title>

  
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">

  
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body class="bg-light">
<div class="container py-4">
  <h1>Criar Currículo</h1>
  <form method="post" action="gerar_curriculo.php">
    <div class="mb-3">
      <label class="form-label">Nome</label>
      <input name="nome" class="form-control" required>
    </div>

    <div class="row g-3 mb-3">
      <div class="col-md-4">
        <label class="form-label">Data de Nascimento</label>
        <input type="date" name="data_nascimento" class="form-control">
      </div>
      <div class="col-md-2">
        <label class="form-label">Idade</label>
        <input name="idade" id="idade" class="form-control" readonly>
      </div>
      <div class="col-md-3">
        <label class="form-label">Email</label>
        <input name="email" class="form-control" type="email">
      </div>
      <div class="col-md-3">
        <label class="form-label">Telefone</label>
        <input name="telefone" class="form-control">
      </div>
    </div>

    <h5>Experiência (exemplo)</h5>
    <div class="mb-3">
      <input name="empresa[]" placeholder="Empresa" class="form-control mb-1">
      <input name="cargo[]" placeholder="Cargo" class="form-control mb-1">
      <textarea name="descricao[]" placeholder="Descrição" class="form-control"></textarea>
    </div>

    <h5>Formação (exemplo)</h5>
    <div class="mb-3">
      <input name="instituicao[]" placeholder="Instituição" class="form-control mb-1">
      <input name="curso[]" placeholder="Curso" class="form-control mb-1">
      <input name="ano[]" placeholder="Ano" class="form-control mb-1">
    </div>

    <h5>Referência (exemplo)</h5>
    <div class="mb-3">
      <input name="nome_ref[]" placeholder="Nome" class="form-control mb-1">
      <input name="contato_ref[]" placeholder="Contato" class="form-control mb-1">
      <input name="relacao_ref[]" placeholder="Relação" class="form-control mb-1">
    </div>

    <button class="btn btn-primary" type="submit">Gerar Currículo</button>
  </form>
</div>

<script>
document.querySelector('input[name="data_nascimento"]').addEventListener('change', function(e){
  const v = e.target.value;
  if(!v) return document.getElementById('idade').value = '';
  const b = new Date(v);
  const t = new Date();
  let years = t.getFullYear() - b.getFullYear();
  const m = t.getMonth() - b.getMonth();
  if (m < 0 || (m === 0 && t.getDate() < b.getDate())) years--;
  document.getElementById('idade').value = years;
});
</script>
</body>
</html>