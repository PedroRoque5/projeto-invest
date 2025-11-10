import yfinance as yf
import pandas as pd
import json
import math

# Lista de ações
acoes = [
    "AAPL", "AMZN", "TSLA", "GOOGL", "MSFT","FB", "NFLX", "NVDA", "BABA", "JPM",
    "PETR4.SA", "VALE3.SA", "ITUB4.SA", "BBDC4.SA", "ABEV3.SA","MGLU3.SA", "BBAS3.SA", "WEGE3.SA", "LREN3.SA", "GGBR4.SA"
]

dados = []

for simbolo in acoes:
    ticker = yf.Ticker(simbolo)
    info = ticker.history(period="5d")  # usa 5 dias p/ evitar NaN em feriados

    if len(info) >= 2:
        preco_ontem = float(info['Close'].iloc[-2])
        preco_hoje = float(info['Close'].iloc[-1])

        # pula se algum valor for inválido
        if math.isnan(preco_ontem) or math.isnan(preco_hoje):
            continue

        variacao = preco_hoje - preco_ontem
        percentual = (variacao / preco_ontem) * 100

        moeda = "R$" if simbolo.endswith(".SA") else "US$"

        dados.append({
            "acao": simbolo,
            "preco": round(preco_hoje, 2),
            "variacao": round(variacao, 2),
            "percentual": round(percentual, 2),
            "moeda": moeda
        })

# Ordena pelo percentual de variação
df = pd.DataFrame(dados)
df = df.sort_values(by="percentual", ascending=False)

# Exporta para JSON legível
print(json.dumps(df.to_dict(orient="records"), indent=4, ensure_ascii=False))
