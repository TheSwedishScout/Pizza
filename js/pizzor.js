function init(){
	ajaxRequest("php/getPizzas.php", printPizzas, "GET");
	ajaxRequest("php/listIngredients.php", printIngredienser, "GET");
	document.getElementById("reset").addEventListener("click", reset)
}
function reset(){
	var checkbox = document.getElementsByClassName("ingrediens");
	if (checkbox.length > 0){
		for (var i = checkbox.length - 1; i >= 0; i--) {
			if (checkbox[i].checked){
				checkbox[i].parentElement.classList.remove("checked");
				checkbox[i].checked = false;
			}
		}
		ajaxRequest("php/getPizzas.php", printPizzas, "GET");
	}
}
function printPizzas(data){
	//debugger;
	var ul = document.getElementById("pizzor");
	ul.innerHTML= "";
	var pizzor = JSON.parse(data)
	for (var i = 0; i <=  pizzor.length - 1; i++) {
		var li = document.createElement("li");
		li.classList.add("pizza")
		
		//Namn
		var namn = document.createElement("h2");
		namn.innerHTML = "<a href='pizza.php?pizza="+pizzor[i].id+"'>" + pizzor[i].name +"</a>";
		li.appendChild(namn);
		//ingredienser
		var ingredLista = document.createElement("ul");
		ingredLista.classList.add("pizzaIngredients");
		for (var x = 0; x < pizzor[i].ingredients.length; x++) {
			var ingridiens = pizzor[i].ingredients[x];
			var ingridiensID = pizzor[i].ingredientsID[x];
			var ingredSak = document.createElement("li");
			ingredSak.innerHTML = ingridiens;
			ingredSak.classList.add(ingridiensID); // escape html
			ingredLista.appendChild(ingredSak);
			
		}
		
		li.appendChild(ingredLista);

		var pizzerior = document.createElement("ul");
		pizzerior.classList.add("pizzerior");
		for (var x = 0; x < pizzor[i].pizzerior.length; x++) {
			/*pizzor[i].pizzerior[x]
			debugger*/
			var pizzeria = pizzor[i].pizzerior[x];
			var pizzeriaElem = document.createElement("li");
			pizzeriaElem.innerHTML = pizzeria;
			pizzerior.appendChild(pizzeriaElem);
		}
		li.appendChild(pizzerior);

		
		ul.appendChild(li);
		
	}


}


document.addEventListener("DOMContentLoaded", init);