<?php 
foreach ($userLdap as $nb)
{ 
    echo "<tr>";
    echo  "<th scope=\"row\">" . $nb->getUid() . "</th>";
    echo  "<td>" . $nb->getCn() . "</td>";
    echo  "<td>" . $nb->getSn() . "</td>";
    echo  "<td>" . $nb->getMail() . "</td>";
    echo  "<td>" . $nb->getTel() . "</td>";
    echo  "<td>" . $nb->getGroupe() . "</td>";
    echo  "<td><input type=\"checkbox\" class=\"form-check-input\" value=\"" . $nb->getUid() . "\" name=\""."name".$nb->getUid().$nb->getGroupe()."\"></td>";
    echo "</tr>";

}
?>