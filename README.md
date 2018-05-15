# This plugin was an experiment! It is now archived.

I advise you take a look at [Upper](https://github.com/ostark/upper) for Craft 3 by the wonderful [Oliver Stark](https://github.com/ostark).

---

# Falcon plugin for Craft CMS

Make Craft fly. Well, stick a reverse proxy in front of it then auto-magically invalidate the right caches.

## Installation

To install Falcon, follow these steps:

1. Download & unzip the file and place the `falcon` directory into your `craft/plugins` directory
2.  -OR- do a `git clone https://github.com/joshangell/falcon.git` directly into your `craft/plugins` folder.  You can then update it with `git pull`
3.  -OR- install with Composer via `composer require joshangell/falcon`
4. Install plugin in the Craft Control Panel under Settings > Plugins
5. The plugin folder should be named `falcon` for Craft to see it.  GitHub recently started appending `-master` (the branch name) to the name of the folder for zip file downloads.
6. Copy the code below into `craft/app/etc/templating/BaseTemplate.php`, inserting it after `if ($cacheService) { ... }` in the `_includeElementInTemplateCaches` method: 

```php
$falcon = craft()->getComponent('falcon_templates', false);
if ($falcon) {
    $falcon->includeElement($elementId);
}

```

Yes that was a core hack, which is always necessary on Craft 2.

Falcon works on Craft 2.4.x and Craft 2.5.x.

## Falcon Overview

Currently very un-configurable.

The Varnish URL is set to `http://0.0.0.0:8080/`, the headers used are `xkey` specific, silly things are happening like Matrix blocks are getting their IDs sent out, there are no Tasks and custom keys aren’t purged.
 
But hey, this is basically still classed as an experiment.

## Configuring Falcon

You need to do this in your layout:

```twig
{% falcon %}

<!DOCTYPE html>
<html>
    <head>...</head>
    <body>
        ...
    </body>
</html>
{% endfalcon %}
```

Then elsewhere:
```twig
{% extends "_layout" %}

{% falcon_addkey 'section:news' %}

{% block content %}
...
{% endblock %}
```

## Using Falcon

-Insert text here-

## Falcon Roadmap

These things need to happen before it can be considered ready for use:

* Listen to specific entry on save, if new, send `section:handle` purge requests or whatever we do when doing the extra tagging during render.
* Probably expand that whole thing to be configurable so that people can do whatever they like.
* Make the xkey header bit configurable, as well as the actual purge tooling so that we can swap between fastly and BYO varnish.
* Make cache interface configurable incl URL and type of interface.
* Send PURGEs as Task so they can be queued up.
* Check a configurable list of dis-allowed element types to ignore from auto element ID collection, like Matrix/Neo/SuperTable blocks.
* Make a Craft 3 version without a core hack. Brandon said something about swapping out core components once that makes me think this is possible. 


Brought to you by [Josh Angell](https://angell.io)
