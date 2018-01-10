<?php

namespace models;

use extensions\core\AbstractModel;

/**
 * This is demo version of model class.
 * @author Leonid Selikhov
 */
class Test extends AbstractModel
{
    public function readDefault()
    {
        return [
            'foo' => 'bar',
            'bar' => [42, 'baz'],
        ];
    }
}
