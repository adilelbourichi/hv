<?php

return [
	'1' => [
		/**
		Race 1
		*/
		'favorites' => '1, 6, 11',
		'inter(fav 1, fav 11)' => '7, 8, 11',
		'union' => '7, 8, 11',//count: 3
		'win' => '1, 7, 8, 11',
		'win' => '1, 6, 7, 8',
		'diff' => '6, 11',
	],
	'2' => [
		/**
		Race 2
		*/
		'favorites' => '2, 4, 5',
		'inter(fav 2, fav 4)' => '5, 7, 12',
		'union' => '5, 7, 12',//count: 3
		'win' => '2, 5, 7, 12',
		'win' => '2, 4, 5, 7',
		'diff' => '4, 12',
	],
	'3' => [
		/**
		Race 3
		*/
		'favorites' => '2, 3',
		'inter(fav 2, fav 3)' => '1, 8, 12',
		'union' => '1, 8, 12',//count: 3
		'win' => '1, 2, 8, 12',
		'win' => '1, 2, 3, 8',
		'diff' => '3, 12',
	],
	'4' => [
		/**
		Race 4
		*/
		'favorites' => '5',
	],
	'5' => [
		/**
		Race 5
		*/
		'favorites' => '1',
	],
	'6' => [
		/**
		Race 6
		*/
		'favorites' => '3, 7',
		'inter(fav 3, fav 7)' => '1, 3, 5, 9, 11',
		'union' => '1, 3, 5, 9, 11',//count: 5
		'win' => '1, 3, 5, 9',
		'win' => '1, 3, 5, 7',
		'diff' => '7, 9',
	],
	'7' => [
		/**
		Race 7
		*/
		'favorites' => '1, 3',
		'inter(fav 1, fav 3)' => '1, 2, 9',
		'union' => '1, 2, 9',//count: 3
		'win' => '1, 2, 3, 9',
		'win' => '1, 2, 3, 9',
		'diff' => '',
	],
	'8' => [
		/**
		Race 8
		*/
		'favorites' => '4, 6, 8',
		'inter(fav 4, fav 6)' => '4, 6, 12',
		'inter(fav 4, fav 8)' => '1, 2, 12',
		'union' => '1, 2, 4, 6, 12',//count: 5
		'win' => '1, 2, 4, 6',
		'win' => '1, 2, 4, 6',
		'diff' => '',
	],
	'9' => [
		/**
		Race 9
		*/
		'favorites' => '2, 3, 5',
		'inter(fav 3, fav 5)' => '3, 8, 11',
		'union' => '3, 8, 11',//count: 3
		'win' => '2, 3, 8, 11',
		'win' => '2, 3, 5, 8',
		'diff' => '5, 11',
	],
	'10' => [
		/**
		Race 10
		*/
		'favorites' => '3, 5, 11',
	],
];
