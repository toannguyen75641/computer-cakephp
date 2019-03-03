$(document).ready(function() {
    $('#search').submit(function() {
	    var keyword = $('#keyword').val();
	    if(keyword == "") {
	    	return false;
	    }
    });
});