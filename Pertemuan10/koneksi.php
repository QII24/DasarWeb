<?php
$koneksi=mysqli_connect("localhost","root","","prakwebdb");

if(mysqli_connect_errno()){
    die("koneksi gagal:".mysqli_connect_error());
}