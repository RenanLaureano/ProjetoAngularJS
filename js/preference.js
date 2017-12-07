
$(function () {
   	var objSalvo = localStorage.getItem('objCor');
	if(objSalvo != null)
		document.getElementById("menu-color").style.backgroundColor = JSON.parse(objSalvo).cor;
});

function colorheader(color) {

var objCor = {'cor': color};

// Armazena no LocalStorage
localStorage.setItem('objCor', JSON.stringify(objCor));

// Obtém do LocalStorage
//var objSalvo = localStorage.getItem('objCor');
document.getElementById("menu-color").style.backgroundColor = color;
}