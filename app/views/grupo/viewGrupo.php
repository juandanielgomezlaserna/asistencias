
        <div class="data-container">
            <a class="btn-add" href="/grupo/new">+</a>
            <?php
            if (empty($grupos)) {
                echo "<br>No se encuentran grupos en la base de datos";
            } else {
                foreach ($grupos as $key => $value) {
                    echo "<div class='record'>
                        <span>ID: $value->id - $value->ficha - $value->cantAprendices - $value->estado - $value->fechaIniLectiva - $value->fechaFinLectiva - $value->fkIdProgForm</span>
                        <div class='buttons'>
                            <a href='/grupo/view/".$value->id."'>Consultar</a>
                            <a href='/grupo/edit/".$value->id."'>Editar</a>
                            <a href='/grupo/delete/".$value->id."'>Eliminar</a>
                        </div>
                    </div>";
                }
            }
            ?>
        </div>