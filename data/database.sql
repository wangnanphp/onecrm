-- -----------------------------------------------------------------------------
--
-- FileName: database.sql
-- Description: onecrm 系统数据库源码
-- Database: MySQL5.6.17
-- DatabaseName: `onecrm`
-- Charset: utf-8
-- TablePrefix:
-- Author: WangNan
-- Verison: 0.1
-- Since: 2014-06-03 15:26:00
-- Alter Date:
--
-- -----------------------------------------------------------------------------


-- -----------------------------------------------------------------------------
-- Database: `onecrm`
-- Description: 系统数据库创建
-- -----------------------------------------------------------------------------
-- DROP DATABASE IF EXISTS `onecrm`;
-- CREATE DATABASE `onecrm` CHARSET=UTF8;
USE onecrm;


-- -----------------------------------------------------------------------------
-- Table(1): `user`
-- Description: 用户信息表
--
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user`(
    `id` MEDIUMINT(10) UNSIGNED NOT NULL AUTO_INCREMENT,      -- 主键(ID)
    `login_email` VARCHAR(60) NOT NULL DEFAULT '',            -- 登录E-mail
    `login_name` VARCHAR(60) NOT NULL DEFAULT '',             -- 登录名
    `password` CHAR(64) NOT NULL DEFAULT '',                  -- 密码
    `realname` VARCHAR(30) NOT NULL DEFAULT '',               -- 真实姓名
    `nickname` VARCHAR(30) NOT NULL DEFAULT '',               -- 昵称
    `login_num` INT(10) UNSIGNED NOT NULL DEFAULT 0,          -- 登录总次数
    `add_time` INT(10) UNSIGNED NOT NULL DEFAULT 0,           -- 添加时间
    `last_login_time` INT(10) UNSIGNED NOT NULL DEFAULT 0,    -- 最后登录时间
    `last_login_ip` CHAR(15) NOT NULL DEFAULT '',             -- 最后登录IP
    `sex` TINYINT(1) UNSIGNED NOT NULL DEFAULT 0,             -- 性别
    `photo` VARCHAR(255) NOT NULL DEFAULT '',                 -- 照片
    `idcards` CHAR(18) NOT NULL DEFAULT '',                   -- 身份证号
    `idcards_image` VARCHAR(255) NOT NULL DEFAULT '',         -- 身份证照片
    `nation` VARCHAR(30) NOT NULL DEFAULT '',                 -- 民族
    `birthday` DATE NOT NULL DEFAULT '0000-00-00',            -- 生日
    `address` VARCHAR(255) NOT NULL DEFAULT '',               -- 居住地址
    `home_address` VARCHAR(255) NOT NULL DEFAULT '',          -- 家庭住址
    `graduated` VARCHAR(255) NOT NULL DEFAULT '',             -- 毕业院校
    `specialty` VARCHAR(255) NOT NULL DEFAULT '',             -- 所学专业
    `phone` CHAR(11) NOT NULL DEFAULT '',                     -- 电话
    `relation_phone` CHAR(11) NOT NULL DEFAULT '',            -- 亲属电话
    `qq` VARCHAR(20) NOT NULL DEFAULT '',                     -- QQ
    `ww` VARCHAR(20) NOT NULL DEFAULT '',                     -- 旺旺
    `work` TINYINT(1) UNSIGNED NOT NULL DEFAULT 0,            -- 工作(0在职,1离职)
    `status` TINYINT(1) UNSIGNED NOT NULL DEFAULT 0,          -- 状态(0正常,1锁定)
    PRIMARY KEY(`id`),
    UNIQUE KEY(`login_email`),
    UNIQUE KEY(`login_name`),
    UNIQUE KEY(`nickname`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


-- -----------------------------------------------------------------------------
-- Table(2): `role`
-- Description: 角色信息表(此处对应部门)
--
DROP TABLE IF EXISTS `role`;
CREATE TABLE `role`(
    `id` MEDIUMINT(8) UNSIGNED NOT NULL AUTO_INCREMENT,    -- 主键(ID)
    `pid` MEDIUMINT(8) UNSIGNED NOT NULL DEFAULT 0,        -- 上级角色ID
    `name` VARCHAR(60) NOT NULL DEFAULT '',                -- 角色名
    `description` VARCHAR(255) NOT NULL DEFAULT '',        -- 角色描述
    PRIMARY KEY(`id`),
    UNIQUE KEY(`name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


-- -----------------------------------------------------------------------------
-- Table(3): `permission`
-- Description: 权限信息表
--
DROP TABLE IF EXISTS `permission`;
CREATE TABLE `permission`(
    `id` MEDIUMINT(8) UNSIGNED NOT NULL AUTO_INCREMENT,    -- 主键(ID)
    `name` VARCHAR(60) NOT NULL DEFAULT '',                -- 权限名
    `controller` VARCHAR(30) NOT NULL DEFAULT '',          -- 控制器名
    `method` VARCHAR(30) NOT NULL DEFAULT '',              -- 方法名
    `description` VARCHAR(255) NOT NULL DEFAULT '',        -- 权限描述
    PRIMARY KEY(`id`),
    UNIQUE KEY(`name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


-- -----------------------------------------------------------------------------
-- Table(4): `user_role`
-- Description: 用户角色关系表
--
DROP TABLE IF EXISTS `user_role`;
CREATE TABLE `user_role`(
    `id` MEDIUMINT(8) UNSIGNED NOT NULL AUTO_INCREMENT,    -- 主键(ID)
    `user_id` MEDIUMINT(8) UNSIGNED NOT NULL DEFAULT 0,    -- FK-用户ID
    `role_id` MEDIUMINT(8) UNSIGNED NOT NULL DEFAULT 0,    -- FK-角色ID
    PRIMARY KEY(`id`),
    UNIQUE KEY(`user_id`,`role_id`),
    KEY(`user_id`),
    KEY(`role_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


-- -----------------------------------------------------------------------------
-- Table(5): `role_permission`
-- Description: 角色权限关系表
--
DROP TABLE IF EXISTS `role_permission`;
CREATE TABLE `role_permission`(
    `id` MEDIUMINT(8) UNSIGNED NOT NULL AUTO_INCREMENT,          -- 主键(ID)
    `role_id` MEDIUMINT(8) UNSIGNED NOT NULL DEFAULT 0,          -- FK-角色ID
    `permission_id` MEDIUMINT(8) UNSIGNED NOT NULL DEFAULT 0,    -- FK-权限ID
    PRIMARY KEY(`id`),
    UNIQUE KEY(`role_id`,`permission_id`),
    KEY(`role_id`),
    KEY(`permission_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


-- -----------------------------------------------------------------------------
-- Table(6): `regcode_type`
-- Description: 注册码类别信息表
--
DROP TABLE IF EXISTS `regcode_type`;
CREATE TABLE `regcode_type` (
    `id` MEDIUMINT(8) UNSIGNED NOT NULL AUTO_INCREMENT,    -- 主键(ID)
    `name` VARCHAR(50) NOT NULL DEFAULT '',                -- 类别名称
    `user_id` MEDIUMINT(8) UNSIGNED NOT NULL DEFAULT 0,    -- FK-添加用户ID
    `created_at` INT(10) UNSIGNED NOT NULL DEFAULT 0,      -- 添加时间
    `updated_at` INT(10) UNSIGNED NOT NULL DEFAULT 0,      -- 修改时间
    `deleted_at` INT(10) UNSIGNED NOT NULL DEFAULT 0,      -- 软删除
    `remark` VARCHAR(100) NOT NULL DEFAULT '',             -- 备注
    PRIMARY KEY (`id`),
    UNIQUE KEY (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


-- -----------------------------------------------------------------------------
-- Table(7) `regcode_terminal`
-- Description 注册码使用终端信息表
--
DROP TABLE IF EXISTS `regcode_platform`;
CREATE TABLE `regcode_platform` (
    `id` MEDIUMINT(8) UNSIGNED NOT NULL AUTO_INCREMENT,        -- 主键
    `name` VARCHAR(50) NOT NULL DEFAULT '',                    -- 类别名称
    `add_user_id` MEDIUMINT(8) UNSIGNED NOT NULL DEFAULT 0,    -- FK-添加用户ID
    `created_at` INT(10) UNSIGNED NOT NULL DEFAULT 0,          -- 添加时间
    `updated_at` INT(10) UNSIGNED NOT NULL DEFAULT 0,          -- 修改时间
    `deleted_at` INT(10) UNSIGNED NOT NULL DEFAULT 0,          -- 软删除
    `remark` VARCHAR(255) NOT NULL DEFAULT '',                 -- 备注
    PRIMARY KEY (`id`),
    UNIQUE KEY (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


-- -----------------------------------------------------------------------------
-- Table(8) `system_platform`
-- Description 销售平台信息表
--
DROP TABLE IF EXISTS `system_platform`;
CREATE TABLE `system_platform` (
    `id` MEDIUMINT(8) UNSIGNED NOT NULL AUTO_INCREMENT,        -- 主键
    `name` VARCHAR(50) NOT NULL DEFAULT '',                    -- 类别名称
    `add_user_id` MEDIUMINT(8) UNSIGNED NOT NULL DEFAULT 0,    -- FK-添加用户ID
    `add_time` INT(10) UNSIGNED NOT NULL DEFAULT 0,            -- 添加时间
    `del` TINYINT(1) UNSIGNED NOT NULL DEFAULT 0,              -- 是否被删除
    `remark` VARCHAR(255) NOT NULL DEFAULT '',                 -- 备注
    PRIMARY KEY (`id`),
    UNIQUE KEY (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


-- -----------------------------------------------------------------------------
-- Table(9) `regcode`
-- Description 注册码信息表
--
DROP TABLE IF EXISTS `regcode`;
CREATE TABLE `regcode` (
<<<<<<< HEAD
    `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,             -- 主键
    `number` VARCHAR(100) NOT NULL DEFAULT '',                 -- 注册码
    `value` DECIMAL(10,2)  NOT NULL DEFAULT 0,                 -- 价值
    `type_id` MEDIUMINT(8) NOT NULL DEFAULT 0,                 -- FK-类别ID
    `type_name` VARCHAR(50) NOT NULL DEFAULT '',               -- 类别名
    `regcode_terminal_id` MEDIUMINT(8) NOT NULL DEFAULT 1,     -- FK-使用平台ID
    `regcode_terminal_name` VARCHAR(50) NOT NULL DEFAULT '',   -- 使用平台名称
    `user_id` MEDIUMINT(8) UNSIGNED NOT NULL DEFAULT 0,        -- FK-添加用户ID
    `allow` TINYINT(1) UNSIGNED NOT NULL DEFAULT '1',          -- 是否开放销售
    `used` TINYINT(1) UNSIGNED NOT NULL DEFAULT 0,             -- FK-销售表ID
    `created_at` INT(10) UNSIGNED NOT NULL DEFAULT 0,          -- 添加时间
    `updated_at` INT(10) UNSIGNED NOT NULL DEFAULT 0,          -- 修改时间
    `deleted_at` INT(10) UNSIGNED NOT NULL DEFAULT 0,          -- 软删除
    `remark` VARCHAR(255) NOT NULL DEFAULT '',                 -- 备注
=======
    `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,              -- 主键
    `user_id` MEDIUMINT(8) UNSIGNED NOT NULL DEFAULT 0,         -- FK-添加用户ID
    `type_id` MEDIUMINT(8) NOT NULL DEFAULT 0,                  -- FK-类别ID
    `regcode_terminal_id` MEDIUMINT(8) NOT NULL DEFAULT 1,      -- FK-使用平台ID
    `user_realname` VARCHAR(30) NOT NULL DEFAULT '',            -- 添加者姓名
    `type_name` VARCHAR(50) NOT NULL DEFAULT '',                -- 类别名
    `regcode_terminal_name` VARCHAR(50) NOT NULL DEFAULT '',    -- 使用平台名称
    `number` VARCHAR(100) NOT NULL DEFAULT '',                  -- 注册码号
    `value` DECIMAL(10,2)  NOT NULL DEFAULT 0,                  -- 价值
    `allow_sell` TINYINT(1) UNSIGNED NOT NULL DEFAULT '1',      -- 是否开放销售
    `regcode_sell_id` INT(10) UNSIGNED NOT NULL DEFAULT 0,      -- FK-是否销售ID
    `created_at` INT(10) UNSIGNED NOT NULL DEFAULT 0,           -- 添加时间
    `updated_at` INT(10) UNSIGNED NOT NULL DEFAULT 0,           -- 修改时间
    `deleted_at` INT(10) UNSIGNED NOT NULL DEFAULT 0,           -- 软删除
>>>>>>> 5032d4b2e3992277719c6f833cb5a62fa5c53cc4
    PRIMARY KEY (`id`),
    UNIQUE KEY (`number`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


-- -----------------------------------------------------------------------------
-- Table(10): `regcode_sell`
-- Description: 注册码销售表
--
DROP TABLE IF EXISTS `regcode_sell`;
CREATE TABLE `regcode_sell` (
    `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,             -- 主键
    `regcode_id` INT(10) NOT NULL DEFAULT 0,                   -- FK-注册码ID
    `get_user_id` MEDIUMINT(8) UNSIGNED NOT NULL DEFAULT 0,    -- FK-领取用户ID
    `get_time` INT(10) UNSIGNED NOT NULL DEFAULT 0,            -- 领取时间
    `buyer_name` VARCHAR(30) NOT NULL DEFAULT '',              -- 购买者姓名
    `buyer_ww` VARCHAR(20) NOT NULL DEFAULT '',                -- 购买者旺旺
    `buyer_qq` VARCHAR(20) NOT NULL DEFAULT '',                -- 购买者QQ
    `buyer_phone` VARCHAR(11) NOT NULL DEFAULT '',             -- 购买者电话
    `system_platform_id` MEDIUMINT(8) NOT NULL DEFAULT 1,      -- FK-销售平台ID
    `system_platform_name` VARCHAR(50) NOT NULL DEFAULT '',    -- 销售平台名称
    `remark` VARCHAR(255) NOT NULL DEFAULT '',                 -- 备注
    PRIMARY KEY (`id`),
    UNIQUE KEY (`regcode_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


-- -----------------------------------------------------------------------------
-- Table(11): `goods`
-- Description: 商品信息表
--
DROP TABLE IF EXISTS `goods`;
CREATE TABLE `goods` (
    `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,              -- 主键(ID)
    `user_id` MEDIUMINT(8) UNSIGNED NOT NULL DEFAULT 0,         -- FK-添加者ID
    `user_realname` VARCHAR(30) NOT NULL DEFAULT '',            -- 添加者姓名
    `goods_type_id` MEDIUMINT(8) UNSIGNED NOT NULL DEFAULT 0,   -- FK-商品类型ID
    `goods_type_name` VARCHAR(60) NOT NULL DEFAULT '',          -- 商品类型名称
    `name` VARCHAR(100) NOT NULL DEFAULT '',                    -- 商品名称
    `brand` VARCHAR(60) NOT NULL DEFAULT '',                    -- 品牌
    `cost_price` DECIMAL(10,2) NOT NULL DEFAULT 0,              -- 成本价
    `sales_price` DECIMAL(10,2) NOT NULL DEFAULT 0,             -- 销售价格
    `origin` VARCHAR(60) NOT NULL DEFAULT '',                   -- 商品的来源
    `manufacture` VARCHAR(60) NOT NULL DEFAULT '',              -- 生产商
    `create_at` INT(10) UNSIGNED NOT NULL DEFAULT 0,            -- 创建时间
    `update_at` INT(10) UNSIGNED NOT NULL DEFAULT 0,            -- 修改时间
    `deleted_at` INT(10) UNSIGNED NOT NULL DEFAULT 0,           -- 软删除
    `remark` VARCHAR(255) NOT NULL DEFAULT '',                  -- 备注
    `status` TINYINT(1) UNSIGNED NOT NULL DEFAULT 0,            -- 状态
    PRIMARY KEY (`id`),
    UNIQUE KEY(`name`),
    KEY(`goods_type_id`),
    KEY(`cost_price`),
    KEY(`sales_price`),
    KEY(`brand`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


-- -----------------------------------------------------------------------------
-- Table(12) `goods_type`
-- Description 商品类型表
--
DROP TABLE IF EXISTS `goods_type`;
CREATE TABLE `goods_type` (
    `id` MEDIUMINT(8) UNSIGNED NOT NULL AUTO_INCREMENT,    -- 主键(ID)
    `user_id` MEDIUMINT(8) UNSIGNED NOT NULL DEFAULT 0,    -- FK-添加商品者ID
    `user_realname` VARCHAR(30) NOT NULL DEFAULT '',       -- 添加者姓名
    `pid` MEDIUMINT(8) UNSIGNED NOT NULL DEFAULT 0,        -- 父类型ID
    `name` VARCHAR(60) NOT NULL DEFAULT '',                -- 类型名称
    `path` VARCHAR(255) NOT NULL DEFAULT '',               -- 类型路径
    `dscription` VARCHAR(255) NOT NULL DEFAULT '',         -- 描述
    `create_at` INT(10) UNSIGNED NOT NULL DEFAULT 0,       -- 创建时间
    `update_at` INT(10) UNSIGNED NOT NULL DEFAULT 0,       -- 修改时间
    `deleted_at` INT(10) UNSIGNED NOT NULL DEFAULT 0,      -- 软删除
    `status` TINYINT(1) UNSIGNED NOT NULL DEFAULT 0,       -- 状态
    PRIMARY KEY (`id`),
    UNIQUE KEY(`name`),
    KEY(`pid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


-- -----------------------------------------------------------------------------
-- Table(13) `goods_stock`
-- Description 商品库存表
--
DROP TABLE IF EXISTS `goods_stock`;
CREATE TABLE `goods_stock` (
    `id` INT(8) UNSIGNED NOT NULL AUTO_INCREMENT,               -- 主键(ID)
    `goods_id` INT(8) UNSIGNED NOT NULL DEFAULT 0,              -- FK-商品表ID
    `goods_name` VARCHAR(100) NOT NULL DEFAULT '',              -- 商品名称
    `user_id` MEDIUMINT(10) UNSIGNED NOT NULL DEFAULT 0,        -- FK-添加商品者ID
    `user_realname` VARCHAR(30) NOT NULL DEFAULT '',            -- 添加者姓名
    `goods_type_id` MEDIUMINT(8) UNSIGNED NOT NULL DEFAULT 0,   -- FK-商品类型ID
    `goods_type_name` VARCHAR(60) NOT NULL DEFAULT '',          -- 类型名称
    `number` MEDIUMINT(10) UNSIGNED NOT NULL DEFAULT 0,         -- 贮存数量
    `name` VARCHAR(10) NOT NULL DEFAULT 0,                      -- 贮存商品人
    `address` VARCHAR(10) NOT NULL DEFAULT 0,                   -- 贮存地址
    `time` INT(10) UNSIGNED NOT NULL DEFAULT 0,                 -- 贮存时间
    `create_at` INT(10) UNSIGNED NOT NULL DEFAULT 0,            -- 创建时间
    `update_at` INT(10) UNSIGNED NOT NULL DEFAULT 0,            -- 修改时间
    `deleted_at` INT(10) UNSIGNED NOT NULL DEFAULT 0,           -- 软删除
    `remarke` VARCHAR(255) NOT NULL DEFAULT '',                 -- 备注信息
    `status` TINYINT(1) UNSIGNED NOT NULL DEFAULT 0,            -- 状态
    PRIMARY KEY (`id`),
    KEY(`user_id`),
    KEY(`number`),
    KEY(`time`),
    KEY(`goods_name`),
    KEY(`user_realname`),
    KEY(`name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


-- -----------------------------------------------------------------------------
-- Table(14) `goods_sell`
-- Description 商品销售表
--
DROP TABLE IF EXISTS `goods_sell`;
CREATE TABLE `goods_sell` (
    `id` INT(8) UNSIGNED NOT NULL AUTO_INCREMENT,                      -- 主键(ID)
    `goods_id` INT(8) UNSIGNED NOT NULL DEFAULT 0,                     -- FK-商品表ID
    `goods_name` VARCHAR(100) NOT NULL DEFAULT '',                     -- 商品名称
    `user_id` MEDIUMINT(10) UNSIGNED NOT NULL DEFAULT 0,               -- FK-添加商品者ID
    `user_realname` VARCHAR(30) NOT NULL DEFAULT '',                   -- 添加者姓名
    `buyer_id` INT(8) UNSIGNED NOT NULL DEFAULT 0,                     -- FK-购买表ID
    `buyer_name` VARCHAR(10) NOT NULL DEFAULT '',                      -- 购买人姓名
    `goods_back_id` INT(8) UNSIGNED NOT NULL DEFAULT 0,                -- FK-商品退货ID
    `goods_barter_id` INT(8) UNSIGNED NOT NULL DEFAULT 0,              -- FK-商品换货ID
    `system_platform_id` MEDIUMINT(10) UNSIGNED NOT NULL DEFAULT 0,    -- FK-销售平台ID
    `system_platform_name` VARCHAR(50) NOT NULL DEFAULT '',            -- 销售平台名称
    `time` INT(10) UNSIGNED NOT NULL DEFAULT 0,                        -- 销售时间
    `unit_price` DECIMAL(10,2)  NOT NULL DEFAULT 0,                    -- 销售价格
    `number` MEDIUMINT(10) UNSIGNED NOT NULL DEFAULT 1,                -- 销售数量
    `order_number` VARCHAR(50) NOT NULL DEFAULT '',                    -- 订单号
    `brush` TINYINT(1) UNSIGNED NOT NULL DEFAULT 0,                    -- 是否是刷票
    `color` TINYINT(1) NOT NULL DEFAULT 0,                             -- 颜色
    `description` VARCHAR(100) NOT NULL DEFAULT '',                    -- 颜色的描述
    `create_at` INT(10) UNSIGNED NOT NULL DEFAULT 0,                   -- 创建时间
    `update_at` INT(10) UNSIGNED NOT NULL DEFAULT 0,                   -- 修改时间
    `deleted_at` INT(10) UNSIGNED NOT NULL DEFAULT 0,                  -- 软删除
    `remark` VARCHAR(255) NOT NULL DEFAULT '',                         -- 备注
    `status` TINYINT(1) UNSIGNED NOT NULL DEFAULT 0,                   -- 状态
    PRIMARY KEY (`id`),
    KEY(`user_id`),
    KEY(`buyer_id`),
    KEY(`goods_back_id`),
    KEY(`goods_barter_id`),
    KEY(`system_platform_id`),
    KEY(`goods_id`),
    KEY(`goods_name`),
    KEY(`time`),
    KEY(`order_number`),
    KEY(`unit_price`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


-- -----------------------------------------------------------------------------
-- Table(15) `goods_buyer`
-- Description 购买者表
--
DROP TABLE IF EXISTS `goods_buyer`;
CREATE TABLE `goods_buyer` (
    `id` MEDIUMINT(8) UNSIGNED NOT NULL AUTO_INCREMENT,          -- 主键(ID)
    `goods_id` INT(8) UNSIGNED NOT NULL DEFAULT 0,               -- FK-商品表ID
    `goods_name` VARCHAR(100) NOT NULL DEFAULT '',               -- 商品名称
    `user_id` MEDIUMINT(10) UNSIGNED NOT NULL DEFAULT 0,         -- FK-添加商品者ID
    `user_realname` VARCHAR(30) NOT NULL DEFAULT '',             -- 添加者姓名
    `goods_sell_id` INT(8) UNSIGNED NOT NULL DEFAULT 0,          -- FK-商品销售ID
    `goods_sell_order_number` VARCHAR(50) NOT NULL DEFAULT 0,    -- 销售商品的订单号
    `name` VARCHAR(10) NOT NULL DEFAULT '',                      -- 购买人姓名
    `phone` VARCHAR(11) NOT NULL DEFAULT '',                     -- 购买人手机号
    `delivery_time` INT(10) UNSIGNED NOT NULL DEFAULT 0,         -- 发货时间
    `qq` VARCHAR(20) NOT NULL DEFAULT '',                        -- QQ号码
    `ww` VARCHAR(20) NOT NULL DEFAULT '',                        -- 旺旺号码
    `express` VARCHAR(30) NOT NULL DEFAULT '',                   -- 快递
    `express_number` VARCHAR(60) NOT NULL DEFAULT '',            -- 快递单号
    `consignors` VARCHAR(255) NOT NULL DEFAULT '',               -- 发货人
    `city_id` MEDIUMINT(8) UNSIGNED NOT NULL  DEFAULT 0,         -- FK-城市结连表ID
    `city_level` MEDIUMINT(8) UNSIGNED NOT NULL  DEFAULT 0,      -- FK-城市结连父ID
    `city_upid` MEDIUMINT(8) UNSIGNED NOT NULL  DEFAULT 0,       -- FK-城市结连子ID
    `country` VARCHAR(10) NOT NULL DEFAULT '',                   -- 国家
    `province` VARCHAR(20) NOT NULL DEFAULT '',                  -- 省
    `county` VARCHAR(10) NOT NULL DEFAULT '',                    -- 县 （地区）
    `address` VARCHAR(200) NOT NULL DEFAULT '',                  -- 地址
    `create_at` INT(10) UNSIGNED NOT NULL DEFAULT 0,             -- 创建时间
    `update_at` INT(10) UNSIGNED NOT NULL DEFAULT 0,             -- 修改时间
    `deleted_at` INT(10) UNSIGNED NOT NULL DEFAULT 0,            -- 软删除
    `remark` VARCHAR(255) NOT NULL DEFAULT '',                   -- 备注
    `status` TINYINT(1) UNSIGNED NOT NULL DEFAULT 0,             -- 状态
    PRIMARY KEY (`id`),
    KEY(`qq`),
    KEY(`ww`),
    KEY(`city_id`),
    KEY(`city_level`),
    KEY(`city_upid`),
    KEY(`goods_sell_id`),
    KEY(`name`),
    KEY(`phone`),
    KEY(`delivery_time`),
    KEY(`express`),
    KEY(`consignors`),
    KEY(`express_number`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


-- -----------------------------------------------------------------------------
-- Table(16) `goods_back`
-- Description 商品退货表
--
DROP TABLE IF EXISTS `goods_back`;
CREATE TABLE `goods_back` (
    `id` INT(8) UNSIGNED NOT NULL AUTO_INCREMENT,                -- 主键(ID)
    `goods_sell_id` INT(8) UNSIGNED NOT NULL DEFAULT 0,          -- FK-商品销售ID
    `goods_sell_order_number` VARCHAR(50) NOT NULL DEFAULT 0,    -- 销售商品的订单号
    `goods_id` INT(8) UNSIGNED NOT NULL DEFAULT 0,               -- FK-商品表ID
    `goods_name` VARCHAR(100) NOT NULL DEFAULT '',               -- 退货商品名称
    `user_id` MEDIUMINT(10) UNSIGNED NOT NULL DEFAULT 0,         -- FK-添加商品者ID
    `user_realname` VARCHAR(30) NOT NULL DEFAULT '',             -- 添加者姓名
    `name` VARCHAR(12) NOT NULL DEFAULT '',                      -- 退货给人名
    `number` INT(10) UNSIGNED NOT NULL DEFAULT 1,                -- 退货数量
    `reason` VARCHAR(255) NOT NULL DEFAULT '',                   -- 退货原因
    `time` INT(10) UNSIGNED NOT NULL DEFAULT 0,                  -- 退货时间
    `handled` VARCHAR(60) NOT NULL DEFAULT '',                   -- 退货经办人
    `price` DECIMAL(10,2) NOT NULL DEFAULT 0,                    -- 退还价格
    `create_at` INT(10) UNSIGNED NOT NULL DEFAULT 0,             -- 创建时间
    `update_at` INT(10) UNSIGNED NOT NULL DEFAULT 0,             -- 修改时间
    `deleted_at` INT(10) UNSIGNED NOT NULL DEFAULT 0,            -- 软删除
    `remarke` VARCHAR(255) NOT NULL DEFAULT '',                  -- 备注信息
    `status` TINYINT(2) UNSIGNED NOT NULL DEFAULT 0,             -- 状态
    PRIMARY KEY (`id`),
    UNIQUE KEY (`goods_sell_id`),
    KEY(`user_id`),
    KEY(`goods_id`),
    KEY(`goods_name`),
    KEY(`goods_sell_order_number`),
    KEY(`time`),
    KEY(`handled`),
    KEY(`name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


-- -----------------------------------------------------------------------------
-- Table(17) `goods_barter`
-- Description 商品换货表
--
DROP TABLE IF EXISTS `goods_barter`;
CREATE TABLE `goods_barter` (
    `id` INT(8) UNSIGNED NOT NULL AUTO_INCREMENT,                 -- 主键(ID)
    `goods_sell_id` INT(8) UNSIGNED NOT NULL DEFAULT 0,           -- FK-商品销售ID
    `goods_sell_order_number` VARCHAR(50) NOT NULL DEFAULT 0,     -- 销售商品的订单号
    `barter_sell_id` INT(8) UNSIGNED NOT NULL DEFAULT 0,          -- FK-换给货物的ID
    `barter_sell_order_number` VARCHAR(50) NOT NULL DEFAULT 0,    -- 换货商品的订单号
    `goods_id` INT(8) UNSIGNED NOT NULL DEFAULT 0,                -- FK-商品表ID
    `goods_name` VARCHAR(100) NOT NULL DEFAULT '',                -- 换货商品名称
    `user_id` MEDIUMINT(10) UNSIGNED NOT NULL DEFAULT 0,          -- FK-添加商品者ID
    `user_realname` VARCHAR(30) NOT NULL DEFAULT '',              -- 添加者姓名
    `name` VARCHAR(12) NOT NULL DEFAULT '',                       -- 换货给人名
    `number` INT(10) UNSIGNED NOT NULL DEFAULT 1,                 -- 换货数量
    `season` VARCHAR(255) NOT NULL DEFAULT '',                    -- 换货理由
    `time` INT(10) UNSIGNED NOT NULL DEFAULT 0,                   -- 换货时间
    `handled` VARCHAR(60) NOT NULL DEFAULT '',                    -- 换货经办人
    `create_at` INT(10) UNSIGNED NOT NULL DEFAULT 0,              -- 创建时间
    `update_at` INT(10) UNSIGNED NOT NULL DEFAULT 0,              -- 修改时间
    `deleted_at` INT(10) UNSIGNED NOT NULL DEFAULT 0,             -- 软删除
    `remarke` VARCHAR(255) NOT NULL DEFAULT '',                   -- 备注信息
    `status` TINYINT(1) UNSIGNED NOT NULL DEFAULT 0,              -- 状态
    PRIMARY KEY (`id`),
    UNIQUE KEY (`goods_sell_id`),
    UNIQUE KEY (`barter_sell_id`),
    KEY(`user_id`),
    KEY(`goods_id`),
    KEY(`goods_name`),
    KEY(`time`),
    KEY(`handled`),
    KEY(`goods_sell_order_number`),
    KEY(`barter_sell_order_number`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;