-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 07, 2012 at 03:44 AM
-- Server version: 5.1.41
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `pastebin`
--

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE IF NOT EXISTS `languages` (
  `lang_id` varchar(25) NOT NULL,
  `friendly_name` text NOT NULL,
  PRIMARY KEY (`lang_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `snippets`
--

CREATE TABLE IF NOT EXISTS `snippets` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `nname` varchar(75) DEFAULT NULL,
  `sname` varchar(125) DEFAULT NULL,
  `code` longtext NOT NULL,
  `language` varchar(75) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `alter` int(8) NOT NULL DEFAULT '-1',
  `deleteafter` int(12) NOT NULL,
  `shemail` varchar(125) NOT NULL,
  `private` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1;


--
-- Dumping data for table `languages`
--

INSERT INTO `languages`
    (`lang_id`, `friendly_name`)
VALUES
    ('xml', 'XML/HTML'),
    ('vb', 'Virtual Basic'),
    ('sql', 'SQL'),
    ('scala', 'Scala'),
    ('sass', 'SASS'),
    ('rb', 'Ruby'),
    ('py', 'Python'),
    ('text', 'Plain Text'),
    ('php', 'PHP'),
    ('pl', 'Perl'),
    ('lua', 'Lua'),
    ('js', 'Javascript'),
    ('java', 'Java'),
    ('jfx', 'JavaFX'),
    ('groovy', 'Groovy'),
    ('erl', 'Erlang'),
    ('diff', 'Diff/Patch'),
    ('delphi', 'Delphi/Pascal'),
    ('css', 'CSS'),
    ('c#', 'C#'),
    ('cpp', 'C'),
    ('c', 'C++'),
    ('cf', 'Coldfusion'),
    ('bash', 'Bash/Shell'),
    ('actionscript3', 'Actionscript'),
    ('applescript', 'Applescript');
