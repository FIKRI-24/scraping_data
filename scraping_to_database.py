import requests
from bs4 import BeautifulSoup
import mysql.connector

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

# Koneksi ke database MySQL
conn = mysql.connector.connect(
    host="localhost",
    user="root",
    password="",  
    database="kota_padang"
)
cursor = conn.cursor()

# Menyimpan data ke tabel kecamatan_kelurahan
insert_query = """
INSERT INTO kecamatan_kelurahan (kecamatan, kelurahan, kode_pos)
VALUES (%s, %s, %s)
"""

for entry in data:
    # Pastikan entry memiliki 3 kolom (Kecamatan, Kelurahan, Kode Pos)
    if len(entry) >= 3:
        cursor.execute(insert_query, (entry[0], entry[1], entry[2]))

# Commit perubahan dan tutup koneksi
conn.commit()
cursor.close()
conn.close()

print("Data berhasil disimpan ke database!")
