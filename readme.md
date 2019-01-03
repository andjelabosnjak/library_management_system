<h1>Sustav za knjižnice - LIBRARY MANAGEMENT SYSTEM</h1>
<h4>Ime i prezime: Anđela Bošnjak</h4>
<hr>

## Instalacija

```
$ git clone https://github.com/andjelabosnjak/laravel-library.git
$ cd laravel-library
$ cp .env.example .env and fill your database information
$ composer install
$ php artisan key:generate
$ php artisan storage:link
$ php artisan migrate
$ php artisan db:seed
```
<h4>Opis projekta:</h4>
<p>
 <strong>Library management system </strong> je sustav koji omogućuje evidenciju knjiga iz knjižnice, posuđenih knjiga, evidenciju članova i uplaćenih članarina.
Prvim ulaskom na stranicu, korisnik vidi Home page sa sliderom, informacijama o knjižnici i kontakt informacijama. Korisnik koji nije prijavljen tretira se kao gost. Gost ima mogućost pregledati Home page, katalog knjiga, informacije o pojedinoj knjizi, pretraživati knjige i pregledavati kategorije knjiga. Kako bi stekao mogućnost posuđivanja knjiga, gost se mora registrirati i prijaviti na sustav. Registracija se vrši klikom na "Register" u gornjem desnom kutu na Home page-u nakon unosa svih potrebnih informacija poput imena, prezimena, e-mail adrese, tipa članarine i slično. Nakon registracije gost se može prijaviti u sustav čime postaje član. Ukoliko korisnik zaboravi svoju lozinku, ima mogućnost oporavka klikom na "Forgot your Password?" pri prijavi. Registrirani korisnik ima mogućnosti kao gost, ali i pogodnosti posuđivanja knjiga. Premium članovi također imaju mogućnost dostave knjige na kućnu adresu. Kroz online posuđivanje korisnik vidi je li knjiga dostupna, te ako je može poslati zahtjev za posuđivanje klikom na "Borrow a book" nakon čega dobiva statusnu poruku "Waiting for approval" i čega odobrenje administratora stranice. Ukoliko korisnik odobri/odbije posudbu knjige određenom koisniku, korisnik dobiva notifikaciju o uspješnom/neuspješnom iznajmljivanju knjige. Registrirani korisnik ima padajući izbornik iz kojeg može pristupiti povijesti posudbi, vlastitom profilu, notifikacijama i odjavi. Iz padajućeg izbornika, korisnik može pregledavati povijest posudbi iz knjižnice, gdje može vidjeti status posuđene knjige, tj. datum vraćanja knjige ukoliko je knjiga vraćena, a ukoliko je knjiga još uvijek izdata, broj dana do krajnjeg datuma za vratiti knjigu. Korisnik također ima svoj profil i može mijenjati podatke svog profila uključujući lozinku. Ukoliko korisnik kasni s vraćanjem knjige akumulira mu se kazna od 3$ za svaku knjigu koja nije vraćena na vrijeme. Ukoliko taj dug prijeđe 15$ ili ako članarina nije plaćena, korisnik prilikom pokušaja posudbe knjige dobiva obavijest kako prvo treba platiti dug, odnosno članarinu, popraćeno odgovarajućim notifikacijama.
Administrator sustava ima sve mogućnosti kao i registrirani korisnik. Također, pored toga u padajućem izborniku ima izbor "Administration", odnosno odvojeno sučelje za administratore. Administrator ima kontrolu nad čitavim sustavom i preko upravljačke ploče može upravljati korisnicima, članarinama, dugovima, odobravati ili odbijati posudbe, dodavati ili brisati knjige, dodavati ili brisati kategorije. Kod iznajmljivanja knjige postoji dugme "Return a book" te klik na njega označava da je knjiga vraćena, te datum vraćanja knjige postaje trenutni datum. 
</p>
