-- phpMyAdmin SQL Dump
-- version 4.4.3
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 2015-09-25 08:17:51
-- 服务器版本： 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `tp_kmpeople`
--

-- --------------------------------------------------------

--
-- 表的结构 `tp_info`
--

CREATE TABLE IF NOT EXISTS `tp_info` (
  `id` int(10) NOT NULL COMMENT 'id',
  `uid` int(10) NOT NULL COMMENT 'people.id',
  `pid` int(10) NOT NULL COMMENT '类型',
  `info` text COLLATE utf8_unicode_ci NOT NULL COMMENT '内容',
  `orther` varchar(80) COLLATE utf8_unicode_ci NOT NULL COMMENT '附件',
  `time` varchar(30) COLLATE utf8_unicode_ci NOT NULL COMMENT '添加时间'
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='伙伴信息';

--
-- 转存表中的数据 `tp_info`
--



-- --------------------------------------------------------

--
-- 表的结构 `tp_login`
--

CREATE TABLE IF NOT EXISTS `tp_login` (
  `id` int(20) NOT NULL COMMENT 'id',
  `username` varchar(30) COLLATE utf8_unicode_ci NOT NULL COMMENT '用户名',
  `nikename` varchar(40) COLLATE utf8_unicode_ci NOT NULL COMMENT '昵称',
  `psw` varchar(30) COLLATE utf8_unicode_ci NOT NULL COMMENT '密码',
  `logintime` varchar(30) COLLATE utf8_unicode_ci NOT NULL COMMENT '登陆时间',
  `loginip` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT '登陆IP'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='登陆';

--
-- 转存表中的数据 `tp_login`
--

INSERT INTO `tp_login` (`id`, `username`, `nikename`, `psw`, `logintime`, `loginip`) VALUES
(1, 'admin', '管理员', '123', '1443146358', '0.0.0.0');

-- --------------------------------------------------------

--
-- 表的结构 `tp_people`
--

CREATE TABLE IF NOT EXISTS `tp_people` (
  `id` int(30) NOT NULL COMMENT 'id',
  `no` varchar(30) COLLATE utf8_unicode_ci NOT NULL COMMENT '工号',
  `name` varchar(40) COLLATE utf8_unicode_ci NOT NULL COMMENT '姓名',
  `team` varchar(40) COLLATE utf8_unicode_ci NOT NULL COMMENT '团队',
  `position` varchar(40) COLLATE utf8_unicode_ci NOT NULL COMMENT '职位',
  `level` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT '序列',
  `entrytime` int(30) NOT NULL COMMENT '入职时间',
  `earns` int(30) NOT NULL COMMENT '月薪',
  `sex` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT '性别',
  `tel` varchar(30) COLLATE utf8_unicode_ci NOT NULL COMMENT '手机',
  `birthday` varchar(30) COLLATE utf8_unicode_ci NOT NULL COMMENT '生日'
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='人事档案';

--
-- 转存表中的数据 `tp_people`
--



-- --------------------------------------------------------

--
-- 表的结构 `tp_peopleinfo`
--

CREATE TABLE IF NOT EXISTS `tp_peopleinfo` (
  `id` int(10) NOT NULL,
  `uid` int(10) NOT NULL COMMENT 'uid',
  `gangwei` varchar(30) COLLATE utf8_unicode_ci NOT NULL COMMENT '岗位',
  `familyname` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT '名族',
  `marital` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT '婚姻状况',
  `school` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT '毕业院校',
  `professionals` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT '专业',
  `census` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT '户籍所在地',
  `domicile` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT '现居住地',
  `idnumber` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT '身份证号',
  `emergency` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT '紧急联络人',
  `withhim` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT '与本人关系',
  `emergencytel` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT '紧急联系电话',
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT '邮箱',
  `jiguan` varchar(40) COLLATE utf8_unicode_ci NOT NULL COMMENT '籍贯'
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='伙伴详细信息';

--
-- 转存表中的数据 `tp_peopleinfo`
--



-- --------------------------------------------------------

--
-- 表的结构 `tp_team`
--

CREATE TABLE IF NOT EXISTS `tp_team` (
  `id` int(30) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `pid` int(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='团队列表';

--
-- 转存表中的数据 `tp_team`
--



-- --------------------------------------------------------

--
-- 表的结构 `tp_workandf`
--

CREATE TABLE IF NOT EXISTS `tp_workandf` (
  `id` int(10) NOT NULL,
  `uid` int(10) NOT NULL,
  `value1` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `value2` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `value3` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `value4` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `pid` int(10) NOT NULL COMMENT '1-主要家庭成员2-工作经历'
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='工作经历和主要家庭成员';

--
-- 转存表中的数据 `tp_workandf`
--


--
-- Indexes for dumped tables
--

--
-- Indexes for table `tp_info`
--
ALTER TABLE `tp_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tp_login`
--
ALTER TABLE `tp_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tp_people`
--
ALTER TABLE `tp_people`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tp_peopleinfo`
--
ALTER TABLE `tp_peopleinfo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tp_team`
--
ALTER TABLE `tp_team`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tp_workandf`
--
ALTER TABLE `tp_workandf`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tp_info`
--
ALTER TABLE `tp_info`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'id',AUTO_INCREMENT=1;
--
-- AUTO_INCREMENT for table `tp_login`
--
ALTER TABLE `tp_login`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT COMMENT 'id',AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tp_people`
--
ALTER TABLE `tp_people`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT COMMENT 'id',AUTO_INCREMENT=1;
--
-- AUTO_INCREMENT for table `tp_peopleinfo`
--
ALTER TABLE `tp_peopleinfo`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1;
--
-- AUTO_INCREMENT for table `tp_team`
--
ALTER TABLE `tp_team`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1;
--
-- AUTO_INCREMENT for table `tp_workandf`
--
ALTER TABLE `tp_workandf`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
