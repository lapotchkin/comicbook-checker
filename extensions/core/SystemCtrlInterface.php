<?php

namespace extensions\core;

/**
 * The interface of system controller.
 * @author Leonid Selikhov
 */
interface SystemCtrlInterface
{

    /**
     * This action contains functionality for 401 error page generating.
     * @param array $errors The array of internal errors.
     */
    public function actionPage401(array $errors): void;

    /**
     * This action contains functionality for 403 error page generating.
     * @param array $errors The array of internal errors.
     */
    public function actionPage403(array $errors): void;

    /**
     * This action contains functionality for 404 error page generating.
     * @param array $errors The array of internal errors.
     */
    public function actionPage404(array $errors): void;
}
