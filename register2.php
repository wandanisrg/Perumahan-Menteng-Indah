<?php

if(isset($_POST['daftar'])){

    $nama=$_POST['username'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $kode=$_POST['kode'];
    $password_confirm=$_POST['password_confirm'];

    	global $konek;

    	$sql="SELECT email FROM muzakki WHERE email='$email'";
    	$result=mysqli_query($konek,$sql);
    	$cek_email=mysqli_num_rows($result);

    	if($cek_email == 0){
    	
    	    		if($password === $password_confirm){

                        if($kode===$_SESSION["Captcha"]){
                                        
                            if(simpanpendaftaranuser($nama,$email,$password)){
                             echo "<div class='alert alert-success fade in'>
                                  <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                                  Alhamdulillah Pendaftaran berhasil, Silahkan Masuk
                                  </div>";
                            }else{
                                    echo "gagal";
                            }
                                                    
                        }else{
                            echo "<div class='alert alert-danger fade in'>
                                  <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                                  Kode yang anda masukan salah !
                                  </div>";
                        }

    	    		}else{
    	        		echo "<div class='alert alert-danger fade in'>
  						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
  						Password Confirm anda tidak sama
						</div>";
    	    		}

    	}else{
    	    echo "<div class='alert alert-danger'>
    		<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
    		Sepertinya Email sudah pernah di daftarkan, silahkan gunakan email yang lain
    		</div>";
    	}

}

?>
									
<hr>
<form role="form" action="" method="post">
	<div class="form-group">
		<label class="lead">Nama Lengkap</label>
    	<input type="text" name="username" placeholder="Nama Lengkap" class="form-control">
    </div>
    <div class="form-group">
    	<label class="lead">Email</label>
    	<input type="text" name="email" placeholder="Email" class="form-control">
    </div>

    <div class="form-group">
        <label class="lead">Password</label>
        <input type="password" name="password" placeholder="Password" class="form-control">
    </div>

    <div class="form-group">
        <label class="lead">Konfirmasi Password</label>
        <input type="password" name="password_confirm" placeholder="Password Confirm" class="form-control">
    </div>

    <div class="form-group">
        <img src="captcha.php" alt="">
    </div>

    <div class="form-group">
        <label class="lead">Masukan Kode</label>
        <input type="text" name="kode" class="form-control">
    </div>

    <button type="submit" name="daftar" class="btn btn-block btn-primary btn-lg">Daftar</button>
</form>