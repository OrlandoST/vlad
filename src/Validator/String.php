<?php
namespace Gajus\Vlad\Validator;

/**
 * @link https://github.com/gajus/vlad for the canonical source repository
 * @license https://github.com/gajus/vlad/blob/master/LICENSE BSD 3-Clause
 */
class String extends \gajus\vlad\Validator {
	static protected
		$default_options = [
			'strict' => false
		],
		$messages = [
			'not_string' => [
				'{vlad.subject.name} is not a string.',
				'The input is not a string.'
			]
		];

	public function __construct (array $options = []) {
		parent::__construct($options);

		$options = $this->getOptions();

		if (!is_bool($options['strict'])) {
			throw new \Gajus\Vlad\Exception\InvalidArgumentException('Boolean property assigned non-boolean value.');
		}
	}
	
	protected function validate (\gajus\vlad\Subject $subject) {
		$options = $this->getOptions();

		$value = $subject->getValue();

		if (!$options['strict']) {
			if (is_numeric($value)) {
				$value = (string) $value;
			}
		}

		if (!is_string($value)) {
			return 'not_string';
		}
	}
}