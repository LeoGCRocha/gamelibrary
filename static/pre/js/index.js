$(document).ready(function() {

	if($('.carousel-item').length)
		$('.carousel').carousel({indicators: true, shift: 50});
	$('.modal').modal();
	$('.parallax').parallax();
	$('.sidenav').sidenav();
	$('.tabs').tabs();

	function setTopSectionSize() {

		let imgheight = parseInt( $('#backimg').css('height') );
		let newimgheight = imgheight * 0.309 + 'px';
		$('#topsection').css('height', newimgheight);
		
	}

	setTopSectionSize();

	$(window).resize(function() {

		setTopSectionSize();

	});

});
