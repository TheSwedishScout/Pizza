function init() {
	document.getElementById('save').addEventListener("click",save);
	ajaxRequest("php/listIngredients.php", printIngredienser, "GET");
}
function save(){
	var namn = document.getElementById('namn').value;
	if (namn !=""){
		var ingredients = document.getElementsByClassName('ingrediens');
		//debugger
		var usedIngredients = [];
		for (var i = ingredients.length - 1; i >= 0; i--) {
			if (ingredients[i].checked == true){
				usedIngredients.push(Number(ingredients[i].value));

			}

		}	
			var STRIngredients = usedIngredients.join();
			//debugger
			ajaxRequest("php/newpizzaDB.php?namn="+namn+"&ingredients="+STRIngredients, pizzzzza, "GET")

	}
	else{
		alert("namn på pizzan");

	}
}
function pizzzzza(data){
	var namnELEM = document.getElementById('namn');
	var ingredients = document.getElementsByClassName('ingrediens');
	for (var i = ingredients.length - 1; i >= 2; i--) {
	 	if(ingredients[i].value >2){
			ingredients[i].checked = false;
			//Noplla skuggningen med
			ingredients[i].parentElement.classList.remove("checked");
		}
	}
	namnELEM.value = "";
}
function printIngredienser(data){
	
	var div = document.getElementById("ingredienser");
	var reset = document.getElementById("reset");
	var ul = document.createElement("ul");

	var ingredienser = JSON.parse(data);
	ingredienser.sort(compare);
	var checkbox = [];
	var namn = [];
	for (var i = 0; i <=  ingredienser.length - 1; i++) {
		if (i>0 && ingredienser[i].typ != ingredienser[i-1].typ){
			
			ul = document.createElement("ul");
			//div.appendChild(ul);
			div.insertBefore(ul, reset);
		}else if (i == 0){
			div.insertBefore(ul, reset);
		}
		var li = document.createElement("li");
		li.classList.add("lista_ingrediens")
		ul.classList.add(ingredienser[i].typ);
		
		//check box
		checkbox[i] = document.createElement("input");
		checkbox[i].type = "checkbox";
		checkbox[i].name = ingredienser[i].namn; 
		checkbox[i].value = ingredienser[i].id;
		checkbox[i].classList.add("ingrediens");
		
		
		li.appendChild(checkbox[i]);
		//skriv ut Namn
		namn[i] = document.createElement("lable");
		namn[i].innerHTML = ingredienser[i].namn;
		
		namn[i].htmlFor = ingredienser[i].namn;
		li.appendChild(namn[i]);

		//Markerar ost och tomat från start
		if (ingredienser[i].id <= 2){
			
			checkbox[i].checked = true;
			li.classList.add("checked")
		}
		//Event lysnare
		li.addEventListener("click",CheckingBox);

		//checkbox[i].addEventListener("click", searchPizza);

		//lägg in i listan
		ul.appendChild(li);
		

	}
	div.insertBefore(ul, reset);
	function CheckingBox(e){
		
		//if sats om man trycker på namnet eller i boxen
		var checkboxen, listItem;
		if (e.toElement.tagName == "LABLE"){
			checkboxen = e.toElement.previousElementSibling;
			listItem = e.toElement.parentElement;
		}else{
			checkboxen = e.toElement.firstChild;
			listItem = e.toElement;
		}
		if (checkboxen.checked == false){
			
			checkboxen.checked = true;
			listItem.classList.add("checked")
		}else{
			checkboxen.checked = false;
			listItem.classList.remove("checked");
		}
		//		searchPizza();
	}
	function searchPizza(){
		
		var valdaIngredienser = [];
		var numChecked = 0;
		if (checkbox.length > 0){
			for (var i = checkbox.length - 1; i >= 0; i--) {
				if (checkbox[i].checked){
					valdaIngredienser.push(checkbox[i].value);
					ingrediens_namn = checkbox[i].name
					numChecked ++;
				}
			}
			if (numChecked > 0 ){
				var valdaIngredienserStr = valdaIngredienser.toString();
				
				ajaxRequest("php/getPizzas.php?ingredienser="+valdaIngredienserStr, printPizzas, "GET");
			}else{
				
				ajaxRequest("php/getPizzas.php", printPizzas, "GET");
			}
		}
		//debugger
		/*skrapa fram requestet för en lista med relevanta pizzorna*/

	}	
	function compare(a,b) {
	  if (a.typ < b.typ)
	    return -1;
	  if (a.typ > b.typ)
	    return 1;
	  if (a.typ == b.typ){
	  	if(a.namn > b.namn){
	  		return 1;
	  	}else{
	  		return -1;
	  	}
	  }

	  return 0;
	}
}

document.addEventListener("DOMContentLoaded", init);