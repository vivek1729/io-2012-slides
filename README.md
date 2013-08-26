io-2012-slides
==============

Markdown slide show builder. Currently I have used the Markdown template for google IO 2012 slide deck.

In the original [source code](https://code.google.com/p/io-2012-slides/source/) for the slidedeck,
there is a markdown template which is based on python. 

I have tried to make a template of my own using [markdown php](https://github.com/michelf/php-markdown) and jquery only.
The slides seem to be working fine. Ofcourse some of the tags like "strong" or "em" might not work because they have been
over-ridden by the css file. The title, name etc can be set from slide_config.js. The introductory and thankyou slides have
been included in the php source code and not in the *slides.md* file.

The code highlighting uses **google prettify** and this is a very basic version of the markdown template. It will obviously be
subjected to continuous improvement with time.  

[Slides source authored in markdown](https://raw.github.com/vivek1729/io-2012-slides/master/slides.md)

[Live Demo](http://thesnoopybub.com/projects/io-2012-slides/io-2012-slides/)

PS : *This code can be freely used by anyone.*
