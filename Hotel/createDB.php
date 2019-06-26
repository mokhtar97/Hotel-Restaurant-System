<?php

$con = mysqli_connect("localhost","root","") or die (" can not establish connection ");
$sql1="create database if not exists Hotel";
$q=mysqli_query($con,$sql1);

if(!$q)
{
	die("ERROR:".mysqli_error($con));
}

mysqli_select_db($con,"Hotel");

$sql2="create table if not exists reservation(
id int not null auto_increment primary key,
ssn int unique,
name nvarchar(255),
check_in date,
check_out date,
roomnumber int
)";

$q2=mysqli_query($con,$sql2);

if(!$q2)
{
	die("ERROR:".mysqli_error($con));
}


$sql3="create table if not exists invoice(
id int not null auto_increment primary key,
guestname nvarchar(255),
roomnumber int ,
guest_id int,
FOREIGN KEY (guest_id) REFERENCES reservation(id) on delete cascade
)";

$q3=mysqli_query($con,$sql3);

if(!$q3)
{
	die("ERROR:".mysqli_error($con));
}


$sql4="create table if not exists orders(
id int not null auto_increment primary key,
food nvarchar(255),
price int ,
guest_id int,
FOREIGN KEY (guest_id) REFERENCES reservation(id) on delete cascade
)";

$q4=mysqli_query($con,$sql4);

if(!$q4)
{
	die("ERROR:".mysqli_error($con));
}

?>