# Page Template Example

The WordPress Plugin Boilerplate serves as a foundation and aims to provide a clear and consistent guide for building your WordPress plugins.

## Features

* The Plugin Boilerplate is fully-based on the WordPress [Plugin API](http://codex.wordpress.org/Plugin_API).
* Uses [PHPDoc](http://en.wikipedia.org/wiki/PHPDoc) conventions to document the code.
* Example values are given, so you can see what needs to be changed.
* Uses a strict file organization scheme to make sure the assets are easily maintainable.
* Note that this boilerplate includes a `.pot` as a starting translation file.
* Notes on managing assets prior to deployment are covered below
* Tools used for translation are below

## Contents

The WordPress Plugin Boilerplate includes the following files:

* This README, a ChangeLog, and a `gitignore` file.
* A subdirectory called `plugin-name`. This represents the core plugin file.

## Installation

1. Copy the `plugin-name` directory into your `wp-content/plugins` directory
2. Navigate to the *Plugins* dashboard page
3. Locate the menu item that reads *TODO*
4. Click on *Activate*

This will activate the WordPress Plugin Boilerplate. Because the Boilerplate has no real functionality, nothing will be added to WordPress; however, this demonstrates exactly how your plugin should behave while you're working with it.

## Recommended Tools

### Localization Tools

The WordPress Plugin Boilerplate uses a variable to store the text domain used when internationalizing strings throughout the Boilerplate. To take advantage of this method,
there are tools that are recommended for providing correct, translatable files:

* [Poedit](http://www.poedit.net/)
* [makepot](http://i18n.svn.wordpress.org/tools/trunk/)
* [i18n](https://github.com/grappler/i18n)

Any of the above tools should provide you with the proper tooling to localize the plugin.

### GitHub Updater

The WordPress Plugin Boilerplate includes native support for the [GitHub Updater](https://github.com/afragen/github-updater) which allows you to provide updates to your WordPress plugin from GitHub.

This uses a new tag in the plugin header:

>  `* GitHub Plugin URI: https://github.com/<owner>/<repo>`

Here's how to take advantage of this feature:

1. Install the [GitHub Updater](https://github.com/afragen/github-updater)
2. Replace `<owner>` with your username and `<repo>` with the repository of your plugin
3. Push commits to the master branch
4. Enjoy your plugin being updated in the WordPress dashboard

The current version of the GitHub Updater supports tags/branches - whichever has the highest number. It also supports different branches using the `GitHub Branch:` header. All that info is in [the project](https://github.com/afragen/github-updater)

In future versions, there will be steps to specify branches or tags rather than the `master` branch.

## License

The WordPress Plugin Boilerplate is licensed under the GPL v2 or later.

> This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License, version 2, as
published by the Free Software Foundation.

> This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

> You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA

## Important Notes

### Licensing

The WordPress Plugin Boilerplate is licensed under the GPL v2 or later; however, if you opt to use third-party code that is not compatible with v2, then you may need to switch to using code that is GPL v3 compatible.

For reference, [here's a discussion](http://make.wordpress.org/themes/2013/03/04/licensing-note-apache-and-gpl/) that covers the Apache 2.0 License used by [Bootstrap](http://twitter.github.io/bootstrap/).

## Assets

The assets directory provides two files that are used to represent plugin header images.

When committing your work to the WordPress Plugin Repository, these files should reside in their own `assets` directory, not in the root of the plugin. The initial repository will contain three directories:

1. `branches`
2. `tags`
3. `trunk`

You'll need to add an `assets` directory into the root of the repository. So the final directory structure should include *four* directories:

1. `assets`
2. `branches`
3. `tags`
4. `trunk`

Next, copy the contents of the `assets` directory that are bundled with the Boilerplate into the root of the repository. This is how the WordPress Plugin Repository will retrievie the plugin header image.

Of course, you'll want to customize the header images from the place holders that are provided with the Boilerplate.

For more, in-depth information about this, read [this post](http://make.wordpress.org/plugins/2012/09/13/last-december-we-added-header-images-to-the/) by [Otto](https://twitter.com/Otto42).

Plugin screenshots can be saved to one of two locations:

1. The old way is to keep them in the root of the plugin directory. This will increase the size of the download of the plugin, but make the images accessible for those who install it. This is deprecated in the WordPress Plugin Boilerplate
2. With the alternative way, you can save the screenshots in the `assets` directory, as well. The repository will look here for the screenshot files as well; however, they will not be included in the plugin download thus reducing the size of the plugin. As of its latest version, the WordPress Plugin Boilerplate now follows this convention.
-----

# Page Template Example

An example WordPress plugin used to show how to include templates with your plugins and programmatically add them to the active theme.

You can read more about this plugin and how it works in [this blog post](http://tommcfarlin.com/wordpress-page…late-in-plugin/).

## How It Works

The plugin works like this:

1. Upon activation, it checks to see if a template with the same filename exists within the active theme's root directory.
2. If so, the plugin will not do anything; however, if no template file exists, then it will create the template in the root of the active theme.
3. Upon deactivation, the template will be removed from the active theme directory.

## Installation

### Using The WordPress Dashboard

1. Navigate to the 'Add New' Plugin Dashboard
2. Select `page-template-example.zip` from your computer
3. Upload
4. Activate the plugin on the WordPress Plugin Dashboard

### Using FTP

1. Extract `page-template-dashboard.zip` to your computer
2. Upload the `page-template-dashboard` directory to your `wp-content/plugins` directory
3. Activate the plugin on the WordPress Plugins Dashboard

## Known Issues

Because this plugin is used strictly for example purposes, there are a number of things that are not properly handled:

* If the user changes a theme, the plugin does not move the template to the new theme's directory.
* There's practically no error handling for the file operations.
* If a template with the same file name already exists, there's no notification or error handling in this case so the user has no idea that the bundled template was not activsated.
* …I'm sure there are more.

This particular plugin is tagged as **0.1** and is open to any and all pull requests to help make this better, so feel free to contribute to resolve any of the above issues or any that you experience.

## License

The WordPress Plugin Boilerplate is licensed under the GPL v2 or later.

> This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License, version 2, as
published by the Free Software Foundation.

> This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

> You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA