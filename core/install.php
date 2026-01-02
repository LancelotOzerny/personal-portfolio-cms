<?php
use Tables\SkillAreasTable;

(new SkillAreasTable())->insert([
    'name' => 'Frontend',
    'description' =>
        <<<text
            lorem ipsum emmet dollar el grande lorem ipsum emmet dollar el grande 
            lorem ipsum emmet dollar el grande lorem ipsum emmet dollar el grande
            lorem ipsum emmet dollar el grande lorem ipsum emmet dollar el grande
        text,
]);
(new SkillAreasTable())->insert([
    'name' => 'Backend',
    'description' =>
        <<<text
            lorem ipsum emmet dollar el grande lorem ipsum emmet dollar el grande 
            lorem ipsum emmet dollar el grande lorem ipsum emmet dollar el grande
            lorem ipsum emmet dollar el grande lorem ipsum emmet dollar el grande
        text,
]);