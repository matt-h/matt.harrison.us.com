<?php
use Symfony\Component\Yaml\Yaml;
use \Michelf\MarkdownExtra;

function read_file($filename) {
	$data = file_get_contents($filename);

	// Split the pieces
	$pieces = explode('---', $data);

	// Shift off the first one since it is always empty
	array_shift($pieces);

	// Grab the next since it is the yaml
	$yaml = array_shift($pieces);

	// Parse yaml into fields
	$items = Yaml::parse($yaml);

	if(!is_array($items)) {
		var_dump($filename);
		var_dump($data);
		var_dump($yaml);
		exit();
	}

	// Preserve path parts
	$items = array_merge($items, pathinfo($filename));

	// Put everthing else into content
	$items['content'] = implode('---', $pieces);

	switch($items['extension']) {
		case 'md':
			$items['content'] = MarkdownExtra::defaultTransform($items['content']);
		break;
		default:
		break;
	}

	return $items;
}

function date_sort($a, $b) {
	if(!isset($a['date']) || !isset($b['date'])) {
		return 0;
	}
	if($a['date'] === $b['date']) {
		return 0;
	}
	if($a['date'] > $b['date']) {
		return 1;
	}
	return -1;
}

function get_all_items($directory) {
	$items = array();
	$files = scandir($directory);
	foreach($files as $file) {
		if($file !== '.' && $file !== '..') {
			$items[] = read_file($directory.'/'.$file);
		}
	}
	usort($items, 'date_sort');
	return $items;
}

// copies files and non-empty directories
function rcopy($src, $dst) {
	if(is_dir($src)) {
		if(!file_exists($dst)) {
			mkdir($dst);
		}
		$files = scandir($src);
		foreach ($files as $file) {
			if ($file != '.' && $file != '..') {
				rcopy("$src/$file", "$dst/$file");
			}
		}
	}
	elseif(file_exists($src)) {
		copy($src, $dst);
	}
}

function write_file($file, $data) {
	$info = pathinfo($file);
	if (!is_dir($info['dirname'])) {
		// dir doesn't exist, make it
		mkdir($info['dirname'], 0755, true);
	}
	file_put_contents($file, $data);
}
