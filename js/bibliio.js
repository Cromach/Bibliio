/////////////////////////////////////////////////////////////////////////Swiper

var swiper = new Swiper('.swiper-container', {
	slidesPerView: 4,
	spaceBetween: 0,
	slidesPerGroup: 1,
	autoHeight: true,
	effect: 'coverflow',
	centeredSlides: true,
	coverflowEffect: {
		rotate: 30,
		slideShadows: false,
		depth: 120,
	},
	loop: true,
	pagination: {
	  el: '.swiper-pagination',
	  clickable: true,
	},
	navigation: {
	  nextEl: '.swiper-button-next',
	  prevEl: '.swiper-button-prev',
	},
});

/////////////////////////////////////////////////////////////////////////Bootstrap

$(function () {
	$('[data-toggle="tooltip"]').tooltip()
})

