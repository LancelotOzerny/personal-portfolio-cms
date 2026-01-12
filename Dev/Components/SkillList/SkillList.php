<?php

namespace Dev\Components\SkillList;

use Core\Modules\Main\Component;
use Dev\Tables\SkillAreasTable;
use Dev\Tables\SkillsTable;

class SkillList extends Component
{
    protected function setComponentParams(array $params): void
    {
        $this->params = [];
        $this->params['areas'] = [];

        $arrSkills = (new SkillsTable())->getAll();
        $arrSkillAreas = (new SkillAreasTable())->getAll();

        $this->params['areas_count'] = count($arrSkillAreas);
        $this->params['skills_count'] = count($arrSkills);

        foreach ($arrSkillAreas as $skillArea)
        {
            $this->params['areas'][$skillArea['id']] = [
              'name' => $skillArea['name'],
              'description' => $skillArea['description'],
            ];
        }

        $this->params['areas'][] = [
            'name' => 'Other',
            'description' => 'В числе личных компетенций — умение слушать, аргументировать и договариваться. ' .
                'Комфортно чувствую себя в командной среде, поддерживаю конструктивный диалог с участниками проекта. ' .
                'Готов осваивать новые инструменты и методики для повышения эффективности работы.',
            'skills' => []
        ];

        $areasCount = count($this->params['areas']);
        foreach ($arrSkills as $skill)
        {
            $this->params['areas'][$skill['area_id'] ?? $areasCount]['skills'][] = $skill;
        }
    }
}