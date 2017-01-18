/*
MySQL Data Transfer
Source Host: localhost
Source Database: xueji
Target Host: localhost
Target Database: xueji
Date: 2012-08-02 17:10:18
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for sdw_admingroups
-- ----------------------------
CREATE TABLE `sdw_admingroups` (
  `groupid` smallint(6) NOT NULL auto_increment,
  `grouptitle` varchar(20) default NULL,
  PRIMARY KEY  (`groupid`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- ----------------------------
-- Table structure for sdw_adminlog
-- ----------------------------
CREATE TABLE `sdw_adminlog` (
  `id` int(11) NOT NULL auto_increment,
  `adminid` smallint(4) default NULL,
  `body` mediumtext,
  `dateline` varchar(20) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- ----------------------------
-- Table structure for sdw_admins
-- ----------------------------
CREATE TABLE `sdw_admins` (
  `adminid` smallint(6) NOT NULL auto_increment,
  `username` varchar(20) default NULL,
  `password` varchar(40) default NULL,
  `groupid` tinyint(2) default '0',
  `lastlogin` varchar(20) default NULL,
  `lastip` varchar(16) default NULL,
  `logintimes` smallint(6) default '0',
  `realname` varchar(20) default NULL,
  `tel` varchar(20) default NULL,
  `email` varchar(30) default NULL,
  PRIMARY KEY  (`adminid`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- ----------------------------
-- Table structure for sdw_announce
-- ----------------------------
CREATE TABLE `sdw_announce` (
  `id` int(11) NOT NULL auto_increment,
  `title` varchar(50) default NULL,
  `body` mediumtext,
  `sign` varchar(20) default NULL,
  `author` varchar(10) default NULL,
  `dateline` varchar(20) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- ----------------------------
-- Table structure for sdw_category
-- ----------------------------
CREATE TABLE `sdw_category` (
  `cid` smallint(6) NOT NULL auto_increment,
  `cname` varchar(20) default NULL,
  PRIMARY KEY  (`cid`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- ----------------------------
-- Table structure for sdw_class
-- ----------------------------
CREATE TABLE `sdw_class` (
  `classid` int(11) NOT NULL auto_increment,
  `tid` smallint(6) default NULL,
  `sid` smallint(6) default NULL,
  `gid` smallint(11) default NULL,
  `classname` varchar(20) default NULL,
  `classteacher` varchar(20) default NULL,
  PRIMARY KEY  (`classid`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- ----------------------------
-- Table structure for sdw_nations
-- ----------------------------
CREATE TABLE `sdw_nations` (
  `id` smallint(6) NOT NULL auto_increment,
  `nation` varchar(20) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- ----------------------------
-- Table structure for sdw_school
-- ----------------------------
CREATE TABLE `sdw_school` (
  `sid` smallint(11) NOT NULL auto_increment,
  `tid` smallint(11) default NULL,
  `sname` varchar(50) default NULL,
  `stype` tinyint(1) default '1',
  `body` mediumtext,
  PRIMARY KEY  (`sid`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- ----------------------------
-- Table structure for sdw_student
-- ----------------------------
CREATE TABLE `sdw_student` (
  `id` int(11) NOT NULL auto_increment,
  `school` varchar(30) default NULL,
  `schoolyear` varchar(4) default NULL,
  `studentid` varchar(20) NOT NULL default '',
  `oldstudentid` varchar(20) default NULL,
  `name` varchar(20) default NULL,
  `password` varchar(50) default NULL,
  `avatar` varchar(200) default NULL,
  `atype` varchar(10) default '' COMMENT '别类',
  `grade` varchar(10) default NULL COMMENT '年级',
  `class` varchar(10) default '',
  `sex` varchar(4) default '',
  `nation` varchar(10) default NULL,
  `birthplace` varchar(100) default NULL,
  `birthday` varchar(20) default NULL,
  `graduate` varchar(20) default NULL,
  `score` varchar(6) default '0',
  `source` varchar(10) default '',
  `idnumber` varchar(18) NOT NULL default '',
  `accountid` varchar(20) default NULL,
  `indate` varchar(12) default NULL,
  `intodate` varchar(12) default NULL,
  `outdate` varchar(12) default NULL,
  `remark` mediumtext,
  PRIMARY KEY  (`id`,`studentid`,`idnumber`),
  UNIQUE KEY `studentid` (`studentid`),
  KEY `name` (`name`),
  KEY `school` (`school`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- ----------------------------
-- Table structure for sdw_task
-- ----------------------------
CREATE TABLE `sdw_task` (
  `taskid` int(11) NOT NULL auto_increment,
  `tasktitle` varchar(50) default NULL,
  `adminid` smallint(6) default NULL,
  `studentid` varchar(20) default NULL,
  `category` smallint(6) default NULL,
  `body` mediumtext,
  `dateline` varchar(20) default NULL,
  `status` tinyint(1) default '0',
  `trail` tinyint(1) default '0',
  `final` tinyint(1) default '0',
  `trailadmin` varchar(20) default NULL,
  `finaladmin` varchar(20) default NULL,
  `traildate` varchar(20) default NULL,
  `finaldate` varchar(20) default NULL,
  PRIMARY KEY  (`taskid`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- ----------------------------
-- Table structure for sdw_town
-- ----------------------------
CREATE TABLE `sdw_town` (
  `tid` smallint(6) NOT NULL auto_increment,
  `town` varchar(20) default NULL,
  PRIMARY KEY  (`tid`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records 
-- ----------------------------
INSERT INTO `sdw_admingroups` VALUES ('1', '系统管理员');
INSERT INTO `sdw_admingroups` VALUES ('2', '教育局管理员');
INSERT INTO `sdw_admingroups` VALUES ('3', '乡镇管理员');
INSERT INTO `sdw_admingroups` VALUES ('4', '学校管理员');
INSERT INTO `sdw_admingroups` VALUES ('5', '班主任');
INSERT INTO `sdw_adminlog` VALUES ('4', '1', '修改公告:截止28日下午6：00，学业水平报名情况通报', '1322105954');
INSERT INTO `sdw_adminlog` VALUES ('5', '1', '修改公告:新生录入问题集', '1322106144');
INSERT INTO `sdw_adminlog` VALUES ('6', '1', '修改公告:2011年12月学业水平考试时间段安排温馨提示', '1322106158');
INSERT INTO `sdw_adminlog` VALUES ('7', '1', '修改公告:2011年12月普通高中学业水平考试通知', '1322106631');
INSERT INTO `sdw_admins` VALUES ('1', 'admin', 'fa4205bf4a27792f244d4748469dceade1944f17', '1', '1343895929', '127.0.0.1', '68', '宋德伟', '18685812123', 'songdewei@163.com');
INSERT INTO `sdw_admins` VALUES ('7', 'xy113', 'fa4205bf4a27792f244d4748469dceade1944f17', '1', '1342776639', '127.0.0.1', '1', '宋德伟', '18685812123', 'songdewei@163.com');
INSERT INTO `sdw_announce` VALUES ('1', '新生录入问题集', '<p><span style=\"text-indent: 2em;\" id=\"lbl_content\">我们收集了在新生录入期间，一些普遍出现的问题，整理成Excel文件，请各位老师下载后认真查看。还有什么其他问题的，还有什么其他的问题请在QQ中提问。</span></p>', '王老师', 'admin', '1320133325');
INSERT INTO `sdw_announce` VALUES ('2', '2011年12月普通高中学业水平考试通知', '<p><span style=\"text-indent: 2em;\" id=\"lbl_content\">各市（州、地）教育局： 根据《省教育厅关于全省统一组织实施普通高中学业水平考试的通知》（黔教基发[2009]364号），为确保2011年12月普通高中学业水平考试工作顺 利进行，现将有关事宜通知如下： 一、报名范围：2011年12月进行的普通高中学业水平考试的参考学生均为2010年秋季入学的已修满相关学科学分并通过电子学籍注册审核的在校高二学 生。未经审核通过的学生一律不参加此次考试（学校学籍注册和审核工作务必于7月15日前完成，逾期不再受理）。各校根据课程学分修满情况组织相关科目的报 名考试工作。 二、报名时间：  2011年10月10日至10月30日。今年学业水平考试第一次试行网络电子报名，各学校一定要根据课程安排和学分修习情况组织指导学生的报名工作，10 月30日前学校完成电子录入报名工作，11月5日前各县（市、区），各市（州、地）教育局完成报名审核工作，11月10日前省会考办完成全省报名数据的电 子汇总。学业水平考试准考证由学校统一到县（市、区）教育局办理，县（市、区）教育局统一到市（州、地）教育局加盖钢印。 三、考试科目及时间：  2011年12月普通高中学业水平考试的科目为地理、历史、物理、化学、生物、思想政治六个科目，卷面分为150分。考试科目及时间见下表： </span></p>\r\n<p><span style=\"text-indent: 2em;\" id=\"lbl_content\">时          间	　　　　　　考试科目 </span></p>\r\n<p><span style=\"text-indent: 2em;\" id=\"lbl_content\">12月23日星期五	上午</span></p>\r\n<p><span style=\"text-indent: 2em;\" id=\"lbl_content\">	8﹕00 ～ 9﹕30　　　　历    史 　　　　　　　　　　　　　　</span></p>\r\n<p><span style=\"text-indent: 2em;\" id=\"lbl_content\">10﹕30 ～ 12﹕00	　　&nbsp; 地    理 	　　　　　</span></p>\r\n<p><span style=\"text-indent: 2em;\" id=\"lbl_content\">下午	　</span></p>\r\n<p><span style=\"text-indent: 2em;\" id=\"lbl_content\">2﹕00～3﹕30　　　　 生    物 　　　　　　　　　　　　　　</span></p>\r\n<p><span style=\"text-indent: 2em;\" id=\"lbl_content\">4﹕30～6﹕00　　　　	思想政治 </span></p>\r\n<p><span style=\"text-indent: 2em;\" id=\"lbl_content\">12月24日星期六	上午</span></p>\r\n<p><span style=\"text-indent: 2em;\" id=\"lbl_content\">	8﹕00 ～ 9﹕30　　　　化    学 　　　　　　　　　　　　　　</span></p>\r\n<p><span style=\"text-indent: 2em;\" id=\"lbl_content\">10﹕30 ～ 12﹕00	　　 物    理 </span></p>\r\n<p><span style=\"text-indent: 2em;\" id=\"lbl_content\">      四、考试范围：本次学业水平考试的各学科均按2011年9月编印的《2011年普通高中学业水平考试标准》进行命题，题目只设客观题，不设主观题。有关 《2011年普通高中学业水平考试标准》请各学校与省教科所联系，联系人：王区春，联系电话：0851-6747094。      </span></p>\r\n<p><span style=\"text-indent: 2em;\" id=\"lbl_content\">五、领卷时间：省会考办安排于12月20日-21日将试卷送至各市（州、地）教育局。请各市（州、地）教育局指定专人接卷，认真清点，办齐交接手续。按照 有关试卷的保密管理规定，做好试卷的管理、发放等工作。 </span></p>\r\n<p><span style=\"text-indent: 2em;\" id=\"lbl_content\">六、送卷、评卷：各考点于考试结束后立即将答题卡封装，于12月26日前送至各市（州、地）教育局，请各市（州、地）教育局指定专人接收，于12月28日 前送至省评卷基地贵州师范学院，联系人：王先华 0851-6270035（手机：13885136176），学业水平考试评卷实行全省统一评卷。 </span></p>\r\n<p><span style=\"text-indent: 2em;\" id=\"lbl_content\">七、成绩呈现：学业水平考试成绩统一划定，按A、B、C、D等第呈现。 </span></p>\r\n<p><span style=\"text-indent: 2em;\" id=\"lbl_content\">八、收费标准：按省物价局、省财政厅《关于制定普通高中学业水平考试费试行标准及有关问题的通知》（黔价费[2010]227号）文件标准收费，各级工作 经费留用比例按文件要求执行。各市（州、地）教育局务必请于11月30日前将有关费用缴纳到省会考办（开户行：工商银行贵阳市中西支行；账户：贵州省普通 高中毕业会考办公室；账号：2402002609008937144）。 </span></p>\r\n<p><span style=\"text-indent: 2em;\" id=\"lbl_content\">九、考风考纪：各地要高度重视，精心组织，认真负责地抓好考风考纪工作，确保学业水平考试的严肃性和考试成绩的真实性。要将考务工作的各个环节责任到人， 坚持学业水平考试巡视制度，严肃处理舞弊事件。     </span></p>\r\n<p><span style=\"text-indent: 2em;\" id=\"lbl_content\">十、考试期间省学业水平考试办公室值班电话：（0851）5282726、5284246。　    　　　　　</span></p>\r\n<p><span style=\"text-indent: 2em;\" id=\"lbl_content\"> 二○一一年六月十七日 </span></p>', '张三', 'admin', '1320136880');
INSERT INTO `sdw_announce` VALUES ('3', '2011年12月学业水平考试时间段安排温馨提示', '<p><span style=\"text-indent: 2em;\" id=\"lbl_content\">2011年12月学业水平考试时间段安排温馨提示  10月30日以前        各学校完成报名。 11月1日&mdash;5日        各县（市、区、特区），市（州、地）核查报名信息。 11月6日&mdash;10日       省级核查报名信息 11月11日&mdash;15日      各县（市、区、特区）完成考场编排 11月16日&mdash;20日      省、市（州、地）核查考场编排信息 11月21日&mdash;25日      考场编排全面结束 11月26日&mdash;12月20日  各县教育局打印相关考点《签到表》、《座签表》、《考点编排统计》、《学校编排统计表》，学校打印《考生通知单》。 12月21日&mdash;22日      各县、学校相关工作落实。 12月23日            正常考试</span></p>', '李老师', 'admin', '1320137450');
INSERT INTO `sdw_announce` VALUES ('4', '温馨提示：报名情况', '<p><span style=\"text-indent: 2em;\" id=\"lbl_content\">截止2011年10月27日下午学业水平报名情况如下： 贵阳市：26所学校未上报 遵义市：55所学校未上报 安顺市：10所学校未上报 六盘水市：10所学校未上报 毕节地区：27所学校未上报 铜仁地区：36所学校未上报 黔南州：20所学校未上报 黔东南州：26所学校未上报 黔西南州：15所学校未上报 本系统10月30日晚12点关闭，请未报的学校抓紧时间！ </span></p>', '马老师', 'admin', '1320137729');
INSERT INTO `sdw_announce` VALUES ('5', '截止28日下午6：00，学业水平报名情况通报', '<p><span id=\"lbl_content\" style=\"text-indent: 2em;\">贵阳市：15所学校未上报； 遵义市：34所学校未上报； 安顺市：7所学校未上报； 六盘水市：7所学校未上报； 毕节地区：15所学校未上报； 铜仁地区：29所学校未上报； 黔南州：17所学校未上报； 黔东南州：22所学校未上报； 黔西南州：10所学校未上报； </span></p>', '胡老师', 'admin', '1320137801');
INSERT INTO `sdw_category` VALUES ('1', '小学');
INSERT INTO `sdw_category` VALUES ('2', '初中');
INSERT INTO `sdw_category` VALUES ('3', '高中');
INSERT INTO `sdw_class` VALUES ('1', '2', '1001', '5', '五(1)班', '王老师');
INSERT INTO `sdw_class` VALUES ('2', '2', '1001', '5', '五(2)班', '王老师');
INSERT INTO `sdw_class` VALUES ('3', '2', '1001', '1', '一(1)班', '李老师');
INSERT INTO `sdw_class` VALUES ('4', '2', '1001', '1', '一(2)班', '欧阳老师');
INSERT INTO `sdw_class` VALUES ('5', '2', '1001', '1', '一(3)班', '莫老师');
INSERT INTO `sdw_class` VALUES ('6', '2', '1001', '1', '一(4)班', '马老师');
INSERT INTO `sdw_class` VALUES ('7', '2', '1001', '1', '一(5)班', '胡老师');
INSERT INTO `sdw_nations` VALUES ('1', '汉族');
INSERT INTO `sdw_nations` VALUES ('2', '蒙古族');
INSERT INTO `sdw_nations` VALUES ('3', '回族');
INSERT INTO `sdw_nations` VALUES ('4', '藏族');
INSERT INTO `sdw_nations` VALUES ('5', '维吾尔族');
INSERT INTO `sdw_nations` VALUES ('6', '苗族');
INSERT INTO `sdw_nations` VALUES ('7', '彝族');
INSERT INTO `sdw_nations` VALUES ('8', '壮族');
INSERT INTO `sdw_nations` VALUES ('9', '布依族');
INSERT INTO `sdw_nations` VALUES ('10', '朝鲜族');
INSERT INTO `sdw_nations` VALUES ('11', '满族');
INSERT INTO `sdw_nations` VALUES ('12', '侗族');
INSERT INTO `sdw_nations` VALUES ('13', '瑶族');
INSERT INTO `sdw_nations` VALUES ('14', '白族');
INSERT INTO `sdw_nations` VALUES ('15', '土家族');
INSERT INTO `sdw_nations` VALUES ('16', '哈尼族');
INSERT INTO `sdw_nations` VALUES ('17', '哈萨克族');
INSERT INTO `sdw_nations` VALUES ('18', '傣族');
INSERT INTO `sdw_nations` VALUES ('19', '黎族');
INSERT INTO `sdw_nations` VALUES ('20', '傈僳族');
INSERT INTO `sdw_nations` VALUES ('21', '佤族');
INSERT INTO `sdw_nations` VALUES ('22', '畲族');
INSERT INTO `sdw_nations` VALUES ('23', '高山族');
INSERT INTO `sdw_nations` VALUES ('24', '拉祜族');
INSERT INTO `sdw_nations` VALUES ('25', '水族');
INSERT INTO `sdw_nations` VALUES ('26', '东乡族');
INSERT INTO `sdw_nations` VALUES ('27', '纳西族');
INSERT INTO `sdw_nations` VALUES ('28', '景颇族');
INSERT INTO `sdw_nations` VALUES ('29', '柯尔克孜族');
INSERT INTO `sdw_nations` VALUES ('30', '土族');
INSERT INTO `sdw_nations` VALUES ('31', '达斡尔族');
INSERT INTO `sdw_nations` VALUES ('32', '仫佬族');
INSERT INTO `sdw_nations` VALUES ('33', '羌族');
INSERT INTO `sdw_nations` VALUES ('34', '布朗族');
INSERT INTO `sdw_nations` VALUES ('35', '撒拉族');
INSERT INTO `sdw_nations` VALUES ('36', '毛南族');
INSERT INTO `sdw_nations` VALUES ('37', '仡佬族');
INSERT INTO `sdw_nations` VALUES ('38', '锡伯族');
INSERT INTO `sdw_nations` VALUES ('39', '阿昌族');
INSERT INTO `sdw_nations` VALUES ('40', '普米族');
INSERT INTO `sdw_nations` VALUES ('41', '塔吉克族');
INSERT INTO `sdw_nations` VALUES ('42', '怒族');
INSERT INTO `sdw_nations` VALUES ('43', '乌孜别克族');
INSERT INTO `sdw_nations` VALUES ('44', '俄罗斯族');
INSERT INTO `sdw_nations` VALUES ('45', '鄂温克族');
INSERT INTO `sdw_nations` VALUES ('46', '德昂族');
INSERT INTO `sdw_nations` VALUES ('47', '保安族');
INSERT INTO `sdw_nations` VALUES ('48', '裕固族');
INSERT INTO `sdw_nations` VALUES ('49', '京族');
INSERT INTO `sdw_nations` VALUES ('50', '塔塔尔族');
INSERT INTO `sdw_nations` VALUES ('51', '独龙族');
INSERT INTO `sdw_nations` VALUES ('52', '鄂伦春族');
INSERT INTO `sdw_nations` VALUES ('53', '赫哲族');
INSERT INTO `sdw_nations` VALUES ('54', '门巴族');
INSERT INTO `sdw_nations` VALUES ('55', '珞巴族');
INSERT INTO `sdw_nations` VALUES ('56', '基诺族');
INSERT INTO `sdw_school` VALUES ('1001', '2', '盘县一中', '2', '');
INSERT INTO `sdw_school` VALUES ('1002', '2', '盘县二中', '2', '');
INSERT INTO `sdw_school` VALUES ('1003', '2', '盘县三中', '2', '');
INSERT INTO `sdw_school` VALUES ('1004', '1', '盘县四中', '2', '');
INSERT INTO `sdw_school` VALUES ('1005', '1', '盘县五中', '2', '');
INSERT INTO `sdw_school` VALUES ('1006', '3', '盘县六中', '2', '');
INSERT INTO `sdw_school` VALUES ('1007', '1', '盘县七中', '2', '');
INSERT INTO `sdw_school` VALUES ('1008', '1', '盘县八中', '2', '');
INSERT INTO `sdw_school` VALUES ('1009', '1', '华夏中学', '2', '');
INSERT INTO `sdw_school` VALUES ('1010', '1', '育才中学', '2', '');
INSERT INTO `sdw_student` VALUES ('1', '盘县二中', '2011', '2111124556533474', null, '宋德伟', null, null, '小学', '1', '3', '男', '汉族', '盘县红果', '1985-02-01', '平塘二中', '300', '转入', '522727198502011219', '000123', '2011-09-01', '2011-09-01', '', '');
INSERT INTO `sdw_student` VALUES ('2', '盘县二中', '2011', '2111124556533475', null, '王小虎', null, null, '小学', '1', '3', '男', '蒙古族', '大山', '2005-12-01', '一小', '500', '转入', '522727198502011222', '', '2011-09-01', '', '', '');
INSERT INTO `sdw_student` VALUES ('3', '盘县二中', '2010', '2111124556533476', '', '李三', null, null, '高中', '1', '1', '男', '汉族', '盘县', '2000-12-01', '盘县一中', '600', '转入', '522727198502011220', '000124', '2011-12-02', '2011-12-02', '2011-12-02', '');
INSERT INTO `sdw_student` VALUES ('4', '盘县二中', '2010', '2111124556533477', '', '张大侠', null, null, '初中', '3', '5', '男', '汉族', '盘县', '2000-12-01', '盘县一中', '600', '转入', '522727198502011221', '000125', '2011-12-02', '2011-12-02', '2011-12-02', '');
INSERT INTO `sdw_student` VALUES ('5', '盘县二中', '2010', '2111124556533478', '', '欧阳雪', null, null, '初中', '2', '6', '女', '汉族', '城关', '1992-12-10', '三小', '600', '转入', '522727198502011229', '000126', '2011-12-01', '2011-12-01', '2011-12-24', '');
INSERT INTO `sdw_student` VALUES ('6', '盘县二中', '2010', '2111124556533479', '', '纳兰信', null, null, '初中', '2', '6', '男', '汉族', '平关', '2002-12-05', '三小', '526', '转入', '522727198502011225', '000126', '2011-12-01', '2011-12-01', '2011-12-30', '');
INSERT INTO `sdw_student` VALUES ('8', '盘县二中', '2011', '2111124556533499', '', '李婷婷', null, null, '高中', '3', '1', '女', '白族', '红果', '2001-09-20', '', '0', '转入', '', '', '2011-12-20', '2011-12-20', '', '');
INSERT INTO `sdw_student` VALUES ('9', '盘县二中', '2011', '2111124556533555', '', '王三哥', null, null, '高中', '1', '1', '男', '汉族', '红果', '2001-12-01', '', '0', '录取', '', '', '2011-12-29', '', '', '');
INSERT INTO `sdw_student` VALUES ('10', '盘县二中', '2011', '2111124556533525', '', '王小贱', null, null, '小学', '1', '1', '男', '汉族', '盘县', '2011-12-01', '', '200', '录取', '', '', '2011-12-01', '', '', '');
INSERT INTO `sdw_student` VALUES ('11', '盘县二中', '2011', '2111124556533526', '', '三本次郎', null, null, '初中', '3', '1', '男', '汉族', '东京', '2006-01-30', '', '0', '录取', '', '', '2011-12-01', '', '', '');
INSERT INTO `sdw_student` VALUES ('12', '盘县二中', '2011', '2111124556533527', '', '葛优', null, null, '高中', '3', '2', '男', '汉族', '大山', '1996-12-24', '', '0', '录取', '', '', '2011-12-10', '', '', '');
INSERT INTO `sdw_student` VALUES ('13', '盘县二中', '2011', '2111124556533528', '', '陈冠希', null, null, '小学', '5', '3', '男', '汉族', '盘关', '1988-11-30', '', '0', '录取', '', '', '2011-12-30', '', '', '');
INSERT INTO `sdw_student` VALUES ('14', '盘县二中', '2011', '2111124556533529', '', '张柏芝', null, null, '初中', '2', '1', '女', '汉族', '香港', '1986-08-01', '', '0', '录取', '', '', '2011-12-30', '', '', '');
INSERT INTO `sdw_student` VALUES ('15', '盘县二中', '2011', '2111124556533530', '', '范冰冰', null, null, '高中', '4', '3', '男', '汉族', '四格', '2011-12-01', '', '0', '录取', '', '', '2011-12-30', '', '', '');
INSERT INTO `sdw_student` VALUES ('16', '盘县二中', '2011', '2111124556533531', '', '王家卫', null, null, '小学', '4', '9', '男', '汉族', '香港', '1976-08-20', '', '0', '录取', '', '', '2011-12-30', '', '', '');
INSERT INTO `sdw_student` VALUES ('17', '盘县二中', '2011', '2111124556533533', '', '李寻欢', null, null, '小学', '5', '9', '男', '汉族', '香港', '2011-12-21', '', '0', '录取', '', '', '2011-12-30', '', '', '');
INSERT INTO `sdw_student` VALUES ('18', '盘县二中', '2011', '2111124556533534', '', '上官菲儿', null, null, '初中', '3', '7', '女', '汉族', '长安', '0895-02-15', '', '0', '录取', '', '', '2011-12-30', '', '', '');
INSERT INTO `sdw_student` VALUES ('19', '盘县二中', '2011', '2111124556533536', '', '张无忌', null, null, '高中', '3', '5', '男', '汉族', '光明顶', '1906-01-30', '', '0', '录取', '', '', '2011-12-30', '', '', '');
INSERT INTO `sdw_student` VALUES ('20', '盘县二中', '2011', '2111124556533538', '', '周芷若', null, null, '高中', '2', '5', '女', '汉族', '峨眉山', '1900-12-30', '', '0', '录取', '', '', '2011-12-30', '', '', '');
INSERT INTO `sdw_student` VALUES ('21', '盘县二中', '2011', '2111124556533537', '', '陆小凤', null, null, '小学', '1', '1', '男', '汉族', '洛阳', '2003-08-20', '', '0', '录取', '', '', '2011-12-30', '', '', '');
INSERT INTO `sdw_student` VALUES ('22', '盘县二中', '2011', '2111124556533539', '', '张信哲', null, null, '初中', '1', '2', '男', '汉族', '台湾', '1986-12-09', '', '0', '录取', '', '', '2011-12-30', '', '', '');
INSERT INTO `sdw_student` VALUES ('23', '盘县二中', '2011', '2111124556533540', '', '奥巴马', null, null, '初中', '1', '1', '男', '汉族', '美国', '1988-12-01', '', '0', '录取', '', '', '2011-12-30', '', '', '');
INSERT INTO `sdw_student` VALUES ('24', '盘县二中', '2011', '2111124556533541', '', '李嘉诚', null, null, '初中', '3', '2', '男', '汉族', '香港', '1970-09-22', '', '0', '录取', '', '', '2011-12-30', '', '', '');
INSERT INTO `sdw_student` VALUES ('25', '盘县二中', '2011', '2111124556533300', '', '黄蓉', null, null, '小学', '1', '1', '女', '汉族', '桃花岛', '1986-06-18', '', '0', '录取', '', '', '2011-12-30', '', '', '');
INSERT INTO `sdw_student` VALUES ('26', '盘县二中', '2011', '2111124556533888', '', '郭靖', null, null, '小学', '1', '1', '男', '汉族', '牛家村', '2001-01-30', '', '0', '录取', '', '', '', '', '', '');
INSERT INTO `sdw_student` VALUES ('30', '盘县一中', '2000', '2012365448664787', '', '小王', null, '8a57600abd6ef63f9e8507d8fdbdb2f1.jpg', '小学', '1', '1', '男', '汉族', '红果', '', '', '', '录取', '', '', '', '', '', '');
INSERT INTO `sdw_task` VALUES ('7', '申请转班', '1', '2111124556533475', '1', '所在学校:盘县一中，学生姓名:王小虎，学号:2111124556533475，事项：申请转入。', '1325003925', '1', '1', '0', 'admin', 'admin', '1325236940', '1325236706');
INSERT INTO `sdw_task` VALUES ('8', '申请转入', '1', '2111124556533478', '2', '所在学校:盘县一中，学生姓名:欧阳雪，学号:2111124556533478，事项：申请转出。', '1325003987', '1', '1', '0', 'admin', 'admin', '1325236940', '1325236706');
INSERT INTO `sdw_task` VALUES ('9', '申请转出', '1', '2111124556533499', '3', '所在学校:盘县三中，学生姓名:李婷婷，学号:2111124556533499，事项：申请休学。', '1325004146', '1', '1', '0', 'admin', 'admin', '1325236940', '1325236706');
INSERT INTO `sdw_task` VALUES ('10', '申请休学', '1', '2111124556533479', '4', '所在学校:盘县一中，学生姓名:纳兰信，学号:2111124556533479，事项：申请复学。', '1325004198', '1', '1', '0', 'admin', 'admin', '1325236940', '1325236706');
INSERT INTO `sdw_task` VALUES ('11', '申请复学', '1', '2111124556533476', '5', '所在学校:盘县一中，学生姓名:李三，学号:2111124556533476，事项：申请留级。', '1325004228', '1', '1', '0', 'admin', 'admin', '1325236940', '1325236706');
INSERT INTO `sdw_task` VALUES ('12', '申请留级', '1', '2111124556533477', '6', '所在学校:盘县一中，学生姓名:张大侠，学号:2111124556533477，事项：申请退学。', '1325004244', '1', '1', '0', 'admin', 'admin', '1325236940', '1325236706');
INSERT INTO `sdw_task` VALUES ('13', '申请转出', '1', '2111124556533499', '3', '所在学校:盘县三中，学生姓名:李婷婷，学号:2111124556533499，事项：申请休学。', '1325142341', '1', '1', '0', 'admin', 'admin', '1325236940', '1325236706');
INSERT INTO `sdw_task` VALUES ('15', '申请退学', '1', '2111124556533525', '7', '新生入学', '1325216428', '0', '0', '0', null, null, null, null);
INSERT INTO `sdw_task` VALUES ('16', '申请退学', '1', '2111124556533526', '7', '新生入学', '1325216541', '0', '0', '0', null, null, null, null);
INSERT INTO `sdw_task` VALUES ('17', '申请退学', '1', '2111124556533527', '7', '新生入学', '1325216638', '0', '0', '0', null, null, null, null);
INSERT INTO `sdw_task` VALUES ('18', '申请退学', '1', '2111124556533528', '7', '新生入学', '1325216736', '0', '0', '0', null, null, null, null);
INSERT INTO `sdw_task` VALUES ('19', '申请退学', '1', '2111124556533529', '7', '新生入学', '1325216829', '0', '0', '0', null, null, null, null);
INSERT INTO `sdw_task` VALUES ('20', '申请退学', '1', '2111124556533530', '7', '新生入学', '1325216919', '0', '0', '0', null, null, null, null);
INSERT INTO `sdw_task` VALUES ('21', '申请退学', '1', '2111124556533531', '7', '新生入学', '1325216995', '0', '0', '0', null, null, null, null);
INSERT INTO `sdw_task` VALUES ('22', '申请退学', '1', '2111124556533533', '7', '新生入学', '1325217116', '0', '0', '0', null, null, null, null);
INSERT INTO `sdw_task` VALUES ('23', '申请退学', '1', '2111124556533534', '7', '新生入学', '1325217214', '0', '0', '0', null, null, null, null);
INSERT INTO `sdw_task` VALUES ('24', '申请退学', '1', '2111124556533536', '7', '新生入学', '1325217373', '0', '0', '0', null, null, null, null);
INSERT INTO `sdw_task` VALUES ('25', '申请退学', '1', '2111124556533538', '7', '新生入学', '1325217437', '0', '0', '0', null, null, null, null);
INSERT INTO `sdw_task` VALUES ('26', '申请退学', '1', '2111124556533537', '7', '新生入学', '1325217542', '0', '0', '0', null, null, null, null);
INSERT INTO `sdw_task` VALUES ('27', '申请退学', '1', '2111124556533539', '7', '新生入学', '1325217637', '0', '0', '0', null, null, null, null);
INSERT INTO `sdw_task` VALUES ('28', '申请退学', '1', '2111124556533540', '7', '新生入学', '1325218321', '0', '0', '0', null, null, null, null);
INSERT INTO `sdw_task` VALUES ('29', '申请退学', '1', '2111124556533541', '7', '新生入学', '1325218483', '0', '0', '0', null, null, null, null);
INSERT INTO `sdw_task` VALUES ('31', '申请退学', '1', '2111124556533888', '7', '学生姓名:郭靖，学号:2111124556533888，事项:新生入学。', '1325235169', '1', '1', '-1', 'admin', 'admin', '1325236940', '1325237561');
INSERT INTO `sdw_task` VALUES ('32', '申请复学', '1', '2111124556533888', '5', '学生姓名:郭靖，学号:2111124556533888，事项：申请留级。', '1325236177', '1', '1', '0', null, null, null, null);
INSERT INTO `sdw_task` VALUES ('33', '申请复学', '1', '2111124556533499', '5', '学生姓名:李婷婷，学号:2111124556533499，事项：申请留级。', '1342691655', '1', '1', '-1', null, null, null, null);
INSERT INTO `sdw_task` VALUES ('34', '申请转出', '1', '2111124556533474', '3', '家庭搬迁', '1342691655', '0', '0', '0', null, null, null, null);
INSERT INTO `sdw_task` VALUES ('35', '申请留级', '1', '2111124556533477', '6', '学习更不上', '1343813698', '0', '0', '0', null, null, null, null);
INSERT INTO `sdw_town` VALUES ('1', '红果镇');
INSERT INTO `sdw_town` VALUES ('2', '城关镇');
INSERT INTO `sdw_town` VALUES ('3', '板桥镇');
INSERT INTO `sdw_town` VALUES ('4', '水塘镇');
INSERT INTO `sdw_town` VALUES ('5', '民主镇');
INSERT INTO `sdw_town` VALUES ('6', '大山镇');
INSERT INTO `sdw_town` VALUES ('7', '保田镇');
INSERT INTO `sdw_town` VALUES ('8', '老厂镇');
INSERT INTO `sdw_town` VALUES ('9', '玛依镇');
INSERT INTO `sdw_town` VALUES ('10', '石桥镇');
INSERT INTO `sdw_town` VALUES ('11', '平关镇');
INSERT INTO `sdw_town` VALUES ('12', '响水镇');
INSERT INTO `sdw_town` VALUES ('13', '火铺镇');
INSERT INTO `sdw_town` VALUES ('14', '乐民镇');
INSERT INTO `sdw_town` VALUES ('15', '西冲镇');
INSERT INTO `sdw_town` VALUES ('16', '断江镇');
INSERT INTO `sdw_town` VALUES ('17', '盘江镇');
INSERT INTO `sdw_town` VALUES ('18', '柏果镇');
INSERT INTO `sdw_town` VALUES ('19', '洒基镇');
INSERT INTO `sdw_town` VALUES ('20', '刘官镇');
INSERT INTO `sdw_town` VALUES ('21', '忠义乡');
INSERT INTO `sdw_town` VALUES ('22', '新民乡');
INSERT INTO `sdw_town` VALUES ('23', '普田乡');
INSERT INTO `sdw_town` VALUES ('24', '珠东乡');
INSERT INTO `sdw_town` VALUES ('25', '两河乡');
INSERT INTO `sdw_town` VALUES ('26', '滑石乡');
INSERT INTO `sdw_town` VALUES ('27', '鸡场坪乡');
INSERT INTO `sdw_town` VALUES ('28', '松河乡');
INSERT INTO `sdw_town` VALUES ('29', '坪地乡');
INSERT INTO `sdw_town` VALUES ('30', '四格乡');
INSERT INTO `sdw_town` VALUES ('31', '淤泥河乡');
INSERT INTO `sdw_town` VALUES ('32', '普古乡');
INSERT INTO `sdw_town` VALUES ('33', '旧营乡');
INSERT INTO `sdw_town` VALUES ('34', '羊场乡');
INSERT INTO `sdw_town` VALUES ('35', '保基乡');
INSERT INTO `sdw_town` VALUES ('36', '英武乡');
INSERT INTO `sdw_town` VALUES ('37', '马场乡');
