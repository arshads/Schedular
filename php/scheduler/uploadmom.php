<div style="width:680px; margin:auto 0; float:left; min-height: 200px;  ">
<div style="width:680px; float:left; font-weight: bold; font-size: 16px; margin:10px 10px; text-align:center;">Upload Minutes of Meeting</div>
<div style="width:310px; float:left; border:1px solid #E1E1E1; margin:10px 187px; border-radius:5px; height:60px;
padding-top: 30px; background-color:#E1E1EF">
<form action="process.php?task=uploadmom" method="post" enctype="multipart/form-data">
<div style="width:200px; float:left"><input type="file" name="file"><input type="hidden" name="momid" value="<?php echo $_REQUEST['momid']; ?>"></div>
<div style="width:100px; float:left"><input type="submit" name="submit" value="Upload" class="button" ></div>
</form>
</div>
</div>