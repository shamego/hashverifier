<?php
    /**
     * Copy elems of array to array.
     *
     * @param array $a          array, values of which will be copied.
     * @param int $a_start      start position of elems to copy.
     * @param array $b          destination array passed by reference.
     * @param int $b_start      destination array paste position.
     * @param int $elem_cnt     quantity of elems to be copied.
     */
    function array_copy (array $a, int $a_start, array &$b, int $b_start, int $elem_cnt) {
        for ($i = 0; $i < $elem_cnt; $i++, $a_start++, $b_start++) {
            $b[$b_start] = $a[$a_start];
        }
    }

    /**
     * Copies n elems of array to another one.
     *
     * @param array $a          array, values of which to be copied.
     * @param array $b          destination array passes (by reference).
     * @param int $elem_cnt     quantity of elems to be copied.
     */
    function array_copy_n (array $a, array &$b, int $elem_cnt) {
        $a_start = 0;
        $b_start = 0;
        for ($i = 0; $i < $elem_cnt; $i++, $a_start++, $b_start++) {
            $b[$b_start] = $a[$a_start];
        }
    }

    /**
     * Gets bits of elems of input array.
     *
     * @param array $elems      input array.
     * @return array            bits of elems of input array.
     */
    function bit_array (array $elems = []) : array {
        $return = [];
        /* @var int $elem */
        foreach ($elems as $elem) {
            for ($i = 0; $i < 8; $i++) {
                $return[] = $elem & (1 << $i) ? true : false;
            }
        }
        return $return;
    }

    /**
     * Sets flash data in session. Be sure that session_start() is called.
     *
     * @param string $key       Key of flash.
     * @param mixed $msg        Value of flssh.
     */
    function setFlash (string $key, $msg) {
        $_SESSION[$key] = $msg;
    }

    /**
     * Check if flash is set. Difference between getFlash is that,
     * getFlash clears flash value after invoking.
     *
     * @param string $key   Key of flash.
     * @return bool         whether flash is set.
     */
    function hasFlash (string $key) : bool {
        return isset($_SESSION[$key]);
    }

    /**
     * Gets flash value and removes from session data.
     *
     * @param string $key       Key of flash.
     * @return mixed|null       Value of flash.
     */
    function getFlash (string $key) {
        $val = null;
        if (isset($_SESSION[$key])) {
            $val = $_SESSION[$key];
            unset($_SESSION[$key]);
        }
        return $val;
    }

    /**
     * Sends redirect header. Be sure there was no output before redirecting.
     *
     * @param string $location      Address to redirect.
     */
    function redirect (string $location) {
        header('Location:'.$location);
        exit();
    }