<?php
include('config.php');
if($_POST)
{
$name=$_POST['name'];
$email=$_POST['email'];
$comment_dis=$_POST['comment'];
$post_id=$_POST['post_id'];

$lowercase = strtolower($email);
  $image = md5( $lowercase );
 mysql_query("INSERT INTO comments (name,email,comment) VALUES ('$name','$email','$comment') ") ;

}

else { }

?>
<li class="box">
<img src="http://www.gravatar.com/avatar.php?gravatar_id=<?php echo $image; ?>" class="com_img"/><span  class="com_name"> <?php echo $name;?></span> <br /><br />

<?php echo $comment; ?>
</li>