<?
$action_list=array(
  "addTimetable" => "Add New Schedule",
  "manageTimetable" => "Modify Schedule",
);
plugin_sub_header("staff",$action_list); 
?>
<?   
   if(isset($errors) && !empty($errors)){   
    show_errors($errors);   
	}   
	if(isset($success) && !empty($success)){ 
	show_success($success);   
	}   
?>

<?
if(isset($allstaffs) && !empty($allstaffs)){
  include "schedule/form.php";
}else{
  include "schedule/get_info.php";
}
?>

