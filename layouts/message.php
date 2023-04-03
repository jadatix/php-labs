<?php
function showPopupMessage($message) {
		echo '<div class="popup">';
		echo '<p>' . $message . '</p>';
		echo '</div>';
		echo '<script>';
		echo 'setTimeout(function() {';
		echo 'document.querySelector(\'.popup\').style.display = \'none\';';
		echo '}, 5000);';
		echo '</script>';
    }
?>