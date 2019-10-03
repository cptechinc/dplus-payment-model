<?php
	namespace Dpluso\Payments\Model;

	/**
	 * Class for Throwing Errors if class or static function needs it
	 */
	class ThrowError {
		/**
		 * Throws an error to be logged
		 * @param  string $class Class Name that Threw Error
		 * @param  string $error Description of Error
		 * @param  array  $trace Debug Backtrace
		 * @param  int    $level What PHP Error Level
		 * Error constants can be found at
		 * http://php.net/manual/en/errorfunc.constants.php
		 */
		public function error($class, $error, $trace, $level = E_USER_ERROR) {
			$caller = next($trace);
			$error = (strpos($error, "DPLUS-MODEL [$class]: ") !== 0 ? "DPLUS-MODEL [$class]: " . $error : $error);
			$error .= PHP_EOL;
			$error .= PHP_EOL;

			if (isset($caller['file'])) {
				$error .= $caller['function'] . " called from " . $caller['file'] . " on line " . $caller['line'];
			} else {
				$error .= "Property may be trying to be loaded from database";
			}
			trigger_error($error, $level);
			return;
		}
	}

	/**
	 * Functions that throw, show, or log errors
	 */
	trait ThrowErrorTrait {
		/**
		 * Throws an error to be logged
		 * @param  string $error Description of Error
		 * @param  int    $level What PHP Error Level
		 * Error constants can be found at
		 * http://php.net/manual/en/errorfunc.constants.php
		 */
		protected function error($error, $level = E_USER_ERROR) {
			$trace = debug_backtrace();
			$caller = next($trace);
			$class = get_class($this);
			$error = (strpos($error, "DPLUS-MODEL [$class]: ") !== 0 ? "DPLUS-MODEL [$class]: " . $error : $error);
			$error .= PHP_EOL;
			$error .= PHP_EOL;

			if (isset($caller['file'])) {
				$error .= $caller['function'] . " called from " . $caller['file'] . " on line " . $caller['line'];
			} else {
				$error .= "Property may be trying to be loaded from database";
			}
			trigger_error($error, $level);
			return;
		}
	}
