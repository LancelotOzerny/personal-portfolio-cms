<?php

namespace Dev\Components\CertificatesList;

use Core\Modules\Main\Component;
use Dev\Tables\CertificatesTable;

class CertificatesList extends Component
{
    public function setComponentParams(array $params): void
    {
        if(isset($params['count']))
        {
            $this->params['count'] = intval($params['count']);
        }

        $certificates = (new CertificatesTable())->getAll();
        $this->params['data'] = [];
        for ($i = 0; $i < count($certificates); $i++)
        {
            if (isset($this->params['count']) && $this->params['count'] <= $i)
            {
                break;
            }

            $this->params['data'][] = $certificates[$i];
        }
    }
}