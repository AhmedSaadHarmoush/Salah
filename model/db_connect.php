<?php

/**
 * Description of db_connect
 *
 * @author mimo
 */
class db_connect {

    public $link;

    public function connect() {
        try {
            $this->link = mysqli_connect('localhost', 'root', '', 'salah');
            return $this->link;
        } catch (Exception $exc) {
            return $exc-> mysqli_connect_errno ();
        }
    }

}
