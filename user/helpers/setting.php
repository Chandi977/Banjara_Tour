<?php
session_start();
$name = " ";
$info = "";
if (!isset($_SESSION['id'])) {
  $name = '';
  echo "<script>alert('You must have to login first to do this task.'); window.location.href = '../index.php';</script>";

  // header("location:../index.php");

} else {
  $id = $_SESSION['id'];
//   $uname=$_SESSION['uname'];
  $al = mysqli_connect("localhost", "root", "", "banjara tour and travel");
  $a = mysqli_query($al, "SELECT * FROM customers WHERE id='$id'");
  $b = mysqli_fetch_array($a);
  $name = $b['name'];
  $email=$b['email'];
}
?>