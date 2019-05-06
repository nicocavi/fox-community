var inicio_reg = document.querySelector("#inicio");
var registro_reg = document.querySelector("#registro");
var menu_perfil = document.querySelector("#menu-perfil");

var b_inicio, b_regi, b_perfil = false;

function inicio(){
	if(b_regi){
		registro_reg.style.display = "none";
		b_regi = false;
	}

	if(!b_inicio){
		inicio_reg.style.display = "block";
		b_inicio = true;
	}else{
		inicio_reg.style.display = "none";
		b_inicio = false;
	}
}

function registro(){
	if(b_inicio){
		inicio_reg.style.display = "none";
		b_inicio = false;
	}

	if(!b_regi){
		registro_reg.style.display = "block";
		b_regi = true;
	}else{
		registro_reg.style.display = "none";
		b_regi = false;
	}
}

function perfil(){
	if(!b_perfil){
		menu_perfil.style.display = "block";
		b_perfil = true;
	}else{
		menu_perfil.style.display = "none";
		b_perfil = false;
	}
}