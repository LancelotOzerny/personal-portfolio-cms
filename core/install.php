<?php
use Tables\SkillAreasTable;
use Dev\Tables\SkillsTable;

$config = [
    'skill_areas' => [
        'create' => 'N',
    ],
    'skills' => [
        'create' => 'Y',
    ],
];


try {
    if ($config['skill_areas']['create'] === 'Y') {
        $skillAreaTable = new SkillAreasTable();
        $skillAreaTable->create();
        $skillAreaTable->insert([
            'name' => 'Frontend',
            'description' =>
                <<<text
                lorem ipsum emmet dollar el grande lorem ipsum emmet dollar el grande 
                lorem ipsum emmet dollar el grande lorem ipsum emmet dollar el grande
                lorem ipsum emmet dollar el grande lorem ipsum emmet dollar el grande
            text,
        ]);
        $skillAreaTable->insert([
            'name' => 'Backend',
            'description' =>
                <<<text
                lorem ipsum emmet dollar el grande lorem ipsum emmet dollar el grande 
                lorem ipsum emmet dollar el grande lorem ipsum emmet dollar el grande
                lorem ipsum emmet dollar el grande lorem ipsum emmet dollar el grande
            text,
        ]);
    }

    if ($config['skills']['create'] === 'Y')
    {
        $skillsTable = new SkillsTable();
        $skillsTable->create();

        $skillsTable->insert([
            'name' => 'html',
            'progress' => 85,
            'skill_area_id' => 1,
        ]);

        $skillsTable->insert([
            'name' => 'css',
            'progress' => 85,
            'skill_area_id' => 1,
        ]);

        $skillsTable->insert([
            'name' => 'js',
            'progress' => 30,
            'skill_area_id' => 1,
        ]);

        $skillsTable->insert([
            'name' => 'php',
            'progress' => 40,
            'skill_area_id' => 2,
        ]);

        $skillsTable->insert([
            'name' => '1c-bitrix framework',
            'progress' => 15,
            'skill_area_id' => 2,
        ]);
    }
}
catch (Throwable $e)
{
    echo '<pre>';
    print_r([
        'message' => $e->getMessage(),
        'file' => $e->getFile(),
        'line' => $e->getLine(),
    ]);
    echo '</pre>';
}