<?php

class BaseController extends Controller {

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}

	/**
     * ajax JSON输出，并终止程序执行
     *
     * @param  array  $data 需要JSON输出的数据
     *
     * @return json 直接输出JSON格式的内容
     */
    static protected function json_output($data)
    {
        header('Content-Type: application/json');
        echo json_encode($data);
        die;
    }

}
