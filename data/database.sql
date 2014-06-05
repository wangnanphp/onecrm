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
DROP DATABASE IF EXISTS `onecrm`;
CREATE DATABASE `onecrm` CHARSET=UTF8;
USE onecrm;


-- -----------------------------------------------------------------------------
-- Table(1): `user`
-- Description: 用户信息表
--
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user`(
    `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,            -- 主键(ID)
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
-- Table(2): `department`
-- Description: 部门信息表
--
-- DROP TABLE IF EXISTS `department`;
-- CREATE TABLE `department`(
--     `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,     -- 主键(ID)
--     `pid` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,    -- 上级部门ID
--     `name` VARCHAR(60) not null default '',            -- 部门名称
--     `description` VARCHAR(255) not null default '',    -- 部门描述
--     PRIMARY KEY(`id`),
--     UNIQUE KEY(`name`)
-- ) ENGINE=MyISAM DEFAULT CHARSET=utf8;


-- -----------------------------------------------------------------------------
-- Table(2): `role`
-- Description: 角色信息表(此处对应部门)
--
DROP TABLE IF EXISTS `role`;
CREATE TABLE `role`(
    `id` MEDIUMINT(8) UNSIGNED NOT NULL AUTO_INCREMENT,    -- 主键(ID)
    `pid` MEDIUMINT(8) UNSIGNED NOT NULL 0,                -- 上级角色ID
    `name` VARCHAR(60) not null default '',                -- 角色名
    `description` VARCHAR(255) not null default '',        -- 角色描述
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
    `name` VARCHAR(60) not null default '',                -- 权限名
    `controller` VARCHAR(30) NOT NULL DEFAULT '',          -- 控制器名
    `method` VARCHAR(30) NOT NULL DEFAULT '',              -- 方法名
    `description` VARCHAR(255) not null default '',        -- 权限描述
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
-- Table(6) `regcode_type`
-- Description 注册码类别信息表
--
DROP TABLE IF EXISTS `regcode_type`;
CREATE TABLE `regcode_type` (
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
-- Table(7) `regcode_platform`
-- Description 注册码使用平台信息表
--
DROP TABLE IF EXISTS `regcode_platform`;
CREATE TABLE `regcode_platform` (
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
-- Table(8) `regcode_sell_mall`
-- Description 注册码销售平台信息表
--
DROP TABLE IF EXISTS `regcode_sell_mall`;
CREATE TABLE `regcode_sell_mall` (
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
-- Table(8) `regcode`
-- Description 注册码信息表
--
DROP TABLE IF EXISTS `regcode`;
CREATE TABLE `regcode` (
    `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,             -- 主键
    `number` VARCHAR(100) NOT NULL DEFAULT '',                 -- 注册码
    `value` DECIMAL(10,2)  NOT NULL DEFAULT 0,                 -- 价值
    `type_id` MEDIUMINT(8) NOT NULL DEFAULT 0,                 -- FK-类别ID
    `type_name` VARCHAR(50) NOT NULL DEFAULT '',               -- 类别名
    `platform_id` MEDIUMINT(8) NOT NULL DEFAULT 1,             -- FK-使用平台ID
    `platform_name` VARCHAR(50) NOT NULL DEFAULT '',           -- 使用平台名称
    `add_user_id` MEDIUMINT(8) UNSIGNED NOT NULL DEFAULT 0,    -- FK-添加用户ID
    `add_time` INT(10) UNSIGNED NOT NULL DEFAULT 0,            -- 添加时间
    `allow` TINYINT(1) UNSIGNED NOT NULL DEFAULT '1',          -- 是否开放销售
    `used` TINYINT(1) UNSIGNED NOT NULL DEFAULT 0,             -- FK-销售表ID
    `del` TINYINT(1) UNSIGNED NOT NULL DEFAULT 0,              -- 是否被删除
    `remark` VARCHAR(255) NOT NULL DEFAULT '',                 -- 备注
    PRIMARY KEY (`id`),
    UNIQUE KEY (`number`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


-- -----------------------------------------------------------------------------
-- Table(9) `regcode_sell`
-- Description 注册码销售表
--
DROP TABLE IF EXISTS `regcode_sell`;
CREATE TABLE `regcode` (
    `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,             -- 主键
    `regcode_id` INT(10) NOT NULL DEFAULT '',                  -- FK-注册码ID
    `get_user_id` MEDIUMINT(8) UNSIGNED NOT NULL DEFAULT 0,    -- FK-领取用户ID
    `get_time` INT(10) UNSIGNED NOT NULL DEFAULT 0,            -- 领取时间
    `buyer_name` VARCHAR(30) NOT NULL DEFAULT '',              -- 购买者姓名
    `buyer_ww` VARCHAR(20) NOT NULL DEFAULT '',                -- 购买者旺旺
    `buyer_qq` VARCHAR(20) NOT NULL DEFAULT '',                -- 购买者QQ
    `buyer_phone` VARCHAR(11) NOT NULL DEFAULT '',             -- 购买者电话
    `sell_mall_id` MEDIUMINT(8) NOT NULL DEFAULT 1,            -- FK-销售平台ID
    `sell_mall_name` VARCHAR(50) NOT NULL DEFAULT '',          -- 销售平台名称
    `remark` VARCHAR(255) NOT NULL DEFAULT '',                 -- 备注
    PRIMARY KEY (`id`),
    UNIQUE KEY (`regcode_numbe`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;