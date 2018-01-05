<div id="page-right-content">
    <form method="post">
    <?php
    $query=mysqli_query($con,"SELECT * FROM social");
    while($r=mysqli_fetch_assoc($query)){
        $title=$r['title'];
        $id=$r['id'];
        $link=$r['link'];
        echo'<h2>'.$title.'</h2><input type="text" name="'.$title.'" placeholder="'.$link.'" />';
    }
    ?><br>
        <button type="submit" name="editsocial">UPDATE SOCIAL LINKS</button>
        </form>
</div>