<?php 

function getMessegeCadastros($messege){

  echo 
  "<p 
  style='
  background-color: #d4edda;
  color: #155724;
  border: 1px solid #c3e6cb;
  width: 100%;
  text-align: center;
  margin-bottom: 0;
  padding: 10px;
  '>
  $messege
  </p>";

}

function  getMessegeError($messegeError){
  echo 
  "<p 
  style='
  background-color: #dc3545;
  color: #fff;
  border: 1px solid #c3e6cb;
  width: 100%;
  text-align: center;
  margin-bottom: 0;
  padding: 10px;
  '>
  $messegeError
  </p>";

}

?>