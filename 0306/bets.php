<?php

return [
	'1' => [
		/**
		Race 1
		*/
		'favorites' => '7',
		'win hist(fav 7)' => '3, 7',//count: 2
		'all' => '7, 3',//count: 2
		'win' => '3, 7',
	],
	'2' => [
		/**
		Race 2
		*/
		'favorites' => '3, 4',
		'win hist(fav 4)' => '3, 4, 5, 7, 12',//count: 5
		'all' => '3, 4, 7, 5, 12',//count: 5
		'win' => '3, 4, 5, 7',
	],
	'3' => [
		/**
		Race 3
		*/
		'favorites' => '10, 4, 1, 5, 3',
		'win hist(fav 10)' => '9',//count: 1
		'qin/trio' => '10, 4, 1, 5, 3',
		'all' => '10, 4, 1, 5, 3, 9',//count: 6
		'win' => '1, 4, 5, 10',
	],
	'4' => [
		/**
		Race 4
		*/
		'favorites' => '5, 2, 6',
		'win hist(fav 6)' => '4, 6',//count: 2
		'qin/trio' => '5, 2, 6',
		'all' => '5, 2, 4, 6',//count: 4
		'win' => '2, 4, 5, 6',
	],
	'5' => [
		/**
		Race 5
		*/
		'favorites' => '7, 3, 1',
		'win hist(fav 7)' => '1, 4, 5, 7, 8',//count: 5
		'qin/trio' => '7, 3, 1',
		'all' => '7, 4, 3, 8, 1, 5',//count: 6
		'win' => '3, 4, 7, 8',
	],
	'6' => [
		/**
		Race 6
		*/
		'favorites' => '9, 1, 5',
		'win hist(fav 9)' => '2, 5, 7',//count: 3
		'qin/trio' => '9, 1, 5',
		'all' => '9, 1, 5, 2, 7',//count: 5
		'win' => '1, 2, 5, 9',
	],
	'7' => [
		/**
		Race 7
		*/
		'favorites' => '4, 9',
		'win hist(fav 9)' => '9',//count: 1
		'all' => '4, 9',//count: 2
		'win' => '4, 9',
	],
	'8' => [
		/**
		Race 8
		*/
		'favorites' => '8, 3',
		'win hist(fav 8)' => '1, 2, 3, 8, 12',//count: 5
		'all' => '8, 3, 12, 2, 1',//count: 5
		'win' => '2, 3, 8, 12',
	],
	'9' => [
		/**
		Race 9
		*/
		'favorites' => '7, 3, 11',
		'win hist(fav 11)' => '12',//count: 1
		'qin/trio' => '7, 3, 11',
		'all' => '7, 3, 11, 12',//count: 4
		'win' => '3, 7, 11, 12',
	],
];
