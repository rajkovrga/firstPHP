<?php
session_start();

if(!isset($_SESSSION['logged_id']) || $_SESSSION['logged_id'] === false) {
  die('Niste ulogovani');
}
