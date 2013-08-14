<?php if(!defined('BASEPATH')) exit('Falha no carregamento do script!');
// Define que o arquivo terá a codificação de saída no formato CSS
//header("Content-type: text/css"); 

?>
<style type="text/css">
@font-face {
	font-family: 'Tangerine';
	font-style: normal;
	font-weight: 400;
	src: url('<?php echo BASEFONTES ?>woff/fonte1.woff');
	}

@font-face {
	font-family: 'Yanone Kaffeesatz';
	font-style: normal;
	font-weight: 400;
	src: url('<?php echo BASEFONTES ?>woff/fonte2.woff');
	}
  
@font-face{
	font-family: neuropol;
	src: url('<?php echo BASEFONTES ?>neuropol.ttf');
	}

html{
	height: 100%;
	}

*{
	margin: 0;
	padding: 0;
	}

body{
	font: normal .80em 'trebuchet ms', arial, sans-serif;
	background: #F7F7F7 url(<?php echo BASEIMAGES ?>pattern.png) fixed;
	color: #555;
	}

p{
	padding: 0 0 20px 0;
	margin:	0 auto;
	font-size: 107%;
	font-family: arial;
	line-height:	1.5em;
	}

img{
	border: 0;
	}

h1{
	font: normal 250% 'Yanone Kaffeesatz', arial, sans-serif;
	color: #444;
	margin: 0 0 15px 0;
	padding: 5px 0 5px 0;
	}

h2{
	font: normal 250% 'Yanone Kaffeesatz', arial, sans-serif;
	color: #008FFC;  
	margin: 0 0 15px 0;
	padding: 10px 0 10px 0;
	}

h3{
	font: normal 200% 'Yanone Kaffeesatz', arial, sans-serif;
	margin: 20px 0 20px 0;
	color: #444;
	}

h4{
	margin: 0;
	padding: 0 0 5px 0;
	font: normal 170% 'Yanone Kaffeesatz', arial, sans-serif;
	color: #F14E23;
	}

h5{
	font: italic 140% 'Yanone Kaffeesatz', arial, sans-serif;
	color: #888;
	padding-bottom: 15px;
	}

h6{
	font: italic 110% 'Yanone Kaffeesatz', arial, sans-serif;
	color: #362C20;
	}

a{
	outline: none;
	text-decoration: none;
	color: #008FFC;
	}

a:hover{
	color: #F14E23;
	}

ul{ 
	margin: 2px 0 22px 17px;
	}

ul li{ 
	list-style-type: circle;
	margin: 0 0 0 0; 
	padding: 0 0 4px 5px;
	}

ol{ 
	margin: 8px 0 22px 20px;
	}

ol li{ 
	margin: 0 0 11px 0;
	}

#main, #header, #logo, #menubar, #site_content, #footer{
	margin-left: auto; 
	margin-right: auto;
	}

#main{ 
	width: 950px;
	margin: 20px auto;
	}

#header{ 
	width: 952px;
	height: 145px;
	}

#logo{ 
	width: 950px;
	float: left;
	height: 100px;
	background: transparent;
	padding: 0;
	}

#logo a img{
	padding: 5px 0 0 17px;
	float: left;
	transition:All 1s ease;
    -webkit-transition:All 1s ease;
    -moz-transition:All 1s ease;
    -o-transition:All 1s ease;
	}
	
#logo a img:hover{
	transform: scale(1.05);
    -webkit-transform: scale(1.05);
    -moz-transform: scale(1.05);
    -o-transform: scale(1.05);
    -ms-transform: scale(1.05);
	}
  
.unidade{ 
	float: 			left; 
	padding-left: 	25px;
	padding-top:	20px;
	text-align: 	left; 
	font: 			200% 'Yanone Kaffeesatz', arial; 
	color: 			#111;
	transition:All 1s ease;
    -webkit-transition:All 1s ease;
    -moz-transition:All 1s ease;
    -o-transition:All 1s ease;
	}
	
.unidade:hover{
	transform: scale(1.05);
    -webkit-transform: scale(1.05);
    -moz-transform: scale(1.05);
    -o-transform: scale(1.05);
    -ms-transform: scale(1.05);
	}
  
#almoxerife{
	margin-top:	5px;
	margin-right:	30px;
	color: #555;
	float: right;
	transition:All 1s ease;
    -webkit-transition:All 1s ease;
    -moz-transition:All 1s ease;
    -o-transition:All 1s ease;
	}

#almoxerife:hover{
	transform: scale(1.05);
    -webkit-transform: scale(1.05);
    -moz-transform: scale(1.05);
    -o-transform: scale(1.05);
    -ms-transform: scale(1.05);
	}
  
#logo h1{
	font: 310% neuropol;
	margin: 0 auto;
	padding: 0;
	text-align: right;
	}

#logo h1 a{
	color: #008FFC;
	text-decoration: none;
    }
	
#logo h1 a:hover{
	color: #555;
	text-decoration: none;
	}

#almoxerife span{
	margin: 0;
	padding: 0;
	padding-right:	10px;
	float: right;
	font: normal 150% 'Yanone Kaffeesatz', arial, sans-serif;
	color: #444;
	}
	
#menubar{ 
	height: 46px;
	margin: 0px auto -1px auto;
	float: right;
	padding: 0px 0 0 0;
	} 

ul#menu{ 
	float: right;
	}

ul#menu li{ 
	float: left;
	padding: 0 0 0px 0px;
	list-style: none;
	margin: 2px 0 0 0;
	background: transparent;
	}

ul#menu li a{ 
	font: normal 170% 'Yanone Kaffeesatz', sans-serif;
	text-decoration: none;
	display: block; 
	float: left; 
	height: 20px;
	padding: 6px 22px 15px 22px;
	text-align: center;
	background: #fff;
	border: 1px solid #ddd;
	border-bottom: 0;
	color: #F14E23;
	}

ul#menu li a:hover{
	color: #fff;
	/*início background gradient*/
	background: #f14e23; /* Old browsers */
	background: url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/Pgo8c3ZnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgd2lkdGg9IjEwMCUiIGhlaWdodD0iMTAwJSIgdmlld0JveD0iMCAwIDEgMSIgcHJlc2VydmVBc3BlY3RSYXRpbz0ibm9uZSI+CiAgPGxpbmVhckdyYWRpZW50IGlkPSJncmFkLXVjZ2ctZ2VuZXJhdGVkIiBncmFkaWVudFVuaXRzPSJ1c2VyU3BhY2VPblVzZSIgeDE9IjAlIiB5MT0iMCUiIHgyPSIwJSIgeTI9IjEwMCUiPgogICAgPHN0b3Agb2Zmc2V0PSIwJSIgc3RvcC1jb2xvcj0iI2YxNGUyMyIgc3RvcC1vcGFjaXR5PSIxIi8+CiAgICA8c3RvcCBvZmZzZXQ9IjEwMCUiIHN0b3AtY29sb3I9IiNmZmZmZmYiIHN0b3Atb3BhY2l0eT0iMSIvPgogIDwvbGluZWFyR3JhZGllbnQ+CiAgPHJlY3QgeD0iMCIgeT0iMCIgd2lkdGg9IjEiIGhlaWdodD0iMSIgZmlsbD0idXJsKCNncmFkLXVjZ2ctZ2VuZXJhdGVkKSIgLz4KPC9zdmc+);
	background: -moz-linear-gradient(top,  #f14e23 0%, #ffffff 100%); /* FF3.6+ */
	background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#f14e23), color-stop(100%,#ffffff)); /* Chrome,Safari4+ */
	background: -webkit-linear-gradient(top,  #f14e23 0%,#ffffff 100%); /* Chrome10+,Safari5.1+ */
	background: -o-linear-gradient(top,  #f14e23 0%,#ffffff 100%); /* Opera 11.10+ */
	background: -ms-linear-gradient(top,  #f14e23 0%,#ffffff 100%); /* IE10+ */
	background: linear-gradient(to bottom,  #f14e23 0%,#ffffff 100%); /* W3C */
	filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#f14e23', endColorstr='#ffffff',GradientType=0 ); /* IE6-8 */
	/*fim background*/
	}
	
ul#menu li.logout a{
	color: #CC0000;
	}
	
ul#menu li.logout a:hover{
	color: #fff;
	background: #cc0000; /* Old browsers */
	/* IE9 SVG, needs conditional override of 'filter' to 'none' */
	background: url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/Pgo8c3ZnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgd2lkdGg9IjEwMCUiIGhlaWdodD0iMTAwJSIgdmlld0JveD0iMCAwIDEgMSIgcHJlc2VydmVBc3BlY3RSYXRpbz0ibm9uZSI+CiAgPGxpbmVhckdyYWRpZW50IGlkPSJncmFkLXVjZ2ctZ2VuZXJhdGVkIiBncmFkaWVudFVuaXRzPSJ1c2VyU3BhY2VPblVzZSIgeDE9IjAlIiB5MT0iMCUiIHgyPSIwJSIgeTI9IjEwMCUiPgogICAgPHN0b3Agb2Zmc2V0PSIwJSIgc3RvcC1jb2xvcj0iI2NjMDAwMCIgc3RvcC1vcGFjaXR5PSIxIi8+CiAgICA8c3RvcCBvZmZzZXQ9IjEwMCUiIHN0b3AtY29sb3I9IiNmZmZmZmYiIHN0b3Atb3BhY2l0eT0iMSIvPgogIDwvbGluZWFyR3JhZGllbnQ+CiAgPHJlY3QgeD0iMCIgeT0iMCIgd2lkdGg9IjEiIGhlaWdodD0iMSIgZmlsbD0idXJsKCNncmFkLXVjZ2ctZ2VuZXJhdGVkKSIgLz4KPC9zdmc+);
	background: -moz-linear-gradient(top,  #cc0000 0%, #ffffff 100%); /* FF3.6+ */
	background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#cc0000), color-stop(100%,#ffffff)); /* Chrome,Safari4+ */
	background: -webkit-linear-gradient(top,  #cc0000 0%,#ffffff 100%); /* Chrome10+,Safari5.1+ */
	background: -o-linear-gradient(top,  #cc0000 0%,#ffffff 100%); /* Opera 11.10+ */
	background: -ms-linear-gradient(top,  #cc0000 0%,#ffffff 100%); /* IE10+ */
	background: linear-gradient(to bottom,  #cc0000 0%,#ffffff 100%); /* W3C */
	filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#cc0000', endColorstr='#ffffff',GradientType=0 ); /* IE6-8 */
	}	

#site_content{ 
	width: 950px;
	overflow: hidden;
	margin: 0 auto 0 auto;
	padding: 0;
	background: #fff;
	border: 1px solid #E7E7E7;
	}	

#sidebar_container{
	float: right;
	width: 250px;
	margin: 25px 0;
	visibility:	hidden;
	}

.sidebar{ 
	float: right;
	width: 200px;
	margin: 0 24px 27px 0;
	background: #FBFBFB;
	border: 1px solid #eee;
	padding: 0 15px 15px 15px;
	}

.sidebar h3, .content h1{ 
	padding: 10px 15px;
	margin: 0 1px;
	}

.sidebar h1{ 
	padding: 5px 0 0 0;
	}

.paperclip{ 
	float: left;
	position: relative; 
	z-index: 0;
	vertical-align: middle; 
	margin: -27px 0 -60px -30px;
	}

#content{
	text-align: justify;
	padding: 25px;
	margin: 0;
	}

#content ul{ 
	margin: 2px 0 22px 0px;
	}

#content ul li{ 
	list-style-type: none;
        background: url(<?php echo BASEIMAGES ?>;bullet.png) no-repeat;
	margin: 0 0 6px 0; 
	padding: 0 0 4px 25px;
	line-height: 1.5em;
	}

#footer{
	clear: both;
	width: 100%;
	font: 80% arial, sans-serif;
	height: 85px;
	padding: 20px 0 5px 0;
	text-align: center; 
	color: #555;
	background: transparent;
	margin-bottom: 20px;}

#footer p{ 
	padding: 0 0 10px 0;
	}

#footer a, #footer a:hover{ 
	color: #555;
	text-decoration: none;
	}

#footer a:hover{
	color: #008FFC;
	text-decoration: none;
	} 
 
table
{ margin: 10px 0 30px 0;}

table tr th, table tr td
{ background: #F5F5F5;
  color: #111;
  padding: 7px 4px;
  text-align: left;}
  
table tr td
{ background: #FBFBFB;
  color: #111;
  border-top: 1px solid #FFF;}
  
/*início do scroll to top*/
#top{
	text-align: center;
	float:left;
	display: none;
    margin: 0 auto;
    width:40px;
	height:40px;
	box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.4);
	background: #7cc5f9; /* Old browsers */
	/* IE9 SVG, needs conditional override of 'filter' to 'none' */
	background: url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/Pgo8c3ZnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgd2lkdGg9IjEwMCUiIGhlaWdodD0iMTAwJSIgdmlld0JveD0iMCAwIDEgMSIgcHJlc2VydmVBc3BlY3RSYXRpbz0ibm9uZSI+CiAgPGxpbmVhckdyYWRpZW50IGlkPSJncmFkLXVjZ2ctZ2VuZXJhdGVkIiBncmFkaWVudFVuaXRzPSJ1c2VyU3BhY2VPblVzZSIgeDE9IjAlIiB5MT0iMCUiIHgyPSIwJSIgeTI9IjEwMCUiPgogICAgPHN0b3Agb2Zmc2V0PSIwJSIgc3RvcC1jb2xvcj0iIzdjYzVmOSIgc3RvcC1vcGFjaXR5PSIxIi8+CiAgICA8c3RvcCBvZmZzZXQ9IjEwMCUiIHN0b3AtY29sb3I9IiMwMDhmZmMiIHN0b3Atb3BhY2l0eT0iMSIvPgogIDwvbGluZWFyR3JhZGllbnQ+CiAgPHJlY3QgeD0iMCIgeT0iMCIgd2lkdGg9IjEiIGhlaWdodD0iMSIgZmlsbD0idXJsKCNncmFkLXVjZ2ctZ2VuZXJhdGVkKSIgLz4KPC9zdmc+);
	background: -moz-linear-gradient(top,  #7cc5f9 0%, #008ffc 100%); /* FF3.6+ */
	background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#7cc5f9), color-stop(100%,#008ffc)); /* Chrome,Safari4+ */
	background: -webkit-linear-gradient(top,  #7cc5f9 0%,#008ffc 100%); /* Chrome10+,Safari5.1+ */
	background: -o-linear-gradient(top,  #7cc5f9 0%,#008ffc 100%); /* Opera 11.10+ */
	background: -ms-linear-gradient(top,  #7cc5f9 0%,#008ffc 100%); /* IE10+ */
	background: linear-gradient(to bottom,  #7cc5f9 0%,#008ffc 100%); /* W3C */
	filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#7cc5f9', endColorstr='#008ffc',GradientType=0 ); /* IE6-8 */
	border: 1px solid #008FFC;
	border-radius:	5px;
	/*background:url(../images/subir.png) no-repeat left top;*/
   	}
	
#top:hover {
	background: #b9def7; /* Old browsers */
	/* IE9 SVG, needs conditional override of 'filter' to 'none' */
	background: url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/Pgo8c3ZnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgd2lkdGg9IjEwMCUiIGhlaWdodD0iMTAwJSIgdmlld0JveD0iMCAwIDEgMSIgcHJlc2VydmVBc3BlY3RSYXRpbz0ibm9uZSI+CiAgPGxpbmVhckdyYWRpZW50IGlkPSJncmFkLXVjZ2ctZ2VuZXJhdGVkIiBncmFkaWVudFVuaXRzPSJ1c2VyU3BhY2VPblVzZSIgeDE9IjAlIiB5MT0iMCUiIHgyPSIwJSIgeTI9IjEwMCUiPgogICAgPHN0b3Agb2Zmc2V0PSIwJSIgc3RvcC1jb2xvcj0iI2I5ZGVmNyIgc3RvcC1vcGFjaXR5PSIxIi8+CiAgICA8c3RvcCBvZmZzZXQ9IjEwMCUiIHN0b3AtY29sb3I9IiMzZWFiZjkiIHN0b3Atb3BhY2l0eT0iMSIvPgogIDwvbGluZWFyR3JhZGllbnQ+CiAgPHJlY3QgeD0iMCIgeT0iMCIgd2lkdGg9IjEiIGhlaWdodD0iMSIgZmlsbD0idXJsKCNncmFkLXVjZ2ctZ2VuZXJhdGVkKSIgLz4KPC9zdmc+);
	background: -moz-linear-gradient(top,  #b9def7 0%, #3eabf9 100%); /* FF3.6+ */
	background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#b9def7), color-stop(100%,#3eabf9)); /* Chrome,Safari4+ */
	background: -webkit-linear-gradient(top,  #b9def7 0%,#3eabf9 100%); /* Chrome10+,Safari5.1+ */
	background: -o-linear-gradient(top,  #b9def7 0%,#3eabf9 100%); /* Opera 11.10+ */
	background: -ms-linear-gradient(top,  #b9def7 0%,#3eabf9 100%); /* IE10+ */
	background: linear-gradient(to bottom,  #b9def7 0%,#3eabf9 100%); /* W3C */
	filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#b9def7', endColorstr='#3eabf9',GradientType=0 ); /* IE6-8 */
	}

#top:active, #top:focus {
	outline:none;
	}

#top img{
	margin: 0 auto;
	margin-top: 8px;
	}
/*fim do scroll to top*/

/*início dos input text e password*/
input[type=text], input[type=password]{
	font-family: "Helvetica Neue", Helvetica, sans-serif;
    font-size: 12px;
    outline: none;
	color: #777;
    padding-left: 10px;
    margin-top: 5px;
    margin-left: 0;
    width: 40%;
    height: 35px;
	background: #fff;
	border-top: 1px solid #aaa;
	border-left: 1px solid #ddd;
	border-right: 1px solid #ddd;
	border-bottom: 1px solid #ddd;
	}
	
input[type=text]:focus, input[type=text]:hover, input[type=password]:focus, input[type=password]:hover{
	border-top: 1px solid #008FFC;
	border-left: 1px solid #B9DEF7;
	border-right: 1px solid #B9DEF7;
	border-bottom: 1px solid #B9DEF7;
	}

/*fim do dos input text e password*/
 
/*início dos botões*/ 
input[type=submit]{
	font: normal 150% 'yanone kaffeesatz', arial, sans-serif;
    width: 150px;
    height: 35px;
	color: #fff;
	box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.4);
	background-image: -webkit-linear-gradient(#7CC5F9, #008FFC);
	background-image: -moz-linear-gradient(#7CC5F9, #008FFC);
	background-image: -ms-linear-gradient(#7CC5F9, #008FFC);
	background-image: linear-gradient(#7CC5F9, #008FFC);
	border: 1px solid #008FFC;
	border-radius:	2px;
	}

input[type=submit]:hover{
	background-image: -webkit-linear-gradient(#B9DEF7, #3EABF9);
	background-image: -moz-linear-gradient(#B9DEF7, #3EABF9);
	background-image: -ms-linear-gradient(#B9DEF7, #3EABF9);
	background-image: linear-gradient(#B9DEF7, #3EABF9);
	}
/*fim dos botões*/ 
  
/*Início estilo do formulário de login*/
form.login {
    margin: 0 auto;
    margin-top: 20px;
	margin-left: 120px;
	font-family: "Helvetica Neue", Helvetica, sans-serif;   
	color: #444;   
	-webkit-font-smoothing: antialiased;
	}
	
form.login label {
    color: #F14E23;
    display: inline-block;
    padding-top: 10px;
  	font: normal 175% 'yanone kaffeesatz',  arial, sans-serif;
	}
	
form.login input {
	font-family: "Helvetica Neue", Helvetica, sans-serif;
    font-size: 12px;
    outline: none;
	}
	
form.login input[type=text], form.login input[type=password] {
    color: #777;
    padding-left: 10px;
    margin: 10px;
    margin-top: 12px;
    margin-left: 60px;
    width: 290px;
    height: 35px;
	}
	
form.login input[type=submit]{
	margin-top: 12px;
    margin-left: 270px;
	font: normal 150% 'yanone kaffeesatz', arial, sans-serif;
	}
		
form.login p{
    font-size: 11px;
	padding:	20px;
    margin-left: 120px;
	}
	
form.login p a {
    color: #aaa;
	text-decoration: none;
	}
	
form.login p a:hover {
    color: #008FFC;
	}	
/*fim estilo do formulário de login*/

/*início do form fale conosco*/
#faleconosco form {
    margin: 0 auto;
	font-family: "Helvetica Neue", Helvetica, sans-serif;   
	color: #444;   
	-webkit-font-smoothing: antialiased;
	}
#faleconosco label{
    color: #F14E23;
    display: inline-block;
    font: normal 150% 'yanone kaffeesatz',  arial, sans-serif;
	}
#faleconosco input[type=text]{
	width: 60%;
	}
#faleconosco textarea{ 
	font-family: "Helvetica Neue", Helvetica, sans-serif;
    font-size: 12px;
    outline: none;
	color: #777;
    padding: 10px;
    margin-top: 5px;
    width: 97.5%; 
	background: #fff;
	border-top: 1px solid #aaa;
	border-left: 1px solid #ddd;
	border-right: 1px solid #ddd;
	border-bottom: 1px solid #ddd;
	}
#faleconosco textarea:hover, #faleconosco textarea:focus{ 
	border-top: 1px solid #008FFC;
	border-left: 1px solid #B9DEF7;
	border-right: 1px solid #B9DEF7;
	border-bottom: 1px solid #B9DEF7;
	}
#faleconosco input[type=submit]{
	margin-top: 5px;
    }
/*fim do form de fale conosco*/
#botoes{
	text-align: center;
	width: 95%;
    padding: 22px 22px 22px 22px;
	margin-bottom: 20px;
	}
#botoes a{
	font: normal 150% 'yanone kaffeesatz', arial, sans-serif;
    width: 150px;
    height: 35px;
	color: #fff;
	box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.4);
	background-image: -webkit-linear-gradient(#7CC5F9, #008FFC);
	background-image: -moz-linear-gradient(#7CC5F9, #008FFC);
	background-image: -ms-linear-gradient(#7CC5F9, #008FFC);
	background-image: linear-gradient(#7CC5F9, #008FFC);
	border: 1px solid #008FFC;
	border-radius:	2px;
	}

#botoes a:hover{
	background-image: -webkit-linear-gradient(#B9DEF7, #3EABF9);
	background-image: -moz-linear-gradient(#B9DEF7, #3EABF9);
	background-image: -ms-linear-gradient(#B9DEF7, #3EABF9);
	background-image: linear-gradient(#B9DEF7, #3EABF9);
	}
	
/*Início da div dos módulos*/
.modulo{
	width: 95%;
    box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.4);
	border-radius:	5px;
	padding: 0px 10px 0px 10px;
	border: 1px solid #ddd;
	margin-bottom: 20px;
	}
/*Fim da div dos módulos*/

select{
	font-family: "Helvetica Neue", Helvetica, sans-serif;
    font-size: 12px;
    outline: none;
	color: #777;
	margin-top: 5px;
    margin-left: 0;
	padding:5px;
    padding-top:10px;
	padding-left: 10px;
	width: 41.5%;
    height: 35px;
	list-style: none;
	overflow-y: auto;
	background: #fff;
	border-top: 1px solid #aaa;
	border-left: 1px solid #ddd;
	border-right: 1px solid #ddd;
	border-bottom: 1px solid #ddd;
	}
select:hover,select:active{
	border-top: 1px solid #008FFC;
	border-left: 1px solid #B9DEF7;
	border-right: 1px solid #B9DEF7;
	border-bottom: 1px solid #B9DEF7;
	}
option{
	background: #fff;
	padding: 10px 5px 10px 10px;
	outline: none;
	}
option:hover{
	background: #B9DEF7;
	color: #fff;
	}
input[type="checkbox"] {
	margin-right: 10px;
	}
input[type="radio"] {
	margin-right: 10px;
	}
</style>