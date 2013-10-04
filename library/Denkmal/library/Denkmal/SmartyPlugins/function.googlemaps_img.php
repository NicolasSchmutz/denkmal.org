<?php
// Docu: https://developers.google.com/maps/documentation/staticmaps/

function smarty_function_googlemaps_img(array $params, Smarty_Internal_Template $template) {

	if (empty($params['coordinates'])) {
		throw new CM_Exception('Param coordinates are required');
	}
	/** @var CM_Geo_Point $coordinates */
	$coordinates = $params['coordinates'];

	$size = array('width' => 400, 'height' => 400);
	if (isset($params['size'])) {
		$size = (array) $params['size'];
	}

	$class = 'googlemaps_img';
	if (isset($params['class'])) {
		$class .= ' ' . (string) $params['class'];
	}

	$zoom = 13;
	if (isset($params['zoom'])) {
		$zoom = $params['zoom'];
	}

	$scale = 1;
	if (isset($params['scale'])) {
		$scale = $params['scale'];
	}

	$linkParams['center'] = $coordinates->getLatitude() . ',' . $coordinates->getLongitude();
	$linkParams['size'] = $size['width'] . 'x' . $size['height'];
	$linkParams['zoom'] = $zoom;
	$linkParams['scale'] = $scale;
	$linkParams['markers'] = 'color:0x99cc6b|' . $coordinates->getLatitude() . ',' . $coordinates->getLongitude();
	$linkParams['sensor'] = 'false';
	$linkParams['key'] = CM_Config::get()->googleApi;

	$url = CM_Util::link('https://maps.googleapis.com/maps/api/staticmap', $linkParams);

	return '<img src="' . $url . '" class="' . $class . '">';
}
