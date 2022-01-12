-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 18, 2021 at 03:40 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dulich`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `AccountID` int(11) NOT NULL,
  `Username` varchar(200) NOT NULL,
  `Password` varchar(200) NOT NULL,
  `Avatar` varchar(500) DEFAULT 'https://i.pinimg.com/originals/f2/26/5a/f2265a1b20a7a6a07371c4f6d5484eaa.jpg',
  `isAdmin` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`AccountID`, `Username`, `Password`, `Avatar`, `isAdmin`) VALUES
(1, 'admin', '123456', 'https://i.pinimg.com/originals/f2/26/5a/f2265a1b20a7a6a07371c4f6d5484eaa.jpg', 0),
(2, 'vantinh', '123456', 'https://i.pinimg.com/originals/f2/26/5a/f2265a1b20a7a6a07371c4f6d5484eaa.jpg', 1),
(3, 'admin1', '123456', 'https://thicc.mywaifulist.moe/waifus/82/c06ee7cf5631e8617171c03aa6c3c316e5c4e1c30feee510815c4841b206a8f2_thumb.png', 0),
(4, 'user1', '123456', 'https://upanh123.com/wp-content/uploads/2020/12/anh-dai-dien-ngau7-2.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `CityID` int(11) NOT NULL,
  `Name` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`CityID`, `Name`) VALUES
(1, 'Quy Nhơn'),
(2, 'Quảng Nam '),
(3, 'Hà Nội'),
(4, 'Quảng Bình'),
(5, 'TP Hồ Chí Minh'),
(6, 'Quảng Ngãi'),
(7, 'Phú yên'),
(8, 'Huế'),
(9, 'Quảng Ninh');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `CommentID` int(11) NOT NULL,
  `Title` varchar(250) NOT NULL,
  `PlaceID` int(11) DEFAULT NULL,
  `UserID` int(11) DEFAULT NULL,
  `Context` text NOT NULL,
  `TravelTime` date DEFAULT NULL,
  `Content` text DEFAULT NULL,
  `RatingStar` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`CommentID`, `Title`, `PlaceID`, `UserID`, `Context`, `TravelTime`, `Content`, `RatingStar`) VALUES
(1, 'tuyệt vời', 2, 1, 'Cặp đôi', '2021-12-29', 'Nơi này rất tuyệt vời.', 5),
(2, 'tệ', 6, 3, 'Một mình', '2021-12-21', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat.', 1),
(3, 'Tạm được', 2, 3, 'Một mình', '2021-12-10', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 3),
(4, 'Quá tuyệt vời', 2, 4, 'Gia đình thanh thiếu niên', '2021-12-11', 'Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 5),
(5, 'tuyệt vời', 5, 1, 'Bạn bè', '2021-12-15', 'tuyệt vời', 5),
(6, 'tạm được', 7, 1, 'Cặp đôi', '2021-12-07', 'tạm được', 3);

-- --------------------------------------------------------

--
-- Table structure for table `commenthotel`
--

CREATE TABLE `commenthotel` (
  `CommentID` int(11) NOT NULL,
  `Title` varchar(250) NOT NULL,
  `HotelID` int(11) DEFAULT NULL,
  `UserID` int(11) DEFAULT NULL,
  `Context` text NOT NULL,
  `TravelTime` date DEFAULT NULL,
  `Content` text DEFAULT NULL,
  `Rating_diadiem` int(11) NOT NULL DEFAULT 1,
  `Rating_sachse` int(11) NOT NULL DEFAULT 1,
  `Rating_dichvu` int(11) NOT NULL DEFAULT 1,
  `Rating_giaca` int(11) NOT NULL DEFAULT 1,
  `RatingStar` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `commenthotel`
--

INSERT INTO `commenthotel` (`CommentID`, `Title`, `HotelID`, `UserID`, `Context`, `TravelTime`, `Content`, `Rating_diadiem`, `Rating_sachse`, `Rating_dichvu`, `Rating_giaca`, `RatingStar`) VALUES
(1, 'tốt', 1, 1, 'Bạn bè', '2021-12-15', 'tốt, sạch sẽ, giá cả hợp lý', 5, 5, 5, 5, 5),
(2, 'tạm được', 1, 4, 'Bạn bè', '2021-12-16', 'tạm được, giá hơi mắc', 3, 4, 3, 2, 3),
(3, 'tệ', 2, 4, 'Bạn bè', '2021-12-21', 'dịch vụ quá tệ', 1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `hotel`
--

CREATE TABLE `hotel` (
  `HotelID` int(11) NOT NULL,
  `Title` varchar(200) DEFAULT NULL,
  `Location` varchar(250) NOT NULL,
  `Map` varchar(500) NOT NULL,
  `Description` text DEFAULT NULL,
  `Cost` int(11) NOT NULL DEFAULT 0,
  `Image_url` varchar(500) DEFAULT NULL,
  `CityID` int(11) NOT NULL,
  `Rating` int(11) NOT NULL DEFAULT 1,
  `isPopular` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hotel`
--

INSERT INTO `hotel` (`HotelID`, `Title`, `Location`, `Map`, `Description`, `Cost`, `Image_url`, `CityID`, `Rating`, `isPopular`) VALUES
(1, 'Metropole Ha Noi', '15 P. Ngô Quyền, Street, Hoàn Kiếm, Hà Nội', 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14896.72700332511!2d105.856375!3d21.0254125!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x90d6982234a65f25!2sSofitel%20Legend%20Metropole%20Hanoi!5e0!3m2!1sen!2s!4v1639794398281!5m2!1sen!2s', 'Có tuổi đời cao nhất trong số các khách sạn tại thủ đô, Metropole được xây dựng từ năm 1901 và mang dấu ấn của kiến trúc Pháp cổ điển. Là khách sạn 5 sao chuẩn quốc tế và nằm ở trung tâm quận Hoàn Kiếm, quận trung tâm Hà Nội, đây là nơi đón tiếp và diễn ra nhiều cuộc gặp gỡ cấp cao của các nguyên thủ quốc gia trong các chuyến công du tới Việt Nam. So với các khách sạn hiện đại mới xây, phòng tại Metropole nhỏ hơn, ít ổ cắm điện và không đa dạng các món ăn Việt Nam trong thực đơn.', 1500000, 'https://d2e5ushqwiltxm.cloudfront.net/wp-content/uploads/sites/95/2016/12/07094727/HotelMetropoleHanoi-LegendarySuite-Graham-Greene-2-1-585x390.jpg', 3, 4, 1),
(2, 'Four Seasons The Nam Hải Resort', 'Block Ha My, Dong B, Điện Bàn, Quảng Nam, Vietnam', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3836.6200966863726!2d108.31532351536008!3d15.928961647411606!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x314211e48700be8d%3A0xfa3a4e3c2fc05c16!2sFour%20Seasons%20Resort%20The%20Nam%20Hai%2C%20Hoi%20An!5e0!3m2!1sen!2s!4v1639794475941!5m2!1sen!2s', 'Điểm nổi bật nhất của khu nghỉ dưỡng này là chỉ cách phố cổ Hội An 10 phút đi bộ nên được du khách đánh giá cao. Resort nằm gần bãi biển Hà My, bãi biển đẹp nhất của Quảng Nam và được xây dựng theo kiến trúc mang đậm văn hóa Việt, gần gũi với thiên nhiên nên rất được du khách quốc tế ưa chuộng.', 500000, 'https://cdn1.ivivu.com/iVivu/2021/04/01/18/s-nmh-026-cr-800x450.jpg', 2, 1, 0),
(3, 'Laguna Lăng Cô', 'Cù Dù, Phú Lộc, Thừa Thiên Huế', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7657.803063905326!2d107.95586592656197!3d16.327974801027786!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3141860edc9c7793%3A0xc904f50568a73cea!2zTGFndW5hIEzEg25nIEPDtCwgTOG7mWMgVsSpbmgsIFBow7ogTOG7mWMsIFRodWEgVGhpZW4gSHVlLCBWaWV0bmFt!5e0!3m2!1sen!2s!4v1639794525294!5m2!1sen!2s', 'Biển Lăng Cô xinh đẹp và yên bình là nơi Laguna đặt mình và mang đến cho những vị khách yêu quý không gian nghỉ dưỡng sang trọng, đẳng cấp với các khu biệt thự có hồ bơi riêng. Nếu bạn yêu thích phong cách Á Đông và dấu ấn Việt Nam, Laguna là lựa chọn hợp lý dành cho bạn', 2000000, 'https://www.lagunalangco.com/wp-content/uploads/2018/10/Angsana-Lang-Co-beach-resort-photo3-1400x933.jpg', 8, 1, 1),
(4, 'Vinpearl Resort & Spa Halong', 'Đảo Rều, Đỗ Sĩ Họa, Thành phố Hạ Long, Quảng Ninh', 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14905.070714285524!2d107.0253251!3d20.9417629!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb9e2df876fc304c2!2sVinpearl%20Resort%20%26%20Spa%20H%E1%BA%A1%20Long!5e0!3m2!1sen!2s!4v1639794605419!5m2!1sen!2s', 'Là một sản phẩm của tập đoàn Vingroup, khu nghỉ dưỡng Vinpearl Hạ Long là một trong những lựa chọn đẳng cấp nhất cho bạn và gia đình trong mùa hè này. Từ đây, bạn dễ dàng tham quan vịnh Hạ Long - kỳ quan thiên nhiên thế giới cùng các khu vui chơi đẳng cấp quốc tế khác.', 1500000, 'https://pix10.agoda.net/hotelImages/101/1015998/1015998_16012610250039393552.jpg?s=1024x768', 9, 1, 0),
(5, 'Khách sạn Pullman', 'Str Entrance, 40 Cat Linh, 61 P. Giảng Võ, Str, Hà Nội', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3873837.0679802876!2d104.79514176596405!3d18.526913164391367!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ab95bc23ffff%3A0x52a8917f5d1b7ef4!2sPullman%20Hanoi!5e0!3m2!1sen!2s!4v1639794697869!5m2!1sen!2s', 'Khách sạn Pullman Hà Nội là một trong những khách sạn 5 sao sang trọng nằm trong lòng thủ đô Hà Nội, sở hữu vẻ đẹp đẳng cấp sang trọng không hề thua kém với các khách sạn trên thế giới về kiến trúc cũng như thiết kế. Dù bạn đến để thư giãn hay làm gì, khách sạn Pullman luôn là sự lựa chọn hoàn hảo cho kì nghỉ của bạn ở Hà Nội. Khách sạn có vị trí thuận lợi khi nằm tại vị trí trung tâm thủ đô Hà Nội, góc đường Cát Linh và Trung tâm Triển lãm Giảng Võ, gần các văn phòng chính phủ, các đại sứ quán và trung tâm giao dịch các quận.', 1000000, 'https://du-lich.chudu24.com/f/m/2105/21/khach-san-pullman-hanoi.jpg?w=550&c=1', 3, 1, 0),
(6, 'Grand Hotel Saigon', '8 Đồng Khởi, Bến Nghé, Quận 1, Thành phố Hồ Chí Minh, Vietnam', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.486721638192!2d106.70345461533407!3d10.773984762183597!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752f3c8833587f%3A0xe885be248fe82b5b!2sHotel%20Grand%20Saigon!5e0!3m2!1sen!2s!4v1639794753676!5m2!1sen!2s', 'Grand Hotel Saigon nằm tại trung tâm quận 1 và có tuổi đời khá lâu tại thành phố Hồ Chí Minh. Nơi đây gần các điểm mua sắm sấm uất của thành phố nên được nhiều khách hàng lựa chọn cho chuyến du lịch và công tác tới Sài Gòn.', 5000000, 'https://cf.bstatic.com/xdata/images/hotel/max1024x768/196407744.jpg?k=1f82b3bbe1509877d15386622426e01aa912b1f1c53caa52f0426c403967ad95&o=&hp=1', 5, 1, 0),
(7, 'Park Hyatt Sài Gòn', '2 Lam Son Square, Bến Nghé, Quận 1, Thành phố Hồ Chí Minh', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.441476618732!2d106.70107391533415!3d10.777459962120446!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752f462f8cac37%3A0x3d4cc4e3c1887abb!2sPark%20Hyatt%20Saigon!5e0!3m2!1sen!2s!4v1639794786075!5m2!1sen!2s', 'Là một trong số những khách sạn trong top 500 khách sạn được vinh danh trên thế giới, khách sạn Part Hyatt được thiết kế theo phong cách cổ điển của nét văn hóa Việt và phong cách hiện đại của kiến trúc phương Tây, mang lại cho du khách những chuẩn mực sang trọng và dịch vụ đạt tiêu chuẩn quốc tế. Khách sạn có vị trí nằm tại trung tâm thành phố trên Quảng trường Lam Sơn và cách sân bay Quốc tế Tân Sơn 7.5km.', 4500000, 'https://assets.hyatt.com/content/dam/hyatt/hyattdam/images/2015/09/17/1552/Park-Hyatt-Saigon-P207-Pool.jpg/Park-Hyatt-Saigon-P207-Pool.16x9.jpg?imwidth=1280', 5, 1, 1),
(8, 'Khách sạn Hilton Hanoi Opera', '1 Lê Thánh Tông, Phan Chu Trinh, Hoàn Kiếm, Hà Nội, Vietnam', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.235149103011!2d105.85573441540231!3d21.023275093340345!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135abec09e8c48b%3A0x56aec868a7a3d467!2sHilton%20Hanoi%20Opera!5e0!3m2!1sen!2s!4v1639794826760!5m2!1sen!2s', 'Là cái tên thứ 3 trong top 500 khách sạn được vinh danh trên thế giới, khách sạn Hilton Hanoi Opera không xa hoa cầu kì và diễm lệ như những khách sạn lớn tại Hà Nội nhưng lại được nhiều du khách ưa chuộng với thiết kế theo lối kiến trúc Pháp nhưng vẫn mang đến cho du khách những giây phút bình yên, đầy ấm cúng, thoải mái giống như sống trong ngôi nhà của chính mình. Khách sạn có vị trí nằm trên đường Lê Thánh Tông, cách Hồ Gươm khoảng 0,5 km và cách sân bay quốc tế Nội Bài khoảng 35 km.', 2000000, 'https://pix10.agoda.net/hotelImages/2287314/0/b73608465e09f565db6a845cbdfdef80.jpg?ca=22&ce=0&s=1024x768', 3, 1, 0),
(9, 'Ha Long Dream Hotel', '10 Hạ Long, Bãi Cháy, Thành phố Hạ Long, Quảng Ninh, Vietnam', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3725.8978568205907!2d107.04846881540166!3d20.956616695612077!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x314a592c7d945f77%3A0x614502c12b1c7257!2sHA%20LONG%20DREAM%20HOTEL!5e0!3m2!1sen!2s!4v1639794863168!5m2!1sen!2s', 'Ha Long Dream Hotel mang riêng mình vẻ đẹp sang trọng, hiện đại thể hiện qua lối kiến trúc, cách bài trí cũng như nội thất của khách sạn', 2500000, 'https://pix10.agoda.net/hotelImages/105/1059315/1059315_15082422530034961875.jpg?s=1024x768', 9, 1, 0),
(10, 'The Reverie SaiGon\r\n', '22-36 Nguyễn Huệ, Bến Nghé, Quận 1, Thành phố Hồ Chí Minh, Vietnam', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.490516137872!2d106.70241631533425!3d10.773693262188914!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752f46b91ff799%3A0xb004d0342a95cfa0!2sThe%20Reverie%20Saigon!5e0!3m2!1sen!2s!4v1639794894328!5m2!1sen!2s', 'Khách sạn nổi tiếng không những ở Việt Nam mà còn được du khách quốc tế đánh giá cao, công nhận là một trong những khách sạn đẳng cấp, sang trọng với view nhìn bao quát cả thành phố. Có vị trí đắc địa nằm tại quận 1 - trung tâm TP. Hồ Chí Minh, The Reverie Saigon được thiết kế với phong cách hoàng gia, đậm nét cổ điển Ý. Bước vào bên trong khách sạn, bạn sẽ bị choáng ngợp bởi vẻ ngoài hào nhoáng, ấn tượng với thiết kế nội thất vô cùng tinh xảo, tỉ mỉ và sang trọng.\r\n\r\nĐứng ở vị trí thứ 4 trong danh sách 50 Khách sạn tốt nhất Thế Giới, The Reverie Saigon mang cho mình vẻ lộng lẫy, kiêu sa thuộc trong tòa nhà Time Squares đắt đỏ, sang trọng bậc nhất Sài Thành. Từ nội thất được trang bị vô cùng tinh xảo, đắt tiền thì kiến trúc được thiết kế mang phong cách sang trọng, cổ điển, được lót gạch khổng tước đậm nét quý tộc. Phòng tại khách sạn rộng rãi, thoáng mát, được trang bị nội thất với những thương hiệu đình đám như Poltrona Frau, Visionnaire, Giorgetti,...\r\n\r\nCó thể không ngoa khi nói rằng The Reverie Saigon không đơn thuần là khách sạn phục vụ dịch vụ lưu trú mà nó còn là công trình kiến trúc sang trọng, đẳng cấp và quý phái bậc nhất Việt Nam.\r\n', 10000000, 'https://toplist.vn/images/800px/the-reverie-saigon-tp-ho-chi-minh-327691.jpg', 5, 1, 0),
(11, 'JW Marriott Hotel Hanoi\r\n', '8 Đỗ Đức Dục, Mễ Trì, Nam Từ Liêm, Hà Nội, Vietnam', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.621375191368!2d105.78044041540214!3d21.007809193868052!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135acacbb621a31%3A0x6b9d241f84cd960!2sJW%20Marriott%20Hotel%20Hanoi!5e0!3m2!1sen!2s!4v1639794944180!5m2!1sen!2s', 'Không thể không nhắc đến JW Marriott Hotel Hanoi trong danh sách những khách sạn đẹp nhất Việt Nam. Nhận được nhiều đánh giá cao của khách hàng cũng như là một trong số những khách sạn đẳng cấp, sang trọng, JW Marriott Hotel Hanoi có vị trí nằm tại trung tâm thủ đô Hà Nội, thuận tiện cho việc di chuyển của du khách. Với thiết kế hiện đại, sang trọng, dịch vụ đạt chuẩn quốc tế, khách sạn JW Marriott Hanoi đảm bảo đem đến cho du khách trải nghiệm dịch vụ hoàn hảo nhất.', 6000000, 'https://toplist.vn/images/800px/jw-marriott-hotel-hanoi-ha-noi-327701.jpg\r\n', 3, 1, 0),
(12, 'Khách sạn Caravelle\r\n', '19-23 Lam Son Square, Bến Nghé, Quận 1, Thành phố Hồ Chí Minh, Vietnam', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.4570103884757!2d106.70142411533415!3d10.77626696214209!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752f467a55ff73%3A0x10584ab251c7f7b6!2sCaravelle%20Hotel!5e0!3m2!1sen!2s!4v1639794979900!5m2!1sen!2s', 'Là khách sạn 5 sao đạt tiêu chuẩn quốc tế đầu tiên tại Sài Gòn, và cũng là một trong 4 khách sạn được tạp chí Travel & Leisure (Mỹ) đưa vào top 500 khách sạn hàng đầu thế giới với tổng thể kiến trúc được thiết kế dựa theo âm hưởng Châu Âu, sang trọng và xa hoa, hiện đại của khách sạn Caravelle Sài Gòn luôn làm hài lòng mọi du khách trong và ngoài nước. Khách sạn có vị trí nằm ngay trung tâm thương mại, mua sắm và giải trí sầm uất của thành phố và cách Sân bay Tân Sơn Nhất 8km, thuận tiện cho việc di chuyển của du khách.\r\n\r\nVề cơ sở vật chất tại khách sạn Caravelle được đánh giá tiện nghi, hiện đại với thiết kế sang trọng, đáp ứng tốt nhu cầu nghỉ dưỡng của du khách. Đồng thời, đội ngũ nhân viên được đào tạo bài bản, chuyên nghiệp luôn sẵn lòng hỗ trợ du khách khi có vấn đề.', 5000000, 'https://www.caravellehotel.com/wp-content/uploads/GM-Note-Stay.jpg', 5, 1, 0),
(13, 'Khách sạn New World Sài Gòn', '76 Lê Lai, Phường Bến Thành, Quận 1, Thành phố Hồ Chí Minh, Vietnam', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.5248481674957!2d106.69256391533419!3d10.771055462236795!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752f3e8eddf565%3A0x2ab6e5fe92c2e5d7!2sNew%20World%20Saigon%20Hotel!5e0!3m2!1sen!2s!4v1639795011204!5m2!1sen!2s', 'Khách sạn New World Sài Gòn không còn là cái tên xa lạ đối với đa số du khách khi đến TP. Hồ Chí Minh bởi đây là một trong số những khách sạn nổi tiếng và đẹp nhất tại đây. Khách sạn nằm ở vị trí đắc địa quận 1, gần với chợ Bến Thành nên rất thuận tiện cho du khách di chuyển đến những địa điểm du lịch lân cận. Đạt tiêu chuẩn khách sạn 5 sao quốc tế, khách sạn New World Sài Gòn có lối kiến trúc hiện đại, sang trọng và tiện nghi, đem đến cho du khách trải nghiệm dịch vụ cao cấp tại đây.Đội ngũ nhân viên tại khách sạn New World Sài Gòn rất thân thiện, chuyên nghiệp và nhiệt tình, sẵn sàng hỗ trợ du khách khi có nhu cầu phát sinh trong thời gian lưu trú tại đây.', 3000000, 'https://toplist.vn/images/800px/khach-san-new-world-sai-gon-tp-ho-chi-minh-327764.jpg', 5, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE `image` (
  `ImageID` int(11) NOT NULL,
  `PlaceID` int(11) DEFAULT NULL,
  `HotelID` int(11) DEFAULT NULL,
  `Image_url` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `place`
--

CREATE TABLE `place` (
  `PlaceID` int(11) NOT NULL,
  `Title` varchar(200) DEFAULT NULL,
  `Location` varchar(250) DEFAULT NULL,
  `Map` varchar(500) DEFAULT NULL,
  `Description` text DEFAULT NULL,
  `Image_url` varchar(500) DEFAULT NULL,
  `CityID` int(11) NOT NULL,
  `Rating` float DEFAULT 1,
  `isPopular` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `place`
--

INSERT INTO `place` (`PlaceID`, `Title`, `Location`, `Map`, `Description`, `Image_url`, `CityID`, `Rating`, `isPopular`) VALUES
(1, 'Eo Gió', 'Nhơn Lý', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3873.2215471401664!2d109.2877239708972!3d13.88569702556041!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x316f42195aeac74f%3A0x3c9022590ddb13f6!2zRW8gR2lvLCBOaMahbiBMw70sIFF1aSBOaMahbiwgQmluaCBEaW5oIFByb3ZpbmNl!5e0!3m2!1sen!2s!4v1639153349980!5m2!1sen!2s', 'Eo Gió Nhơn Lý là một địa danh đầy nắng và gió với cảnh quan hoang sơ và kì vĩ tiêu biểu cho vẻ đẹp thiên nhiên của vùng đất Quy Nhơn. Eo Gió – Nhơn Lý độc đáo từ tên địa danh cho tới vẻ đẹp lãng mạn mà nên thơ, chắc chắn sẽ làm “xiêu lòng” bất cứ du khách nào từng một lần ghé thăm.', 'https://dynamic-media-cdn.tripadvisor.com/media/photo-o/16/d6/01/c5/caption.jpg?w=1200&h=-1&s=1', 1, 1, 0),
(2, 'Kỳ co', 'Nhơn Lý', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d30990.52022099673!2d109.27430027216518!3d13.850139128157156!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x316f69f3b44b2e29%3A0x75e9afabce0602c7!2sKy%20Co%20Beach!5e0!3m2!1sen!2s!4v1639153637376!5m2!1sen!2s', 'Kỳ Co nằm cách trung tâm thành phố Quy Nhơn hơn 20 km về phía đông nam. Đây được coi là một địa điểm du lịch lý thú nhất tại Quy Nhơn với 2 mặt giáp núi và một mặt giáp biển. Rất thích hợp cho các dân phượt bằng xe máy. Bạn có thể di chuyển bằng ô tô nhưng đi bằng xe máy sẽ tiện hơn cho việc tham thú và khám phá nơi này.', 'https://dynamic-media-cdn.tripadvisor.com/media/photo-o/18/dd/2b/51/d-o-tren-du-ng-ra-k-co.jpg?w=700&h=-1&s=1', 1, 4.33333, 0),
(3, 'Mỹ Sơn', ' Xã Duy Phú, huyện Duy Xuyên', 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15359.006229242821!2d108.1244819!3d15.7642768!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x8baa2869b9f687b!2sThe%20world%20cultural%20heritage%20My%20Son!5e0!3m2!1sen!2s!4v1639153823398!5m2!1sen!2s', 'Thánh địa Mỹ Sơn thuộc xã Duy Phú, huyện Duy Xuyên, tỉnh Quảng Nam, cách thành phố Đà Nẵng khoảng 69 km và gần thành cổ Trà Kiệu, bao gồm nhiều đền đài Chăm Pa, trong một thung lũng đường kính khoảng 2 km, bao quanh bởi đồi núi. Đây từng là nơi tổ chức cúng tế của vương triều Chăm Pa. Thánh địa Mỹ Sơn được coi là một trong những trung tâm đền đài chính của Ấn Độ giáo ở khu vực Đông Nam Á và là di sản duy nhất của thể loại này tại Việt Nam.', 'https://cdn.vntrip.vn/cam-nang/wp-content/uploads/2017/08/z3bwC-2-e1501974623310.jpg', 2, 1, 0),
(4, 'Phố Cổ Hội An', 'Hội An', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d245556.78719321365!2d108.27698666084055!3d15.918246932063413!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31420dd4e1353a7b%3A0xae336435edfcca3!2sH%E1%BB%99i%20An%2C%20Quang%20Nam%20Province!5e0!3m2!1sen!2s!4v1639154094848!5m2!1sen!2s', 'Bên cạnh những điểm đến với núi non hùng vĩ, bao la rộng lớn, những địa danh yên bình như Phố cổ cũng thu hút đông đảo du khách đến và nán lại trong sự an nhiên của phố thị.\r\nNơi đây có thể xem là một danh lam thắng cảnh ở Việt Nam đậm chất mộc mạc, gần gũi. Tuy vậy, Phố cổ Hội An vẫn rất được nhiều người ưa thích, có lẽ đến với Hội An, họ mong muốn tìm lại cảm giác bình yên giúp thư thái trong tâm hồn.\r\n', 'https://cdn.vntrip.vn/cam-nang/wp-content/uploads/2017/08/hoi-an-quang-nam-vntrip-1.jpg', 2, 1, 0),
(5, 'Phong Nha Kẻ Bàng', 'Phong NHA, Bố Trạch', 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15213.006566375441!2d106.2833928!3d17.5907815!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x5d3b4a2c611e58b0!2sPhong%20Nha%20-%20Ke%20Bang%20National%20Park%20Headquarter!5e0!3m2!1sen!2s!4v1639154239768!5m2!1sen!2s', 'Phong Nha được bình chọn là một trong những hang động đẹp nhất thế giới với các tiêu chí: Sông ngầm dài nhất, Hồ nước ngầm đẹp nhất.\r\nCửa hang cao và rộng nhất, Các bãi cát, bãi đá ngầm đẹp nhất, Hang khô rộng và đẹp nhất, Hệ thống thạch nhũ kỳ ảo và tráng lệ nhất, Hang động nước dài nhất. Động Phong Nha là một điểm đến được nhiều du khách lựa chọn trong chuyến du lịch Quảng Bình.\r\n', 'https://www.quangbinhtravel.vn/wp-content/uploads/2018/03/hang-son-doong-2.jpg', 4, 5, 1),
(6, 'Chùa Một Cột', 'phố Chùa Một Cột, Đội Cấn, Ba Đình', 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14895.683356255788!2d105.8336228!3d21.0358532!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xdbe7366fe9dfc2ae!2sOne%20Pillar%20Pagoda!5e0!3m2!1sen!2s!4v1639154352530!5m2!1sen!2s', 'Chùa Một Cột có tên ban đầu là Liên Hoa Đài (蓮花臺) có tức là Đài Hoa Sen với lối kiến trúc độc đáo: một điện thờ đặt trên một cột trụ duy nhất. Liên Hoa Đài là công trình nổi tiếng nhất nằm trong quần thể kiến trúc Chùa Diên Hựu (延祐寺), có nghĩa là ngôi chùa \"Phúc lành dài lâu\".', 'https://dulichkhampha24.com/wp-content/uploads/2020/01/chua-mot-cot-ha-noi-2.jpg', 3, 1, 1),
(7, 'Đảo Lý Sơn', 'thuộc địa phận tỉnh Quảng Ngãi', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d61544.828377827216!2d109.07534206343608!3d15.400742609910994!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31683c1e16a59a47%3A0x3f8e09ab9b00de3b!2sL%C3%BD%20S%C6%A1n%20District%2C%20Quang%20Ngai!5e0!3m2!1sen!2s!4v1639154416120!5m2!1sen!2s', 'Lý Sơn là một huyện đảo thuộc tỉnh Quảng Ngãi, các đất liền khoảng 15 hải lý về phía Đông Bắc. Nơi đây được xem như kết quả của sự phun trào 5 ngọn núi lửa của 25 đến 30 năm về trước. Nhờ hiện tượng thiên nhiên kì vĩ ấy mà hình thành nên một vùng đảo với biển xanh, mây trắng, nắng vàng.', 'https://image.bnews.vn/MediaUpload/Org/2019/05/11/090037_ttxvnlyson.jpg', 6, 3, 1),
(8, 'Ghềnh Đá Đĩa', 'An Ninh Đông, huyện Tuy An', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7764.058443161344!2d109.28762942441465!3d13.348458412437568!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x316f9a1adaa6b287%3A0x2f5e70fdcf869f34!2zQsOjaSBiaeG7g24gR8OgbmggxJDDoSDEkMSpYQ!5e0!3m2!1sen!2s!4v1639154744725!5m2!1sen!2s', 'Theo các nhà khoa học, đá ở ghềnh Đá Đĩa là loại đá bazan hình thành trong quá trình hoạt động của núi lửa ở vùng cao nguyên Vân Hòa (Phú Yên) cách đây gần 200 triệu năm và cách vị trí ghềnh Đá Đĩa ngày nay khoảng 30km theo đường chim bay. Nham thạch phun ra từ miệng núi lửa, gặp nước lạnh đông cứng lại, kết hợp với hiện tượng di ứng lực khiến các khối nham thạch bị đông cứng rạn nứt đa chiều một cách tự nhiên nhưng lại vô cùng hoàn hảo. Phần lớn đá nứt theo mạch dọc, tạo thành những cột thẳng đứng hoặc xiên, cũng có những đường xiết ngang cắt cột đá thành những hình dạng khác nhau. Trên thế giới, ngoài Phú Yên chỉ có một vài nơi khác có hiện tượng này như là các ghềnh đá Giant\'\'s Causeway (Ireland), Los Órganos (Tây Ban Nha) và Fingal (Scotland),...', 'https://tourdulichphuyen.com/view/at_kham-pha-ghenh-da-dia-mot-net-tieu-bieu-o-phu-yen_69f85e0952d2f837c07910e36ea6298d.jpg', 7, 1, 0),
(9, 'Vịnh Hạ Long', 'Thành phố Hạ Long', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d238637.4487194976!2d107.00954203101978!3d20.843408353365028!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x314a5796518cee87%3A0x55c6b0bcc85478db!2zSOG6oSBMb25nIEJheQ!5e0!3m2!1sen!2s!4v1639154819529!5m2!1sen!2s', 'Vịnh Hạ Long là một danh lam thắng cảnh Việt Nam được Unesco công nhận.\r\nNét đẹp bao lao của Vịnh Hạ Long nhờ vào 2000 hòn đảo lớn, nhỏ, mỗi hòn đảo như một phần cơ thể. Tạo nên tổng thể “con người” mang tên Vịnh Hạ Long rộng lớn, hùng vĩ và vô cùng xinh đẹp.', 'https://dulichhalongquangninh.com/wp-content/uploads/2016/07/hinh-anh-du-lich-ha-long.jpg', 9, 1, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`AccountID`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`CityID`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`CommentID`),
  ADD KEY `PlaceID` (`PlaceID`),
  ADD KEY `UserID` (`UserID`);

--
-- Indexes for table `commenthotel`
--
ALTER TABLE `commenthotel`
  ADD PRIMARY KEY (`CommentID`);

--
-- Indexes for table `hotel`
--
ALTER TABLE `hotel`
  ADD PRIMARY KEY (`HotelID`),
  ADD KEY `CityID` (`CityID`);

--
-- Indexes for table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`ImageID`),
  ADD KEY `PlaceID` (`PlaceID`),
  ADD KEY `HotelID` (`HotelID`);

--
-- Indexes for table `place`
--
ALTER TABLE `place`
  ADD PRIMARY KEY (`PlaceID`),
  ADD KEY `CityID` (`CityID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `AccountID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `CityID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `CommentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `commenthotel`
--
ALTER TABLE `commenthotel`
  MODIFY `CommentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `hotel`
--
ALTER TABLE `hotel`
  MODIFY `HotelID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `image`
--
ALTER TABLE `image`
  MODIFY `ImageID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `place`
--
ALTER TABLE `place`
  MODIFY `PlaceID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`PlaceID`) REFERENCES `place` (`PlaceID`),
  ADD CONSTRAINT `comment_ibfk_3` FOREIGN KEY (`UserID`) REFERENCES `account` (`AccountID`);

--
-- Constraints for table `hotel`
--
ALTER TABLE `hotel`
  ADD CONSTRAINT `hotel_ibfk_1` FOREIGN KEY (`CityID`) REFERENCES `city` (`CityID`);

--
-- Constraints for table `image`
--
ALTER TABLE `image`
  ADD CONSTRAINT `image_ibfk_1` FOREIGN KEY (`PlaceID`) REFERENCES `place` (`PlaceID`),
  ADD CONSTRAINT `image_ibfk_2` FOREIGN KEY (`HotelID`) REFERENCES `hotel` (`HotelID`);

--
-- Constraints for table `place`
--
ALTER TABLE `place`
  ADD CONSTRAINT `place_ibfk_1` FOREIGN KEY (`CityID`) REFERENCES `city` (`CityID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
