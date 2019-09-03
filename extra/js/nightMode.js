//this js file change the background of the site to make it night mode view

window.addEventListener("load", init);

var bcolor = 0;

function init(){

	document.getElementById("night").addEventListener("click", nightmode_click);
	
	
}

function nightmode_click(evt){
	
	if(bcolor == 0){
		
	document.documentElement.style.backgroundColor = "#606060"
	
	bcolor = 1;
		
	}else if(bcolor == 1){
		
		document.documentElement.style.backgroundColor = "#FFF"
		
		bcolor = 0;
	}
	
	
	
	
	
}