CREATE TABLE `dorokuis`.`q-id` ( `id` INT(4) NOT NULL AUTO_INCREMENT , `qcode` INT(5) NOT NULL , `author` VARCHAR(25) NOT NULL , `name` VARCHAR(150) NOT NULL , `subjects` ENUM('mathematics','english','science','chemistry','physics','biology','geography','history') NOT NULL , `question` TEXT NOT NULL , `ops1` TEXT NOT NULL , `ops2` TEXT NOT NULL , `ops3` TEXT NOT NULL , `ops4` TEXT NOT NULL , `answer` ENUMs


CREATE TABLE `gquiz` (
 `id` int(4) NOT NULL AUTO_INCREMENT,
 `ncode` int(5) NOT NULL,
 `gname` varchar(300) COLLATE armscii8_bin NOT NULL,
 `gauthor` varchar(28) COLLATE armscii8_bin NOT NULL,
 `gtime` int(6) NOT NULL,
 `gscore` int(10) NOT NULL,
 `gnum` int(3) NOT NULL,
 `gquest` varchar(255) COLLATE armscii8_bin NOT NULL,
 `opa` varchar(150) COLLATE armscii8_bin NOT NULL,
 `opb` varchar(150) COLLATE armscii8_bin NOT NULL,
 `opc` varchar(150) COLLATE armscii8_bin NOT NULL,
 `opd` varchar(150) COLLATE armscii8_bin NOT NULL,
 `gans` varchar(1) COLLATE armscii8_bin NOT NULL,
 PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=armscii8 COLLATE=armscii8_bin

INSERT INTO `gquiz` (`id`, `ncode`, `gname`, `gauthor`, `gtime`, `gscore`, `gnum`, `gquest`, `opa`, `opb`, `opc`, `opd`, `gans`) VALUES (NULL, '42312', 'Matematika dasar', 'rusdifirman', '400', '200', '1', '2 x 2 = ?', '8', '6', '4', '2', 'c'), (NULL, '42312', 'Matematika dasar', 'rusdifirman', '400', '200', '2', '-5 + 2 = ?', '-3', '-7', '7', '5', 'a')
