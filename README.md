# DrvenijaOnline
Online usluga za prodaju i razmjenu udžbenika osnovnih, srednjih škola i fakulteta.
www.drvenija.ba

**I  - Šta je urađeno?**

  * Napravljena je MySQL baza 'drvenija' sa 3 tabele (users, books, comments)
    books->user je foreign key na odgovarajući users->id, comments->user je foreign key na odgovarajući users->id
  * Dodana je nova forma za komentare u admin dashboardu.
  * Napravljena su 2 PHP skripte, XMLtoDB_knjige i XMLtoDB_korisnici koje se pozivaju na dugmad dostupna u admin_izvjestaji.php formi te su u xml. Date skripte ubacuju u bazu XML čvorove koji nisu u bazi (poredeći po IDu).
  * Implementiran je CRUD nad svim tabelama kreiranim u MySQL bazi podataka 'Drvenija' u admin dashboardu.
  * Hosting na OpenShiftu je obavljen: http://drvenija-drvenija.44fs.preview.openshiftapps.com/Project/mainPage.php
  * Admin username: admin Admin password: adminadmin
  * Kreiran je REST web servis udzbenici_webService.php. Dati web servis je kreiran da vraća sve udžbenike za srednju ili osnovnu školu, u ovisnosti od parametra koji mu je poslan. Primjer web servis: "Project/udzbenici_webService.php?school=Osnovna".
  * Web servis je testiran putem POSTMAN alata te su screenshotovi priloženi u folderu 'Web service Postman Screenshots' folderu.
  * Korisnik se moze registrovati (obavljena je serijalizacija).

**II  - Šta nije urađeno?**

  * Login usera je još uvijek ostvaren putem XML-a (koji ne upisuje ID u xml) tako da registracija usera preko stranice pa korištenje funkcije migracije iz XML-a u DB će izazvati error ali sam spremio ispravan XML sa podacima koji nisu u DB te postoji funkcije XMLwrite_knjige.php i XMLwrite_korisnici.php koje sam koristio za ispravno pisanje u XML.
  * Error handling za brisanje reda u tabeli koji je vezan PK za red u drugoj tabeli koja ima FK nije ostvaren ali sam PHPMyAdmin to ne dozvoljava tako da će baza baciti error, što naravno nije ispravno rješenje ali barem neće proći bez greške.

**III - Bug-ovi koje ste primijetili ali niste stigli ispraviti, a znate rješenje (opis rješenja)**
/

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
  * mainPage.php (Posjeduje informacije "O nama" te dostupne "Usluge" zajedno sa "welcome message")
  * prijava.php (Prijava korisnika)
  * registracija.php (Registracija korisnika)
  * kupi.php (Kupovina ili razmjena knjiga)
  * prodaj.php (Prodaja knjige)
  * admin_dashboard.php (Search usera)
  * admin_izvjestaji.php (Download csva, pregled pdfova i migracija iz XMLa u bazu podataka)
  * admin_korisnici.php (CRUD nad users u DB)
  * admin_udzbenici.php (CRUD nad books u DB)
  * creatingPDF_korisnici.php (Generise pdf izvjestaj za korisnike)
  * creatingPDF_udzbenici.php (Generise pdf izvjestaj o udzbenicima)
  * downloadCSVkorisnici.php (Generise i downloaduje CSV o korisnicima)
  * downloadCSVudzbenici.php (Generise i downloaduje CSV o udzbenicima)
  * logout.php (Radi logout sesije)
  * livesearch.php (Pretrazuje usere u xmlu)
  * admin_komentari (CRUD nad comments u DB)
  * udzbenici_webService (REST servis koji vraća JSON objekat)
  * XMLtoDB_knjige (Skripta za migraciju iz knjige.xml u DB)
  * XMLtoDB_korisnici (Skripta za migraciju iz korisnici.xml u DB)
  * Folder 'Database scripts' su PHP skripte na kojima sam isprobavao rad nad bazom
  * Ubačena je također FPDF biblioteka! 
 
Folder Project/lib/css:
  * mainPage.css
  * prijava.css
  * registracija.css
  * kupi.css
  * prodaj.css

