<?php

namespace Dev\Components\Navigation;

use Core\Modules\Main\Application;
use Core\Modules\Main\Component;

class Navigation extends Component
{
    protected function setComponentParams(array $params): void
    {
        $this->params['dir'] = $params['dir'] ?? '/';
        $this->params['items'] = $this->getAllItems(Application::getInstance()->rootPath . $this->params['dir']);
        array_unshift($this->params['items'], [
            'title' => 'Главная',
            'desc' => '',
            'link' => $this->params['dir'],
        ]);

        $this->params['html'] = $this->getSidebarList($this->params['items']);
    }

    private function getAllItems($dir): array
    {
        $result = [];

        $items = scandir($dir);
        foreach ($items as $item)
        {
            if ($item == '.' || $item == '..')
            {
                continue;
            }

            if (is_dir($dirPath = $dir . $item) && file_exists($filePath = $dirPath . '/page_params.php'))
            {
                $itemInfo = $this->getItemInfo($filePath);
                $subItems = $this->getAllItems($dir . $item . '/');
                if ($subItems)
                {
                    $itemInfo['items'] = $this->getAllItems($dir . $item . '/');
                }

                $result[] = $itemInfo;
            }
        }

        return $result;
    }

    private function getItemInfo($itemPath) : array
    {
        $data = include $itemPath;
        $result = $data['menu'] ?? [];

        $result['title'] = $result['title'] ?? basename(dirname($itemPath));
        $result['desc'] = $result['desc'] ?? '';
        $result['link'] = str_replace(Application::getInstance()->rootPath, '', dirname($itemPath));
        $result['link'] .= $result['link'][-1] === '/' ? '' : '/';

        return $result;
    }

    private function getSidebarList($items) : string
    {
        $result = '<div class="sidebar-list">';

        foreach ($items as $item)
        {
            if (isset($item['items']) && count($item['items']))
            {
                $result .= '<div class="sidebar-list__expand">';
                $result .= $this->getLink($item);
                $result .= '<div class="sidebar-list__sublist">';
                $result .= $this->getSidebarList($item['items']);
                $result .= '</div>';
                $result .= '</div>';
                continue;
            }

            $result .= $this->getLink($item);
        }

        $result .= '</div>';
        return $result;
    }

    private function getLink($item)
    {
        $active = '';

        if (Application::getInstance()->getCurrentDir() == $item['link'])
        {
            $active = 'active';
        }

        return "<a class='sidebar-list__item $active' href='{$item['link']}'>{$item['title']}</a>";
    }
}