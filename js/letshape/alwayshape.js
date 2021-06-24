window.onload = startnow;

function startnow() {
	

		var showroutine = document.getElementById("results");
		var choice1 = document.getElementById("option1");
		var choice2 = document.getElementById("option2");
		var choice3 = document.getElementById("option3");
		choice1.onclick = Gettips1;
		choice2.onclick = Gettips2;
		choice3.onclick = Gettips3;


	function Gettips1(){
			var xhr = new XMLHttpRequest();

			xhr.onreadystatechange = function(){
				if(xhr.readyState === 4){
					if(xhr.status === 200){
							showroutine.innerHTML = xhr.responseText;
						} else {
							alert("Error")
						}
					}
		}

		xhr.open("GET","./text/tips1.txt",true);
		xhr.send(null);
	}


	function Gettips2(){
			var xhr = new XMLHttpRequest();

			xhr.onreadystatechange = function(){
				if(xhr.readyState === 4){
					if(xhr.status === 200){
							showroutine.innerHTML = xhr.responseText;
						} else {
							alert("Error")
						}
					}
		}

		xhr.open("GET","./text/tips2.txt",true);
		xhr.send(null);

	}


	function Gettips3(){
			var xhr = new XMLHttpRequest();

			xhr.onreadystatechange = function(){
				if(xhr.readyState === 4){
					if(xhr.status === 200){
							showroutine.innerHTML = xhr.responseText;
						} else {
							alert("Error")
						}
					}
		}

		xhr.open("GET","./text/tips3.txt",true);
		xhr.send(null);

	}


var send = document.getElementById("sendform");
var avocado = document.getElementById("avo");
var avoextra = document.forms[1].avocado;
var cucumber = document.getElementById("cuc");
var cucextra = document.forms[1].cucumber;
var tomato = document.getElementById("tom");
var tomextra = document.forms[1].tomato;
var cheese = document.getElementById("cheese");
var cheextra = document.forms[1].cheese;
var olive = document.getElementById("olive");
var oliextra = document.forms[1].olive;
var onion = document.getElementById("onion");
var oniextra = document.forms[1].onion;
var veggieavo = document.getElementById("veggie1");
var veggiecuc = document.getElementById("veggie2");
var veggietom = document.getElementById("veggie3");
var veggieche = document.getElementById("veggie4");
var veggieoli = document.getElementById("veggie5");
var veggieoni = document.getElementById("veggie6");


send.onclick = makesalad;


function makesalad(){

if( avoextra.checked == true ){
	veggieavo.innerHTML="Slice avocado and carefully remove stone. Scoop out inside and dice.";
}

if( cucextra.checked == true){
	veggiecuc.innerHTML="Slice then dice cucumber.";	
}

if(tomextra.checked == true){
	veggietom.innerHTML="Slice then dice tomatoes.";
}
if(cheextra.checked == true){
	veggieche.innerHTML= "Dice the Feta Cheese in small squares.";
}
if(oliextra.checked == true){
	veggieoli.innerHTML= "Add some pieces of black olives";
}
if(oniextra.checked == true){
	veggieoni.innerHTML= "Peel onion and remove tops and slice.";
}


return false;

}



}