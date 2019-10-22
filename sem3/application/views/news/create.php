<div class="body">
<h2><?php echo $title; ?></h2>

<?php echo validation_errors(); ?>

<?php echo form_open('news/create', 'class="userform"'); // 1. skickar till controllern.?> 
	<label for="title">Title</label>
    <input type="input" name="title" placeholder="Choose title" /><br/>

    <input type="text" name="text" placeholder="Choose text"></input><br />

    <input type="submit" name="submit" value="skapa user" />

</form>
</div>