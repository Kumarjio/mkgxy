<style type="text/css">
.question {
	font-size: 14px;
	color: #00F;
}
.answer {
	font-size: 16px;
}
</style>

<?php
if (isset($error)) {
	echo 'No Result Found.';
} else {
	?>
	<ul>
	<?php
	foreach ($records as $k => $v) {
		?>
		<li><p class="question"><?php echo $v['Content']; ?></p>
		<p class="answer"><b>Answer: </b><?php echo $v['ChosenAnswer']; ?></p>
		<p align="right"><?php echo $v['Date']; ?> | <a href="<?php echo $v['Link']; ?>" target="_blank" rel="nofollow">Read More...</a></p>
		</li>
		<?php
	}
	?>
	</ul>
	<?php
}
echo '<!-- URL: '.$url.'-->';
?>
<!-- #BeginLibraryItem "/Library/pagerendering.lbi" -->
<!--<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds / {memory_usage}</p>-->
<!-- #EndLibraryItem -->