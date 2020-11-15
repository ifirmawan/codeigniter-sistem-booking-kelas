<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
		<html xmlns="http://www.w3.org/1999/xhtml">
		<head>
    	<meta http-equiv="Content-Type" content="text/html; charset=' . strtolower(config_item('charset')) . '" />
    	<title><?php echo (isset($subject))? html_escape($subject) : 'Sibuk app';?></title>
    	<style type="text/css">
        body {
            font-family: Arial, Verdana, Helvetica, sans-serif;
            font-size: 16px;
        }
    	</style>
</head>
<body>
<h3>Please enter this code</h3>
<h4> <?php echo (isset($code))? $code : 'error';?></h4>
<p>
    You can contact Student number at 
    <a href="tel:<?php echo $user[0]['mhs_kontak_hp'];?>"><?php echo $user[0]['mhs_kontak_hp'];?></a>
    or email at 
    <a href="mailto:<?php echo $user[0]['user_email'];?>"><?php echo $user[0]['user_email'];?></a>
    <strong>To confirm this boooking room with class name <h3><?php echo (isset($room->room_name))? $room->room_name : 'ask the room to admin';?></h3>
    </strong>
</p>

website : www.sibuk <br/>
Contact support : 085726720879 </br>
</body>
</html>