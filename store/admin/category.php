<div id="page-right-content">
    <?php
    if(isset($_POST["subcat"])){
        $newcat=$_POST["addcategory"];
        $newcat=htmlspecialchars($newcat);
        if(!empty($newcat)){
            $query=mysqli_query($con,"INSERT INTO kategorije (ime) VALUES ('$newcat')");
             if($query){
                 echo'SUCCSESS';
             }
        
        }
        
    }
    ?>
    <form method="post" >
    <h2>ADD NEW</h2>
        <input type="text" name="addcategory" placeholder="ADD NEW CATEGORY" />
        <button type="submit" name="subcat">ADD NEW CATEGORY</button>
        <?php
        if(isset($_GET["remove"])){
            $id=$_GET["remove"];
            $id1=htmlspecialchars($id);
            $query=mysqli_query($con,"DELETE FROM kategorije WHERE id='$id1'");
        }
        if(isset($_GET["edit"])){
            $id=$_GET["edit"];
            $id1=htmlspecialchars($id);
            $query=mysqli_query($con,"SELECT * FROM kategorije WHERE id='$id1'");
            $r=mysqli_fetch_assoc($query);
            $ime=$r['ime'];
            echo'<br><input style="min-width:50%;min-height:40px;font-size:30px;" type="text" name="editcat" placeholder="NOW NAME IS : '.$ime.' " />
            <input type="submit" name="catsub" value="EDIT" />';
            if(isset($_POST["catsub"])){
                $newname=$_POST["editcat"];
                $newname=htmlspecialchars($newname);
                if(!empty($newname)){
                    $query=mysqli_query($con,"UPDATE kategorije SET ime='$newname' WHERE id='$id1'");
                    if($query){
                        echo ' SUCCSESS';
                    }
                }
            }
            
        }
        ?>
    
    
    </form>
    <?php
    
    $query=mysqli_query($con,"SELECT * FROM kategorije");
    while($r=mysqli_fetch_assoc($query)){
        $ime=$r['ime'];
        $id=$r['id'];
        echo'<h2>'.$ime.'</h2><a href="?page=category&&edit='.$id.'">EDIT</a><a href="?page=category&&remove='.$id.'"> REMOVE</a>';
    }
    
    ?>
    
</div>