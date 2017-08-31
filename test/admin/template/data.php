<?php
require "conn.php";
$sql="create database if not exists myuser";
mysqli_query($conn,$sql);
$sql="use myuser";
mysqli_query($conn,$sql);
$sql="
create table if not exists user(
 id int primary key auto_increment,
 username varchar(225),
 password varchar(225),
 email varchar(225),
 date  varchar(225)
)
";
mysqli_query($conn,$sql);
  $sql = "set names utf8";
  mysqli_query($conn,$sql);
$sql="

create table if not exists rzjg(
 id int primary key auto_increment,
  userid int not null,
 username varchar(225) not null,
 headed varchar(225) not null,
 img varchar(225) not null,
 tip varchar(225) not null,
 date varchar(225) 
)engine=innodb default character set utf8;


create table if not exists jqxw(
 id int primary key auto_increment,
  userid int not null,
 username varchar(225) not null,
 headed varchar(225) not null,
 img varchar(225) not null,
 tip varchar(225) not null,
 date varchar(225) 
)engine=innodb default character set utf8;

create table if not exists jqhd(
 id int primary key auto_increment,
  userid int,
 username varchar(225) not null,
 headed varchar(225) not null,
 img varchar(225) not null,
 tip varchar(225) not null,
 date varchar(225) 
)engine=innodb default character set utf8;

 

";

mysqli_query($conn,$sql);

$sql="alter table rzjg add constraint fk_rzjg foreign key (userid)
	  references user (id)";
	  mysqli_query($conn,$sql);

	$sql="alter table jqxw add foreign key (userid)
	  references user (id)";
mysqli_query($conn,$sql);
	  $sql="alter table jqhd add 
	   foreign key (userid)
	  references user (id)";
	  mysqli_query($conn,$sql);

?>