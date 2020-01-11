// JavaScript Document
$(document).ready(function(){
	$(window).load(function(){
		$(".loadtext").fadeOut(1200 , function(){
			$(this).parent().fadeOut(1300 , function(){
				$(this).remove()})});});
				
});
