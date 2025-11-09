
document.addEventListener('DOMContentLoaded', () => {
  const dataInput = document.getElementById('data_nascimento');
  if (dataInput) {
    dataInput.addEventListener('change', () => {
      const nascimento = new Date(dataInput.value);
      const hoje = new Date();
      let idade = hoje.getFullYear() - nascimento.getFullYear();
      const m = hoje.getMonth() - nascimento.getMonth();
      if (m < 0 || (m === 0 && hoje.getDate() < nascimento.getDate())) idade--;
      document.getElementById('idade').value = idade;
    });
  }
});


function adicionarExperiencia() {
  const container = document.getElementById('experiencias');
  const bloco = document.createElement('div');
  bloco.classList.add('mb-4');
  bloco.innerHTML = `
    <input type="text" name="empresa[]" class="form-control mb-2" placeholder="Empresa">
    <input type="text" name="cargo[]" class="form-control mb-2" placeholder="Cargo">
    <textarea name="descricao[]" class="form-control" placeholder="Descrição"></textarea>
  `;
  container.appendChild(bloco);
}

function adicionarFormacao() {
  const container = document.getElementById('formacoes');
  const bloco = document.createElement('div');
  bloco.classList.add('mb-4');
  bloco.innerHTML = `
    <input type="text" name="instituicao[]" class="form-control mb-2" placeholder="Instituição">
    <input type="text" name="curso[]" class="form-control mb-2" placeholder="Curso">
    <input type="text" name="ano[]" class="form-control" placeholder="Ano de conclusão">
  `;
  container.appendChild(bloco);
}

function adicionarReferencia() {
  const container = document.getElementById('referencias');
  const bloco = document.createElement('div');
  bloco.classList.add('mb-4');
  bloco.innerHTML = `
    <input type="text" name="nome_ref[]" class="form-control mb-2" placeholder="Nome">
    <input type="text" name="contato_ref[]" class="form-control mb-2" placeholder="Contato">
    <input type="text" name="relacao_ref[]" class="form-control" placeholder="Relação">
  `;
  container.appendChild(bloco);
}
