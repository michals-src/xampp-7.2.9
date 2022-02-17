<div class="container">

    <h1>Panel zarządzania</h1>

    <div class="row">
        <div class="col md-2"> 
           <!--  <p>Dashboard Navigation</p> -->
            <ul class="nav nav-column nav-border">
                <?php
                    foreach ($this->navigation as $page => $values ) {
                        $active = ( $values["slug"] === $this->currentPage ) ? 'class="active"' : '';
                        echo sprintf( '<li><a href="%s" %s>%s</a></li>', get_permalink() . "?page=" . $values["slug"], $active, $values["label"] );
                    }
                ?>
            </ul>
        </div>
        <div class="col md-offset-1 md-7">
           <!--  <p>Dashboard Content</p> -->
            </br>
            <?php call_user_func_array( array( $this->params["currentPage"], "load_template" ), array( "repository" => $this->extra ) ); ?>
        </div>
    </div>

</div>
