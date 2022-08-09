---
extends: _layouts.post
section: content
title: Source Code Released
date: 2014-05-08T13:43:00-05:00
categories: [open_source, websites]
description: I have now open sourced the build system behind this website
---
This site has always used some build scripts to generate it in various formats. This has changed over the years but I have tried to keep it simple.

When I first saw [jekyll](http://jekyllrb.com/) a few years ago I liked a lot of what it did and I thought about converting this site to use it.

I didn't end up going with it because I liked being able to change whatever I want and I am much more comfortable with PHP than ruby.

I did convert much of this build system to be more like jekyll such as by using Markdown for the posts and pages. I have slowly converted it over time so it is almost in the jekyll format.

The ideal goal would be to make this feature compatible so a jekyll site can be run with this system. This probably won't ever happen, but until then it suits my needs for a website.

I have decided to release all of the code public as well as host the static files on github pages. You can now get the full build system for this site on [github](https://github.com/matt-h/matth.co)
