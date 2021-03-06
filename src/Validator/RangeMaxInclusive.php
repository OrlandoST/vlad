<?php
namespace Gajus\Vlad\Validator;

/**
 * Validate that a numeric input is at most of the given size (inclusive).
 * 
 * @link https://github.com/gajus/vlad for the canonical source repository
 * @license https://github.com/gajus/vlad/blob/master/LICENSE BSD 3-Clause
 */
class RangeMaxInclusive extends \Gajus\Vlad\Validator {
	static protected
		$default_options = [
			'range' => null
		],
		$message = '{input.name} is not less or equal to {validator.options.range}.';

	public function __construct (array $options = []) {
		parent::__construct($options);

		$options = $this->getOptions();

		if (!isset($options['range'])) {
			throw new \Gajus\Vlad\Exception\InvalidArgumentException('"range" option is required.');
		}

		if (!is_numeric($options['range'])) {
			throw new \Gajus\Vlad\Exception\InvalidArgumentException('Minimum boundry option must be numeric.');
		}
	}
	
	public function assess ($value) {
		$options = $this->getOptions();

		return $value <= $options['range'];
	}
}