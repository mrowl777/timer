<?php
class db_handler {

    function connect_db(){
        include __DIR__ . '/ini.php';
        
        $mysqli = new mysqli($db_host, $db_user, $db_pass, $db_name);

        if ($mysqli->connect_errno) {
            echo "Не удалось подключиться к MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
        }
        $mysqli->query("set names utf8");

        return $mysqli;
    }

    function close_connection( $mysqli ){
        mysqli_close( $mysqli );
    }

    function build_hash( $id ){
        $hash = hash( 'sha256', time() );
        $query =  "INSERT INTO `users`(`id`, `hash`, `pids`) VALUES ('','".$hash."','".$id."')";
        $db_helper = $this->connect_db();
        $db_helper->query( $query );
        $this->close_connection( $db_helper );
        return $hash;
    }

    function get_promisers_list( $hash ){
        $query = "SELECT `pids` FROM `users` WHERE `hash` = '".$hash."'";
        $db_helper = $this->connect_db();
        $pids = $db_helper->query( $query );
        $pids = $pids->fetch_assoc();
        $this->close_connection( $db_helper );
        return $pids['pids'];
    }

    function add_promiser( $id, $hash ){
        $pids = $this->get_promisers_list( $hash );
        $put = $pids . "," . $id;
        $query = "UPDATE `users` SET `pids`='".$put."' WHERE `hash`='".$hash."' ";
        $db_helper = $this->connect_db();
        $db_helper->query( $query );
        $this->close_connection( $db_helper );
        return;
    }
    
    function put_new_promiser( $name, $start_date, $summ, $period, $count_type, $tax ){
        $part_1 = "INSERT INTO `promisers`(`id`, `name`, `summ`, `period`, `accrual_type`, `accrual_count`, `start_date`, `status`) VALUES ";
        $part_2 = "('','".$name."','".$summ."','".$period."','".$count_type."','".$tax."','".$start_date."','1')";
        $query = $part_1 . $part_2;
        $db_helper = $this->connect_db();
        $db_helper->query( $query );
        $this->add_id( $db_helper->insert_id );
        $this->close_connection( $db_helper );
        return;
    }

    function add_id( $id ){
        if( !isset($_COOKIE['prom_hash']) ){
            $hash = $this->build_hash( $id );
            setcookie( 'prom_hash', $hash, time()+60*60*24*365 );
        }else{
            $this->add_promiser( $id, $_COOKIE['prom_hash'] );
        }
    }

}

?>