<?php

use Illuminate\Support\Facades\Route;

Route::get('/', fn () => redirect('/slide/1'));

Route::livewire('/slide/1', 'slides.s01-cover');
Route::livewire('/slide/2', 'slides.s02-about-me');
Route::livewire('/slide/3', 'slides.s03-javascript-enemy');
Route::livewire('/slide/4', 'slides.s04-solid-ground');
Route::livewire('/slide/5', 'slides.s05-four-months');
Route::livewire('/slide/6', 'slides.s06-behind-the-scenes');
Route::livewire('/slide/7', 'slides.s07-dark-side');
Route::livewire('/slide/8', 'slides.s08-livewire-four');
Route::livewire('/slide/9', 'slides.s09-blaze');
Route::livewire('/slide/10', 'slides.s10-single-file');
Route::livewire('/slide/11', 'slides.s11-new-api');
Route::livewire('/slide/12', 'slides.s12-islands');
Route::livewire('/slide/13', 'slides.s13-spa-like');
Route::livewire('/slide/14', 'slides.s14-raio-x-webnews');
Route::livewire('/slide/15', 'slides.s15-my-vision');
Route::livewire('/slide/16', 'slides.s16-credits');
