import requests
from bs4 import BeautifulSoup
import csv

# URL halaman Wikipedia
url = "https://id.wikipedia.org/wiki/Daftar_kecamatan_dan_kelurahan_di_Kota_Padang"

# Mengambil konten halaman
response = requests.get(url)

# Parsing konten HTML dengan BeautifulSoup
soup = BeautifulSoup(response.content, "html.parser")

# Mencari tabel yang berisi data kecamatan dan kelurahan
tables = soup.find_all("table", class_="wikitable")

# Menyimpan data yang telah diparsing
data = []

for table in tables:
    rows = table.find_all("tr")
    for row in rows[1:]:  # Skip header
        cols = row.find_all("td")
        cols = [col.text.strip() for col in cols]
        if cols:
            data.append(cols)

# Menyimpan data ke file CSV
with open("kecamatan_kelurahan_padang.csv", "w", newline="", encoding="utf-8") as file:
    writer = csv.writer(file)
    writer.writerow(["Kecamatan", "Kelurahan", "Kode Pos"])  # Header
    writer.writerows(data)

print("Data berhasil disimpan ke kecamatan_kelurahan_padang.csv")
