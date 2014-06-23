<?php

class UserController extends BaseController {

    public function showList()
    {
        return View::make('users.list');
    }


    /**
     * 处理添加用户
     * @return json 处理结果
     */
    public function doAddUser()
    {
        $json_response = [ 'status' => -1, 'msg' => '未知错误！' ];

        // 表单数据
        $inputs = array_trim(Input::all(), ['password', 'password_confirmation']);

        // 验证规则
        $rules = array(
            'login_email' => 'required | email | unique:user',
            'password'    => 'required | min:6 | confirmed:repassword',
            'idcards_image' => 'mimes:jpeg,bmp,png,gif'
        );
        // 验证提示消息
        $messages = array(
            'login_email.required' => '登陆邮箱不能为空！',
            'login_email.email'    => '登陆邮箱地址不正确！',
            'login_email.unique'   => '登陆邮箱已注册！',
            'password.required'    => '密码不能为空！',
            'password.min'         => '密码长度不能少于6位！',
            'password.confirmed'   => '两次输入密码不一致！',
            'idcards_image.mimes'  => '身份证照片上传格式不正确！',
        );
        // 进行验证
        $validator = Validator::make($inputs, $rules, $messages);
//         if( $validator->fails() )
//         {
//             $json_response['status'] = 1;
//             $json_response['msg']    = $validator->messages()->first();
// P($validator->messages()->first());
//             // json_output($json_response);
//         }

        // 执行添加
        $user = new User();
        $user->login_email = $inputs['login_email'];
        $user->login_name  = explode('@', $inputs['login_email'])[0];
        $user->password    = Hash::make($inputs['password']);
        $user->realname    = $inputs['realname'];
        $user->idcards     = $inputs['idcards'];
        $user->work        = $inputs['work'];
        $user->status      = $inputs['status'];

        // 身份证图片上传
        if( Input::hasFile('idcards_image') )
        {
            $idcards_image = Input::file('idcards_image');
            V($idcards_image);
        }
        V($_FILES);
// P($idcards_image);
        // json_output($json_response);
    }
}