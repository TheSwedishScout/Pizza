function init(){
	ajaxRequest("php/getPizza.php?pizza="+pizzaID, printPizza, "GET");
	
}
function printPizza(data) {
	var pizzor = JSON.parse(data)[0];
	debugger;
	document.title = pizzor.name;
	var namnElem =  document.getElementById("namn");
	namnElem.innerText = pizzor.name;
	var ingredienserUl = document.getElementById("pizzaIngredients");
	for (var x = 0; x < pizzor.ingredients.length; x++) {
		var ingridiens = pizzor.ingredients[x];
		var ingridiensID = pizzor.ingredientsID[x];
		var ingredSak = document.createElement("li");
		ingredSak.innerText = ingridiens;
		ingredSak.classList.add(ingridiensID); // escape html
		ingredienserUl.appendChild(ingredSak);
	}
	var pizzeriorUl = document.getElementById("pizzerior");
	for (var x = 0; x < pizzor.pizzerior.length; x++) {
		
		var pizzeriaLi = document.createElement("li");
		var pizzeriaInfoUl = document.createElement("ul");

			var pizzeriaInfoNamn = document.createElement("li");
			pizzeriaInfoNamn.innerText = pizzor.pizzerior[x].name;
			pizzeriaInfoUl.appendChild(pizzeriaInfoNamn);
			var pizzeriaInfoOpen = document.createElement("li");
			pizzeriaInfoOpen.innerText = pizzor.pizzerior[x].opening;
			pizzeriaInfoUl.appendChild(pizzeriaInfoOpen);
			var pizzeriaInfoClose = document.createElement("li");
			pizzeriaInfoClose.innerText = pizzor.pizzerior[x].closing;
			pizzeriaInfoUl.appendChild(pizzeriaInfoClose);

		pizzeriaLi.appendChild(pizzeriaInfoUl);
		pizzeriorUl.appendChild(pizzeriaLi);
	}
	pizzerior

}


document.addEventListener("DOMContentLoaded", init);