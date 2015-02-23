<?php

class HomeController extends BaseController {

	public function index()
	{
		return view::make('home.index');
	}

}
