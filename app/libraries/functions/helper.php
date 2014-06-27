<?php

if( ! function_exists('P') )
{
    /**
     * P 函数
     * @param  [type] $data [description]
     * @return [type]       [description]
     */
    function P($data)
    {
        echo '<pre>';
        print_r($data);
        echo '</pre>';
    }
}


if( ! function_exists('V') )
{
    function V($data)
    {
        var_dump($data);
    }
}


if( ! function_exists('json_output') )
{
    /**
     * ajax JSON输出，并终止程序执行
     *
     * @param  array  $data 需要JSON输出的数据
     *
     * @return json 直接输出JSON格式的内容
     */
    function json_output($data)
    {
        header('Content-Type: application/json');
        echo json_encode($data);
        die;
    }
}


if( ! function_exists('array_trim') )
{
    /**
     * 去除数组中元素的两边空白符
     * @param  mixed $data     需要去除两边空白的数组或字符串
     * @param  array $exclude  需要排除的元素键值
     * @return array           处理好的数组
     */
    function array_trim($data, $exclude = array())
    {
        if( is_array($data) )
        {
            foreach($data as $k => &$v)
            {
                if( ! in_array($k, $exclude) )  // 排除制定键值的元素
                {
                    $v = trim($v);
                }
            }
        }
        elseif( is_string($data) )
        {
            $data = trim($data);
        }

        return $data;
    }
}