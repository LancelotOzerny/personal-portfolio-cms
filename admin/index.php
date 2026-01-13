<?php
\Core\Modules\Main\Template::getInstance()->setTemplate('Admin');
\Core\Modules\Main\Template::getInstance()->showHeader();

(new \Dev\Components\ControlList\ControlList())->show();

\Core\Modules\Main\Template::getInstance()->showFooter();
?>