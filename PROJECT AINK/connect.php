<?php
 $connection  = new mysqli("localhost","root","","crudPHP");
 if(!$connection){
     echo "Connection error!";
     exit();
 }