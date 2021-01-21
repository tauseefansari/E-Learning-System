-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 21, 2021 at 04:25 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `billingsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(120) NOT NULL,
  `username` varchar(120) NOT NULL,
  `mobile` bigint(10) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `registrationDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `username`, `mobile`, `email`, `password`, `registrationDate`) VALUES
(1, 'Tauseef', 'admin', 9321391048, 'tauseeftanvir@gmail.com', '21232f297a57a5a743894a0e4a801fc3', '2020-09-17 09:57:52');

-- --------------------------------------------------------

--
-- Table structure for table `appliedcourses`
--

CREATE TABLE `appliedcourses` (
  `id` int(11) NOT NULL,
  `studentId` int(11) NOT NULL,
  `courseId` int(11) NOT NULL,
  `progress` int(11) NOT NULL DEFAULT 0,
  `joiningDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `certificate` varchar(255) NOT NULL DEFAULT 'No'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appliedcourses`
--

INSERT INTO `appliedcourses` (`id`, `studentId`, `courseId`, `progress`, `joiningDate`, `certificate`) VALUES
(1, 3, 1, 0, '2020-12-24 06:57:09', 'No'),
(2, 3, 4, 0, '2020-12-24 06:57:09', 'No'),
(7, 1, 10, 0, '2020-12-24 06:59:27', 'No'),
(8, 1, 11, 0, '2020-12-24 06:59:27', 'No'),
(9, 1, 14, 100, '2020-12-24 06:59:27', 'Certificate_Tauseef Ansari_React JS.pdf'),
(10, 1, 18, 0, '2020-12-24 06:59:27', 'No'),
(15, 5, 1, 0, '2020-12-24 07:12:04', 'No'),
(16, 5, 2, 0, '2020-12-24 07:12:04', 'No'),
(17, 5, 4, 0, '2020-12-24 07:12:04', 'No'),
(31, 2, 8, 0, '2020-12-24 07:24:05', 'No'),
(33, 2, 10, 0, '2020-12-24 07:24:05', 'No'),
(34, 2, 11, 0, '2020-12-24 07:24:05', 'No'),
(36, 2, 13, 0, '2020-12-24 07:24:05', 'No'),
(37, 2, 14, 0, '2020-12-24 07:24:05', 'No'),
(38, 2, 15, 0, '2020-12-24 07:24:06', 'No'),
(39, 2, 18, 0, '2020-12-24 07:24:06', 'No'),
(40, 2, 19, 0, '2020-12-24 07:24:06', 'No'),
(41, 2, 20, 0, '2020-12-24 07:24:06', 'No'),
(42, 2, 21, 0, '2020-12-24 07:24:06', 'No'),
(45, 3, 2, 0, '2020-12-24 07:26:57', 'No'),
(46, 3, 6, 0, '2020-12-24 07:26:57', 'No'),
(47, 0, 0, 0, '2020-12-25 11:48:38', 'No'),
(48, 1, 5, 0, '2020-12-28 06:07:41', 'No');

-- --------------------------------------------------------

--
-- Table structure for table `coursecontent`
--

CREATE TABLE `coursecontent` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `courseid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `coursecontent`
--

INSERT INTO `coursecontent` (`id`, `title`, `description`, `courseid`) VALUES
(4, 'My Content 1', '<p>Hello User</p>\n<p>This is just for Test</p>', 5),
(6, 'Basics of Java', '<ol>\n<li><span style=\"font-size: 18pt;\">Basic of OOPS</span></li>\n<li><span style=\"font-size: 18pt;\">Classes &amp; Objects</span></li>\n<li><span style=\"font-size: 18pt;\">Understanding Packages</span></li>\n<li><span style=\"font-size: 18pt;\">Coding Practice</span></li>\n</ol>', 5),
(7, 'Description', '<p>programming language</p>', 14);

-- --------------------------------------------------------

--
-- Table structure for table `coursefiles`
--

CREATE TABLE `coursefiles` (
  `id` int(11) NOT NULL,
  `contentid` int(11) NOT NULL,
  `filename` varchar(255) NOT NULL,
  `size` varchar(50) NOT NULL,
  `uploaded_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `coursefiles`
--

INSERT INTO `coursefiles` (`id`, `contentid`, `filename`, `size`, `uploaded_on`) VALUES
(35, 1, 'Palind.py', '850 B', '2020-10-23 16:12:47'),
(36, 4, 'FillCube.py', '820 B', '2020-10-23 16:14:08'),
(37, 4, 'GoldIgnot.py', '926 B', '2020-10-23 16:15:49'),
(48, 7, '2018-01-26-13-31-24-272.jpg', '294,8 KB', '2020-12-24 15:02:11'),
(49, 7, 'GoldIgnot.java', '866 B', '2020-12-24 15:02:11'),
(50, 7, '2018-06-17-16-17-30-701.jpg', '794,29 KB', '2020-12-24 15:02:11'),
(51, 7, 'Palind.py', '850 B', '2020-12-24 15:02:12'),
(52, 7, 'Intro.mp4', '5,35 MB', '2020-12-24 15:02:13');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `name` varchar(120) NOT NULL,
  `domain` varchar(100) NOT NULL,
  `creationDate` date NOT NULL DEFAULT current_timestamp(),
  `profilePic` varchar(255) NOT NULL,
  `objective` text NOT NULL,
  `description` text NOT NULL,
  `takenBy` varchar(120) NOT NULL,
  `price` bigint(20) NOT NULL,
  `badge` varchar(255) NOT NULL,
  `duration` tinyint(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `name`, `domain`, `creationDate`, `profilePic`, `objective`, `description`, `takenBy`, `price`, `badge`, `duration`) VALUES
(1, 'Visual Basic', 'Web Development', '2020-09-21', 'b147a402e79827665de44d50fccb64ba1600444834.png1600699839.png', 'N.A', 'N.A', 'Zakiya Khan', 6999, '<span class=\'badge badge-primary mb-2\'>Bestseller</span>', 6),
(2, 'Artificial Intelligence', 'AI', '2020-09-18', 'e8141112d96ba29618ff393f8f80268f1600438181.png', 'To be an AI Expert', 'No Description is added', 'Hamza Chowdhury', 8999, '<span class=\'badge badge-danger mb-2\'>New</span>', 5),
(3, 'Machine Learning', 'ML', '2020-09-19', '3dec148c473b533b95877611059ccb281600520255.png', 'Not Decided', 'Not Available', 'Hamza Chowdhury', 5699, '<span class=\'badge grey mb-2\'>Best Rated</span>', 6),
(4, 'Python Programming', 'Programming', '2020-09-19', '5a933b5a20f056ab2e4714c418e45ca51600520342.jpg', 'Not Defined', 'N.A', 'Zakiya Khan', 7999, '<span class=\'badge badge-warning mb-2\'>Top Demand</span>', 3),
(5, 'Android Programming', 'Programming', '2020-09-19', '5981eae46f1e9ae2456db4ee7bb746d31600520440.png', 'N.A', 'N.A', 'Tauseef Ansari', 3999, '<span class=\'badge badge-success mb-2\'>Sale</span>', 4),
(6, 'Database', 'Web Development', '2020-09-19', '5ad1fcbef890522c24d64d073644c9941600520489.jpg', 'N.A', 'N.A', 'Zakiya Khan', 4699, '<span class=\'badge badge-danger mb-2\'>New</span>', 2),
(7, 'C Programming', 'Programming', '2020-09-19', '9fd5c2bebbcfd8930a8a2383c62b1b721600520541.jpg', 'N.A', 'N.A', 'Mohsin Essani', 5699, '<span class=\'badge badge-primary mb-2\'>Bestseller</span>', 3),
(8, 'JavaScript', 'Web Development', '2020-09-19', '734279874cdca45f01c5b2b531297bae1600520599.jpg', 'N.A', 'N.A', 'Mohsin Essani', 7999, '<span class=\'badge badge-warning mb-2\'>Top Demand</span>', 5),
(9, 'C Sharp Programming', 'Programming', '2020-09-19', 'eb923a152dfd21019417ec40cd377e951600520660.jpg', 'N.A', 'N.A', 'Zakiya Khan', 8999, '<span class=\'badge grey mb-2\'>Best Rated</span>', 6),
(10, 'Java Programming', 'Programming', '2020-09-19', '369d816601a57f39f4984780d02f41511600524440.jpg', 'N.A', 'N.A', 'Tauseef Ansari', 8999, '<span class=\'badge badge-primary mb-2\'>Bestseller</span>', 4),
(11, 'Cloud Computing', 'Others', '2020-09-21', 'cloud computing.jpg1600687130.jpg', 'N.A', 'N.A', 'Zakiya Khan', 6499, '<span class=\'badge badge-primary mb-2\'>Bestseller</span>', 4),
(12, 'Vue JS', 'Web Development', '2020-09-21', 'vue.png1600687762.png', 'N.A', 'N.A', 'Zakiya Khan', 6599, '<span class=\'badge badge-primary mb-2\'>Bestseller</span>', 4),
(13, 'Angular JS', 'Web Development', '2020-09-21', 'angular-JS-online-training-nareshit.jpg1600690657.jpg', 'N.A', 'N.A', 'Zakiya Khan', 7999, '<span class=\'badge badge-danger mb-2\'>New</span>', 6),
(14, 'React JS', 'Web Development', '2020-09-21', 'react.png1600690876.png', 'N.A', 'N.A', 'Tauseef Ansari', 3999, '<span class=\'badge badge-success mb-2\'>Sale</span>', 4),
(15, 'Node JS', 'Web Development', '2020-09-21', 'nodejs.jpeg1600699770jpeg', 'N.A', 'N.A', 'Zakiya Khan', 4699, '<span class=\'badge badge-danger mb-2\'>New</span>', 4),
(18, 'PHP Programming', 'Web Development', '2020-09-24', 'php.png1600949083.png', 'PHP is a server scripting language, and a powerful tool for making dynamic and interactive Web pages.\r\n\r\nPHP is a widely-used, free, and efficient alternative to competitors such as Microsoft\'s ASP.\r\n\r\nPHP 7 is the latest stable release.', 'PHP is an acronym for \"PHP: Hypertext Preprocessor\"\r\nPHP is a widely-used, open-source scripting language\r\nPHP scripts are executed on the server\r\nPHP is free to download and use', 'Mohsin Essani', 5999, '<span class=\'badge badge-primary mb-2\'>Bestseller</span>', 4),
(19, 'Keras', 'ML', '2020-09-24', 'keras.png1600949305.png', 'Keras is an API designed for human beings, not machines. Keras follows best practices for reducing cognitive load: it offers consistent & simple APIs, it minimizes the number of user actions required for common use cases, and it provides clear & actionable error messages. It also has extensive documentation and developer guides.', 'Keras is the most used deep learning framework among top-5 winning teams on Kaggle. Because Keras makes it easier to run new experiments, it empowers you to try more ideas than your competition, faster. And this is how you win.\r\nBuilt on top of TensorFlow 2.0, Keras is an industry-strength framework that can scale to large clusters of GPUs or an entire TPU pod. It\'s not only possible; it\'s easy.\r\nTake advantage of the full deployment capabilities of the TensorFlow platform. You can export Keras models to JavaScript to run directly in the browser, to TF Lite to run on iOS, Android, and embedded devices. It\'s also easy to serve Keras models as via a web API.', 'Hamza Chowdhury', 6999, '<span class=\'badge grey mb-2\'>Best Rated</span>', 3),
(20, 'Pandas', 'ML', '2020-09-24', 'pandas.png1600949471.png', 'A fast and efficient DataFrame object for data manipulation with integrated indexing;\r\n\r\nTools for reading and writing data between in-memory data structures and different formats: CSV and text files, Microsoft Excel, SQL databases, and the fast HDF5 format;\r\n\r\nIntelligent data alignment and integrated handling of missing data: gain automatic label-based alignment in computations and easily manipulate messy data into an orderly form;\r\n\r\nFlexible reshaping and pivoting of data sets;\r\n\r\nIntelligent label-based slicing, fancy indexing, and subsetting of large data sets;\r\n\r\nColumns can be inserted and deleted from data structures for size mutability;\r\n\r\nAggregating or transforming data with a powerful group by engine allowing split-apply-combine operations on data sets;\r\n\r\nHigh performance merging and joining of data sets;\r\n\r\nHierarchical axis indexing provides an intuitive way of working with high-dimensional data in a lower-dimensional data structure;\r\n\r\nTime series-functionality: date range generation and frequency conversion, moving window statistics, date shifting and lagging. Even create domain-specific time offsets and join time series without losing data;\r\n\r\nHighly optimized for performance, with critical code paths written in Cython or C.\r\n\r\nPython with pandas is in use in a wide variety of academic and commercial domains, including Finance, Neuroscience, Economics, Statistics, Advertising, Web Analytics, and more.', 'In computer programming, pandas is a software library written for the Python programming language for data manipulation and analysis. In particular, it offers data structures and operations for manipulating numerical tables and time series. It is free software released under the three-clause BSD license.', 'Hamza Chowdhury', 4999, '<span class=\'badge badge-warning mb-2\'>Top Demand</span>', 2),
(21, 'Tensorflow', 'ML', '2020-09-24', 'tensorflow.png1600949647.png', 'TensorFlow is an end-to-end open source platform for machine learning. It has a comprehensive, flexible ecosystem of tools, libraries and community resources that lets researchers push the state-of-the-art in ML and developers easily build and deploy ML powered applications.', 'TensorFlow is a free and open-source software library for dataflow and differentiable programming across a range of tasks. It is a symbolic math library, and is also used for machine learning applications such as neural networks.', 'Hamza Chowdhury', 4999, '<span class=\'badge badge-warning mb-2\'>Top Demand</span>', 3),
(22, 'OpenCV', 'ML', '2020-09-24', 'opencv.png1600949887.png', 'OpenCV is a library of programming functions mainly aimed at real-time computer vision. Originally developed by Intel, it was later supported by Willow Garage then Itseez. The library is cross-platform and free for use under the open-source BSD license.', 'OpenCV (Open Source Computer Vision Library) is an open source computer vision and machine learning software library. OpenCV was built to provide a common infrastructure for computer vision applications and to accelerate the use of machine perception in the commercial products. Being a BSD-licensed product, OpenCV makes it easy for businesses to utilize and modify the code.\r\n\r\nThe library has more than 2500 optimized algorithms, which includes a comprehensive set of both classic and state-of-the-art computer vision and machine learning algorithms. These algorithms can be used to detect and recognize faces, identify objects, classify human actions in videos, track camera movements, track moving objects, extract 3D models of objects, produce 3D point clouds from stereo cameras, stitch images together to produce a high resolution image of an entire scene, find similar images from an image database, remove red eyes from images taken using flash, follow eye movements, recognize scenery and establish markers to overlay it with augmented reality, etc. OpenCV has more than 47 thousand people of user community and estimated number of downloads exceeding 18 million. The library is used extensively in companies, research groups and by governmental bodies.', 'Hamza Chowdhury', 4999, '<span class=\'badge grey mb-2\'>Best Rated</span>', 2),
(23, 'Swift', 'Programming', '2020-09-24', 'swift.jpeg1600950302jpeg', 'Swift is a powerful and intuitive programming language for macOS, iOS, watchOS, tvOS and beyond. Writing Swift code is interactive and fun, the syntax is concise yet expressive, and Swift includes modern features developers love. Swift code is safe by design, yet also produces software that runs lightning-fast.', 'Swift is the result of the latest research on programming languages, combined with decades of experience building Apple platforms. Named parameters are expressed in a clean syntax that makes APIs in Swift even easier to read and maintain. Even better, you don’t even need to type semi-colons. Inferred types make code cleaner and less prone to mistakes, while modules eliminate headers and provide namespaces. To best support international languages and emoji, Strings are Unicode-correct and use a UTF-8 based encoding to optimize performance for a wide-variety of use cases. Memory is managed automatically using tight, deterministic reference counting, keeping memory usage to a minimum without the overhead of garbage collection.', 'Tauseef Ansari', 7999, '<span class=\'badge badge-warning mb-2\'>Top Demand</span>', 4);

-- --------------------------------------------------------

--
-- Table structure for table `filestatus`
--

CREATE TABLE `filestatus` (
  `id` int(11) NOT NULL,
  `studentId` int(11) NOT NULL,
  `fileId` int(11) NOT NULL,
  `complete` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `filestatus`
--

INSERT INTO `filestatus` (`id`, `studentId`, `fileId`, `complete`) VALUES
(29, 1, 48, 0),
(30, 1, 48, 1),
(31, 1, 49, 0),
(32, 1, 50, 0),
(33, 1, 51, 0),
(34, 1, 52, 0),
(35, 1, 49, 1),
(36, 1, 50, 1),
(37, 1, 51, 1),
(38, 1, 52, 1);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `studentId` int(11) NOT NULL,
  `totalPayment` bigint(50) NOT NULL,
  `paidPayment` bigint(50) NOT NULL,
  `mode` varchar(120) NOT NULL,
  `paymentDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `history` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `studentId`, `totalPayment`, `paidPayment`, `mode`, `paymentDate`, `history`) VALUES
(1, 1, 29495, 11500, 'NA', '2020-12-24 06:50:02', 'NA'),
(3, 2, 63190, 28200, 'NA', '2020-12-24 06:52:02', 'NA'),
(4, 3, 28696, 2400, 'NA', '2020-12-24 06:52:33', 'NA'),
(5, 5, 23997, 12000, 'NA', '2020-12-24 06:53:42', 'NA');

-- --------------------------------------------------------

--
-- Table structure for table `placement`
--

CREATE TABLE `placement` (
  `id` int(11) NOT NULL,
  `studentId` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `placement`
--

INSERT INTO `placement` (`id`, `studentId`, `name`) VALUES
(10, 3, 'Amazon'),
(11, 5, 'Accenture'),
(13, 0, 'Morgan Stanley'),
(14, 2, 'Google');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` int(11) NOT NULL,
  `name` varchar(120) NOT NULL,
  `profilePic` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` bigint(20) NOT NULL,
  `qualification` varchar(120) NOT NULL,
  `address` varchar(255) NOT NULL,
  `subjectTaken` varchar(120) NOT NULL,
  `joiningDate` date NOT NULL DEFAULT current_timestamp(),
  `password` varchar(255) NOT NULL,
  `disable` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `name`, `profilePic`, `email`, `mobile`, `qualification`, `address`, `subjectTaken`, `joiningDate`, `password`, `disable`) VALUES
(1, 'Tauseef Ansari', 'B612_20180617_184822_210.jpg1601905829.jpg', 'tauseeftanvir@gmail.com', 9321391048, 'Engineer', 'Mumbai Maharashtra', 'Artificial Intelligence', '2020-09-19', '543284b3413aa53934514fe0b2d6d436', 0),
(2, 'Zakiya Khan', 'b1d41e8f8ef8d551358c7b61f76993501600433094.png', 'zakiyakhan9746@gmail.com', 9876543210, 'Graduate', 'Mumbai', 'Python Programming', '2020-09-20', '85bd570b387d5cb4e982c600d7066ba9', 0),
(3, 'Mohsin Essani', '94f512a17a11048b4d473f272918efbb1600774532.jpg', 'mohsinessani@gmail.com', 9876543210, 'Engineer', 'Dongri, Mumbai', 'Node JS', '2020-09-15', 'd38509b02c3af7545dc345630382cdeb', 0),
(4, 'Hamza Chowdhury', 'ddc01577479ff46e6d42027edc5fba5c1600774634.jpg', 'hamzachowdhry@gmail.com', 9325826987, 'Engineer', 'Dongri, Abdul Rehmaan Street, Mumbai', 'Artificial Intelligence', '2019-11-02', '28936322a5eb164c9ced5a0166f93f15', 0),
(5, 'Demo Staff', 'about-bg.jpg1600957770.jpg', 'abcd@gmail.com', 9876543210, 'Graduate', 'N.A', 'Vue JS', '2020-09-26', '8bf75d25716494a5e1ae63de79db741a', 1);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `name` varchar(120) NOT NULL,
  `profilePic` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` bigint(20) NOT NULL,
  `qualification` varchar(120) NOT NULL,
  `address` varchar(255) NOT NULL,
  `joiningDate` date NOT NULL DEFAULT current_timestamp(),
  `placement` varchar(120) NOT NULL DEFAULT 'No',
  `password` varchar(255) NOT NULL,
  `disable` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `name`, `profilePic`, `email`, `mobile`, `qualification`, `address`, `joiningDate`, `placement`, `password`, `disable`) VALUES
(1, 'Tauseef Ansari', 'B612_20180127_090047.jpg1601901994.jpg', 'tauseeftanvir@gmail.com', 9321391048, 'Engineer', 'Mumbai, India', '2020-09-23', 'No', '543284b3413aa53934514fe0b2d6d436', 0),
(2, 'Zakiya Khan', 'b1d41e8f8ef8d551358c7b61f76993501600433094.png1600957089.png', 'zakiyakhan9746@gmail.com', 9876543210, 'Engineer', 'Mumbai', '2020-09-24', 'Yes', '927273d442d08db04cd67ea714c7426b', 0),
(3, 'Mohsin Essani', '94f512a17a11048b4d473f272918efbb1600774532.jpg1600957210.jpg', 'mohsinessani@gmail.com', 9967867833, 'Masters', 'Mumbai', '2020-09-24', 'Yes', 'eec00e82e35ac5a359a7e1f871a991b6', 0),
(5, 'Hamza Chowdhury', 'ddc01577479ff46e6d42027edc5fba5c1600774634.jpg1600958557.jpg', 'hamzachowdhry123@gmail.com', 1234567890, 'Masters', 'Mumbai', '2020-09-24', 'Yes', 'a60cea2beeb73f56fcd3cf8f2929db23', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appliedcourses`
--
ALTER TABLE `appliedcourses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coursecontent`
--
ALTER TABLE `coursecontent`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coursefiles`
--
ALTER TABLE `coursefiles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `filestatus`
--
ALTER TABLE `filestatus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `placement`
--
ALTER TABLE `placement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
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
-- AUTO_INCREMENT for table `appliedcourses`
--
ALTER TABLE `appliedcourses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `coursecontent`
--
ALTER TABLE `coursecontent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `coursefiles`
--
ALTER TABLE `coursefiles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `filestatus`
--
ALTER TABLE `filestatus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `placement`
--
ALTER TABLE `placement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
