<?php
    
    function select($table,$colum,$value){
        require '/../../connect/connect.php';
        $sql = "SELECT * FROM $table WHERE $colum='$value'";
        $query = mysqli_query($conn, $sql);
        return $query;
    }
    function selectANDjoins(){
        require '/../../connect/connect.php';
        
    }