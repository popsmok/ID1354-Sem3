
<?php echo form_open('comments/createComment','id = "create"', 'class="userform"'); ?>
<br>
    <input type="text" id="comment" name="comment" Placeholder="write your comment here" autocomplete="no" />
        <br>
    <input type="hidden" id="page" name="page"  value="<?php echo $title; ?>"/>

    <input type="submit" name="buttonCreate" id="buttonCreate" formaction="<?php echo base_url(); ?>comments/createComment" value="create a comment"></button>
</form>