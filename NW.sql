/*
Navicat MySQL Data Transfer

Source Server         : LOCALHOST
Source Server Version : 50617
Source Host           : 127.0.0.1:3306
Source Database       : ceb_app

Target Server Type    : MYSQL
Target Server Version : 50617
File Encoding         : 65001

Date: 2021-12-23 14:45:26
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for bandwidth_details
-- ----------------------------
DROP TABLE IF EXISTS `bandwidth_details`;
CREATE TABLE `bandwidth_details` (
  `bandwidth_id` int(11) NOT NULL AUTO_INCREMENT,
  `bandwidth_name` varchar(255) DEFAULT NULL,
  `bandwidth_status` int(11) DEFAULT NULL,
  PRIMARY KEY (`bandwidth_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bandwidth_details
-- ----------------------------
INSERT INTO `bandwidth_details` VALUES ('1', '128', null);
INSERT INTO `bandwidth_details` VALUES ('2', '256', null);
INSERT INTO `bandwidth_details` VALUES ('3', '512', null);
INSERT INTO `bandwidth_details` VALUES ('4', '1024', null);
INSERT INTO `bandwidth_details` VALUES ('5', '2048', null);

-- ----------------------------
-- Table structure for category_details
-- ----------------------------
DROP TABLE IF EXISTS `category_details`;
CREATE TABLE `category_details` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(255) DEFAULT NULL,
  `category_status` int(11) DEFAULT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of category_details
-- ----------------------------
INSERT INTO `category_details` VALUES ('1', 'ATM', null);
INSERT INTO `category_details` VALUES ('2', 'Branch', null);
INSERT INTO `category_details` VALUES ('3', 'CDM', null);
INSERT INTO `category_details` VALUES ('4', 'Mobile Truck', null);

-- ----------------------------
-- Table structure for ceb_access_permission
-- ----------------------------
DROP TABLE IF EXISTS `ceb_access_permission`;
CREATE TABLE `ceb_access_permission` (
  `access_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `access_user_id` smallint(5) unsigned NOT NULL,
  `access_page_id` tinyint(3) unsigned NOT NULL,
  `access_status` tinyint(3) unsigned NOT NULL,
  PRIMARY KEY (`access_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of ceb_access_permission
-- ----------------------------
INSERT INTO `ceb_access_permission` VALUES ('1', '1', '1', '1');
INSERT INTO `ceb_access_permission` VALUES ('2', '1', '2', '1');
INSERT INTO `ceb_access_permission` VALUES ('3', '1', '3', '1');
INSERT INTO `ceb_access_permission` VALUES ('4', '1', '4', '1');
INSERT INTO `ceb_access_permission` VALUES ('5', '2', '2', '1');
INSERT INTO `ceb_access_permission` VALUES ('6', '2', '3', '1');
INSERT INTO `ceb_access_permission` VALUES ('7', '2', '4', '1');
INSERT INTO `ceb_access_permission` VALUES ('8', '2', '1', '1');

-- ----------------------------
-- Table structure for ceb_area
-- ----------------------------
DROP TABLE IF EXISTS `ceb_area`;
CREATE TABLE `ceb_area` (
  `area_id` smallint(6) NOT NULL AUTO_INCREMENT,
  `area_code` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `area_description` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `area_entered_by` smallint(6) NOT NULL,
  `area_date_time` datetime NOT NULL,
  `area_status` tinyint(1) NOT NULL,
  `area_last_update_by` smallint(6) DEFAULT NULL,
  `area_sub_description` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`area_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of ceb_area
-- ----------------------------
INSERT INTO `ceb_area` VALUES ('1', '01', 'Kegalle - Area Office', '1', '2019-12-11 01:58:01', '1', null, 'Kegalle - Area Office');
INSERT INTO `ceb_area` VALUES ('2', '01', 'Kegalle - Area Office', '1', '2019-12-11 19:24:32', '1', null, 'Kegalle');
INSERT INTO `ceb_area` VALUES ('3', '01', 'Kegalle - Area Office', '1', '2019-12-11 19:24:32', '1', null, 'Thulhiriya');
INSERT INTO `ceb_area` VALUES ('4', '01', 'Kegalle - Area Office', '1', '2019-12-11 19:24:32', '1', null, 'Rambukkana');
INSERT INTO `ceb_area` VALUES ('5', '01', 'Kegalle - Area Office', '1', '2019-12-11 19:24:32', '1', null, 'Moronthota');

-- ----------------------------
-- Table structure for ceb_last_session
-- ----------------------------
DROP TABLE IF EXISTS `ceb_last_session`;
CREATE TABLE `ceb_last_session` (
  `last_user_id` smallint(5) unsigned NOT NULL,
  `last_session_id` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `last_ip` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`last_user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of ceb_last_session
-- ----------------------------
INSERT INTO `ceb_last_session` VALUES ('1', '5mj7sak3l6knq2muc5gglikl99u2ds58', '172.16.1.186');
INSERT INTO `ceb_last_session` VALUES ('2', 'edbj7k4rk5it1u8b6aavk9mvn1n7ppd1', '::1');

-- ----------------------------
-- Table structure for ceb_log_catalog
-- ----------------------------
DROP TABLE IF EXISTS `ceb_log_catalog`;
CREATE TABLE `ceb_log_catalog` (
  `log_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `log_session_id` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `log_ip` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `log_user_id` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `log_login_time` datetime NOT NULL,
  `log_logout_time` datetime DEFAULT NULL,
  PRIMARY KEY (`log_id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of ceb_log_catalog
-- ----------------------------
INSERT INTO `ceb_log_catalog` VALUES ('1', 'ti6740v8editibl5dsvmt35pm6b5ajqh', '::1', '1', '2019-12-22 20:10:35', '2019-12-22 16:50:21');
INSERT INTO `ceb_log_catalog` VALUES ('2', 'edbj7k4rk5it1u8b6aavk9mvn1n7ppd1', '::1', '2', '2019-12-22 18:50:30', '2019-12-22 18:51:30');
INSERT INTO `ceb_log_catalog` VALUES ('3', 'r6gbfj37ku6aca4m7epg1aiff3k6f5f1', '::1', '1', '2020-01-09 08:38:13', null);
INSERT INTO `ceb_log_catalog` VALUES ('4', 'rdierlj51bjqeq28eogd6vv24p75bhn6', '::1', '1', '2020-02-07 10:31:37', null);
INSERT INTO `ceb_log_catalog` VALUES ('5', '7pgm6nsr3nvt34pcav4brac4vcm7a9i1', '::1', '1', '2020-07-17 15:33:22', '2020-07-17 15:35:56');
INSERT INTO `ceb_log_catalog` VALUES ('6', 'i3bd62fre2uut1dlrcsguo1b7hbeergm', '172.16.1.185', '1', '2020-07-29 09:55:03', null);
INSERT INTO `ceb_log_catalog` VALUES ('7', 'i3bd62fre2uut1dlrcsguo1b7hbeergm', '172.16.1.185', '1', '2020-07-29 09:57:13', null);
INSERT INTO `ceb_log_catalog` VALUES ('8', 'hgtmd4l0d57bfqdg6jdpoqv0734vfscp', '172.16.1.185', '1', '2020-07-30 07:51:36', null);
INSERT INTO `ceb_log_catalog` VALUES ('9', 'pav2gtkh9nt648s730sdl1hopif6jldm', '172.16.1.185', '1', '2020-07-30 14:31:46', null);
INSERT INTO `ceb_log_catalog` VALUES ('10', 'm0ale73li8uh9r9q08fgc3sor6th6j3i', '172.16.1.134', '1', '2020-07-30 16:20:13', null);
INSERT INTO `ceb_log_catalog` VALUES ('11', 'dfseed73geghhsk5m4r5nc5lifr4aa47', '172.16.1.162', '1', '2020-07-30 16:24:32', null);
INSERT INTO `ceb_log_catalog` VALUES ('12', 'ehmhrp8kj37vbcfjk7fd6hrndedatidt', '172.16.1.185', '1', '2020-08-05 08:10:12', null);
INSERT INTO `ceb_log_catalog` VALUES ('13', 'fcbe3r58luugkkc1slsgjbpi31jf42qh', '172.16.1.185', '1', '2021-12-08 15:58:53', null);
INSERT INTO `ceb_log_catalog` VALUES ('14', 's40916m1qctp46rmiind1vgkc819b1fi', '172.16.1.197', '1', '2021-12-09 13:40:56', null);
INSERT INTO `ceb_log_catalog` VALUES ('15', 'op2bcr0jt7rpmjgqr8r1j89igttapmjj', '172.16.1.186', '1', '2021-12-09 15:29:50', null);
INSERT INTO `ceb_log_catalog` VALUES ('16', '22um7nevceqgsbf2d339nfgvb3vi4cth', '172.16.1.186', '1', '2021-12-22 12:07:29', null);
INSERT INTO `ceb_log_catalog` VALUES ('17', 'dk8bqk16lmt16t0tvpdnmeu3sh1ktds3', '172.16.1.186', '1', '2021-12-22 14:53:59', null);
INSERT INTO `ceb_log_catalog` VALUES ('18', '5mj7sak3l6knq2muc5gglikl99u2ds58', '172.16.1.186', '1', '2021-12-23 09:12:25', null);

-- ----------------------------
-- Table structure for ceb_page_names
-- ----------------------------
DROP TABLE IF EXISTS `ceb_page_names`;
CREATE TABLE `ceb_page_names` (
  `page_id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `page_name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `page_viewname` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `page_type` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `page_create_date` date NOT NULL,
  `page_status` tinyint(3) unsigned NOT NULL,
  PRIMARY KEY (`page_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of ceb_page_names
-- ----------------------------
INSERT INTO `ceb_page_names` VALUES ('1', 'home', 'Home Page', 'Home', '2019-11-24', '2');
INSERT INTO `ceb_page_names` VALUES ('2', 'application', 'Application Forms', 'Application', '2019-11-24', '1');
INSERT INTO `ceb_page_names` VALUES ('3', 'password_reset', 'Password Reset', 'User Settings', '2019-11-24', '1');
INSERT INTO `ceb_page_names` VALUES ('4', 'user_details', 'User Management', 'Master Data', '2019-11-24', '1');
INSERT INTO `ceb_page_names` VALUES ('5', 'area_code', 'Area Details', 'Master Data', '2019-11-24', '0');

-- ----------------------------
-- Table structure for ceb_system_users
-- ----------------------------
DROP TABLE IF EXISTS `ceb_system_users`;
CREATE TABLE `ceb_system_users` (
  `system_user_id` smallint(3) NOT NULL AUTO_INCREMENT,
  `system_user_name` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `system_user_full_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `system_user_password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `system_user_area_id` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  ` system_user_category` tinyint(2) DEFAULT NULL,
  `system_user_status` tinyint(1) NOT NULL,
  `system_user_entered_by` int(11) DEFAULT NULL,
  `system_user_date_time` datetime DEFAULT NULL,
  PRIMARY KEY (`system_user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of ceb_system_users
-- ----------------------------
INSERT INTO `ceb_system_users` VALUES ('1', 'thilina', 'Thilina Promoth', '81dc9bdb52d04dc20036dbd8313ed055', '1', '0', '5', null, null);
INSERT INTO `ceb_system_users` VALUES ('2', 'harsha', 'Harshamal Wijesinghe', '226280c5dd9b1bd4e67c72ff2c94bf1b', '1', null, '1', '1', '2019-12-22 18:47:45');

-- ----------------------------
-- Table structure for com_branch
-- ----------------------------
DROP TABLE IF EXISTS `com_branch`;
CREATE TABLE `com_branch` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `branch_code` int(11) NOT NULL,
  `branch_description` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT '1',
  `b_office_no` varchar(255) DEFAULT NULL,
  `b_email` varchar(255) DEFAULT NULL,
  `b_fax` varchar(255) DEFAULT NULL,
  `brn_province` int(11) DEFAULT NULL,
  `brn_district` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`,`branch_code`),
  KEY `branch_code` (`branch_code`)
) ENGINE=InnoDB AUTO_INCREMENT=313 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of com_branch
-- ----------------------------
INSERT INTO `com_branch` VALUES ('1', '10', 'Head Office', 'No. 933, Kandy Road, Wedamulla, Kelaniya.', '1', '0112035454', 'info@rdb.lk', '011-2302360', null, null);
INSERT INTO `com_branch` VALUES ('3', '1010', 'Bulathsinhala', 'No 153,  Main Street,  Bulathsinhala  ', '1', '0342283166', 'bulathsinhala@rdb.lk', '034-2283166', '1', '3');
INSERT INTO `com_branch` VALUES ('4', '1020', 'Walagedara', 'Galmatta Junction,  Walagedara    ', '1', '0342274469', 'walagedara@rdb.lk', '', '1', '3');
INSERT INTO `com_branch` VALUES ('5', '1030', 'Agalawatta', 'No 96, Mathugama Rd, Agalawattha', '0', '0342247448', 'agalawaththa@rdb.lk', '034-2247448', '1', '3');
INSERT INTO `com_branch` VALUES ('6', '1040', 'Millaniya', 'Moronthuduwa Rd,  Millaniya  ', '1', '0342252351', 'millaniya@rdb.lk', '034-2252351', '1', '3');
INSERT INTO `com_branch` VALUES ('7', '1050', 'Gonapola', 'Gonapola Junction,  Gonapola   ', '1', '0342257327', 'gonapola@rdb.lk', '034-2257327', '1', '3');
INSERT INTO `com_branch` VALUES ('8', '1060', 'Moranthuduwa', 'No 65,  Wadduwa Rd,  Moranthuduwa.  ', '1', '0382234426', 'moranthuduwa@rdb.lk', '038-2234426', '1', '3');
INSERT INTO `com_branch` VALUES ('9', '1070', 'Beruwala', 'No 199 A, Galle Rd,  Beruwala    ', '1', '0342276170', 'beruwala@rdb.lk', '034-2276170', '1', '3');
INSERT INTO `com_branch` VALUES ('10', '1080', 'Panadura', 'No 474/4,  Athar V Dias Mw,  Panadura', '1', '0382234776', 'panadura@rdb.lk', '038-2234776', '1', '3');
INSERT INTO `com_branch` VALUES ('11', '1090', 'Horana', 'No 196, Ratnapura Rd,  Horana    ', '1', '0342261137', 'horana@rdb.lk', '034-2261137', '1', '3');
INSERT INTO `com_branch` VALUES ('12', '1100', 'Warakagoda', 'No 20, In front of Public Fair,  Warakagoda Junction,  Neboda', '1', '0342242146', 'warakagoda@rdb.lk', '', '1', '3');
INSERT INTO `com_branch` VALUES ('13', '1110', 'Ingiriya', 'No 28  Padukka Rd  Ingiriya ', '1', '0342269285', 'ingiriya@rdb.lk', '034-2269285', '1', '3');
INSERT INTO `com_branch` VALUES ('14', '1120', 'Dodangoda', 'No 20/90,  Thudugala Junction,  Dodangoda.  ', '1', '0342280197', 'dodangoda@rdb.lk', '', '1', '3');
INSERT INTO `com_branch` VALUES ('15', '1130', 'Meegahatenna', 'Mudiyanse Building,  Meegahatenna.    ', '1', '0342284066', 'meegahathenna@rdb.lk', '', '1', '3');
INSERT INTO `com_branch` VALUES ('16', '1140', 'Baduraliya', 'Ratnapura Rd,  Baduraliya ', '1', '0342245047', 'baduraliya@rdb.lk', '.', '1', '3');
INSERT INTO `com_branch` VALUES ('17', '1150', 'Kalutara', 'No. 32, Galle Rd,  Kalutara North,  Kalutara  ', '1', '0342237346', 'kaluthara@rdb.lk', '.', '1', '3');
INSERT INTO `com_branch` VALUES ('18', '1160', 'Gampaha', 'Muthugala Build,  Colombo Road,  Gampaha.  ', '1', '0332223353', 'gampaha@rdb.lk', '033-2223353', '1', '2');
INSERT INTO `com_branch` VALUES ('19', '1170', 'Mawaramandiya', 'No. 454/2/C,  Mawaramandiya,  Siyambalpe  ', '1', '0112977316', 'mawaramandiya@rdb.lk', '011-2977316', '1', '2');
INSERT INTO `com_branch` VALUES ('20', '1180', 'Minuwangoda', 'No 74,  Veyangoda Rd,  Minuwangoda', '1', '0112296348', 'minuwangoda@rdb.lk', '011-2296348', '1', '2');
INSERT INTO `com_branch` VALUES ('21', '1190', 'Mirigama', 'No. 42/2/3,  Giriulla Rd,  Mirigama ', '1', '0332273031', 'mirigama@rdb.lk', '033-2273031', '1', '2');
INSERT INTO `com_branch` VALUES ('22', '1200', 'Moragahahena', 'Moragahahena,  Millewa.    ', '1', '0342254131', 'moragahahena@rdb.lk', '', '1', '3');
INSERT INTO `com_branch` VALUES ('23', '1210', 'Mathugama', 'No. 23,  Nebada Rd,  Mathugama.  ', '1', '0342248515', 'mathugama@rdb.lk', '.', '1', '3');
INSERT INTO `com_branch` VALUES ('24', '1220', 'Negombo', 'No.1/A, St. Jude Place,  Taladuwa Rd,  Negombo', '1', '0312238651', 'negombo@rdb.lk', '031-2238651', '1', '2');
INSERT INTO `com_branch` VALUES ('25', '1230', 'Divulapitiya', 'No. 61/63,  Kurunegala Rd,  Divulapitiya', '1', '0312246607', 'divulapitiya@rdb.lk', '031-2246607', '1', '2');
INSERT INTO `com_branch` VALUES ('26', '1240', 'Nittambuwa', 'No 110,  Kandy Rd,  Nittambuwa  ', '1', '0332293851', 'nittambuwa@rdb.lk', '033-2293851', '1', '2');
INSERT INTO `com_branch` VALUES ('27', '1250', 'Homagama', 'No. 78,  Highlevel Rd,  Homagama  ', '1', '0112891373', 'homagama@rdb.lk', '011-2891373', '1', '1');
INSERT INTO `com_branch` VALUES ('28', '1260', 'Kolonnawa', 'No. 157, Kolonnawa Road,  Wellampitiya.    ', '1', '0112532664', 'kolonnawa@rdb.lk', '011-2532664', '1', '1');
INSERT INTO `com_branch` VALUES ('29', '1270', 'Awissawella', 'No 17,  Yatiyantota Rd,  Awissawella', '1', '0362232681', 'awissawella@rdb.lk', '.', '1', '1');
INSERT INTO `com_branch` VALUES ('30', '1280', 'Piliyandala', 'No 70,  Colombo Rd,  Piliyandala  ', '1', '0112609607', 'piliyandala@rdb.lk', '011-2609607', '1', '1');
INSERT INTO `com_branch` VALUES ('31', '1290', 'Ragama', 'No. 24/10,  New Shopping Complex,  Kadawatha Rd,  Ragama', '1', '0112960755', 'ragama@rdb.lk', '011-2960755', '1', '2');
INSERT INTO `com_branch` VALUES ('32', '1300', 'Wadduwa', 'No. 34/A 9,  Moronthuduwa Rd,  Wadduwa', '1', '0382284100', 'wadduwa@rdb.lk', '.', '1', '3');
INSERT INTO `com_branch` VALUES ('33', '1310', 'Kirindiwela', 'No.159,  Radawana Rd,  Kirindiwela  ', '1', '0332247733', 'kirindiwela@rdb.lk', '033-2247733', '1', '2');
INSERT INTO `com_branch` VALUES ('34', '1320', 'JaEla', 'No 446,  Kapuwatte,  Ja Ela ', '1', '0112226606', 'jaela@rdb.lk', '0112-226606', '1', '2');
INSERT INTO `com_branch` VALUES ('35', '1330', 'Miriswatte', 'No.36,  Kandy Rd, Miriswatte,  Gampaha', '1', '0332248581', 'miriswatta@rdb.lk', '0332-248581', '1', '2');
INSERT INTO `com_branch` VALUES ('36', '1340', 'Kelaniya', 'No.933  Kandy Road, Wedamulla,  Kelaniya.  ', '1', '0112906882', 'kelaniya@rdb.lk', '011-3065111', '1', '2');
INSERT INTO `com_branch` VALUES ('37', '1900', 'Western Provincial Office', 'No. 36,  Miriswaththa  Gampaha  ', '1', '0332248731', '', '', null, null);
INSERT INTO `com_branch` VALUES ('39', '1980', 'Gampaha District Office', 'No 36,  Miriswattha,  Gampaha.  ', '1', '0332234922', 'dogampaha@rdb.lk', '033-2222343', null, null);
INSERT INTO `com_branch` VALUES ('40', '1990', 'Kalutara District Office', 'No.48,  Padukka Rd,  Horana  ', '1', '0342264276', 'dokalutara@rdb.lk', '034-2264276', null, null);
INSERT INTO `com_branch` VALUES ('42', '2010', 'Hakmana', 'Samararatna Building,  Beliatta Rd, Hakmana  ', '1', '0412286333', 'hakmana@rdb.lk', '', '2', '5');
INSERT INTO `com_branch` VALUES ('43', '2020', 'Urubokka', 'Urubokka', '1', '0412272278', 'urubokka@rdb.lk', '.', '2', '5');
INSERT INTO `com_branch` VALUES ('44', '2030', 'Deiyandara', 'Hakmana Road,  Deiyandara    ', '1', '0412268228', 'deiyandara@rdb.lk', '.', '2', '5');
INSERT INTO `com_branch` VALUES ('45', '2040', 'Akuressa', 'Matara Road, Akuressa      ', '1', '0412283166', 'akuressa@rdb.lk', '.', '2', '5');
INSERT INTO `com_branch` VALUES ('46', '2050', 'Weligama', 'No 139, Maha Weediya,  Weligama    ', '1', '0412250166', 'weligama@rdb.lk', '.', '2', '5');
INSERT INTO `com_branch` VALUES ('47', '2060', 'Gandara', 'Beliatta Road , Gandara      ', '1', '0412259585', 'gandara@rdb.lk', '.', '2', '5');
INSERT INTO `com_branch` VALUES ('48', '2070', 'Kekanadura', 'Veherahena Rd, Kakenadura     ', '1', '0412264457', 'kekanadura@rdb.lk', '.', '2', '5');
INSERT INTO `com_branch` VALUES ('49', '2080', 'Ambalantota', 'No 139,  Hambantota Rd,  Ambalantota', '1', '0472223113', 'ambalantota@rdb.lk', '.', '2', '6');
INSERT INTO `com_branch` VALUES ('50', '2090', 'Agunakolapelessa', 'Ranna Road, Agunakolapalassa', '1', '0472228223', 'angunukolapalassa@rdb.lk', '.', '2', '6');
INSERT INTO `com_branch` VALUES ('51', '2100', 'Katuwana', 'Nanayakkara Building,  Uda Gomadiya Rd,  Katuwana.  ', '1', '0472247205', 'katuwana@rdb.lk', '.', '2', '6');
INSERT INTO `com_branch` VALUES ('52', '2110', 'Beliatta', 'No 30/2, Dickwalla Rd, Beliatta      ', '1', '0472243423', 'beliatta@rdb.lk', '.', '2', '6');
INSERT INTO `com_branch` VALUES ('53', '2120', 'Elpitiya', 'Central Building,  Elpitiya.    ', '1', '0912291163', 'elpitiya@rdb.lk', '.', '2', '4');
INSERT INTO `com_branch` VALUES ('54', '2130', 'Batapola', 'Moragaha Junction, Batapola      ', '1', '0912260113', 'batapola@rdb.lk', '.', '2', '4');
INSERT INTO `com_branch` VALUES ('55', '2140', 'Pitigala', 'Main Street, Pitigala      ', '1', '0912291179', 'Pitigala@rdb.lk', '.', '2', '4');
INSERT INTO `com_branch` VALUES ('56', '2150', 'Gonagalapura', 'Harison Jayasingha  Building,  Gonagalapura.  ', '1', '0342274569', 'gonagalapura@rdb.lk', '.', '2', '4');
INSERT INTO `com_branch` VALUES ('57', '2160', 'Imaduwa', 'Yakkalamulla Road, Imaduwa      ', '1', '0912286113', 'imaduwa@rdb.lk', '.', '2', '4');
INSERT INTO `com_branch` VALUES ('58', '2170', 'Baddegama', 'No 166, Kumhe, Baddegama     ', '1', '0912292380', 'baddegama@rdb.lk', '.', '2', '4');
INSERT INTO `com_branch` VALUES ('59', '2180', 'Thissamaharama', 'No 14, Wallewaya Rd,  Debarawewa    ', '1', '0472237172', 'tissamaharama@rdb.lk', '.', '2', '6');
INSERT INTO `com_branch` VALUES ('60', '2190', 'Lunugamvehera', 'No 08, Upstair - Shoping Complex,  Lunugamvehera    ', '1', '0472237334', 'lunugamwehera@rdb.lk', '.', '2', '6');
INSERT INTO `com_branch` VALUES ('61', '2200', 'Pitabeddara', 'Deniyaya Road,  Pitabaddara    ', '1', '0412281303', 'pitabaddera@rdb.lk', '.', '2', '5');
INSERT INTO `com_branch` VALUES ('62', '2210', 'Thalgaswala', 'New Town, Thalgaswala     ', '1', '0912296491', 'thalgaswala@rdb.lk', '.', '2', '4');
INSERT INTO `com_branch` VALUES ('63', '2220', 'Akmeemana', 'Ganegoda, Akmeemana      ', '1', '0912222954', 'akmeemana@rdb.lk', '.', '2', '4');
INSERT INTO `com_branch` VALUES ('64', '2230', 'Karandeniya', 'Mahaedande, Karandeniya      ', '1', '0912290135', 'karandeniya@rdb.lk', '.', '2', '4');
INSERT INTO `com_branch` VALUES ('65', '2240', 'Sooriyawewa', 'New Town,  Sooriyawewa    ', '1', '0472289019', 'sooriyawewa@rdb.lk', '.', '2', '6');
INSERT INTO `com_branch` VALUES ('66', '2250', 'Kamburugamuwa', 'No 18, Galle Rd, Kamburugamuwa      ', '1', '0412226731', 'kaburugamuwa@rdb.lk', '.', '2', '5');
INSERT INTO `com_branch` VALUES ('68', '2260', 'Deniyaya', 'Maha Veediya, Deniyaya', '1', '0412273378', 'deniyaya@rdb.lk', '.', '2', '5');
INSERT INTO `com_branch` VALUES ('69', '2270', 'Kamburupitiya', 'Matara Rd, Kamburupitiya      ', '1', '0412292306', 'kamburupitiya@rdb.lk', '.', '2', '5');
INSERT INTO `com_branch` VALUES ('70', '2280', 'Galle', 'No 07, Mathara Rd, Magalle, Galle    ', '1', '0912246457', 'galle@rdb.lk', '.', '2', '4');
INSERT INTO `com_branch` VALUES ('71', '2290', 'Uragasmanhandiya', 'Kosgoda Road,  Uragasmanhandiya   ', '1', '0912264115', 'uragasmanhandiya@rdb.lk', '.', '2', '4');
INSERT INTO `com_branch` VALUES ('72', '2300', 'Yakkalamulla', 'Imaduwa Rd,  Yakkalamulla    ', '1', '0912286087', 'yakkalamulla@rdb.lk', '0912286087', '2', '4');
INSERT INTO `com_branch` VALUES ('73', '2310', 'Weeraketiya', 'No 268, Middeniya Rd,  Weerakatiya    ', '1', '0472246267', 'weerakatiya@rdb.lk', '.', '2', '6');
INSERT INTO `com_branch` VALUES ('74', '2320', 'Thihagoda', 'Hakmana Rd, Thihagoda', '1', '0412245401', 'Thihagoda@rdb.lk', '', '2', '5');
INSERT INTO `com_branch` VALUES ('75', '2330', 'Matara City', 'Hakmana Rd,  Matara', '1', '0412225963', 'citymatara@rdb.lk', '041-2225963', '2', '5');
INSERT INTO `com_branch` VALUES ('76', '2340', 'Tangalle', 'No 81,  Beliatta Rd,  Tangalle  ', '1', '0472240631', 'tangalle@rdb.lk', '', '2', '6');
INSERT INTO `com_branch` VALUES ('77', '2350', 'Neluwa', 'Pelawatte Rd, Neluwa.      ', '1', '0912285268', 'neluwa@rdb.lk', '.', '2', '4');
INSERT INTO `com_branch` VALUES ('78', '2360', 'Mawarala', 'Maha Veediya, Mawarala      ', '1', '0412291347', 'mawarala@rdb.lk', '.', '2', '5');
INSERT INTO `com_branch` VALUES ('79', '2370', 'Morawaka', 'Deniyaya Road, Morawaka      ', '1', '0412282523', 'morawaka@rdb.lk', '.', '2', '5');
INSERT INTO `com_branch` VALUES ('80', '2380', 'Hambantota', 'Main Street, Hambantota      ', '1', '0472222120', 'hambantota@rdb.lk', '.', '2', '6');
INSERT INTO `com_branch` VALUES ('81', '2390', 'Walasmulla', 'No. 16, Weeraketiya Road,  Walasmulla    ', '1', '0472254162', 'walasmulla@rdb.lk', '047-2254162', '2', '6');
INSERT INTO `com_branch` VALUES ('82', '2400', 'Barawakumbuka', 'Embilipitya Road,  Barawakumbuka    ', '1', '0473485608', 'barawakumbuka@rdb.lk', '.', '2', '6');
INSERT INTO `com_branch` VALUES ('83', '2410', 'Udugama', 'Bar Junction, Udugama      ', '1', '0912285430', 'udugama@rdb.lk', '.', '2', '4');
INSERT INTO `com_branch` VALUES ('84', '2420', 'Ranna', 'Thissa Road,  Ranna    ', '1', '0472227155', 'ranna@rdb.lk', '', '2', '6');
INSERT INTO `com_branch` VALUES ('85', '2430', 'Ahangama', 'No 47, Station Rd,  Ahangama    ', '1', '0912283986', 'ahangama@rdb.lk', '.', '2', '4');
INSERT INTO `com_branch` VALUES ('86', '2440', 'Hikkaduwa', 'No 35, Baddegama Rd.,  Hikkaduwa.    ', '1', '0912277907', 'hikkaduwa@rdb.lk', '091-2277907', '2', '4');
INSERT INTO `com_branch` VALUES ('87', '2450', 'Kirinda', 'No 51, Maha veediya,  Kirinda,  Puhulwella  ', '1', '0412288777', 'kirinda@rdb.lk', '.', '2', '5');
INSERT INTO `com_branch` VALUES ('88', '2460', 'Middeniya', 'Alahapperuma Building,  Weeraketiya Road,  Middeniya  ', '1', '0472248178', 'middeniya@rdb.lk', '', '2', '6');
INSERT INTO `com_branch` VALUES ('89', '2470', 'Dikwella', 'No 82,  Mahawela Rd,  Dikwella  ', '1', '0412257597', 'dikwella@rdb.lk', '', '2', '5');
INSERT INTO `com_branch` VALUES ('90', '2480', 'Karapitiya', 'No 03,  Suni Side Gardens,  Karapitiya  ', '1', '0912227891', 'karapitiya@rdb.lk', '', '2', '4');
INSERT INTO `com_branch` VALUES ('91', '2490', 'Balapitiya', 'Darmakeerthi Building,  Galle Rd,  Balapitiya  ', '1', '0912257860', 'balapitiya@rdb.lk', '.', '2', '4');
INSERT INTO `com_branch` VALUES ('92', '2500', 'Pamburana', 'No 382 A,  Anagarika Dharmapala Mawatha,  Pamburana,  Matara', '1', '0412231166', 'pamburana@rdb.lk', '.', '2', '5');
INSERT INTO `com_branch` VALUES ('93', '2510', 'Mirissa', 'Darshana Building,  Mirissa-North,  Mirissa  ', '1', '0412254925', 'mirissa@rdb.lk', '', '2', '5');
INSERT INTO `com_branch` VALUES ('94', '2520', 'Kaluwella', 'No 63, Colombo rd, Kaluwella,  Galle    ', '1', '0912227930', 'kaluwella@rdb.lk', '.', '2', '4');
INSERT INTO `com_branch` VALUES ('95', '2530', 'Warapitiya', 'Urubokka Rd, Warapitiya Junction,  Rammala, Warapitiya    ', '1', '0473625263', 'warapitiya@rdb.lk', '.', '2', '6');
INSERT INTO `com_branch` VALUES ('96', '2540', 'Devinuwara', 'Main Street, Devinuwara', '1', '0412234864', 'devinuwara@rdb.lk', '041–2234864', '2', '5');
INSERT INTO `com_branch` VALUES ('97', '2900', 'Southern Provincial Office', 'No 382/A,  Anagarika Dharmapala Mw,  Pamburana,  Matara', '1', '0412226208', '', '', null, null);
INSERT INTO `com_branch` VALUES ('98', '2970', 'Hambantota District Office', 'Hambantota Road,  Ambalantota    ', '1', '0472223200', 'dohambantota@rdb.lk', '', null, null);
INSERT INTO `com_branch` VALUES ('99', '2980', 'Galle District Office', 'No 301, Matara Rd, Magalle, Galle', '1', '0912246034', 'dogalle@rdb.lk', '091-2222458', null, null);
INSERT INTO `com_branch` VALUES ('100', '2990', 'Matara District Office', 'No 382A,  Anagarika Dharmapala Mw,  Pamburana,  Matara', '1', '0412231585', 'domatara@rdb.lk', '041-2231585', null, null);
INSERT INTO `com_branch` VALUES ('101', '3010', 'Kegalle', 'No.143/1,  Main Street  Kegalle.  ', '1', '0352223567', 'kegalle@rdb.lk', '035-2223567', '3', '7');
INSERT INTO `com_branch` VALUES ('102', '3020', 'Pitagaldeniya', 'Pradesiya Saba Building,  Pitagaldeniya.    ', '1', '0352289123', 'pitagaldeniya@rdb.lk', '.', '3', '7');
INSERT INTO `com_branch` VALUES ('103', '3030', 'Rambukkana', 'D.M.Karunarathne Mw, Rambukkana', '1', '0352265295', 'rambukkana@rdb.lk', '035-2265295', '3', '7');
INSERT INTO `com_branch` VALUES ('104', '3040', 'Mawanella', 'No.45,  Kandy Rd,  Mawanella  ', '1', '0352246373', 'mawanella@rdb.lk', '035-2246373', '3', '7');
INSERT INTO `com_branch` VALUES ('105', '3050', 'Warakapola', 'No.171,  Kandy Rd, Warakapola  ', '1', '0352267141', 'warakapola@rdb.lk', '035-2267141', '3', '7');
INSERT INTO `com_branch` VALUES ('106', '3060', 'Aranayake', 'No 815, Dippitiya,  Aranayake    ', '1', '0352258104', 'aranayaka@rdb.lk', '.', '3', '7');
INSERT INTO `com_branch` VALUES ('107', '3070', 'Kitulgala', 'Co-operative Building,  Kitulgala.    ', '1', '0362287507', 'kitulgala@rdb.lk', '.', '3', '7');
INSERT INTO `com_branch` VALUES ('108', '3080', 'Ruwanwella', 'No. 96,  Avissawella Rd,  Ruwanwella.  ', '1', '0362266351', 'ruwanwella@rdb.lk', '036-2266351', '3', '7');
INSERT INTO `com_branch` VALUES ('109', '3090', 'Dewalegama', 'No 06, Polgahawela Rd,  Dewalegama    ', '1', '0352229111', 'dewalegama@rdb.lk', '.', '3', '7');
INSERT INTO `com_branch` VALUES ('110', '3100', 'Bulathkohupitiya', 'Kegalle Road,  Bulathkohupitiya    ', '1', '0362247276', 'bulathkohupitiya@rdb.lk', '', '3', '7');
INSERT INTO `com_branch` VALUES ('111', '3110', 'Deraniyagala', 'No 81, Avissawella Rd,  Deraniyagala    ', '1', '0362249247', 'deraniyagala@rdb.lk', '.', '3', '7');
INSERT INTO `com_branch` VALUES ('112', '3120', 'Rathnapura', 'No.77,  Main Street,  Ratnapura  ', '1', '0452223862', 'rathnapura@rdb.lk', '045-2223862', '3', '8');
INSERT INTO `com_branch` VALUES ('113', '3130', 'Pelmadulla', 'No 114,  Ratnapura Rd,  Pelmadulla.  ', '1', '0452274153', 'pelmadulla@rdb.lk', '', '3', '8');
INSERT INTO `com_branch` VALUES ('114', '3140', 'Balangoda', 'No 17,  Rest House Approch Rd,  Balangoda  ', '1', '0452287738', 'balangoda@rdb.lk', '', '3', '8');
INSERT INTO `com_branch` VALUES ('115', '3150', 'Embilipitiya', 'No. 34, New Town Rd,  Embilipitiya    ', '1', '0472261269', 'embilipitiya@rdb.lk', '.', '3', '8');
INSERT INTO `com_branch` VALUES ('116', '3160', 'Hemmathagama', 'No. 66,  Hemmatagama    ', '1', '0352257721', 'hemmathagama@rdb.lk', '.', '3', '7');
INSERT INTO `com_branch` VALUES ('117', '3170', 'Kolonna', 'New Town,  Kolonna    ', '1', '0452260206', 'kolonna@rdb.lk', '', '3', '8');
INSERT INTO `com_branch` VALUES ('118', '3180', 'Eheliyagoda', 'No.281,  Main Street,  Eheliyagoda  ', '1', '0362258331', 'eheliyagoda@rdb.lk', '036-2258331', '3', '8');
INSERT INTO `com_branch` VALUES ('119', '3190', 'Nelumdeniya', 'No. 25, Kandy Rd,  Nelundeniya    ', '1', '0352283401', 'nelundeniya@rdb.lk', '.', '3', '7');
INSERT INTO `com_branch` VALUES ('120', '3200', 'Kalawana', 'No. 04, Kalawana      ', '1', '0452255133', 'kalawana@rdb.lk', '.', '3', '8');
INSERT INTO `com_branch` VALUES ('121', '3210', 'Yatiyanthota', 'No. 49/1,  Opposite of Bus Stand,  Yatiyanthota.  ', '1', '0362270204', 'yatiyanthota@rdb.lk', '036-2270204', '3', '7');
INSERT INTO `com_branch` VALUES ('122', '3220', 'Godakawela', 'No. 85, Main Street, Godakawela      ', '1', '0452240130', 'godakawela@rdb.lk', '.', '3', '8');
INSERT INTO `com_branch` VALUES ('123', '3230', 'Erathna', 'Sri Pada Road,  Erathna,  Kuruwita  ', '1', '0452264730', 'erathna@rdb.lk', '', '3', '8');
INSERT INTO `com_branch` VALUES ('124', '3240', 'Kuruvita', 'No. 54 A,  Colombo Road,  Kuruwita  ', '1', '0452263618', 'kuruwita@rdb.lk', '045-2263618', '3', '8');
INSERT INTO `com_branch` VALUES ('125', '3250', 'Nivithigala', 'Watapotha Road,  Nivithigala    ', '1', '0452279853', 'nivithigala@rdb.lk', '.', '3', '8');
INSERT INTO `com_branch` VALUES ('126', '3260', 'Kahawatta', 'No.46/1,  Main Street,  Kahawatta  ', '1', '0452270175', 'kahawatta@rdb.lk', '045-2270175', '3', '8');
INSERT INTO `com_branch` VALUES ('127', '3270', 'Kotiyakumbura', 'No.61,  Main Street,  Kotiyakumbura  ', '1', '0352289016', 'kotiyakumbura@rdb.lk', '035-2289016', '3', '7');
INSERT INTO `com_branch` VALUES ('128', '3280', 'Rakwana', 'No. 106,  Main Street,  Rakwana  ', '1', '0452246284', 'rakwana@rdb.lk', '045-2246284', '3', '8');
INSERT INTO `com_branch` VALUES ('129', '3290', 'Dehiowita', 'No 165, Main Street,  Dehiowita    ', '1', '0362233600', 'dehiowita@rdb.lk', '.', '3', '7');
INSERT INTO `com_branch` VALUES ('130', '3300', 'Kiriella', 'No. 24, Idangoda, Kiriella      ', '1', '0452265692', 'kiriella@rdb.lk', '.', '3', '8');
INSERT INTO `com_branch` VALUES ('131', '3310', 'Pothupitiya', 'Kalawana Road, Pothupitiya      ', '1', '0453601155', 'pothupitiya@rdb.lk', '.', '3', '8');
INSERT INTO `com_branch` VALUES ('132', '3320', 'Weligepola', 'Weligepola junction ,Weligepola      ', '1', '0452227133', 'weligepola@rdb.lk', '.', '3', '8');
INSERT INTO `com_branch` VALUES ('133', '3330', 'Sri Palabaddala', 'Karniya Junction ,  Sri Palabaddala    ', '1', '0453451144', 'sripalabaddala@rdb.lk', '.', '3', '8');
INSERT INTO `com_branch` VALUES ('134', '3340', 'Pulungupitiya', 'Pulungupitiya Junction,  Ratnapura    ', '1', '0452225837', 'pulungupitiya@rdb.lk', '.', '3', '8');
INSERT INTO `com_branch` VALUES ('135', '3900', 'Sabaragamuwa Province Office', 'No 28, Bandaranayaka Mawatha, Rathnapura', '1', '0452224566', '', '', null, null);
INSERT INTO `com_branch` VALUES ('136', '3980', 'Rathnapura District Office', 'Pulungupitiya Junction,  Ratnapura    ', '1', '0452225837', 'dorathnapura@rdb.lk', '045-2225837', null, null);
INSERT INTO `com_branch` VALUES ('137', '3990', 'Kegalla District Office', 'No.143/2,  Mahaweediya,  Kegalle  ', '1', '0352230333', 'dokegalle@rdb.lk', '035-2230333', null, null);
INSERT INTO `com_branch` VALUES ('139', '4010', 'Gampola', 'No.15,  Nawalapitiya Rd,  Gampola  ', '1', '0812351998', 'gampola@rdb.lk', '081-2351998', '4', '9');
INSERT INTO `com_branch` VALUES ('140', '4020', 'Udawela', 'Udawela, Barawardenaoya      ', '1', '0553555643', 'udawela@rdb.lk', '.', '4', '9');
INSERT INTO `com_branch` VALUES ('141', '4030', 'Hataraliyadda', 'No. 95,  Kandy Road ,  Hataraliyadda    ', '1', '0812464026', 'hataraliyadda@rdb.lk', '.', '4', '9');
INSERT INTO `com_branch` VALUES ('142', '4040', 'Marassana', 'Meeruppa, Marassana      ', '1', '0812405098', 'marassana@rdb.lk', '.', '4', '9');
INSERT INTO `com_branch` VALUES ('143', '4050', 'Danture', 'No 562,  Danture    ', '1', '0812575131', 'danture@rdb.lk', '', '4', '9');
INSERT INTO `com_branch` VALUES ('144', '4060', 'Wattegama', 'Panvila Road,  Wattegama    ', '1', '0812476263', 'wattegama@rdb.lk', '081-2476263', '4', '9');
INSERT INTO `com_branch` VALUES ('145', '4070', 'Morayaya', 'Morayaya, Minipe      ', '1', '0552257025', 'morayaya@rdb.lk', '.', '4', '9');
INSERT INTO `com_branch` VALUES ('146', '4080', 'Teldeniya', 'No. 9,  Wilamuna,  Teldeniya  ', '1', '0812375045', 'teldeniya@rdb.lk', '081-2375045', '4', '9');
INSERT INTO `com_branch` VALUES ('147', '4090', 'Pujapitiya', 'No. 89/3,  Pujapitiya.    ', '1', '0812307128', 'pujapitiya@rdb.lk', '.', '4', '9');
INSERT INTO `com_branch` VALUES ('148', '4100', 'Nuwaraeliya', 'No 158, Kandy Rd,  Nuwara Eliya    ', '1', '0522223484', 'nuwaraeliya@rdb.lk', '.', '4', '11');
INSERT INTO `com_branch` VALUES ('149', '4110', 'Rikillagaskada', 'No.06,  Ragala Rd,  Rikillagaskada  ', '1', '0812365242', 'rikillagaskada@rdb.lk', '', '4', '11');
INSERT INTO `com_branch` VALUES ('150', '4120', 'Kandy MIC', 'No. 211, 2nd Floor,  Central Market,  Kandy  ', '1', '0812233977', 'cpmic@rdb.lk', '.', '4', '9');
INSERT INTO `com_branch` VALUES ('151', '4130', 'Ginigathhena', 'No. 07, Colombo Road, Ginigathhena      ', '1', '0512242297', 'ginigathena@rdb.lk', '.', '4', '11');
INSERT INTO `com_branch` VALUES ('152', '4140', 'Pundaluoya', 'No. 34,Upper Street, Pundaluoya      ', '1', '0512233207', 'pundaluoya@rdb.lk', '.', '4', '11');
INSERT INTO `com_branch` VALUES ('153', '4150', 'Katugastota', 'No.184,  Madawala Rd,  Katugastota  ', '1', '0812499536', 'katugastota@rdb.lk', '081-2499536', '4', '9');
INSERT INTO `com_branch` VALUES ('154', '4160', 'Nildandahinna', 'No 69, Walapane Rd, Nildandahinna      ', '1', '0522278227', 'nildandahinna@rdb.lk', '.', '4', '11');
INSERT INTO `com_branch` VALUES ('155', '4170', 'Agarapathanaa', 'No 158, Hoolbrook, Agrapatana    ', '1', '0512230335', 'agarapathana@rdb.lk', '.', '4', '11');
INSERT INTO `com_branch` VALUES ('156', '4180', 'Ududumbara', 'No 27/1, Kandy Rd,  Udadumbara    ', '1', '0812402385', 'ududumbara@rdb.lk', '.', '4', '9');
INSERT INTO `com_branch` VALUES ('157', '4190', 'Matale', 'No 62,  Kings Street,  Matale.  ', '1', '0662223689', 'matale@rdb.lk', '', '4', '10');
INSERT INTO `com_branch` VALUES ('158', '4200', 'Dambulla', 'No 734,  Anuradhapura Rd,  Dambulla  ', '1', '0662284946', 'dambulla@rdb.lk', '', '4', '10');
INSERT INTO `com_branch` VALUES ('159', '4210', 'Galewela', 'No 115,  Kurunegala Rd,  Galewela  ', '1', '0662289405', 'galewela@rdb.lk', '', '4', '10');
INSERT INTO `com_branch` VALUES ('160', '4220', 'Laggala', 'Laggala, Pallegama      ', '1', '0662275000', 'laggala@rdb.lk', '.', '4', '10');
INSERT INTO `com_branch` VALUES ('161', '4230', 'Raththota', 'No.06, Main Street,  Rattota    ', '1', '0662255394', 'rattota@rdb.lk', '.', '4', '10');
INSERT INTO `com_branch` VALUES ('162', '4240', 'Kotagala', 'No 207 B Main Street, Kotagala      ', '1', '0512244130', 'kotagala@rdb.lk', '.', '4', '11');
INSERT INTO `com_branch` VALUES ('163', '4250', 'Manikhinna', 'No.130,  Sirimal Watte Road, Manikhinna  ', '1', '0812374508', 'manikhinna@rdb.lk', '812374508', '4', '9');
INSERT INTO `com_branch` VALUES ('164', '4260', 'Hanguranketha', 'No. 18,  Boralassa Road,  Hanguranketha  ', '1', '0812369115', 'hanguranketha@rdb.lk', '.', '4', '11');
INSERT INTO `com_branch` VALUES ('165', '4270', 'Daulagala', 'Dawlagala, Handessa    ', '1', '0812315972', 'daulagala@rdb.lk', '0812315972', '4', '9');
INSERT INTO `com_branch` VALUES ('166', '4280', 'Naula', 'No. 26,  Dambulla Road,  Naula  ', '1', '0662246169', 'naula@rdb.lk', '066-2246169', '4', '10');
INSERT INTO `com_branch` VALUES ('167', '4290', 'Nawalapitiya', 'No.55, Dolosbage Rd,  Nawalapitiya    ', '1', '0542222689', 'nawalapitiya@rdb.lk', '.', '4', '9');
INSERT INTO `com_branch` VALUES ('168', '4300', 'Hedeniya', 'No.261/1, Hedeniya, Werallagama  ', '1', '0812461848', 'hedeniya@rdb.lk', '0812461848', '4', '9');
INSERT INTO `com_branch` VALUES ('169', '4310', 'Wilgamuwa', 'Hettipola, Wilgamuwa      ', '1', '0662250081', 'wilgamuwa@rdb.lk', '.', '4', '10');
INSERT INTO `com_branch` VALUES ('170', '4320', 'Kandy', 'No 14,16,  Colombo Street,  Kandy', '1', '0812201114', 'kandy@rdb.lk', '0812201114', '4', '9');
INSERT INTO `com_branch` VALUES ('171', '4330', 'Peradeniya', 'No.338,  Colombo Rd,  Peradeniya  ', '1', '0812386184', 'peradeniya@rdb.lk', '0812386184', '4', '9');
INSERT INTO `com_branch` VALUES ('173', '4900', 'Central Provincial Office', 'No. 15,  Dharmashoka Mw,  Kandy', '1', '0812214115', '', '', null, null);
INSERT INTO `com_branch` VALUES ('174', '4930', 'Nuwara Eliya District Office', 'Nuwara Eliya      ', '1', '0522224552', '', '', null, null);
INSERT INTO `com_branch` VALUES ('175', '4970', 'Matale District Office', 'Matale      ', '1', '0662051332', 'domatale@rdb.lk', '', null, null);
INSERT INTO `com_branch` VALUES ('176', '4990', 'Kandy District Office', 'Kandy      ', '1', '0812214124', '', '', null, null);
INSERT INTO `com_branch` VALUES ('178', '5010', 'Buttala', 'No 74, Wellawaya Rd, Buttala ', '1', '0552273763', 'buththala@rdb.lk', '.', '5', '13');
INSERT INTO `com_branch` VALUES ('179', '5020', 'Medagama', 'No 120, Shoping Complex,  Medagama', '1', '0552266659', 'medagama@rdb.lk', '.', '5', '13');
INSERT INTO `com_branch` VALUES ('180', '5030', 'Monaragala', 'No 40, Pothuwil Road, Monaragala      ', '1', '0552276533', 'monaragala@rdb.lk', '.', '5', '13');
INSERT INTO `com_branch` VALUES ('181', '5040', 'Thanamalvila', 'Tissa Road, Thanamalvila      ', '1', '0472285045', 'thanamalvila@rdb.lk', '.', '5', '13');
INSERT INTO `com_branch` VALUES ('182', '5050', 'Badulla', 'No 46,  Postal Complex,  Badulla ', '1', '0552223249', 'badulla@rdb.lk', '055-2223249', '5', '12');
INSERT INTO `com_branch` VALUES ('183', '5060', 'Passara', 'No 404, Main Street, Passara.      ', '1', '0552288230', 'passara@rdb.lk', '.', '5', '12');
INSERT INTO `com_branch` VALUES ('184', '5070', 'Welimada', 'No. 127, Hemapala Munidasa Mw,  Welimada    ', '1', '0572245312', 'welimada@rdb.lk', '.', '5', '12');
INSERT INTO `com_branch` VALUES ('185', '5080', 'Kandeketiya', 'Agrarian Service Centre,  Kandaketiya.    ', '1', '0552245671', 'kandaketiya@rdb.lk', '.', '5', '12');
INSERT INTO `com_branch` VALUES ('186', '5090', 'Mahiyangana', 'No 11/2, Mahiyanganaya      ', '1', '0552257225', 'mahiyangana@rdb.lk', '.', '5', '12');
INSERT INTO `com_branch` VALUES ('187', '5100', 'Wellawaya', 'No 147, Thissa Rd, Wellawaya      ', '1', '0552274530', 'wellawaya@rdb.lk', '.', '5', '13');
INSERT INTO `com_branch` VALUES ('188', '5110', 'Badalkumbura', 'No 366, Badalkumbura      ', '1', '0552250008', 'badalkumbura@rdb.lk', '.', '5', '13');
INSERT INTO `com_branch` VALUES ('189', '5120', 'Haputhale', 'No 18, Colombo Road,  Haputhale.    ', '1', '0572268212', 'haputhale@rdb.lk', '.', '5', '12');
INSERT INTO `com_branch` VALUES ('190', '5130', 'Rideemaliyadda', 'Agrarian Service Centre,  Ridemaliyadda', '1', '0552268299', 'rideemaliyadda@rdb.lk', '.', '5', '12');
INSERT INTO `com_branch` VALUES ('191', '5140', 'Uva Paranagama', 'Lunuwatta Road, Ambagasdowa      ', '1', '0572245018', 'uvaparanagama@rdb.lk', '.', '5', '12');
INSERT INTO `com_branch` VALUES ('192', '5150', 'Bandarawela', 'No 171, Main Street,  Bandarawela    ', '1', '0572222943', 'bandarawela@rdb.lk', '.', '5', '12');
INSERT INTO `com_branch` VALUES ('193', '5160', 'Meegahakiwula', 'No.9, Kandy Rd,  Meegahakiula    ', '1', '0552245725', 'meegahakiula@rdb.lk', '.', '5', '12');
INSERT INTO `com_branch` VALUES ('194', '5170', 'Lunugala', 'No. 205, Main Street, Lunugala      ', '1', '0552263955', 'lunugala@rdb.lk', '.', '5', '12');
INSERT INTO `com_branch` VALUES ('195', '5180', 'Haldummulla', 'No 7, Hal-Atutenna,  Haldummulla    ', '1', '0572268227', 'haldummulla@rdb.lk', '.', '5', '12');
INSERT INTO `com_branch` VALUES ('196', '5190', 'Girandurukotte', 'Development Centre,  Girandurukotte   ', '1', '0272254255', 'girandurukootte@rdb.lk', '', '5', '12');
INSERT INTO `com_branch` VALUES ('197', '5200', 'Bogahakumbura', 'Welimada Road,  Bogahakumbura    ', '1', '0572280983', 'bogahakumbura@rdb.lk', '.', '5', '12');
INSERT INTO `com_branch` VALUES ('198', '5210', 'Bibile', 'Wagollawaththa, Bibile   ', '1', '0552265554', 'bibile@rdb.lk', '.', '5', '13');
INSERT INTO `com_branch` VALUES ('199', '5220', 'Uva Maligathenna', 'Wepassawela Pathana,  Uva Maligathenna,  Pattiyagedara  ', '1', '0555679929', 'maligathanne@rdb.lk', '.', '5', '12');
INSERT INTO `com_branch` VALUES ('200', '5230', 'Siyambalanduwa', 'In Front of Fillings  Station,  Siyambalanduwa', '1', '0555679930', 'siyambalanduwa@rdb.lk', '.', '5', '13');
INSERT INTO `com_branch` VALUES ('201', '5240', 'Diyathalawa', 'No.09, Fair Road,  Diyathalawa ', '1', '0572227127', 'diyathalawa@rdb.lk', '.', '5', '12');
INSERT INTO `com_branch` VALUES ('202', '5250', 'Sevanagala', 'No 22, Embilipitiya Rd,  Danduma    ', '1', '0472280055', 'sewanagala@rdb.lk', '.', '5', '13');
INSERT INTO `com_branch` VALUES ('203', '5260', 'Madulla', 'Monaragala Road, Madulla,  Dambagalla.    ', '1', '0555635255', 'madulla@rdb.lk', '.', '5', '13');
INSERT INTO `com_branch` VALUES ('204', '5270', 'Badulla District Office', 'Badulla      ', '1', '0552224192', 'dobadulla@rdb.lk', '', null, null);
INSERT INTO `com_branch` VALUES ('206', '5900', 'Uva Provincial Office', 'Badulla      ', '1', '0555638413', '', '', null, null);
INSERT INTO `com_branch` VALUES ('208', '5980', 'Monaragala District Office', 'Monaragala      ', '1', '0552273930', 'domonaragala@rdb.lk', '', null, null);
INSERT INTO `com_branch` VALUES ('209', '6010', 'Ampara', 'Nimal Building,  D.S. Senanayaka Street,  Ampara', '1', '0632222480', 'ampara@rdb.lk', '', '6', '14');
INSERT INTO `com_branch` VALUES ('210', '6020', 'Dehiatthakandiya', 'No F21, New City,  Dehiatthakandiya    ', '1', '0272250275', 'dehiaththakandiya@rdb.lk', '.', '6', '14');
INSERT INTO `com_branch` VALUES ('211', '6030', 'Sammanthurai', 'Hijra Rd,  Sammanturai    ', '1', '0672260208', 'sammanthurai@rdb.lk', '.', '6', '14');
INSERT INTO `com_branch` VALUES ('212', '6040', 'Damana', 'No 56, Muwangala Rd, Hingurana    ', '1', '0632240003', 'damana@rdb.lk', '.', '6', '14');
INSERT INTO `com_branch` VALUES ('213', '6050', 'Akkaraipatthu', 'Victor Silva Building,  Potuwil Road,  Akkaraipaththu', '1', '0672277532', 'akkaraipaththu@rdb.lk', '.', '6', '14');
INSERT INTO `com_branch` VALUES ('214', '6060', 'Kalmunai', 'Yazeen Building,  Main Street,  Kalmunai  ', '1', '0672229635', 'kalmunai@rdb.lk', '', '6', '14');
INSERT INTO `com_branch` VALUES ('215', '6070', 'Mahaoya', 'Hot Water Bubula Road,  Mahaoya    ', '1', '0632244013', 'mahaoya@rdb.lk', '.', '6', '14');
INSERT INTO `com_branch` VALUES ('216', '6080', 'Pothuwil', 'Kazeem Building,  Main Street, Pothuvil', '1', '0632248088', 'pothuvil@rdb.lk', '.', '6', '14');
INSERT INTO `com_branch` VALUES ('217', '6090', 'Uhana', 'No 07, Kandy Road, Uhana      ', '1', '0632250121', 'uhana@rdb.lk', '.', '6', '14');
INSERT INTO `com_branch` VALUES ('218', '6100', 'Nintavur', 'No 1/43, Main Rd,  Nintavur    ', '1', '0672251355', 'nintavur@rdb.lk', '.', '6', '14');
INSERT INTO `com_branch` VALUES ('219', '6110', 'Batticaloa', 'No 140, Trincomalee Rd, Batticaloa', '1', '0652228524', 'batticaloa@rdb.lk', '065-2228523', '6', '15');
INSERT INTO `com_branch` VALUES ('220', '6120', 'Eraur', 'Punamkuda Road,  Eraur', '1', '0652241431', 'eraur@rdb.lk', '', '6', '15');
INSERT INTO `com_branch` VALUES ('221', '6130', 'Chenkalady', 'Main Street,  Chenkalady    ', '1', '0652241430', 'chenkaladi@rdb.lk', '', '6', '15');
INSERT INTO `com_branch` VALUES ('222', '6140', 'Kanthale', 'No 191,  Main Street,  Kanthale  ', '1', '0262234955', 'kanthale@rdb.lk', '', '6', '20');
INSERT INTO `com_branch` VALUES ('223', '6150', 'Valachchenai', 'Main Street,  Mavadichchenai,  Ottamavadi  ', '1', '0652258330', 'valachenai@rdb.lk', '', '6', '15');
INSERT INTO `com_branch` VALUES ('224', '6160', 'Kattankudy', 'Main Street,  Arayanpadhi', '1', '0652248600', 'kattankudy@rdb.lk', '.', '6', '15');
INSERT INTO `com_branch` VALUES ('225', '6170', 'Trincomalee', 'No 51,  Central Road,  Trincomalee  ', '1', '0262225006', 'trincomalee@rdb.lk', '', '6', '16');
INSERT INTO `com_branch` VALUES ('226', '6180', 'Kaluwanchikudy', 'Kaluwanchikudy      ', '1', '0652251627', 'Kaluwanchikudy@rdb.lk', '', '6', '15');
INSERT INTO `com_branch` VALUES ('227', '6190', 'Kokkaddicholai', 'Kokkaddicholai      ', '1', '0652056917', 'kokkaddicholai@rdb.lk', '', '6', '15');
INSERT INTO `com_branch` VALUES ('228', '6200', 'Muththur', 'Muththur      ', '1', '0262238080', 'muthur@rdb.lk', '', '6', '15');
INSERT INTO `com_branch` VALUES ('229', '6900', 'Eastern Provincial Office', 'No 51 A, New Kalmunai Rd,  Kallady,  Batticoloa', '1', '0652225881', '', '', null, null);
INSERT INTO `com_branch` VALUES ('230', '6970', 'Batticalo District Office', 'Batticalo      ', '1', '0652225845', 'dobatticaloa@rdb.lk', '', null, null);
INSERT INTO `com_branch` VALUES ('232', '6990', 'Ampara District Office', 'Ampara      ', '1', '0632222120', 'doampara@rdb.lk', '0632222120', null, null);
INSERT INTO `com_branch` VALUES ('234', '7010', 'Kuliyapitiya', 'Shopping Complex,  Kuliyapitiya    ', '1', '0372283830', 'kuliyapitiya@rdb.lk', '.', '7', '17');
INSERT INTO `com_branch` VALUES ('235', '7020', 'Pannala', 'Shopping Complex,  Pannala    ', '1', '0372246151', 'pannala@rdb.lk', '037-2246151', '7', '18');
INSERT INTO `com_branch` VALUES ('236', '7030', 'Panduwasnuwara', 'Kurunegala Road,  Hettipola    ', '1', '0372291195', 'panduwasnuwara@rdb.lk', '', '7', '17');
INSERT INTO `com_branch` VALUES ('237', '7040', 'Alawwa', 'Main Rd,  Alawwa   ', '1', '0372278083', 'alawwa@rdb.lk', '037-2278083', '7', '17');
INSERT INTO `com_branch` VALUES ('238', '7050', 'Dummalasuriya', 'Madampe Rd, Dummalasuriya      ', '1', '0322240743', 'dummalasooriya@rdb.lk', '.', '7', '18');
INSERT INTO `com_branch` VALUES ('239', '7060', 'Pothuhera', 'Colombo Rd, Pothuhera    ', '1', '0372237518', 'pothuhera@rdb.lk', '037-2237518', '7', '17');
INSERT INTO `com_branch` VALUES ('240', '7070', 'Nikaweratiya', 'Puttalam Rd,  Nikaweratiya    ', '1', '0372260348', 'nikaweratiya@rdb.lk', '', '7', '17');
INSERT INTO `com_branch` VALUES ('241', '7080', 'Rideegama', 'Keppetigala Road,  Rideegama    ', '1', '0372252338', 'rideegama@rdb.lk', '', '7', '17');
INSERT INTO `com_branch` VALUES ('242', '7090', 'Mawathagama', 'Kandy Road, Mawathagama      ', '1', '0372299428', 'mawathagama@rdb.lk', '.', '7', '17');
INSERT INTO `com_branch` VALUES ('243', '7100', 'Wariyapola', 'No.77,  Kurunegala Rd,  Wariyapola  ', '1', '0372267380', 'wariyapola@rdb.lk', '037-2267380', '7', '17');
INSERT INTO `com_branch` VALUES ('244', '7110', 'Kurunegala', 'No. 12 B, Dambulla Rd,  Kurunegala.    ', '1', '0372224351', 'kurunegala@rdb.lk', '037-2224351', '7', '17');
INSERT INTO `com_branch` VALUES ('245', '7120', 'Galgamuwa', 'Anuradhapura Rd,  Galgamuwa    ', '1', '0372253106', 'galgamuwa@rdb.lk', '.', '7', '17');
INSERT INTO `com_branch` VALUES ('246', '7130', 'Chilaw', 'Edman Peiris Mw,  Chillaw    ', '1', '0322224730', 'chilaw@rdb.lk', '', '7', '18');
INSERT INTO `com_branch` VALUES ('247', '7140', 'Palakuda', 'Kalpitiya Road,Thalawila.      ', '1', '0322261055', 'palakuda@rdb.lk', '.', '7', '18');
INSERT INTO `com_branch` VALUES ('248', '7150', 'Anamaduwa', 'No 43, Nawagattegama Rd,  Anamaduwa ', '1', '0322263293', 'anamaduwa@rdb.lk', '.', '7', '18');
INSERT INTO `com_branch` VALUES ('249', '7160', 'Nattandiya', 'Marawila Road,  Nattandiya', '1', '0322254577', 'natthandiya@rdb.lk', '.', '7', '18');
INSERT INTO `com_branch` VALUES ('250', '7170', 'Kirimatiyana', 'Colombo Road, Kirimetiyana      ', '1', '0312255620', 'kirimetiyana@rdb.lk', '', '7', '18');
INSERT INTO `com_branch` VALUES ('251', '7180', 'Puttalam', 'Kurunegala Road, Puttlam      ', '1', '0322265585', 'puttlam@rdb.lk', '.', '7', '18');
INSERT INTO `com_branch` VALUES ('252', '7190', 'Maho', 'No.73, Main Street,  Maho    ', '1', '0372275325', 'maho@rdb.lk', '.', '7', '17');
INSERT INTO `com_branch` VALUES ('253', '7200', 'Giriulla', 'No 105, Main Street, Giriulla     ', '1', '0372288393', 'giriulla@rdb.lk', '.', '7', '17');
INSERT INTO `com_branch` VALUES ('254', '7210', 'Ibbagamuwa', 'Dambulla Rd,  Ibbagamuwa ', '1', '0372259703', 'ibbagamuwa@rdb.lk', '.', '7', '17');
INSERT INTO `com_branch` VALUES ('255', '7220', 'Mundel', 'Puttlam Road,  Mundel.    ', '1', '0322052488', '', '032-2052488', '7', '18');
INSERT INTO `com_branch` VALUES ('256', '7230', 'Nawagaththegama', 'Galgamuwa  Rd, Nawagattegama    ', '1', '0322052923', 'nawagattegama@rdb.lk', '.', '7', '18');
INSERT INTO `com_branch` VALUES ('257', '7240', 'Mampuri', 'Kalpitiya Road, Mampuri      ', '1', '0322268726', 'mampuri@rdb.lk', '.', '7', '18');
INSERT INTO `com_branch` VALUES ('258', '7250', 'Mahawewa', 'Colombo Rd,  Mahawewa   ', '1', '0322254812', 'mahawewa@rdb.lk', '032-2254812', '7', '18');
INSERT INTO `com_branch` VALUES ('259', '7260', 'Narammala', 'Kurunegala Rd, Narammala      ', '1', '0372249385', 'narammala@rdb.lk', '.', '7', '17');
INSERT INTO `com_branch` VALUES ('260', '7270', 'Polpithigama', 'In Front of the  Clock Tower,  Polpithigama  ', '1', '0372273087', 'polpthigama@rdb.lk', '.', '7', '17');
INSERT INTO `com_branch` VALUES ('261', '7280', 'Bowatta', 'Bowatte,  Bingiriya    ', '1', '0322246275', 'bowatta@rdb.lk', '.', '7', '18');
INSERT INTO `com_branch` VALUES ('262', '7290', 'Head Quarters North Western', 'No 155,  Negombo Rd,  Kurunegala  ', '1', '0372227428', 'hqb@rdb.lk', '037-2227428', '7', '17');
INSERT INTO `com_branch` VALUES ('263', '7300', 'Melsiripura', 'No. 07, Dambulla Rd,  Melsiripura.    ', '1', '0372250235', 'melsiripura@rdb.lk', '.', '7', '17');
INSERT INTO `com_branch` VALUES ('264', '7310', 'Ambanpola', 'No 85,  Anuradhapura Rd,  Ambanpola', '1', '0372253535', 'ambanpola@rdb.lk', '', '7', '17');
INSERT INTO `com_branch` VALUES ('265', '7320', 'Santa Anapura', 'Santa Anapura , Lunuwila      ', '1', '0312253992', 'stanapura@rdb.lk', '', '7', '18');
INSERT INTO `com_branch` VALUES ('266', '7330', 'Paragahadeniya', 'No 164, Kandy Rd,  Paragahadeniya,  Weuda.  ', '1', '0372296290', 'paragahadeniya@rdb.lk', '', '7', '17');
INSERT INTO `com_branch` VALUES ('267', '7340', 'Perakumpura', 'Perakumpura, Galgamuwa    ', '1', '0373611663', 'Perakumpura@rdb.lk', '', '7', '17');
INSERT INTO `com_branch` VALUES ('268', '7350', 'Kalpitiya', 'No 109,  Main Street, Kalpitiya  ', '1', '0322260599', 'kalpitiya@rdb.lk', '.', '7', '18');
INSERT INTO `com_branch` VALUES ('269', '7900', 'North Western Provincial Office', 'No. 155, Negambo Rd, Kurunegala      ', '1', '0372231880', '', '', null, null);
INSERT INTO `com_branch` VALUES ('270', '7980', 'Puttlam District Office', 'Depot Rd,  Chilaw    ', '1', '0322223448', 'doputtalum@rdb.lk', '032-2223689', null, null);
INSERT INTO `com_branch` VALUES ('271', '7990', 'Kurunagala District Office', 'No.77,  Kurunegala Rd,  Wariyapola  ', '1', '0372268323', 'dokurunegala@rdb.lk', '037-2268323', null, null);
INSERT INTO `com_branch` VALUES ('273', '8010', 'Mihinthale', 'Trinco Rd,  Mihinthale    ', '1', '0252266514', 'mihintale@rdb.lk', '025-2266514', '8', '19');
INSERT INTO `com_branch` VALUES ('274', '8020', 'Anuradhapura Town', 'No 337/16,  Bank Site,  Mosque Rd, A/Pura', '1', '0252224347', 'anuradhapuracity@rdb.lk', '025-2224347', '8', '19');
INSERT INTO `com_branch` VALUES ('275', '8030', 'Thambuththegama', 'No 35,  Kurunegala Rd,  Thambuththegama  ', '1', '0252276312', 'thambuttegama@rdb.lk', '025-2276312', '8', '19');
INSERT INTO `com_branch` VALUES ('276', '8040', 'Kahatagasdigiliya', 'Anuradhapura Road,  Kahatagasdigiliya    ', '1', '0252247447', 'kahatagasdigiliya@rdb.lk', '', '8', '19');
INSERT INTO `com_branch` VALUES ('277', '8050', 'Galnewa', 'No.03, Jaya Mw, Galnewa  ', '1', '0252269503', 'galnewa@rdb.lk', '025-2269503', '8', '19');
INSERT INTO `com_branch` VALUES ('278', '8060', 'Thalawa', 'No. 06,  Kurunegala Rd,  Thalawa  ', '1', '0252276314', 'thalawa@rdb.lk', '025-2276314', '8', '19');
INSERT INTO `com_branch` VALUES ('279', '8070', 'Madawachchiya', 'Mana Road,  Madawachchiya.    ', '1', '0252245610', 'medawachchiya@rdb.lk', '.', '8', '19');
INSERT INTO `com_branch` VALUES ('280', '8080', 'Thirappane', 'Kandy Road,  Thirappane    ', '1', '0252050112', 'tirappane@rdb.lk', '0252050112', '8', '19');
INSERT INTO `com_branch` VALUES ('281', '8090', 'Rambewa', 'Jaffna Rd, Bazzar Street,  Rambewa    ', '1', '0252266572', 'rambewa@rdb.lk', '.', '8', '19');
INSERT INTO `com_branch` VALUES ('282', '8100', 'Polonnaruwa', 'Pradeshiya Sabha Building,  Polonnaruwa', '1', '0272223179', 'polonnaruwa@rdb.lk', '.', '8', '20');
INSERT INTO `com_branch` VALUES ('283', '8110', 'Medirigiriya', 'No. 10, Main Street,  Medirigiriya    ', '1', '0272248324', 'medirigiriya@rdb.lk', '.', '8', '20');
INSERT INTO `com_branch` VALUES ('284', '8120', 'Pulasthigama', 'B.O.P. 400,  Pulasthigama.    ', '1', '0272242029', 'pulasthigama@rdb.lk', '.', '8', '20');
INSERT INTO `com_branch` VALUES ('285', '8130', 'Hingurakgoda', 'No. 72, Air Port Road,  Hingurakgoda    ', '1', '0272246078', 'hingurakgoda@rdb.lk', '027-2246078', '8', '20');
INSERT INTO `com_branch` VALUES ('286', '8140', 'Bakamoonaaa', 'No 45, Hospital Road,  Bakamoona    ', '1', '0662256659', 'bakamoona@rdb.lk', '.', '8', '20');
INSERT INTO `com_branch` VALUES ('287', '8150', 'Galenbidunuwewa', 'Pola Road,  Galenbidunuwewa    ', '1', '0252258272', 'galenbindunuwewa@rdb.lk', '', '8', '19');
INSERT INTO `com_branch` VALUES ('288', '8160', 'Gonapathirawa', 'Harison Jayasingha  Building,  Gonagalapura  ', '1', '0252249201', 'gonapathirawa@rdb.lk', '.', '8', '19');
INSERT INTO `com_branch` VALUES ('289', '8170', 'Manampitiya', 'Batticalo Road,  Manampitiya.    ', '1', '0272051010', 'manampitiya@rdb.lk', '', '8', '20');
INSERT INTO `com_branch` VALUES ('290', '8180', 'Galamuna', 'No. 145, Pansalgodella,  Galamuna.    ', '1', '0272051616', 'galamuna@rdb.lk', '.', '8', '20');
INSERT INTO `com_branch` VALUES ('291', '8190', 'New Town - Anuradhapura', 'No.56/86 C,New Bus Stand,  1st Lane,  Anuradhapura.  ', '1', '0252225760', 'anuradhapuranewtown@rdb.lk', '.', '8', '19');
INSERT INTO `com_branch` VALUES ('292', '8200', 'Siripura', 'No. 39, New Town,  Siripura    ', '1', '0272250276', 'siripura@rdb.lk', '.', '8', '20');
INSERT INTO `com_branch` VALUES ('293', '8210', 'Kaduruwela', 'Somiyel Junction,  Kaduruwela    ', '1', '0272225838', 'kaduruwela@rdb.lk', '027-2225838', '8', '20');
INSERT INTO `com_branch` VALUES ('294', '8220', 'Kekirawa', 'Maradankadawala Rd,  Kekirawa    ', '1', '0252263259', 'kekirawa@rdb.lk', '025-2263259', '8', '19');
INSERT INTO `com_branch` VALUES ('295', '8230', 'Aralaganwila', 'No 78/14, Kolongas Junction, Aralaganwila    ', '1', '0272257070', 'aralaganvila@rdb.lk', '.', '8', '20');
INSERT INTO `com_branch` VALUES ('296', '8240', 'Thambuththegama EC', 'No.128,  Thambuththegama  Economic Centre,  Thambuththegama', '1', '0252275065', 'thambuttegamadec@rdb.lk', '', '8', '19');
INSERT INTO `com_branch` VALUES ('297', '8250', 'Sewanapitiya', 'No 68,  Sewanapitiya    ', '1', '0272050270', 'sewanapitiya@rdb.lk', '', '8', '20');
INSERT INTO `com_branch` VALUES ('298', '8260', 'Bogaswewa', 'No 24,  Villege No 02,  Bogaswewa,  Vauniya', '1', '0253244899', 'bogaswewa@rdb.lk', '.', '8', '19');
INSERT INTO `com_branch` VALUES ('299', '8900', 'North Central Provincial Office', null, '1', '0252223080', '', '', null, null);
INSERT INTO `com_branch` VALUES ('300', '8980', 'Polonnaruwa District Office', 'Batticalo Rd,  Polonnaruwa    ', '1', '0272223212', 'dopolonnaruwa@rdb.lk', '027-2223014', null, null);
INSERT INTO `com_branch` VALUES ('301', '8990', 'Anuradhapura District Office', 'No 65d,  Abaya Place,  4th Lane, Anuradhapura', '1', '0252223080', 'doanuradhapura@rdb.lk', '', null, null);
INSERT INTO `com_branch` VALUES ('302', '9010', 'Vavuniya', 'No 48/50,  2nd Cross Street, Vavuniya  ', '1', '0242226389', 'vavuniya@rdb.lk', '024-2226389', '9', '23');
INSERT INTO `com_branch` VALUES ('303', '9020', 'Kanakarayankulam', 'A9 Rd,  Kananarayankulam    ', '1', '0242051316', 'kanakarayankulam@rdb.lk', '', '9', '23');
INSERT INTO `com_branch` VALUES ('304', '9030', 'Mannar', 'No: 2-54,  Pallimunai Road,  Mannar  ', '1', '0232223432', 'mannar@rdb.lk', '', '9', '23');
INSERT INTO `com_branch` VALUES ('305', '9040', 'Chunnakam', 'No 27  29,  K.K.S Rd,  Marudhanamadam', '1', '0212241989', 'chunnakam@rdb.lk', '021-2241989', '9', '23');
INSERT INTO `com_branch` VALUES ('306', '9050', 'Jaffna', 'No 85/87,  Stanly Rd,  Jaffna  ', '1', '0212219405', 'jaffna@rdb.lk', '021-2219405', '9', '23');
INSERT INTO `com_branch` VALUES ('307', '9060', 'Kilinochchi', 'A9 Road,  Kilinochchi    ', '1', '0212280099', 'kilinochchi@rdb.lk', '021-2280099', '9', '23');
INSERT INTO `com_branch` VALUES ('308', '9960', 'Kilinochchi District Office', '13/01, Thiruwaiaru, A9 Road, Kilinochiya', '1', '0212280180', 'dokilinochchi@rdb.lk', '021-2280099', '9', null);
INSERT INTO `com_branch` VALUES ('309', '1350', 'Nugegoda', 'No:80, Nawala Road, Nugegoda', '1', '0112821035', null, '011-2821233', '1', '1');
INSERT INTO `com_branch` VALUES ('310', '7360', 'Wennappuwa', 'No:217, Chillaw Road, Wennapuwa', '1', '0312245564', null, '031-2245567', '7', '18');
INSERT INTO `com_branch` VALUES ('311', '4350', 'Kandy 2 nd', 'No: 831 / B, Sirimavo Bandaranaike Mw, Kandy', '1', '0812222467', ' ', '081-2222459', '4', '9');
INSERT INTO `com_branch` VALUES ('312', '6210', 'Batticaloa 2 nd', 'No: 28, New Kalmunai Road, BatticaloNo: 28, New Kalmunai Road, Batticalo', '1', '0652227834', null, '065-2227816', '6', '15');

-- ----------------------------
-- Table structure for connection_details
-- ----------------------------
DROP TABLE IF EXISTS `connection_details`;
CREATE TABLE `connection_details` (
  `connection_id` int(11) NOT NULL AUTO_INCREMENT,
  `connection_name` varchar(255) DEFAULT NULL,
  `connection_status` int(11) DEFAULT NULL,
  PRIMARY KEY (`connection_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of connection_details
-- ----------------------------
INSERT INTO `connection_details` VALUES ('1', 'VPN', null);
INSERT INTO `connection_details` VALUES ('2', 'Radio', null);
INSERT INTO `connection_details` VALUES ('3', 'APN', null);

-- ----------------------------
-- Table structure for link_details
-- ----------------------------
DROP TABLE IF EXISTS `link_details`;
CREATE TABLE `link_details` (
  `link_id` int(11) NOT NULL AUTO_INCREMENT,
  `link_type` varchar(255) DEFAULT NULL,
  `link_status` int(11) DEFAULT NULL,
  PRIMARY KEY (`link_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of link_details
-- ----------------------------
INSERT INTO `link_details` VALUES ('1', 'Primary', null);
INSERT INTO `link_details` VALUES ('2', 'Secondary', null);
INSERT INTO `link_details` VALUES ('3', 'Dongle', null);

-- ----------------------------
-- Table structure for officer_details
-- ----------------------------
DROP TABLE IF EXISTS `officer_details`;
CREATE TABLE `officer_details` (
  `officer_id` int(11) NOT NULL AUTO_INCREMENT,
  `officer_name` varchar(255) DEFAULT NULL,
  `officer_status` int(11) DEFAULT NULL,
  PRIMARY KEY (`officer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of officer_details
-- ----------------------------
INSERT INTO `officer_details` VALUES ('1', 'Nishantha Bandara', null);
INSERT INTO `officer_details` VALUES ('2', 'Dammika Amarapala', null);

-- ----------------------------
-- Table structure for provider_details
-- ----------------------------
DROP TABLE IF EXISTS `provider_details`;
CREATE TABLE `provider_details` (
  `provider_id` int(11) NOT NULL AUTO_INCREMENT,
  `provider_description` varchar(15) NOT NULL,
  `provider_status` int(11) NOT NULL,
  PRIMARY KEY (`provider_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of provider_details
-- ----------------------------
INSERT INTO `provider_details` VALUES ('1', 'SLT', '1');
INSERT INTO `provider_details` VALUES ('2', 'Dialog', '1');
INSERT INTO `provider_details` VALUES ('3', 'Hutch', '1');

-- ----------------------------
-- Table structure for site_details
-- ----------------------------
DROP TABLE IF EXISTS `site_details`;
CREATE TABLE `site_details` (
  `site_id` int(11) NOT NULL AUTO_INCREMENT,
  `site_branch_id` int(11) NOT NULL,
  `site_provider` varchar(20) NOT NULL,
  `site_category` varchar(20) NOT NULL,
  `site_account_no` int(11) NOT NULL,
  `site_circuit_id` int(11) NOT NULL,
  `site_bandwidth` int(11) NOT NULL,
  `site_monthly_charge` decimal(11,2) DEFAULT NULL,
  `site_tax` decimal(11,2) DEFAULT NULL,
  `site_vat` decimal(11,2) DEFAULT NULL,
  `site_total_amount` decimal(11,2) NOT NULL,
  PRIMARY KEY (`site_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of site_details
-- ----------------------------
INSERT INTO `site_details` VALUES ('1', '1030', '2', 'ATM', '2147483647', '23411111', '256', '1000.00', '0.00', '0.00', '1891.00');
INSERT INTO `site_details` VALUES ('2', '1030', '2', 'ATM', '2147483647', '23411111', '256', '1000.00', '0.00', '0.00', '1891.00');
INSERT INTO `site_details` VALUES ('3', '1030', '2', 'ATM', '2147483647', '23411111', '256', '1000.00', '0.00', '0.00', '1891.00');
INSERT INTO `site_details` VALUES ('4', '6050', '3', 'ATM', '2147483647', '23411111', '128', '1000.00', '0.00', '0.00', '1891.00');
INSERT INTO `site_details` VALUES ('5', '2040', '1', 'Branch', '2147483647', '23411111', '256', '1000.00', '0.00', '0.00', '1891.00');
INSERT INTO `site_details` VALUES ('6', '6050', '3', 'ATM', '2147483647', '23411111', '128', '1000.00', '0.00', '0.00', '1891.00');
INSERT INTO `site_details` VALUES ('7', '6050', '3', 'ATM', '2147483647', '23411111', '128', '1000.00', '0.00', '0.00', '1891.00');
INSERT INTO `site_details` VALUES ('8', '8020', '2', 'CDM', '2147483647', '23411111', '128', '1000.00', '0.00', '0.00', '1891.00');
INSERT INTO `site_details` VALUES ('9', '5110', '2', 'ATM', '2147483647', '23411111', '256', '1000.00', '0.00', '0.00', '1891.00');
INSERT INTO `site_details` VALUES ('10', '2380', '2', 'Branch', '2147483647', '23411111', '128', '1001.00', '0.00', '0.00', '1891.00');
INSERT INTO `site_details` VALUES ('11', '2010', '3', 'ATM', '2147483647', '23411111', '256', '1000.50', '0.00', '0.00', '1890.70');

-- ----------------------------
-- Table structure for test
-- ----------------------------
DROP TABLE IF EXISTS `test`;
CREATE TABLE `test` (
  `name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of test
-- ----------------------------
INSERT INTO `test` VALUES ('ශ්‍රි ලංකාව', 'ප්‍රමෝද්');
INSERT INTO `test` VALUES ('ඤා නීතීඥඥා', 'මහද');
