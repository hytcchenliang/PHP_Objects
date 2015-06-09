-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2015-02-16 07:21:08
-- 服务器版本： 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `kicker`
--

-- --------------------------------------------------------

--
-- 表的结构 `hy_access`
--

CREATE TABLE IF NOT EXISTS `hy_access` (
  `role_id` smallint(6) unsigned NOT NULL,
  `node_id` smallint(6) unsigned NOT NULL,
  `level` tinyint(1) NOT NULL,
  `module` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `hy_access`
--

INSERT INTO `hy_access` (`role_id`, `node_id`, `level`, `module`) VALUES
(8, 19, 0, NULL),
(8, 16, 0, NULL),
(1, 29, 0, NULL),
(1, 30, 0, NULL),
(8, 17, 0, NULL),
(8, 8, 0, NULL),
(2, 37, 0, NULL),
(11, 15, 0, NULL),
(11, 14, 0, NULL),
(11, 13, 0, NULL),
(11, 10, 0, NULL),
(2, 38, 0, NULL),
(2, 13, 0, NULL),
(2, 18, 0, NULL),
(1, 31, 0, NULL),
(1, 32, 0, NULL),
(1, 33, 0, NULL),
(1, 34, 0, NULL),
(1, 35, 0, NULL),
(1, 16, 0, NULL),
(1, 8, 0, NULL),
(8, 18, 0, NULL),
(8, 13, 0, NULL),
(1, 28, 0, NULL),
(1, 27, 0, NULL),
(1, 26, 0, NULL),
(1, 25, 0, NULL),
(1, 24, 0, NULL),
(1, 23, 0, NULL),
(1, 22, 0, NULL),
(1, 21, 0, NULL),
(1, 20, 0, NULL),
(1, 19, 0, NULL),
(1, 18, 0, NULL),
(1, 15, 0, NULL),
(1, 14, 0, NULL),
(1, 13, 0, NULL),
(1, 10, 0, NULL),
(2, 39, 0, NULL),
(7, 15, 0, NULL),
(2, 23, 0, NULL),
(2, 16, 0, NULL),
(2, 8, 0, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `hy_cart`
--

CREATE TABLE IF NOT EXISTS `hy_cart` (
`cart_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `goods_id` int(10) unsigned NOT NULL,
  `goods_num` smallint(6) NOT NULL,
  `goods_attr` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `hy_category`
--

CREATE TABLE IF NOT EXISTS `hy_category` (
`cid` smallint(5) unsigned NOT NULL,
  `cname` varchar(20) NOT NULL,
  `keywords` varchar(120) NOT NULL,
  `title` varchar(60) NOT NULL,
  `des` varchar(255) NOT NULL,
  `sort` smallint(5) unsigned NOT NULL,
  `attr` varchar(50) NOT NULL,
  `band` varchar(50) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `hy_category`
--

INSERT INTO `hy_category` (`cid`, `cname`, `keywords`, `title`, `des`, `sort`, `attr`, `band`) VALUES
(1, '球衣', '球衣', '专柜正品', '新品上市', 1, 'S,M,L,XL,XXL', 'nike,adidas,puma'),
(2, '短裤', '短裤', '专柜正品', '新品上市', 2, 'S,M,L,XL,XXL', 'nike,adidas,puma'),
(3, '球鞋', '球鞋', '专柜正品', '新品上市', 1, '40,41,42,43,44', 'nike,adidas,mizuno,umbro'),
(4, '足球', '足球', '专柜正品', '新品上市', 1, '3,4,5', 'hct,adidas,star');

-- --------------------------------------------------------

--
-- 表的结构 `hy_collect`
--

CREATE TABLE IF NOT EXISTS `hy_collect` (
`id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `goods_id` int(10) unsigned NOT NULL,
  `remark` varchar(50) NOT NULL,
  `add_time` int(10) unsigned NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

--
-- 转存表中的数据 `hy_collect`
--

INSERT INTO `hy_collect` (`id`, `user_id`, `goods_id`, `remark`, `add_time`) VALUES
(15, 4, 5, '', 1420595112),
(16, 4, 15, '', 1420595147),
(17, 4, 3, '', 1420606993),
(18, 12, 5, '', 1421658157);

-- --------------------------------------------------------

--
-- 表的结构 `hy_comment`
--

CREATE TABLE IF NOT EXISTS `hy_comment` (
`comm_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `goods_id` int(11) unsigned NOT NULL,
  `time` int(11) NOT NULL,
  `content` varchar(255) NOT NULL,
  `rating` tinyint(4) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- 转存表中的数据 `hy_comment`
--

INSERT INTO `hy_comment` (`comm_id`, `user_id`, `goods_id`, `time`, `content`, `rating`) VALUES
(1, 4, 11, 1417658909, '穿上了他，瞬间感觉自己萌萌大！', 4),
(2, 4, 11, 1417658908, '好评！好评！', 5),
(3, 8, 3, 1417662657, '我仁球迷必备！！！', 4),
(4, 4, 3, 1417659057, '非常帅气哦！', 3),
(5, 8, 11, 1417663452, '在这光滑的草坪上摩擦！', 5);

-- --------------------------------------------------------

--
-- 表的结构 `hy_goods`
--

CREATE TABLE IF NOT EXISTS `hy_goods` (
`gid` int(10) unsigned NOT NULL,
  `cid` smallint(5) unsigned NOT NULL,
  `main_title` varchar(30) NOT NULL,
  `sub_title` varchar(255) NOT NULL,
  `price` decimal(7,1) NOT NULL DEFAULT '0.0',
  `old_price` decimal(7,1) NOT NULL DEFAULT '0.0',
  `buy` smallint(6) NOT NULL DEFAULT '0',
  `goods_img` varchar(60) NOT NULL,
  `attr` varchar(20) NOT NULL,
  `band` varchar(20) NOT NULL,
  `des_img` text NOT NULL,
  `des_txt` text NOT NULL,
  `sm_images` text NOT NULL,
  `big_images` text NOT NULL,
  `large_images` text NOT NULL,
  `is_new` tinyint(4) NOT NULL DEFAULT '0' COMMENT '是否新品',
  `is_hot` tinyint(4) NOT NULL DEFAULT '0' COMMENT '是否热卖',
  `is_rec` tinyint(4) NOT NULL DEFAULT '0' COMMENT '是否推荐',
  `is_price` tinyint(4) NOT NULL DEFAULT '0' COMMENT '是否特价',
  `is_down` tinyint(4) NOT NULL DEFAULT '1' COMMENT '是否下架'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=31 ;

--
-- 转存表中的数据 `hy_goods`
--

INSERT INTO `hy_goods` (`gid`, `cid`, `main_title`, `sub_title`, `price`, `old_price`, `buy`, `goods_img`, `attr`, `band`, `des_img`, `des_txt`, `sm_images`, `big_images`, `large_images`, `is_new`, `is_hot`, `is_rec`, `is_price`, `is_down`) VALUES
(3, 1, '[Adidas正品]拜仁14-15赛季针织夹克外套', '[Adidas正品]拜仁14-15赛季针织夹克外套', '399.0', '399.0', 222, 'images/goods/1.jpg', 'S,M,L', 'adidas', 'http://gd3.alicdn.com/imgextra/i3/61169695/TB2eC5HaVXXXXagXpXXXXXXXXXX-61169695.jpg,http://gd3.alicdn.com/imgextra/i3/61169695/TB2hbCNaVXXXXaYXXXXXXXXXXXX-61169695.jpg,http://gd2.alicdn.com/imgextra/i2/61169695/TB2NvCNaVXXXXazXXXXXXXXXXXX-61169695.jpg', '原价￥599元   货 号：M30958	产品名：阿迪达斯	 适合场地：人工草 天然草	适合球场位置：前锋 中场 后卫	功能特性：轻薄 磨擦条 包裹性 精准射门 增加发力 产地：中国	材质：60%棉纶  40%聚酯纤维', 'http://gd1.alicdn.com/bao/uploaded/i1/TB16ivrGFXXXXaxXFXXXXXXXXXX_!!0-item_pic.jpg_50x50.jpg_.webp,http://gd1.alicdn.com/imgextra/i1/61169695/TB2E85MaVXXXXa6XXXXXXXXXXXX_!!61169695.jpg_50x50.jpg_.webp,http://gd2.alicdn.com/imgextra/i2/61169695/TB2EZGJaVXXXXX2XpXXXXXXXXXX_!!61169695.jpg_50x50.jpg_.webp', 'http://gd1.alicdn.com/bao/uploaded/i1/TB16ivrGFXXXXaxXFXXXXXXXXXX_!!0-item_pic.jpg_400x400.jpg_.webp,http://gd1.alicdn.com/imgextra/i1/61169695/TB2E85MaVXXXXa6XXXXXXXXXXXX_!!61169695.jpg_400x400.jpg_.webp,http://gd2.alicdn.com/imgextra/i2/61169695/TB2EZGJaVXXXXX2XpXXXXXXXXXX_!!61169695.jpg_400x400.jpg_.webp', 'http://gd3.alicdn.com/imgextra/i3/61169695/TB2eC5HaVXXXXagXpXXXXXXXXXX-61169695.jpg,http://gd3.alicdn.com/imgextra/i3/61169695/TB2hbCNaVXXXXaYXXXXXXXXXXXX-61169695.jpg,http://gd2.alicdn.com/imgextra/i2/61169695/TB2NvCNaVXXXXazXXXXXXXXXXXX-61169695.jpg', 1, 1, 1, 0, 1),
(4, 1, '[Adidas正品]拜仁14-15赛季主场长袖球衣', '[Adidas正品]拜仁14-15赛季主场长袖球衣', '369.0', '369.0', 15, 'images/goods/2.jpg', 'S,M', 'adidas', '', '', '', '', '', 1, 0, 1, 0, 1),
(5, 1, '[Adidas正品]切尔西14赛季全新针织外套', '[Adidas正品]切尔西14赛季全新针织外套', '399.0', '399.0', 22, 'images/goods/3.jpg', 'M,L,XL', 'adidas', '', '', '', '', '', 0, 1, 1, 0, 1),
(6, 1, '[Adidas正品]14-15赛季皇马主场比赛服', '[Adidas正品]14-15赛季皇马主场比赛服', '299.0', '299.0', 188, 'images/goods/4.jpg', 'S,M,L', 'adidas', '', '', '', '', '', 0, 1, 0, 1, 1),
(7, 1, '[Adidas正品]切尔西14赛季主场短袖球衣', '[Adidas正品]切尔西14赛季主场短袖球衣', '299.0', '299.0', 53, 'images/goods/5.jpg', 'M,L,XL,XXL', 'adidas', '', '', '', '', '', 1, 1, 0, 0, 1),
(8, 1, '[NIKE正品]巴萨14赛季主场短袖球衣', '[NIKE正品]巴萨14赛季主场短袖球衣', '299.0', '299.0', 97, 'images/goods/6.jpg', 'XL,XXL', 'nike', '', '', '', '', '', 1, 1, 0, 0, 1),
(9, 1, '[Adidas正品]13新款米兰保暖运动服棉', '[Adidas正品]13新款米兰保暖运动服棉', '499.0', '499.0', 5, 'images/goods/7.jpg', 'S,M,L', 'adidas', '', '', '', '', '', 0, 1, 0, 0, 0),
(10, 1, '[NIKE正品]14-15赛季曼联主场短袖球衣', '[NIKE正品]14-15赛季曼联主场短袖球衣', '399.0', '399.0', 43, 'images/goods/8.jpg', 'S,M,L,XL', 'nike', '', '', '', '', '', 1, 1, 1, 0, 1),
(11, 3, '[NIKE正品] 鬼牌 MAGISTA', '[NIKE正品] 鬼牌 MAGISTA 全网底价 年末清仓', '1099.0', '1099.0', 12, 'images/goods/9.jpg', '41,42,43', 'nike', 'http://img01.taobaocdn.com/imgextra/i1/740024864/TB2lokvXVXXXXauXpXXXXXXXXXX-740024864.jpg_.webp,http://img03.taobaocdn.com/imgextra/i3/740024864/TB2eaUwXVXXXXXgXXXXXXXXXXXX-740024864.jpg_.webp,http://img04.taobaocdn.com/imgextra/i4/740024864/TB2K9suXVXXXXb6XXXXXXXXXXXX-740024864.jpg_.webp,http://img04.taobaocdn.com/imgextra/i4/740024864/TB2CiMuXVXXXXcyXXXXXXXXXXXX-740024864.jpg_.webp', '喜迎佳节，为了感谢广大忠实顾客的支持，特推出指定球鞋包邮活动哦！（默认包邮为圆通快递，顺丰快递需补差价。）温馨提示：不包括新疆、西藏、内蒙古、港澳台、海外地区哦，请各位顾客谅解，谢谢！', 'http://gi1.md.alicdn.com/bao/uploaded/i1/TB1bWROFVXXXXbjXFXXXXXXXXXX_!!0-item_pic.jpg_60x60q90.jpg,http://gi3.md.alicdn.com/imgextra/i3/TB1Px0SFVXXXXaeXXXXXXXXXXXX_!!0-item_pic.jpg_60x60q90.jpg,http://gi2.md.alicdn.com/imgextra/i2/740024864/TB20BIfXVXXXXa3XpXXXXXXXXXX_!!740024864.jpg_60x60q90.jpg', 'http://gi1.md.alicdn.com/bao/uploaded/i1/TB1bWROFVXXXXbjXFXXXXXXXXXX_!!0-item_pic.jpg_430x430q90.jpg,http://gi3.md.alicdn.com/imgextra/i3/TB1Px0SFVXXXXaeXXXXXXXXXXXX_!!0-item_pic.jpg_430x430q90.jpg,http://gi2.md.alicdn.com/imgextra/i2/740024864/TB20BIfXVXXXXa3XpXXXXXXXXXX_!!740024864.jpg_430x430q90.jpg', '', 0, 0, 0, 0, 1),
(12, 3, '[NIKE正品] 内马尔 毒蜂', '[NIKE正品] 内马尔 毒蜂', '999.0', '999.0', 8, 'images/goods/10.jpg', '42,43', 'nike', '', '', '', '', '', 1, 0, 0, 0, 1),
(13, 3, '[NIKE正品] TIEMPO 传奇5', '[NIKE正品] TIEMPO 传奇5', '959.0', '959.0', 14, 'images/goods/11.jpg', '41,42,43', 'nike', '', '', '', '', '', 1, 1, 0, 0, 1),
(14, 3, '[NIKE正品] C罗刺客10代', '[NIKE正品] C罗刺客10代', '1899.0', '1899.0', 3, 'images/goods/12.jpg', '41,42,43', 'nike', '', '', '', '', '', 1, 0, 0, 1, 1),
(15, 3, '[正品美津浓] IGNITUS无回旋3', '[正品美津浓] IGNITUS无回旋3', '599.0', '599.0', 12, 'images/goods/13.jpg', '42,43,44', 'mizuno', '', '', '', '', '', 0, 1, 1, 0, 1),
(16, 3, '[正品美津浓] MIZUNO', '[正品美津浓] MIZUNO', '829.0', '829.0', 20, 'images/goods/14.jpg', '41,42,43', 'mizuno', '', '', '', '', '', 1, 0, 0, 0, 1),
(17, 3, '[正品美津浓] MORELIA MD', '[正品美津浓] MORELIA MD', '529.0', '529.0', 3, 'images/goods/15.jpg', '41,43', 'mizuno', '', '', '', '', '', 0, 1, 0, 0, 1),
(18, 3, '[正品美津浓] IGNITUS 无回旋3', '[正品美津浓] IGNITUS 无回旋3', '799.0', '799.0', 16, 'images/goods/16.jpg', '41,42,43', 'mizuno', '', '', '', '', '', 0, 0, 1, 0, 1),
(19, 4, '[正品火车头]3号足球', '[正品火车头]3号足球', '28.0', '28.0', 176, 'images/goods/17.jpg', '3', 'hct', '', '', '', '', '', 1, 0, 0, 0, 1),
(20, 4, '[正品火车头]5号足球', '[正品火车头]5号足球', '88.0', '88.0', 156, 'images/goods/18.jpg', '5', 'hct', '', '', '', '', '', 0, 1, 0, 0, 1),
(21, 4, '[正品火车头]3号足球', '[正品火车头]3号足球', '28.0', '28.0', 176, 'images/goods/19.jpg', '3', 'hct', '', '', '', '', '', 0, 1, 1, 0, 1),
(22, 4, '[正品火车头]5号足球', '[正品火车头]5号足球', '88.0', '88.0', 156, 'images/goods/20.jpg', '5', 'hct', '', '', '', '', '', 0, 0, 0, 1, 1),
(23, 4, '[正品世达S32S] 5号训练足球', '[正品火车头S32S] 5号足球', '108.0', '108.0', 46, 'images/goods/21.jpg', '5', 'star', '', '', '', '', '', 0, 1, 1, 0, 1),
(24, 4, '[正品世达VP32] 5号训练足球', '[正品火车头VP32] 5号足球 PU材质', '50.0', '50.0', 53, 'images/goods/22.jpg', '5', 'star', '', '', '', '', '', 0, 1, 0, 0, 1),
(25, 4, '[正品世达SB525] 5号训练足球', '[正品火车头SB525]5号训练足球', '111.0', '111.0', 45, 'images/goods/23.jpg', '5', 'star', '', '', '', '', '', 0, 1, 1, 0, 0),
(26, 4, '[正品世达ME505] 5号训练足球 ', '[正品火车头ME505]5号训练足球', '112.0', '112.0', 112, 'images/goods/24.jpg', '5', 'star', '', '', '', '', '', 1, 1, 0, 0, 1),
(27, 1, '[PUMA正品]14-15赛季阿森纳夹克T7', '[PUMA正品]14-15赛季阿森纳夹克T7', '245.0', '245.0', 15, 'images/goods/25.jpg', 'S,M,L,XL', 'puma', 'http://gd1.alicdn.com/imgextra/i1/2207518978/TB2B4h5aFXXXXc5XXXXXXXXXXXX_!!2207518978.jpg,http://gd3.alicdn.com/imgextra/i3/2207518978/TB26IF4aFXXXXXNXpXXXXXXXXXX_!!2207518978.jpg,http://gd1.alicdn.com/imgextra/i1/2207518978/TB2Q.N0aFXXXXbwXpXXXXXXXXXX_!!2207518978.jpg,http://gd4.alicdn.com/imgextra/i4/2207518978/TB2jIaXaFXXXXaKXXXXXXXXXXXX_!!2207518978.jpg', '颜色分类: 蓝色 红色足球服版本: 球迷版上下装分类: 长款套装主客场: 主场上市时间: 2014年尺码: S M L XL英超: 阿森纳适用对象: 男', 'http://gd4.alicdn.com/bao/uploaded/i4/TB1ceTwGXXXXXXsXpXXXXXXXXXX_!!0-item_pic.jpg_50x50.jpg_.webp,http://gd1.alicdn.com/imgextra/i1/2207518978/TB26lV9aFXXXXb1XXXXXXXXXXXX_!!2207518978.jpg_50x50.jpg_.webp', 'http://gd4.alicdn.com/bao/uploaded/i4/TB1ceTwGXXXXXXsXpXXXXXXXXXX_!!0-item_pic.jpg_400x400.jpg_.webp,http://gd1.alicdn.com/imgextra/i1/2207518978/TB26lV9aFXXXXb1XXXXXXXXXXXX_!!2207518978.jpg_400x400.jpg_.webp', '', 0, 1, 0, 0, 1),
(28, 3, '[adidas正品]2014新 TF碎丁足球鞋 M25048', '[adidas正品]2014新 TF碎丁足球鞋 M25048 梅西F50', '359.0', '359.0', 47, 'images/goods/26.jpg', '42,43,44', 'adidas', 'http://img02.taobaocdn.com/imgextra/i2/114746002/TB2fKlaaXXXXXaEXpXXXXXXXXXX-114746002.jpg_.webp,http://img01.taobaocdn.com/imgextra/i1/114746002/TB2D56gaVXXXXawXXXXXXXXXXXX_!!114746002.jpg_.webp,http://img03.taobaocdn.com/imgextra/i3/114746002/TB2pQfbaVXXXXaTXpXXXXXXXXXX-114746002.jpg_.webp,http://img03.taobaocdn.com/imgextra/i3/114746002/TB2pQfbaVXXXXaTXpXXXXXXXXXX-114746002.jpg_.webp', '【商品简介】\r\n\r\n品名：adidas团队基础训练足球鞋\r\n\r\n \r\n\r\n产地：越南\r\n\r\n \r\n\r\n \r\n\r\nTF：TURF（塑胶草场）适用于较硬的泥沙地和人造塑胶颗粒的场地，俗称“碎钉”\r\n\r\n碎钉足球鞋是足球运动员比赛或训练时穿的一种足球鞋。所谓“碎钉”是指其鞋底有密集排列的突起物，而且大多是呈不规则排列的，以起到防滑的作用。', 'http://gi3.md.alicdn.com/bao/uploaded/i3/TB1yNzSGFXXXXagaXXXXXXXXXXX_!!0-item_pic.jpg_60x60q90.jpg,http://gi4.md.alicdn.com/imgextra/i4/114746002/TB23X.sapXXXXaVXXXXXXXXXXXX_!!114746002.jpg_60x60q90.jpg', 'http://gi3.md.alicdn.com/bao/uploaded/i3/TB1yNzSGFXXXXagaXXXXXXXXXXX_!!0-item_pic.jpg_430x430q90.jpg,http://gi4.md.alicdn.com/imgextra/i4/114746002/TB23X.sapXXXXaVXXXXXXXXXXXX_!!114746002.jpg_430x430q90.jpg', '', 0, 1, 0, 0, 1),
(29, 3, '[Umbro茵宝]碎丁PU皮足球鞋U6', '[Umbro茵宝]碎丁PU皮足球鞋U6', '109.0', '109.0', 232, 'images/goods/27.jpg', '41,42,43', 'umbro', 'http://img04.taobaocdn.com/imgextra/i4/660796023/TB2xu5haXXXXXcvXXXXXXXXXXXX-660796023.jpg_.webp,http://img01.taobaocdn.com/imgextra/i1/660796023/TB2gxCfaXXXXXb2XXXXXXXXXXXX-660796023.jpg_.webp', '产品参数： 产品名称：Umbro/茵宝 男子足球鞋U6...颜色分类: 黑/狂野红/白 黑/白/活力蓝款号: U61178品牌: Umbro/茵宝上市时间: 2014年秋季吊牌价: 320性别: 男子帮面材质: PU运动鞋外底: 塑料适用场地: 人造草地功能: 耐磨 包裹性运动鞋科技: 专业鞋码: 40 （预计12月15日发货） 41 （预计12月15日发货） 42 （预计12月15日发货） 43 （预计12月15日发货） 44（预计12月15日发货） 官方正品 假一赔十是否瑕疵: 否', 'http://gi1.md.alicdn.com/bao/uploaded/i1/T1HSWJFgdgXXXXXXXX_!!0-item_pic.jpg_60x60q90.jpg,http://gi3.md.alicdn.com/imgextra/i3/660796023/TB2G9NsXFXXXXb0XpXXXXXXXXXX_!!660796023.jpg_60x60q90.jpg,http://gi4.md.alicdn.com/imgextra/i4/660796023/TB2LIakXVXXXXaGXXXXXXXXXXXX_!!660796023.jpg_60x60q90.jpg', 'http://gi1.md.alicdn.com/bao/uploaded/i1/T1HSWJFgdgXXXXXXXX_!!0-item_pic.jpg_430x430q90.jpg,http://gi3.md.alicdn.com/imgextra/i3/660796023/TB2G9NsXFXXXXb0XpXXXXXXXXXX_!!660796023.jpg_430x430q90.jpg,http://gi4.md.alicdn.com/imgextra/i4/660796023/TB2LIakXVXXXXaGXXXXXXXXXXXX_!!660796023.jpg_430x430q90.jpg', '', 1, 0, 1, 0, 1),
(30, 4, '[adidas正品]欧冠训练足球 4号 F93312', '[adidas正品]欧冠训练足球 4号 F93312', '319.0', '319.0', 23, 'images/goods/28.jpg', '4', 'adidas', '', '', '', '', '', 0, 1, 0, 0, 1);

-- --------------------------------------------------------

--
-- 表的结构 `hy_node`
--

CREATE TABLE IF NOT EXISTS `hy_node` (
`id` smallint(6) unsigned NOT NULL,
  `name` varchar(20) NOT NULL,
  `title` varchar(50) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '0',
  `remark` varchar(255) DEFAULT NULL,
  `sort` smallint(6) unsigned DEFAULT NULL,
  `pid` smallint(6) unsigned NOT NULL,
  `level` tinyint(1) unsigned NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=40 ;

--
-- 转存表中的数据 `hy_node`
--

INSERT INTO `hy_node` (`id`, `name`, `title`, `status`, `remark`, `sort`, `pid`, `level`) VALUES
(14, 'Node', '节点管理', 1, '节点管理', 0, 8, 2),
(8, 'Admin', '应用中心', 1, '', 0, 0, 1),
(10, 'role', '角色管理', 1, '角色管理', 0, 8, 2),
(15, 'User', '后台用户', 1, '后台用户', 0, 8, 2),
(13, 'Index', '管理首页', 1, '管理首页', 0, 8, 2),
(16, 'Cate', '分类管理', 1, '分类管理', 1, 8, 2),
(20, 'Members', '后台会员管理', 1, '后台会员管理', 0, 8, 2),
(18, 'Products', '产品管理', 1, '产品管理', 0, 8, 2),
(21, 'Brand', '品牌管理', 1, '品牌管理', 0, 8, 2),
(22, 'Article_cate', '文章类别管理', 1, '文章类别管理', 0, 8, 2),
(23, 'Article', '文章管理', 1, '文章管理', 0, 8, 2),
(24, 'Coupon', '优惠券管理', 1, '优惠券管理', 0, 8, 2),
(25, 'Currencies', '汇率管理', 1, '汇率管理', 0, 8, 2),
(26, 'Ipblock', 'IP封锁管理', 1, 'IP封锁管理', 0, 8, 2),
(27, 'Nav', '导航管理', 1, '导航管理', 0, 8, 2),
(28, 'Orders', '订单管理', 1, '订单管理', 0, 8, 2),
(29, 'Products_ask', '产品询问管理', 1, '产品询问管理', 0, 8, 2),
(30, 'Products', '产品管理', 1, '产品管理', 0, 8, 2),
(31, 'Setting', '系统设置管理', 1, '系统设置管理', 0, 8, 2),
(32, 'Shipping_area', '送货区域管理', 1, '送货区域管理', 0, 8, 2),
(33, 'Sqlbackup', '数据库备份管理', 1, '数据库备份管理', 0, 8, 2),
(34, 'Type', '产品类型管理', 1, '产品类型管理', 0, 8, 2),
(35, 'Virtualcat', '虚拟分类管理', 1, '虚拟分类管理', 0, 8, 2),
(37, 'index', '欢迎页面', 1, '', 0, 13, 3),
(38, 'loginOut', '退出登录', 1, '', 0, 13, 3),
(39, 'articlelist', '文章列表', 1, '', 0, 23, 3);

-- --------------------------------------------------------

--
-- 表的结构 `hy_orders`
--

CREATE TABLE IF NOT EXISTS `hy_orders` (
`order_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `address_id` int(10) unsigned NOT NULL,
  `remark` varchar(250) NOT NULL,
  `status` tinyint(3) unsigned NOT NULL,
  `add_time` int(10) unsigned NOT NULL,
  `pay_time` int(10) unsigned NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `billno` varchar(50) NOT NULL,
  `pay_method` varchar(20) NOT NULL,
  `is_delete` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=55 ;

--
-- 转存表中的数据 `hy_orders`
--

INSERT INTO `hy_orders` (`order_id`, `user_id`, `address_id`, `remark`, `status`, `add_time`, `pay_time`, `total_price`, `billno`, `pay_method`, `is_delete`) VALUES
(51, 4, 3, '', 2, 1420595852, 0, '1448.00', 'HY1420595852', 'Alipay', 0),
(52, 4, 2, '', 2, 1420595894, 0, '1298.00', 'HY1420595894', 'Alipay', 0),
(53, 4, 3, '', 3, 1420595928, 0, '798.00', 'HY1420595928', 'Alipay', 0),
(54, 4, 2, '', 0, 1420707752, 0, '1797.00', 'HY1420707752', 'Alipay', 0);

-- --------------------------------------------------------

--
-- 表的结构 `hy_order_goods`
--

CREATE TABLE IF NOT EXISTS `hy_order_goods` (
`order_goods_id` int(10) unsigned NOT NULL,
  `order_id` int(10) unsigned NOT NULL,
  `goods_id` int(10) unsigned NOT NULL,
  `goods_num` smallint(5) unsigned NOT NULL,
  `total_money` decimal(10,2) unsigned NOT NULL,
  `goods_attr` varchar(50) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=55 ;

--
-- 转存表中的数据 `hy_order_goods`
--

INSERT INTO `hy_order_goods` (`order_goods_id`, `order_id`, `goods_id`, `goods_num`, `total_money`, `goods_attr`) VALUES
(47, 51, 11, 1, '1099.00', '\n									43								'),
(48, 51, 8, 1, '299.00', '\n									XL								'),
(49, 51, 24, 1, '50.00', '\n									5								'),
(50, 52, 6, 1, '299.00', '\n									M								'),
(51, 52, 12, 1, '999.00', '\n									42								'),
(52, 53, 5, 2, '798.00', '\n									L								'),
(53, 54, 3, 2, '798.00', '\n									M								'),
(54, 54, 12, 1, '999.00', '\n									43								');

-- --------------------------------------------------------

--
-- 表的结构 `hy_role`
--

CREATE TABLE IF NOT EXISTS `hy_role` (
`id` smallint(6) unsigned NOT NULL,
  `name` varchar(20) NOT NULL,
  `pid` smallint(6) DEFAULT NULL,
  `status` tinyint(1) unsigned DEFAULT NULL,
  `remark` varchar(255) DEFAULT NULL,
  `sort` int(11) DEFAULT '0'
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- 转存表中的数据 `hy_role`
--

INSERT INTO `hy_role` (`id`, `name`, `pid`, `status`, `remark`, `sort`) VALUES
(1, '系统管理员', 0, 1, NULL, 0),
(2, '产品操作员', 1, 1, NULL, 0),
(7, '市场推广员', 1, 1, NULL, 0),
(15, '', 0, 1, NULL, 0),
(14, '', 0, 1, NULL, 0),
(16, '', 0, 1, NULL, 0);

-- --------------------------------------------------------

--
-- 表的结构 `hy_role_user`
--

CREATE TABLE IF NOT EXISTS `hy_role_user` (
  `role_id` mediumint(9) unsigned DEFAULT NULL,
  `user_id` char(32) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `hy_role_user`
--

INSERT INTO `hy_role_user` (`role_id`, `user_id`) VALUES
(2, '35'),
(7, '35'),
(2, '37'),
(1, '35'),
(7, '41'),
(2, '40'),
(8, '41'),
(1, '41'),
(1, '39'),
(2, '41'),
(2, '42'),
(7, '43');

-- --------------------------------------------------------

--
-- 表的结构 `hy_user`
--

CREATE TABLE IF NOT EXISTS `hy_user` (
`uid` int(10) unsigned NOT NULL,
  `uname` varchar(16) NOT NULL,
  `password` varchar(32) NOT NULL,
  `email` varchar(32) NOT NULL,
  `head_image` varchar(30) NOT NULL,
  `balance` smallint(6) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- 转存表中的数据 `hy_user`
--

INSERT INTO `hy_user` (`uid`, `uname`, `password`, `email`, `head_image`, `balance`) VALUES
(3, 'd1', '827ccb0eea8a706c4c34a16891f84e7b', '3453@qq.com', '', 0),
(4, 'tt', '827ccb0eea8a706c4c34a16891f84e7b', '8456456@126.com', 'images/head/4.jpg', 0),
(8, 'dh', 'e10adc3949ba59abbe56e057f20f883e', '3242@qq.com', 'images/head/8.jpg', 0),
(9, 'dhy7', 'e10adc3949ba59abbe56e057f20f883e', '8334@qq.com', '', 0),
(10, 'dhy123', '827ccb0eea8a706c4c34a16891f84e7b', '8423@qq.com', '', 0),
(11, 'dhy1234', '0c2c919f80dadc3c02b649ff3ec58c4f', '8344@qq.com', '', 0),
(12, 'dhy', 'dfac89ba091dcbf2cbcc8c8fa4dbb49a', '835399559@qq.com', '', 0);

-- --------------------------------------------------------

--
-- 表的结构 `hy_userinfo`
--

CREATE TABLE IF NOT EXISTS `hy_userinfo` (
  `user_id` int(10) unsigned NOT NULL,
  `balance` smallint(6) NOT NULL,
  `integral` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `hy_user_address`
--

CREATE TABLE IF NOT EXISTS `hy_user_address` (
`address_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `province` varchar(20) NOT NULL COMMENT '省',
  `city` varchar(20) NOT NULL COMMENT '市',
  `country` varchar(20) NOT NULL COMMENT '县',
  `street` varchar(120) NOT NULL COMMENT '街道',
  `tel` varchar(12) NOT NULL,
  `postcode` varchar(10) NOT NULL,
  `consignee` varchar(20) NOT NULL COMMENT '签收人',
  `is_default` tinyint(4) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `hy_user_address`
--

INSERT INTO `hy_user_address` (`address_id`, `user_id`, `province`, `city`, `country`, `street`, `tel`, `postcode`, `consignee`, `is_default`) VALUES
(2, 4, '重庆市', '重庆市', '北碚区', '随碟附送', '1464543553', '1124445', '到底', 0),
(3, 4, '辽宁省', '本溪市', '南芬区', '是否反反复复', '18352332612', '232345', '丁浩宇', 1);

-- --------------------------------------------------------

--
-- 表的结构 `hy_user_admin`
--

CREATE TABLE IF NOT EXISTS `hy_user_admin` (
`id` smallint(5) unsigned NOT NULL,
  `account` varchar(64) NOT NULL,
  `nickname` varchar(50) NOT NULL,
  `password` char(32) NOT NULL,
  `bind_account` varchar(50) NOT NULL,
  `last_login_time` int(11) unsigned DEFAULT '0',
  `last_login_ip` varchar(40) DEFAULT NULL,
  `login_count` mediumint(8) unsigned DEFAULT '0',
  `verify` varchar(32) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `remark` varchar(255) NOT NULL,
  `create_time` int(11) unsigned NOT NULL,
  `update_time` int(11) unsigned NOT NULL,
  `status` tinyint(1) DEFAULT '0',
  `type_id` tinyint(2) unsigned DEFAULT '0',
  `isadministrator` tinyint(1) DEFAULT '0',
  `info` text NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=44 ;

--
-- 转存表中的数据 `hy_user_admin`
--

INSERT INTO `hy_user_admin` (`id`, `account`, `nickname`, `password`, `bind_account`, `last_login_time`, `last_login_ip`, `login_count`, `verify`, `email`, `remark`, `create_time`, `update_time`, `status`, `type_id`, `isadministrator`, `info`) VALUES
(35, 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', '', 1424065220, '127.0.0.1', 0, NULL, '', '', 0, 0, 1, 0, 1, ''),
(42, 'test', 'test', '098f6bcd4621d373cade4e832627b4f6', '', 1327492801, '180.111.131.146', 0, NULL, '', '', 0, 0, 1, 0, 0, ''),
(41, 'jishu', 'jishu', '2231311d8c15695a4963de6395808883', '', 1316503640, '110.85.75.92', 0, NULL, '', '', 0, 0, 1, 0, 1, ''),
(43, 'test2', 'test2', 'ad0234829205b9033196ba818f7a872b', '', 0, NULL, 0, NULL, '', 'test2', 0, 0, 1, 0, 1, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hy_access`
--
ALTER TABLE `hy_access`
 ADD KEY `groupId` (`role_id`) USING BTREE, ADD KEY `nodeId` (`node_id`) USING BTREE;

--
-- Indexes for table `hy_cart`
--
ALTER TABLE `hy_cart`
 ADD PRIMARY KEY (`cart_id`), ADD KEY `user_id` (`user_id`,`goods_id`), ADD KEY `goods_id` (`goods_id`);

--
-- Indexes for table `hy_category`
--
ALTER TABLE `hy_category`
 ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `hy_collect`
--
ALTER TABLE `hy_collect`
 ADD PRIMARY KEY (`id`), ADD KEY `user_id` (`user_id`,`goods_id`);

--
-- Indexes for table `hy_comment`
--
ALTER TABLE `hy_comment`
 ADD PRIMARY KEY (`comm_id`), ADD KEY `user_id` (`user_id`,`goods_id`), ADD KEY `goods_id` (`goods_id`);

--
-- Indexes for table `hy_goods`
--
ALTER TABLE `hy_goods`
 ADD PRIMARY KEY (`gid`), ADD UNIQUE KEY `gid` (`gid`), ADD KEY `cid` (`cid`), ADD KEY `gid_2` (`gid`);

--
-- Indexes for table `hy_node`
--
ALTER TABLE `hy_node`
 ADD PRIMARY KEY (`id`), ADD KEY `level` (`level`) USING BTREE, ADD KEY `pid` (`pid`) USING BTREE, ADD KEY `status` (`status`) USING BTREE, ADD KEY `name` (`name`) USING BTREE;

--
-- Indexes for table `hy_orders`
--
ALTER TABLE `hy_orders`
 ADD PRIMARY KEY (`order_id`), ADD KEY `user_id` (`user_id`,`address_id`), ADD KEY `user_id_2` (`user_id`), ADD KEY `address_id` (`address_id`);

--
-- Indexes for table `hy_order_goods`
--
ALTER TABLE `hy_order_goods`
 ADD PRIMARY KEY (`order_goods_id`), ADD KEY `order_id` (`order_id`,`goods_id`);

--
-- Indexes for table `hy_role`
--
ALTER TABLE `hy_role`
 ADD PRIMARY KEY (`id`), ADD KEY `pid` (`pid`) USING BTREE, ADD KEY `status` (`status`) USING BTREE;

--
-- Indexes for table `hy_role_user`
--
ALTER TABLE `hy_role_user`
 ADD KEY `group_id` (`role_id`) USING BTREE, ADD KEY `user_id` (`user_id`) USING BTREE;

--
-- Indexes for table `hy_user`
--
ALTER TABLE `hy_user`
 ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `hy_userinfo`
--
ALTER TABLE `hy_userinfo`
 ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `hy_user_address`
--
ALTER TABLE `hy_user_address`
 ADD PRIMARY KEY (`address_id`), ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `hy_user_admin`
--
ALTER TABLE `hy_user_admin`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `account` (`account`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hy_cart`
--
ALTER TABLE `hy_cart`
MODIFY `cart_id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `hy_category`
--
ALTER TABLE `hy_category`
MODIFY `cid` smallint(5) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `hy_collect`
--
ALTER TABLE `hy_collect`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `hy_comment`
--
ALTER TABLE `hy_comment`
MODIFY `comm_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `hy_goods`
--
ALTER TABLE `hy_goods`
MODIFY `gid` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `hy_node`
--
ALTER TABLE `hy_node`
MODIFY `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT for table `hy_orders`
--
ALTER TABLE `hy_orders`
MODIFY `order_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=55;
--
-- AUTO_INCREMENT for table `hy_order_goods`
--
ALTER TABLE `hy_order_goods`
MODIFY `order_goods_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=55;
--
-- AUTO_INCREMENT for table `hy_role`
--
ALTER TABLE `hy_role`
MODIFY `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `hy_user`
--
ALTER TABLE `hy_user`
MODIFY `uid` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `hy_user_address`
--
ALTER TABLE `hy_user_address`
MODIFY `address_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `hy_user_admin`
--
ALTER TABLE `hy_user_admin`
MODIFY `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=44;
--
-- 限制导出的表
--

--
-- 限制表 `hy_cart`
--
ALTER TABLE `hy_cart`
ADD CONSTRAINT `hy_cart_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `hy_user` (`uid`),
ADD CONSTRAINT `hy_cart_ibfk_2` FOREIGN KEY (`goods_id`) REFERENCES `hy_goods` (`gid`);

--
-- 限制表 `hy_collect`
--
ALTER TABLE `hy_collect`
ADD CONSTRAINT `hy_collect_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `hy_user` (`uid`);

--
-- 限制表 `hy_comment`
--
ALTER TABLE `hy_comment`
ADD CONSTRAINT `hy_comment_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `hy_user` (`uid`),
ADD CONSTRAINT `hy_comment_ibfk_2` FOREIGN KEY (`goods_id`) REFERENCES `hy_goods` (`gid`);

--
-- 限制表 `hy_goods`
--
ALTER TABLE `hy_goods`
ADD CONSTRAINT `hy_goods_ibfk_1` FOREIGN KEY (`cid`) REFERENCES `hy_category` (`cid`);

--
-- 限制表 `hy_order_goods`
--
ALTER TABLE `hy_order_goods`
ADD CONSTRAINT `hy_order_goods_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `hy_orders` (`order_id`);

--
-- 限制表 `hy_userinfo`
--
ALTER TABLE `hy_userinfo`
ADD CONSTRAINT `hy_userinfo_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `hy_user` (`uid`);

--
-- 限制表 `hy_user_address`
--
ALTER TABLE `hy_user_address`
ADD CONSTRAINT `hy_user_address_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `hy_user` (`uid`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
