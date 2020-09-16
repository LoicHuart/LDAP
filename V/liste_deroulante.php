<?php

$ou = $manager->getOuLdap();
foreach ($ou as $nb) {
    echo "<option>" .  $nb . "</option>";
}
?>