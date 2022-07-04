<?php
define('DB_SERVER', "localhost"); //db server
define('DB_USER', "root"); //db user
define('DB_PASSWORD', ""); //db password (mention your db password here)
define('DB_DATABASE', "db_pemesanan"); //database name

$con = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_DATABASE);

// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
} else {
    // echo "Succesfully connect to MySQL";
}