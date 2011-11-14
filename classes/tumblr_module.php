<?

	define('PATH_MOD_TUMBLR', realpath(dirname(__FILE__) . '/../'));

	class Tumblr_Module extends Core_ModuleBase {
		protected function createModuleInfo() {
			return new Core_ModuleInfo(
				"Tumblr",
				"Provides basic integration with Tumblr for your store.",
				"Limewheel Creative Inc."
			);
		}
	}