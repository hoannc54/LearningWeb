<?php include('config.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Comments  with jQuery and Ajax</title>
 <script type="text/javascript" src="jquery.js"></script>
 <link rel="stylesheet" type="text/css" href="comment.css">
 <script type="text/javascript">
$(function() {
	$(".submit").click(function() {
		var name = $("#name").val();
		var email = $("#email").val();
			var comment = $("#comment").val();
				var post_id = $("#post_id").val();
		    var dataString = 'name='+ name + '&email=' + email + '&comment=' + comment + '&post_id=' + post_id;
			
			if(name=='' || email=='' || comment=='')
		     {
		    		alert('Please Give Valide Details');
		     }
			else
			{
			$("#flash").show();
			$("#flash").fadeIn(400).html('<img src="ajax-loader.gif" align="absmiddle">&nbsp;<span class="loading">Loading Comment...</span>');
			$.ajax({
					type: "POST",
				  url: "commentajax.php",
				   data: dataString,
				  cache: false,
				  success: function(html){
				 
				  $("ol#update").append(html);
				  $("ol#update li:last").fadeIn("slow");
				  document.getElementById('email').value='';
				   document.getElementById('name').value='';
				    document.getElementById('comment').value='';
					$("#name").focus();
				 
				  $("#flash").hide();
					
			  	}
			 });
		}
		return false;
	});
});

</script>
</head>

<body>
	<div id="main">
		<div style="font-family:'Georgia', Times New Roman, Times, serif; font-size:1.0em; margin-bottom:10px ">
		Topics focus on programming, tutorials, jquery, ajax, php, mysql, javascript and java.
		</div>
		<ol  id="update" class="timeline">
			<?php
			
			//$post_id value comes from the POSTS table
			$sql=mysql_query("select * from comments ");
			?>
			<?php while($row=mysql_fetch_array($sql)): 
		
				$name=$row['name'];
				$email=$row['email'];
				$comment_dis=$row['comment'];
				$lowercase = strtolower($email);
				$image = md5( $lowercase );
			?>


			<li class="box">
			<img src="http://www.gravatar.com/avatar.php?gravatar_id=<?php echo $image; ?>" class="com_img">
			<span class="com_name"> <?php echo $name; ?></span> <br />
			My Comment</li>

			<?php endwhile;?>

		</ol>
		<div id="flash" align="left"  ></div>

		<div style="margin-left:100px">
			<form action="#" method="post">
				<input type="hidden" name="post_id" id="post_id" value="<?php echo $post_id; ?>"/>
				<input type="text" name="title" id="name"/><span class="titles">Name</span><span class="star">*</span><br />

				<input type="text" name="email" id="email"/><span class="titles">Email</span><span class="star">*</span><br />

				<textarea name="comment" id="comment"></textarea><br />

				<input type="submit" class="submit" value=" Submit Comment " />
			</form>
		</div>
	</div>
</body>
</html>
