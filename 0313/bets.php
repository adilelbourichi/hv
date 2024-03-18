<?php

return [
	'1' => [
		/**
		Race 1
		*/
		'favorites' => '2, 3, 4, 6',
		'Fav 3' => '1, 3, 4, 5, 6, 7',
		'Fav 4' => '1, 2, 4, 5, 10',
		'Fav 6' => '1, 6, 7, 9',
		'union' => '1, 2, 3, 4, 5, 6, 7, 9, 10',//count: 9
		'win' => '2, 3, 4, 6',
		'inter6' => '1, 2, 3, 5, 9',
		'diff' => '4, 6, 7, 10',
		'place?' => '4, 6',
	],
	'2' => [
		/**
		Race 2
		*/
		'favorites' => '3, 4',
		'Fav 4' => '3, 4, 5, 7, 12',
		'union' => '3, 4, 5, 7, 12',//count: 5
		'inter6' => '4, 7, 12',
		'diff' => '3, 5',
		'place?' => '3',
	],
	'3' => [
		/**
		Race 3
		*/
		'favorites' => '2, 4, 6, 7, 11, 12',
		'Fav 2' => '1, 2, 8, 10, 12',
		'Fav 4' => '2, 3, 4, 6, 8, 11',
		'Fav 6' => '1, 4, 12',
		'Fav 7' => '3, 5, 6, 7, 11, 12',
		'Fav 12' => '2, 10, 12',
		'union' => '1, 2, 3, 4, 5, 6, 7, 8, 10, 11, 12',//count: 11
	],
	'4' => [
		/**
		Race 4
		*/
		'favorites' => '1, 2, 3',
		'Fav 2' => '2, 7, 9, 10, 12, 13',
		'Fav 3' => '3, 4, 5, 6, 8, 11',
		'union' => '2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13',//count: 12
		'win' => '1, 2, 3',
		'inter6' => '2, 3, 5, 6, 10, 11',
		'diff' => '4, 7, 8, 9, 12, 13',
		'place?' => '',
	],
	'5' => [
		/**
		Race 5
		*/
		'favorites' => '5, 8, 10',
		'Fav 5' => '1, 3, 5, 12',
		'Fav 10' => '2, 4',
		'union' => '1, 2, 3, 4, 5, 12',//count: 6
		'inter6' => '1, 2, 5, 12',
		'diff' => '3, 4',
		'place?' => '',
	],
	'6' => [
		/**
		Race 6
		*/
		'favorites' => '1, 3',
		'Fav 1' => '1, 3, 7, 9, 12, 13',
		'Fav 3' => '1, 3, 5, 9, 11',
		'union' => '1, 3, 5, 7, 9, 11, 12, 13',//count: 8
		'win' => '1, 3',
	],
	'7' => [
		/**
		Race 7
		*/
		'favorites' => '3, 4',
		'Fav 3' => '1, 2, 3, 9, 10',
		'union' => '1, 2, 3, 9, 10',//count: 5
		'inter6' => '1, 3, 10',
		'diff' => '2, 9',
		'place?' => '',
	],
	'8' => [
		/**
		Race 8
		*/
		'favorites' => '4, 7, 10',
		'Fav 7' => '1, 3, 4, 5',
		'Fav 10' => '3, 4, 7, 9, 10',
		'union' => '1, 3, 4, 5, 7, 9, 10',//count: 7
		'inter6' => '1, 4, 7, 9',
		'diff' => '3, 5, 10',
		'place?' => '10',
	],
	'9' => [
		/**
		Race 9
		*/
		'favorites' => '2, 4, 5, 6',
		'Fav 2' => '2, 4, 6, 11',
		'Fav 4' => '4, 6, 7, 9',
		'Fav 5' => '3, 4, 5, 8, 11, 12',
		'Fav 6' => '2, 3, 4, 6, 7',
		'union' => '2, 3, 4, 5, 6, 7, 8, 9, 11, 12',//count: 10
		'win' => '2, 4, 5, 6',
	],
];
