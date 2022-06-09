sitePath=null;

window.onload = function() {
    getSitePath();
    getSiteInformations();
    getTheme();
    getListPublications();
}

function getSitePath(){
    pathName = window.location.pathname;
    splitPath = pathName.split("/");
    sitePath = splitPath[4];
}

function getSiteInformations(){
    $.ajax({
		url: '../../../api/',
		type: 'GET',
		data: {sitePath: sitePath, action: 'getSiteInformations'},
		success: function(result) {
            const div = document.getElementById('blog-name');
            div.textContent = result['siteName'];
		}
	});
}

function getListPublications(){

    $.ajax({
		url: '../../../api/',
		type: 'GET',
		data: {sitePath: sitePath, action: 'listPublications'},
		success: function(result) {
			fillListPublications(result)
		}
	});
}

function fillListPublications(publications){
	publicationsLenght = Object.keys(publications).length;

	if(publicationsLenght == 0){
		$('#container-publicacoes').text("Nenhuma publicação no momento");
		return;
	}
	
	var i, response = ""; 
	for(i = 0; i < publicationsLenght; i++){
        publicationId = publications[i].publication_id;
		title = publications[i].publication_title;
		text = publications[i].publication_text;
		date = publications[i].publication_creationDate;
        haveImage = publications[i].publication_image;

		response += 
        "<div id="+ publicationId +" class='publicacao'>"+
        "<span class='data-publicacao'>"+ date +"</span>"+
        "<div class='titulo-publicacao'>"+ title +"</div>";
        if(haveImage==1){
            response += "<img class='imagem-publicacao' src='images/publication/"+ publicationId +".png'>";
        }
        response += 
        "<p>"+ text +"<p>"+
        "<div class='compartilhe-span'>Compartilhe com:</div>"+
        "<div class='botoes-compartilhar'>"+

		"<a href='https://www.facebook.com/sharer/sharer.php?u="+window.location.pathname+"'>"+
			"<img src='images/basic/facebook-button.png'>"+
    	"</a>"+

		"<a href='https://twitter.com/share?url="+window.location.pathname+"&text="+title+"'>"+
        	"<img src='images/basic/twitter-button.png'>"+
		"</a>"+

		"<a href='https://api.whatsapp.com/send?text="+title+" "+text+" Acesse esse conteúdo através do link abaixo: "+window.location.pathname+"' data-action='share/whatsapp/share'>"+
        	"<img src='images/basic/whatsapp-button.png'>"+
		"</a>"+

        "</div>"+
        "<hr>";
	}
    
	document.getElementById("container-publicacoes").innerHTML = response;
}


function getTheme(){
    $.ajax({
		url: '../../../api/',
		type: 'GET',
		data: {sitePath: sitePath, action: 'getTheme'},
		success: function(result) {
			fillTheme(result);
		}
	});

}

function fillTheme(array){
	fontOption = array["parameter_value"][0];
	hexColor = array["parameter_value"][1];
	backgroundImage = array["parameter_value"][2];
	backgroundOption = array["parameter_value"][3];

	document.body.style.fontFamily = fontOption;
	if(backgroundOption=="S"){
		document.body.style.background = hexColor;
	} else if(backgroundOption=="I"){
		document.body.style.backgroundImage = "url('../"+sitePath+"/images/background/backgroundImage.png')";
	}
}
