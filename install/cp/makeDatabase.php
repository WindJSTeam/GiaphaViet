<?php
	$server = $_POST["server"];
	$user = $_POST["user"];
	$pass = $_POST["pass"];
	$dbname = $_POST["dbname"];
	$tmp = array();
	$tmp["type"] = 2;
	mysql_connect($server,$user,$pass);
	mysql_select_db($dbname);
	mysql_query("SET NAMES utf8");
	
	$sql = 'SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO"';
	$sql2 = 'SET time_zone = "+00:00"';
	$tmp["setMode"] =  array();
	$tmp["setMode"]["msg"] = "Set SQL_MODE";
	if(mysql_query($sql)&&mysql_query($sql2)){
		$tmp["setMode"]["status"] = true;
	}
	else{
		$tmp["setMode"]["status"] = false;
	}
	
	
	$sql = "CREATE TABLE IF NOT EXISTS `ALBUM` (
			  `ID` int(11) NOT NULL AUTO_INCREMENT,
			  `NAME` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
			  `INFO` text COLLATE utf8_unicode_ci NOT NULL,
			  `DATE` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
			  PRIMARY KEY (`ID`)
			) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;
				";
	$tmp["cAlbum"] =  array();
	$tmp["cAlbum"]["msg"] = "Create Table Album";
	if(mysql_query($sql)){
		$tmp["cAlbum"]["status"] = true;
	}
	else{
		$tmp["cAlbum"]["status"] = false;
	}
	
	
	
	$sql = "CREATE TABLE IF NOT EXISTS `CATALOG` (
			  `FID` int(11) NOT NULL AUTO_INCREMENT,
			  `NAME` varchar(50) NOT NULL,
			  `INFO` text NOT NULL,
			  PRIMARY KEY (`FID`),
			  KEY `FID` (`FID`),
			  KEY `NAME` (`NAME`)
			) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 
			";
	$sql2 = "INSERT INTO `CATALOG` (`FID`, `NAME`, `INFO`) VALUES
			(1, 'Thông báo', 'Thông báo các sự kiện của dòng họ.'),
			(2, 'Tin tức', 'Tin tức các hoạt động trong dòng họ'),
			(3, 'Cáo phó', 'Thông báo cáo phó trong dòng họ')";
			
	$tmp["cCatalog"] =  array();
	$tmp["cCatalog"]["msg"] = "Create Table Catalog";
	if(mysql_query($sql)&&mysql_query($sql2)){
		$tmp["cCatalog"]["status"] = true;
	}
	else{
		$tmp["cCatalog"]["status"] = false;
	}
	
	
	
	$sql = "CREATE TABLE IF NOT EXISTS `CONTACT` (
			  `ID` int(11) NOT NULL AUTO_INCREMENT,
			  `CONTENT` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
			  PRIMARY KEY (`ID`)
			) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2";
	$sql2 = "INSERT INTO `CONTACT` (`ID`, `CONTENT`) VALUES
			(1, '')";
	$tmp["cContact"] =  array();
	$tmp["cContact"]["msg"] = "Create Table Contact";
	if(mysql_query($sql)&&mysql_query($sql2)){
		$tmp["cContact"]["status"] = true;
	}
	else{
		$tmp["cContact"]["status"] = false;
	}
	
	
	
	$sql = "CREATE TABLE IF NOT EXISTS `DONATE` (
			  `ID` int(11) NOT NULL AUTO_INCREMENT,
			  `NAME` text CHARACTER SET utf8 NOT NULL,
			  `ADDRESS` text CHARACTER SET utf8 NOT NULL,
			  `PHONE` text CHARACTER SET utf8 NOT NULL,
			  `VALUE` int(11) NOT NULL,
			  PRIMARY KEY (`ID`)
			) ENGINE=MyISAM  DEFAULT CHARSET=armscii8 AUTO_INCREMENT=1 ;";
			
	$tmp["cDonate"] =  array();
	$tmp["cDonate"]["msg"] = "Create Table Donate";
	if(mysql_query($sql)){
		$tmp["cDonate"]["status"] = true;
	}
	else{
		$tmp["cDonate"]["status"] = false;
	}
	
	
	
	
	$sql = "CREATE TABLE IF NOT EXISTS `GROUP` (
			  `GID` int(11) NOT NULL AUTO_INCREMENT,
			  `NAME` varchar(50) NOT NULL,
			  `INFO` text NOT NULL,
			  PRIMARY KEY (`GID`)
			) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;
			";
	$sql2 = "INSERT INTO `GROUP` (`GID`, `NAME`, `INFO`) VALUES
			(1, 'Admin', 'Quản trị tối cao của website...'),
			(2, 'Writer', 'Người viết bài, đưa tin thông báo trong dòng họ...'),
			(3, 'Manager', 'Người quản lý thành viên dòng họ (Trưởng họ)');";
			
	$tmp["cGroup"] =  array();
	$tmp["cGroup"]["msg"] = "Create Table Group";
	if(mysql_query($sql)&&mysql_query($sql2)){
		$tmp["cGroup"]["status"] = true;
	}
	else{
		$tmp["cGroup"]["status"] = false;
	}
	
	
	$sql = "CREATE TABLE IF NOT EXISTS `INFO_PERSON` (
			  `ID` int(11) NOT NULL AUTO_INCREMENT,
			  `FATHER_ID` int(11) NOT NULL,
			  `GENERATION` int(11) NOT NULL,
			  `NAME` text NOT NULL,
			  `BIRTHDAY` date NOT NULL,
			  `ADDRESS` text NOT NULL,
			  `PHONE` text NOT NULL,
			  `MAIL` text NOT NULL,
			  `DIE` tinyint(1) NOT NULL,
			  `SEX` tinyint(1) NOT NULL,
			  `MAR_BIRTH` date NOT NULL,
			  `MAR_YEAR_OLD` int(11) NOT NULL,
			  `MAR_DATE_DIE` date NOT NULL,
			  `MAR_PLAN_DIE` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
			  `MAR_ABOUT` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
			  `NORMAL_NAME` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
			  `EX_NAME` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
			  `NUM_CHILD` int(11) NOT NULL,
			  `NICK_NAME` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
			  `YEAR_OLD` int(11) NOT NULL,
			  `DATE_DIE` date NOT NULL,
			  `PLAN_DIE` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
			  `ABOUT` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
			  `MAR_NAME` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
			  `IMAGE` text NOT NULL,
			  `MAR_DIE` tinyint(1) NOT NULL,
			  PRIMARY KEY (`ID`),
			  KEY `father_key` (`FATHER_ID`)
			) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;
			";
	$sql2 = "INSERT INTO `INFO_PERSON` (`ID`, `FATHER_ID`, `GENERATION`, `NAME`, `BIRTHDAY`, `ADDRESS`, `PHONE`, `MAIL`, `DIE`, `SEX`, `MAR_BIRTH`, `MAR_YEAR_OLD`, `MAR_DATE_DIE`, `MAR_PLAN_DIE`, `MAR_ABOUT`, `NORMAL_NAME`, `EX_NAME`, `NUM_CHILD`, `NICK_NAME`, `YEAR_OLD`, `DATE_DIE`, `PLAN_DIE`, `ABOUT`, `MAR_NAME`, `IMAGE`, `MAR_DIE`) VALUES
			(1, 1, 0, 'root', '1900-01-01', '', '', '', 1, 1, '0000-00-00', 0, '0000-00-00', '', '', '', '', 0, '', 0, '0000-00-00', '', '', '', '', 0);";
	$tmp["cINFO_PERSON"] =  array();
	$tmp["cINFO_PERSON"]["msg"] = "Create Table Info Person";
	if(mysql_query($sql)&&mysql_query($sql2)){
		$tmp["cINFO_PERSON"]["status"] = true;
	}
	else{
		$tmp["cINFO_PERSON"]["status"] = false;
	}
	
	
	
	$sql = "CREATE TABLE IF NOT EXISTS `LINK` (
			  `LID` int(11) NOT NULL AUTO_INCREMENT,
			  `URL` text NOT NULL,
			  `IMG` text NOT NULL,
			  `INFO` text NOT NULL,
			  PRIMARY KEY (`LID`)
			) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
			";
			
	$tmp["cLink"] =  array();
	$tmp["cLink"]["msg"] = "Create Table Link";
	if(mysql_query($sql)){
		$tmp["cLink"]["status"] = true;
	}
	else{
		$tmp["cLink"]["status"] = false;
	}
	
	
	
	$sql = "CREATE TABLE IF NOT EXISTS `MEDIA` (
			  `MID` int(11) NOT NULL AUTO_INCREMENT,
			  `GMID` int(11) NOT NULL,
			  `TITLE` text NOT NULL,
			  `LINK` text NOT NULL,
			  `AID` int(11) NOT NULL,
			  PRIMARY KEY (`MID`),
			  KEY `media_key` (`GMID`),
			  KEY `fk_albumid` (`AID`)
			) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
			";
			
	$tmp["cMedia"] =  array();
	$tmp["cMedia"]["msg"] = "Create Table Media";
	if(mysql_query($sql)){
		$tmp["cMedia"]["status"] = true;
	}
	else{
		$tmp["cMedia"]["status"] = false;
	}
	
	
	$sql = "CREATE TABLE IF NOT EXISTS `MEDIA_GROUP` (
			  `GMID` int(11) NOT NULL AUTO_INCREMENT,
			  `NAME` text NOT NULL,
			  PRIMARY KEY (`GMID`)
			) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;
			";
	$sql2 = "INSERT INTO `MEDIA_GROUP` (`GMID`, `NAME`) VALUES
			(1, 'video'),
			(2, 'image'),
			(3, 'unknown');";
			
	$tmp["cMediaGroup"] =  array();
	$tmp["cMediaGroup"]["msg"] = "Create Table Group Media";
	if(mysql_query($sql)&&mysql_query($sql2)){
		$tmp["cMediaGroup"]["status"] = true;
	}
	else{
		$tmp["cMediaGroup"]["status"] = false;
	}
	
	
	
	$sql = "CREATE TABLE IF NOT EXISTS `MESSAGES` (
			  `ID` int(11) NOT NULL AUTO_INCREMENT,
			  `NAME` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
			  `MAIL` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
			  `CONTENT` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
			  `DATE` date NOT NULL,
			  `view` tinyint(1) NOT NULL,
			  PRIMARY KEY (`ID`)
			) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1";
			
	$tmp["cMSG"] =  array();
	$tmp["cMSG"]["msg"] = "Create Table Messenger";
	if(mysql_query($sql)){
		$tmp["cMSG"]["status"] = true;
	}
	else{
		$tmp["cMSG"]["status"] = false;
	}
	
	
	
	$sql = "CREATE TABLE IF NOT EXISTS `PAGE` (
			  `ID` int(11) NOT NULL AUTO_INCREMENT,
			  `PAGE_NAME` text CHARACTER SET utf8 NOT NULL,
			  `CONTENT` text CHARACTER SET utf8 NOT NULL,
			  PRIMARY KEY (`ID`)
			) ENGINE=MyISAM  DEFAULT CHARSET=armscii8 AUTO_INCREMENT=2 ;
			";
	$sql2 = "
			INSERT INTO `PAGE` (`ID`, `PAGE_NAME`, `CONTENT`) VALUES
			(1, 'Giới thiệu', 'Thông tin sơ lược về dòng họ')";
	$tmp["cPage"] =  array();
	$tmp["cPage"]["msg"] = "Create Table PAGE";
	if(mysql_query($sql)&&mysql_query($sql2)){
		$tmp["cPage"]["status"] = true;
	}
	else{
		$tmp["cPage"]["status"] = false;
	}
	
	
	
	
	$sql = "CREATE TABLE IF NOT EXISTS `SITE_INFO` (
			  `ID` int(11) NOT NULL AUTO_INCREMENT,
			  `NAME` text CHARACTER SET utf8 NOT NULL,
			  `INFO` text CHARACTER SET utf8 NOT NULL,
			  PRIMARY KEY (`ID`)
			) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
		";
			
	$tmp["cSite_Info"] =  array();
	$tmp["cSite_Info"]["msg"] = "Create Table INFO SITE";
	if(mysql_query($sql)){
		$tmp["cSite_Info"]["status"] = true;
	}
	else{
		$tmp["cSite_Info"]["status"] = false;
	}
	
	
	
	
	$sql = "CREATE TABLE IF NOT EXISTS `SLIDE` (
			  `ID` int(11) NOT NULL AUTO_INCREMENT,
			  `URL` text CHARACTER SET utf8 NOT NULL,
			  `INFO` text CHARACTER SET utf8 NOT NULL,
			  PRIMARY KEY (`ID`)
			) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;";
			
	$tmp["cSlide"] =  array();
	$tmp["cSlide"]["msg"] = "Create Table Slide";
	if(mysql_query($sql)){
		$tmp["cSlide"]["status"] = true;
	}
	else{
		$tmp["cSlide"]["status"] = false;
	}
	
	
	$sql = "CREATE TABLE IF NOT EXISTS `TITLE` (
			  `TID` int(11) NOT NULL AUTO_INCREMENT,
			  `FID` int(11) NOT NULL,
			  `TITLE` text NOT NULL,
			  `DATE_CREATE` date NOT NULL,
			  `DATE_EDIT` date NOT NULL,
			  `TAG` text NOT NULL,
			  `CONTENT` text NOT NULL,
			  `ACTOR` text NOT NULL,
			  PRIMARY KEY (`TID`),
			  KEY `title_key` (`FID`)
			) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
			";
			
	$tmp["cTitle"] =  array();
	$tmp["cTitle"]["msg"] = "Create Table Title";
	if(mysql_query($sql)){
		$tmp["cTitle"]["status"] = true;
	}
	else{
		$tmp["cTitle"]["status"] = false;
	}
	
	
	
	$sql = "CREATE TABLE IF NOT EXISTS `USER` (
			  `UID` int(11) NOT NULL AUTO_INCREMENT,
			  `GID` int(11) NOT NULL,
			  `NAME` text NOT NULL,
			  `PASS` text NOT NULL,
			  `INFO` text NOT NULL,
			  PRIMARY KEY (`UID`),
			  UNIQUE KEY `GID` (`GID`),
			  FULLTEXT KEY `NAME` (`NAME`)
			) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
			";
			
	$tmp["cUser"] =  array();
	$tmp["cUser"]["msg"] = "Create Table User";
	if(mysql_query($sql)){
		$tmp["cUser"]["status"] = true;
	}
	else{
		$tmp["cUser"]["status"] = false;
	}
	echo json_encode($tmp);
?>