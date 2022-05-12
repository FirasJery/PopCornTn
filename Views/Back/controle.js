function Verif(){
    var string = [];
	var lowercase = /[a-z]/g;
	var uppercase = /[A-Z]/g;
	var numbers = /[0-9]/g;

    //Titre
    string = document.getElementById("nom").value;
	if((string[0] < 'A')||(string > 'Z') || (string == "")){
		console.log(string);
		let error = document.getElementById("e1").innerHTML = "<label id = 'e1' style = 'color: red; font-weight: bold;'>&emsp;*Titre doit commencer par une lettre majuscule</label>";
	}
	else{
		let error = document.getElementById("e1").innerHTML = "<label id = 'e1'></label>";
	}

    //Description
    string = document.getElementById("description").value;
	if(string == ""){
		console.log(string);
		let error = document.getElementById("e2").innerHTML = "<label id = 'e2' style = 'color: red; font-weight: bold;'>&emsp;*Description ne doit pas etre vide</label>";
	}
	else{
		let error = document.getElementById("e2").innerHTML = "<label id = 'e2'></label>";
	}

    //Realisateur
    string = document.getElementById("Realisateur").value;
	if((string[0] < 'A')||(string > 'Z') || (string == "")){
		console.log(string);
		let error = document.getElementById("e3").innerHTML = "<label id = 'e3' style = 'color: red; font-weight: bold;'>&emsp;*Realisateur doit commencer par une lettre majuscule</label>";
	}
	else{
		let error = document.getElementById("e3").innerHTML = "<label id = 'e3'></label>";
	}

    //Prix
    string = document.getElementById("Prix").value;
	if(!(string.match(numbers))){
		console.log(string);
		let error = document.getElementById("e4").innerHTML = "<label id = 'e4' style = 'color: red; font-weight: bold;'>&emsp;*Prix doit etre un entier</label>";
	}
	else{
		let error = document.getElementById("e4").innerHTML = "<label id = 'e4'></label>";
	}
}