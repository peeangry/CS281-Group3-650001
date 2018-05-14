<?php
class dbOO {

    private $host, $username, $password, $con;

    public function __construct($ihost, $iusername, $ipassword){
        $this->host = $ihost;
        $this->username = $iusername;
        $this->password = $ipassword;
        $this->con = false;
    }


    public function connect() {
        $connect = mysqli_connect($this->host, $this->username, $this->password);
        return $connect;
    }


    public function connectdb(){
        $conn = $this->connect();
        if($conn)
        {
            $this->con = true;
            echo "Successsfully Connected.";
            return true;
        }
        else {
            echo "Sorry Could Not Connect.";
            return false;
        }
    }


    public function select($database){
        if($this->con)
        {
            if(mysqli_select_db($this->connect(),$database))
            {
                echo "Successfully Connected Database. $database.";
                return true;
            }
            else
            {
                echo "Unknown database.";
            }
        }
        else {
            echo "No active Connection.";
            return false;
        }
    }


    public function disconnectdb(){
        if($this->con)
        {
            if(mysqli_close($this->connect()))
            {
                $this->con = false;
                echo "Successfully disconnected.";
                return true;
            }
        }
        else
        {
            echo "Could Not disconnect.";
            return false;
        }
    }

}

    // $database = new dbOO('localhost', 'root', '');
    // $database->connectdb();
    // $database->select('products');
    // $database->disconnectdb();
?>