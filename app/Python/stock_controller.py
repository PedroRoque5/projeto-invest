from dotenv import load_dotenv
import matplotlib.pyplot as plt
import requests, os, base64, json, sys
from io import BytesIO
import warnings

warnings.filterwarnings("ignore")  # evita warnings do matplotlib

# Carrega variáveis do .env
load_dotenv()
API_KEY = os.getenv('ALPHA_VANTAGE_KEY')

def get_stock_chart(symbol):
    url = f'https://www.alphavantage.co/query?function=TIME_SERIES_DAILY&symbol={symbol}&apikey={API_KEY}'
    response = requests.get(url)
    data = response.json()

    if "Time Series (Daily)" not in data:
        return {"error": f"Erro ao buscar dados para {symbol}. Verifique a API Key ou limite da API."}

    series = data["Time Series (Daily)"]

    # Últimos 30 dias
    dates = list(series.keys())[:30]
    dates.reverse()
    close_prices = [float(series[d]["4. close"]) for d in dates]

    # Criar gráfico
    plt.figure(figsize=(8, 4))
    plt.plot(dates, close_prices, marker='o', linestyle='-', color='b')
    plt.title(f'Histórico de preços - {symbol}')
    plt.xlabel('Data')
    plt.ylabel('Preço (USD)')
    plt.xticks(rotation=45)
    plt.tight_layout()

    # Converter para base64
    buffer = BytesIO()
    plt.savefig(buffer, format='png')
    plt.close()
    buffer.seek(0)
    img_b64 = base64.b64encode(buffer.read()).decode('utf-8')

    return {"symbol": symbol, "chart": img_b64}

if __name__ == "__main__":
    symbol = sys.argv[1] if len(sys.argv) > 1 else "AAPL"
    print(json.dumps(get_stock_chart(symbol)))
