<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
   
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1"/>
		<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css"/>
		<link rel="stylesheet" type="text/css" href="assets/css/offcanvas.css"/>






    <!-- Bootstrap CSS v5.0.2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"  integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  </head>
  <body>
<!------SE CREA EL NAVEGADOR---------------------------------------------------------->

<nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4">
  <div class="container-fluid">
    <a class="navbar-brand" href="">Clase de Cocteleria-Carlos Lopez</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
 <!----Boton de bucador--->     
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav me-auto mb-2 mb-md-0">
      
      </ul>
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Buscador</button>
      </form>
    </div>
  </div>
</nav>














<!---pRIMERO CREAMOS UNA TABLA---------->

<main class="container">
  <div class="d-flex align-items-center p-3 my-3 text-white bg-purple rounded shadow-sm">
  <div class="lh-1">


<!------Nombre del proyecto----->
      <h1 class="h3 mb-0 text-white lh-1">RECETARIO DE COCTELERIA</h1>
    </div>
  </div>
  <div align= center>
<img src="124.png" style="width: 400px; height: 150px"></div>
<!------------------------------------------------------------------------------------------------->

<!----Boton para llamar a ingresar los otros elementos------>
<div class="my-3 p-3 bg-body rounded shadow-sm">
    <h6 class="border-bottom pb-2 mb-0">
    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#form_modal"> Agregar coctel</button>
    </h6>

    <div class="d-flex text-muted pt-3">

<!----------------------------------------------------------------------------------------------------->


<table class="table table-bordered"> <!-----Division de la tabla----->
    <thead class="btn-primary"><!---color de la tabla--------------->
        <tr>
            <th>#</th>
            <th>Nombre del coctel</th>
            <th>Medidas</th>
            <th>Cristaleria</th>
            <th>Ingredientes</th>
        </tr>
    </thead>
    <tbody>
        
    </tbody style="background-color: red;"><!----color------->
<!------SE ABRE PHP DENTRO DE LA TABLA---------->

<?php
require 'confg.php';
$query = $db->prepare("SELECT * FROM personal");//llamar a la bd
$query->execute();

// crear una condicion

if($query-> rowcount() == 0) {

/*
rowCount() devuelve el número de filas afectadas por la última 
sentencia DELETE, INSERT, o UPDATE ejecutada por el correspondiente 
objeto PDOStatement.
*/

        echo '<tr>
          <td colspan="4"></td>
          </tr>';

}

/*
Colspan, indica el número de columnas que ocupará la celda. 
Por defecto ocupa una sola columna

*/





else{
    
        $n=0;
        $data = $query->fetchAll();
        foreach ($data as $value): 
        $n++; 
        echo '<tr>
        <td>'.$n.'</td>
        <td>'.$value["nombres"].'</td>
        <td>'.$value["apellidos"].'</td>
        <td>'.$value["pais"].'</td>
        <td>'.$value["programas"].'</td>
        </tr>';
        endforeach; 
}
$db = null;

/*
fetchAll() devuelve un array que contiene tadas las filas 
restantes del conjunto de resultados. El array representa cada
 fila como un array con valores de las columnas, o como un objeto 
 con propiedades correspondientes a cada nombre de columna.

El bucle foreach es un tipo especial de bucle que permite recorrer 
estructuras que contienen varios elementos (como matrices, recursos u objetos)
 sin necesidad de preocuparse por el número de elementos.

 ++ => incremento





*/

$db = null;

/*
En PHP NULL se considera un valor especial que representa a una variable sin 
valor, lo que puede ocurrir cuándo la variable no haya sido definida, cuándo 
esté definida pero sin valor asignado, cuándo se le asigne el valor NULL o cuándo 
haya sido destruida con usent() 

*/

?>






<!-----CIERRE DE PHP------------------------------------------->

</tbody>
		</table>

    </div>
  </div>
</main>







<!----------------------------------Este script será el encargado de procesar la información enviada 
desde el formulario y si pasa los criterios será almacenada en la base de datos. Por lo tanto, contiene
 la consulta 
PHP para insertar en la tabla personal.--------------------------------------------------------------->

<div class="modal fade" id="form_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header btn-primary">
        <h5 class="modal-title" id="exampleModalLabel">Nuevo coctel</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <!------------------------------------------------------------------------------------------------->
      <form action="insertar.php" method="POST"><!----llamamos la pagina insertar--->
      <div class="modal-body">        	
		<div class="col-md-12">
<!-------------------------------------------ingreso de datos--->
            <div class="form-group">
                <label>Nombres del coctel:</label>
                <input type="text" class="form-control" name="nombres" required="required"/>
            </div>
<!------------------------------------------ingreso--------------->
            <div class="form-group">
                <label>Medidas:</label>
                <input type="text" class="form-control" name="apellidos" required="required"/>
            </div>

<!---------------------------------------------ingreso--------------->
            <div class="form-group">
                <label>Cristaleria:</label>
                <input type="text" class="form-control" name="pais" required="required"/>
            </div>

<!-----------------------------------------------ingreso---------->
            <div class="form-group">
                <label>Ingredientes:</label>
            </div>


<!-----Botones de opciones--------------------------------->

								
			<div class="card bg-light" style="width: 100%;">
  <div class="card-body">
  <div class="row">
<!-- checkbox -->
<div class="col-md-6">
<div class="custom-control custom-checkbox mr-sm-2">
        <label><input type="checkbox" name="programas[]" value="ginebra" >curacao</label>
</div>
</div>


<div class="col-md-6">
<div class="custom-control custom-checkbox mr-sm-2">
        <label><input type="checkbox" name="programas[]" value="ginebra" >Ginebra</label>
</div>
</div>

<div class="col-md-6">
<div class="custom-control custom-checkbox mr-sm-2">
        <label><input type="checkbox" name="programas[]" value="ginebra" >ron añejo</label>
</div>
</div>

<div class="col-md-6">
<div class="custom-control custom-checkbox mr-sm-2">
        <label><input type="checkbox" name="programas[]" value="ginebra" >vodka</label>
</div>
</div>





















</div>
</div>
</div>	
	</div>
	  </div>
<!------------------------------------------------foooter del insertar------------------------------------------------------>

   <div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
    <button name="guardar" type="submit" class="btn btn-primary" >Registrar Ahora</button>


   </div>

        
      </form>
      </div>
    </div>
  </div>
</div>

















      
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  </body>

  <script src="assets/js/jquery-3.6.0.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script> 



</html>