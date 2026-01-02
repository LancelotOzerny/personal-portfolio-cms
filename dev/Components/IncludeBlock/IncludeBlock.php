<?php

namespace Components\IncludeBlock;

use Modules\Main\Component;

class IncludeBlock extends Component
{
    public function setComponentParams(array $params): void
    {
        if(isset($params['src']))
        {
            $includePath = \Modules\Main\Application::getInstance()->rootPath . $params['src'];

            if (file_exists($includePath))
            {
                $text = file_get_contents($includePath);
                $this->params['text'] = $text;
            }
            else
            {
                $this->params['text'] = 'Include "' . $includePath . '" not found.';
            }
        }
        else
        {
            $this->params['text'] = 'Src parameter not found.';
        }
    }
}