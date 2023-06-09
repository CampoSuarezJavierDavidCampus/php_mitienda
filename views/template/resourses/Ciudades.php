<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <h1>hola desde departamentos controller</h1>
    <pre>
        <?php
            echo var_dump($result);
        ?>
    </pre>
</body>
</html>

<form class="col d-flex flex-wrap" action="registrarCliente.php" method="post">
 
 <div class="mb-1 col-12">
   <label for="celular" class="form-label">CELULAR</label>
   <input 
     type="text"
     id="celular"
     name="celular"
     class="form-control"  
   />
 </div>

 <div class="mb-1 col-12">
   <label for="compañia" class="form-label">COMPAÑIA</label>
   <input 
     type="text"
     id="compañia"
     name="compañia"
     class="form-control"  
   />
 </div>



 <div class=" col-12 m-2">
   <input type="submit" class="btn btn-primary" value="ADD CLIENTE" name="guardarCliente"/>
 </div>
</form>  



         