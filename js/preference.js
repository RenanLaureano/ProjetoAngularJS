
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

var now;
var Minnow = 2;
var passes = 0;
var MinPasses = 3;
var NowMax = 3;
var passes = 0;
var canPost = false;

function teste (teste){
	
	if(this.now == null)
		this.NowMax = new Date().getTime() + Minnow;

	this.now = new Date().getTime();
	this.passes++;

	if(this.NowMax < this.now || this.MinPasses < this.passes)
		this.canPost = true;


	if(this.canPost){
		console.log($("#busca-id").val());
		this.now = null;
		this.passes = 0;
		this.canPost = false;

	}

}

function usuario(){

}