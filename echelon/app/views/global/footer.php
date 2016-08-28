<?php
if($pagination && !$db->error) : // check to see if pagination is required on this page
	if(!$no_data) : // if there no recorded records ?>
		<div class="under-table">
			<p class="num-rows">
				<?php recordNumber($start_row, $limit_rows, $total_rows); ?>
			</p>
			<?php if($total_rows > $limit_rows) : /* If the number of rows returned is not more than the min per page then don't show this section */ ?>
				<div class="pages">
							
					<?php if($page_no > 0) { /* Show if not first page */ ?>
						<a href="<?php printf("%25s?p=%d%s", $this_page, 0, $query_string_page); ?>" class="page" title="Go to the first page">&laquo; First</a>
			
						<a href="<?php printf("%25s?p=%d%s", $this_page, max(0, $page_no - 1), $query_string_page); ?>" class="page" title="Go to the previous page">&lsaquo; Previous</a>
						
						<?php if($page_no - 1 > 0) { ?>
							<a href="<?php printf("%25s?p=%d%s", $this_page, max(0, $page_no - 2), $query_string_page); ?>" class="page"><?php echo $page_no - 1; ?></a>
						<?php } ?>
					
						<?php if($page_no > 0) { ?>
							<a href="<?php printf("%25s?p=%d%s", $this_page, max(0, $page_no - 1), $query_string_page); ?>" class="page"><?php echo $page_no; ?></a>
						<?php } ?>
					
					<?php } ?>
					
					<span class="page current"><?php echo $page_no + 1; ?></span>
					
					<?php if($page_no < $total_pages) { /* Show if not last page */ ?>
					
						<?php if($page_no + 2 < $total_pages) { ?>								
							<a href="<?php printf("%25s?p=%d%s", $this_page, max(0, $page_no + 1), $query_string_page); ?>" class="page"><?php echo $page_no + 2; ?></a>
						<?php } ?>
						
						<?php if($page_no + 3 < $total_pages) { ?>
							<a href="<?php printf("%25s?p=%d%s", $this_page, max(0, $page_no + 2), $query_string_page); ?>" class="page"><?php echo $page_no + 3; ?></a>
						<?php }?>
						
						<a href="<?php printf("%25s?p=%d%s", $this_page, min($total_pages, $page_no + 1), $query_string_page); ?>" class="page" title="Go to the next page">Next &rsaquo;</a>
			
						<a href="<?php printf("%25s?p=%d%s", $this_page, $total_pages, $query_string_page); ?>" class="page" title="Go to the last page">Last &raquo;</a>
					
					<?php } ?>
				
				</div>
			<?php endif; ?>
			<br class="clear" />
		</div>
	<?php endif; // if there is data
endif; // end if pagination is on
?>

</div><!-- close #content -->

<?php if( !isset($dontShow)): ?>
<div id="footer">
	<p>
		<span class="copy">&copy;<?php echo date("Y"); ?> <a href="http://eire32designs.com" target="_blank">Eire32</a> &amp; <a href="http://bigbrotherbot.net" target="_blank">Big Brother Bot</a> - All rights reserved</span>
	</p>
</div><!-- close #footer -->
<?php endif; ?>

</div><!-- close #page-wrap -->


<script src="<?= $path; ?>app/assets/js/jquery.js"></script>
<script src="<?= $path; ?>app/assets/bootstrap/js/bootstrap.min.js"></script>
<!-- load main site js -->
<script src="<?php echo $path; ?>app/assets/js/site.js" charset="<?php echo $charset; ?>"></script>

<!-- page specific js -->
<?php if(isMe()) { ?>
	<script src="app/assets/js/me.js" charset="<?php echo $charset; ?>"></script>
<?php } ?>

<?php if(isCD()) : ?>
	<script src="app/assets/js/jquery.colorbox-min.js" charset="<?php echo $charset; ?>"></script>
	<script src="app/assets/js/cd.js" charset="<?php echo $charset; ?>"></script>
	<script charset="<?php echo $charset; ?>">
		$('#level-pw').hide();

		// check for show/hide PW required for level change 
		if ($('#level').val() >= <?php echo $config['cosmos']['pw_req_level_group']; ?>) {
			$("#level-pw").show();
		}
		$('#level').change(function(){
			if ($('#level').val() >= 64) {
				$("#level-pw").slideDown();
			} else {
				$("#level-pw").slideUp();
			}
		});
	</script>
<?php endif; ?>

<?php
	## plugin specific js ##
	if(!$no_plugins_active)
		$plugins->getJS();
?>

</body>
</html>
