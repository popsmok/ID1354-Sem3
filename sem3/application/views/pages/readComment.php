
<?php
	foreach ($kommentar as $comment_item): ?>

	<p class="p2"><?php echo $comment_item['comment']; ?></p>
		<?php if (isset($_SESSION['user']))
			{
				if($comment_item['user'] == $_SESSION['user'])
					{
						echo form_open('comments/deleteComment', 'name = "delete"', 'class = "userform"'); ?>
						<input type="hidden" name="timestamp" value="<?php echo $comment_item['timestamp'] ?>"/>
						<br>
						<input type="submit" name="buttonDelete" id="buttonDelete" formaction="<?php echo base_url();?>comments/deleteComment" value="Delete comment" />
						<?php
					}
			}
		?>
	<br>
	<p class="p3"><?php echo $comment_item['user'].' '.$comment_item['timestamp']; ?></p>
	<br><br>

<?php endforeach; ?>