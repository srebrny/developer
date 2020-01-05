Do realizacji zadania potrzebne jest:
- serwer webowy z ustalonym katalogiem głównym na katalog "web" i dostępem do zawartych w nich plików,
- composer,
- PHP w wersji 5.5 lub 7.0.

Cel biznesowy aplikacji:
Aplikacja służy do pobierania danych o produktach od zewnętrznych dostawców. Dane mają być pobierane
od dostawców i wyświetlane w postaci tabelarycznej w konsoli. Dane przychodzą w różnych formatach od różnych dostawców.
Dodatkowo należy zapisywać do dziennika zdarzeń na dysku informacje o dostawcy i identyfikatorze produktu.
Dane powinny być logowane do jednego pliku.

W ramach uproszczenia zadania, odpowiedź z usług zewnętrznych dostawców jest symulowana poprzez odczytanie plików z
katalogu "web", który to powinien być ustawiony jako katalog główny serwera webowego. Dostęp do pozostałych katalogów
z poziomu przeglądarki powinien być zablokowany.

Wywołanie komendy następuje poprzez: php bin/divante.php divante:supplier:sync nazwa_dostawcy

Wymagania techniczne zadania:
Łatwa możliwość dodawania kolejnych dostawców.
Łatwa możliwość dodawania obsługi kolejnych formatów danych.
Dodanie możliwości logowania informacji o produktach.

Zadanie:
Zadanie polega na uzupełnieniu istniejącej/stworzenie nowych struktury w taki sposób, aby aplikacja spełniała Opis 
oraz Wymagania techniczne.

Istnieje dowolna możliwość modyfikacji struktur w celu osiągnięcia rezultatu biznesowego i spełnienie wymogów 
technicznych.

Możliwe jest korzystanie z kolejnych lub innych niż istniejące w strukturze bibliotek, które należy dołaczać poprzez
plik composer.json