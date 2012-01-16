<?

	class Tumblr_Account {
		public $options;
	
		public function __construct($options = array()) {
			$this->options = array_merge(array(
				'username' => null,
				'num_posts' => 5,
				'post_type' => 'all'
			), $options);
		}
		
		public static function create($options = array()) {
			return new Tumblr_Account($options);
		}
	
		public function get_posts($options = array()) {
			extract(array_merge(array(
				'username' => $this->options['username'],
				'num_posts' => $this->options['num_posts'],
				'post_type' => $this->options['post_type']
			), $options));
			
			require_once(PATH_MOD_TUMBLR . '/thirdpart/phpTumblr/clearbricks/_common.php');
			require_once(PATH_MOD_TUMBLR . '/thirdpart/phpTumblr/class.read.tumblr.php');
			
			try {
				$tumblr = new readTumblr($username);
				
				$tumblr->getPosts(0, $num_posts, $post_type);
				
				$tumblr = $tumblr->dumpArray();
			}
			catch(Exception $ex) {
				$tumblr = array('posts' => array());
			}
			
			return $tumblr['posts'];
		}
	}