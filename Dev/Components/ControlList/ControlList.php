<?php

namespace Dev\Components\ControlList;

use Core\Modules\Main\Application;
use Core\Modules\Main\Component;

class ControlList extends Component
{
    protected function setComponentParams(array $params): void
    {
        $dir = Application::getInstance()->rootPath . Application::getInstance()->getCurrentDir();
        $dir = str_replace('\\', '/', $dir);

        $this->params['cards'] = [];

        $items = scandir($dir);
        foreach ($items as $item)
        {
            if ($item == '.' || $item == '..') continue;

            if (is_dir($dir . $item) && file_exists($dir . $item . '/page_params.php'))
            {
                $params = include($dir . $item . '/page_params.php');
                $cardInfo = $params['menu'];

                $this->params['cards'][] = [
                    'title' => $cardInfo['title'] ?? $item,
                    'desc' => $cardInfo['desc'] ?? '',
                    'link' => Application::getInstance()->getCurrentDir() . $item . '/',
                ];
            }
        }

        $this->params['count'] = count($this->params['cards']);
    }
}