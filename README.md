# DrvenijaOnline
Online usluga za prodaju i razmjenu udžbenika osnovnih, srednjih škola i fakulteta.
www.drvenija.ba

**I  - Šta je urađeno?**

  * Validacija svih formi unosa osim prijave, budući da mi nema smisla
    validirati korisnika koji nije u sistemu. (Forme koje jesam odradio su registracija korisnika i prodaja knjige)
  * Galerija slika sa opcijom da se na klik slika raširi preko cijelog ekrana, a na escape da se vrati pogled nazad na galeriju. Data galerija je implementirana na podstranici "Kupi".
  * Dropdown meni na glavnoj stranici sa svim podstranicama i opcijom pretraživanja.
  * Koristio AJAX da loadam sve podstranice na mainPage.html
  
**Dodatni komentari:**
  * Sve stranice su urađene po pravilima responzivnog dizajna i imaju grid view.
  * Meni web stranice je konzistentan (bez glitcheva) i prisutan na svim podstranicama te je prilagođen mobilnim uređajima.
  * HTML i CSS su formatirani i validirani.

**II  - Šta nije urađeno?**
/

**III - Bug-ovi koje ste primijetili ali niste stigli ispraviti, a znate rješenje (opis rješenja)**
  * Nisam odradio da je sa svake podstranice dostupno "O nama".

**IV  - Bug-ovi koje ste primijetili ali ne znate rješenje**
/

**V  - Lista fajlova u formatu NAZIVFAJLA - Opis u vidu jedne rečenice šta se u fajlu nalazi**

Folder Skice:
  * mainPage (Skica glavne stranice)
  * mainPage_mobilna (Skica glavne stranice za mobilne uređaje)
  * prijava (Skica stranice za prijavu korisnika)
  * prijava_mobilna (Skica stranice za prijavu korisnika za mobilne uređaje)
  * prodaja (Skica stranice za prodaju knjiga te moguću razmjenu)
  * prodaja_mobilna (Skica stranice prodaje prilagođena mobilnim uređajima)
  * kupovina (Skica stranice za kupovinu knjiga)
  * kupovina_mobilna (Skice mobilne stranice za kupovinu knjiga)
  * registracija (Skica stranice za registraciju korisnika)
  * registracija_mobilna (Skica stranice registracije prilagođena mobilnim uređajima)

Folder Project:
  * mainPage.html (Posjeduje informacije "O nama" te dostupne "Usluge" zajedno sa "welcome message")
  * prijava.html (Prijava korisnika)
  * registracija.html (Registracija korisnika)
  * kupi.html (Kupovina ili razmjena knjiga)
  * prodaj.html (Prodaja knjige)
 
Folder Project/lib/css:
  * mainPage.css
  * prijava.css
  * registracija.css
  * kupi.css
  * prodaj.css

