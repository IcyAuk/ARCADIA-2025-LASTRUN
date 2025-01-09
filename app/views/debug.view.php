<?php
    if (!empty($data['race'])) {
        foreach ($data['race'] as $animal) {
            echo "ID: " . esc($animal->id) . "<br>";
            echo "Name: " . esc($animal->name) . "<br>";
            echo "Race: " . esc($animal->race) . "<br>";
            echo "Habitat ID: " . $animal->habitat_id . "<br>";
            echo "Image ID: " . $animal->image_id . "<br>";
            echo("<br>");
            echo("<br>");
        }
    }
?>