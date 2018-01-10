<?php

namespace controllers;

use nadir2\core\AbstractCliCtrl;

/**
 * This is command line interface controller.
 * @author Leonid Selikhov
 */
class Cli extends AbstractCliCtrl
{
    public function actionTest(array $args): void
    {
        if (!empty($args)) {
            $this->printInfo('The test cli action was called with args: '
                .implode(', ', $args).'.');
        } else {
            $this->printError(new \Exception('The test cli action was called without args.'));
        }
    }
}
