# DrvenijaOnline
Online usluga za prodaju i razmjenu udžbenika osnovnih, srednjih škola i fakulteta.
www.drvenija.ba

**I  - Šta je urađeno?**

Mockup skice stranica(dostupni u folderu "Skice"):
  * mainPage
  * mainPage_mobilna
  * prijava
  * prijava_mobilna
  * registracija
  * registracija_mobilna
  * prodaja
  * prodaja_mobilna
  * kupovina
  * kupovina_mobilna

.html stranice(dostupni u folderu "Project"):
  * mainPage.html
  * prijava.html
  * registracija.html
  * kupi.html
  * prodaj.html
 
Odgovarajući css fajlovi(dostupni u folderu "Project/lib/css"):
  * mainPage.css
  * prijava.css
  * registracija.css
  * kupi.css
  * prodaj.css
  
**Dodatni komentari:**
  * Sve stranice su urađene po pravilima responzivnog dizajna i imaju grid view.
  * Korišten je media query na svim stranicama za kreiranje izgleda za mobilne uređaje. Pri sužavanju ekrana elementi menija inače prikazani u gornjem desnom uglu se smještaju u dropdown meni "Meni".
  * Meni web stranice je konzistentan (bez glitcheva) i prisutan na svim podstranicama te je prilagođen mobilnim uređajima.
  * HTML i CSS su formatirani i validirani.
  * Implementirane su 4 html  forme (Registracija(registracija.html), Prijava(prijava.html), Pretraga(kupi.html) i Prodaj(prodaj.html)
  
**II  - Šta nije urađeno?**
  * Linkovanje sa dugmadi "Drvenija.ba" na početnu mainPage.html nije dostupno (na samoj glavnoj stranici te na svim podstranicama. **Potrebno je koristiti JavaScript** Isto vrijedi za dugmad "Prodaj/razmjeni" te "Kupi" na mainPage.html
  * Imenovanje varijabli treba preurediti da budu konzistentni jer sam koristio nazive koji su ili engleski ili bosanski ili miks to dvoje.

**III - Bug-ovi koje ste primijetili ali niste stigli ispraviti, a znate rješenje (opis rješenja)**
  * Na mainPage-u kada pritisnem "O nama" u meniju stranica scrolla na sekciju "O nama" ali prekrije naslov i jedan dio teksta. To je zato što sam stavio da mi je red "meni" position: fixed. *Ovo ću riješiti JavaScriptom da kada se pozove klik "O nama" stranica će se spustiti na datu poziciju i podići funkcijom par piksela prema gore da se dobije željeni efekat.

Navedeno pod III:
  * Linkovanje sa dugmadi "Drvenija.ba" na početnu mainPage.html nije dostupno (na samoj glavnoj stranici te na svim podstranicama. **Potrebno je koristiti JavaScript** Isto vrijedi za dugmad "Prodaj/razmjeni" te "Kupi" na mainPage.html
  * Linkovanje na dugmadi "Kupi", "Razmjeni" te "Tračaj" na stranici "kupi.html" također nije urađeno iz razloga gore navedenog.
  * Dugme "Tračaj" na mainPage.html-u koje je dropdown dugme sa opcijama dijeljenja nije implementirano jer zahtjeva JavaScript.

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

