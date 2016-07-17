<?php

  mysql_connect('localhost','root','mysql@adminhoan');
  mysql_select_db('hoannc009');

  $no = $_POST['getresult'];
  $select = mysql_query("select * comments limit $no,2");
  while($row = mysql_fetch_array($select))
  {
    echo "<p class='result'>".$row['id']."<br>".$row['content']."</p>";
  }

?>