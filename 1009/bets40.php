<?php

return [
	'1' => [
		/**
		Race 1
		*/
		'favorites' => '1, 8',
		'runners' => '1, 2, 3, 4, 5, 6, 7, 8',
		'suggestions' => [
			'win' => '8',
			'qin' => '4, 8',
			'trio' => '4, 8',//count trio: 2
			'inter' => '8',
		],
		'win inter' => '8',
		'win inter 2' => '8',
		'allValues' => '',
		'bets' => [
		],
		'total bets' => 0,
		'wp' => '',//count wp: 0
	],
	'2' => [
		/**
		Race 2
		*/
		'favorites' => '1, 2, 3, 6, 9, 10',
		'runners' => '1, 2, 3, 4, 5, 6, 7, 8, 9, 10',
		'suggestions' => [
			'win' => '1, 2, 4, 5, 6, 10',
			'qin' => '1, 2, 3, 4, 5, 6, 9, 10',
			'trio' => '1, 2, 3, 4, 5, 6, 8, 9, 10',//count trio: 9
			'inter' => '1, 2, 6, 10',
		],
		'win inter' => '',
		'allValues' => '2, 4, 6, 7, 8',
		'bets' => [
		],
		'total bets' => 0,
		'wp' => '2, 6',//count wp: 2
	],
	'3' => [
		/**
		Race 3
		*/
		'favorites' => '7',
		'runners' => '1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12',
		'suggestions' => [
			'win' => '',
			'qin' => '',
			'trio' => '',//count trio: 0
			'inter' => '',
		],
		'win inter' => '1, 4, 5, 7, 11',
		'allValues' => '1, 3, 4, 5',
		'bets' => [
		],
		'total bets' => 0,
		'wp' => '',//count wp: 0
	],
	'4' => [
		/**
		Race 4
		*/
		'favorites' => '1, 3, 11',
		'runners' => '1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12',
		'suggestions' => [
			'win' => '1, 2, 3, 5, 6, 11',
			'qin' => '1, 2, 3, 4, 5, 6, 8, 10, 11',
			'trio' => '1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12',//count trio: 12
			'inter' => '1, 3, 11',
		],
		'win inter' => '1',
		'win inter 2' => '1, 6',
		'allValues' => '2, 5, 7, 8',
		'bets' => [
			'place(end-favorites 40, $100)' => '11',
		],
		'total bets' => 100,
		'wp' => '',//count wp: 0
	],
	'5' => [
		/**
		Race 5
		*/
		'favorites' => '3, 5, 9',
		'runners' => '1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12',
		'suggestions' => [
			'win' => '2, 5, 8, 9',
			'qin' => '2, 5, 7, 8, 9',
			'trio' => '2, 3, 5, 7, 8, 9',//count trio: 6
			'inter' => '5, 9',
		],
		'win inter' => '2, 5',
		'allValues' => '',
		'bets' => [
		],
		'total bets' => 0,
		'wp' => '',//count wp: 0
	],
	'6' => [
		/**
		Race 6
		*/
		'favorites' => '8, 9',
		'runners' => '1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12',
		'suggestions' => [
			'win' => '',
			'qin' => '',
			'trio' => '',//count trio: 0
			'inter' => '',
		],
		'win inter' => '1, 3',
		'allValues' => '1, 3, 7, 8, 9, 10',
		'bets' => [
		],
		'total bets' => 0,
		'wp' => '8, 9',//count wp: 2
	],
	'7' => [
		/**
		Race 7
		*/
		'favorites' => '8, 12',
		'runners' => '1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12',
		'suggestions' => [
			'win' => '',
			'qin' => '',
			'trio' => '',//count trio: 0
			'inter' => '',
		],
		'win inter' => '2',
		'allValues' => '',
		'bets' => [
		],
		'total bets' => 0,
		'wp' => '',//count wp: 0
	],
	'8' => [
		/**
		Race 8
		*/
		'favorites' => '1, 9, 11',
		'runners' => '1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12',
		'suggestions' => [
			'win' => '9, 10',
			'qin' => '8, 9, 10, 12',
			'trio' => '3, 7, 8, 9, 10, 12',//count trio: 6
			'inter' => '9',
		],
		'win inter' => '',
		'allValues' => '1, 2, 3, 4, 5, 6, 7',
		'bets' => [
		],
		'total bets' => 0,
		'wp' => '1',//count wp: 1
	],
];
//total major place favorites: -100
//total major place wp: 0
//total sure place: 0
//total: 0
