<?php 


include 'config/konek.php';
include 'config/fungsi.php';


                            if(isset($_POST['masuk'])){
                              $email=$_POST['email'];
                              $password=$_POST['password'];

                              if(cekloginwarga($email,$password)){
                                header('location:user/user.php');
                              }else{
                                echo "<div class='alert alert-danger fade in'>
                                  <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                                  Email dan Password Salah
                                </div>";
                              }
                            }
