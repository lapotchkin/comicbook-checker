<?php

namespace controllers;

use nadir2\core\AbstractWebCtrl;
use extensions\core\SystemCtrlInterface;
use nadir2\core\Headers;

/**
 * This is system controller.
 * @author Leonid Selikhov
 */
class System extends AbstractWebCtrl implements SystemCtrlInterface
{

    /**
     * {@inheritdoc}
     */
    public function actionPage401(array $errors): void
    {
        Headers::getInstance()->addByHttpCode(401)->run();
        // Put your code here...
        $this->render();
    }

    /**
     * {@inheritdoc}
     */
    public function actionPage403(array $errors): void
    {
        Headers::getInstance()->addByHttpCode(403)->run();
        // Put your code here...
        $this->render();
    }

    /**
     * {@inheritdoc}
     */
    public function actionPage404(array $errors): void
    {
        Headers::getInstance()->addByHttpCode(404)->run();
        // Put your code here...
        $this->render();
    }
}
