
/*
   Alsacreations.com Script Global 2011-11-07
   @author Dew
*/

$(document).ready(function(){

	// Evitement
	$("#evitement a").focus(function() {
		$(this).closest("#evitement").addClass("focused");
	});
	
	var oldcr = false;
	// Placeholder sur la recherche
	/*
	$("#recherche-texte").focus(function(event) {
		if(!oldcr) oldcr = $(this).css("color");
		if($(this).val()=="recherche") $(this).attr("value","").css("color","#fff");
	});
	$("#recherche-texte").blur(function(event) {
		if($(this).val()=="" || $(this).val()=="recherche") {
			$(this).css("color",oldcr);
			$(this).val("recherche");}
	});
	*/

	// Reply
	$(".commentaire-repondre").click(function(event) {
		if($("#commentaire").val()) $("#commentaire").val($("#commentaire").val()+"\n");
		$("#commentaire").val($("#commentaire").val()+'@'+$(this).attr("title")+' : ');
		$("#commentaire").focus();
		return false;
	});

	// Notif
	$("#notif-close").click(function(event) {
		$("#notif").slideUp();
		document.cookie='hidenotif=1';
	});
  
	// Twitter
	$("#twitadd").click(function(event) {
		$(this).hide(500);
		$("#twitinput").slideDown(500);
	});
  
	$('#twitinput textarea').keyup(function() {
		var charLength = 140-($(this).val().length);
		if($(this).val().length > 140) $('#twitinput #twitchars').html('<span style="color:red">'+charLength+'</span>'); 
		else $('#twitinput #twitchars').html(charLength);
	});

});

/* Menu pour mobile
 * le script est dupliqué dans les fichiers suivants :
 * - emploi.alsacreations.com\www\js\emploi20131203.js
 * - forum.alsacreations.com\www\js\forum20131203.js
 * => En cas de modification, penser à les reporter partout.
 */
if (window.innerWidth<768) {
	var m = document.getElementById('menu'); 
	var n = document.getElementsByClassName('header-wrapper')[0];
	if (n) {
		n.classList.toggle('open-menu');
		m.insertAdjacentHTML('afterend','<button id="toggle-menu"><span class="farfaraway">Déplier/replier le menu</span></button>');
	}

	t = document.getElementById('toggle-menu');
	if(t) {
		t.onclick=function(){ 
			n.classList.toggle('open-menu');
		}
	}
} 
