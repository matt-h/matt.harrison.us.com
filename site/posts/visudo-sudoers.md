---
layout: post
title: Edit sudoers with visudo and nano
h1: Edit Sudoers
date: 2011-07-19 22:16:42
categories: Linux
description: How to edit the sudoers file to manage sudo users with visudo. Edit sudoers with nano or use visudo with nano.
---
Editing sudoers file allows you to manage which users can use the <a title="sudo" href="http://en.wikipedia.org/wiki/Sudo">sudo</a> command. You should never modify this file by hand, and syntax errors will make it so you can't use sudo and possibly not be able to edit the file again. To modify it you should use the command <a title="visudo" href="http://en.wikipedia.org/wiki/Visudo" target="_blank">visudo</a>. This opens the sudoers file in vi so you can edit it.

I was attempting to edit mine with vi and for some reason it wasn't working properly. I can get around in vi decently. I'm no expert at it, but I am able to edit files and save them. This time, I couldn't get it to change the way I wanted to. Instead of fighting with it, I just decided to use nano and get it done quickly. I only wanted to change one line anyway. To use nano with visudo, simple run it this way:

<code>sudo EDITOR=nano visudo</code>
