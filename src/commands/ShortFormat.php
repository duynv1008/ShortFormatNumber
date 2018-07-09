<?php

namespace Dnv\FormatNumber\commands;

use Illuminate\Console\Command;

class ShortFormat extends Command {
	/**
	 * The name and signature of the console command.
	 *
	 * @var string
	 */
	protected $signature = 'dnv-format:N'; //N - number

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Short format number KMBT';

	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */

	public function handle() {
		do {
			$number = (float) $this->ask('Input number integer: ');
			$this->line("Number format " . $number . ": " . $this->number_format_short($number));
		} while (true);

	}

	/**
	 * @param $n
	 * @return string
	 * Use to convert large positive numbers in to short form like 1K+, 100K+, 199K+, 1M+, 10M+, 1B+ etc
	 */
	function number_format_short($n) {
		if ($n > 0 && $n < 999) {
			// 1 - 99
			$n_format = floor($n);
			$suffix = '';
		} else if ($n >= 1000 && $n < 1000000) {
			// 1k-999k
			$n_format = floor($n / 1000);
			$suffix = config('typeformat.K');
		} else if ($n >= 1000000 && $n < 1000000000) {
			// 1m-999m
			$n_format = floor($n / 1000000);
			$suffix = config('typeformat.M');
		} else if ($n >= 1000000000 && $n < 1000000000000) {
			// 1b-999b
			$n_format = floor($n / 1000000000);
			$suffix = config('typeformat.B');
		} else if ($n >= 1000000000000) {
			// 1t+
			$n_format = floor($n / 1000000000000);
			$suffix = config('typeformat.T');
		} else {
			$n_format = 0;
			$suffix = '';
		}

		return !empty($n_format . $suffix) ? $n_format . $suffix : 0;
	}
}