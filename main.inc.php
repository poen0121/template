<?php
if (!class_exists('hpl_template')) {
	include (strtr(dirname(__FILE__), '\\', '/') . '/system/path/main.inc.php');
	/**
	 * @about - template control.
	 */
	class hpl_template {
		private static $process = array ();
		private static $path;
		/** View content.
		 * @access - public function
		 * @param - string $path (template file path)
		 * @param - array $data (template param data array) : Default empty
		 * @param - boolean $process (return content string mode) : Default false
		 * @return - boolean|string
		 * @usage - hpl_template::view($path,$data,$process);
		 */
		public static function view($path = null, $data = array (), $process = false) {
			if (!hpl_func_arg :: delimit2error() && !hpl_func_arg :: string2error(0) && !hpl_func_arg :: array2error(1) && !hpl_func_arg :: bool2error(2)) {
				if (isset ($path { 0 })) {
					clearstatcache();
					$path = hpl_path :: norm($path);
					if (!hpl_path :: is_absolute($path) && is_file($path) && is_readable($path) && preg_match('/^(.)*\.php$/i', $path)) {
						if (!ob_start()) {
							hpl_error :: cast(__CLASS__ . '::' . __FUNCTION__ . '(): Open output buffer failed to start', E_USER_ERROR, 1);
						}
						self :: $process[] = $process;
						self :: $path = $path;
						if (count($data) > 0) {
							extract($data);
						}
						//note that the error is all access
						include (self :: $path);
						$process = end(self :: $process);
						unset (self :: $process[count(self :: $process) - 1]);
						$output = ob_get_contents();
						if ($output === false) {
							hpl_error :: cast(__CLASS__ . '::' . __FUNCTION__ . '(): Invalid buffer ended', E_USER_WARNING, 1);
							return false;
						}
						ob_end_clean();
						if ($process) {
							return $output;
						} else {
							echo $output;
							return true;
						}
					} else {
						hpl_error :: cast(__CLASS__ . '::' . __FUNCTION__ . '(): Unable to load template file ' . $path, E_USER_NOTICE, 1);
					}
				} else {
					hpl_error :: cast(__CLASS__ . '::' . __FUNCTION__ . '(): Empty path supplied as input', E_USER_WARNING, 1);
				}
			}
			return false;
		}
	}
}
?>