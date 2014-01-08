<?php
$dummy_input = [
	'foo' => 'me@foo.tld',
	'bar' => 'invalidemail',
	'baz' => 'fictional.too.long@email.address.tld',
];

$vlad = new \ay\vlad\Vlad();

$test = $vlad->test([
	[
		['foo', 'bar', 'baz'],
		[
			['fail' => 'break'],
			// Define Validator failure scenario:
			// * 'soft' record an error and progress to the next Validator.
			// * 'hard' (default) record an error and exclude the selector from the rest of the Test.
			// * 'break' record an error and interrupt the Test.
			'required',
			'not_empty',
			['fail' => 'hard'], // Reset default Validator failure scenario.
			'email',
			['length', 'max' => 10] // Length Validator with constructor options.
		]
	]
]);

$result = $test->assess($dummy_input);
?>
<pre><code><?php var_dump($result->getFailed());?></code></pre>