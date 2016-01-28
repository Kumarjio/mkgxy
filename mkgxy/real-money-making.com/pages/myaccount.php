<?php require_once('../../Connections/connWork.php'); ?>
<?php
$colname_rsView = "-1";
if (isset($_SESSION['MM_UserId'])) {
  $colname_rsView = (get_magic_quotes_gpc()) ? $_SESSION['MM_UserId'] : addslashes($_SESSION['MM_UserId']);
}
mysql_select_db($database_connWork, $connWork);
$query_rsView = sprintf("SELECT * FROM real_money_records_simple WHERE user_id = '%s' And deleted = 0 ORDER BY created_dt DESC", $colname_rsView);
$rsView = mysql_query($query_rsView, $connWork) or die(mysql_error());
$row_rsView = mysql_fetch_assoc($rsView);
$totalRows_rsView = mysql_num_rows($rsView);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>
my account 
</body>
</html>
<?php
mysql_free_result($rsView);
?>
