<h2>Questions & Answers</h2>
<script language="javascript">
var questions = {
	
};

$(document).ready(function() {
	function runquestion(kw)
	{
		$('#answers_result').html('<img src="images/loading.gif" />');
		url = 'y/answers?nolayout=1&kw='+kw;
		console.log(url);
		$.get(url, function(data) {
			$('#answers_result').html(data.html);
		});
	}
	$("#form_questions").live("submit", function(){
		runquestion($('#kw').val());
		return false;
	});
	$(".question_tags").live("click", function(){
		runquestion($(this).text());
		return false;
	});
});
</script>
<form name="form_questions" id="form_questions" method="get" action="">
	<label for="kw"></label>
	<input type="text" name="kw" id="kw" size="50">
	<input type="submit" name="submit_question" id="submit_question" value="Search">
</form>
<?php
if (!empty($tags)) { ?>
<hr>
<marquee onMouseOver="this.stop();" onMouseOut="this.start();" loop="-1" ><b>Previous Tags: </b>
| 
<?php foreach ($tags as $k => $v) { ?>
<a href="y/answers?kw=<?php echo$v; ?> " class="question_tags" rel="<?php echo $v; ?>"><?php echo $v; ?></a> | 
<?php } ?>
</marquee>
<hr>
<?php } ?>
<div id="answers_result">

</div>
<!-- #BeginLibraryItem "/Library/pagerendering.lbi" -->
<!--<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds / {memory_usage}</p>-->
<!-- #EndLibraryItem -->