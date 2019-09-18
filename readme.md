# Portfolio starter

This is a starter template for freelancers wanting to showcase projects/work. It's based on [Tighten.co's Jigsaw blog template.](http://jigsaw-blog-staging.tighten.co/)

While the template was initially purposed for static content, this starterThis starter allows you to connect with your [contentful account](contentful.com). I'm currently using the free tier.

Additionally this template uses [FieldGoal](https://fieldgoal.io) to manage forms on the front-end (without exposing my password). As well, each form has reCaptchav2 enabled to prevent bot shenanigans from abusing your beautiful website.

## Installation

After installing Jigsaw, run the following commands from your project directory:

```bash
composer install
npm install && npm run build
./vendor/bin/jigsaw build
```

This template comes pre-configured with:

- A fully responsive navigation bar
- [Tailwind CSS](https://tailwindcss.com/), a utility CSS framework that allows you to customize your design without touching a line of CSS
- [Purgecss](https://www.purgecss.com/) to remove unused selectors from your CSS, resulting in smaller CSS files
- Syntax highlighting using [highlight.js](https://highlightjs.org/)
- A script that automatically generates a `sitemap.xml` file
- A custom 404 page
- A component for accepting signups for a [Mailchimp](https://mailchimp.com/) newsletter
- A sample contact form
- A search bar powered by [Fuse.js](http://fusejs.io/) and [Vue.js](https://vuejs.org/), which indexes your content automatically and requires zero configuration

---

### Configuring your new site

As with all Jigsaw sites, configuration settings can be found in `config.php`; you can update the variables in that file with settings specific to your site. You can also add new configuration variables there to use across your site; take a look at the [Jigsaw documentation](http://jigsaw.tighten.co/docs/site-variables/) to learn more.

```php
// config.php
return [
    'baseUrl' => 'https://my-awesome-portfolio.com/',
    'production' => false,
    'siteName' => 'My Site',
    'siteDescription' => 'Welcome to my portfolio',
    ...
];
```

> Tip: This configuration file is also where you’ll define any "collections" (for example, a collection of the contributors to your site, or a collection of blog posts organized by topic). Check out the official [Jigsaw documentation](https://jigsaw.tighten.co/docs/collections/) to learn more.

---

### Adding Content

You can write your content using a [variety of file types](http://jigsaw.tighten.co/docs/content-other-file-types/). By default, this starter template expects your content to be located in the `source/_projects/` folder.

The top of each content page contains a YAML header that specifies how it should be rendered. The `title` attribute is used to dynamically generate HTML `title` and OpenGraph tags for each page. The `extends` attribute defines which parent Blade layout this content file will render with (e.g. `_layouts.projects` will render with `source/_layouts/projects.blade.php`), and the `section` attribute defines the Blade "section" that expects this content to be placed into it.

```yaml
---
extends: _layouts.project
section: content
title: My Amazing Project
date: 2018-12-25
description: Project was so amazing I just had to put it on a website
cover_image: /assets/img/amazing-project-omg.jpg
featured: true
---
```

---

### Adding Assets

Any assets that need to be compiled (such as JavaScript, Less, or Sass files) can be added to the `source/_assets/` directory, and Laravel Mix will process them when running `npm run local` or `npm run production`. The processed assets will be stored in `/source/assets/build/` (note there is no underscore on this second `assets` directory).

Then, when Jigsaw builds your site, the entire `/source/assets/` directory containing your built files (and any other directories containing static assets, such as images or fonts, that you choose to store there) will be copied to the destination build folders (`build_local`, on your local machine).

Files that don't require processing (such as images and fonts) can be added directly to `/source/assets/`.

[Read more about compiling assets in Jigsaw using Laravel Mix.](http://jigsaw.tighten.co/docs/compiling-assets/)

---

## Building Your Site

Now that you’ve edited your configuration variables and know how to customize your styles and content, let’s build the site.

```bash
# build static files with Jigsaw
./vendor/bin/jigsaw build

# compile assets with Laravel Mix
# options: dev, staging, production
npm run dev
```
