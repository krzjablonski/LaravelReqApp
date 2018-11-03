## Zarządzanie kandydatami w procesie rekrutacji (MVP)

Aplikacja pozwala przechowywać informacje o kandydatach w procesie rekrutacji. Kandydaci mogą sami się rejestrować i uzupełnić swoj profil. 

Rekruter z uprawnieniami administratora może przeglądać i edytować wszystkich kandydatów

###Główne zaimplementowane funkcje

- Podział użytkowników na dwie grupy: administratorzy i kandydaci
- Możliwość przechowywania i modyfikowania informacji o kandydatach
- Możliwość przechowywania plików .pdf z CV kandydatów

####Administrator - uprawnienia
- Administrator może dodawać, przeglądać, aktualizować i usuwać użytkowników.
- Ma dostęp do wszystkich plików CV

####Kandydat - uprawnienia
- Kandydat może zarejestrować się w aplikacji. 
- Kandydat może przeglądać i aktualizować swój profil
- Kandydat może przeglądać swój plik CV

###API
Wprowadzone restowe API pozwala na odczytywanie listy kandydatów oraz pobieranie informacji o pojedynczym kandydacie. Uwieżytelnianie przeprowadzane jest poprzez api_token.

#####Endpointy:
- pobranie wszystkich użytkowników: example.com/api/candidates
- pobranie pojedynczego użytkownika: example.com/api/candidates/{id}

W obu przypadkach zapytania należy przesłać metodą **GET** z api_tokenem jako parametrem.

##Rozwiązania do wprowadzenia przed wypuszczeniem ostatecznej wersji
- Zmiana hasła przez użytkownika
- Możliwość nadawania użytkownikom uprawnień
- Możliwość wysłania maila do użytkownika
- Mozliwosć dodania zdjęcia profilowego użytkownika

---------------------------------------------------------------------------------------------------

##Autor
Krzysztof Jabłoński

krz.jablonski@gmail.com
