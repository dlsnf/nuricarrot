-- phpMyAdmin SQL Dump
-- version 4.0.10.18
-- https://www.phpmyadmin.net
--
-- 호스트: localhost
-- 처리한 시간: 18-01-15 11:34
-- 서버 버전: 5.1.73
-- PHP 버전: 5.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 데이터베이스: `spi`
--

-- --------------------------------------------------------

--
-- 테이블 구조 `board`
--

CREATE TABLE IF NOT EXISTS `board` (
  `seq` int(30) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) COLLATE utf8_bin NOT NULL,
  `title` varchar(200) COLLATE utf8_bin NOT NULL,
  `body` mediumtext COLLATE utf8_bin NOT NULL,
  `date_` datetime NOT NULL,
  `view` int(30) NOT NULL,
  `ip` varchar(30) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`seq`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=6 ;

--
-- 테이블의 덤프 데이터 `board`
--

INSERT INTO `board` (`seq`, `name`, `title`, `body`, `date_`, `view`, `ip`) VALUES
(3, '관리자', '삼더하기일 채용공고 (샘플)', '지원조건 : 해당분야 경력 4년 이상 (계약직 1년 이후 정규직 전환될 수 있음) \r\n \r\n자격요건 :  \r\n□ 환경분야 \r\n  - 환경관리(대기,수질,폐기물,토양,화학물질)등 인허가 및 설비유지관리 \r\n  - 환경관련법 대응 및 관재 대관업무  \r\n  - ISO 14001 및 각종 환경인증 경험여부 \r\n  - 대기환경기사 필수 \r\n□ 화학물질 안전 및 안전분야 \r\n  - 산업안전기사 및 소방안전기사 보유시 가점 \r\n  - 화학물질관리법 경험 (장외영향평가등) \r\n  - 정기보수 및 신규 증설 안전관련 프로젝트 여부 \r\n\r\n\r\n\r\n문의 : 02.6091.7701', '2017-03-27 16:21:42', 35, '1.230.252.45'),
(4, '관리자', '게시판 테스트', '게시판 테스트\r\n게시판 테스트\r\n게시판 테스트\r\n게시판 테스트\r\n게시판 테스트\r\n게시판 테스트\r\n게시판 테스트\r\n게시판 테스트\r\n게시판 테스트\r\n게시판 테스트\r\n게시판 테스트\r\n게시판 테스트\r\n', '2017-03-27 16:36:44', 23, '1.230.252.45'),
(5, '관리자', '게시판 테스트2', '게시판 테스트', '2017-03-27 16:40:00', 30, '1.230.252.45');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
