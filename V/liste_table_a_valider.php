<?php 
foreach ($user as $nb)
{	

	echo "<tr>";
	echo  "<th scope=\"row\">" . $nb->getId() . "</th>";
	echo  "<td>" . $nb->getNom() . "</td>";
	echo  "<td>" . $nb->getPrenom() . "</td>";
	echo  "<td>" . $nb->getMail() . "</td>";
	echo  "<td>" . $nb->getTel() . "</td>";
	echo  "<td><input type=\"checkbox\" class=\"form-check-input\" value=\"" . $nb->getId() . "\" name=\""."name" . $nb->getId() . "\"></td>";
	echo "</tr>";

	
}
?>