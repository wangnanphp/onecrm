<?php

class RegcodeController extends BaseController {

    public function showList()
    {
        return View::make('regcode.list');
    }

    public function add()
    {
        return View::make('regcode.add');
    }

}
