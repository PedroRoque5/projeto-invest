<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Smarty Invest - Dashboard</title>

<!-- Bootstrap 5 -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<style>
body { background-color: #111; color: #fff; }
.card { background-color: #1c1c1c; border: none; color: #fff; }
.card h5 { color: #9ca3af; }
.navbar { background-color: #105f00; }
.navbar a { color: #fff !important; }
.table-dark th, .table-dark td { vertical-align: middle; }
footer { color: #9ca3af; }
.btn-success { background-color: #198754; border: none; }
.btn-success:hover { background-color: #157347; }
.btn-danger:hover { background-color: #b71c1c; }
</style>
</head>

<body>
  @include('cabecalho')


<div class="container my-5">

<!-- Cards -->
<div class="row g-4 text-center">
  <div class="col-md-3">
    <div class="card p-3">
      <h5>Patrimônio Total</h5>
      <h2 class="text-success fw-bold" id="patrimonioTotal">R$ 0,00</h2>
    </div>
  </div>
  <div class="col-md-3">
    <div class="card p-3">
      <h5>Lucro Total</h5>
      <h3 class="text-success fw-bold" id="lucroTotal">+0,00 (+0%)</h3>
    </div>
  </div>
  <div class="col-md-3">
    <div class="card p-3">
      <h5>Lucro no mês</h5>
      <h3 class="text-success fw-bold" id="lucroMes">+0,00 (+0%)</h3>
    </div>
  </div>
  <div class="col-md-3">
    <div class="card p-3">
      <h5>Proventos / Recebidos</h5>
      <h3 class="text-success fw-bold" id="proventos">R$ 0,00</h3>
    </div>
  </div>
</div>

<!-- Gráficos -->
<div class="row g-4 mt-4">
  <div class="col-md-6">
    <div class="card p-3">
      <h6 class="text-secondary">Evolução do Patrimônio</h6>
      <canvas id="chartEvolucao"></canvas>
    </div>
  </div>
  <div class="col-md-6">
    <div class="card p-3">
      <h6 class="text-secondary">Composição de Ativos</h6>
      <canvas id="chartAtivos"></canvas>
    </div>
  </div>
</div>

<!-- Tabela -->
<div class="card mt-4">
  <div class="card-body">
    <div class="d-flex justify-content-between align-items-center mb-3">
      <h6 class="text-secondary mb-0">Ativos</h6>
      <button class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#modalAdicionarAtivo">
        ➕ Adicionar Ativo
      </button>
    </div>

    <table class="table table-dark table-striped align-middle">
      <thead>
        <tr>
          <th>Ativo</th>
          <th>Tipo</th>
          <th>Quantidade</th>
          <th>Preço Compra (R$)</th>
          <th>Preço Atual (R$)</th>
          <th>Lucro</th>
          <th>Ações</th>
        </tr>
      </thead>
      <tbody id="tabelaAtivos"></tbody>
    </table>
  </div>
</div>
</div>

<!-- Modal Adicionar Ativo -->
<div class="modal fade" id="modalAdicionarAtivo" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content bg-dark text-light">
      <div class="modal-header border-secondary">
        <h5 class="modal-title">Adicionar Novo Ativo</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <form id="formAdicionarAtivo">
          <div class="mb-3">
            <label for="ativoNome" class="form-label">Código / Nome do Ativo</label>
            <input type="text" class="form-control" id="ativoNome" placeholder="Ex: PETR4, AAPL, ITSA4" required>
          </div>
          <div class="mb-3">
            <label for="ativoTipo" class="form-label">Tipo</label>
            <select class="form-select" id="ativoTipo">
              <option>Ação</option>
              <option>FII</option>
              <option>Tesouro Direto</option>
              <option>Renda Fixa</option>
            </select>
          </div>
          <div class="mb-3">
            <label for="ativoValorInvestido" class="form-label">Valor Total Investido (R$)</label>
            <input type="number" class="form-control" id="ativoValorInvestido" step="0.01" required>
          </div>
          <div class="mb-3">
            <label for="ativoValor" class="form-label">Preço do Ativo</label>
            <input type="number" class="form-control" id="ativoValor" step="0.01" required>
          </div>
          <button type="submit" class="btn btn-success w-100">Salvar</button>
        </form>
      </div>
    </div>
  </div>
</div>

<footer class="text-center py-4 small">
  © 2024 SMARTY INVEST - Todos os direitos reservados.
</footer>

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
const ALPHA_KEY = "3SQNJCT7J2BJAFPG";

async function obterCotacaoDolar() {
  try {
    const resp = await fetch(`https://www.alphavantage.co/query?function=CURRENCY_EXCHANGE_RATE&from_currency=USD&to_currency=BRL&apikey=${ALPHA_KEY}`);
    const data = await resp.json();
    return parseFloat(data["Realtime Currency Exchange Rate"]["5. Exchange Rate"]) || 5;
  } catch {
    return 5;
  }
}

function atualizarCards() {
  const linhas = document.querySelectorAll("#tabelaAtivos tr");
  let patrimonio = 0, lucroTotal = 0;

  linhas.forEach(linha => {
    const qtd = parseFloat(linha.children[2].textContent);
    const precoCompra = parseFloat(linha.children[3].dataset.valor);
    const precoAtual = parseFloat(linha.children[4].dataset.valor);
    patrimonio += qtd * precoAtual;
    lucroTotal += qtd * (precoAtual - precoCompra);
  });

  const lucroPercent = patrimonio ? (lucroTotal / (patrimonio - lucroTotal)) * 100 : 0;

  document.getElementById("patrimonioTotal").textContent = 'R$ ' + patrimonio.toLocaleString('pt-BR', {minimumFractionDigits:2});
  document.getElementById("lucroTotal").textContent = `${lucroTotal >= 0 ? '+' : ''}R$ ${lucroTotal.toLocaleString('pt-BR',{minimumFractionDigits:2})} (${lucroPercent.toFixed(2)}%)`;

  atualizarGraficos();
}

const chartEvolucao = new Chart(document.getElementById('chartEvolucao'), {
  type: 'line',
  data: { labels: [], datasets: [{ label: 'Evolução', data: [], borderColor: '#00c853', borderWidth: 2, tension: 0.3 }] },
  options: { plugins:{legend:{display:false}}, scales:{y:{beginAtZero:true}} }
});

const chartAtivos = new Chart(document.getElementById('chartAtivos'), {
  type: 'doughnut',
  data: { labels: [], datasets: [{ data: [], backgroundColor:['#871981','#ff8a05','#155aee','#dd1717'] }] },
  options: { plugins:{legend:{position:'bottom',labels:{color:'#fff'}}} }
});

function atualizarGraficos(){
  const linhas=document.querySelectorAll("#tabelaAtivos tr");
  const labels=[], valores=[];
  linhas.forEach(l=>{
    labels.push(l.children[0].textContent);
    const qtd=parseFloat(l.children[2].textContent);
    const val=parseFloat(l.children[4].dataset.valor);
    valores.push(qtd*val);
  });
  chartAtivos.data.labels=labels;
  chartAtivos.data.datasets[0].data=valores;
  chartAtivos.update();

  chartEvolucao.data.labels=labels;
  chartEvolucao.data.datasets[0].data=valores;
  chartEvolucao.update();
}

document.getElementById("formAdicionarAtivo").addEventListener("submit", async function(e){
  e.preventDefault();
  const nome = ativoNome.value.trim();
  const tipo = ativoTipo.value;
  const valorInvestido = parseFloat(ativoValorInvestido.value);
  const precoCompra = parseFloat(ativoValor.value);
  let precoAtual = precoCompra;

  try {
    const resp = await fetch(`https://www.alphavantage.co/query?function=GLOBAL_QUOTE&symbol=${nome}&apikey=${ALPHA_KEY}`);
    const data = await resp.json();
    const quote = data["Global Quote"];
    if (quote && quote["05. price"]) precoAtual = parseFloat(quote["05. price"]);

    if (!nome.endsWith("3") && !nome.endsWith("4") && !nome.endsWith("11")) {
      const dolar = await obterCotacaoDolar();
      precoAtual *= dolar;
    }

  } catch (e) {
    console.error("Erro ao buscar cotação:", e);
  }

  const quantidade = valorInvestido / precoCompra;
  const lucro = (precoAtual - precoCompra) * quantidade;
  const lucroPercent = ((precoAtual - precoCompra) / precoCompra) * 100;

  const linha = document.createElement("tr");
  linha.innerHTML = `
    <td>${nome}</td>
    <td>${tipo}</td>
    <td>${quantidade.toFixed(2)}</td>
    <td data-valor="${precoCompra}">R$ ${precoCompra.toLocaleString('pt-BR',{minimumFractionDigits:2})}</td>
    <td data-valor="${precoAtual}">R$ ${precoAtual.toLocaleString('pt-BR',{minimumFractionDigits:2})}</td>
    <td class="${lucro >= 0 ? 'text-success' : 'text-danger'}">${lucro >= 0 ? '+' : ''}R$ ${lucro.toLocaleString('pt-BR',{minimumFractionDigits:2})} (${lucroPercent.toFixed(2)}%)</td>
    <td><button class="btn btn-danger btn-sm btn-remover">🗑️</button></td>`;
  document.getElementById("tabelaAtivos").appendChild(linha);

  e.target.reset();
  bootstrap.Modal.getInstance(document.getElementById("modalAdicionarAtivo")).hide();
  atualizarCards();
});

document.getElementById("tabelaAtivos").addEventListener("click", function(e){
  if(e.target.classList.contains("btn-remover")){
    e.target.closest("tr").remove();
    atualizarCards();
  }
});
</script>
</body>
</html>
