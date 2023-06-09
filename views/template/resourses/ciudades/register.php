<form class="col d-flex flex-wrap" action="ciudades/registrar" method="POST">
    <div class="mb-1 col-12">
        <label for="celular" class="form-label" for='ciudad_nombre'>NOMBRE DE LA CIUDAD</label>
        <input 
            type="text"
            id="ciudad_nombre"
            name="ciudad_nombre"
            class="form-control"  
        />
    </div>
    <div class="mb-1 col-12">
        <label for="compañia" class="form-label" for='departamento_nombre'>Departamentos</label>
        <select name="departamento_nombre" class="form-control" id="departemaneto_nombre">
            <?php                     
                foreach ($result['departamentos'] as $departamento) {
                    echo <<<HTML
                    <option value="$departamento->departamento_id">$departamento->departamento_nombre</option>
                    HTML;
                }
            ?>
        </select>        
    </div>
</form>  