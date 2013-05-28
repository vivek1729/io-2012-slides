title: This is a test slide
subtitle: Works fine
class: image

![Mobile vs desktop users](images/io2012_logo.png)

---

title: Segue Slide
subtitle: Subtitle
class: segue dark nobackground

---

title: Agenda
class: big
build_lists: true

Things we'll cover (list should build):

- Pressing 'h' highlights code snippets
- Pressing 'p' toggles speaker notes (if they're on the current slide)
- Pressing 'f' toggles fullscreen viewing
- Pressing 'w' toggles widescreen
- Pressing 'o' toggles overview mode
- Pressing 'ESC' toggles off these goodies
- The source file can be modified to take into account other classes used in the template like "build-fade"

---

title: Today
class: nobackground fill

![Many kinds of devices.](images/io2012_logo.png)

<footer class="source">source: place source info here</footer>

---

title: Big Title Slide
class: title-slide

---

title: Code Example

Media Queries are sweet:

<pre class="prettyprint" data-lang="css">
@media screen and (max-width: 640px) {
  #sidebar { display: none; }
}
</pre>

---

title: Code Slide (with Subtitle Placeholder)
subtitle: Subtitle Placeholder


Press 'h' to highlight important sections of code (wrapped in <code>&lt;b&gt;</code>).

However for this to work you will have to write the escapd html characters to highlight 
html tags in the code.

<pre class="prettyprint" data-lang="javascript">
&lt;script type='text/javascript'&gt;
  // Say hello world until the user starts questioning
  // the meaningfulness of their existence.
  function helloWorld(world) {
    <b>for (var i = 42; --i &gt;= 0;) {
      alert('Hello ' + String(world));
    }</b>
  }
&lt;/script&gt;
</pre>

 

---

title: Once more, with JavaScript

<pre class="prettyprint" data-lang="javascript">
function isSmall() {
  return window.matchMedia("(min-device-width: ???)").matches;
}

function hasTouch() {
  return Modernizr.touch;
}

function detectFormFactor() {
  var device = DESKTOP;
  if (hasTouch()) {
    device = isSmall() ? PHONE : TABLET;
  }
  return device;
}
</pre>

---

title: Centered content
content_class: flexbox vcenter

This content should be centered!

---

title: Another slide

#Test Heading#

*Markdown* works fine(Some tags like "strong" and "em" are not working because they have been overridden by the css)

The beginning and thankyou slides
are predefined like in the [source](https://code.google.com/p/io-2012-slides/). 
Some info is taken from the slide_config.js which can be changed easily.

---

title: Code testing in markdown


Code can be written by indenting with atleast four spaces and the highlighting is automatic. 
However the flag with lanugage defined won't appear because that's css and is hardcoded when 
defining code with html tags rather than markdown.

	#Example php code
	$uri = explode(':', $uri, 0b10);
	      $schemeSpecific = isset($uri[1]) ? $uri[1] : '';
	      $desc = 'Multi
	line description';

	      // Security check
	      if (!ctype_alnum($scheme)) {
	          throw new Zend_Uri_Exception('Illegal scheme');
	      }

