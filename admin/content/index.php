<?php
use Core\Modules\Main\Template;

Template::getInstance()->setParam('page-title', 'Управление пользовательским контентом');

Template::getInstance()->setTemplate('Admin');
Template::getInstance()->showHeader();


(new \Dev\Components\ControlList\ControlList())->show();

Template::getInstance()->showFooter();
?>