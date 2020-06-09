var $checkboxes = $('.filter-item');
var $search = $('.search');
var $lipagination = $('.page-number');
var $lipaginup = $('.page-up');
var $lipagindown = $('.page-down');

function changeFilters() {
	var selector = '';
	var filterstag = [];
		// for each box checked, add its value and push to array
		$checkboxes.each(function (i, elem) {
			if (elem.checked) {
				selector = elem.value;
				filterstag.push(selector);
			}
		});
		// smash all values back together for 'and' filtering
		filterValue = filterstag.length ? filterstag.join(' AND ') : '';
		
		// add page number to the string of filters
	console.log(filterstag);
   $('#hiddencontainer').val(filterValue);
   insertSearch();
}

function insertSearch() {
	$("#accordionSerie").load("templates/searchadmin.php", { // N'oubliez pas l'ouverture des accolades !
		filtres : $('#hiddencontainer').val(),
		search : $search.val(),
		page : $('#hiddenpage').val()
	});
}

/*function pageActive(active) {
	$lipagination.each(function (i) {
		$(this).removeClass("active");
	});
	active.toggleClass("active");
}*/

function cleanActive() {
	$lipagination.each(function (i) {
		$(this).removeClass("active");
	});
}

function pagination() {
	var page=$('#hiddenpage').val();
	console.log(page);
	var nbSerie=$('#nbserie').text();
	//console.log(nbSerie);
	var nbPage = Math.ceil(nbSerie / 2); 
	//console.log(nbPage);
	var pageinf2 = parseInt(page) - 2;
	var pageinf1 = parseInt(page) - 1;
	var pagesup1 = parseInt(page) + 1;
	var pagesup2 = parseInt(page) + 2;
	console.log(pagesup1);
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



$checkboxes.change(function(){
	changeFilters();
});

$search.keyup(function(){
	insertSearch();
});

$lipagination.click(function(){
	cleanActive();
	$('#hiddenpage').val($(this.children).text());
	insertSearch();
	pagination();
});

$lipaginup.click(function(){
	if(!$(this).hasClass( "disabled" )) {
	var nbSerie=$('#nbserie').text();
	var nbPage = Math.ceil(nbSerie / 2);
	cleanActive();
	$('#hiddenpage').val(nbPage);
	insertSearch();
	pagination();
	}
	else console.log("Ce bouton est désactivé");
});

$lipagindown.click(function(){
	if(!$(this).hasClass( "disabled" )) {
	cleanActive();
	$('#hiddenpage').val(1);
	insertSearch();
	pagination();
	}
	else console.log("Ce bouton est désactivé");
});

/*$(accordionSerie).on('click',$pagination, function(){
   console.log('OK!' + $(this).text());
});*/


$("#accordionSerie").ready(function(){
insertSearch();
});


