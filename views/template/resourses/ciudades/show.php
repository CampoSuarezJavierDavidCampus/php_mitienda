<table class="table table-custom ">    
    <thead>
        <tr>
            <th scope="col">ID </th>
            <th scope="col">CIUDAD</th>
            <th scope="col">DEPARTAMENTO</th>
            <th scope="col">ACCIONES</th>            
        </tr>
    </thead>
    <tbody class="" id="tabla">           
        <?php
            foreach($result as $ciudad){
                if(gettype($ciudad)=='array')continue;
                echo <<<HTML
                    <tr>
                        <td>$ciudad->ciudad_id</td>
                        <td>$ciudad->ciudad_nombre</td>
                        <td>$ciudad->departamento_nombre</td>
                        <td>
                            <a class="btn btn-danger" href="ciudad/delete/$ciudad->ciudad_id">Eliminar</a>
                            <a class="btn btn-success" href="ciudad/edit/$ciudad->ciudad_id">Editar</a>
                        </td>                
                    </tr>
                HTML;
            } 
        ?>
    </tbody>    
</table>

         