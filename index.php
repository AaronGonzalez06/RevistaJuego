<?php require_once './includes/cabecera.php'; ?>
        
        
        <!-- BARRA LATERAL -->
<?php require_once './includes/lateral.php'; ?>
        <!-- CAJA PRINCIPAL -->
        
          <div id="principal">

          <h3  class="h1_subcategoria">Lo ultimo</h3>     

<?php
require_once './libreria/vendor/autoload.php';
//conexion
$conexion = new mysqli("localhost","root","","blog_master");
$conexion->query("SET NAMES 'utf-8'");
//consulta
 $consulta = $conexion->query("select e.*, c.nombre as 'categoria'"
        . "from entradas e "
        . "inner join categorias c on e.categoria_id=c.id"
        . " order by e.id desc");
$numero_elementos  = $consulta->num_rows;
$numero_de_cada =4;

$pagination = new Zebra_Pagination();
$pagination->records($numero_elementos);

//numero de elementos por paginas
$pagination->records_per_page($numero_de_cada);

$page = $pagination->get_page();

$empezar = (( $page - 1)*$numero_de_cada);

$notas = $conexion->query("select e.*, c.nombre as 'categoria'"
        . "from entradas e"
        . " inner join categorias c on e.categoria_id=c.id "
        . "order by e.id desc limit $empezar,$numero_de_cada");
        echo "<div class='jscroll'>";
while ($nota = $notas->fetch_object()){
    echo "<article class='entrada'>";

    echo "<img class='imagenPrin' src='./assets/img/{$nota->image}'/>";
    
    echo "<div class='boceto'>";
    echo "<a href='individual.php?id={$nota->id}&categoria={$nota->categoria}'>";    
    echo "<h2>{$nota->titulo}</h2>";
    echo "<span>{$nota->categoria} | {$nota->fecha}<span>";
    $descripcion = substr($nota->descripcion,0,460) . " ... LEER MAS";
    echo "<p>$descripcion</p>";

   
    
echo "</a>";
echo "</div>";
echo "<div class='clearfix'></div>";
  echo "</article>";  
}
echo "</div>";
$pagination->render();


?>
</div>

<div class="principal">

<h3  class="h1_subcategoria">Noticias</h3>

<?php  $subcategorias = contenido($conexion,'Noticias');
 
                 while ($articulo = mysqli_fetch_assoc($subcategorias)): ?>
            <article class="entrada">
            <img class='imagenPrin' src='./assets/img/<?=$articulo["image"]?>'/>
            <div class='boceto'>
<a href="individual.php?id=<?=$articulo['id']?>&categoria=<?=$articulo['categoria_id']?>">
                <h2><?=$articulo['titulo']?></h2>
                
                <span><?=$articulo['categoria']. " | ".$articulo['fecha']?></span>
                <!--<p><?=$articulo['descripcion']?></p>-->
               <p><?=substr($articulo['descripcion'],0,460) . " ... LEER MAS"?></p>
                </a>

                </div>
                <div class='clearfix'></div>
            </article>
                    <?php endwhile;?>
</div>


<div class="principal">

<h3 class="h1_subcategoria">Analisis</h3>

<?php  $subcategorias = contenido($conexion,'Analisis');
 
                 while ($articulo = mysqli_fetch_assoc($subcategorias)): ?>
            <article class="entrada">
            <img class='imagenPrin' src='./assets/img/<?=$articulo["image"]?>'/>
            <div class='boceto'>
<a href="individual.php?id=<?=$articulo['id']?>&categoria=<?=$articulo['categoria_id']?>">
                <h2><?=$articulo['titulo']?></h2>
                <span><?=$articulo['categoria']. " | ".$articulo['fecha']?></span>
                <!--<p><?=$articulo['descripcion']?></p>-->
               <p><?=substr($articulo['descripcion'],0,460) . " ... LEER MAS"?></p>
                </a>
                </div>
                <div class='clearfix'></div>
            </article>
                    <?php endwhile;?>
</div>


<div class="principal">

<h3 class="h1_subcategoria">Reportajes</h3>

<?php  $subcategorias = contenido($conexion,'Reportajes');
 
                 while ($articulo = mysqli_fetch_assoc($subcategorias)): ?>
            <article class="entrada">
            <img class='imagenPrin' src='./assets/img/<?=$articulo["image"]?>'/>
            <div class='boceto'>
<a href="individual.php?id=<?=$articulo['id']?>&categoria=<?=$articulo['categoria_id']?>">
                <h2><?=$articulo['titulo']?></h2>
                <span><?=$articulo['categoria']. " | ".$articulo['fecha']?></span>
                <!--<p><?=$articulo['descripcion']?></p>-->
               <p><?=substr($articulo['descripcion'],0,460) . " ... LEER MAS"?></p>
                </a>
                </div>
                <div class='clearfix'></div>
            </article>
                    <?php endwhile;?>
</div>