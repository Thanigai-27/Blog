-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql302.epizy.com
-- Generation Time: Jul 11, 2020 at 02:48 AM
-- Server version: 5.6.48-88.0
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `epiz_25837240_blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `name` varchar(255) DEFAULT NULL,
  `contact_no` varchar(255) DEFAULT NULL,
  `active` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `email`, `password`, `created_at`, `name`, `contact_no`, `active`) VALUES
(1, 'thanigai', 'thanigai@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '2020-05-21 17:00:24', 'thanigai', '1234567890', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `active` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category_name`, `active`) VALUES
(1, 'Technology', 1),
(2, 'Education', 1),
(3, 'Adventure', 1),
(4, 'Sports', 1),
(5, 'Lifestyle', 1),
(6, 'Buisness', 1),
(7, 'Travel', 1),
(8, 'Food', 1),
(9, 'Food', 0),
(10, 'Politics', 1),
(11, 'test car', 1);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `body` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `post_id` int(11) DEFAULT NULL,
  `comment_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `reply` int(11) DEFAULT '0',
  `reply_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `reply_body` text,
  `user_id` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `name`, `email`, `body`, `status`, `post_id`, `comment_date`, `reply`, `reply_date`, `reply_body`, `user_id`) VALUES
(25, 'Nico', 'nico@gmail.com', 'Nice work', 1, 18, '2020-06-02 06:56:15', 1, '2020-06-02 06:56:15', ' Thanks lot keep supporting', 31),
(26, 'ravi', 'ravi@gmail.com', 'NIce\r\n', 1, 18, '2020-07-09 04:28:31', 1, '2020-07-09 04:28:31', ' Nice ', 31),
(27, 'ralhs', 'srkmk@gmail.com', 'Worst', 0, 18, '2020-06-28 12:53:09', 0, '0000-00-00 00:00:00', NULL, 31);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `content` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `content`) VALUES
(1, 'S.R.Mohanraj', 'srmohanraj97@gmail.com', 'This work is great');

-- --------------------------------------------------------

--
-- Table structure for table `devices`
--

CREATE TABLE `devices` (
  `post_id` int(11) DEFAULT NULL,
  `ip_address` text
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `devices`
--

INSERT INTO `devices` (`post_id`, `ip_address`) VALUES
(18, '117.193.187.46'),
(12, '117.193.187.46'),
(18, '157.50.22.115'),
(18, '157.46.47.226'),
(12, '157.46.47.226'),
(14, '157.46.47.226'),
(13, '157.46.47.226'),
(18, '157.51.148.149'),
(14, '157.51.148.149'),
(13, '117.193.179.155'),
(18, '117.193.179.155'),
(18, '157.50.3.49'),
(18, '157.51.194.220'),
(18, '157.51.92.12'),
(13, '157.51.92.12'),
(14, '157.51.92.12'),
(14, '157.51.194.220'),
(14, '157.50.93.70'),
(13, '157.51.196.0'),
(14, '157.50.26.227'),
(9, '117.193.187.124'),
(18, '117.193.187.124'),
(9, '157.46.27.42'),
(0, '157.46.27.42'),
(15, '157.46.27.42'),
(14, '157.46.51.88'),
(18, '157.46.51.88'),
(0, '157.46.51.88'),
(18, '117.193.187.196'),
(18, '157.50.89.61'),
(17, '157.50.89.61'),
(9, '157.50.89.61'),
(9, '117.193.176.177'),
(18, '117.193.176.177'),
(17, '117.193.176.177'),
(18, '157.46.12.154'),
(9, '117.193.180.77'),
(14, '117.193.180.77'),
(17, '117.193.180.77'),
(15, ''),
(9, ''),
(12, ''),
(14, ''),
(0, ''),
(13, ''),
(35, ''),
(18, ''),
(12, '117.193.183.78'),
(9, '157.50.23.231'),
(12, '157.50.23.231'),
(12, '157.50.12.182'),
(0, '157.50.12.182');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `content` longtext NOT NULL,
  `image` varchar(255) NOT NULL,
  `views` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `active` int(11) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `published` int(11) DEFAULT '0',
  `published_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `username` varchar(255) DEFAULT NULL,
  `feedback` varchar(1000) DEFAULT 'No Feedback provided yet.',
  `devices` int(11) DEFAULT '0',
  `likes` int(11) DEFAULT '0',
  `dislikes` int(11) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `title`, `category`, `content`, `image`, `views`, `created_at`, `active`, `updated_at`, `published`, `published_date`, `username`, `feedback`, `devices`, `likes`, `dislikes`) VALUES
(96, 30, 'study', 'politics', '<p>dsafsdfasdfjij<br></p>', 'cebc3e2d84fd0d98c04edb19290ebb00.gif', 0, '2020-05-21 16:26:25', 1, '0000-00-00 00:00:00', NULL, '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL),
(97, 30, 'est', 'travel', '<p>sfsadfasdfsdafsadfjnklk knlk<br></p>', '0dc641cc77da972fd916a999d62f0b68.png', 0, '2020-05-21 16:41:26', 1, '2020-05-21 16:42:39', 0, '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL),
(98, 31, 'test1', 'adventure', '<p>dsafsadfsdafasdfsad<br></p>', 'd69e36fe131d4ab33db6b6c1a831723d.jpg', 0, '2020-05-21 17:30:57', 0, '2020-06-02 04:15:13', 0, '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL),
(99, 31, 'Run', 'adventure', '<p>fsafasdkflkasdfas<br></p>', '4314b868f4659e797dbede8ccadd650c.png', 40, '2020-05-24 16:43:08', 1, '2020-07-08 18:11:03', 1, '2020-06-02 12:02:34', 'henry', NULL, 1, 1, 1),
(100, 0, 'you', 'lifestyle', '<p>fsdfsdafsdafsdafsdaf<br></p>', '24dcf901dba441cd4e9ba64bccfcf6a8.png', 0, '2020-05-24 16:57:41', 1, '2020-05-24 16:57:41', 0, '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL),
(101, 0, 'myself', 'lifestyle', '<p>adsfdsafsadfsfsadf<br></p>', '2d1150b69c99f9b78c350147b808cc33.png', 0, '2020-05-24 17:01:16', 1, '2020-05-31 14:04:25', 0, '2020-05-27 17:31:45', NULL, NULL, NULL, NULL, NULL),
(102, 31, 'cricket', 'sports', '<p>sadfnsaldnfksdal casdc<br></p>', '4314b868f4659e797dbede8ccadd650c.png', 44, '2020-05-24 17:03:54', 1, '2020-07-09 04:25:44', 1, '2020-05-31 14:49:36', 'henry', NULL, 2, 2, 1),
(103, 31, 'Computer', 'technology', '<p>I like computers</p>', '17f308b7e6f1a1dbce7b86f91e630014.jpg', 11, '2020-05-26 17:57:20', 1, '2020-07-08 17:59:04', 1, '2020-05-26 18:01:42', 'henry', 'Nice work', 4, 1, 0),
(104, 31, 'test 4', 'technology', '<p>gvuyjbhb</p>', '32554b968a0ad569a14dd61adf835bd8.png', 18, '2020-05-31 14:00:43', 1, '2020-07-08 10:53:48', 1, '2020-05-31 14:02:12', 'henry', 'nice', 6, 1, 0),
(105, 31, 'Football', 'sports', '<p>dsnf kasdfasdf</p>', 'b9fb9d37bdf15a699bc071ce49baea53.jpg', 23, '2020-05-31 16:39:40', 1, '2020-07-08 12:39:01', 1, '2020-06-02 12:02:00', 'henry', 'No Feedback provided yet.', NULL, 0, 1),
(106, 31, 'Smart Wheelchair', 'technology', '<p class=\"MsoNormal\" style=\"text-align:justify;line-height:150%\"><span style=\"font-size:14.0pt;line-height:150%\">There are thousands of people in\nIndia, who are facing disability in movement. They face discrimination on\nregular basis which takes many forms. These people are considered more as a liability\nthan an asset to the society. Since they encounter discrimination, they tend to\nalienate themselves from the society as they feel unwanted and rejected.\nAccording to census 2016, in India there were around 2.21% of population had\ndisability in movements that is around 2.68 Cr people!&nbsp; In addition, most of our public\ninfrastructure, public transport and government buildings are not\ndisabled-friendly. There has to be a concerted effort to ensure the disabled\nhave access to these places and not feel hampered in anyway. Our mind-set has\nto change and accept these people and integrate them into our society. For this\nreason, we are building a special type of wheelchair which would be helpful to\nthese people for being self-dependent and would be helpful to integrate them in\nour society.<b><o:p></o:p></b></span></p><p class=\"MsoNormal\" style=\"text-align:justify;line-height:150%\"><span style=\"font-size: 14pt; line-height: 150%; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">The objective of\nthis project is to make disabled people less independent. The proposed model will\nbe one of the solution. The project incorporates a wheel chair which can move\nwith the sensors as per the personâ€™s physical gestures and the person could\ncontrol home appliances with voice assistive android application.<b> </b>It<b> </b>is<b>\n</b>semi<b>- </b>autonomous<b> </b>with a 3-axis Accelerometer and 3-axis\nGyroscope sensor and the controller part is Arduino-nano which transmits the\ndirection.<b> </b>The project is based on\nwireless communication, where the data from the hand gestures is transmitted to\nthe robot over RF link (RF Transmitter â€“ Receiver pair). The MPU6050 is one of\nthe most commonly used Sensor Modules by hobbyists and enthusiasts. It consists\nof Accelerometer and Gyroscope on the same IC and provides 6 Degrees of Freedom\n(3-axis of Accelerometer and 3-axis of Gyroscope).<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"text-align:justify;line-height:150%\"><span style=\"font-size: 14pt; line-height: 150%; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Home automation makes it more easy for\nthe individual to operate home appliances without the need to move by using\ntheir voice. This will be very helpful for the disabled people and reduces them\nbeing reliable on others for their work to be done.<o:p></o:p></span></p><p class=\"Default\"><b><span style=\"font-size:\n16.0pt;color:windowtext\">1.1Google Trend Analysis<o:p></o:p></span></b></p><p class=\"Default\"><b><span style=\"font-size:\n16.0pt;color:windowtext\"><o:p>&nbsp;</o:p></span></b></p><p class=\"Default\"><v:shapetype id=\"_x0000_t75\" coordsize=\"21600,21600\" o:spt=\"75\" o:preferrelative=\"t\" path=\"m@4@5l@4@11@9@11@9@5xe\" filled=\"f\" stroked=\"f\">\n <v:stroke joinstyle=\"miter\">\n <v:formulas>\n  <v:f eqn=\"if lineDrawn pixelLineWidth 0\">\n  <v:f eqn=\"sum @0 1 0\">\n  <v:f eqn=\"sum 0 0 @1\">\n  <v:f eqn=\"prod @2 1 2\">\n  <v:f eqn=\"prod @3 21600 pixelWidth\">\n  <v:f eqn=\"prod @3 21600 pixelHeight\">\n  <v:f eqn=\"sum @0 0 1\">\n  <v:f eqn=\"prod @6 1 2\">\n  <v:f eqn=\"prod @7 21600 pixelWidth\">\n  <v:f eqn=\"sum @8 21600 0\">\n  <v:f eqn=\"prod @7 21600 pixelHeight\">\n  <v:f eqn=\"sum @10 21600 0\">\n </v:f></v:f></v:f></v:f></v:f></v:f></v:f></v:f></v:f></v:f></v:f></v:f></v:formulas>\n <v:path o:extrusionok=\"f\" gradientshapeok=\"t\" o:connecttype=\"rect\">\n <o:lock v:ext=\"edit\" aspectratio=\"t\">\n</o:lock></v:path></v:stroke></v:shapetype><v:shape id=\"Picture_x0020_2\" o:spid=\"_x0000_i1026\" type=\"#_x0000_t75\" style=\"width:481.5pt;height:220.5pt;visibility:visible;mso-wrap-style:square\">\n <v:imagedata src=\"file:///C:/Users/THANIG~1/AppData/Local/Temp/msohtmlclip1/01/clip_image001.png\" o:title=\"\">\n</v:imagedata></v:shape><b><span style=\"font-size:\n16.0pt;color:windowtext\"><o:p></o:p></span></b></p><p class=\"Default\"><b><span style=\"font-size:\n16.0pt;color:windowtext\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <o:p></o:p></span></b></p><p class=\"Default\"><b><span style=\"font-size:\n16.0pt;color:windowtext\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></b><b><span style=\"color:windowtext\">FIG 1.1\nINTEREST OVER TIME<o:p></o:p></span></b></p><p class=\"Default\"><b><span style=\"font-size:\n16.0pt;color:windowtext\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <o:p></o:p></span></b></p><p class=\"Default\"><v:shape id=\"Picture_x0020_4\" o:spid=\"_x0000_i1025\" type=\"#_x0000_t75\" style=\"width:480.75pt;height:220.5pt;\n visibility:visible;mso-wrap-style:square\">\n <v:imagedata src=\"file:///C:/Users/THANIG~1/AppData/Local/Temp/msohtmlclip1/01/clip_image002.png\" o:title=\"\">\n</v:imagedata></v:shape><b><span style=\"font-size:\n16.0pt;color:windowtext\"><o:p></o:p></span></b></p><p class=\"Default\"><b><span style=\"color:\nwindowtext\"><o:p>&nbsp;</o:p></span></b></p><p class=\"Default\" align=\"center\" style=\"text-align:center\"><b><span style=\"color:windowtext\">FIG 1.2 COUNTRY WISE COMPARISON<o:p></o:p></span></b></p><p class=\"Default\"><b><span style=\"font-size:\n16.0pt;color:windowtext\"><o:p>&nbsp;</o:p></span></b></p><p class=\"Default\" style=\"text-align:justify;line-height:150%\"><span style=\"font-size:14.0pt;line-height:150%;color:windowtext\"><o:p>&nbsp;</o:p></span></p><p class=\"Default\" style=\"text-align:justify;line-height:150%\"><span style=\"font-size:14.0pt;line-height:150%;color:windowtext\">Google Trend\nAnalysis that analyses the popularity of top search queries in Google Search\nacross various regions and sub regions. This uses graphs to compare the search\nvolume of different queries over time. Trend analysis of smart wheelchair is\nshown above. Australia leads the chart for the countries with most disabled\npersons and UK being second with 27.2% of population of entire population\nfacing disability. This shows the need of smart wheelchair which would assist\nthe disabled person in those countries. The trend analysis also shows the same\nresults in which Australia leads for the searches of smart wheelchair over the\nyears followed by USA and UK. So this depicts the need of smart wheelchair in\nthose developed countries. In India also the need for the smart wheelchair\ngradually increases as you can infer from the above figures.<o:p></o:p></span></p><p>\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n</p><p class=\"Default\"><b><span style=\"font-size:\n16.0pt;color:windowtext\"><o:p>&nbsp;</o:p></span></b></p>', 'b9fb9d37bdf15a699bc071ce49baea53.jpg', 49, '2020-06-01 03:14:06', 1, '2020-07-08 17:58:52', 1, '2020-06-01 03:15:04', 'henry', 'No Feedback provided yet.', 9, 0, 1),
(107, 31, 'Smart Wheelchair', 'technology', '<p class=\"MsoNormal\" align=\"center\" style=\"text-align:center;line-height:150%\"><b><span style=\"font-size:16.0pt;line-height:\n150%\">INTRODUCTION<o:p></o:p></span></b></p><p class=\"MsoNormal\" style=\"text-align:justify;line-height:150%\"><span style=\"font-size:14.0pt;line-height:150%\">There are thousands of people in\nIndia, who are facing disability in movement. They face discrimination on\nregular basis which takes many forms. These people are considered more as a liability\nthan an asset to the society. Since they encounter discrimination, they tend to\nalienate themselves from the society as they feel unwanted and rejected.\nAccording to census 2016, in India there were around 2.21% of population had\ndisability in movements that is around 2.68 Cr people!&nbsp; In addition, most of our public\ninfrastructure, public transport and government buildings are not\ndisabled-friendly. There has to be a concerted effort to ensure the disabled\nhave access to these places and not feel hampered in anyway. Our mind-set has\nto change and accept these people and integrate them into our society. For this\nreason, we are building a special type of wheelchair which would be helpful to\nthese people for being self-dependent and would be helpful to integrate them in\nour society.<b><o:p></o:p></b></span></p><p class=\"MsoNormal\" style=\"text-align:justify;line-height:150%\"><span style=\"font-size: 14pt; line-height: 150%; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">The objective of\nthis project is to make disabled people less independent. The proposed model will\nbe one of the solution. The project incorporates a wheel chair which can move\nwith the sensors as per the personâ€™s physical gestures and the person could\ncontrol home appliances with voice assistive android application.<b> </b>It<b> </b>is<b>\n</b>semi<b>- </b>autonomous<b> </b>with a 3-axis Accelerometer and 3-axis\nGyroscope sensor and the controller part is Arduino-nano which transmits the\ndirection.<b> </b>The project is based on\nwireless communication, where the data from the hand gestures is transmitted to\nthe robot over RF link (RF Transmitter â€“ Receiver pair). The MPU6050 is one of\nthe most commonly used Sensor Modules by hobbyists and enthusiasts. It consists\nof Accelerometer and Gyroscope on the same IC and provides 6 Degrees of Freedom\n(3-axis of Accelerometer and 3-axis of Gyroscope).<o:p></o:p></span></p><p>\n\n\n\n\n\n</p><p class=\"MsoNormal\" style=\"text-align:justify;line-height:150%\"><span style=\"font-size: 14pt; line-height: 150%; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Home automation makes it more easy for\nthe individual to operate home appliances without the need to move by using\ntheir voice. This will be very helpful for the disabled people and reduces them\nbeing reliable on others for their work to be done.<o:p></o:p></span></p>', 'b9fb9d37bdf15a699bc071ce49baea53.jpg', 0, '2020-06-01 04:50:50', 1, '2020-06-01 04:50:50', 0, '0000-00-00 00:00:00', 'henry', 'No Feedback provided yet.', NULL, NULL, NULL),
(108, 31, 'Android Studio', 'technology', '<p class=\"MsoNormal\" style=\"margin-top:6.0pt;margin-right:0cm;margin-bottom:6.0pt;\nmargin-left:7.0pt;text-align:justify;text-indent:29.0pt;line-height:150%\"><span style=\"font-size:14.0pt;line-height:150%\">The Android software development kit\n(SDK) includes a comprehensive set of development tools. These include a\ndebugger, libraries, a handset emulator based on QEMU (Quick Emulator),\ndocumentation, sample code, and tutorials. Android Studio made by Google and\npowered by IntelliJ, is the official IDE. Additionally, developers may use any\ntext editor to edit Java and XML files, then use command line tools (Java\nDevelopment Kit and Apache Ant are required) to create, build and debug Android\napplications as well as control attached Android devices.<sup> [3]<o:p></o:p></sup></span></p><p class=\"MsoNormal\" style=\"margin-top:6.0pt;margin-right:0cm;margin-bottom:6.0pt;\nmargin-left:7.0pt;text-align:justify;line-height:150%\"><span style=\"font-size:\n14.0pt;line-height:150%\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Enhancements\nto Android SDK go hand in hand with the overall Android platform development.\nThe SDK also supports older versions of the Android platform in case developers\nwish to target their applications at older devices. Development tools are\ndownloadable components, so after one has downloaded the latest version and\nplatform, older platforms and tools can also be downloaded for compatibility\ntesting.<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin-top:4.0pt;margin-right:0cm;margin-bottom:0cm;\nmargin-left:7.0pt;margin-bottom:.0001pt;text-align:justify;line-height:150%\"><span style=\"font-size:14.0pt;line-height:150%\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Android\napplications are packaged in. ask format and stored under <span style=\"background:#F9F9F9\">/data/app</span> folder on the Android OS (the\nfolder is accessible only to the root user for security reasons).<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin-top:4.0pt;margin-right:0cm;margin-bottom:0cm;\nmargin-left:7.0pt;margin-bottom:.0001pt;text-align:justify;line-height:150%\"><span style=\"font-size:12.0pt;line-height:150%\">&nbsp;<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin-top:4.0pt;margin-right:0cm;margin-bottom:0cm;\nmargin-left:0cm;margin-bottom:.0001pt;text-align:justify;line-height:150%\"><b><span style=\"font-size:16.0pt;line-height:\n150%\">5.2.2&nbsp;&nbsp; Android Studio<o:p></o:p></span></b></p><p class=\"MsoNormal\" style=\"text-align:justify;line-height:150%\"><span style=\"font-size:14.0pt;line-height:150%\">Android Studio is the official IDE\nfor Android platform development. Some of its features are:<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"text-align:justify;line-height:150%\"><span style=\"font-size:14.0pt;line-height:150%\">Â· Grade-based build support.<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"text-align:justify;line-height:150%\"><span style=\"font-size:14.0pt;line-height:150%\">Â· Android-specific refactoring and\nquick fixes.<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"text-align:justify;line-height:150%\"><span style=\"font-size:14.0pt;line-height:150%\">Â· Lint tools to catch performance,\nusability, version compatibility and other problems.<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"text-align:justify;line-height:150%\"><span style=\"font-size:14.0pt;line-height:150%\">Â· Template-based wizards to create\ncommon Android designs and components.<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"text-align:justify;line-height:150%\"><span style=\"font-size:14.0pt;line-height:150%\">Â· A rich layout editor that allows\nusers to drag-and-drop UI components, option to preview layouts on multiple\nscreen configurations.<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"text-align:justify;line-height:150%\"><span style=\"font-size:14.0pt;line-height:150%\">Â· Support for building Android Wear\napps<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"text-align:justify;line-height:150%\"><span style=\"font-size:14.0pt;line-height:150%\">However, we are concerned only with\nprogramming in an IDE using some of its features.<sup> <o:p></o:p></sup></span></p><p class=\"MsoNormal\" style=\"text-align:justify;line-height:150%\"><b><span style=\"font-size:16.0pt;line-height:\n150%\">5.3 ARDUINO IDE<o:p></o:p></span></b></p><p>\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n</p><p class=\"MsoNormal\" style=\"text-align:justify;line-height:150%\"><b><span style=\"font-size:14.0pt;line-height:\n150%\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></b><span style=\"font-size:14.0pt;line-height:150%\">Arduino IDE is used to program the\nArduino UNO microcontroller. Arduino UNO programming is based on C++ with some\nextra features. The open-source Arduino Software (IDE) makes it easy to write\ncode and upload it to the board. It runs on Windows, Mac OS X, and Linux. The\nenvironment is written in Java and based on Processing and other open-source software.</span><sup><span style=\"font-size:12.0pt;line-height:150%\"> <o:p></o:p></span></sup></p>', 'b9fb9d37bdf15a699bc071ce49baea53.jpg', 0, '2020-06-02 04:08:21', 1, '2020-06-02 12:01:45', 0, '2020-06-02 11:59:33', 'henry', 'No Feedback provided yet.', 0, NULL, NULL),
(109, 31, 'Physics', 'Education', '<p>kslfkasdfasdfas</p>', 'a6639d406d84c5f0107019f667093641.png', 0, '2020-07-07 06:57:39', 1, '2020-07-07 06:57:39', 0, '0000-00-00 00:00:00', 'henry', 'No Feedback provided yet.', 0, NULL, NULL),
(110, 31, 'Computer', 'travel', '<p>fdvmsdfv;lmsdfv</p>', '3a20a95176c1bc8597283afc218df10f.png', 283, '0000-00-00 00:00:00', 1, '2020-07-08 17:45:07', 1, '0000-00-00 00:00:00', 'henry', 'No Feedback provided yet.', 1, 0, 1),
(111, 31, 'Computer', 'technology', '<p>jsadlfnsidkafmlasdfsadf</p>', '5b7efc4e97602bb2891b0f34b033ef41.jpg', 1, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', 'henry', 'No Feedback provided yet.', 0, NULL, NULL),
(93, 0, 'Title', 'Category', 'Content', 'Image', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'Username', 'Feedback', 0, 0, 0),
(94, 1, 'er', 'sports', '<p>dsafdsafdsnajnfksadfmlas<br></p>', 'f4d5b97cb969b4741b84b56f1ba498e6.jpg', 0, '2020-05-17 10:25:06', NULL, '0000-00-00 00:00:00', NULL, '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `posts` (`id`, `user_id`, `title`, `category`, `content`, `image`, `views`, `created_at`, `active`, `updated_at`, `published`, `published_date`, `username`, `feedback`, `devices`, `likes`, `dislikes`) VALUES
(95, 20, 'test title', 'travel', '<p>hhhkhjhkhk;</p><p><br></p><p><img style=\"width: 977px;\" src=\"data:image/jpeg;base64,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QG/gAAAAAAAAAAAAR3JuIGRvdWJAb+AAAAAAAAAAAABCbCAgZG91YkBv4AAAAAAAAAAAAEJyZFRVbnRGI1JsdAAAAAAAAAAAAAAAAEJsZCBVbnRGI1JsdAAAAAAAAAAAAAAAAFJzbHRVbnRGI1B4bEBSAAAAAAAAAAAACnZlY3RvckRhdGFib29sAQAAAABQZ1BzZW51bQAAAABQZ1BzAAAAAFBnUEMAAAAATGVmdFVudEYjUmx0AAAAAAAAAAAAAAAAVG9wIFVudEYjUmx0AAAAAAAAAAAAAAAAU2NsIFVudEYjUHJjQFkAAAAAAAAAAAAQY3JvcFdoZW5QcmludGluZ2Jvb2wAAAAADmNyb3BSZWN0Qm90dG9tbG9uZwAAAAAAAAAMY3JvcFJlY3RMZWZ0bG9uZwAAAAAAAAANY3JvcFJlY3RSaWdodGxvbmcAAAAAAAAAC2Nyb3BSZWN0VG9wbG9uZwAAAAAAOEJJTQPtAAAAAAAQAEgAAAABAAIASAAAAAEAAjhCSU0EJgAAAAAADgAAAAAAAAAAAAA/gAAAOEJJTQQNAAAAAAAEAAAAWjhCSU0EGQAAAAAABAAAAB44QklNA/MAAAAAAAkAAAAAAAAAAAEAOEJJTScQAAAAAAAKAAEAAAAAAAAAAjhCSU0D9QAAAAAASAAvZmYAAQBsZmYABgAAAAAAAQAvZmYAAQChmZoABgAAAAAAAQAyAAAAAQBaAAAABgAAAAAAAQA1AAAAAQAtAAAABgAAAAAAAThCSU0D+AAAAAAAcAAA/////////////////////////////wPoAAAAAP////////////////////////////8D6AAAAAD/////////////////////////////A+gAAAAA/////////////////////////////wPoAAA4QklNBAAAAAAAAAIAPjhCSU0EAgAAAAAAfgAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAADhCSU0EMAAAAAAAPwEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEB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cDovL25zLmFkb2JlLmNvbS94YXAvMS4wLwA8P3hwYWNrZXQgYmVnaW49Iu+7vyIgaWQ9Ilc1TTBNcENlaGlIenJlU3pOVGN6a2M5ZCI/PiA8eDp4bXBtZXRhIHhtbG5zOng9ImFkb2JlOm5zOm1ldGEvIiB4OnhtcHRrPSJBZG9iZSBYTVAgQ29yZSA1LjYtYzEzOCA3OS4xNTk4MjQsIDIwMTYvMDkvMTQtMDE6MDk6MDEgICAgICAgICI+IDxyZGY6UkRGIHhtbG5zOnJkZj0iaHR0cDovL3d3dy53My5vcmcvMTk5OS8wMi8yMi1yZGYtc3ludGF4LW5zIyI+IDxyZGY6RGVzY3JpcHRpb24gcmRmOmFib3V0PSIiIHhtbG5zOnhtcD0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wLyIgeG1sbnM6cGhvdG9zaG9wPSJodHRwOi8vbnMuYWRvYmUuY29tL3Bob3Rvc2hvcC8xLjAvIiB4bWxuczpkYz0iaHR0cDovL3B1cmwub3JnL2RjL2VsZW1lbnRzLzEuMS8iIHhtbG5zOnhtcE1NPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvbW0vIiB4bWxuczpzdEV2dD0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL3NUeXBlL1Jlc291cmNlRXZlbnQjIiB4bWxuczpzdFJlZj0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL3NUeXBlL1Jlc291cmNlUmVmIyIgeG1wOkNyZWF0b3JUb29sPSJBZG9iZSBQaG90b3Nob3AgQ0MgMjAxNyAoV2luZG93cykiIHhtcDpDcmVhdGVEYXRlPSIyMDE3LTAyLTE1VDEwOjA4OjEyKzAxOjAwIiB4bXA6TWV0YWRhdGFEYXRlPSIyMDE3LTEyLTE4VDA5OjAxOjM0KzAxOjAwIiB4bXA6TW9kaWZ5RGF0ZT0iMjAxNy0xMi0xOFQwOTowMTozNCswMTowMCIgcGhvdG9zaG9wOkNvbG9yTW9kZT0iMyIgZGM6Zm9ybWF0PSJpbWFnZS9qcGVnIiB4bXBNTTpJbnN0YW5jZUlEPSJ4bXAuaWlkOmFkMTI2Y2I2LTU3MTMtY2U0MC1hYjYwLWFkNDcwMWRlN2M4YSIgeG1wTU06RG9jdW1lbnRJRD0iYWRvYmU6ZG9jaWQ6cGhvdG9zaG9wOmFhMzJiMjNlLWUzYzktMTFlNy1hNzc3LTkxMWFjMmMyNmNjZCIgeG1wTU06T3JpZ2luYWxEb2N1bWVudElEPSJ4bXAuZGlkOjk2YWFkNTIxLTIxYzAtMDA0NS04ODRkLTk1NDgyYzFjZWUxMyI+IDxwaG90b3Nob3A6VGV4dExheWVycz4gPHJkZjpCYWc+IDxyZGY6bGkgcGhvdG9zaG9wOkxheWVyTmFtZT0iSkVUWlQgTkVVISIgcGhvdG9zaG9wOkxheWVyVGV4dD0iSkVUWlQgTkVVISIvPiA8cmRmOmxpIHBob3Rvc2hvcDpMYXllck5hbWU9Ik5FVSEiIHBob3Rvc2hvcDpMYXllclRleHQ9Ik5FVSEiLz4gPC9yZGY6QmFnPiA8L3Bob3Rvc2hvcDpUZXh0TGF5ZXJzPiA8cGhvdG9zaG9wOkRvY3VtZW50QW5jZXN0b3JzPiA8cmRmOkJhZz4gPHJkZjpsaT4xMEE2REVENjk2NzhGNDZGRjVGMDU4MEFBMTY0MUM5MjwvcmRmOmxpPiA8cmRmOmxpPjEwQjNGQkMxNUNEMjYzODFBQUY2MjgwN0Y0RUE2MjA3PC9yZGY6bGk+IDxyZGY6bGk+MUUxNDlDMDJERTdGN0ZBNUJFMjBDRTY5QURDMDExRjc8L3JkZjpsaT4gPHJkZjpsaT4yNUI5RDQxRjExRkU1NjVCOTlGNEY1QUEyNjgzNDU1OTwvcmRmOmxpPiA8cmRmOmxpPjM1MDFFOTg5NkFCRTQzNjY3MjFCQkExQTYzRDlBNzk3PC9yZGY6bGk+IDxyZGY6bGk+MzVGRDgxOEEzN0FCNDZERDA0RDQwMTY2RjMyMkQzMzg8L3JkZjpsaT4gPHJkZjpsaT40NjY1Q0VENkQ0RENCQTNDODBCNTRGOEVGNjJGMDUyMjwvcmRmOmxpPiA8cmRmOmxpPjVFODhFRDQ4ODc2QkRCQTNDNkI3MTI5MkRCOUYxRkMzPC9yZGY6bGk+IDxyZGY6bGk+NzM3NUFDMEU3RTBGQzgzRURGMkYxRjJBRDhDMDI2REE8L3JkZjpsaT4gPHJkZjpsaT43NkQ1OUM2NkUwNUM1MDUzOUE1RjgyRkYyNERGNDUwNzwvcmRmOmxpPiA8cmRmOmxpPjc3Qzg3RDI3NUVENzg1MkIwMTY3RjlFRkEwQjQ0RDY5PC9yZGY6bGk+IDxyZGY6bGk+OTgyRjdDMjk5RUMyMTE2RDc1OUUxMjFBNDZFNTQyNDk8L3JkZjpsaT4gPHJkZjpsaT45REIxQzA1RTNGNzZCMzVDRUJGRjYxNzg5NDYxQTU2RTwvcmRmOmxpPiA8cmRmOmxpPkFCMTA3RjkyQjcwQTFFNjlFMDdBQThCQjMxODhBMTMwPC9yZGY6bGk+IDxyZGY6bGk+QkM3NzE2QjY4MEFEQzFFNzEyNTREOUEzMjk1RDUwOEM8L3JkZjpsaT4gPHJkZjpsaT5DMjM2QzdGMTBBRkM1MDAyRUE2REIwNzM0RTlDOTdCMzwvcmRmOmxpPiA8cmRmOmxpPkNDOTgyMzZFRDFBM0QzMjQyQjFERjdBMEJCNjc0ODIwPC9yZGY6bGk+IDxyZGY6bGk+Q0QyMjQ2MkVBMEZBRTlCMDcxQzE0NTY3RTgyRTYyMjM8L3JkZjpsaT4gPHJkZjpsaT5ENDM4Q0JGQkYwQjQyOTAwRkIxMzNEQkMxODYzMDAwMjwvcmRmOmxpPiA8cmRmOmxpPkU5Q0RFNkI4Njg1NTBEOUU3MUYwQjEwNzMwNjdGOUI3PC9yZGY6bGk+IDxyZGY6bGk+RUZCMjg2NjJFNkY2NzQwRTNEOTdDMEVCQTNCNDU3MzE8L3JkZjpsaT4gPHJkZjpsaT5GREYwNDZFMUEyQTcxOERENzlGQjA1MDgzRkM0MjNDNDwvcmRmOmxpPiA8cmRmOmxpPmFkb2JlOmRvY2lkOnBob3Rvc2hvcDoxZGZmZjVjYy0yNDA1LTExNzgtOTM5OC1lOWU2MmRhYjA1YmY8L3JkZjpsaT4gPHJkZjpsaT5hZG9iZTpkb2NpZDpwaG90b3Nob3A6MmJlOWVhMGQtZjk5OC0xMWU2LWFlNWMtYzM0MmY3ZmVlYThkPC9yZGY6bGk+IDxyZGY6bGk+YWRvYmU6ZG9jaWQ6cGhvdG9zaG9wOjZjNTEzZDdjLTk1ZDYtMTE3OC05MmYxLTgyOThiNzI0YzU4YTwvcmRmOmxpPiA8cmRmOmxpPmFkb2JlOmRvY2lkOnBob3Rvc2hvcDo3MjlmOGY0YS05YzFhLTExZTYtYjgwYy05MzVmM2QzN2QwNDU8L3JkZjpsaT4gPHJkZjpsaT5hZG9iZTpkb2NpZDpwaG90b3Nob3A6YTU4MGRiNjAtMmFkYy0xMTc4LWE4OGUtYzRjNzBhMjA3MDRkPC9yZGY6bGk+IDxyZGY6bGk+YWRvYmU6ZG9jaWQ6cGhvdG9zaG9wOmIyOGIzMzRjLTM5MzctMTE3OC1iNzhkLWUyZGNmNGUyMWYyMjwvcmRmOmxpPiA8cmRmOmxpPmFkb2JlOmRvY2lkOnBob3Rvc2hvcDpmZDE5OWE5Mi04MjY4LTExNzktOTRhNi1hNDNlYTU0MWU0OTU8L3JkZjpsaT4gPHJkZjpsaT51dWlkOjFCNkQ0NDY1NTExMURFMTFCQjkwOTgzNTkzODFBREUwPC9yZGY6bGk+IDxyZGY6bGk+dXVpZDoxREI5QjBGNUQyQTRFMTExQUZCQkM5MjBENTM3NTIyNzwvcmRmOmxpPiA8cmRmOmxpPnV1aWQ6NEQ0NTc3NkM4RTUyREUxMUI3M0ZDQURFQzFFMDVBMDU8L3JkZjpsaT4gPHJkZjpsaT51dWlkOjZCNzQ4ODc4MjY1QkRFMTFCM0IzRjEwMjczMkEzMEMxPC9yZGY6bGk+IDxyZGY6bGk+eG1wLmRpZDoxYTY1ZjU2NS0wZTRhLTQ5MTQtOWFiOS1iNDBiM2Y0NjE3OTM8L3JkZjpsaT4gPHJkZjpsaT54bXAuZGlkOjM1QjNEMDAyRjlBNjExRTZCNEY1OUZEQjhGRDk4Mjg2PC9yZGY6bGk+IDxyZGY6bGk+eG1wLmRpZDo2MzU3NjgyOS05MDY1LTQ4MmEtYTU2Mi1lYjE2N2Q1YzNmNjg8L3JkZjpsaT4gPHJkZjpsaT54bXAuZGlkOjY3MzI5ZTJlLWI4NmMtNGY0Mi1iYjhjLTRlNWVjOGI0MzExMDwvcmRmOmxpPiA8cmRmOmxpPnhtcC5kaWQ6N2Q5YWJjNjQtMzMzNC00YWVhLTgyZmUtYzMyOThiNjNjMDc1PC9yZGY6bGk+IDxyZGY6bGk+eG1wLmRpZDo4MTlGQ0RBMEU3QTUxMUU2QTJDNzgyQzEzMTkwQkQwMjwvcmRmOmxpPiA8cmRmOmxpPnhtcC5kaWQ6OTZhYWQ1MjEtMjFjMC0wMDQ1LTg4NGQtOTU0ODJjMWNlZTEzPC9yZGY6bGk+IDxyZGY6bGk+eG1wLmRpZDplYzE4Y2Q0Yi0yMDBjLTRkMDEtYmI2OC1jMTY0MjgyZWI3ODk8L3JkZjpsaT4gPC9yZGY6QmFnPiA8L3Bob3Rvc2hvcDpEb2N1bWVudEFuY2VzdG9ycz4gPHhtcE1NOkhpc3Rvcnk+IDxyZGY6U2VxPiA8cmRmOmxpIHN0RXZ0OmFjdGlvbj0iY3JlYXRlZCIgc3RFdnQ6aW5zdGFuY2VJRD0ieG1wLmlpZDo5NmFhZDUyMS0yMWMwLTAwNDUtODg0ZC05NTQ4MmMxY2VlMTMiIHN0RXZ0OndoZW49IjIwMTctMDItMTVUMTA6MDg6MTIrMDE6MDAiIHN0RXZ0OnNvZnR3YXJlQWdlbnQ9IkFkb2JlIFBob3Rvc2hvcCBDQyAyMDE3IChXaW5kb3dzKSIvPiA8cmRmOmxpIHN0RXZ0OmFjdGlvbj0ic2F2ZWQiIHN0RXZ0Omluc3RhbmNlSUQ9InhtcC5paWQ6MDdhMTExMWUtMGU4YS00NTRlLTk3YzAtMjJlYzllZTYwYjhjIiBzdEV2dDp3aGVuPSIyMDE3LTAyLTE1VDE0OjI5OjI5KzAxOjAwIiBzdEV2dDpzb2Z0d2FyZUFnZW50PSJBZG9iZSBQaG90b3Nob3AgQ0MgMjAxNyAoV2luZG93cykiIHN0RXZ0OmNoYW5nZWQ9Ii8iLz4gPHJkZjpsaSBzdEV2dDphY3Rpb249InNhdmVkIiBzdEV2dDppbnN0YW5jZUlEPSJ4bXAuaWlkOjdmYjUyMTQ1LWViZWMtY2I0OC05OTg2LTdlYjBhODIxYWI1MCIgc3RFdnQ6d2hlbj0iMjAxNy0xMi0xOFQwOTowMTozNCswMTowMCIgc3RFdnQ6c29mdHdhcmVBZ2VudD0iQWRvYmUgUGhvdG9zaG9wIENDIDIwMTcgKFdpbmRvd3MpIiBzdEV2dDpjaGFuZ2VkPSIvIi8+IDxyZGY6bGkgc3RFdnQ6YWN0aW9uPSJjb252ZXJ0ZWQiIHN0RXZ0OnBhcmFtZXRlcnM9ImZyb20gYXBwbGljYXRpb24vdm5kLmFkb2JlLnBob3Rvc2hvcCB0byBpbWFnZS9qcGVnIi8+IDxyZGY6bGkgc3RFdnQ6YWN0aW9uPSJkZXJpdmVkIiBzdEV2dDpwYXJhbWV0ZXJzPSJjb252ZXJ0ZWQgZnJvbSBhcHBsaWNhdGlvbi92bmQuYWRvYmUucGhvdG9zaG9wIHRvIGltYWdlL2pwZWciLz4gPHJkZjpsaSBzdEV2dDphY3Rpb249InNhdmVkIiBzdEV2dDppbnN0YW5jZUlEPSJ4bXAuaWlkOmFkMTI2Y2I2LTU3MTMtY2U0MC1hYjYwLWFkNDcwMWRlN2M4YSIgc3RFdnQ6d2hlbj0iMjAxNy0xMi0xOFQwOTowMTozNCswMTowMCIgc3RFdnQ6c29mdHdhcmVBZ2VudD0iQWRvYmUgUGhvdG9zaG9wIENDIDIwMTcgKFdpbmRvd3MpIiBzdEV2dDpjaGFuZ2VkPSIvIi8+IDwvcmRmOlNlcT4gPC94bXBNTTpIaXN0b3J5PiA8eG1wTU06RGVyaXZlZEZyb20gc3RSZWY6aW5zdGFuY2VJRD0ieG1wLmlpZDo3ZmI1MjE0NS1lYmVjLWNiNDgtOTk4Ni03ZWIwYTgyMWFiNTAiIHN0UmVmOmRvY3VtZW50SUQ9InhtcC5kaWQ6OTZhYWQ1MjEtMjFjMC0wMDQ1LTg4NGQtOTU0ODJjMWNlZTEzIiBzdFJlZjpvcmlnaW5hbERvY3VtZW50SUQ9InhtcC5kaWQ6OTZhYWQ1MjEtMjFjMC0wMDQ1LTg4NGQtOTU0ODJjMWNlZTEzIi8+IDwvcmRmOkRlc2NyaXB0aW9uPiA8L3JkZjpSREY+IDwveDp4bXBtZXRhPiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIDw/eHBhY2tldCBlbmQ9InciPz7/7gAOQWRvYmUAZEAAAAAB/9sAhAABAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAgEBAQEBAQICAgICAgICAgICAgICAwMDAwMDAwMDAwMDAwMDAQEBAQEBAQIBAQIDAgICAwMDAwMDAwMDAwMD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', '60371949cea7db60dd3e3bb78f012ce8.jpg', 0, '2020-05-17 14:42:52', 1, '0000-00-00 00:00:00', NULL, '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `rating_info`
--

CREATE TABLE `rating_info` (
  `user_id` varchar(255) NOT NULL,
  `post_id` int(11) NOT NULL,
  `rating_action` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rating_info`
--

INSERT INTO `rating_info` (`user_id`, `post_id`, `rating_action`) VALUES
('117.193.183.78', 12, 'like'),
('', 9, 'dislike'),
('', 15, 'dislike'),
('', 13, 'like'),
('', 14, 'like'),
('', 35, 'dislike'),
('', 18, 'dislike'),
('157.50.23.231', 9, 'like'),
('157.50.23.231', 12, 'like'),
('157.50.12.182', 12, 'dislike');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `name` varchar(255) DEFAULT NULL,
  `contact_no` varchar(255) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `content` text,
  `image` varchar(255) DEFAULT NULL,
  `active` int(11) DEFAULT NULL,
  `token` varchar(255) DEFAULT NULL,
  `token_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `views` int(11) DEFAULT '0',
  `posts_pub` int(11) DEFAULT '0',
  `posts_unpub` int(11) DEFAULT '0',
  `dislikes` int(11) DEFAULT '0',
  `likes` int(11) DEFAULT '0',
  `avg_views` int(11) DEFAULT '0',
  `rank` int(11) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `created_at`, `name`, `contact_no`, `updated_at`, `content`, `image`, `active`, `token`, `token_time`, `views`, `posts_pub`, `posts_unpub`, `dislikes`, `likes`, `avg_views`, `rank`) VALUES
(1, 'thanigai', 'thanigai@gmail.com', '123456', '2020-05-16 09:00:29', NULL, NULL, '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'thani', 'a@s.com', '123', '2020-05-17 06:02:55', NULL, NULL, '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'arul', 'arul@gmau.com', '123', '2020-05-17 06:06:11', NULL, NULL, '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'arul', 'arul@g.com', '123', '2020-05-17 06:06:28', NULL, NULL, '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 'arul', 'arul@g.com', '123', '2020-05-17 06:09:14', NULL, NULL, '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 'arul', 'arul@g.com', '123', '2020-05-17 06:10:40', NULL, NULL, '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 'poulsen', 'poulsen@gmail.com', '123', '2020-05-17 06:11:09', NULL, NULL, '2020-06-13 05:24:36', NULL, NULL, NULL, '', '2020-06-13 05:29:36', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 'poulsen', 'poulsen@gmail.com', '123', '2020-05-17 06:30:22', NULL, NULL, '2020-06-13 05:24:36', NULL, NULL, NULL, '', '2020-06-13 05:29:36', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, 'a', 'a@s.com', '123', '2020-05-17 09:24:22', NULL, NULL, '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, 'aswath', 'asw@gmail.com', '123', '2020-05-17 09:30:57', NULL, NULL, '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, 'aru', 'aru@s.com', '123', '2020-05-17 11:45:49', 'arun', '1234567899', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12, 'thanigai', 'ret@gmail.com', '202cb962ac59075b964b07152d234b70', '2020-05-17 11:52:32', 'rebic', '1234567890', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(13, 'thanigai', '1@s.com', '202cb962ac59075b964b07152d234b70', '2020-05-17 11:56:52', 'tha', '1234567890', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(14, 'thanigai', 'wer@s.com', '202cb962ac59075b964b07152d234b70', '2020-05-17 11:58:17', 'sadf', '1234567890', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(15, 'thanigai', 'wer@s.com', '202cb962ac59075b964b07152d234b70', '2020-05-17 11:58:37', 'sadf', '1234567890', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(16, 'thanigai', 'w@s.com', '202cb962ac59075b964b07152d234b70', '2020-05-17 12:00:56', 'taf', '1234567890', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(17, 'thanigai', 'aw@s.com', '202cb962ac59075b964b07152d234b70', '2020-05-17 12:01:16', 'tht', '1234567890', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(18, 'THAN', 'TA', '202cb962ac59075b964b07152d234b70', '2020-05-17 12:05:38', 'THAN', '123', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(19, 'qwew', 'q@s.com', '202cb962ac59075b964b07152d234b70', '2020-05-17 12:16:15', 'rerer', '1234567890', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(20, 'umang', 'umang554@gmail.com', '43cdd94a027a22a1071993ab042b1311', '2020-05-17 14:34:48', 'umang', '7598769014', '2020-06-21 13:09:31', NULL, NULL, NULL, 'f3099d40d4', '2020-06-21 13:14:31', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(21, 'thanigai7', 'thaanigaai@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '2020-05-18 05:04:11', 'Thanigai', '9176971562', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(22, 'ram', 'ram@gmailc.om', ' 289dff07669d7a23de0ef88d2f7129e7', '2020-05-18 06:57:44', 'ram', '1234567890', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(23, 'jeej', 'jeje@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '2020-05-18 16:03:36', 'Jeje', '1234567890', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(24, 'teja', 'teja@gmail.com', ' 289dff07669d7a23de0ef88d2f7129e7', '2020-05-18 16:08:04', 'teja', '1234567890', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(25, 'raj', 'raj@w.com', ' 81dc9bdb52d04dc20036dbd8313ed055', '2020-05-18 16:21:35', 'raj', '1234567890', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26, 'shan', 'shan@g.com', '3e119ab537d3c4cc0c31b9277bfd785e', '2020-05-18 16:27:32', 'shan', '9176971562', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(27, 'ravel', 'ra@s.com', 'ravelm', '2020-05-18 16:29:08', 'ravel', '1234567890', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(28, 'kodi', 'ko@g.com', '1', '2020-05-18 16:35:42', 'kodi', '1234567890', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(29, 'sam', 'sam@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '2020-05-18 16:40:31', 'sam', '1234567890', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(30, 'james', 'james@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '2020-05-20 16:45:18', 'James', '9176971562', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(31, 'henry', 'henry@gmail.com', '202cb962ac59075b964b07152d234b70', '2020-05-21 17:25:32', 'henry', '9176971562', '2020-07-09 13:37:18', '<p>I am good at writing.I love to code.I am interested in gaming.</p>', 'b70668836b04679c51b27306d134dbbc.jpg', 1, '6c9d7e5d11', '2020-07-09 04:35:08', 469, 8, 4, 5, 5, 58, 1),
(32, 'zumaka_zoo', 'gopiravady@gmail.com', 'ace16ad789b6c0bca9e4e222bedef144', '2020-05-23 05:24:34', 'Gopi ', '6789012345', '2020-06-13 06:32:10', NULL, NULL, 1, '03b5b75c76473b568baa36ee90f197ea', '2020-06-13 06:37:10', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(33, 'Jose', 'thanigaiarasu07@gmail.com', '202cb962ac59075b964b07152d234b70', '2020-05-29 16:25:23', 'Jose', '9176971562', '2020-05-29 16:25:23', NULL, NULL, 1, NULL, '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(36, 'aru;', 'thanigaiarulR@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '2020-06-08 05:26:34', 'Arul', '9176971562', '2020-06-14 02:17:45', NULL, NULL, 1, 'fd7e222d3a', '2020-06-14 02:22:45', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(35, 'Zumaka', 'gopi2605@gmail.com', '1a81e363ee48a6039a6ed9f549b3a9c3', '2020-05-31 16:23:02', 'Gopi Shankar', '7904167782', '2020-06-13 12:51:05', NULL, NULL, 1, '3a78f2d91565fa817dd75d25cdc3d018', '2020-06-13 12:56:05', NULL, NULL, NULL, NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `rating_info`
--
ALTER TABLE `rating_info`
  ADD UNIQUE KEY `UC_rating_info` (`user_id`,`post_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
