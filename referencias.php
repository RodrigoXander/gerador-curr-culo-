<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Referências Pessoais</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
  <script src="assets/js/script.js" defer></script>
  <script>
    document.addEventListener("DOMContentLoaded", () => {
      const botao = document.getElementById("btnGerar");
      if (botao) botao.innerText = "Gerar Currículo";
    });
  </script>
</head>
<body class="bg-light">

<div class="container mt-5">

  <h2>Referências Pessoais</h2>
  <form action="gerar_curriculo.php" method="post">
    <div id="referencias">
      <div class="referencia mb-4">
        <input type="text" name="nome_ref[]" class="form-control mb-2" placeholder="Nome">
        <input type="text" name="contato_ref[]" class="form-control mb-2" placeholder="Contato">
        <input type="text" name="relacao_ref[]" class="form-control" placeholder="Relação">
      </div>
    </div>

    <button type="button" class="btn btn-secondary mb-3" onclick="adicionarReferencia()">+ Adicionar Referência</button>
    <br>

    <button type="submit" id="btnGerar" class="btn btn-success">Gerar Currículo</button>
  </form>
</div>

</body>
</html>