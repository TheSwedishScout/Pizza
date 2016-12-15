När man söker efter ingrtediens så kollas det upp vad det är för id sedan kollar man ingenom ingrediens_lista med de som har den ingrediensen/erna, och senan visa de pizzor som man får fram med deras idn.

sökermann efter pizza namn så hämtar man id nummrena som passar till sökfrasen sedan tar man ingredienserna som passar till pizzans id nummer.


välg pizor som har ingredienserna 1 och 2 och minst 2 stämmer
SELECT pizza FROM `ingrediens_lista` WHERE ingrediens = 1 OR ingrediens = 3 GROUP BY pizza HAVING COUNT(pizza) = 2

lista pizzor
SELECT * FROM `ingrediens_lista`GROUP BY pizza
[pizzor
	[namn:ost, ingredieenser:[tomat,ost,ost,ost]]]




	lista bara ingredienser som används i valbara när man söker pizzor