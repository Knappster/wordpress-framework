# Wordpress Framework
---

This is a simple starter framework to build a custom Wordpress theme/site without having to include the wordpress core into the repository.

Wordpress core is included as a composer package and webpack handles all the asset compilation into a blank theme.


## 1:
To start a new project ensure you have the lastest Composer script installed and Node.js:

```
composer install
npm install
```

## 2:

Copy the .env.example file to a new file called .env. This contains your environment variables. You shouldn't need to edit the usual wp-config.php file.

Webpack path settings are contained in the same .env file. If you need to rename the theme or the front end assets folder you can from here, no need to edit the webpack.config.js file.


## 3:

Set the 'public' folder as your webroot. When you've finished running the Wordpress installer ensure that the 'siteurl' and 'home' URLs are set correctly.

The 'siteurl' option requires the directory of the Wordpress core 'wp-core':

	Site URL: https://wordpress.local/wp-core/
	Home: https://wordpress.local/


## 4:

To login to the Wordpress admin you'll need to add the wp-core directory to the URL:

	https://wordpress.local/wp-core/wp-admin


## Building a new theme/site:

When using this framework to build a new theme/site you can include required Wordpress plugins using composer and the https://wpackagist.org/ repo.

	composer require seo-wordpress

This will install the plugin into the plugins folder ready for you to use in Wordpress. No need to download and save plugins to the repository anymore.

If a plugin can't be installed via the package manager you can manually add a plugin to the project by saving the plugin folder to the '/plugins' directory. Running a composer install or update will copy the plugins from the that folder to the public plugins folder (/public/wp-content/plugins/). Note that adding the plugin manually will include all the plugins files within the project repo.


## Webpack:

Webpack takes all the assets from the assets folder, compiles and minifies them into a assets folder within the theme directory. Config of these paths are set within the .env file.

Images are only included in the output assets folder if they're referenced with the stylesheets, webpack doesn't parse any of the php files within the theme.

If you need an image pulled across to the themes assets folder include it in the /assets/index.js file:

	import img from './images/file.png';

To run a development build that watches for changes, run:

	npm run watch

This also has the Live Reload plugin configured. If you have the Live Reload plugin enabled in your browser it'll refresh the page after webpack finishes a build.

To build production ready assets simply run:

	npm run build
