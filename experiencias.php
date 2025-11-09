<?php
session_start();

function esc($v) { return htmlspecialchars($v ?? '', ENT_QUOTES, 'UTF-8'); }

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $_SESSION['empresa'] = $_POST['empresa'];
  $_SESSION['cargo'] = $_POST['cargo'];
  $_SESSION['descricao'] = $_POST['descricao'];

  header('Location: formacao.php');
  exit;
}

// Recupera valores já salvos
$empresas = $_SESSION['empresa'] ?? [''];
$cargos = $_SESSION['cargo'] ?? [''];
$descricoes = $_SESSION['descricao'] ?? [''];

// Garante que os arrays tenham o mesmo tamanho
$total = max(count($empresas), count($cargos), count($descricoes));
$empresas = array_pad($empresas, $total, '');
$cargos = array_pad($cargos, $total, '');
$descricoes = array_pad($descricoes, $total, '');
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Experiências Profissionais</title>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/style.css">

  <script>
    function adicionarExperiencia() {
      const container = document.getElementById('experiencias');
      const div = document.createElement('div');
      div.classList.add('experiencia', 'mb-4');
      div.innerHTML = `
        <input type="text" name="empresa[]" class="form-control mb-2" placeholder="Empresa">
        <input type="text" name="cargo[]" class="form-control mb-2" placeholder="Cargo">
        <textarea name="descricao[]" class="form-control" placeholder="Descrição das atividades"></textarea>
      `;
      container.appendChild(div);
    }
  </script>
</head>
<body class="bg-light">

<div class="container mt-5">
  <h2>Experiências Profissionais</h2>
  <form method="post">
    <div id="experiencias">
      <?php for ($i = 0; $i < $total; $i++): ?>
        <div class="experiencia mb-4">
          <input type="text" name="empresa[]" class="form-control mb-2"
                 placeholder="Empresa" value="<?= esc($empresas[$i]) ?>">
          <input type="text" name="cargo[]" class="form-control mb-2"
                 placeholder="Cargo" value="<?= esc($cargos[$i]) ?>">
          <textarea name="descricao[]" class="form-control"
                    placeholder="Descrição das atividades"><?= esc($descricoes[$i]) ?></textarea>
        </div>
      <?php endfor; ?>
    </div>

    <button type="button" class="btn btn-secondary mb-3" onclick="adicionarExperiencia()">+ Adicionar Experiência</button><br>

    <div class="d-flex justify-content-between">
      <a href="dados.php" class="btn btn-outline-secondary">Voltar</a>
      <button type="submit" class="btn btn-primary">Próximo</button>
    </div>
  </form>
</div>

</body>
</html>