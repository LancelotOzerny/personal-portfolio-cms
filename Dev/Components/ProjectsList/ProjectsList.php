<?php

namespace Dev\Components\ProjectsList;

use Core\Modules\Main\Component;
use Dev\Tables\ProjectsTable;

class ProjectsList extends Component
{
    public function setComponentParams(array $params): void
    {
        $this->params['data'] = (new ProjectsTable())->getWithLinks();
    }
}