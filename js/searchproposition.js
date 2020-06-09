var $selectProposType = $('#typeFilterPropos');
var $selectProposNbSerie = $('#nbSeriePagePropos');
var $selectPropos = $('.select-filter-propos');
var $searchPropos = $('.search-propos');
var $lipaginationpropos = $('.page-number-propos');
var $lipaginuppropos = $('.page-up-propos');
var $lipagindownpropos = $('.page-down-propos');

function countSeriesPropos() {
	$.ajax({
		url : 'ajax/seriecount.php',
		type : 'POST',
		data : 'filtres=' + $selectProposType.val() + '&search=' + $searchPropos.val(),
		dataType : 'text',
		async: false, //On met en synchrone sinon la requête arrive trop tard pour être réutilisée par la fonction paginationPropos()
	   
	   
		success : function(data){
			console.log(data);
			$("#nbseriepropos").html(data);
		},
	   
    });

}

function insertSearchPropos() {
	//console.log($selectProposType.val());
	//console.log($searchPropos.val());
	//console.log($selectProposNbSerie.val());
	//console.log($('#hiddenpage').val());
	$("#accordionpropos").load("templates/searchproposition.php", {
		filtres : $selectProposType.val(),
		search : $searchPropos.val(),
		nbSeriePage : $selectProposNbSerie.val(),
		page : $('#hiddenpagepropos').val()
	});
}

$selectPropos.change(function(){
	resetpaginationPropos();
	insertSearchPropos();
});

$searchPropos.change(function(){
	resetpaginationPropos();
	insertSearchPropos();
});

function cleanActivePropos() {
	$lipaginationpropos.each(function (i) {
		$(this).removeClass("active");
	});
}

function resetpaginationPropos() {
	countSeriesPropos();
	$('#hiddenpagepropos').val(1);
	paginationPropos();
}

function paginationPropos() {
	cleanActivePropos();
	var page=$('#hiddenpagepropos').val();
	//console.log(page);
	var nbSerie=$('#nbseriepropos').text();
	//console.log(nbSerie);
	var nbSeriePage = $selectProposNbSerie.val()
	var nbPage = Math.ceil(nbSerie / nbSeriePage); 
	console.log(nbPage);
	var pageinf2 = parseInt(page) - 2;
	var pageinf1 = parseInt(page) - 1;
	var pagesup1 = parseInt(page) + 1;
	var pagesup2 = parseInt(page) + 2;
	//console.log(pagesup1);
	
	if(nbPage<=1) {$('#paginationPropos').hide(); console.log("OUI");}
	else $('#paginationPropos').show();
	if(nbPage==2 && page==nbPage) { $('#pageinfpropos').hide(); $('#pagesuppropos').show();}
	if(nbPage==2 && page==1) { $('#pagesuppropos').hide(); $('#pageinfpropos').show();} 
	if(nbPage>2) { $('#pagesuppropos').show(); $('#pageinfpropos').show();} 
	
	if(page==1) {
		$('#previouspagelipropos').toggleClass('disabled');
		$('#pageinfpropos').text(page);
		$('#pageinflipropos').toggleClass("active");
		$('#pagemidpropos').text(pagesup1);
		$('#pagesuppropos').text(pagesup2);
		$('#nextpagelipropos').removeClass('disabled');
	} else if(page==nbPage) {
		$('#previouspagelipropos').removeClass('disabled');
		$('#pageinfpropos').text(pageinf2);
		$('#pagemidpropos').text(pageinf1);
		$('#pagesuppropos').text(page);
		$('#pagesuplipropos').toggleClass("active");
		$('#nextpagelipropos').toggleClass('disabled');
	} else {
		$('#previouspagelipropos').removeClass('disabled');
		$('#pageinfpropos').text(pageinf1);
		$('#pagemidpropos').text(page);
		$('#pagemidlipropos').toggleClass("active");
		$('#pagesuppropos').text(pagesup1);
		$('#nextpagelipropos').removeClass('disabled');
	}
}

$lipaginationpropos.click(function(){
	$('#hiddenpagepropos').val($(this.children).text());
	insertSearchPropos();
	paginationPropos();
});

$lipaginuppropos.click(function(){
	if(!$(this).hasClass( "disabled" )) {
	var nbSerie=$('#nbseriepropos').text();
	var nbSeriePage = $selectProposNbSerie.val()
	var nbPage = Math.ceil(nbSerie / nbSeriePage);
	$('#hiddenpagepropos').val(nbPage);
	insertSearchPropos();
	paginationPropos();
	}
	else console.log("Ce bouton est désactivé");
});



$lipagindownpropos.click(function(){
	if(!$(this).hasClass( "disabled" )) {
	$('#hiddenpagepropos').val(1);
	insertSearchPropos();
	paginationPropos();
	}
	else console.log("Ce bouton est désactivé");
});

$("#paginationPropos").ready(function(){
insertSearchPropos();
paginationPropos();
});


