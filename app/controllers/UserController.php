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
        // 创建ORM
        $user = new User();
        // 表单数据
        $inputs = array_trim(Input::all(), ['password', 'password_confirmation']);

        // 验证规则
        $rules = array(
            'login_email' => 'required | email | unique:user',
            'password'    => 'required | min:6 | confirmed:repassword',
            'idcards'     => 'required',
        );
        // // 验证提示消息
        $messages = array(
            'login_email.required' => '登陆邮箱不能为空！',
            'login_email.email'    => '登陆邮箱地址不正确！',
            'login_email.unique'   => '登陆邮箱已注册！',
            'password.required'    => '密码不能为空！',
            'password.min'         => '密码长度不能少于6位！',
            'password.confirmed'   => '两次输入密码不一致！',
            'idcards.require'      => '身份证号码重复！',
        );
        // 进行验证
        $validator = Validator::make($inputs, $rules, $messages);
        if( $validator->fails() )
        {
            return View::make('users/addUserError')->with(['errorMsg' =>$validator->messages()->all()]);
        }

        // 身份证图片上传
        if( Input::hasFile('idcards_image') )
        {
            // $rule    = ['idcards_image' => 'image'];
            // $message = ['idcards_image.image' => '身份证照片上传格式不正确！'];
            // 上传图片格式验证
            // $validator = Validator::make($inputs, $rule, $message);
            // if( $validator->fails() )
            // {
            //     P($validator->messages()->first());
            // }

            $idcards_image = Input::file('idcards_image');
            $user->idcards_image = 1;
            if( $inputs['idcards'] )
            {
                $user->idcards_image = $inputs['idcards'];
            }
            $user->idcards_image = $user->idcards_image . '.' . $idcards_image->getClientOriginalExtension();
            $idcards_image->move(storage_path() . '/uploades/idcards/', $user->idcards_image);
        }
        // 执行添加

        $user->login_email = $inputs['login_email'];
        $user->login_name  = explode('@', $inputs['login_email'])[0];
        $user->nickname   = $user->login_name;
        $user->password    = Hash::make($inputs['password']);
        $user->realname    = $inputs['realname'];
        $user->idcards     = $inputs['idcards'];
        if( isset($inputs['work']) && 'on' === $inputs['work'])
        {
            $user->work = 1;
        }
        if( isset($inputs['status']) && 'on' === $inputs['status'])
        {
            $user->status = 1;
        }
        P($user);



        P($user->save());
    }
}