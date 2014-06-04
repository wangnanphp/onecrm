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
    `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,          -- 主键(ID)
    `loginemail` VARCHAR(60) NOT NULL DEFAULT '',           -- 登录E-mail
    `loginname` VARCHAR(60) NOT NULL DEFAULT '',            -- 登录名
    `password` CHAR(64) NOT NULL DEFAULT '',                -- 密码
    `realname` VARCHAR(30) NOT NULL DEFAULT '',             -- 真实姓名
    `nickname` VARCHAR(30) NOT NULL DEFAULT '',             -- 昵称
    `lastlogintime` INT(10) NOT NULL DEFAULT '0',           -- 最后登录时间
    `lastloginip` CHAR(15) NOT NULL DEFAULT '',             -- 最后登录IP
    `loginnum` INT(10) UNSIGNED NOT NULL DEFAULT '0',       -- 登录总次数
    `addtime` INT(10) UNSIGNED NOT NULL DEFAULT '0',        -- 添加时间
    `sex` TINYINT(1) UNSIGNED NOT NULL DEFAULT '0',         -- 性别
    `photo` VARCHAR(255) NOT NULL DEFAULT '',               -- 照片
    `idcards` CHAR(18) NOT NULL DEFAULT '',                 -- 身份证号
    `idcardsimage` VARCHAR(255) NOT NULL DEFAULT '',        -- 身份证照片
    `nation` VARCHAR(30) NOT NULL DEFAULT '',               -- 民族
    `birthday` date NOT NULL DEFAULT '0000-00-00',          -- 生日
    `address` VARCHAR(255) NOT NULL DEFAULT '',             -- 居住地址
    `homeaddress` VARCHAR(255) NOT NULL DEFAULT '',         -- 家庭住址
    `graduated` VARCHAR(255) NOT NULL DEFAULT '',           -- 毕业院校
    `specialty` VARCHAR(255) NOT NULL DEFAULT '',           -- 所学专业
    `phone` CHAR(11) NOT NULL DEFAULT '',                   -- 电话
    `relationphone` CHAR(11) NOT NULL DEFAULT '',           -- 亲属电话
    `qq` VARCHAR(20) NOT NULL DEFAULT '',                   -- QQ
    `ww` VARCHAR(20) NOT NULL DEFAULT '',                   -- 旺旺
    `work` TINYINT(1) UNSIGNED NOT NULL DEFAULT '0',        -- 工作(0在职,1离职)
    `status` TINYINT(1) UNSIGNED NOT NULL DEFAULT '0',      -- 状态(0正常,1锁定)
    PRIMARY KEY(`id`),
    UNIQUE KEY(`loginname`),
    UNIQUE KEY(`nickname`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


-- -----------------------------------------------------------------------------
-- Table(2): `department`
-- Description: 部门信息表
--
-- DROP TABLE IF EXISTS `department`;
-- CREATE TABLE `department`(
--     `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,    -- 主键(ID)
--     `pid` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,   -- 上级部门ID
--     `name` VARCHAR(60) not null default '',           -- 部门名称
--     `description` VARCHAR(255) not null default '',   -- 部门描述
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
-- Table(6): `goods`
-- Description: 商品信息表
--
DROP TABLE IF EXISTS `goods`;
CREATE TABLE `goods`(
    `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,    -- 主键(ID)
    `name` VARCHAR(255) NOT NULL DEFAULT '',          -- 商品名
    PRIMARY KEY(`id`),
    UNIQUE KEY(`role_id`,`permission_id`),
    KEY(`role_id`),
    KEY(`permission_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


-- -----------------------------------------------------------------------------
-- Table(7) `regcode`
-- Description 注册码信息表
--
DROP TABLE IF EXISTS `regcode`;
CREATE TABLE `regcode` (
    `id` int(10) unsigned NOT NULL auto_increment,              -- 主键
    `number` varchar(255) NOT NULL default '',                  -- 注册码
    `value` varchar(80)  NOT NULL default '0',                  -- 价值
    `type` varchar(80) NOT NULL default '',                     -- 类别
    `add_user_id` mediumint(8) unsigned NOT NULL default '0',   -- FK-用户ID
    `add_time` int(10) unsigned NOT NULL default '0',           -- 添加时间
    `get_user_id` mediumint(8) unsigned NOT NULL default '0',   -- FK-用户ID
    `get_time` int(10) unsigned NOT NULL default '0',           -- 领取时间
    `allow` tinyint(1) unsigned NOT NULL default '1',           -- 是否开放领取
    `used` tinyint(1) unsigned NOT NULL default '0',            -- 是否被领取
    `del` tinyint(1) unsigned NOT NULL default '0',             -- 是否被删除
    `remark` varchar(255) NOT NULL default '',                  -- 备注
    PRIMARY KEY (`regcode_id`),
    UNIQUE KEY (`regcode_number`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;
