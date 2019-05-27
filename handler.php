<?php

include 'db_handler.php';

class Handler extends db_handler {

    function add_promiser(){
        $name = $_POST['promiser'];
        $start_date = $_POST['date'];
        $summ = $_POST['summ'];
        $period = $_POST['period'];
        $count_type = $_POST['count_type'];
        $tax = $_POST['tax'];

        $this->put_new_promiser( $name, $start_date, $summ, $period, $count_type, $tax );

        die( json_encode(['result' => 'ok']) );
    }
}

$handler = new Handler();

if( isset( $_POST['action'] ) ){
    switch ( $_POST['action'] ) {
        case 'add_promiser':
            $handler->add_promiser();
            break;
        
        default:
            die();
            break;
    }
}
?>