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


    public function missingMethod($parameters = array())
    {
        P($parameters);
        echo '您访问的控制器方法不存在！';
    }
}
