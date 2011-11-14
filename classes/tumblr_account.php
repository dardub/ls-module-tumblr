<?

	class Tumblr_Account {
		public $options;
	
		public function __construct($options = array()) {
			$this->options = array_merge(array(
				'username' => null
			), $options);
		}
		
		public static function create($options = array()) {
			return new Tumblr_Account($options);
		}
	
		public function get_posts($options = array()) {
			extract(array_merge(array(
				'username' => $this->options['username']
			), $options));
			
			require_once(PATH_MOD_TUMBLR . '/thirdpart/phpTumblr/clearbricks/_common.php');
			require_once(PATH_MOD_TUMBLR . '/thirdpart/phpTumblr/class.read.tumblr.php');
			
			try {
				$tumblr = new readTumblr($username);
				
				$tumblr->getPosts(0, 'all', 'all');
				
				$tumblr = $tumblr->dumpArray();
			}
			catch(Exception $ex) {
				$tumblr = array('posts' => array());
			}
			
			return $tumblr['posts'];
		}
	}