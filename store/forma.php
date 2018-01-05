<?php
if(isset($_POST["sub"])){
    $text=$_POST["editor"];
    $query=mysqli_query($con,"UPDATE post SET opis='$text' WHERE id='1'");
    if($query){
        $query=mysqli_query($con,"SELECT * FROM post WHERE id='1'");
        $r=mysqli_fetch_assoc($query);
        $opis=$r['opis'];
        echo $opis;
    }
    
}


?>
<script src="editor/ckeditor.js"></script>
<ul class="nav nav-tabs">
  <li class="active"><a data-toggle="tab" href="#1a">TITLE</a></li>
  <li><a data-toggle="tab" href="#2a">DESCRIPTION</a></li>
</ul>
<form method="post">
<div class="tab-content">
  <div id="1a" class="tab-pane fade in active">
    <input type="text" name="title" placeholder="title" />
  </div>
  <div id="2a" class="tab-pane fade">
    <textarea class="ckeditor" name="editor"></textarea>
  </div>
    
</div>
</form>