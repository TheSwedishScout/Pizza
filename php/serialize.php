<?php

# SELECT namn FROM pizzerior WHERE pizzor LIKE '%3%' //får ut vilka pizzerior som har pizza nummer 3

/*
SELECT pizzerior.namn, pizzor.id, pizzor.pizzeria, pizzor.namn, ingredienser.namn FROM pizzor, ingredienser, pizzerior
WHERE pizzor.ingredienser = ingredienser.id && pizzor.pizzeria = pizzerior.id
*/
?>