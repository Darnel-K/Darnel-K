<?php
class DB {
    private $HOST = null;
    private $USER = null;
    private $PASS = null;

    function __construct() {
        $this->HOST = getenv('LOCAL_DB_HOST', true);
        $this->USER = getenv('LOCAL_DB_USER', true);
        $this->PASS = getenv('LOCAL_DB_PASS', true);
    }

    public function Connect($DB) {
        mysqli_report(MYSQLI_REPORT_STRICT);
        try {
            $conn = array(
                "Connection" => new mysqli($this->HOST, $this->USER, $this->PASS, $DB),
                "Error" => null,
                "ErrNo" => null
            );
        } catch(Exception $e) {
            $conn = array(
                "Connection" => null,
                "Error" => $conn['Connection']->connect_error,
                "ErrNo" => $conn['Connection']->connect_errno
            );
        }

        return $conn;
    }
}
?>
