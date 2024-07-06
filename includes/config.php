<?php
	$is_home = false;
	switch ($_SERVER["SCRIPT_NAME"]) {
		case "/a-propos.php":
			$CURRENT_PAGE = "About"; 
			$PAGE_TITLE = "À Propos | SM PRIVÉ - Clinique Médicale Privée à Montréal";
			break;
		case "contact.php":
			$CURRENT_PAGE = "Contact"; 
			$PAGE_TITLE = "Nous Joindre | SM PRIVÉ - Clinique Médicale Privée à Montréal";
			break;
		default:
			$CURRENT_PAGE = "Index";
			$is_home = true;
			$PAGE_TITLE = "SM PRIVÉ - Clinique Médicale Privée à Montréal";
	}
?>