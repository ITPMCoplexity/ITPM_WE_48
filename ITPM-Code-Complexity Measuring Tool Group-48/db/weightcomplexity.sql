SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `weightcomplexity`
--

-- --------------------------------------------------------

--
-- Table structure for table `ccp`
--

DROP TABLE IF EXISTS `ccp`;
CREATE TABLE IF NOT EXISTS `ccp` (
  `CcpID` int(200) NOT NULL AUTO_INCREMENT,
  `CcpValue` double NOT NULL,
  PRIMARY KEY (`CcpID`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ccp`
--

INSERT INTO `ccp` (`CcpID`, `CcpValue`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `ccs`
--

DROP TABLE IF EXISTS `ccs`;
CREATE TABLE IF NOT EXISTS `ccs` (
  `CcsID` int(200) NOT NULL AUTO_INCREMENT,
  `CcsValue` double NOT NULL,
  PRIMARY KEY (`CcsID`)
) ENGINE=MyISAM AUTO_INCREMENT=804 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ccs`
--

INSERT INTO `ccs` (`CcsID`, `CcsValue`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `ci`
--

DROP TABLE IF EXISTS `ci`;
CREATE TABLE IF NOT EXISTS `ci` (
  `CiID` int(200) NOT NULL AUTO_INCREMENT,
  `CiValue` double NOT NULL,
  PRIMARY KEY (`CiID`)
) ENGINE=MyISAM AUTO_INCREMENT=134 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ci`
--

INSERT INTO `ci` (`CiID`, `CiValue`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `cm`
--

DROP TABLE IF EXISTS `cm`;
CREATE TABLE IF NOT EXISTS `cm` (
  `CmID` int(200) NOT NULL AUTO_INCREMENT,
  `CmValue` double NOT NULL,
  PRIMARY KEY (`CmID`)
) ENGINE=MyISAM AUTO_INCREMENT=77 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cm`
--

INSERT INTO `cm` (`CmID`, `CmValue`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `controlstructures`
--

DROP TABLE IF EXISTS `controlstructures`;
CREATE TABLE IF NOT EXISTS `controlstructures` (
  `ControlStructureID` int(200) NOT NULL AUTO_INCREMENT,
  `CSif` int(200) NOT NULL,
  `CSfor` int(200) NOT NULL,
  `CSswitch` int(200) NOT NULL,
  `CScase` int(200) NOT NULL,
  PRIMARY KEY (`ControlStructureID`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `controlstructures`
--

INSERT INTO `controlstructures` (`ControlStructureID`, `CSif`, `CSfor`, `CSswitch`, `CScase`) VALUES
(1, 2, 3, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `coupling`
--

DROP TABLE IF EXISTS `coupling`;
CREATE TABLE IF NOT EXISTS `coupling` (
  `CouplingID` int(200) NOT NULL AUTO_INCREMENT,
  `RecursiveCall` int(200) NOT NULL,
  `Column2` int(11) NOT NULL,
  `Column3` int(11) NOT NULL,
  `Column4` int(11) NOT NULL,
  `Column5` int(11) NOT NULL,
  `Column6` int(11) NOT NULL,
  `Column7` int(11) NOT NULL,
  `Column8` int(11) NOT NULL,
  `Column9` int(11) NOT NULL,
  `Column10` int(11) NOT NULL,
  `Column11` int(11) NOT NULL,
  `Column12` int(11) NOT NULL,
  `Column13` int(11) NOT NULL,
  PRIMARY KEY (`CouplingID`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `coupling`
--

INSERT INTO `coupling` (`CouplingID`, `RecursiveCall`, `Column2`, `Column3`, `Column4`, `Column5`, `Column6`, `Column7`, `Column8`, `Column9`, `Column10`, `Column11`, `Column12`, `Column13`) VALUES
(1, 2, 2, 3, 3, 4, 4, 5, 3, 4, 1, 2, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `cs`
--

DROP TABLE IF EXISTS `cs`;
CREATE TABLE IF NOT EXISTS `cs` (
  `CsID` int(200) NOT NULL AUTO_INCREMENT,
  `CsValue` double NOT NULL,
  PRIMARY KEY (`CsID`)
) ENGINE=MyISAM AUTO_INCREMENT=403 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cs`
--

INSERT INTO `cs` (`CsID`, `CsValue`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `cv`
--

DROP TABLE IF EXISTS `cv`;
CREATE TABLE IF NOT EXISTS `cv` (
  `CvID` int(200) NOT NULL AUTO_INCREMENT,
  `CvValue` double NOT NULL,
  PRIMARY KEY (`CvID`)
) ENGINE=MyISAM AUTO_INCREMENT=118 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cv`
--

INSERT INTO `cv` (`CvID`, `CvValue`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `finaltotal`
--

DROP TABLE IF EXISTS `finaltotal`;
CREATE TABLE IF NOT EXISTS `finaltotal` (
  `FinalTotalID` int(200) NOT NULL AUTO_INCREMENT,
  `FinalTotalValue` double NOT NULL,
  PRIMARY KEY (`FinalTotalID`)
) ENGINE=MyISAM AUTO_INCREMENT=1828 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `finaltotal`
--

INSERT INTO `finaltotal` (`FinalTotalID`, `FinalTotalValue`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `inheritance`
--

DROP TABLE IF EXISTS `inheritance`;
CREATE TABLE IF NOT EXISTS `inheritance` (
  `InheritanceID` int(200) NOT NULL AUTO_INCREMENT,
  `NoInheritance` int(200) NOT NULL,
  `One` int(200) NOT NULL,
  `Two` int(200) NOT NULL,
  `Three` int(200) NOT NULL,
  `MoreThree` int(200) NOT NULL,
  PRIMARY KEY (`InheritanceID`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `inheritance`
--

INSERT INTO `inheritance` (`InheritanceID`, `NoInheritance`, `One`, `Two`, `Three`, `MoreThree`) VALUES
(1, 0, 1, 2, 3, 4);

-- --------------------------------------------------------

--
-- Table structure for table `inheritancefinaltotal`
--

DROP TABLE IF EXISTS `inheritancefinaltotal`;
CREATE TABLE IF NOT EXISTS `inheritancefinaltotal` (
  `inherifinal_total_ID` double NOT NULL AUTO_INCREMENT,
  `cifinaltotal` decimal(10,0) NOT NULL,
  PRIMARY KEY (`inherifinal_total_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=747 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `inheritancetotal`
--

DROP TABLE IF EXISTS `inheritancetotal`;
CREATE TABLE IF NOT EXISTS `inheritancetotal` (
  `inheri_tot_ID` double NOT NULL AUTO_INCREMENT,
  `inheritanceWord` varchar(200) NOT NULL,
  `Ci_tot` double NOT NULL,
  PRIMARY KEY (`inheri_tot_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=2593 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `methods`
--

DROP TABLE IF EXISTS `methods`;
CREATE TABLE IF NOT EXISTS `methods` (
  `MethodID` int(200) NOT NULL AUTO_INCREMENT,
  `PrimitiveReturnType` int(200) NOT NULL,
  `CompositeReturnType` int(200) NOT NULL,
  `VoidReturnType` int(200) NOT NULL,
  `PrimitiveParameter` int(200) NOT NULL,
  `CompositeParameter` int(200) NOT NULL,
  PRIMARY KEY (`MethodID`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `methods`
--

INSERT INTO `methods` (`MethodID`, `PrimitiveReturnType`, `CompositeReturnType`, `VoidReturnType`, `PrimitiveParameter`, `CompositeParameter`) VALUES
(1, 1, 2, 0, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `size`
--

DROP TABLE IF EXISTS `size`;
CREATE TABLE IF NOT EXISTS `size` (
  `SizeID` int(200) NOT NULL AUTO_INCREMENT,
  `Keyword` int(200) NOT NULL,
  `Identifier` int(200) NOT NULL,
  `Operator` int(200) NOT NULL,
  `NumericalValue` int(200) NOT NULL,
  `StringLiteral` int(200) NOT NULL,
  PRIMARY KEY (`SizeID`)
) ENGINE=MyISAM AUTO_INCREMENT=65 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `size`
--

INSERT INTO `size` (`SizeID`, `Keyword`, `Identifier`, `Operator`, `NumericalValue`, `StringLiteral`) VALUES
(1, 1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `statistics`
--

DROP TABLE IF EXISTS `statistics`;
CREATE TABLE IF NOT EXISTS `statistics` (
  `statFilename` varchar(200) NOT NULL,
  `statComplexity` double DEFAULT NULL,
  PRIMARY KEY (`statFilename`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `statistics`
--

INSERT INTO `statistics` (`statFilename`, `statComplexity`) VALUES
('JumpingBox.java', 425),
('DaysPerMonth.java', 332);

-- --------------------------------------------------------

--
-- Table structure for table `totalcomplexity`
--

DROP TABLE IF EXISTS `totalcomplexity`;
CREATE TABLE IF NOT EXISTS `totalcomplexity` (
  `totalcomplexityID` int(200) NOT NULL AUTO_INCREMENT,
  `totalcomplexityValue` double NOT NULL,
  PRIMARY KEY (`totalcomplexityID`)
) ENGINE=MyISAM AUTO_INCREMENT=1986 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `totalcomplexity`
--

INSERT INTO `totalcomplexity` (`totalcomplexityID`, `totalcomplexityValue`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `variables`
--

DROP TABLE IF EXISTS `variables`;
CREATE TABLE IF NOT EXISTS `variables` (
  `VariableID` int(200) NOT NULL AUTO_INCREMENT,
  `GlobalVariable` int(200) NOT NULL,
  `LocalVariable` int(200) NOT NULL,
  `PrimitiveVariable` int(200) NOT NULL,
  `CompositeVariable` int(200) NOT NULL,
  PRIMARY KEY (`VariableID`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `variables`
--

INSERT INTO `variables` (`VariableID`, `GlobalVariable`, `LocalVariable`, `PrimitiveVariable`, `CompositeVariable`) VALUES
(1, 2, 1, 1, 2);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
