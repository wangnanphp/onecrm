<?php

class UserController extends BaseController {

    /**
     * 获取用户列表
     * @return [type] [description]
     */
    public function getUserList()
    {
        // 视图数据
        $viewData = array();
        // 获取用户信息并分页显示
        $viewData['users'] = User::orderBy('id')->paginate(5);

        // 获取所有角色信息
        $viewData['roles'] = with(new Role)->getAllRoles();

        $viewData['modal_title'] = '用户部门设置';
        return View::make('users.userList')->with($viewData);
    }


    /**
     * 添加用户页面
     * @return [type] [description]
     */
    public function getUserAdd()
    {
        return View::make('users.userAdd');
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
            'idcards.unique'       => '身份证号码重复！',
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
            $idcards_image = Input::file('idcards_image');
            $user->idcards_image = time();
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
        $user->nickname    = $user->nickname;
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
            return View::make('publics/pageSuccess')->with(['url' => '/user/add-user', 'successMsg' =>'添加新用户成功！']);
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


    /**
     * 删除用户信息
     * @return JSON [description]
     */
    public function postUserDelete()
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


    /**
     * 修改用户信息显示页面
     */
    public function getUserModify()
    {
        $id = Input::get('id');

        // 验证ID
        $validator = Validator::make(['id' => $id], ['id' => 'required | integer | exists:user,id']);
        // 验证通过
        if( $validator->passes() )
        {
            $user = User::find($id);
            // 如果有身份证上传，则整理路径
            if( $user->idcards_image )
            {
                $user->idcards_image = '../app/storage/uploades/idcards/' . $user->idcards_image;
            }

            return View::make('users.userModify')->with('user', $user);
        }
        else
        {
            $viewData = ['title' => '修改用户信息失败！', 'errorMsg' => ['查询用户数据失败！']];
            return View::make('publics.pageError')->with($viewData);
        }
    }


    /**
     * 用户信息修改处理
     * @return [type]
     */
    public function postUserModify()
    {
        // 获取表单数据
        $inputs = array_trim(Input::all(), ['password', 'password_confirmation']);

        // 验证规则
        $rules = array(
            'id'          => 'required | exists:user,id',
            'login_email' => 'required | email | exists:user,login_email',
            'password'    => 'min:6 | confirmed:repassword',
            'idcards'     => 'unique:user',
        );
        // 验证提示消息
        $messages = array(
            'id.required'          => '请选择要修改的用户！',
            'id:exists'            => '用户信息不存在！',
            'login_email.required' => '登陆邮箱不能为空！',
            'login_email.email'    => '登陆邮箱地址不正确！',
            'login_email.exists'   => '登陆邮箱不能修改！',
            'password.min'         => '密码长度不能少于6位！',
            'password.confirmed'   => '两次输入密码不一致！',
            'idcards.unique'       => '身份证号码重复！',
        );
        // 进行验证
        $validator = Validator::make($inputs, $rules, $messages);
        if( $validator->fails() )
        {
            $viewData = ['title' => '修改用户信息失败！', 'errorMsg' => $validator->messages()->all()];
            return View::make('publics.pageError')->with($viewData);
        }
        else    // 数据验证通过
        {
            // 获取ORM
            $user = User::find($inputs['id']);

            // 身份证图片上传
            if( Input::hasFile('idcards_image') )
            {
                $idcards_image = Input::file('idcards_image');
                $user->idcards_image = time();
                if( $inputs['idcards'] )
                {
                    $user->idcards_image = $inputs['idcards'];
                }
                $user->idcards_image = $user->idcards_image . '.' . $idcards_image->getClientOriginalExtension();
                $idcards_image->move(storage_path() . '/uploades/idcards/', $user->idcards_image);
            }

            // 对象赋值
            $user->nickname = $user->nickname;
            if( $inputs['password'] )    // 密码
            {
                $user->password = Hash::make($inputs['password']);
            }
            $user->realname = $inputs['realname'];
            $user->idcards  = $inputs['idcards'];
            // 是否在职
            $user->work = 0;
            if( ! isset($inputs['work']) || 'on' != $inputs['work'] )
            {
                $user->work = 1;
            }
            // 是否锁定
            $user->status = 0;
            if( ! isset($inputs['status']) || 'on' != $inputs['status'])
            {
                $user->status = 1;
            }

            if( false === $user->save() )    // 修改失败
            {
                $viewData = ['title' => '修改用户信息失败！', 'errorMsg' => ['数据库操作失败！']];
                return View::make('publics.pageError')->with($viewData);
            }
            else    // 修改成功
            {
                $viewData = ['url' => '/user/user-list', 'successMsg' => '用户信息修改成功！'];
                return View::make('publics.pageSuccess')->with($viewData);
            }
        }
    }


    /**
     * 查看用户信息
     * @return [type]
     */
    public function getUserInfo()
    {
        $id = Input::get('id');

        // 验证ID
        $validator = Validator::make(['id' => $id], ['id' => 'required | integer | exists:user,id']);
        // 验证通过
        if( $validator->passes() )
        {
            $user = User::find($id);
            // 如果有身份证上传，则整理路径
            if( $user->idcards_image )
            {
                $user->idcards_image = '../app/storage/uploades/idcards/' . $user->idcards_image;
            }

            return View::make('users.userInfo')->with('user', $user);
        }
        else
        {
            $viewData = ['title' => '查看用户信息失败！', 'errorMsg' => ['查询用户数据失败！']];
            return View::make('publics.pageError')->with($viewData);
        }
    }


    /**
     * 获取用户角色信息
     * @return JSON [description]
     */
    public function postUserRole()
    {
        $responseJson = ['status' => -1, 'msg' => '未知错误！'];

        // 获取用户ID
        $userId = Input::get('id');
        // 验证ID
        $validator = Validator::make(['id' => $userId], ['id' => 'required | integer | exists:user,id']);
        if( $validator->passes() )    // 验证通过
        {
            // 获取用户当前拥有的角色ID
            $userRoleIds = UserRole::where('user_id', '=', $userId)->lists('role_id');
            $userRoleIds = empty($userRoleIds) ? '' : $userRoleIds;
            $responseJson = ['status' => 0, 'user_role' => $userRoleIds];
        }
        else
        {
            $responseJson = ['status' => 2, 'errorMsg' => '请通过正常途径！'];
        }

        json_output($responseJson);
    }


    /**
     * 修改用户角色信息
     * @return JSON [description]
     */
    public function postUserRoleEdit()
    {
        $reponseJson = ['status' => -1, 'msg' => '未知错误！'];
        $userId  = Input::get('userId');
        $roleIds = Input::get('roleIds');
        // V($userId, $roleIds);

        // 验证ID
        $validator = Validator::make(['userId' => $userId], ['userId' => 'required | integer | exists:user,id']);
        // 验证通过
        if( $validator->passes() )
        {
            // 获取用户当前拥有的角色ID
            $userRoleIds = UserRole::where('user_id', '=', $userId)->lists('role_id');
            // V($userRoleIds);
            // 去重
            $userAddRoleIds = array_diff($roleIds, $userRoleIds);
            $userDelRoleIds = array_diff($userRoleIds, $roleIds);

            // 整理要插入的数据
            foreach ($userAddRoleIds as $aValue) {
                $dataInsert[] = ['role_id' => $aValue, 'user_id' => $userId];
            }
            // foreach ($userDelRoleIds as $dValue) {
            //     $dataDelete[] = ['role_id' => $dValue, 'user_id' => $userId];
            // }
            // V($userAddRoleIds, $dataInsert, $userDelRoleIds);die;

            // 删除取消掉的角色
            empty($userDelRoleIds) || UserRole::whereIn('role_id', $userDelRoleIds)
                ->where('user_id', $userId)->delete();
            // 插入新增的角色数据
            $add = true;
            empty($dataInsert) || $add = DB::table('user_role')->insert($dataInsert);
            if( true === $add )
            {
                $responseJson = ['status' => 0, 'msg' => '用户角色修改成功！'];
            }
            else
            {
                $responseJson = ['status' => 1, 'msg' => '修改数据失败！'];
            }
        }
        else
        {
            $responseJson = ['status' => 2, 'msg' => '请通过正常途径！'];
        }

        json_output($responseJson);
    }
}
