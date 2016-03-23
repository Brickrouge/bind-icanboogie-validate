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

use Brickrouge\Form;
use Brickrouge\Validate\FormValidator;

class Hooks
{
	/**
	 * Returns a form validator.
	 *
	 * @param Form $form
	 *
	 * @return FormValidator
	 */
	static public function get_validator(Form $form)
	{
		return new FormValidator($form, new ValidateValues);
	}
}
