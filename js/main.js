$(document).ready(function(){

var prueba = window.location;
var identidad = "http://localhost/udemy/proyecto-blog-con-libreria/index.php";

if (prueba != identidad){

    $('#menu').css("height","64px");
    
}


//acciones para el buscador


//todo
$('#button_todo').click(function(){
    $(".action_Reportajes").show();
    $(".action_Guias").show();
    $(".action_Analisis").show();
    $(".action_Noticias").show();

})

//Noticias
$('#button_noticias').click(function(){
    $(".action_Reportajes").hide();
    $(".action_Guias").hide();
    $(".action_Analisis").hide();
    $(".action_Noticias").show();

})

//Analisis
$('#button_analisis').click(function(){
    $(".action_Reportajes").hide();
    $(".action_Guias").hide();
    $(".action_Analisis").show();
    $(".action_Noticias").hide();

})


//Reportajes
$('#button_reportajes').click(function(){
    $(".action_Reportajes").show();
    $(".action_Guias").hide();
    $(".action_Analisis").hide();
    $(".action_Noticias").hide();

})

//guias
$('#button_guias').click(function(){
    $(".action_Reportajes").hide();
    $(".action_Guias").show();
    $(".action_Analisis").hide();
    $(".action_Noticias").hide();

})








    //tema de favoritos 
    //
    
    $('.icon').click(function(){
        if($(".icon").hasClass("negro")){
            $(".img_icon").attr("src","img/rojo.png");
            localStorage.icon_fav ="1";
        } else if($(".icon").hasClass("rojo")){
            $(".img_icon").attr("src","img/negro.png");
            localStorage.icon_fav ="2";
        }
    })
/*
    if( localStorage.icon_fav == "1"){
        $(".img_icon").attr("src","img/rojo.png");
        $(".text_icon").text("delete fav. ");
        $(".a_fav").attr('href', 'fav_delete.php');
        $(".icon").addClass("rojo");
        $(".icon").removeClass("negro");
    }
    if( localStorage.icon_fav == "2"){
        $(".img_icon").attr("src","img/negro.png");
        $(".text_icon").text("añadir fav. ");
        $(".a_fav").attr('href', 'fav_add.php');
        $(".icon").addClass("negro");
        $(".icon").removeClass("rojo");
    }
    */
    
    


    console.log($(document).scrollTop());
    $('#cambio2').attr('href', './assets/css/cambios/cabecera.css');
    if ($(document).scrollTop() >100){

    }
    






    //mostrar contraseña y volver a ponerla
    $('#mostrar').click(function(){
        if ($('#contrasena').attr('type') == "password"){
            //mostrar contraseña
            $('#contrasena').attr('type', 'text');
            //cambio
            $(this).css("font-size","large");
        }else{
            //ocultar contraseña
            $('#contrasena').attr('type', 'password');
            //cambio
            $(this).css("font-size","medium");            
        }
    })

    //slider
    $('.slider').bxSlider({
        auto: true,
        pager: false
    });

    //tabs
    $( "#tabs" ).tabs();


    //acordeon
    $( "#accordion" ).accordion();

    //jscroll
/*
    var options = {
        //loadingHtml: '<img src="loading.gif" alt="Loading" /> Loading...',
        padding: 2,
        nextSelector: 'a.jscroll-next:last',
        contentSelector: 'article',
    };

    $('.jscroll').jscroll(options);    */


    //ocultar comentarios


    $('#button').click(function(){

        if($('.comentario').css('display') == "block"){
            $('.comentario').css("display","none");
        }
         else if($('.comentario').css('display') == "none"){
            $('.comentario').css("display","block");
        }

        /*$('.comentario').css("display","none");
        $('.comentario').addClass("oculto");*/

        

    })

    $('textarea').click(function(){

        if($('#aviso').attr('disabled') == "disabled"){
            $( "#dialog" ).dialog();
        }
    })


    //CAMBIOS
    function cambios () {


        function todo (categoria) {
            var url = window.location.href;
            if (url.indexOf("categoria=" + categoria) != -1){
                return true;
            }
         };



    
        var url= "http://localhost/udemy/proyecto-blog-con-libreria/cada-categoria.php?nombre=";

        if ( window.location.href == url+"PS5" || todo("PS5") || todo(7)){
            localStorage.change= "PS5";
        }
         else if ( window.location.href == url+"XBOX" || todo("XBOX") || todo(10)){   
            localStorage.change= "xbox"; 
        }
         else if ( window.location.href == url+"Android" || todo("Android") || todo(1)){   
            localStorage.change= "android"; 
        }
        else if ( window.location.href == url+"PS4" || todo("PS4") || todo(6)){   
            localStorage.change= "PS4"; 
        }
        else if ( window.location.href == url+"Nintendo" || todo("Nintendo") || todo(3)){   
            localStorage.change= "nintendo"; 
        }
        else if ( window.location.href == url+"PC" || todo("PC") || todo(2)){   
            localStorage.change= "PC"; 
        }        
        else {
            localStorage.change= "defecto"; 
        }




        if (localStorage.change == 'xbox'){
            $('#cambio').attr('href', './assets/css/cambios/xbox.css');
            $('.prueba_sub').css("display","block");
            $('._10').css("display","block");
            //alert("xbox");
          }
    
        else if ((localStorage.change == 'PS5')) {
            $('#cambio').attr('href', './assets/css/cambios/ps.css');
            $('.prueba_sub').css("display","block");
            $('._7').css("display","block");
            
        }
        else if ( (localStorage.change == 'PS4') ) {
            $('#cambio').attr('href', './assets/css/cambios/ps.css');
            $('.prueba_sub').css("display","block");
            $('._6').css("display","block");
            
        }        
        else if (localStorage.change == 'android') {
            $('#cambio').attr('href', './assets/css/cambios/android.css');
            $('.prueba_sub').css("display","block");
            $('._1').css("display","block");
            
        }
        else if (localStorage.change == 'nintendo') {
            $('#cambio').attr('href', './assets/css/cambios/nintendo.css');
            $('.prueba_sub').css("display","block");

            //prueba
            $('._3').css("display","block");
            
        } 
        else if (localStorage.change == 'PC') {
            $('.prueba_sub').css("display","block");
            $('._2').css("display","block");
            
        }                                
        else if (localStorage.change == 'defecto') {
            $('#cambio').attr('href', '');
        }




        function estamos (origen) {
            var url = window.location.href;
            if (url.indexOf(origen) != -1){
                return true;
            }
         };


        var entrada = "http://localhost/udemy/proyecto-blog-con-libreria/individual.php?";
        var _403 = "http://localhost/udemy/proyecto-blog-con-libreria/error.php";
        var sub = "http://localhost/udemy/proyecto-blog-con-libreria/cada-subcategoria.php?";
        var registro = "http://localhost/udemy/proyecto-blog-con-libreria/registrarse.php";
        var busqueda ="http://localhost/udemy/proyecto-blog-con-libreria/buscador.php";

        if ( estamos(entrada) || estamos(_403) || estamos(sub) || estamos(registro) || estamos(busqueda) ){

            $('.bx-wrapper').css("display","none");

        }
        
    
        
        
        //seguridad en pagina que no existe
        /*
        var pagina="https://didesweb.com/";
        location.href = pagina;*/



/*
        var urls = ["http://localhost/udemy/proyecto-blog-con-libreria/index.php"
                    ,"http://localhost/udemy/proyecto-blog-con-libreria/cada-categoria.php?nombre=Android"
                    ,"http://localhost/udemy/proyecto-blog-con-libreria/cada-categoria.php?nombre=Nintendo"
                    ,"http://localhost/udemy/proyecto-blog-con-libreria/cada-categoria.php?nombre=PC"
                    ,"http://localhost/udemy/proyecto-blog-con-libreria/cada-categoria.php?nombre=PS4"
                    ,"http://localhost/udemy/proyecto-blog-con-libreria/cada-categoria.php?nombre=PS5"
                    ,"http://localhost/udemy/proyecto-blog-con-libreria/cada-categoria.php?nombre=XBOX"
                    ,"http://localhost/udemy/proyecto-blog-con-libreria/cada-subcategoria.php?subcategoria=*"
                ];
                
                if (window.location.href  == "http://localhost/udemy/proyecto-blog-con-libreria/error.php" ){

                }    
                else if(urls.includes( window.location.href ) == false){
                        //alert(urls.includes( window.location.href ) );
                        var pagina="http://localhost/udemy/proyecto-blog-con-libreria/error.php";
                            location.href=pagina;
                               
                           //alert("cambio");             
                    }
       
           */         
     };

     window.onload = cambios;


    












})