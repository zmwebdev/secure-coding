## Praktika

Azpiegitura bat sortuko dugu WIFI AP bat sortuz eta bertatik pasatzen den trafikoa aztertu eta aldatuz. Ideia orain arte ikusi ditugun Vulnerabilities-ak probatzea da. Batez ere XSS injection egiteko erabili daiteke.


[Web Client]<----HTTP/HTTPS---->[WIFI AP <--> Proxy(netcat, bursuit, arp spoofing, ...)]<----->[internet]

- HTTP bidez form batetik bidalitako datuak irakurri
- HTTPS bidez form batetik bidalitako datuak irakurri
- Datuak aldatu
- Session lapurtu
- XSS injection egin
