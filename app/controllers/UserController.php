<?php

class UserController extends BaseController {

    /**
     * 获取用户列表
     * @return [type] [description]
     */
    public function getUserList()
    {
        $users = User::paginate(5);
        return View::make('users.userList')->with('users', $users);
    }


    /**
     * 添加用户页面
     * @return [type] [description]
     */
    public function getAddUser()
    {
        return View::make('users.addUser');
    }


    /**
     * 执行添加用户
     * @return json 处理结果
     */
    public function postAddUser()
    {
        // 创建ORM
        $user = new User();
        // 表单数据
        $inputs = array_trim(Input::all(), ['password', 'password_confirmation']);

        // 验证规则
        $rules = array(
            'login_email' => 'required | email | unique:user',
            'password'    => 'required | min:6 | confirmed:repassword',
            'idcards'     => 'unique:user',
        );
        // 验证提示消息
        $messages = array(
            'login_email.required' => '登陆邮箱不能为空！',
            'login_email.email'    => '登陆邮箱地址不正确！',
            'login_email.unique'   => '登陆邮箱已注册！',
            'password.required'    => '密码不能为空！',
            'password.min'         => '密码长度不能少于6位！',
            'password.confirmed'   => '两次输入密码不一致！',
            'idcards.unique'      => '身份证号码重复！',
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
        $user->nickname    = $user->login_name;
        $user->password    = Hash::make($inputs['password']);
        $user->realname    = $inputs['realname'];
        $user->idcards     = $inputs['idcards'];
        if( ! isset($inputs['work']) || 'on' != $inputs['work'] )
        {
            $user->work = 1;
        }
        if( ! isset($inputs['status']) || 'on' != $inputs['status'])
        {
            $user->status = 1;
        }

        if( false === $user->save() )
        {
            return View::make('users/addUserError')->with(['errorMsg' =>'数据库操作失败！']);
        }
        else
        {
            return View::make('publics/addFormSuccess')->with(['url' => '/user/add-user', 'successMsg' =>'添加新用户成功！']);
        }
    }


    /**
     * 更改用户的模式（是否在职/状态）
     * @return [type] [description]
     */
    public function postChangeMode()
    {
        $json_response = ['status' => 1, 'msg' => '请通过正常途径修改信息！'];

        $inputs = array_trim(Input::only('id', 'mode'));

        // 数据验证
        $validator = Validator::make($inputs, ['id' => 'required | integer | exists:user,id', 'mode' => 'required | in:work,status']);
        if( $validator->passes() )  // 验证通过
        {
            $array_mode = [1, 0];
            $user = User::find($inputs['id']);
            $user->$inputs['mode'] = $array_mode[$user->$inputs['mode']];
            if( false === $user->save() )
            {
                $json_response = ['status' => 2, 'value' => $user->$inputs['mode'], 'msg' => '修改数据失败！'];
            }
            else
            {
                $json_response = ['status' => 0, 'value' => $user->$inputs['mode'], 'msg' => '修改成功！'];
            }
        }
// P(DB::getQueryLog());
        json_output($json_response);
    }


    public function getDeleteUser()
    {
        $json_response = ['status' => 2, 'msg' => '请通过正常途径修改信息！'];
        // 获取ID
        $id = trim(Input::get('id'));
        // 进行验证
        $validator = Validator::make(['id' => $id], ['id' => 'required | integer | exists:user,id']);
        if( $validator->passes() )
        {
            if( false === User::destroy($id) )
            {
                $json_response = ['status' => 1, 'msg' => '数据删除失败！'];
            }
            else
            {
                $json_response = ['status' => 0, 'msg' => '删除用户信息成功！'];
            }
        }

        json_output($json_response);
    }
}