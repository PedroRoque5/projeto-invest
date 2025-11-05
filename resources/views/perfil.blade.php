<?php

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Ranking de Ações</title>
    <link rel="stylesheet" href="{{ asset('css/perfil.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
</head>

<body class="site">
    <div class="container">
        <div class="card">
            <h1>Descubra o seu perfil de investidor!</h1>
            <p class="muted">Fluxo em 2 etapas: <span class="pill">1 Anamnese</span> <span class="pill">2 Teste de Perfil</span>. Responda o teste atentamente para melhor resultado e uso do site para melhorar a sua carteira de investimento.</p>

            <div class="grid two" style="margin:10px 0 18px">
                <div><span class="tag" id="stepBadge">Etapa 1 de 2 — Anamnese</span></div>
                <div style="text-align:right">
                    <button class="btn-outline" id="btnReset" type="button">Limpar tudo</button>
                </div>
            </div>

            <!-- ANAMNESE -->
            <form id="formAnamnese" class="grid" autocomplete="off">
                <h2>1 Dados Pessoais</h2>
                <div class="grid two">
                    <div>
                        <label for="idade">Idade</label>
                        <input id="idade" name="idade" type="number" min="16" max="120" required placeholder="Ex.: 28" />
                    </div>
                    <div>
                        <label for="escolaridade">Escolaridade</label>
                        <select id="escolaridade" name="escolaridade" required>
                            <option value="">Selecione</option>
                            <option>Ensino Fundamental</option>
                            <option>Ensino Médio</option>
                            <option>Ensino Superior</option>
                            <option>Pós-graduação ou mais</option>
                        </select>
                    </div>
                </div>

                <div class="grid two">
                    <div>
                        <label for="profissao">Profissão</label>
                        <input id="profissao" name="profissao" type="text" required placeholder="Ex.: Analista de Sistemas" />
                    </div>
                    <div>
                        <label for="estadoCivil">Estado civil</label>
                        <select id="estadoCivil" name="estadoCivil" required>
                            <option value="">Selecione</option>
                            <option>Solteiro(a)</option>
                            <option>Casado(a)</option>
                            <option>União estável</option>
                            <option>Divorciado(a)</option>
                            <option>Viúvo(a)</option>
                        </select>
                    </div>
                </div>

                <div>
                    <label for="dependentes">Número de dependentes</label>
                    <input id="dependentes" name="dependentes" type="number" min="0" max="15" required placeholder="Ex.: 1" />
                </div>

                <h2>2 Situação Financeira Atual</h2>
                <div>
                    <label>Renda mensal aproximada</label>
                    <div class="radio-group">
                        <label class="opt"><input type="radio" name="renda" value="1|Até R$ 2.000" required> Até R$ 2.000</label>
                        <label class="opt"><input type="radio" name="renda" value="2|De R$ 2.001 a R$ 5.000"> De R$ 2.001 a R$ 5.000</label>
                        <label class="opt"><input type="radio" name="renda" value="3|De R$ 5.001 a R$ 10.000"> De R$ 5.001 a R$ 10.000</label>
                        <label class="opt"><input type="radio" name="renda" value="4|Acima de R$ 10.000"> Acima de R$ 10.000</label>
                    </div>
                </div>

                <div class="grid two">
                    <div>
                        <label>Reserva de emergência</label>
                        <div class="radio-group">
                            <label class="opt"><input type="radio" name="reserva" value="sim" required> Sim</label>
                            <label class="opt"><input type="radio" name="reserva" value="nao"> Não</label>
                        </div>
                    </div>
                    <div>
                        <label>Dívidas atualmente</label>
                        <div class="radio-group">
                            <label class="opt"><input type="radio" name="dividas" value="nenhuma" required> Não</label>
                            <label class="opt"><input type="radio" name="dividas" value="baixo"> Sim, de baixo valor</label>
                            <label class="opt"><input type="radio" name="dividas" value="alto"> Sim, de valor elevado</label>
                        </div>
                    </div>
                </div>

                <div>
                    <label>Você costuma controlar seus gastos?</label>
                    <div class="radio-group">
                        <label class="opt"><input type="radio" name="controle" value="sempre" required> Sempre</label>
                        <label class="opt"><input type="radio" name="controle" value="asvezes"> Às vezes</label>
                        <label class="opt"><input type="radio" name="controle" value="nunca"> Nunca</label>
                    </div>
                </div>

                <h2>3 Objetivos com os Investimentos</h2>
                <div>
                    <label>Principal objetivo ao investir</label>
                    <div class="radio-group">
                        <label class="opt"><input type="radio" name="objetivo" value="Aposentadoria" required> Aposentadoria</label>
                        <label class="opt"><input type="radio" name="objetivo" value="Compra de imóvel"> Compra de imóvel</label>
                        <label class="opt"><input type="radio" name="objetivo" value="Viagens"> Viagens</label>
                        <label class="opt"><input type="radio" name="objetivo" value="Aumento de patrimônio"> Aumento de patrimônio</label>
                        <label class="opt"><input type="radio" name="objetivo" value="Renda extra"> Renda extra</label>
                        <label class="opt"><input type="radio" name="objetivo" value="Outros"> Outros</label>
                    </div>
                </div>

                <div>
                    <label>Em quanto tempo espera alcançar esse objetivo?</label>
                    <div class="radio-group">
                        <label class="opt"><input type="radio" name="prazoObjetivo" value="1|Menos de 1 ano" required> Menos de 1 ano</label>
                        <label class="opt"><input type="radio" name="prazoObjetivo" value="2|1 a 3 anos"> 1 a 3 anos</label>
                        <label class="opt"><input type="radio" name="prazoObjetivo" value="3|3 a 5 anos"> 3 a 5 anos</label>
                        <label class="opt"><input type="radio" name="prazoObjetivo" value="4|Mais de 5 anos"> Mais de 5 anos</label>
                    </div>
                </div>

                <h2>4 Experiência e Conhecimento</h2>
                <div class="grid two">
                    <div>
                        <label>Você já investiu antes?</label>
                        <div class="radio-group">
                            <label class="opt"><input type="radio" name="experiencia" value="sim" required> Sim</label>
                            <label class="opt"><input type="radio" name="experiencia" value="nao"> Não</label>
                        </div>
                    </div>
                    <div>
                        <label>Nível de conhecimento</label>
                        <div class="radio-group">
                            <label class="opt"><input type="radio" name="conhecimento" value="iniciante" required> Iniciante</label>
                            <label class="opt"><input type="radio" name="conhecimento" value="intermediario"> Intermediário</label>
                            <label class="opt"><input type="radio" name="conhecimento" value="avancado"> Avançado</label>
                        </div>
                    </div>
                </div>

                <div class="actions">
                    <div></div>
                    <button class="btn" id="toTeste" type="button">Continuar para Teste ▶</button>
                </div>
            </form>

            <!-- TESTE DE PERFIL -->
            <form id="formTeste" class="grid hidden" autocomplete="off">
                <h2>5 Teste de Perfil</h2>
                <div>
                    <label>Como você reage a perdas financeiras?</label>
                    <div class="radio-group">
                        <label class="opt"><input type="radio" name="q14" value="1|Fico muito preocupado e evito riscos" required> Fico muito preocupado e evito riscos</label>
                        <label class="opt"><input type="radio" name="q14" value="2|Aceito pequenas perdas"> Aceito pequenas perdas</label>
                        <label class="opt"><input type="radio" name="q14" value="3|Não me incomodo com perdas, desde que haja chance de lucros altos"> Não me incomodo com perdas, desde que haja chance de lucros altos</label>
                    </div>
                </div>
                <div>
                    <label>Qual percentual da sua renda mensal você estaria disposto(a) a investir?</label>
                    <div class="radio-group">
                        <label class="opt"><input type="radio" name="q15" value="1|Até 10%" required> Até 10%</label>
                        <label class="opt"><input type="radio" name="q15" value="2|Entre 10% e 25%"> Entre 10% e 25%</label>
                        <label class="opt"><input type="radio" name="q15" value="3|Mais de 25%"> Mais de 25%</label>
                    </div>
                </div>
                <div>
                    <label>Se um investimento de R$ 10.000 caísse para R$ 8.000 em um mês, você:</label>
                    <div class="radio-group">
                        <label class="opt"><input type="radio" name="q16" value="1|Resgataria imediatamente para evitar mais perdas" required> Resgataria imediatamente para evitar mais perdas</label>
                        <label class="opt"><input type="radio" name="q16" value="2|Manteria investido aguardando recuperação"> Manteria investido aguardando recuperação</label>
                        <label class="opt"><input type="radio" name="q16" value="3|Investiria mais aproveitando a queda"> Investiria mais aproveitando a queda</label>
                    </div>
                </div>
                <div>
                    <label>Em relação ao prazo de resgate, você prefere:</label>
                    <div class="radio-group">
                        <label class="opt"><input type="radio" name="q17" value="1|Investimentos com resgate imediato" required> Investimentos com resgate imediato</label>
                        <label class="opt"><input type="radio" name="q17" value="2|Prazos médios de 1 a 3 anos"> Prazos médios de 1 a 3 anos</label>
                        <label class="opt"><input type="radio" name="q17" value="3|Prazos longos de mais de 5 anos"> Prazos longos de mais de 5 anos</label>
                    </div>
                </div>
                <div>
                    <label>Sobre diversificação:</label>
                    <div class="radio-group">
                        <label class="opt"><input type="radio" name="q18" value="1|Prefiro aplicar em um único produto seguro" required> Prefiro aplicar em um único produto seguro</label>
                        <label class="opt"><input type="radio" name="q18" value="2|Divido entre produtos seguros e moderados"> Divido entre produtos seguros e moderados</label>
                        <label class="opt"><input type="radio" name="q18" value="3|Invisto em várias opções, incluindo produtos de alto risco"> Invisto em várias opções, incluindo produtos de alto risco</label>
                    </div>
                </div>

                <div class="actions">
                    <button class="btn-outline" id="back" type="button">◀ Voltar</button>
                    <div style="display:flex; gap:10px">
                        <button class="btn-outline" id="btnExport" type="button">Exportar JSON</button>
                        <button class="btn" id="btnCalcular" type="submit">Calcular Perfil ✅</button>
                    </div>
                </div>
            </form>

            <!-- RESULTADO -->
            <div id="resultado" class="hidden">
                <div class="hr"></div>
                <h2>Resultado</h2>
                <div class="result" id="resultadoBox"></div>
                <div class="actions">
                    <button class="btn-outline" id="btnEditar" type="button">Editar respostas</button>
                    <button class="btn" id="btnNovo" type="button">Nova avaliação</button>
                   <form action="{{ route('login') }}" method="GET">  <label id="button"><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <button class="cadastre" type="submit">Login</button></form>
                </div>
            </div>
        </div> <!-- FECHA CARD -->
    </div> <!-- FECHA CONTAINER -->

<script>
    (function() {
        const formAnamnese = document.getElementById('formAnamnese');
        const formTeste = document.getElementById('formTeste');
        const resultado = document.getElementById('resultado');
        const resultadoBox = document.getElementById('resultadoBox');
        const stepBadge = document.getElementById('stepBadge');

        // Navegação
        document.getElementById('toTeste').addEventListener('click', () => {
            if (!formAnamnese.checkValidity()) {
                formAnamnese.reportValidity();
                return;
            }
            formAnamnese.classList.add('hidden');
            formTeste.classList.remove('hidden');
            stepBadge.textContent = 'Etapa 2 de 2 — Teste de Perfil';
        });
        document.getElementById('back').addEventListener('click', () => {
            formTeste.classList.add('hidden');
            formAnamnese.classList.remove('hidden');
            stepBadge.textContent = 'Etapa 1 de 2 — Anamnese';
        });

        // Limpar tudo
        document.getElementById('btnReset').addEventListener('click', () => {
            if (!confirm('Limpar todas as respostas?')) return;
            formAnamnese.reset();
            formTeste.reset();
            formTeste.classList.add('hidden');
            formAnamnese.classList.remove('hidden');
            resultado.classList.add('hidden');
            stepBadge.textContent = 'Etapa 1 de 2 — Anamnese';
        });

        // Exportar JSON
        document.getElementById('btnExport').addEventListener('click', () => {
            const data = coletarDados();
            const blob = new Blob([JSON.stringify(data, null, 2)], {
                type: 'application/json'
            });
            const url = URL.createObjectURL(blob);
            const a = document.createElement('a');
            a.href = url;
            a.download = 'smartfy-anamnese-teste.json';
            a.click();
            URL.revokeObjectURL(url);
        });

        // Calcular Perfil
        formTeste.addEventListener('submit', (e) => {
            e.preventDefault();
            if (!formTeste.checkValidity()) {
                formTeste.reportValidity();
                return;
            }
            const data = coletarDados();

            // Pontuação (5 perguntas do teste; 1-3 pts cada)
            const score = ['q14', 'q15', 'q16', 'q17', 'q18']
                .map(k => parseInt(data.teste[k].split('|')[0], 10))
                .reduce((a, b) => a + b, 0);

            let perfil = score <= 8 ? 'Conservador' : (score <= 12 ? 'Moderado' : 'Arrojado');
            const ajustes = [];

            // Regras de ajuste (anamnese)
            if (data.anamnese.reserva === 'nao' || data.anamnese.dividas === 'alto') {
                perfil = downgrade(perfil);
                ajustes.push('Ajuste: sem reserva e/ou dívidas elevadas \u2192 perfil reduzido.');
            }
            if (data.anamnese.conhecimento === 'iniciante' && perfil === 'Arrojado') {
                perfil = 'Moderado';
                ajustes.push('Ajuste: conhecimento iniciante \u2192 limite máximo Moderado.');
            }

            const faixa = score + ' pontos (base)';

            // Sugestão ilustrativa (não recomendação)
            const aloc = perfil === 'Conservador' ?
                '70% Renda Fixa • 20% Multimercado • 10% Variável' :
                perfil === 'Moderado' ? '40% Renda Fixa • 30% Multimercado • 30% Variável' :
                '20% Renda Fixa • 30% Multimercado • 50% Variável';

            resultadoBox.innerHTML = `
      <div class="grid two">
        <div>
          <div class="pill">Pontuação: ${faixa}</div>
          <h3 style="margin:8px 0 6px; font-size:22px">Perfil final: <span class="pill" style="border-color:rgba(34,197,94,.5)">${perfil}</span></h3>
          ${ajustes.length ? `<p class="warn">${ajustes.join('<br>')}</p>` : ''}
          <p class="muted">Sugestão ilustrativa de alocação: <strong>${aloc}</strong></p>
        </div>
        <div>
          <h4 style="margin:0 0 6px">Resumo</h4>
          <ul style="margin:0; padding-left:18px; line-height:1.6">
            <li>Objetivo: <strong>${getRadioLabel('objetivo')}</strong></li>
            <li>Prazo objetivo: <strong>${getValue('prazoObjetivo').split('|')[1]}</strong></li>
            <li>Experiência prévia: <strong>${data.anamnese.experiencia==='sim'?'Sim':'Não'}</strong></li>
            <li>Reserva de emergência: <strong>${data.anamnese.reserva==='sim'?'Sim':'Não'}</strong></li>
            <li>Dívidas: <strong>${labelDividas(data.anamnese.dividas)}</strong></li>
          </ul>
        </div>
      </div>
    `;

            formAnamnese.classList.add('hidden');
            formTeste.classList.add('hidden');
            resultado.classList.remove('hidden');
            stepBadge.textContent = 'Concluído — Resultado';
        });

        document.getElementById('btnEditar').addEventListener('click', () => {
            resultado.classList.add('hidden');
            formTeste.classList.remove('hidden');
            stepBadge.textContent = 'Etapa 2 de 2 — Teste de Perfil';
        });

        document.getElementById('btnNovo').addEventListener('click', () => {
            formAnamnese.reset();
            formTeste.reset();
            resultado.classList.add('hidden');
            formAnamnese.classList.remove('hidden');
            stepBadge.textContent = 'Etapa 1 de 2 — Anamnese';
        });

        function coletarDados() {
            const v = (sel) => {
                const el = document.querySelector(sel);
                return el ? el.value : '';
            };
            const vrad = (name) => {
                const el = document.querySelector(`input[name="${name}"]:checked`);
                return el ? el.value : '';
            };
            return {
                anamnese: {
                    idade: v('#idade'),
                    escolaridade: v('#escolaridade'),
                    profissao: v('#profissao'),
                    estadoCivil: v('#estadoCivil'),
                    dependentes: v('#dependentes'),
                    renda: vrad('renda'), // formato: ponto|label
                    reserva: vrad('reserva'),
                    dividas: vrad('dividas'),
                    controle: vrad('controle'),
                    objetivo: vrad('objetivo'),
                    prazoObjetivo: vrad('prazoObjetivo'),
                    experiencia: vrad('experiencia'),
                    conhecimento: vrad('conhecimento')
                },
                teste: {
                    q14: vrad('q14'),
                    q15: vrad('q15'),
                    q16: vrad('q16'),
                    q17: vrad('q17'),
                    q18: vrad('q18')
                }
            };
        }

        function getValue(name) {
            const el = document.querySelector(`input[name="${name}"]:checked`);
            return el ? el.value : '';
        }

        function getRadioLabel(name) {
            const el = document.querySelector(`input[name="${name}"]:checked`);
            if (!el) return '';
            const lbl = el.closest('label');
            return lbl ? lbl.textContent.trim() : el.value;
        }

        function labelDividas(key) {
            return key === 'alto' ? 'Valor elevado' : (key === 'baixo' ? 'Baixo valor' : 'Nenhuma');
        }

        function downgrade(perfil) {
            if (perfil === 'Arrojado') return 'Moderado';
            if (perfil === 'Moderado') return 'Conservador';
            return perfil;
        }
    })();
</script>
</body>

</html>

</body>