<?php

namespace extensions\core;

use nadir2\core\Request;
use nadir2\core\AppHelper;

/**
 * This is the auth general class for custom extension.
 * @author Leonid Selikhov
 */
class Auth extends AbstractAuth
{
    /** @var \nadir2\core\Request The request object. */
    protected $request = null;

    /** @var array The route config. */
    protected $routeConfig = null;

    /** @var mixed The occured error instance. */
    protected $error       = null;

    /**
     * The constructor receives the request object to read the route configuration.
     * @param \nadir2\core\Request $request The request object.
     */
    public function __construct(Request $request)
    {
        $this->request     = $request;
        $this->routeConfig = AppHelper::getInstance()->getRouteConfig();
    }

    /**
     * It checks cookies according custom algorithm.
     * @param array $cookies The associated array of cookies.
     * @return void
     */
    protected function checkCookies(array $cookies): void
    {
        // Put your code here...
    }

    /**
     * The main executable method of this class.
     * @throws \Exception It's throwen if 'auth' option wasn't defined.
     */
    public function run(): void
    {
        if (!isset($this->routeConfig['auth'])) {
            throw new \Exception("Undefined option 'auth' for the current route.");
        }
        $cookies = $this->request->getAllCookies();
        $this->checkCookies(!is_null($cookies) ? $cookies : []);
    }

    /**
     * {@inheritdoc}
     */
    public function isValid(): bool
    {
        return is_null($this->error);
    }

    /**
     * {@inheritdoc}
     */
    public function onFail()
    {
        // Put your code here...
    }
}
