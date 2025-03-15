        <div class="data-container">
            <?php
            if ($grupo && is_object($grupo)) {
                echo "<div class='record record-column'>
                        <span>ID: $grupo->id</span>
                        <span>Ficha: $grupo->ficha</span>
                        <span>Cantidad de aprendices: $grupo->cantAprendices</span>
                        <span>Fecha de inicio de etapa lectiva: $grupo->fechaIniLectiva</span>
                        <span>Fecha de fin de etapa lectiva: $grupo->fechaFinLectiva</span>
                        <span>Programa de formación: $grupo->programaNombre</span>
                      </div>";
            }
            ?>
        </div>