<?php

/*sacar alertas en el formulario*/
function alerta ($error, $campo){
    $alert ='';
    if (isset($error[$campo]) && !empty($campo)){
        
        $alert= "<div class='alerta'>".$error[$campo]."</div>";
        
    }
    
    return $alert;
    
};

/*sacar datos*/
function categoria ($conexion){
    
    $sql = "select * from categorias order by nombre";
     $categorias=mysqli_query($conexion, $sql);
     $resul = array();
     if ($categorias && mysqli_num_rows($categorias) !=0) {
         
        $resul = $categorias; 
     }
     
     return $resul;
    
};




/*sacar imagenes para entradas*/
function images ($conexion,$id){
    
   $sql = "select * from entradas where id=$id;";
    $categorias=mysqli_query($conexion, $sql);
    $resul = array();
    if ($categorias && mysqli_num_rows($categorias) !=0) {
        
       $resul = $categorias; 
    }
    
    return $resul;
   
};














/** prueba  de subcategoria*/ 

function subcategoria ($conexion,$categoria,$subcategoria){
    
   $sql = "select entr.*, cat.nombre as 'categoria' from entradas entr inner join categorias cat on cat.id=entr.categoria_id where categoria_id=(select id from categorias where nombre='$categoria') and subcategoria='$subcategoria';";
    $categorias=mysqli_query($conexion, $sql);
    $resul = array();
    if ($categorias && mysqli_num_rows($categorias) !=0) {
        
       $resul = $categorias; 
    } else {

      $resul = false;
    }
    
    return $resul;
   
};

















/*Prueba slider */


function slider ($conexion){
    
   $sql = "select e.*, c.nombre as 'categoria' from entradas e inner join categorias c on e.categoria_id=c.id order by e.id desc";
    $silders=mysqli_query($conexion, $sql);
    $resul = array();
    if ($silders && mysqli_num_rows($silders) !=0) {
        
       $resul = $silders; 
    } else {

      $resul = false;
    }
    
    return $resul;
   
};




/*sacar datos articulos*/
function articulo ($conexion){
    
    $sql = "select e.*, c.nombre as 'categoria'from entradas e "
            . "inner join categorias c on e.categoria_id=c.id order"
            . " by e.id desc limit 4";
     $articulos=mysqli_query($conexion, $sql);
     $resul = array();
     if ($articulos && mysqli_num_rows($articulos) !=0) {
         
        $resul = $articulos; 
     }
     
     return $resul;
    
};

/*sacar datos de usuario*/
function usuario ($conexion,$us){
    
    $sql = "select * from usuarios where nombre='$us';";
     $usuarios=mysqli_query($conexion, $sql);
     $resul = array();
     if ($usuarios && mysqli_num_rows($usuarios) !=0) {
         
        $resul = $usuarios; 
     }
     
     return $resul;
    
};

/*todos los articulos*/
function todosarticulos ($conexion){
    
    $sql = "select e.*, c.nombre as 'categoria'from entradas e "
            . "inner join categorias c on e.categoria_id=c.id order"
            . " by e.id desc";
     $articulos=mysqli_query($conexion, $sql);
     $resul = array();
     if ($articulos && mysqli_num_rows($articulos) !=0) {
         
        $resul = $articulos; 
     }
     
     return $resul;
    
};
/*sacar secciones de cada tema*/
function cadaseccion ($conexion,$seccion){
    
    $sql = "select e.*, c.nombre as 'categoria'from entradas e "
            . "inner join categorias c on e.categoria_id=c.id "
            . "where c.nombre='$seccion'"
            . "order by e.id desc";
     $secciones=mysqli_query($conexion, $sql);
     $resul = array();
     if ($secciones && mysqli_num_rows($secciones) !=0) {
         
        $resul = $secciones; 
     }
     
     return $resul;
    
};
/*secciones del usuario*/
function misentradas ($conexion,$usuario){
    
    $sql = "select e.*, c.nombre as 'categoria'from entradas e "
            . "inner join categorias c on e.categoria_id=c.id "
            . "where e.usuario_id= (select id from usuarios where nombre='$usuario')"
            . "order by e.id desc";
     $secciones=mysqli_query($conexion, $sql);
     $resul = array();
     if ($secciones && mysqli_num_rows($secciones) !=0) {
         
        $resul = $secciones; 
     }
     
     return $resul;
    
};

/*buscador*/
function buscador ($conexion,$categoria,$titulo){
    
    $sql = "select e.*, c.nombre as 'categoria' "
            . "from entradas e "
            . "inner join categorias c on e.categoria_id=c.id "
            . "where upper(c.nombre)='$categoria' or upper(e.titulo) like '%$titulo%' "
            . "order by e.id desc";
     $secciones=mysqli_query($conexion, $sql);
     $resul = array();
     if ($secciones && mysqli_num_rows($secciones) !=0) {
         
        $resul = $secciones; 
     }
     
     return $resul;
    
};




/*buscador_mejorado*/
function buscador_mejorado ($conexion,$titulo){
    
   $sql = "select titulo,(select nombre from categorias where id=categoria_id) as nombre,subcategoria,image,fecha,id,descripcion from entradas where upper(titulo) like '%$titulo%';";
    $secciones=mysqli_query($conexion, $sql);
    $resul = array();
    if ($secciones && mysqli_num_rows($secciones) !=0) {
        
       $resul = $secciones; 
    }
    
    return $resul;
   
};






/*sacar_comentarios*/
function comentarios ($conexion,$titulo_id){
    
   $sql = "select comentario,(select nombre from usuarios where id=com.usuario_id) nombre from comentarios com inner join entradas ent on ent.id=com.entrada_id where ent.id=$titulo_id;";
    $secciones=mysqli_query($conexion, $sql);
    $resul = array();
    if ($secciones && mysqli_num_rows($secciones) !=0) {
        
       $resul = $secciones; 
    }
    
    return $resul;
   
};


function entradas_mas_comentadas ($conexion){
    
   $sql = "
   select entrada_id,count(*) comentarios, (select image from entradas where id=entrada_id) image, (select titulo from entradas where id=entrada_id) titulo, (select categoria_id from entradas where id=entrada_id) categoria 
   from comentarios group by entrada_id;";
    $secciones=mysqli_query($conexion, $sql);
    $resul = array();
    if ($secciones && mysqli_num_rows($secciones) !=0) {
        
       $resul = $secciones; 
    }
    
    return $resul;
   
};



function lo_ultimo ($conexion){
    
   $sql = "select * from entradas order by id desc;";
    $secciones=mysqli_query($conexion, $sql);
    $resul = array();
    if ($secciones && mysqli_num_rows($secciones) !=0) {
        
       $resul = $secciones; 
    }
    
    return $resul;
   
};


function mis_comentarios ($conexion,$id){
    
   $sql = "select (select titulo from entradas where id=entrada_id) titulo, comentario, id from comentarios where usuario_id=$id;";
    $secciones=mysqli_query($conexion, $sql);
    $resul = array();
    if ($secciones && mysqli_num_rows($secciones) !=0) {
        
       $resul = $secciones; 
    }
    
    return $resul;
   
};




function contenido ($conexion,$subcategoria,$categoria = NULL){

   if(is_null($categoria)){
      $sql = "select *, (select nombre from categorias where id=categoria_id) categoria from entradas where subcategoria='$subcategoria';";
   } else{
      $sql = "select *, (select nombre from categorias where id=categoria_id) categoria from entradas where subcategoria='$subcategoria' and categoria_id= (select id  from categorias where nombre='$categoria');";
   }



    $secciones=mysqli_query($conexion, $sql);
    $resul = array();
    if ($secciones && mysqli_num_rows($secciones) !=0) {
        
       $resul = $secciones; 
    }
    
    return $resul;
   
};


//select titulo, (select nombre from categorias where id=categoria_id) categoria from entradas where subcategoria='Noticias' and categoria_id= (select id  from categorias where nombre="XBOX");







function favorito_change ($conexion,$id_entrada,$id_usuario){
    
   $sql = "select titulo from favoritos where id_entrada = $id_entrada and id_usuario= $id_usuario;";
    $secciones=mysqli_query($conexion, $sql);
    $resul = array();
    if ($secciones && mysqli_num_rows($secciones) !=0) {
        
       $resul = $secciones; 

       return $resul;

    } else{
       $resul = "basura";
       

    }
    
    //return $resul;
   
};





function ver_favoritos ($conexion,$id_usuario){
    
   $sql = "select * from favoritos where id_usuario= $id_usuario;";
    $secciones=mysqli_query($conexion, $sql);
    $resul = array();
    if ($secciones && mysqli_num_rows($secciones) !=0) {
        
       $resul = $secciones; 

       return $resul;

    } else{
       $resul = "basura";
       

    }
    
    //return $resul;
   
};
