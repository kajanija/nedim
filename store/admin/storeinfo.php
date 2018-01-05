<div id="page-right-content">
<form method="post">
    <h2>EDIT STORE INFO</h2>
<?php
    
$query=mysqli_query($con,"SELECT * FROM storeinfo");
while($r=mysqli_fetch_assoc($query)){
    $url=$r['url'];
    
    echo'<h2>URL OF SITE</h2><input type="text" name="storeurl" placeholder="'.$url.'" required />
    <h2>STORE NAME</h2><input type="text" name="storeurl" placeholder="'.$url.'" required />
    <h2>CONTACT TEL / NUMBER</h2><input type="text" name="storeurl" placeholder="'.$url.'" required />
    <h2>EMAIL</h2><input type="text" name="storeurl" placeholder="'.$url.'" required />
    <h2>WORKING DAYS</h2> <select name="radnovrijeme"><option value="MON">MONDAY</option>
    <option value="TUE">TUESDAY</option>
    <option value="WED">WEDNESDAY</option>
    <option value="THU">THURSDAY</option>
    <option value="FRI">FRIDAY</option>
    <option value="SAT">SATURDAY</option>
    <option value="SUN">SUNDAY</option>
    </select> - <select name="radnovrijeme2"><option value="MON">MONDAY</option>
    <option value="TUE">TUESDAY</option>
    <option value="WED">WEDNESDAY</option>
    <option value="THU">THURSDAY</option>
    <option value="FRI">FRIDAY</option>
    <option value="SAT">SATURDAY</option>
    <option value="SUN">SUNDAY</option>
    </select>
    <h2>WORKING HOURS</h2><input type="time" name="radnovrijeme" /> - <input type="time" name="radnovrijeme" />';
    
}
     
     ?>
    </form>
</div>