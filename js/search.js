var $addTag = $('#addTag');
var $rmvTag = $('#rmvTag');
var $filterstag = $('#filterstag');
var $selectType = $('#typeFilter');
var $selectNbSerie = $('#nbSeriePage');
var $dispRate = $('#dispRate');
var $search = $('.search');
var $lipagination = $('.page-number');
var $lipaginup = $('.page-up');
var $lipagindown = $('.page-down');

function countSeries() {
	//console.log($selectType.val());
	//console.log($search.val());
	//console.log($('#hiddencontainer').val());
	$.ajax({
		url : 'ajax/seriecount.php',
		type : 'POST',
		data : 'filtres=' + $selectType.val() + '&search=' + $search.val() + '&debug=' + true + '&tags=' + $('#hiddencontainer').val(),
		dataType : 'text',
		async: false, //On met en synchrone sinon la requête arrive trop tard pour être réutilisée par la fonction pagination()
	   
	   
		success : function(data){
			//console.log(data);
			$("#nbserie").html(data);
		},
	   
    });

}

function setFilters() {
	var insert;
	var filterstag = [];
		$('.filter').each(function (i, elem) {
				insert = "id_serie IN(SELECT t1.id_serie from serie t1 INNER JOIN tag_serie t2 ON t1.id_serie=t2.id_serie WHERE id_tag="+elem.id+")"
				filterstag.push(insert);
		});
		filterValue = filterstag.length ? filterstag.join(' AND ') : '';
		
		// add page number to the string of filters
	//console.log(filterstag);
	//console.log(filterValue);
   $('#hiddencontainer').val(filterValue);
   resetPagination();
   insertSearch();
}

function insertSearch() {
	if($dispRate.is(':checked')) var dispRate = "true";
	$("#accordionSerie").load("templates/search.php", {
		filtres : $selectType.val(),
		search : $search.val(),
		dispRate : dispRate,
		nbSeriePage : $selectNbSerie.val(),
		page : $('#hiddenpage').val(),
		tags : $('#hiddencontainer').val(),
	});
}

$selectNbSerie.change(function(){
	resetPagination();
	insertSearch();
});

$selectType.change(function(){
	resetPagination();
	insertSearch();
});

$dispRate.change(function(){
	resetPagination();
	insertSearch();
});

$search.change(function(){
	resetPagination();
	insertSearch();
});

$addTag.click(function(){
	//console.log($('#selectTag option:selected').val());
	//console.log($('#selectTag option:selected').text());
	if($('#selectTag option:selected').val()!="") {
		$filterstag.append( "<span class='filter' id='"+$('#selectTag option:selected').val()+"'> "+$('#selectTag option:selected').text()+"</span>");
		$("#selectTag option:selected").attr('disabled','disabled');
		$('#selectTag option[value=""]').prop('selected', true);
		$('#selectTag option[value=""]').prop('selected', false);
		setFilters();
	}

});

$rmvTag.click(function(){
		$('.filter').each(function (i, elem) {
				elem.remove();
		});
		$('#selectTag option').each(function (i, elem) {
				$(elem).prop('disabled', false);
		});
		setFilters();
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
	var nbSerie=$('#nbserie').text();
	var nbSeriePage = $selectNbSerie.val()
	var nbPage = Math.ceil(nbSerie / nbSeriePage); 
	var pageinf2 = parseInt(page) - 2;
	var pageinf1 = parseInt(page) - 1;
	var pagesup1 = parseInt(page) + 1;
	var pagesup2 = parseInt(page) + 2;

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

pagination();

/*$(accordionSerie).on('click',$pagination, function(){
   console.log('OK!' + $(this).text());
});*/


$("#pagination").ready(function(){
insertSearch();
pagination();
});
