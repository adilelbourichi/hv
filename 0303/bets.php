<?php

return [
	'1' => [
		/**
		Race 1
		*/
		'favorites' => '5, 7, 8',
		/*** Fav 5 **/
		'f1-f5' => '1, 7, 8',
		'f2-f5' => '1, 8, 9',
		'f5-f6' => '1, 7, 9',
		'f5-f10' => '1, 8, 9',
		'union 5' => '1, 7, 8, 9',
		/*** Fav 7 **/
		/*** Fav 8 **/
		'f2-f8' => '1, 2, 3',
		'f4-f8' => '1, 2, 10',
		'union 8' => '1, 2, 3, 10',
		'union all' => '1, 2, 3, 7, 8, 9, 10',//count: 7
		'inter' => '1',
	],
	'2' => [
		/**
		Race 2
		*/
		'favorites' => '2, 3',
		/*** Fav 2 **/
		'f2-f4' => '5, 7, 12',
		'union 2' => '5, 7, 12',
		/*** Fav 3 **/
		'f1-f3' => '2, 6, 7',
		'f3-f4' => '4, 7, 12',
		'f3-f6' => '2, 4, 6',
		'f3-f12' => '6, 10, 13',
		'union 3' => '2, 4, 6, 7, 10, 12, 13',
		'union all' => '2, 4, 5, 6, 7, 10, 12, 13',//count: 8
		'inter' => '7, 12',
	],
	'3' => [
		/**
		Race 3
		*/
		'favorites' => '6, 9',
		/*** Fav 6 **/
		/*** Fav 9 **/
		'f3-f9' => '3, 7, 12',
		'f7-f9' => '3, 7, 12',
		'union 9' => '3, 7, 12',
		'union all' => '3, 7, 12',//count: 3
	],
	'4' => [
		/**
		Race 4
		*/
		'favorites' => '4, 11',
		/*** Fav 4 **/
		'f3-f4' => '3, 4, 11',
		'union 4' => '3, 4, 11',
		/*** Fav 11 **/
		'union all' => '3, 4, 11',//count: 3
		'Sure Place' => '4',
	],
	'5' => [
		/**
		Race 5
		*/
		'favorites' => '6',
		/*** Fav 6 **/
		'f1-f6' => '3, 4, 7',
		'f3-f6' => '3, 4, 7',
		'union 6' => '3, 4, 7',
		'union all' => '3, 4, 7',//count: 3
	],
	'6' => [
		/**
		Race 6
		*/
		'favorites' => '6, 7, 10',
		/*** Fav 6 **/
		'f6-f7' => '1, 6, 11',
		'f6-f12' => '1, 11, 12',
		'union 6' => '1, 6, 11, 12',
		/*** Fav 7 **/
		'f4-f7' => '3, 6, 13',
		'f6-f7' => '1, 6, 11',
		'union 7' => '1, 3, 6, 11, 13',
		/*** Fav 10 **/
		'union all' => '1, 3, 6, 11, 12, 13',//count: 6
		'Sure Place' => '6',
		'inter' => '1, 6, 11',
	],
	'7' => [
		/**
		Race 7
		*/
		'favorites' => '1',
		/*** Fav 1 **/
		'f1-f3' => '1, 2, 9',
		'f1-f8' => '2, 8, 9',
		'union 1' => '1, 2, 8, 9',
		'union all' => '1, 2, 8, 9',//count: 4
		'Sure Place' => '1',
	],
	'8' => [
		/**
		Race 8
		*/
		'favorites' => '4, 5',
		/*** Fav 4 **/
		'f1-f4' => '1, 6, 7',
		'f2-f4' => '2, 4, 6',
		'f3-f4' => '6, 7, 12',
		'f4-f6' => '4, 6, 12',
		'f4-f8' => '1, 2, 12',
		'f4-f10' => '4, 7, 9',
		'union 4' => '1, 2, 4, 6, 7, 9, 12',
		/*** Fav 5 **/
		'f1-f5' => '5, 7, 11',
		'f2-f5' => '4, 5, 11',
		'f5-f7' => '3, 4, 5',
		'union 5' => '3, 4, 5, 7, 11',
		'union all' => '1, 2, 3, 4, 5, 6, 7, 9, 11, 12',//count: 10
		'Sure Place' => '4, 5',
		'inter' => '4, 7',
	],
	'9' => [
		/**
		Race 9
		*/
		'favorites' => '2, 6',
		/*** Fav 2 **/
		'f2-f6' => '2, 4, 6',
		'union 2' => '2, 4, 6',
		/*** Fav 6 **/
		'f2-f6' => '2, 4, 6',
		'f4-f6' => '4, 6, 7',
		'union 6' => '2, 4, 6, 7',
		'union all' => '2, 4, 6, 7',//count: 4
		'Sure Place' => '2, 6',
		'inter' => '2, 4, 6',
	],
	'10' => [
		/**
		Race 10
		*/
		'favorites' => '6, 11',
		/*** Fav 6 **/
		/*** Fav 11 **/
		'union all' => '',//count: 0
	],
];
