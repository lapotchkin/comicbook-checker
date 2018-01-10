<?php

namespace controllers;

use nadir2\core\AbstractWebCtrl;

/**
 * This is demo test controller class.
 * @author Leonid Selikhov
 */
class Test extends AbstractWebCtrl
{
    public function actionDefault(): void
    {
        $this->getView()->addSnippet('topbar');
        $this->getView()->getSnippet('topbar')
            ->isUserOnline    = false;
        $data                 = (new \models\Test())->readDefault();
        $this->getView()->foo = $data['foo'];
        $this->getView()->bar = $data['bar'];
        $this->render();
    }
}
