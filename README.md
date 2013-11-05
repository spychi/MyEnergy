MyEnergy
===
Das soll ein kleines Tool werden um die Zählerstände (Strom, Heizung, Wasser) aufzunehmen und auszuwerten.

Es werden folgende Programme/Tools verwendet;

* Bootstrap 3
* Chart.js
* PHP

Weitere Ausbaustufen:

- Auswertung (Grafik) weiter bauen
- Wetterdaten vom Ort per Wetter API und Cron-Job wegschreiben
- Kosten für Wasser/Strom eingeben



SELECT * FROM energie
WHERE creationdate
BETWEEN date('2013-04-01') AND date('2013-08-31');


SELECT * FROM energie WHERE creationdate  = date('2013-04-01') ;