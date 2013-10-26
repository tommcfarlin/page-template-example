# Page Template Example

An example WordPress plugin used to show how to include templates with your plugins and programmatically add them to the active theme.

You can read more about this plugin and how it works in [this blog post](http://tommcfarlin.com/wordpress-page-template-in-plugin/).

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

## Known Issues

For information about changes related to the project, be sure to review the [ChangeLog](https://github.com/tommcfarlin/page-template-example/blob/master/ChangeLog.md).

## 1.0.0 (26 October 2013)

The templating mechanism has changed drastically in `1.0.0`. In order to add templates to your theme using this plugin,
you must do the following:

1. Review Lines 91 - 94 in `class-page-templates.php`.
2. Notice that we're defining templates in an associative array - the example templates exist in the `templates directory`.

To implement your own template, you must:

1. Add the template to the `templates directory`
2. Update the associated array to include the key/value pair necessary for updating the page attribute dropdown.

## 0.1.0 (7 March 2013)

Because this plugin is used strictly for example purposes, there are a number of things that are not properly handled:

* If the user changes a theme, the plugin does not move the template to the new theme's directory.
* There's practically no error handling for the file operations.
* If a template with the same file name already exists, there's no notification or error handling in this case so the user has no idea that the bundled template was not activsated.
* …I'm sure there are more.

This particular plugin is tagged as **0.1.0** and is open to any and all pull requests to help make this better, so feel free to contribute to resolve any of the above issues or any that you experience.

## Author Information

Page Template Example originally started and is maintained by [Tom McFarlin](http://twitter.com/tommcfarlin/), but is constantly under development thanks to the contributions from other WordPress developers.