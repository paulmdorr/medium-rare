![Medium Rare Logo](https://raw.githubusercontent.com/paulmdorr/medium-rare/master/images/Medium%20Rare.png)

Hey there! This is **_Medium Rare_**, a **_Wordpress_** theme based on [_s (underscores)](https://underscores.me/) and inspired on [Medium](https://medium.com/). It has a simple and responsive style, and it's intended to be an **_"About me"_** page with a blog and a portfolio.

It's free! So if you like it, you can use it on your site, or even help me with a pull request ;)

Current Features
------

* All of the features provided by [_s](https://underscores.me/).
* Theme settings for hiding comments links (in the posts list) and the footer (site-wide).
* Style inspired by [Medium](https://medium.com/) but oriented to single user blog and "About me" page.
* Comments section and form similar to Medium's.

![Comments](https://raw.githubusercontent.com/paulmdorr/medium-rare/master/images/screenshots/comments.png)

* Support for featured images, small in the posts list and as wide as the page while viewing a single post.

![Featured Image](https://raw.githubusercontent.com/paulmdorr/medium-rare/master/images/screenshots/featured%20image.png)

* One level of submenus on desktop and mobile

![Submenu](https://raw.githubusercontent.com/paulmdorr/medium-rare/master/images/screenshots/submenu1.png)
![Submenu Mobile](https://raw.githubusercontent.com/paulmdorr/medium-rare/master/images/screenshots/submenu2.png)

Planned Features
------

* Suggestions on each post, related to it ("You might also like" section).
* Portfolio integration matching the theme's style, possibly with a custom or third party plugin.
* Sharing integration matching the theme's style, possibly with a custom or third party plugin.
* Better 404 page
* Improved search results
* Text wrapping around post images

Notice about the CSS
------

This theme uses Sass to generate the CSS, but you can edit the `style.css` from the Wordpress theme editor anyway, since it's being pushed without compression. Although, if you're planning on making a lot of changes, maybe it's better to edit the Sass files (inside the `Sass` directory) and then generate the `style.css` file with compression (for production sites).