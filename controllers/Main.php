<?php

namespace controllers;


use nadir2\core\AbstractWebCtrl;

/**
 * Class Main
 * @package controllers
 */
class Main extends AbstractWebCtrl {
    public function actionDefault(): void {
        $this->render();
    }
}