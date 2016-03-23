<?php

/*
 * This file is part of the Brickrouge package.
 *
 * (c) Olivier Laviale <olivier.laviale@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Brickrouge\Binding\ICanBoogieValidate;

$hooks = Hooks::class . '::';

return [

	\Brickrouge\Form::class . '::lazy_get_validator' => $hooks . 'get_validator'

];
