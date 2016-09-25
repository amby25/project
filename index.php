<?php 
require 'classes/Database.php';

$database = new Database;

$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

if($post['submit']){
  $title = $post['title'];
  $name = $post['name'];
  $services = $post['radio'];
  $type = $post['check'];



  $database->query('INSERT INTO users (title, services, type, name) VALUES(:title, :services, :type, :name)');
  $database->bind(':title', $title);
  $database->bind(':services', $services);
  $database->bind(':type', $type);
  $database->bind(':name', $name);
  $database->execute();
  if($database->lastInsertId()){
    echo '<p>Post Added!</p>';
  }
}

$database->query('SELECT * FROM users');
$rows = $database->resultset();

?>
<!DOCTYPE html>
<html>
<head>

<link type="text/css" rel="stylesheet" href="styles.css">
 
</head>

<body>

<main class="container">
<h1>New Customer</h1>

<form  method="post" action="<?php $_SERVER['PHP_SELF']; ?>">

  
 

<div class="control-group">
  <h2>Services</h2>
  <label class="control control--radio">Housing
    <input type="radio" name="radio" value="Housing" checked="checked"/>
    <div class="control__indicator"></div>
  </label>
  <label class="control control--radio">Council Tax
    <input type="radio" name="radio" value="Council Tax" />
    <div class="control__indicator"></div>
  </label>
  <label class="control control--radio">Fly-tipping
    <input type="radio" name="radio" value="Fly-tipping" />
    <div class="control__indicator"></div>
  </label>
  <label class="control control--radio">Miss Bin
    <input type="radio" name="radio" value="Miss Bin" />
    <div class="control__indicator"></div>
  </label>
  
</div>

<div class="type" >
   <br><br/>
<input type="radio" id="1" name="check" value="Citizen" />
<label for="1">Citizen</label>
<input type="radio" id="2" name="check" value="Organization" />
<label for="2">Organinzation</label>
<input type="radio" id="3" name="check" value="Anonymous" />
<label for="3">Anonymous</label> <br/><br/>

</div>


  <h5>Title</h5>
  <div class="select">
    <select name="title">
      <option name="title2" value="Mr">Mr</option>
      <option name="title2" value="Mrs">Mrs</option>
      <option name="title2" value="Miss">Miss</option>
    </select>
    <div class="select__arrow"></div>
  </div>
  



<div class="form">

     <label>Name</label><br />
  <input type="text" name="name" placeholder="Enter Full Names..." /><br />
   

 <input id="submit" name="submit" type="submit" value="Submit">
 </div>
</form>




</body>
  </html>
