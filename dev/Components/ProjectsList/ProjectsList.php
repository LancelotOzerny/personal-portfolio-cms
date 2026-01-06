<?php

namespace Components\ProjectsList;

use Modules\Main\Component;
use Tables\ProjectsTable;

class ProjectsList extends Component
{
    public function setComponentParams(array $params): void
    {
        $this->params['data'] = (new ProjectsTable())->getWithLinks();
    }
}