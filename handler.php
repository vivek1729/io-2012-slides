<?php
	# Install PSR-0-compatible class autoloader
	spl_autoload_register(function($class){
		require preg_replace('{\\\\|_(?!.*\\\\)}', DIRECTORY_SEPARATOR, ltrim($class, '\\')).'.php';
	});

	# Get Markdown class
	use \Michelf\Markdown;
	function parse_metadata($data){
			$metadata = array();
			$sections = explode("\n", $data);
			//echo $data."<br/>";
			//print_r($sections);
			$metadata['class'] = '';
			$metadata['title'] = '';
			$metadata['subtitle'] = '';
			foreach ($sections as $section)
			  {
			  	$pos = strpos($section, ":");
			  	if ($pos === false)
			  		{ $pos = 1234; 
			  		}
			  	else {
			  		$parts = explode(":", $section);
			  		//print_r($parts);
			  		$key = $parts[0];
			  		$value = trim($parts[1]);
			  		$metadata[$key] = $value;
			  	}
			  }
			 //print_r($metadata);
			 return $metadata;
	}
	$md = file_get_contents("slides.md");
	$slides = explode("\r\n---\r\n",$md);
	$middle = '';
	foreach ($slides as $slide)
	  {
	  	$sections = explode("\r\n\r", $slide);
	  	$metadata = parse_metadata($sections[0]);
	  	$content_section = array_slice($sections, 1);
	  	$content = implode("\r\n\r", $content_section);
	  	$html = Markdown::defaultTransform($content);
	  	//Some post processing
	  	$html = str_replace('<pre>', '<pre class="prettyprint">',$html);
	  	if (isset($metadata['build_lists']) and $metadata['build_lists'] == true)
		    {
		   	$html = str_replace('<ul>', '<ul class="build">',$html);
		    $html = str_replace('<ol>', '<ol class="build">',$html);
			}
	  	$main = '<slide '.(isset($metadata['class']) ? 'class = "'.$metadata['class'] : '"').'"'
	  	.(isset($metadata['image']) ? 'style="background-image: url()">' : '>')
	  	.(strpos($metadata['class'], "segue") !== false ? '<aside class="gdbar"><img src="images/google_developers_icon_128.png"></aside>
    <hgroup class="auto-fadein">
      <h2>'.$metadata['title'].'</h2>
      <h3>'.$metadata['subtitle'].'</h3>
    </hgroup>' : '<hgroup>
      <h2>'.$metadata['title'].'</h2>
      <h3>'.$metadata['subtitle'].'</h3>
    </hgroup>')
	  	.'<article '.(isset($metadata['content_class']) ? 'class = "'.$metadata['content_class'] : '"').'">'
   		.$html.'</article></slide>';

   		$middle = $middle.$main;
	  	
	  }

	 $template = '<slides class="layout-widescreen">
  <slide class="logoslide nobackground">
    <article class="flexbox vcenter">
      <span><img src="images/google_developers_logo.png"></span>
    </article>
  </slide>

  <slide class="title-slide segue nobackground">
    <aside class="gdbar"><img src="images/google_developers_icon_128.png"></aside>
    <!-- The content of this hgroup is replaced programmatically through the slide_config.json. -->
    <hgroup class="auto-fadein">
      <h1 data-config-title><!-- populated from slide_config.json --></h1>
      <h2 data-config-subtitle><!-- populated from slide_config.json --></h2>
      <p data-config-presenter><!-- populated from slide_config.json --></p>
    </hgroup>
  </slide>';

  	   $end = '<slide class="thank-you-slide segue nobackground">
    <aside class="gdbar right"><img src="images/google_developers_icon_128.png"></aside>
    <article class="flexbox vleft auto-fadein">
      <h2>&lt;Thank You!&gt;</h2>
      <p>Important contact information goes here.</p>
    </article>
    <p class="auto-fadein" data-config-contact>
      <!-- populated from slide_config.json -->
    </p>
  </slide>

  <slide class="logoslide dark nobackground">
    <article class="flexbox vcenter">
      <span><img src="images/google_developers_logo_white.png"></span>
    </article>
  </slide>

  <slide class="backdrop"></slide>

</slides>';
	echo $template.$middle.$end;
?>