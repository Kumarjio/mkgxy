<?php require_once('../Connections/connWork.php'); ?>
<?php
if (empty($_SESSION['user'])) {
	header("Location: /users/login");
	exit;
}
if (empty($_GET['record_id'])) {
	header("Location: /step1a");
	exit;
}

$colname_rsView = "-1";
if (isset($_GET['record_id'])) {
  $colname_rsView = (get_magic_quotes_gpc()) ? $_GET['record_id'] : addslashes($_GET['record_id']);
}
mysql_select_db($database_connWork, $connWork);
$query_rsView = sprintf("SELECT * FROM real_money_records_simple WHERE record_id = '%s' AND deleted = 0", $colname_rsView);
$rsView = mysql_query($query_rsView, $connWork) or die(mysql_error());
$row_rsView = mysql_fetch_assoc($rsView);
$totalRows_rsView = mysql_num_rows($rsView);

if ($totalRows_rsView == 0) {
	header("Location: /step1a");
	exit;
}

$netFees = $row_rsView['netFees'];
$amount = $netFees;
$arr = $row_rsView;
$customStr = json_encode($arr);
?>
<div align="center" style="width:80%">
<h1>Real Money Making</h1>

  <fieldset><legend>Step 2 Payment of amount $<?php echo $amount; ?></legend>

<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
    <input type="hidden" name="cmd" value="_xclick">
    <input type="hidden" name="business" value="renu09@live.com">
  <input type="hidden" name="item_name" id="item_name" value="Admin Fees">
      <input type="hidden" name="custom" id="custom" value='<?php echo $customStr; ?>' >
      <input type="hidden" name="amount" value="<?php echo $amount; ?>">
      <input type="hidden" name="item_number" id="item_number" value="1011" >
    <input type="hidden" name="currency_code" value="USD">
  <input type="hidden" name="return" value="http://real-money-making.com/confirmpaypal">
  <input type="hidden" name="cancel_return" value="http://real-money-making.com/cancelpaypal">
  <input type="hidden" name="notify_url" value="http://real-money-making.com/notifypaypal">
    <!-- Display the payment button. -->
    <input type="image" name="submit" border="0"
    src="https://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif"
    alt="PayPal - The safer, easier way to pay online">
    <img alt="" border="0" width="1" height="1"
    src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" >
</form>
<br /><br /><br /><br /><br /><br />
  </fieldset>
  </div>
  <?php
mysql_free_result($rsView);
?>
