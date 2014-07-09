<?php

/**
 * 注册码控制器
 */
class RegcodeController extends BaseController {

    public function showList()
    {
        return View::make('regcode.list');
    }


    /**
     * 添加注册码页面
     *
     * @return [type] [description]
     */
    public function getRegcodeAdd()
    {
        // select regcode type
        $regcodeType = RegcodeType::select('id', 'name')->orderBy('id')->get();

        // select regcode terminal
        $regcodeTerminal = RegcodeTerminal::select('id', 'name')->orderBy('id')->get();

        return View::make('regcodes.regcodeAdd')
            ->withType($regcodeType)
            ->withTerminal($regcodeTerminal);
    }
}
