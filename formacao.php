<?php
session_start();

function esc($v) { return htmlspecialchars($v ?? '', ENT_QUOTES, 'UTF-8'); }

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $_SESSION['instituicao'] = $_POST['instituicao'];
  $_SESSION['curso'] = $_POST['curso'];
  $_SESSION['ano'] = $_POST['ano'];

  header('Location: referencias.php');
  exit;
}

// Recupera dados da sessão (ou inicia com campos vazios)
$instituicoes = $_SESSION['instituicao'] ?? [''];
$cursos = $_SESSION['curso'] ?? [''];
$anos = $_SESSION['ano'] ?? [''];

// Garante que os arrays tenham o mesmo tamanho
$total = max(count($instituicoes), count($cursos), count($anos));
$instituicoes = array_pad($instituicoes, $total, '');
$cursos = array_pad($cursos, $total, '');
$anos = array_pad($anos, $total, '');
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Formação Acadêmica</title>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/style.css">

  <script>
    function adicionarFormacao() {
      const container = document.getElementById('formacoes');
      const div = document.createElement('div');
      div.classList.add('formacao', 'mb-4');
      div.innerHTML = `
        <input type="text" name="instituicao[]" class="form-control mb-2" placeholder="Instituição">
        <input type="text" name="curso[]" class="form-control mb-2" placeholder="Curso">
        <input type="text" name="ano[]" class="form-control" placeholder="Ano de conclusão">
      `;
      container.appendChild(div);
    }
  </script>
</head>
<body class="bg-light">

<div class="container mt-5">
  <h2>Formação Acadêmica</h2>
  <form method="post">
    <div id="formacoes">
      <?php for ($i = 0; $i < $total; $i++): ?>
        <div class="formacao mb-4">
          <input type="text" name="instituicao[]" class="form-control mb-2"
                 placeholder="Instituição" value="<?= esc($instituicoes[$i]) ?>">
          <input type="text" name="curso[]" class="form-control mb-2"
                 placeholder="Curso" value="<?= esc($cursos[$i]) ?>">
          <input type="text" name="ano[]" class="form-control"
                 placeholder="Ano de conclusão" value="<?= esc($anos[$i]) ?>">
        </div>
      <?php endfor; ?>
    </div>

    <button type="button" class="btn btn-secondary mb-3" onclick="adicionarFormacao()">+ Adicionar Formação</button><br>

    <div class="d-flex justify-content-between">
      <a href="experiencias.php" class="btn btn-outline-secondary">Voltar</a>
      <button type="submit" class="btn btn-primary">Próximo</button>
    </div>
  </form>
</div>

</body>
</html>