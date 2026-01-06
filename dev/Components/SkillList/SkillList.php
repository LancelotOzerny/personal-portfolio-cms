<?php

namespace Components\SkillList;

use Modules\Main\Component;
use Tables\SkillAreasTable;
use Tables\SkillsTable;

class SkillList extends Component
{
    protected function setComponentParams(array $params): void
    {
        $this->params = [];
        $arrSkills = (new SkillsTable())->getAll();
        $arrSkillAreas = (new SkillAreasTable())->getAll();

        $this->params['areas'] = [];

        foreach ($arrSkillAreas as $skillArea)
        {
            $this->params['areas'][$skillArea['id']] = [
              'name' => $skillArea['name'],
              'description' => $skillArea['description'],
            ];
        }

        foreach ($arrSkills as $skill)
        {
            $this->params['areas'][$skill['area_id']]['skills'][] = $skill;
        }
    }
}