import yfinance as yf
import pandas as pd

acoes = ["AAPL", "AMZN", "TSLA", "GOOGL", "MSFT", "PETR4.SA", "VALE3.SA", "ITUB4.SA", "BBDC4.SA", "ABEV3.SA"]
dados = []

for simbolo in acoes:
    ticker = yf.Ticker(simbolo)
    info = ticker.history(period="2d")
    if len(info) >= 2:
        preco_ontem = info['Close'].iloc[-2]
        preco_hoje = info['Close'].iloc[-1]
        variacao = preco_hoje - preco_ontem
        percentual = (variacao / preco_ontem) * 100
        dados.append({
            "acao": simbolo,
            "preco": round(preco_hoje, 2),
            "variacao": round(variacao, 2),
            "percentual": round(percentual, 2)
        })

df = pd.DataFrame(dados)
df = df.sort_values(by="percentual", ascending=False)

# Gera saída em JSON
print(df.to_json(orient="records"))
