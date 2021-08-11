<?php

function connectToDb()
{
    try{
        return new PDO('mysql:host:127.0.0.1;dbname=invoice', 'root','');
      } catch(PDOException $e){
        die("Error connecting");
      }
}