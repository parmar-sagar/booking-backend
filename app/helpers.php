<?php
  function isAdmin(){
    $admin = Auth::user()->is_admin == 1;
    return $admin;
  }
