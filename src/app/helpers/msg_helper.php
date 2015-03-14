<?php

function msg_box($content, $color = "yellow darken-4") {
	$CI =& get_instance();
	$msg = array();
	$msg['text'] = $content;
	$msg['color'] = $color;
	$CI->load->view('templates/msg_box', $msg);
}

function show_flash_msg() {
	$CI =& get_instance();
	if ($CI->php_session->flashdata('msg')) {
		msg_box($CI->php_session->flashdata('msg_text'), $CI->php_session->flashdata('msg_color'));
	}
}

function flash_msg($content, $color = "yellow darken-4") {
	$CI =& get_instance();
	$CI->php_session->set_flashdata('msg', true);
	$CI->php_session->set_flashdata('msg_text', $content);
	$CI->php_session->set_flashdata('msg_color', $color);
}