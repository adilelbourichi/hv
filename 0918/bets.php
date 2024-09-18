<?php

return [
	'1' => [
		/**
		Race 1
		*/
		'favorites' => '2, 3',
		'runners' => '1, 2, 3, 4, 5, 6, 7, 8, 9',
		'win inter' => '1, 2, 8',
		'allValues' => '1, 2, 3, 4, 5, 6, 7, 8, 9',
		'bets' => [
		],
		'total bets' => 0,
	],
	'2' => [
		/**
		Race 2
		*/
		'favorites' => '2, 3, 7',
		'runners' => '1, 2, 3, 4, 5, 6, 7, 8, 9, 10',
		'win inter' => '2, 6, 7, 9',
		'allValues' => '1, 2, 3, 4, 5, 6, 7, 8, 9',
		'bets' => [
			'place(end-favorites , $100)' => '7',
			'place(end-wp , $100)' => '7',
		],
		'total bets' => 200,
	],
	'3' => [
		/**
		Race 3
		*/
		'favorites' => '3, 6',
		'runners' => '1, 2, 3, 4, 5, 6, 7, 8, 9',
		'win inter' => '1, 2, 3, 7',
		'allValues' => '1, 2, 3, 4, 5, 6, 7, 8',
		'bets' => [
		],
		'total bets' => 0,
	],
	'4' => [
		/**
		Race 4
		*/
		'favorites' => '1, 4, 7, 11',
		'runners' => '1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12',
		'win inter' => '2, 5, 11',
		'allValues' => '1, 2, 3, 4, 5, 6, 7, 8, 10, 11, 12',
		'bets' => [
			'place(end-favorites , $100)' => '11',
		],
		'total bets' => 100,
	],
	'5' => [
		/**
		Race 5
		*/
		'favorites' => '5, 9',
		'runners' => '1, 2, 3, 4, 5, 6, 7, 8, 9, 10',
		'win inter' => '2, 3, 5, 9',
		'allValues' => '1, 2, 3, 4, 5, 6, 7, 8',
		'bets' => [
		],
		'total bets' => 0,
	],
	'6' => [
		/**
		Race 6
		*/
		'favorites' => '2, 3, 10',
		'runners' => '1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12',
		'win inter' => '1, 3, 6',
		'allValues' => '1, 2, 3, 4, 5, 6, 7, 8, 9, 10',
		'bets' => [
			'place(end-favorites , $100)' => '10',
			'place(end-wp , $100)' => '10',
		],
		'total bets' => 200,
	],
	'7' => [
		/**
		Race 7
		*/
		'favorites' => '1, 3, 7',
		'runners' => '1, 2, 3, 4, 5, 6, 7, 8, 9, 10',
		'win inter' => '1, 2, 3',
		'allValues' => '1, 2, 3, 4, 5, 6, 7, 8, 9',
		'bets' => [
			'place(end-favorites , $100)' => '7',
			'place(end-wp , $100)' => '7',
		],
		'total bets' => 200,
	],
	'8' => [
		/**
		Race 8
		*/
		'favorites' => '2, 7, 8',
		'runners' => '1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12',
		'win inter' => '1, 2, 3, 4, 6, 8, 12',
		'allValues' => '1, 2, 3, 4, 5, 6, 7, 8, 10, 11, 12',
		'bets' => [
			'place(end-wp , $100)' => '8',
		],
		'total bets' => 100,
	],
];
//total major place favorites: -400
//total major place wp: -400
//total minor place: 0
//total: 0