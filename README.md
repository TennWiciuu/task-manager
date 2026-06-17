# Task Manager – Projekt Portfolio (PHP)

Prosta aplikacja do zarządzania zadaniami stworzona w PHP jako projekt portfolio.  
Projekt pokazuje podstawowe zagadnienia backendowe: uwierzytelnianie użytkowników, operacje CRUD, sesje oraz wielojęzyczny interfejs.

---

## 🚀 Funkcjonalności

- Rejestracja i logowanie użytkowników
- System uwierzytelniania oparty na sesjach
- Tworzenie, edycja, oznaczanie jako ukończone oraz usuwanie zadań (CRUD)
- Filtrowanie zadań (Wszystkie / Aktywne / Ukończone)
- Obsługa dwóch języków (PL / EN)
- Prosty interfejs UI bez frameworków
- Przełączanie języka po stronie serwera

---

## 🧠 Technologie

- PHP (logika backendowa)
- MySQL (baza danych)
- HTML / CSS (własny frontend)
- JavaScript (interakcje UI)
- Sesje PHP (logowanie + język)

---

## 📸 Zrzuty ekranu

- panel zadań (dashboard)
  <img width="2538" height="1277" alt="Zrzut ekranu 2026-06-17 195309" src="https://github.com/user-attachments/assets/56650202-b6ac-4156-92ee-2b4650c7ead3" />
- ekran logowania i rejestracji
  <img width="2541" height="1277" alt="Zrzut ekranu 2026-06-17 194136" src="https://github.com/user-attachments/assets/7878e7a1-253d-43ac-8c32-b6699c225c5e" />
  <img width="2538" height="1277" alt="Zrzut ekranu 2026-06-17 194149" src="https://github.com/user-attachments/assets/89a6db05-c25b-41d5-afad-94699d5b8516" />
- widok filtrów
  <img width="2537" height="1272" alt="Zrzut ekranu 2026-06-17 195341" src="https://github.com/user-attachments/assets/7b9c66b3-c4f9-4656-a6f8-33a3a72d057b" />
  <img width="2540" height="1277" alt="Zrzut ekranu 2026-06-17 195357" src="https://github.com/user-attachments/assets/823f4c5d-5447-4f8b-9d67-5195f73c7884" />
- przełącznik języka
  <img width="2558" height="1277" alt="Zrzut ekranu 2026-06-17 194120" src="https://github.com/user-attachments/assets/54a21f9e-7782-4a25-bd25-508a3bbef6ab" />
  <img width="2558" height="1277" alt="Zrzut ekranu 2026-06-17 195954" src="https://github.com/user-attachments/assets/31c2baf0-fc6a-4d45-b144-25a8537f6ebd" />

---

## ⚙️ Instalacja

1. Sklonuj repozytorium:
```bash
git clone https://github.com/twoj-username/task-manager.git
```
- Zaimportuj bazę danych:
- utwórz bazę MySQL
- zaimportuj plik .sql (jeśli istnieje)
- Skonfiguruj połączenie z bazą:
- // config/db.php
- $host = "localhost";
- $user = "root";
- $password = "";
- $dbname = "twoja_baza";
Uruchom projekt lokalnie:
- XAMPP / Laragon / MAMP
- włącz Apache i MySQL
- wejdź w przeglądarce:
- http://localhost/nazwa-folderu-projektu

---

## 🌍 System językowy

Aplikacja obsługuje dwa języki:

- 🇵🇱 polski
- 🇬🇧 angielski

- Przełączanie języka odbywa się po stronie serwera przy użyciu sesji oraz plików tłumaczeń znajdujących się w:

/config/lang/

---

## 🔐 Uwierzytelnianie

- Hasła są hashowane przed zapisaniem do bazy
- System wykorzystuje sesje PHP
- Dostęp do panelu wymaga zalogowania

---

## 📁 Struktura projektu

- /auth           → logowanie i rejestracja
- /app            → logika CRUD zadań
- /config         → konfiguracja i tłumaczenia
- /assets         → CSS i JS
- /dashboard.php  → główny panel użytkownika
- /index.php      → strona startowa

---
  
## 🎯 Cel projektu

Projekt został stworzony w celu nauki i demonstracji:

- podstaw backendu w PHP
- systemu logowania opartego na sesjach
- operacji CRUD
- podstaw architektury aplikacji webowej
- pracy z wielojęzycznością
- tworzenia UI bez frameworków

---

## 📌 Możliwe rozszerzenia

- reset hasła
- system priorytetów zadań

---

## 👤 Autor

Wiktor Przygodzki Projekt portfolio – 2026
