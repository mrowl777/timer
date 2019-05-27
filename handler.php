<?php

include 'db_handler.php';

class Handler extends db_handler {

    function add_ex_promiser(){
        $name = $_POST['promiser'];

        $id = $this->search_promiser( $name );

        if( !$id ){
            die( json_encode(['result' => 'not_found']) );
        }

        if( !isset($_COOKIE['prom_hash']) ){
            die( json_encode(['result' => 'no_cookie']) );
        }

        $pids = $this->get_promisers_list( $_COOKIE['prom_hash'] );
        $pids = explode(',', $pids);

        if( in_array($id, $pids) ){
            die( json_encode(['result' => 'already_exist']) );
        }

        $this->add_user_promiser( $id, $_COOKIE['prom_hash'] );

        die( json_encode(['result' => 'ok']) );
    }

    function add_promiser(){
        $name = $_POST['promiser'];
        $start_date = $_POST['date'];
        $summ = $_POST['summ'];
        $period = $_POST['period'];
        $count_type = $_POST['count_type'];
        $tax = $_POST['tax'];

        switch ($period) {
            case 'day':
                $period = 1;
                break;
            case 'week':
                $period = 7;
                break;
            case 'month':
                $period = 30;
                break;
        }

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
        case 'add_ex_promiser':
            $handler->add_ex_promiser();
            break;
        default:
            die();
            break;
    }
}
?>