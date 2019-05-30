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

Set the 'public' folder as your webroot. When you've finished running the Wordpress installer ensire that the 'siteurl' and 'home' URL's are set correctly.

The 'siteurl' option requires the directory of the Wordpress core 'wp-core':

	Site URL: https://wordpress.local/wp-core/
	Home: https://wordpress.local/


## 4:

To login to the Wordpress admin you'll need to add the wp-core directory to the URL:

	https://wordpress.local/wp-core/wp-admin
