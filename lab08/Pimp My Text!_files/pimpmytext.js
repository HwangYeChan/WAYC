function alertHelloWorld(){
	alert("Hello, world!");
}

function fontTimer(){
	setInterval(function changeFontSize() {
	    var txt = document.getElementById("txt_area");
	    var currentSize=parseInt(txt.style.fontSize);
		if(isNaN(currentSize)){
			currentSize=12;
		}
		currentSize+=2;
		txt.style.fontSize=currentSize+"pt";
	},500);
}

function blingText(){
	var txt = document.getElementById("txt_area");
	var bling = document.getElementById("bling").checked;

	if(bling){
		txt.style.fontWeight="bold";
		txt.style.color="green";
		txt.style.textDecoration="underline";
	}
	else{
		txt.style.fontWeight="normal";	
	}
}

function toUpper(){
	var txt = document.getElementById("txt_area").value;
	var ret="";
	for(var i=0;i<txt.length;i++){
		if('a'<=txt[i] && txt[i]<='z'){
			ret+=txt[i].toUpperCase();
		}
		else{
			ret+=txt[i];
		}
	}
	sp=ret.split(".");
	ret=sp.join("-izzle.");
	document.getElementById("txt_area").value=ret;
}