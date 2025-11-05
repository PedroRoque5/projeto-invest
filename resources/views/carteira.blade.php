<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Smarty Invest - Dashboard</title>

<!-- Bootstrap 5 -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<style>
body { background-color: #111; color: #fff; }
.card { background-color: #1c1c1c; border: none; color: #fff; }
.card h5 { color: #9ca3af; }
.navbar { background-color: #0f4d0f; }
.navbar a { color: #fff !important; }
.table-dark th, .table-dark td { vertical-align: middle; }
footer { color: #9ca3af; }
.btn-success { background-color: #198754; border: none; }
.btn-success:hover { background-color: #157347; }
.btn-danger:hover { background-color: #b71c1c; }
</style>
</head>

<body>
<!-- Navbar -->
<nav class="navbar navbar-expand-lg px-4">
<a class="navbar-brand fw-bold text-white" href="#">SMARTY INVEST</a>
<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
<span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse" id="navbarNav">
<ul class="navbar-nav me-auto mb-2 mb-lg-0">
<li class="nav-item"><a class="nav-link" href="#">Ações</a></li>
<li class="nav-item"><a class="nav-link" href="#">FIIs</a></li>
<li class="nav-item"><a class="nav-link" href="#">Tesouro Direto</a></li>
<li class="nav-item"><a class="nav-link" href="#">Renda Fixa</a></li>
</ul>
<form class="d-flex" role="search">
<input class="form-control me-2" type="search" placeholder="Buscar">
<button class="btn btn-outline-light" type="submit">🔍</button>
</form>
</div>
</nav>

<div class="container my-5">
<!-- Cards Superiores -->
<div class="row g-4 text-center">
<div class="col-md-3">
<div class="card p-3">
<h5>Patrimônio Total</h5>
<h2 class="text-success fw-bold" id="patrimonioTotal">R$ 0,00</h2>
<p class="text-muted small mb-0">Última atualização: hoje</p>
</div>
</div>
<div class="col-md-3">
<div class="card p-3">
<h5>Lucro Total</h5>
<h3 class="text-success fw-bold" id="lucroTotal">+0,00 (+0%)</h3>
<p class="text-muted small mb-0">Desde o início</p>
</div>
</div>
<div class="col-md-3">
<div class="card p-3">
<h5>Lucro no mês</h5>
<h3 class="text-success fw-bold" id="lucroMes">+0,00 (+0%)</h3>
<p class="text-muted small mb-0">No mês atual</p>
</div>
</div>
<div class="col-md-3">
<div class="card p-3">
<h5>Proventos / Recebidos</h5>
<h3 class="text-success fw-bold" id="proventos">R$ 0,00</h3>
<p class="text-muted small mb-0">Variação no dia</p>
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
<th>Valor Atual (R$)</th>
<th>Proventos</th>
<th>Ações</th>
</tr>
</thead>
<tbody id="tabelaAtivos">
</tbody>
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
<input type="text" class="form-control" id="ativoNome" list="listaAtivos" placeholder="Ex: PETR4, AAPL, ITSA4">
<datalist id="listaAtivos"></datalist>
<small class="text-muted">Digite o código e aguarde as sugestões...</small>
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
<label for="ativoQuantidade" class="form-label">Quantidade</label>
<input type="number" class="form-control" id="ativoQuantidade" required>
</div>
<div class="mb-3">
<label for="ativoValor" class="form-label">Valor Atual (R$)</label>
<input type="number" class="form-control" id="ativoValor" required>
</div>
<div class="mb-3">
<label for="ativoProventos" class="form-label">Proventos (R$)</label>
<input type="number" class="form-control" id="ativoProventos">
</div>
<button type="submit" class="btn btn-success w-100">Salvar</button>
</form>
</div>
</div>
</div>
</div>

<!-- Rodapé -->
<footer class="text-center py-4 small">
© 2024 SMARTY INVEST - Todos os direitos reservados.
</footer>

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
const ALPHA_KEY = "3SQNJCT7J2BJAFPG";

function atualizarCardsZerados(){
document.getElementById("patrimonioTotal").textContent = 'R$ 0,00';
document.getElementById("lucroTotal").textContent = '+0,00 (+0%)';
document.getElementById("lucroMes").textContent = '+0,00 (+0%)';
document.getElementById("proventos").textContent = 'R$ 0,00';
}

function atualizarCards(){
const linhas = document.querySelectorAll("#tabelaAtivos tr");
let patrimonio=0, proventos=0, lucroTotal=0, lucroMes=0;
linhas.forEach(linha=>{
const qtd=parseFloat(linha.children[2].textContent.replace(',','.'))||0;
const valor=parseFloat(linha.children[3].textContent.replace('R$','').replace(/\./g,'').replace(',','.'))||0;
const prov=parseFloat(linha.children[4].textContent.replace('R$','').replace(/\./g,'').replace(',','.'))||0;
const precoCompra=parseFloat(linha.dataset.precoCompra);
const precoInicioMes=parseFloat(linha.dataset.precoInicioMes);
patrimonio += qtd*valor;
proventos += prov;
lucroTotal += qtd*(valor-precoCompra);
lucroMes += qtd*(valor-precoInicioMes);
});
document.getElementById("patrimonioTotal").textContent='R$ '+patrimonio.toLocaleString('pt-BR',{minimumFractionDigits:2});
document.getElementById("lucroTotal").textContent=`${lucroTotal>=0?'+':'-'}R$ ${Math.abs(lucroTotal).toLocaleString('pt-BR',{minimumFractionDigits:2})}`;
document.getElementById("lucroMes").textContent=`${lucroMes>=0?'+':'-'}R$ ${Math.abs(lucroMes).toLocaleString('pt-BR',{minimumFractionDigits:2})}`;
document.getElementById("proventos").textContent='R$ '+proventos.toLocaleString('pt-BR',{minimumFractionDigits:2});
if(linhas.length===0) atualizarCardsZerados();
}

// Sugestões Alpha Vantage
document.getElementById("ativoNome").addEventListener("input", async function(){
const query=this.value.trim();
const dataList=document.getElementById("listaAtivos");
if(query.length<2) return;
try{
const resp=await fetch(`https://www.alphavantage.co/query?function=SYMBOL_SEARCH&keywords=${query}&apikey=${ALPHA_KEY}`);
const data=await resp.json();
dataList.innerHTML="";
if(data.bestMatches){
data.bestMatches.slice(0,5).forEach(item=>{
const option=document.createElement("option");
option.value=item["1. symbol"];
option.textContent=item["2. name"];
dataList.appendChild(option);
});
}
}catch(e){console.error("Erro Alpha Vantage:",e);}
});

// Preencher preço e tipo
document.getElementById("ativoNome").addEventListener("change", async function(){
const symbol=this.value.trim();
if(!symbol) return;
try{
const resp=await fetch(`https://www.alphavantage.co/query?function=GLOBAL_QUOTE&symbol=${symbol}&apikey=${ALPHA_KEY}`);
const data=await resp.json();
const quote=data["Global Quote"];
if(quote&&quote["05. price"]) document.getElementById("ativoValor").value=parseFloat(quote["05. price"]).toFixed(2);
if(symbol.endsWith("11")) document.getElementById("ativoTipo").value="FII";
else if(symbol.match(/[A-Z]{4}[0-9]/)) document.getElementById("ativoTipo").value="Ação";
else document.getElementById("ativoTipo").value="Tesouro Direto";
}catch(e){console.error("Erro ao buscar cotação:",e);}
});

// Adicionar ativo
document.getElementById("formAdicionarAtivo").addEventListener("submit", function(e){
e.preventDefault();
const nome=ativoNome.value;
const tipo=ativoTipo.value;
const qtd=parseFloat(ativoQuantidade.value);
const valor=parseFloat(ativoValor.value);
const prov=parseFloat(ativoProventos.value||0);
const linha=document.createElement("tr");
linha.dataset.precoCompra=valor;
linha.dataset.precoInicioMes=valor;
linha.innerHTML=`<td>${nome}</td><td>${tipo}</td><td>${qtd}</td><td>R$ ${valor.toLocaleString('pt-BR')}</td><td>R$ ${prov.toLocaleString('pt-BR')}</td><td><button class="btn btn-danger btn-sm btn-remover">🗑️</button></td>`;
document.getElementById("tabelaAtivos").appendChild(linha);
e.target.reset();
bootstrap.Modal.getInstance(document.getElementById("modalAdicionarAtivo")).hide();
atualizarCards();
});

// Remover ativo
document.getElementById("tabelaAtivos").addEventListener("click", function(e){
if(e.target.classList.contains("btn-remover")){
e.target.closest("tr").remove();
atualizarCards();
}
});

// Atualizar preços
async function atualizarPrecos(){
const linhas=document.querySelectorAll("#tabelaAtivos tr");
for(const linha of linhas){
const simbolo=linha.children[0].textContent;
try{
const resp=await fetch(`https://www.alphavantage.co/query?function=GLOBAL_QUOTE&symbol=${simbolo}&apikey=${ALPHA_KEY}`);
const data=await resp.json();
const quote=data["Global Quote"];
if(quote&&quote["05. price"]){
const valorAtual=parseFloat(quote["05. price"]);
linha.children[3].textContent='R$ '+valorAtual.toLocaleString('pt-BR');
}
}catch(e){console.error(`Erro atualizar preço ${simbolo}:`,e);}
}
atualizarCards();
}
setInterval(atualizarPrecos,5*60*1000);

// Gráficos
new Chart(document.getElementById('chartEvolucao'),{type:'line',data:{labels:['Jan','Fev','Mar','Abr','Mai'],datasets:[{label:'Evolução do Patrimônio',data:[10000,40000,80000,120000,150000],borderColor:'#00c853',borderWidth:2,tension:0.3} ]},options:{plugins:{legend:{display:false}},scales:{y:{beginAtZero:true}}}});
new Chart(document.getElementById('chartAtivos'),{type:'doughnut',data:{labels:['Ações (55%)','FIIs (30%)','Tesouro (15%)'],datasets:[{data:[55,30,15],backgroundColor:['#198754','#00c853','#81c784']}]},options:{plugins:{legend:{position:'bottom',labels:{color:'#fff'}}}}});
</script>
</body>
</html>
