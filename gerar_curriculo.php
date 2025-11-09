<?php
session_start();

function esc($v) { return htmlspecialchars($v ?? '', ENT_QUOTES, 'UTF-8'); }

$nome = $_SESSION['nome'] ?? '';
$data_nascimento = $_SESSION['data_nascimento'] ?? '';
$idade = $_SESSION['idade'] ?? '';
$email = $_SESSION['email'] ?? '';
$telefone = $_SESSION['telefone'] ?? '';

$empresas = $_SESSION['empresa'] ?? [];
$cargos = $_SESSION['cargo'] ?? [];
$descricoes = $_SESSION['descricao'] ?? [];

$instituicoes = $_SESSION['instituicao'] ?? [];
$cursos = $_SESSION['curso'] ?? [];
$anos = $_SESSION['ano'] ?? [];

$nomes_ref = $_SESSION['nome_ref'] ?? [];
$contatos_ref = $_SESSION['contato_ref'] ?? [];
$relacoes_ref = $_SESSION['relacao_ref'] ?? [];
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Meu Currículo</title>

  
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">

  
  <link rel="stylesheet" href="assets/css/style.css">

  <style>
    @media print {
      button,
      .btn,
      .text-center.mt-3.mb-5 {
        display: none !important;
      }

      body {
        background: white !important;
      }

      #curriculo {
        margin-top: 0 !important;
        box-shadow: none !important;
      }
    }
  </style>
</head>
<body class="bg-light">

<div class="container mt-5 mb-5 p-4 bg-white shadow rounded" id="curriculo">
  <h1 class="text-center text-dark fw-bold mb-4">Currículo de <?= esc($nome) ?></h1>
  <hr>

  <section class="mb-4">
    <h3 class="text-secondary border-bottom pb-2">Dados Pessoais</h3>
    <p><strong>Nome:</strong> <?= esc($nome) ?></p>
    <p><strong>Data de Nascimento:</strong> <?= esc($data_nascimento) ?></p>
    <p><strong>Idade:</strong> <?= esc($idade) ?></p>
    <p><strong>Email:</strong> <?= esc($email) ?></p>
    <p><strong>Telefone:</strong> <?= esc($telefone) ?></p>
  </section>

  <section class="mb-4">
    <h3 class="text-secondary border-bottom pb-2">Experiências Profissionais</h3>
    <?php if (!empty($empresas)): ?>
      <ul class="list-unstyled">
        <?php foreach ($empresas as $i => $empresa): ?>
          <li class="mb-3">
            <strong><?= esc($empresa) ?></strong> — <?= esc($cargos[$i] ?? '') ?><br>
            <small class="text-muted"><?= esc($descricoes[$i] ?? '') ?></small>
          </li>
        <?php endforeach; ?>
      </ul>
    <?php else: ?>
      <p class="text-muted">Nenhuma experiência informada.</p>
    <?php endif; ?>
  </section>

  <section class="mb-4">
    <h3 class="text-secondary border-bottom pb-2">Formação Acadêmica</h3>
    <?php if (!empty($instituicoes)): ?>
      <ul class="list-unstyled">
        <?php foreach ($instituicoes as $i => $inst): ?>
          <li class="mb-2">
            <strong><?= esc($inst) ?></strong> — <?= esc($cursos[$i] ?? '') ?> (<?= esc($anos[$i] ?? '') ?>)
          </li>
        <?php endforeach; ?>
      </ul>
    <?php else: ?>
      <p class="text-muted">Nenhuma formação informada.</p>
    <?php endif; ?>
  </section>

  <section>
    <h3 class="text-secondary border-bottom pb-2">Referências</h3>
    <?php if (!empty($nomes_ref)): ?>
      <ul class="list-unstyled">
        <?php foreach ($nomes_ref as $i => $ref): ?>
          <li>
            <strong><?= esc($ref) ?></strong> — <?= esc($contatos_ref[$i] ?? '') ?> (<?= esc($relacoes_ref[$i] ?? '') ?>)
          </li>
        <?php endforeach; ?>
      </ul>
    <?php else: ?>
      <p class="text-muted">Nenhuma referência informada.</p>
    <?php endif; ?>
  </section>
</div>

<div class="text-center mt-3 mb-5">
  <button class="btn btn-primary btn-print" onclick="window.print()">Baixar Currículo (PDF)</button>
</div>

</body>
</html>