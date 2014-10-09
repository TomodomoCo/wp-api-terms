# WP-API Term/Taxonomy Support

This is a simple plugin that lets you add terms when you POST new content to the WP REST API.

Here's an example of a JSON post object (posted to `/wp-json/posts`) that will create a new post with some tags:

```json
{
	"title": "Hello there",
	"content_raw": "My awesome content",
	"x-terms": [{
		"post_tag": {
			"terms": [
				"my_tag",
				"my_other_tag"
			]
		}
	}]
}
```

and a custom taxonomy:

```json
{
	"title": "Hello there",
	"content_raw": "My awesome content",
	"x-terms": [{
		"my_taxonomy": {
			"terms": [
				"my_term"
			]
		}
	}]
}
```

and both at the same time:

```json
{
	"title": "Hello there",
	"content_raw": "My awesome content",
	"x-terms": [{
		"post_tag": {
			"terms": [
				"my_tag",
				"my_other_tag"
			]
		},
		"my_taxonomy": {
			"terms": [
				"my_term"
			]
		}
	}]
}
```

**By default, this will overwrite existing terms on a post (within the taxonomy you're working with).** To only append content, use the "append" setting:

```json
{
	"title": "Hello there",
	"content_raw": "My awesome content",
	"x-terms": [{
		"post_tag": {
			"append": "true",
			"terms": [
				"my_appended_tag"
			]
		}
	}]
}
```

I'm indebted to WordPress.org user [WizADSL](https://profiles.wordpress.org/WizADSL/) who created the original version of this plugin for categories and tags.

## License

[GPLv2](https://www.gnu.org/licenses/gpl-2.0.html) or later. Enjoy!
