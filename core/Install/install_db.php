<?php
$skillAreas = new \Tables\SkillAreasTable();
$skillTable = new \Tables\SkillsTable();
$projectsTable = new \Tables\ProjectsTable();
$projectLinksTable = new \Tables\ProjectLinksTable();
$certificatesTable = new \Tables\CertificatesTable();






$certificatesTable->delete();
$projectLinksTable->delete();
$projectsTable->delete();
$skillTable->delete();
$skillAreas->delete();






$skillAreas->create();
$skillAreas->insert(['name' => 'Frontend', 'description' => '']);
$skillAreas->insert(['name' => 'Backend', 'description' => '']);
$skillAreas->insert(['name' => 'Other', 'description' => '']);





$skillTable->create();
$skillTable->insert(['name' => 'html', 'progress' => 55, 'area_id' => 1]);
$skillTable->insert(['name' => 'pug', 'progress' => 55, 'area_id' => 1]);
$skillTable->insert(['name' => 'css', 'progress' => 55, 'area_id' => 2]);
$skillTable->insert(['name' => 'less', 'progress' => 55, 'area_id' => 3]);








$certificatesTable->create();
$certificatesTable->insert([
    'title' => 'Test Title',
    'name' => 'Test naming',
    'date' => '19-09-2019',
    'additional' => 'Additional TExt',
    'download_link' => '#',
]);
$certificatesTable->insert([
    'title' => 'Разработчик Bitrix Framework',
    'name' => 'Интеграция дизайна и настройка платформы',
    'date' => '26-08-2023',
    'additional' => 'Номер: CERT-EX-DEV-010-18327330-6925848-170239',
    'logo' => '/assets/images/1c-bitrix-logo.png',
    'download_link' => '#',
    'theme' => 'orange',
]);
$certificatesTable->insert([
    'title' => 'Диплом бакалавра',
    'name' => '09.03.02 Информационные системы и технологии',
    'date' => '05-05-2024',
    'additional' => 'Профиль: Разработка информационных систем',
    'logo' => '/assets/images/volsu.png',
    'download_link' => '#',
    'theme' => 'light',
]);







$projectsTable->create();
$projectLinksTable->create();
for ($i = 0; $i < 10; $i++)
{
    $projectsTable->insert([
        'name' => 'Project ' . $i + 1,
        'preview_text' => 'some text... some text... some text... some text... some text... some text... some text... some text... some text... some text... some text... some text... some text... some text... some text... some text... some text... ',
        'preview_image' => '/assets/images/projects.png',
        'text' =>   'some text... some text... some text... some text... some text... some text... some text... some text... some text... some text... some text... some text... some text... some text... some text... some text... some text... '
            .'some text... some text... some text... some text... some text... some text... some text... some text... some text... some text... some text... some text... some text... some text... some text... some text... some text... '
            .'some text... some text... some text... some text... some text... some text... some text... some text... some text... some text... some text... some text... some text... some text... some text... some text... some text... '
            .'some text... some text... some text... some text... some text... some text... some text... some text... some text... some text... some text... some text... some text... some text... some text... some text... some text... '
            .'some text... some text... some text... some text... some text... some text... some text... some text... some text... some text... some text... some text... some text... some text... some text... some text... some text... '
            .'some text... some text... some text... some text... some text... some text... some text... some text... some text... some text... some text... some text... some text... some text... some text... some text... some text... '
            .'some text... some text... some text... some text... some text... some text... some text... some text... some text... some text... some text... some text... some text... some text... some text... some text... some text... ',
    ]);

    $linksCount = rand(1, 2);
    for ($j = 0; $j < $linksCount; $j++)
    {
        $projectLinksTable->insert([
            'name' => 'Link ' . $j + 1,
            'link' => '#',
            'project_id' => $i,
        ]);
    }
}