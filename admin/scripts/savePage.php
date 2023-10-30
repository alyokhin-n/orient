<?php 
	include("../config/dbconnect.php"); 
	include("../config/checkAdmin.php"); 
	
	$type = mysqli_real_escape_string($link, $_POST['type']);
	
	if ($type == "mainpage")
	{
		$block1_title = mysqli_real_escape_string($link, $_POST['block1_title']);
		$block1_subtitle = mysqli_real_escape_string($link, $_POST['block1_subtitle']);
		$block1_link = mysqli_real_escape_string($link, $_POST['block1_link']);
		$block2_title = mysqli_real_escape_string($link, $_POST['block2_title']);
		$block2_title1 = mysqli_real_escape_string($link, $_POST['block2_title1']);
		$block2_subtitle1 = mysqli_real_escape_string($link, $_POST['block2_subtitle1']);
		$block2_title2 = mysqli_real_escape_string($link, $_POST['block2_title2']);
		$block2_subtitle2 = mysqli_real_escape_string($link, $_POST['block2_subtitle2']);
		$block2_title3 = mysqli_real_escape_string($link, $_POST['block2_title3']);
		$block2_subtitle3 = mysqli_real_escape_string($link, $_POST['block2_subtitle3']);
		$block3_title1 = mysqli_real_escape_string($link, $_POST['block3_title1']);
		$block3_title2 = mysqli_real_escape_string($link, $_POST['block3_title2']);
		$block3_title3 = mysqli_real_escape_string($link, $_POST['block3_title3']);
		$block3_subtitle1 = mysqli_real_escape_string($link, $_POST['block3_subtitle1']);
		$block3_subtitle2 = mysqli_real_escape_string($link, $_POST['block3_subtitle2']);
		$block3_subtitle3 = mysqli_real_escape_string($link, $_POST['block3_subtitle3']);
		$block3_link_1 = mysqli_real_escape_string($link, $_POST['block3_link_1']);
		$block3_link_2 = mysqli_real_escape_string($link, $_POST['block3_link_2']);
		$block3_link_3 = mysqli_real_escape_string($link, $_POST['block3_link_3']);
		$block3_titlemain = mysqli_real_escape_string($link, $_POST['block3_titlemain']);
		$block4_titlemain = mysqli_real_escape_string($link, $_POST['block4_titlemain']);
		
		
		$block5_titlemain = mysqli_real_escape_string($link, $_POST['block5_titlemain']);
		$block5_subtitle = mysqli_real_escape_string($link, $_POST['block5_subtitle']);
		$block5_content1 = mysqli_real_escape_string($link, $_POST['block5_content1']);
		$block5_content2 = mysqli_real_escape_string($link, $_POST['block5_content2']);
		$block5_note = mysqli_real_escape_string($link, $_POST['block5_note']);
		$block6_main = mysqli_real_escape_string($link, $_POST['block6_main']);
		$block6_subtitle = mysqli_real_escape_string($link, $_POST['block6_subtitle']);
		
		$query = mysqli_query($link, "UPDATE in_pages_data SET setting_value = '$block1_title' WHERE setting_name = 'block1_title'");
		$query = mysqli_query($link, "UPDATE in_pages_data SET setting_value = '$block1_subtitle' WHERE setting_name = 'block1_subtitle'");
		$query = mysqli_query($link, "UPDATE in_pages_data SET setting_value = '$block1_link' WHERE setting_name = 'block1_link'");
		$query = mysqli_query($link, "UPDATE in_pages_data SET setting_value = '$block2_title' WHERE setting_name = 'block2_title'");
		$query = mysqli_query($link, "UPDATE in_pages_data SET setting_value = '$block2_title1' WHERE setting_name = 'block2_title1'");
		$query = mysqli_query($link, "UPDATE in_pages_data SET setting_value = '$block2_subtitle1' WHERE setting_name = 'block2_subtitle1'");
		$query = mysqli_query($link, "UPDATE in_pages_data SET setting_value = '$block2_title2' WHERE setting_name = 'block2_title2'");
		$query = mysqli_query($link, "UPDATE in_pages_data SET setting_value = '$block2_subtitle2' WHERE setting_name = 'block2_subtitle2'");
		$query = mysqli_query($link, "UPDATE in_pages_data SET setting_value = '$block2_title3' WHERE setting_name = 'block2_title3'");
		$query = mysqli_query($link, "UPDATE in_pages_data SET setting_value = '$block2_subtitle3' WHERE setting_name = 'block2_subtitle3'");
		$query = mysqli_query($link, "UPDATE in_pages_data SET setting_value = '$block3_title1' WHERE setting_name = 'block3_title1'");
		$query = mysqli_query($link, "UPDATE in_pages_data SET setting_value = '$block3_title2' WHERE setting_name = 'block3_title2'");
		$query = mysqli_query($link, "UPDATE in_pages_data SET setting_value = '$block3_title3' WHERE setting_name = 'block3_title3'");
		$query = mysqli_query($link, "UPDATE in_pages_data SET setting_value = '$block3_subtitle1' WHERE setting_name = 'block3_subtitle1'");
		$query = mysqli_query($link, "UPDATE in_pages_data SET setting_value = '$block3_subtitle2' WHERE setting_name = 'block3_subtitle2'");
		$query = mysqli_query($link, "UPDATE in_pages_data SET setting_value = '$block3_subtitle3' WHERE setting_name = 'block3_subtitle3'");
		$query = mysqli_query($link, "UPDATE in_pages_data SET setting_value = '$block3_link_1' WHERE setting_name = 'block3_link_1'");
		$query = mysqli_query($link, "UPDATE in_pages_data SET setting_value = '$block3_link_2' WHERE setting_name = 'block3_link_2'");
		$query = mysqli_query($link, "UPDATE in_pages_data SET setting_value = '$block3_link_3' WHERE setting_name = 'block3_link_3'");
		$query = mysqli_query($link, "UPDATE in_pages_data SET setting_value = '$block3_titlemain' WHERE setting_name = 'block3_titlemain'");
		$query = mysqli_query($link, "UPDATE in_pages_data SET setting_value = '$block4_titlemain' WHERE setting_name = 'block4_titlemain'");
		$query = mysqli_query($link, "UPDATE in_pages_data SET setting_value = '$block5_titlemain' WHERE setting_name = 'block5_titlemain'");
		$query = mysqli_query($link, "UPDATE in_pages_data SET setting_value = '$block5_subtitle' WHERE setting_name = 'block5_subtitle'");
		$query = mysqli_query($link, "UPDATE in_pages_data SET setting_value = '$block5_content1' WHERE setting_name = 'block5_content1'");
		$query = mysqli_query($link, "UPDATE in_pages_data SET setting_value = '$block5_content2' WHERE setting_name = 'block5_content2'");
		$query = mysqli_query($link, "UPDATE in_pages_data SET setting_value = '$block5_note' WHERE setting_name = 'block5_note'");
		$query = mysqli_query($link, "UPDATE in_pages_data SET setting_value = '$block6_main' WHERE setting_name = 'block6_main'");
		$query = mysqli_query($link, "UPDATE in_pages_data SET setting_value = '$block6_subtitle' WHERE setting_name = 'block6_subtitle'");
	}
	
	if ($type == "settings")
	{
		$email = mysqli_real_escape_string($link, $_POST['email']);
		
		
		$query = mysqli_query($link, "UPDATE in_pages_data SET setting_value = '$email' WHERE setting_name = 'email' AND setting_type = 'settings'");
		
	}
	
	
	
	
	
	
	if ($type == "businessmodel")
	{

		
		$block1_title = mysqli_real_escape_string($link, $_POST['block1_title']);
		$block1_subtitle = mysqli_real_escape_string($link, $_POST['block1_subtitle']);
		$block1_link = mysqli_real_escape_string($link, $_POST['block1_link']);
		$block2_title = mysqli_real_escape_string($link, $_POST['block2_title']);
		$block2_title1 = mysqli_real_escape_string($link, $_POST['block2_title1']);
		$block2_subtitle1 = mysqli_real_escape_string($link, $_POST['block2_subtitle1']);
		$block2_title2 = mysqli_real_escape_string($link, $_POST['block2_title2']);
		$block2_subtitle2 = mysqli_real_escape_string($link, $_POST['block2_subtitle2']);
		$block2_title3 = mysqli_real_escape_string($link, $_POST['block2_title3']);
		$block2_subtitle3 = mysqli_real_escape_string($link, $_POST['block2_subtitle3']);
		$block2_subtitle = mysqli_real_escape_string($link, $_POST['block2_subtitle']);
		$block2_note = mysqli_real_escape_string($link, $_POST['block2_note']);
		$block3_title = mysqli_real_escape_string($link, $_POST['block3_title']);
		$block3_subtitle = mysqli_real_escape_string($link, $_POST['block3_subtitle']);
		$block3_title_1 = mysqli_real_escape_string($link, $_POST['block3_title_1']);
		$block3_subtitle_1 = mysqli_real_escape_string($link, $_POST['block3_subtitle_1']);
		$block3_title_2 = mysqli_real_escape_string($link, $_POST['block3_title_2']);
		$block3_subtitle_2 = mysqli_real_escape_string($link, $_POST['block3_subtitle_2']);
		$block3_title_3 = mysqli_real_escape_string($link, $_POST['block3_title_3']);
		$block3_subtitle_3 = mysqli_real_escape_string($link, $_POST['block3_subtitle_3']);
		$block3_title_4 = mysqli_real_escape_string($link, $_POST['block3_title_4']);
		$block3_subtitle_4 = mysqli_real_escape_string($link, $_POST['block3_subtitle_4']);
		$block3_title_5 = mysqli_real_escape_string($link, $_POST['block3_title_5']);
		$block3_subtitle_5 = mysqli_real_escape_string($link, $_POST['block3_subtitle_5']);
		$block3_title_6 = mysqli_real_escape_string($link, $_POST['block3_title_6']);
		$block3_subtitle_6 = mysqli_real_escape_string($link, $_POST['block3_subtitle_6']);
		$block4_title = mysqli_real_escape_string($link, $_POST['block4_title']);
		$block4_subtitle = mysqli_real_escape_string($link, $_POST['block4_subtitle']);
		$block4_title_1 = mysqli_real_escape_string($link, $_POST['block4_title_1']);
		$block4_subtitle_1 = mysqli_real_escape_string($link, $_POST['block4_subtitle_1']);
		$block4_title_2 = mysqli_real_escape_string($link, $_POST['block4_title_2']);
		$block4_subtitle_2 = mysqli_real_escape_string($link, $_POST['block4_subtitle_2']);
		$block4_title_3 = mysqli_real_escape_string($link, $_POST['block4_title_3']);
		$block4_subtitle_3 = mysqli_real_escape_string($link, $_POST['block4_subtitle_3']);
		$block5_title = mysqli_real_escape_string($link, $_POST['block5_title']);
		$block5_subtitle = mysqli_real_escape_string($link, $_POST['block5_subtitle']);
		$block5_content = mysqli_real_escape_string($link, $_POST['block5_content']);
		$block5_note = mysqli_real_escape_string($link, $_POST['block5_note']);
		$block6_title = mysqli_real_escape_string($link, $_POST['block6_title']);
		$block6_subtitle = mysqli_real_escape_string($link, $_POST['block6_subtitle']);
		$block6_title_1 = mysqli_real_escape_string($link, $_POST['block6_title_1']);
		$block6_subtitle_1 = mysqli_real_escape_string($link, $_POST['block6_subtitle_1']);
		$block6_link_1 = mysqli_real_escape_string($link, $_POST['block6_link_1']);
		$block6_title_2 = mysqli_real_escape_string($link, $_POST['block6_title_2']);
		$block6_subtitle_2 = mysqli_real_escape_string($link, $_POST['block6_subtitle_2']);
		$block6_link_2 = mysqli_real_escape_string($link, $_POST['block6_link_2']);
		$block6_title_3 = mysqli_real_escape_string($link, $_POST['block6_title_3']);
		$block6_subtitle_3 = mysqli_real_escape_string($link, $_POST['block6_subtitle_3']);
		$block6_link_3 = mysqli_real_escape_string($link, $_POST['block6_link_3']);
		$block7_title = mysqli_real_escape_string($link, $_POST['block7_title']);
		$block7_subtitle = mysqli_real_escape_string($link, $_POST['block7_subtitle']);
		$block7_content = mysqli_real_escape_string($link, $_POST['block7_content']);
		
		
		
		$query = mysqli_query($link, "UPDATE in_pages_data SET setting_value = '$block1_title' WHERE setting_name = 'block1_title'");
		$query = mysqli_query($link, "UPDATE in_pages_data SET setting_value = '$block1_subtitle' WHERE setting_name = 'block1_subtitle'");
		$query = mysqli_query($link, "UPDATE in_pages_data SET setting_value = '$block1_link' WHERE setting_name = 'block1_link'");
		$query = mysqli_query($link, "UPDATE in_pages_data SET setting_value = '$block2_title' WHERE setting_name = 'block2_title'");
		$query = mysqli_query($link, "UPDATE in_pages_data SET setting_value = '$block2_title1' WHERE setting_name = 'block2_title1'");
		$query = mysqli_query($link, "UPDATE in_pages_data SET setting_value = '$block2_subtitle1' WHERE setting_name = 'block2_subtitle1'");
		$query = mysqli_query($link, "UPDATE in_pages_data SET setting_value = '$block2_title2' WHERE setting_name = 'block2_title2'");
		$query = mysqli_query($link, "UPDATE in_pages_data SET setting_value = '$block2_subtitle2' WHERE setting_name = 'block2_subtitle2'");
		$query = mysqli_query($link, "UPDATE in_pages_data SET setting_value = '$block2_title3' WHERE setting_name = 'block2_title3'");
		$query = mysqli_query($link, "UPDATE in_pages_data SET setting_value = '$block2_subtitle3' WHERE setting_name = 'block2_subtitle3'");
		$query = mysqli_query($link, "UPDATE in_pages_data SET setting_value = '$block2_subtitle' WHERE setting_name = 'block2_subtitle'");
		$query = mysqli_query($link, "UPDATE in_pages_data SET setting_value = '$block2_note' WHERE setting_name = 'block2_note'");
		$query = mysqli_query($link, "UPDATE in_pages_data SET setting_value = '$block3_title' WHERE setting_name = 'block3_title'");
		$query = mysqli_query($link, "UPDATE in_pages_data SET setting_value = '$block3_subtitle' WHERE setting_name = 'block3_subtitle'");
		$query = mysqli_query($link, "UPDATE in_pages_data SET setting_value = '$block3_title_1' WHERE setting_name = 'block3_title_1'");
		$query = mysqli_query($link, "UPDATE in_pages_data SET setting_value = '$block3_subtitle_1' WHERE setting_name = 'block3_subtitle_1'");
		$query = mysqli_query($link, "UPDATE in_pages_data SET setting_value = '$block3_title_2' WHERE setting_name = 'block3_title_2'");
		$query = mysqli_query($link, "UPDATE in_pages_data SET setting_value = '$block3_subtitle_2' WHERE setting_name = 'block3_subtitle_2'");
		$query = mysqli_query($link, "UPDATE in_pages_data SET setting_value = '$block3_title_3' WHERE setting_name = 'block3_title_3'");
		$query = mysqli_query($link, "UPDATE in_pages_data SET setting_value = '$block3_subtitle_3' WHERE setting_name = 'block3_subtitle_3'");
		$query = mysqli_query($link, "UPDATE in_pages_data SET setting_value = '$block3_title_4' WHERE setting_name = 'block3_title_4'");
		$query = mysqli_query($link, "UPDATE in_pages_data SET setting_value = '$block3_subtitle_4' WHERE setting_name = 'block3_subtitle_4'");
		$query = mysqli_query($link, "UPDATE in_pages_data SET setting_value = '$block3_title_5' WHERE setting_name = 'block3_title_5'");
		$query = mysqli_query($link, "UPDATE in_pages_data SET setting_value = '$block3_subtitle_5' WHERE setting_name = 'block3_subtitle_5'");
		$query = mysqli_query($link, "UPDATE in_pages_data SET setting_value = '$block3_title_6' WHERE setting_name = 'block3_title_6'");
		$query = mysqli_query($link, "UPDATE in_pages_data SET setting_value = '$block3_subtitle_6' WHERE setting_name = 'block3_subtitle_6'");
		$query = mysqli_query($link, "UPDATE in_pages_data SET setting_value = '$block4_title' WHERE setting_name = 'block4_title'");
		$query = mysqli_query($link, "UPDATE in_pages_data SET setting_value = '$block4_subtitle' WHERE setting_name = 'block4_subtitle'");
		$query = mysqli_query($link, "UPDATE in_pages_data SET setting_value = '$block4_title_1' WHERE setting_name = 'block4_title_1'");
		$query = mysqli_query($link, "UPDATE in_pages_data SET setting_value = '$block4_subtitle_1' WHERE setting_name = 'block4_subtitle_1'");
		$query = mysqli_query($link, "UPDATE in_pages_data SET setting_value = '$block4_title_2' WHERE setting_name = 'block4_title_2'");
		$query = mysqli_query($link, "UPDATE in_pages_data SET setting_value = '$block4_subtitle_2' WHERE setting_name = 'block4_subtitle_2'");
		$query = mysqli_query($link, "UPDATE in_pages_data SET setting_value = '$block4_title_3' WHERE setting_name = 'block4_title_3'");
		$query = mysqli_query($link, "UPDATE in_pages_data SET setting_value = '$block4_subtitle_3' WHERE setting_name = 'block4_subtitle_3'");
		$query = mysqli_query($link, "UPDATE in_pages_data SET setting_value = '$block5_title' WHERE setting_name = 'block5_title'");
		$query = mysqli_query($link, "UPDATE in_pages_data SET setting_value = '$block5_subtitle' WHERE setting_name = 'block5_subtitle'");
		$query = mysqli_query($link, "UPDATE in_pages_data SET setting_value = '$block5_content' WHERE setting_name = 'block5_content'");
		$query = mysqli_query($link, "UPDATE in_pages_data SET setting_value = '$block5_note' WHERE setting_name = 'block5_note'");
		$query = mysqli_query($link, "UPDATE in_pages_data SET setting_value = '$block6_title' WHERE setting_name = 'block6_title'");
		$query = mysqli_query($link, "UPDATE in_pages_data SET setting_value = '$block6_subtitle' WHERE setting_name = 'block6_subtitle'");
		$query = mysqli_query($link, "UPDATE in_pages_data SET setting_value = '$block6_title_1' WHERE setting_name = 'block6_title_1'");
		$query = mysqli_query($link, "UPDATE in_pages_data SET setting_value = '$block6_subtitle_1' WHERE setting_name = 'block6_subtitle_1'");
		$query = mysqli_query($link, "UPDATE in_pages_data SET setting_value = '$block6_link_1' WHERE setting_name = 'block6_link_1'");
		$query = mysqli_query($link, "UPDATE in_pages_data SET setting_value = '$block6_title_2' WHERE setting_name = 'block6_title_2'");
		$query = mysqli_query($link, "UPDATE in_pages_data SET setting_value = '$block6_subtitle_2' WHERE setting_name = 'block6_subtitle_2'");
		$query = mysqli_query($link, "UPDATE in_pages_data SET setting_value = '$block6_link_2' WHERE setting_name = 'block6_link_2'");
		$query = mysqli_query($link, "UPDATE in_pages_data SET setting_value = '$block6_title_3' WHERE setting_name = 'block6_title_3'");
		$query = mysqli_query($link, "UPDATE in_pages_data SET setting_value = '$block6_subtitle_3' WHERE setting_name = 'block6_subtitle_3'");
		$query = mysqli_query($link, "UPDATE in_pages_data SET setting_value = '$block6_link_3' WHERE setting_name = 'block6_link_3'");
		$query = mysqli_query($link, "UPDATE in_pages_data SET setting_value = '$block7_title' WHERE setting_name = 'block7_title'");
		$query = mysqli_query($link, "UPDATE in_pages_data SET setting_value = '$block7_subtitle' WHERE setting_name = 'block7_subtitle'");
		$query = mysqli_query($link, "UPDATE in_pages_data SET setting_value = '$block7_content' WHERE setting_name = 'block7_content'");
		
	}
?>