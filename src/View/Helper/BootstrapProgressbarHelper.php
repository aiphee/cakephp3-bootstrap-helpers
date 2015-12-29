<?php

	/**
	 * Bootstrap Progressbar Helper
	 *
	 *
	 * PHP 5
	 *
	 *  Licensed under the Apache License, Version 2.0 (the "License");
	 *  you may not use this file except in compliance with the License.
	 *  You may obtain a copy of the License at
	 *
	 *      http://www.apache.org/licenses/LICENSE-2.0
	 *
	 *
	 * @copyright Copyright (c) Jiří Forst
	 * @link      http://mikael-capelle.fr
	 * @package   app.View.Helper
	 * @since     Apache v2
	 * @license   http://www.apache.org/licenses/LICENSE-2.0
	 */

	namespace Bootstrap\View\Helper;
	use Cake\View\Helper\HtmlHelper;

	class BootstrapProgressbarHelper extends HtmlHelper {
		use BootstrapTrait;

		public function progressbar(array $options) {
			$max_value     = $this->_extractOption('max_value', $options, 100);
			$min_value     = $this->_extractOption('min_value', $options, 0);
			$value         = $this->_extractOption('value', $options, 0);
			$display_value = $this->_extractOption('display_value', $options, false);
			$text          = $display_value ? $value : "<span class='sr-only'>$value</span>";
			$percent_width = 100 / $max_value * $value;

			return <<<HTML
			<div class="progress">
			  <div
			  	class="progress-bar"
			  	role="progressbar"
			  	aria-valuenow="$value"
			  	aria-valuemin="$min_value"
			  	aria-valuemax="$max_value"
			  	style="width: $percent_width%;"
			  >
				$text
			  </div>
			</div>
HTML;
		}
	}

?>
