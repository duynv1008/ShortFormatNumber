<?php

namespace Dnv\FormatNumber;

class FormatNumber {
	/**
	 * @param $n
	 * @return string
	 * Use to convert large positive numbers in to short form like 1K+, 100K+, 199K+, 1M+, 10M+, 1B+ etc
	 */
	function format($n, $code) {
		// if ($n > 0 && $n < 1000) {
		// 	// 1 - 999
		// 	$n_format = floor($n);
		// 	$suffix = '';
		// } else if ($n >= 1000 && $n < 1000000) {
		// 	// 1k-999k
		// 	$n_format = floor($n / 1000);
		// 	$suffix = 'K+';
		// } else if ($n >= 1000000 && $n < 1000000000) {
		// 	// 1m-999m
		// 	$n_format = floor($n / 1000000);
		// 	$suffix = 'M+';
		// } else if ($n >= 1000000000 && $n < 1000000000000) {
		// 	// 1b-999b
		// 	$n_format = floor($n / 1000000000);
		// 	$suffix = 'B+';
		// } else if ($n >= 1000000000000) {
		// 	// 1t+
		// 	$n_format = floor($n / 1000000000000);
		// 	$suffix = 'T+';
		// } else {
		// 	$n_format = 0;
		// 	$suffix = '';
		// }
		switch ($code) {
		case 'K':
			// 1k-999k
			$n_format = floor($n / 1000);
			$suffix = 'K';
			break;
		case 'M':
			// 1m-999m
			$n_format = floor($n / 1000000);
			$suffix = 'M';
			break;
		case 'B':
			// 1b-999b
			$n_format = floor($n / 1000000000);
			$suffix = 'B';
			break;
		case 'T':
			// 1t+
			$n_format = floor($n / 1000000000000);
			$suffix = 'T';
			break;

		default:
			# code...
			break;
		}
		return $n_format;
	}
}