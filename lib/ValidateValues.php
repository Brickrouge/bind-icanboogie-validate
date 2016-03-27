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

use ICanBoogie\ErrorCollection;
use ICanBoogie\Validate\Reader\ArrayAdapter;
use ICanBoogie\Validate\Validation;
use ICanBoogie\Validate\ValidatorProvider;

/**
 * Validates values given a set of rules.
 */
class ValidateValues
{
	private $validator_provider;

	/**
	 * @param ValidatorProvider|callable|null $validator_provider
	 */
	public function __construct(callable $validator_provider = null)
	{
		$this->validator_provider = $validator_provider;
	}

	/**
	 * @param array $values Values to validate.
	 * @param array $rules Validation rules.
	 * @param ErrorCollection $errors
	 */
	public function __invoke(array $values, array $rules, ErrorCollection $errors)
	{
		$validation = $this->build_validation($rules);

		foreach ($validation->validate(new ArrayAdapter($values)) as $attribute => $messages)
		{
			foreach ($messages as $message)
			{
				$errors->add($attribute, $message->format, $message->args);
			}
		}
	}

	/**
	 * @param array $rules Validation rules.
	 *
	 * @return Validation
	 */
	protected function build_validation(array $rules)
	{
		return new Validation($rules, $this->validator_provider);
	}
}
