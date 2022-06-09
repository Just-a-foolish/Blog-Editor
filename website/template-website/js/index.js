sitePath=null;

window.onload = function() {
    getSitePath();
    getListPublications();
}

function getSitePath(){
    pathName = window.location.pathname;
    splitPath = pathName.split("/");
    sitePath = splitPath[4];
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
        "<img src='images/basic/facebook-button.png'>"+
        "<img src='images/basic/instagram-button.png'>"+
        "<img src='images/basic/twitter-button.png'>"+
        "<img src='images/basic/whatsapp-button.png'>"+
        "</div>"+
        "<hr>";
	}
    
	document.getElementById("container-publicacoes").innerHTML = response;
}

