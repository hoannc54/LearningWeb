<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="load_style.css">
<style type="text/css">
  body
{
  background-color:#E6E6E6;
  font-family:helvetica;
}
#heading
{
  margin-top:150px;
  width:600px;
  font-size:27px;
  color:#2E2EFE;
}
.result
{
  text-align:left;
  background-color:grey;
  width:400px;
  padding:10px;
  box-sizing:border-box;
  color:#F2F2F2;
  border-radius:3px;
  border:1px solid #424242;
  font-style:italic;
}
#load
{
  width:400px;
  height:40px;
  color:brown;
  background-color:brown;
  border-radius:3px;
  color:white;
  border:none;
  font-size:17px;
}
</style>
<script type="text/javascript" src="js/jquery.js"></script>

<script type="text/javascript">
$(document).ready(function(){
  $("#load").click(function(){
    loadmore();
  });
});

function loadmore()
{
  var val = document.getElementById("result_no").value;
  $.ajax({
  type: 'post',
  url: 'fetch.php',
  data: {
    getresult:val
  },
  success: function (response) {
    var content = document.getElementById("result_para");
    content.innerHTML = content.innerHTML+response;

    // We increase the value by 2 because we limit the results by 2
    document.getElementById("result_no").value = Number(val)+2;
  }
  });
}
</script>

</head>

<body>

  <center>
    <p id="heading">Load More Results From Database Using Ajax,jQuery,PHP and MySQL</p>
    <div id="content">
    <div id="result_para">
      <?php
        mysql_connect('localhost','root','mysql@adminhoan');
        mysql_select_db('hoannc009');

        $select = mysql_query("select * from comments limit 0,2");
        while($row = mysql_fetch_array($select))
        {
          echo "<p class='result'>".$row['id']."<br>".$row['content']."</p>";
        }
      ?>
      <input type="hidden" id="result_no" value="2">
      <input type="button" id="load" value="Load More Results">
    </div>
    </div>
  </center>

</body>
</html>

