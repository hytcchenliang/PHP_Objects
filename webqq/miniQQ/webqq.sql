-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- 主机: 127.0.0.1
-- 生成日期: 2015 �?03 �?22 �?16:52
-- 服务器版本: 5.6.11
-- PHP 版本: 5.5.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `webqq`
--
CREATE DATABASE IF NOT EXISTS `webqq` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `webqq`;

-- --------------------------------------------------------

--
-- 表的结构 `friendsinfo`
--

CREATE TABLE IF NOT EXISTS `friendsinfo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `friendid` int(11) NOT NULL,
  `friendNoteName` varchar(20) NOT NULL,
  `friend_group` int(32) DEFAULT NULL,
  `is_active` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=48 ;

--
-- 转存表中的数据 `friendsinfo`
--

INSERT INTO `friendsinfo` (`id`, `userid`, `friendid`, `friendNoteName`, `friend_group`, `is_active`) VALUES
(10, 3, 4, 'Brad Pitt', 0, 1),
(11, 1, 0, '', 0, 1),
(12, 141, 139, 'hollis', 1, 1),
(13, 141, 1, 'Jim Green', 0, 1),
(14, 141, 3, 'Sophie Marceau', 0, 1),
(15, 141, 140, '成龙', 0, 1),
(16, 1, 140, '成龙', 2, 1),
(17, 142, 139, 'hollis', 0, 1),
(36, 1, 141, 'jack', 0, 2),
(37, 1, 2, 'Tom Cruise', 0, 1),
(38, 1, 139, 'hollis', 0, 1),
(39, 1, 144, 'hfd', 2, 1),
(40, 1, 4, 'Brad Pitt', 0, 1),
(41, 1, 142, 'jack', 0, 1),
(42, 1, 143, 'bob', 0, 1),
(43, 2, 1, 'Jim Green', 0, 1),
(44, 2, 141, 'jack', 1, 1),
(45, 2, 4, 'Brad Pitt', 0, 1),
(46, 2, 140, '成龙', 1, 1),
(47, 1, 3, 'Sophie Marceau', 0, 1);

-- --------------------------------------------------------

--
-- 表的结构 `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `group_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `group_name` varchar(24) DEFAULT NULL,
  `is_active` int(11) DEFAULT NULL,
  PRIMARY KEY (`group_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `groups`
--

INSERT INTO `groups` (`group_id`, `group_name`, `is_active`) VALUES
(0, '我的好友', 1),
(1, '朋友', 1),
(2, '同学', 1),
(3, '家人', 1),
(4, '同事', 1);

-- --------------------------------------------------------

--
-- 表的结构 `messageinfo`
--

CREATE TABLE IF NOT EXISTS `messageinfo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `msgContent` varchar(4000) NOT NULL,
  `msgSender` int(11) NOT NULL,
  `msgReceiver` int(11) NOT NULL,
  `msgSendTime` datetime NOT NULL,
  `msgState` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=542 ;

--
-- 转存表中的数据 `messageinfo`
--

INSERT INTO `messageinfo` (`id`, `msgContent`, `msgSender`, `msgReceiver`, `msgSendTime`, `msgState`) VALUES
(262, 'EF F EF F', 2, 3, '2014-09-15 21:18:13', 'haveread'),
(368, 'eewfef', 2, 1, '2014-09-16 10:39:51', 'haveread'),
(369, 'fwef ', 1, 2, '2014-09-16 10:41:12', 'haveread'),
(370, 'fewf fe', 2, 1, '2014-09-16 10:41:56', 'haveread'),
(371, '123132', 1, 2, '2015-03-03 23:01:39', 'haveread'),
(372, '1232', 2, 1, '2015-03-03 23:01:50', 'haveread'),
(373, '321313', 1, 2, '2015-03-03 23:02:01', 'haveread'),
(374, '41241', 1, 2, '2015-03-03 23:02:13', 'haveread'),
(375, '42132', 2, 1, '2015-03-03 23:02:25', 'haveread'),
(376, '24141', 2, 1, '2015-03-03 23:02:32', 'haveread'),
(377, '[抓狂]', 2, 1, '2015-03-05 01:38:37', 'haveread'),
(378, '[吐]', 1, 2, '2015-03-05 01:39:04', 'haveread'),
(379, '23131', 143, 139, '2015-03-08 14:03:12', 'haveread'),
(380, '212123', 139, 143, '2015-03-08 14:06:53', 'haveread'),
(381, '[调皮]', 139, 143, '2015-03-08 14:07:39', 'haveread'),
(382, '[吐]', 139, 143, '2015-03-08 14:07:48', 'haveread'),
(383, '[调皮]', 143, 139, '2015-03-08 14:08:06', 'haveread'),
(384, '[酷]', 139, 143, '2015-03-08 14:08:26', 'haveread'),
(385, '[吐]', 143, 139, '2015-03-08 14:08:39', 'haveread'),
(386, '[流泪]', 139, 143, '2015-03-08 14:08:48', 'haveread'),
(387, '[尴尬]', 143, 139, '2015-03-08 14:08:58', 'haveread'),
(388, '[抓狂]', 139, 143, '2015-03-08 14:10:24', 'haveread'),
(389, '[吐]', 139, 143, '2015-03-08 14:11:05', 'haveread'),
(390, '[抓狂]', 139, 143, '2015-03-08 14:11:40', 'haveread'),
(391, '[调皮]', 1, 2, '2015-03-08 14:25:52', 'haveread'),
(392, '[大怒]', 2, 1, '2015-03-08 14:26:37', 'haveread'),
(393, '[抓狂]', 1, 2, '2015-03-08 14:26:50', 'haveread'),
(394, '[抓狂]', 2, 1, '2015-03-08 14:27:03', 'haveread'),
(395, '[酷]', 2, 1, '2015-03-08 14:28:11', 'haveread'),
(396, '[冷汗][冷汗]', 2, 1, '2015-03-08 14:28:38', 'haveread'),
(397, '[抓狂][抓狂]', 1, 2, '2015-03-08 14:29:07', 'haveread'),
(398, '[抓狂]', 2, 1, '2015-03-08 14:29:21', 'haveread'),
(399, '[吐][吐][吐]', 2, 1, '2015-03-08 14:29:42', 'haveread'),
(400, '[大怒][大怒]', 1, 2, '2015-03-08 14:29:52', 'haveread'),
(401, '111', 2, 1, '2015-03-08 14:31:04', 'haveread'),
(402, '222', 1, 2, '2015-03-08 14:31:11', 'haveread'),
(403, '333', 2, 1, '2015-03-08 14:31:20', 'haveread'),
(404, '33', 2, 1, '2015-03-08 14:31:37', 'haveread'),
(405, 'dfw', 1, 140, '2015-03-10 00:14:11', 'noread'),
(406, '[吐]', 2, 1, '2015-03-10 00:15:24', 'haveread'),
(407, '[尴尬]', 1, 2, '2015-03-10 00:15:37', 'haveread'),
(408, '', 1, 2, '2015-03-10 00:15:38', 'haveread'),
(409, '[大怒][吐][抓狂]', 2, 1, '2015-03-10 00:16:30', 'haveread'),
(410, '[冷汗]', 2, 1, '2015-03-10 00:18:09', 'haveread'),
(411, '[呲牙][呲牙]', 1, 2, '2015-03-10 00:18:28', 'haveread'),
(412, '[酷][酷][尴尬]', 2, 1, '2015-03-10 00:18:39', 'haveread'),
(413, '[调皮]', 1, 2, '2015-03-10 00:19:05', 'haveread'),
(414, '[吐]', 2, 1, '2015-03-10 00:19:13', 'haveread'),
(415, 'qwewew', 2, 1, '2015-03-10 00:35:15', 'haveread'),
(416, '1213', 2, 1, '2015-03-10 00:36:42', 'haveread'),
(417, '[抓狂]', 2, 1, '2015-03-10 00:37:16', 'haveread'),
(418, '13132', 2, 1, '2015-03-10 00:38:10', 'haveread'),
(419, '13214', 2, 1, '2015-03-10 00:38:23', 'haveread'),
(420, '[吐]', 2, 1, '2015-03-10 00:44:28', 'haveread'),
(421, '[调皮]', 2, 1, '2015-03-10 00:45:09', 'haveread'),
(422, '[调皮][吐]', 1, 2, '2015-03-10 00:47:05', 'haveread'),
(423, '21212', 1, 2, '2015-03-10 00:47:58', 'haveread'),
(424, '1312321', 2, 1, '2015-03-10 00:48:13', 'haveread'),
(425, '31231312', 1, 2, '2015-03-10 00:48:22', 'haveread'),
(426, '231213', 2, 1, '2015-03-10 00:48:29', 'haveread'),
(427, '123123', 2, 1, '2015-03-10 00:51:10', 'haveread'),
(428, '111', 2, 1, '2015-03-10 00:51:22', 'haveread'),
(429, '222', 1, 2, '2015-03-10 01:04:55', 'haveread'),
(430, '333', 2, 1, '2015-03-10 01:05:09', 'haveread'),
(431, '444', 1, 2, '2015-03-10 01:05:33', 'haveread'),
(432, '2232', 2, 140, '2015-03-10 01:09:44', 'noread'),
(433, '23232', 1, 2, '2015-03-10 01:09:58', 'haveread'),
(434, '223', 1, 2, '2015-03-10 01:10:50', 'haveread'),
(435, '1', 1, 2, '2015-03-10 01:14:37', 'haveread'),
(436, '121', 1, 2, '2015-03-10 01:16:20', 'haveread'),
(437, '22', 2, 1, '2015-03-10 01:16:40', 'haveread'),
(438, '211', 1, 2, '2015-03-10 01:17:05', 'haveread'),
(439, '222', 1, 2, '2015-03-10 01:18:06', 'haveread'),
(440, '233', 1, 2, '2015-03-10 01:18:39', 'haveread'),
(441, '2222', 2, 1, '2015-03-10 01:18:49', 'haveread'),
(442, '223', 1, 2, '2015-03-10 01:19:11', 'haveread'),
(443, '3213', 1, 2, '2015-03-10 01:19:22', 'haveread'),
(444, '11', 2, 1, '2015-03-10 01:21:26', 'haveread'),
(445, '22', 1, 2, '2015-03-10 01:21:38', 'haveread'),
(446, '121', 1, 2, '2015-03-10 01:22:11', 'haveread'),
(447, '21', 2, 1, '2015-03-10 01:22:18', 'haveread'),
(448, '321', 1, 2, '2015-03-10 01:22:23', 'haveread'),
(449, '[抓狂]', 1, 2, '2015-03-10 01:31:44', 'haveread'),
(450, '[吐]', 1, 2, '2015-03-10 01:32:18', 'haveread'),
(451, '1', 1, 2, '2015-03-10 01:32:44', 'haveread'),
(452, '213', 1, 2, '2015-03-10 01:33:30', 'haveread'),
(453, '31', 1, 2, '2015-03-10 01:33:43', 'haveread'),
(454, '', 1, 2, '2015-03-10 01:33:45', 'haveread'),
(455, '', 1, 2, '2015-03-10 01:33:46', 'haveread'),
(456, '', 1, 2, '2015-03-10 01:33:46', 'haveread'),
(457, '', 1, 2, '2015-03-10 01:33:46', 'haveread'),
(458, '', 1, 2, '2015-03-10 01:33:47', 'haveread'),
(459, '', 1, 2, '2015-03-10 01:33:47', 'haveread'),
(460, '', 1, 2, '2015-03-10 01:33:47', 'haveread'),
(461, '', 1, 2, '2015-03-10 01:33:47', 'haveread'),
(462, '', 1, 2, '2015-03-10 01:33:48', 'haveread'),
(463, '', 1, 2, '2015-03-10 01:33:48', 'haveread'),
(464, '3123', 1, 2, '2015-03-10 01:33:50', 'haveread'),
(465, '212', 1, 2, '2015-03-10 01:34:49', 'haveread'),
(466, '32131', 1, 2, '2015-03-10 01:34:59', 'haveread'),
(467, '3123', 1, 2, '2015-03-10 01:35:15', 'haveread'),
(468, '', 1, 2, '2015-03-10 01:35:15', 'haveread'),
(469, '31231', 2, 1, '2015-03-10 01:36:20', 'haveread'),
(470, '321', 2, 1, '2015-03-10 01:36:25', 'haveread'),
(471, '31231', 2, 1, '2015-03-10 01:36:39', 'haveread'),
(472, '1', 2, 1, '2015-03-10 01:43:29', 'haveread'),
(473, '2', 2, 1, '2015-03-10 01:44:29', 'haveread'),
(474, '3', 2, 1, '2015-03-10 01:44:52', 'haveread'),
(475, '4', 2, 1, '2015-03-10 01:46:53', 'haveread'),
(476, '5', 2, 1, '2015-03-10 01:49:06', 'haveread'),
(477, '21', 2, 1, '2015-03-10 01:49:38', 'haveread'),
(478, '1', 2, 1, '2015-03-10 23:22:19', 'haveread'),
(479, '2', 1, 2, '2015-03-10 23:22:26', 'haveread'),
(480, '3', 2, 1, '2015-03-10 23:22:31', 'haveread'),
(481, '4', 2, 1, '2015-03-10 23:23:48', 'haveread'),
(482, 'l', 2, 1, '2015-03-10 23:31:53', 'haveread'),
(483, '关于', 1, 2, '2015-03-10 23:32:02', 'haveread'),
(484, 'hh y', 2, 1, '2015-03-10 23:32:21', 'haveread'),
(485, '23', 2, 1, '2015-03-10 23:34:02', 'haveread'),
(486, '1', 2, 1, '2015-03-10 23:34:30', 'haveread'),
(487, '12', 2, 1, '2015-03-10 23:46:05', 'haveread'),
(488, '2', 2, 1, '2015-03-10 23:50:44', 'haveread'),
(489, '3', 1, 2, '2015-03-10 23:50:51', 'haveread'),
(490, '2', 2, 1, '2015-03-10 23:50:58', 'haveread'),
(491, '1', 2, 1, '2015-03-10 23:52:24', 'haveread'),
(492, '4', 1, 2, '2015-03-10 23:52:29', 'haveread'),
(493, '0', 2, 1, '2015-03-10 23:52:37', 'haveread'),
(494, '00', 1, 2, '2015-03-10 23:54:33', 'haveread'),
(495, '11', 2, 1, '2015-03-10 23:54:46', 'haveread'),
(496, '22', 1, 2, '2015-03-10 23:54:52', 'haveread'),
(497, 'ss', 2, 1, '2015-03-10 23:55:08', 'haveread'),
(498, 'ff', 2, 1, '2015-03-10 23:55:47', 'haveread'),
(499, '[抓狂]', 2, 1, '2015-03-10 23:57:20', 'haveread'),
(500, 'b', 2, 1, '2015-03-10 23:57:45', 'haveread'),
(501, 'uuhu ', 2, 1, '2015-03-10 23:58:04', 'haveread'),
(502, 'qq', 2, 1, '2015-03-10 23:59:33', 'haveread'),
(503, 'ww', 1, 2, '2015-03-10 23:59:50', 'haveread'),
(504, 'ee', 2, 1, '2015-03-10 23:59:57', 'haveread'),
(505, 'qqww', 1, 2, '2015-03-11 00:00:03', 'haveread'),
(506, 'qqqqq', 2, 1, '2015-03-11 00:00:07', 'haveread'),
(507, 'w', 2, 1, '2015-03-11 00:03:18', 'haveread'),
(508, '22', 1, 2, '2015-03-11 00:03:27', 'haveread'),
(509, '22222', 2, 1, '2015-03-11 00:03:30', 'haveread'),
(510, '222222', 1, 2, '2015-03-11 00:03:42', 'haveread'),
(511, 'wwwww', 2, 1, '2015-03-11 00:03:52', 'haveread'),
(512, 'wwww', 1, 2, '2015-03-11 00:04:00', 'haveread'),
(513, 'eee', 2, 1, '2015-03-11 00:10:16', 'haveread'),
(514, '222', 1, 2, '2015-03-11 00:10:25', 'haveread'),
(515, '222', 2, 1, '2015-03-11 00:10:33', 'haveread'),
(516, '22', 2, 1, '2015-03-11 00:10:43', 'haveread'),
(517, '1111', 2, 1, '2015-03-11 00:12:14', 'haveread'),
(518, '2222', 1, 2, '2015-03-11 00:12:19', 'haveread'),
(519, '33333', 2, 1, '2015-03-11 00:12:24', 'haveread'),
(520, '44444', 1, 2, '2015-03-11 00:12:29', 'haveread'),
(521, '1122', 2, 1, '2015-03-11 00:15:17', 'haveread'),
(522, '333', 1, 2, '2015-03-11 00:15:21', 'haveread'),
(523, '3333333', 2, 1, '2015-03-11 00:15:36', 'haveread'),
(524, '1', 2, 1, '2015-03-11 00:24:58', 'haveread'),
(525, '3123131', 2, 1, '2015-03-11 01:27:23', 'haveread'),
(526, '321312', 1, 2, '2015-03-11 01:27:30', 'haveread'),
(527, '[得意]', 3, 1, '2015-03-12 00:07:09', 'haveread'),
(528, '[尴尬]', 3, 1, '2015-03-12 00:07:51', 'haveread'),
(529, '[大怒]', 1, 4, '2015-03-12 22:34:41', 'noread'),
(530, '[大哭]', 143, 1, '2015-03-13 00:45:19', 'haveread'),
(531, '[微笑]', 143, 1, '2015-03-13 00:49:47', 'haveread'),
(532, '[大怒]', 143, 1, '2015-03-13 00:54:43', 'haveread'),
(533, '[冷汗]', 143, 1, '2015-03-13 00:56:24', 'haveread'),
(534, '[抓狂]', 143, 4, '2015-03-13 00:58:05', 'noread'),
(535, '[尴尬]', 143, 1, '2015-03-13 01:01:21', 'haveread'),
(536, '[色][吐][呲牙][大怒]', 143, 1, '2015-03-13 01:04:32', 'haveread'),
(537, 'f w', 2, 1, '2015-03-19 01:56:07', 'haveread'),
(538, '[发呆]', 1, 2, '2015-03-19 01:56:20', 'haveread'),
(539, 'few ', 1, 2, '2015-03-22 22:15:00', 'haveread'),
(540, 'fw ', 1, 2, '2015-03-22 22:17:54', 'haveread'),
(541, 'rf ', 1, 2, '2015-03-22 23:35:41', 'noread');

-- --------------------------------------------------------

--
-- 表的结构 `userinfo`
--

CREATE TABLE IF NOT EXISTS `userinfo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userpwd` varchar(20) NOT NULL,
  `userNickname` varchar(20) NOT NULL,
  `userHeadImage` varchar(300) NOT NULL,
  `userState` varchar(10) NOT NULL,
  `user_groups` varchar(32) DEFAULT NULL,
  `user_qianming` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=145 ;

--
-- 转存表中的数据 `userinfo`
--

INSERT INTO `userinfo` (`id`, `userpwd`, `userNickname`, `userHeadImage`, `userState`, `user_groups`, `user_qianming`) VALUES
(1, '123', 'Jim Green', 'headimages/1.png', 'online', '0|2|3', '我恨我痴心'),
(2, '123', 'Tom Cruise', 'headimages/2.png', 'offline', '0|1|3|4', '我是一只小鸭子，咿呀咿呀呦'),
(3, '123', 'Sophie Marceau', 'headimages/3.png', 'offline', '0', '车到山前必有路'),
(4, '123', 'Brad Pitt', 'headimages/4.png', 'offline', '0|1|2', '远上寒山诗经鞋'),
(139, '211111003', 'hollis', 'headimages/0.png', 'offline', '0', NULL),
(140, '123456', '成龙', 'headimages/0.png', 'offline', '0', NULL),
(141, '123456', 'jack', 'headimages/0.png', 'offline', '0', NULL),
(142, '123456', 'jack', 'headimages/0.png', 'offline', '0', NULL),
(143, '123456', 'bob', 'headimages/0.png', 'offline', '0', NULL),
(144, '123456', 'hfd', 'headimages/0.png', 'offline', '0', NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
