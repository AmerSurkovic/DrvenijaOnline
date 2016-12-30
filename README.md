# DrvenijaOnline
Online usluga za prodaju i razmjenu udžbenika osnovnih, srednjih škola i fakulteta.
www.drvenija.ba

**I  - Šta je urađeno?**

  * Serializacija svih podataka u XML fajlove. Serijalizuju se podaci o korisnicima i udzbenicima.
    Admin moze raditi pregled, brisanje i editovanje svih unesenih podataka preko web stranice.
  * Korisnici su registrovani i zapisuju se u XML fajl te odatle citaju pri loginu. Admin ima svoj dashboard za sve trazene    funkcije.
  * Sesija je koristena za kontrolu pristupa.
  * Admin moze downloadovati 2 CSV fajla, o 2 tipa serijalizovanih podataka.
  * Admin moze downloadovati 2 PDF izvjestaja, o 2 tipa serijalizovanih podataka.
  * Admin username: admin Admin password: adminadmin
  * Na dashboardu admin moze pretrazivati dodane korisnike.
  * Realizovana je PHP validacija.
  * Korisnik se moze registrovati (obavljena je serijalizacija).

**II  - Šta nije urađeno?**
/

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
  * admin_izvjestaji.php (Download csva i pregled pdfova)
  * admin_korisnici.php (Dodavanje, edit i brisanje korisnika)
  * admin_udzbenici.php (Dodavanje, edit i brisanje udzbenika)
  * creatingPDF_korisnici.php (Generise pdf izvjestaj za korisnike)
  * creatingPDF_udzbenici.php (Generise pdf izvjestaj o udzbenicima)
  * downloadCSVkorisnici.php (Generise i downloaduje CSV o korisnicima)
  * downloadCSVudzbenici.php (Generise i downloaduje CSV o udzbenicima)
  * logout.php (Radi logout sesije)
  * livesearch.php (Pretrazuje usere u xmlu)
 
Folder Project/lib/css:
  * mainPage.css
  * prijava.css
  * registracija.css
  * kupi.css
  * prodaj.css

