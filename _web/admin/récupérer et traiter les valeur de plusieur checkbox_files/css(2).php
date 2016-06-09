.postbitlegacy .userinfo .postuseravatar, .postbitlegacy .userinfo .postuseravatar img { float: none; text-align: center; }
.stickies li:last-child { border-bottom: 5px solid #ccc; }
.navbit a:hover { border: 1px solid #ccf; }
.navbar { top: -15px; background: none; }
.toplinks form input.textbox { width: 105px; }
.remember { position: absolute; z-index: 999; }
.rank { text-align: center; }
#userinfo .rank { margin-left: 50px; }
.bbcode_code table { margin-bottom: 0; }
.bbcode_code td { border: none; }
pre, code, kbd, samp, tt { line-height: 125%; }

.above_body { 
	margin: 10px 20px 10px; 
	height: 70px; 
	background: none repeat scroll 0% 0% rgb(114, 146, 168); 
	-webkit-border-radius: 5px; 
	-moz-border-radius: 5px; 
	border-radius: 5px; 
	-moz-box-shadow: -2px 2px 2px #c8c8c8; 
	-webkit-box-shadow: -2px 2px 2px #c8c8c8; 
	box-shadow: -2px 2px 2px #c8c8c8; 
}
.doc_header { min-height: 20px; }

/* css commun pour barre (connect / no connect) */
.toplinks ul.isuser li.popupmenu ul li a:hover,
.toplinks form input,
.toplinks ul.nouser li a,
.toplinks .logindetails { -webkit-border-radius: 0px; -moz-border-radius: 0px; border-radius: 0px; }

/* contenu barre centrale above_body (user connect) */
#toplinks { left: 8px; right: auto; top: 18px; z-index: 10; }
.toplinks ul.isuser li.welcomelink a:hover { border-top: 1px solid #597f97; }
.toplinks ul.isuser li a:hover { background: #597f97; color:rgb(255, 255, 255); }

.toplinks ul.isuser li.welcomelink a:hover, 
.toplinks ul.isuser li a:hover, 
.toplinks .notifications a.popupctrl { -webkit-border-radius: 3px; -moz-border-radius: 3px; border-radius: 3px; }

.toplinks ul.isuser li a.active { 
	-webkit-border-top-left-radius: 3px; -moz-border-radius-topleft: 3px; border-top-left-radius: 3px;
	-webkit-border-top-right-radius: 3px; -moz-border-radius-topright: 3px; border-top-right-radius: 3px; 
	-webkit-border-bottom-left-radius: 0px; -moz-border-radius-bottomleft: 0px; border-bottom-left-radius: 0px;
	-webkit-border-bottom-right-radius: 0px; -moz-border-radius-bottomright: 0px; border-bottom-right-radius: 0px; 
}

.toplinks .notifications a.popupctrl:hover, 
.toplinks .nonotifications a.popupctrl:hover, 
.toplinks .nonotifications a.popupctrl.active , 
.toplinks .notifications a.popupctrl, 
.toplinks .notifications a.popupctrl.active { background: #597f97 url(images/misc/arrow.png) no-repeat right center; }

.toplinks ul.isuser .notifications .popupbody, 
.toplinks ul.isuser .nonotifications .popupbody { background: #597f97; border: 1px solid #597f97; }

.toplinks ul.isuser .notifications .popupbody li, 
.toplinks ul.isuser .notifications .popupbody li a{ border-top:1px solid #597f97; }

.toplinks ul.isuser li.popupmenu ul li { color: #ffffff; margin-top: 5px; }

/* contenu barre centrale above_body (user no connect) */
.toplinks ul.nouser { position: relative; top: -3px; left: 0; height: 26px; }
.toplinks form { 
	padding-left: 10px;
	padding-right: 10px;
	margin-left: 10px; 
	border-right: 1px solid rgb(90, 127, 151); 
	border-left: 1px solid rgb(206, 223, 235); 
	background: #597f97 url(images/gradients/selected-tab-gradient-with-top-alpha.png) repeat-x 0 -4px; color: #000000; 
}

.toplinks form input { padding-top: 0px; margin: 4px 5px 0 0; border: 1px solid #c0c0c0; }
.toplinks form input.cb_cookieuser_navbar { margin: 0; }

.toplinks form input.loginbutton, 
.toplinks ul.nouser li a {
	background: none;
	height: 19px;
	margin-right: 0;
	min-width: 70px;
	width: auto !important;
	text-align: center;
	color: rgb(255, 255, 255);
	text-decoration: none;
}

.toplinks form input.loginbutton {
	background:#597f97 url(images/gradients/selected-tab-gradient-with-top-alpha.png) repeat-x 0 -30px;
	-webkit-border-radius: 8px; -moz-border-radius: 8px; border-radius: 8px;
	border: 0;
}
.toplinks form input.loginbutton:hover { background:#597f97 url(images/gradients/selected-tab-gradient-with-top-alpha.png) repeat-x 0 -45px; }

.toplinks form input.loginbutton:hover, 
.toplinks form label:hover { cursor: pointer;  }

.toplinks form label { margin-right: 5px; }

.toplinks .logindetails { padding: 0; text-align: left; background: none; }
.toplinks ul.nouser li a {
	padding: 6px 10px 0 10px;
	border-right: 1px solid rgb(90, 127, 151);
	border-top: 1px solid rgb(206, 223, 235);
	border-left: 1px solid rgb(206, 223, 235);
	background:#597f97 url(images/gradients/selected-tab-gradient-with-top-alpha.png) repeat-x   0 -4px;
	color:#000000;
}
.toplinks ul.nouser li a:hover { background:#597f97 url(images/gradients/selected-tab-gradient-with-top-alpha.png) repeat-x 0 -2px; color:#000000; }

/* contenu barre bas above_body */
ul#navtabs li a.navtab { visibility: hidden; }
ul#navtabs li { border: 0; }
.navtabs > ul.floatcontainer li:hover a.popupctrl { border-color:#a7bec9; background-color: #a7bec9; }
.navtabs > ul.floatcontainer li:hover a.popupctrl.active, .navtabs > ul.floatcontainer li a.popupctrl.active { border-color:#a7bec9; background-color: #a7bec9; }
.navtabs .popupbody { border: 1px solid #a7bec9; background: none repeat scroll 0% 0% #a7bec9; }

/* suppression background profil */
.body_wrapper { background: none !important; }

/* profil block stats */
.userprof #usermenu, .member_summary dl, .userprof .member_blockrow { font-size: 11px; margin-bottom: 5px; }
.member_summary dl.stats dt { width: 100px; font-size: 10px; }
.member_summary dl.stats dd { width: 101px; }

/* Titre des discussions */
#pagetitle { padding: 15px 0px; }

/* autres ajustements */
body a, #forums a.username { color: rgb(50, 80, 120); }
div.author { font-size: 10px; margin-top: 2px; height: 18px; }
div.author span.label { margin-top: 6px; display: inline-block; }
.threadbit .nonsticky { background: white; }
.threadbit .alt { background: #eef; }
.threadbit .sticky { background: white; }
.threadbit .nonsticky a.threadstatus, .threadbit .sticky a.threadstatus { width: 40px; }
.postlistfoot ul.popupbody, .forumfoot ul.popupbody { width: 300px; }
.threadlisthead span.threadinfo, .threadbit .threadinfo { width: 69%; }
.threadlisthead span.threadlastpost, .threadbit .threadlastpost { width: 16%; }
.menusearch.popupmenu .popupbody { width: 280px; max-width: 280px; }
.forumbit_post .foruminfo .forumdata .datacontainer { padding-left: 52px; }
dl.icon_legends dd { margin-bottom: 8px; }
#nrreview .header { float: left; width: 150px; background: #eef; margin-right: 5px; }
#nrreview .header .datetime { float: none; }
#nrreview .header .username { font-weight: bold; }
#nrreview li { clear: both; }
#social_bookmarks_list { padding: 5px; }
#searchtypeswitcher li a { background-color: rgb(133, 166, 188); }

@media screen and (max-width: 1280px) {
  .threadbit .alt, .forumbit_post .forumstats li, .forumbit_post .forumstats_2 li { font-size: 9px; }
}

@media screen and (max-width: 1024px) {
  #vbmenu_community, #threadrating { display: none; }
}

.postbitlegacy .after_content { clear: none; }
#searchbits .threadinfo { width: 60%; }
li.activitybit .avatar img { width: 60px; height: 60px; }
.forumlastpost .lastpostby { display: inline-block; }
.forumlastpost .lastpostdate { float: right; margin-right: 10px; }
.forumbit_post .forumrow, .forumhead + .childforum .L2:first-child .forumrow, .forumhead + .L2 .forumrow { background: white; min-height: 1px; }
.forumbit_post .foruminfo { min-height: 30px; }
#usercp_content .threadbit .threadlastpost { width: 16%; }
.threadbit .nonsticky, .threadbit .discussionrow { background: white; }
a.firstunread, a.firstunread:hover { padding-right: 18px !important; }
.moderators h4, .moderators .commalist, .subforums h4, .subforums .commalist { float: none; clear: none; display: inline; }
#pollinfo { margin-right: 320px; }


form .rightcol { max-width: 700px; }

.content a { text-decoration: underline; }