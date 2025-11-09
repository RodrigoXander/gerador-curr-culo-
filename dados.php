<?php
session_start();

function esc($v) { return htmlspecialchars($v ?? '', ENT_QUOTES, 'UTF-8'); }

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $_SESSION['nome'] = $_POST['nome'];
  $_SESSION['data_nascimento'] = $_POST['data_nascimento'];
  $_SESSION['idade'] = $_POST['idade'];
  $_SESSION['email'] = $_POST['email'];
  $_SESSION['telefone'] = $_POST['telefone'];

  header('Location: experiencias.php');
  exit;
}

$nome = $_SESSION['nome'] ?? '';
$data_nascimento = $_SESSION['data_nascimento'] ?? '';
$idade = $_SESSION['idade'] ?? '';
$email = $_SESSION['email'] ?? '';
$telefone = $_SESSION['telefone'] ?? '';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Dados Pessoais</title>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/style.css">

  <script>
    function calcularIdade() {
      const data = document.getElementById('data_nascimento').value;
      if (!data) return;
      const hoje = new Date();
      const nasc = new Date(data);
      let idade = hoje.getFullYear() - nasc.getFullYear();
      const m = hoje.getMonth() - nasc.getMonth();
      if (m < 0 || (m === 0 && hoje.getDate() < nasc.getDate())) idade--;
      document.getElementById('idade').value = idade;
    }
  </script>
</head>
<body class="bg-light">

<div class="container mt-5">
  <h2>Dados Pessoais</h2>
  <form method="post">
    <div class="mb-3">
      <label>Nome completo:</label>
      <input type="text" name="nome" class="form-control" value="<?= esc($nome) ?>" required>
    </div>

    <div class="mb-3">
      <label>Data de nascimento:</label>
      <input type="date" name="data_nascimento" id="data_nascimento" class="form-control"
             value="<?= esc($data_nascimento) ?>" onchange="calcularIdade()" required>
    </div>

    <div class="mb-3">
      <label>Idade:</label>
      <input type="text" name="idade" id="idade" class="form-control" value="<?= esc($idade) ?>" readonly>
    </div>

    <div class="mb-3">
      <label>Email:</label>
      <input type="email" name="email" class="form-control" value="<?= esc($email) ?>" required>
    </div>

    <div class="mb-3">
      <label>Telefone:</label>
      <input type="text" name="telefone" class="form-control" value="<?= esc($telefone) ?>" required>
    </div>

    <button type="submit" class="btn btn-primary">Próximo</button>
  </form>
</div>

<script>
  // Atualiza idade automaticamente ao recarregar, caso haja data salva
  window.addEventListener('load', calcularIdade);
</script>

</body>
</html>