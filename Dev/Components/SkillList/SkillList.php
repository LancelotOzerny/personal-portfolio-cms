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
        $arrSkills = (new SkillsTable())->getAll();
        $arrSkillAreas = (new SkillAreasTable())->getAll();

        $this->params['areas'] = [];

        $areaOther = [
            'name' => 'Other',
            'description' => 'В числе личных компетенций — умение слушать, аргументировать и договариваться. ' .
                'Комфортно чувствую себя в командной среде, поддерживаю конструктивный диалог с участниками проекта. ' .
                'Готов осваивать новые инструменты и методики для повышения эффективности работы.',
            'skills' => []
        ];

        foreach ($arrSkillAreas as $skillArea)
        {
            $this->params['areas'][$skillArea['id']] = [
              'name' => $skillArea['name'],
              'description' => $skillArea['description'],
            ];
        }

        $this->params['areas'][] = $areaOther;

        foreach ($arrSkills as $skill)
        {
            $this->params['areas'][$skill['area_id']]['skills'][] = $skill;
        }
    }
}