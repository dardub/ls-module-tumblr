# ls-module-tumblr
Provides basic integration with Tumblr for your store.

## Installation
1. Download [Tumblr](https://github.com/limewheel/ls-module-tumblr/zipball/master).
1. Create a folder named `tumblr` in the `modules` directory.
1. Extract all files into the `modules/tumblr` directory (`modules/tumblr/readme.md` should exist).
1. Done!

## Usage
Add this code to your page (and change the username parameter). There must be more than 2 posts and caching must be enabled - the Tumblr API is unreliable.

```php
	<?
	$tumblr = Tumblr_Account::create(array('username' => 'myusername'));

	$posts = $tumblr->get_posts();
	
 	// fixes an issue with unreliable tumblr api
	$cache = Core_CacheBase::create();
		
	if(count($posts) > 2)
		$cache->set('tumblr_posts', $posts);
	else
		$posts = $cache->get('tumblr_posts');
	
	foreach($posts as $post): 
	?>
		<? if($post['type'] === 'regular'): ?>
		
		<? elseif($post['type'] === 'audio'): ?>
 
		<? elseif($post['type'] === 'photo'): ?>

		<? elseif($post['type'] === 'video'): ?>

		<? elseif($post['type'] === 'link'): ?>

		<? elseif($post['type'] === 'quote'): ?>
		
		<? endif ?>
	<? endforeach ?>
```