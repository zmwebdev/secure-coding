# Broken Authentication

- https://www.owasp.org/index.php/Top_10-2017_A2-Broken_Authentication

## Ariketa

Login prozesua egiten duen aplikazio seguru bat diseinatu behar da. Formulario bat izango du erabiltzaileak bere izena eta pasahitza sartzeko. Erabiltzailek kredentzial egokiak baldin baditu, aplikazioaren gune nagusira sartuko da, bestela errore mezu bat eta berriro hasierako formulariora berbideratuko da. Kontutan hartzekoak: HTTP GET/POST, HTTPS, password, hash, session, Two-Factor authentication, Oauth2, 

### Pausoak

1 - Login aplikazio sinple bat egin: Formulario bat. Datu-base batean taula batean erabiltzaileak sartuak ditu. Pasahitzak bere horretan gordetzen dira.

2 - Pasahitzen kontrola. Luzera, asmatzeko zailtasuna ...

3 - Pasahitza Hash bezal gorde.

4 - MFA-2FA: Two-Factor authentication inplementatu.

5 - Robotak ekiditeko sistema. CAPTCHA

6 - Pasahitza behar ez duten loginak: Oauth, OpenID, ...

7 - Informazioa TSL/SSL HTTPS erabiliz bakarrik. Zertifikatuak.

8 - Pasahitza berreskuratzeko prozesua

9 - Besterik: ...



Puaso bakoitzean aplikazioaren segurtasu arazoak identifikatu eta soluzioak planteatuko dira. Garatu dugun aplikazioa "testeatuko" dugu (keyloger, CSRF, XSS, session, brute force, SSL/TLS decryption, session hijacking, ...) eta dituen zuloak identifikatu ondoren soluzioak inplementatuko dira. 