<?php
	$is_home = false;
	$script_name = $_SERVER["SCRIPT_NAME"];
	
	$pos = strpos($script_name, "services");
	$script_name = ($pos === false) ? $script_name  : "services";

	switch ($script_name) {
		case "/a-propos.php":
			$CURRENT_PAGE = "About"; 
			$PAGE_TITLE = "À Propos | SM PRIVÉ - Clinique Médicale Privée à Montréal";
			break;
		case "contact.php":
			$CURRENT_PAGE = "Contact"; 
			$PAGE_TITLE = "Nous Joindre | SM PRIVÉ - Clinique Médicale Privée à Montréal";
			break;
		case "services":
			$CURRENT_PAGE = "Services"; 
			$PAGE_TITLE = "Services | SM PRIVÉ - Clinique Médicale Privée à Montréal";
			break;
		default:
			$CURRENT_PAGE = "Index";
			$is_home = true;
			$PAGE_TITLE = "SM PRIVÉ - Clinique Médicale Privée à Montréal";
	}
?>