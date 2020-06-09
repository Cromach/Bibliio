var $selectType = $('#typeFilter');
var $selectNbSerie = $('#nbSeriePage');
var $select = $('.select-filter');
var $search = $('.search');
var $lipagination = $('.page-number');
var $lipaginup = $('.page-up');
var $lipagindown = $('.page-down');

function countSeries() {
	$.ajax({
		url : 'ajax/seriecount.php',
		type : 'POST',
		data : 'filtres=' + $selectType.val() + '&search=' + $search.val(),
		dataType : 'text',
		async: false, //On met en synchrone sinon la requête arrive trop tard pour être réutilisée par la fonction pagination()
	   
	   
		success : function(data){
			console.log(data);
			$("#nbserie").html(data);
		},
	   
    });

}

function insertSearch() {
	//console.log($selectType.val());
	//console.log($search.val());
	//console.log($selectNbSerie.val());
	//console.log($('#hiddenpage').val());
	$("#accordionSerie").load("templates/searchadmin.php", {
		filtres : $selectType.val(),
		search : $search.val(),
		nbSeriePage : $selectNbSerie.val(),
		page : $('#hiddenpage').val()
	});
}

$select.change(function(){
	resetPagination();
	insertSearch();
});

$search.change(function(){
	resetPagination();
	insertSearch();
});

function cleanActive() {
	$lipagination.each(function (i) {
		$(this).removeClass("active");
	});
}

function resetPagination() {
	countSeries();
	$('#hiddenpage').val(1);
	pagination();
}

function pagination() {
	cleanActive();
	var page=$('#hiddenpage').val();
	//console.log(page);
	var nbSerie=$('#nbserie').text();
	console.log(nbSerie);
	var nbSeriePage = $selectNbSerie.val()
	var nbPage = Math.ceil(nbSerie / nbSeriePage); 
	//console.log(nbPage);
	var pageinf2 = parseInt(page) - 2;
	var pageinf1 = parseInt(page) - 1;
	var pagesup1 = parseInt(page) + 1;
	var pagesup2 = parseInt(page) + 2;
	//console.log(pagesup1);
	
	if(nbPage<=1) $('#pagination').hide();
	else $('#pagination').show();
	if(nbPage==2 && page==nbPage) { $('#pageinf').hide(); $('#pagesup').show();}
	if(nbPage==2 && page==1) { $('#pagesup').hide(); $('#pageinf').show();} 
	if(nbPage>2) { $('#pagesup').show(); $('#pageinf').show();} 
	
	if(page==1) {
		$('#previouspageli').toggleClass('disabled');
		$('#pageinf').text(page);
		$('#pageinfli').toggleClass("active");
		$('#pagemid').text(pagesup1);
		$('#pagesup').text(pagesup2);
		$('#nextpageli').removeClass('disabled');
	} else if(page==nbPage) {
		$('#previouspageli').removeClass('disabled');
		$('#pageinf').text(pageinf2);
		$('#pagemid').text(pageinf1);
		$('#pagesup').text(page);
		$('#pagesupli').toggleClass("active");
		$('#nextpageli').toggleClass('disabled');
	} else {
		$('#previouspageli').removeClass('disabled');
		$('#pageinf').text(pageinf1);
		$('#pagemid').text(page);
		$('#pagemidli').toggleClass("active");
		$('#pagesup').text(pagesup1);
		$('#nextpageli').removeClass('disabled');
	}
}

$lipagination.click(function(){
	$('#hiddenpage').val($(this.children).text());
	insertSearch();
	pagination();
});

$lipaginup.click(function(){
	if(!$(this).hasClass( "disabled" )) {
	var nbSerie=$('#nbserie').text();
	var nbSeriePage = $selectNbSerie.val()
	var nbPage = Math.ceil(nbSerie / nbSeriePage);
	$('#hiddenpage').val(nbPage);
	insertSearch();
	pagination();
	}
	else console.log("Ce bouton est désactivé");
});

$lipagindown.click(function(){
	if(!$(this).hasClass( "disabled" )) {
	$('#hiddenpage').val(1);
	insertSearch();
	pagination();
	}
	else console.log("Ce bouton est désactivé");
});

$("#pagination").ready(function(){
insertSearch();
pagination();
});

$("#gererserie-list").click(function(){
	countSeries()
	insertSearch();
	pagination();
});
