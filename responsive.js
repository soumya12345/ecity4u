$(document).ready(function(){
	// HTML markup implementation, overlap mode
	$( '#menu' ).multilevelpushmenu({
		containersToPush: [$( '#pushobj' )],
		menuWidth: '11%',
		menuHeight: '100%'
	});
});

$(window).resize(function () {
	$( '#menu' ).multilevelpushmenu( 'redraw' );
});
