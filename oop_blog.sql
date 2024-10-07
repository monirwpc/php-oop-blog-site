-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 12, 2020 at 08:35 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `oop_blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `name`) VALUES
(1, 'JAVA'),
(2, 'PHP'),
(3, 'HTML'),
(4, 'CSS'),
(5, 'Football'),
(6, ''),
(7, '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contact`
--

CREATE TABLE `tbl_contact` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_contact`
--

INSERT INTO `tbl_contact` (`id`, `firstname`, `lastname`, `email`, `message`, `status`, `date`) VALUES
(1, 'Monirul', 'Islam', 'monirul@gmail.com', 'Messages text will be go here.Sidebar text will be go here.', 0, '2020-10-25 18:36:16'),
(2, 'Sondip', 'Biswas', 'biswas@gmail.com', 'Sidebar text will be go here.Sidebar text will be go here.Sidebar text will be go here.Sidebar text will be go here.', 1, '2020-10-27 17:27:41'),
(3, 'Monir New', 'Islam', 'monirul7530@gmail.com', 'Hello world..', 0, '2020-11-12 15:44:24');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_options`
--

CREATE TABLE `tbl_options` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slogan` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `themes` varchar(255) NOT NULL,
  `facebook_url` varchar(255) NOT NULL,
  `twitter_url` varchar(255) NOT NULL,
  `google_url` varchar(255) NOT NULL,
  `linkedin_url` varchar(255) NOT NULL,
  `copyright` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_options`
--

INSERT INTO `tbl_options` (`id`, `title`, `slogan`, `logo`, `themes`, `facebook_url`, `twitter_url`, `google_url`, `linkedin_url`, `copyright`) VALUES
(1, 'Monir Blogs', 'Sample php, wordpress, laravel learning.', 'logo.png', 'green', 'https://www.facebook.com', 'https://www.twitter.com', 'https://www.google.com', 'https://www.linkedin.com', 'Copyright Monirul Islam.');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_page`
--

CREATE TABLE `tbl_page` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_page`
--

INSERT INTO `tbl_page` (`id`, `title`, `body`) VALUES
(1, 'About US', '<p>About us Page, Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is thought to have scrambled parts of Cicero\'s De Finibus Bonorum et Malorum for use in a type specimen book.</p>\r\n<p>Java Post, Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web&nbsp;</p>\r\n<p>ava Post, Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is thought to have scrambled parts of Cicero\'s De Finibus Bonorum et Malorum for use in a type specimen book.</p>\r\n<p>Java Post, Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web...</p>\r\n<p>&nbsp;</p>\r\n<p>ava Post, Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is thought to have scrambled parts of Cicero\'s De Finibus Bonorum et Malorum for use in a type specimen book.</p>\r\n<p>Java Post, Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web...</p>\r\n<p>ava Post, Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is thought to have scrambled parts of Cicero\'s De Finibus Bonorum et Malorum for use in a type specimen book.</p>\r\n<p>Java Post, Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web...</p>'),
(3, 'Privacy Policy', '<p>Privacy Policy.&nbsp;In publishing and graphic design,&nbsp;Lorem&nbsp;ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relyingPrivacy Policy.&nbsp;In publishing and graphic design,&nbsp;Lorem&nbsp;ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relyingPrivacy Policy.&nbsp;In publishing and graphic design,&nbsp;Lorem&nbsp;ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relyingPrivacy Policy.&nbsp;In publishing and graphic design,&nbsp;Lorem&nbsp;ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relyingPrivacy Policy.&nbsp;In publishing and graphic design,&nbsp;Lorem&nbsp;ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relyingPrivacy Policy.&nbsp;In publishing and graphic design,&nbsp;Lorem&nbsp;ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relyingPrivacy Policy.&nbsp;In publishing and graphic design,&nbsp;Lorem&nbsp;ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relyingPrivacy Policy.&nbsp;In publishing and graphic design,&nbsp;Lorem&nbsp;ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying</p>\r\n<p>&nbsp;</p>\r\n<p>Privacy Policy.&nbsp;In publishing and graphic design,&nbsp;Lorem&nbsp;ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relyingPrivacy Policy.&nbsp;In publishing and graphic design,&nbsp;Lorem&nbsp;ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relyingPrivacy Policy.&nbsp;In publishing and graphic design,&nbsp;Lorem&nbsp;ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relyingPrivacy Policy.&nbsp;In publishing and graphic design,&nbsp;Lorem&nbsp;ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relyingPrivacy Policy.&nbsp;In publishing and graphic design,&nbsp;Lorem&nbsp;ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying</p>\r\n<p>&nbsp;</p>\r\n<p>Privacy Policy.&nbsp;In publishing and graphic design,&nbsp;Lorem&nbsp;ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relyingPrivacy Policy.&nbsp;In publishing and graphic design,&nbsp;Lorem&nbsp;ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relyingPrivacy Policy.&nbsp;In publishing and graphic design,&nbsp;Lorem&nbsp;ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relyingPrivacy Policy.&nbsp;In publishing and graphic design,&nbsp;Lorem&nbsp;ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relyingPrivacy Policy.&nbsp;In publishing and graphic design,&nbsp;Lorem&nbsp;ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relyingPrivacy Policy.&nbsp;In publishing and graphic design,&nbsp;Lorem&nbsp;ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relyingPrivacy Policy.&nbsp;In publishing and graphic design,&nbsp;Lorem&nbsp;ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying</p>');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_post`
--

CREATE TABLE `tbl_post` (
  `id` int(11) NOT NULL,
  `cat` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `author` varchar(50) NOT NULL,
  `tags` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_post`
--

INSERT INTO `tbl_post` (`id`, `cat`, `userid`, `title`, `body`, `image`, `author`, `tags`, `date`) VALUES
(7, 1, 1, 'Java Post', '<p>Java Post, Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is thought to have scrambled parts of Cicero\'s De Finibus Bonorum et Malorum for use in a type specimen book.</p>\r\n<p>Java Post, Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs.</p>\r\n<p>Java Post, Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is thought to have scrambled parts of Cicero\'s De Finibus Bonorum et Malorum for use in a type specimen book.</p>\r\n<p>Java Post, Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs.</p>\r\n<p>Java Post, Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is thought to have scrambled parts of Cicero\'s De Finibus Bonorum et Malorum for use in a type specimen book.</p>\r\n<p>Java Post, Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs.</p>\r\n<p>Java Post, Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is thought to have scrambled parts of Cicero\'s De Finibus Bonorum et Malorum for use in a type specimen book.</p>\r\n<p>Java Post, Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs.</p>\r\n<p>Java Post, Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is thought to have scrambled parts of Cicero\'s De Finibus Bonorum et Malorum for use in a type specimen book.</p>\r\n<p>Java Post, Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs.</p>\r\n<p>Java Post, Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is thought to have scrambled parts of Cicero\'s De Finibus Bonorum et Malorum for use in a type specimen book.</p>\r\n<p>Java Post, Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs.</p>\r\n<p>Java Post, Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is thought to have scrambled parts of Cicero\'s De Finibus Bonorum et Malorum for use in a type specimen book.</p>\r\n<p>Java Post, Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs.</p>\r\n<p>Java Post, Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is thought to have scrambled parts of Cicero\'s De Finibus Bonorum et Malorum for use in a type specimen book.</p>\r\n<p>Java Post, Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs.</p>\r\n<p>Java Post, Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is thought to have scrambled parts of Cicero\'s De Finibus Bonorum et Malorum for use in a type specimen book.</p>\r\n<p>Java Post, Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs.</p>\r\n<p>Java Post, Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is thought to have scrambled parts of Cicero\'s De Finibus Bonorum et Malorum for use in a type specimen book.</p>\r\n<p>Java Post, Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs.</p>', '6631ad1fe157.png', 'Monir', 'Java, Programming', '2020-10-20 19:28:30'),
(8, 2, 1, 'PHP Post', '<p>ava Post, Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is thought to have scrambled parts of Cicero\'s De Finibus Bonorum et Malorum for use in a type specimen book.</p>\r\n<p>Java Post, Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic</p>\r\n<p>ava Post, Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is thought to have scrambled parts of Cicero\'s De Finibus Bonorum et Malorum for use in a type specimen book.</p>\r\n<p>Java Post, Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic</p>\r\n<p>ava Post, Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is thought to have scrambled parts of Cicero\'s De Finibus Bonorum et Malorum for use in a type specimen book.</p>\r\n<p>Java Post, Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic</p>\r\n<p>ava Post, Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is thought to have scrambled parts of Cicero\'s De Finibus Bonorum et Malorum for use in a type specimen book.</p>\r\n<p>Java Post, Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic</p>\r\n<p>ava Post, Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is thought to have scrambled parts of Cicero\'s De Finibus Bonorum et Malorum for use in a type specimen book.</p>\r\n<p>Java Post, Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic</p>\r\n<p>ava Post, Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is thought to have scrambled parts of Cicero\'s De Finibus Bonorum et Malorum for use in a type specimen book.</p>\r\n<p>Java Post, Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic</p>\r\n<p>ava Post, Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is thought to have scrambled parts of Cicero\'s De Finibus Bonorum et Malorum for use in a type specimen book.</p>\r\n<p>Java Post, Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic</p>', 'daf9990b0f37.jpg', 'Monir', 'PHP', '2020-10-21 16:43:40'),
(10, 4, 2, 'Author Test Post', '<p>dfdfdfd</p>', '99059b0e4de8.jpg', 'author', 'PHP', '2020-11-02 18:55:23');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_slider`
--

CREATE TABLE `tbl_slider` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_slider`
--

INSERT INTO `tbl_slider` (`id`, `title`, `image`, `date`) VALUES
(2, 'Slider Item 1', '8c3b460b1009.jpg', '2020-11-10 18:45:16'),
(3, 'Slider Item 2', '07bd05ae437b.jpg', '2020-11-10 18:45:46'),
(4, 'Slider Item 3', 'c37f9768a62e.jpg', '2020-11-10 18:45:55'),
(5, 'Slider Item 4', 'c89061147b0b.jpg', '2020-11-10 18:46:07');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(32) NOT NULL,
  `email` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `name`, `username`, `password`, `email`, `description`, `role`) VALUES
(2, 'Monirul Islam', 'admincp', '31b5d7b1a473763500b9b0d66e1a63c2', 'monir@gmail.com', '<p>Hello, I am Monir. Java Post, Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is thought to have scrambled parts of Cicero\'s De Finibus Bonorum et Malorum for use in a type specimen book. Java Post, Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web</p>', 1),
(13, 'New User', 'newuser', '0354d89c28ec399c00d3cb2d094cf093', 'newuser@gmail.com', '', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_options`
--
ALTER TABLE `tbl_options`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_page`
--
ALTER TABLE `tbl_page`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_post`
--
ALTER TABLE `tbl_post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_slider`
--
ALTER TABLE `tbl_slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_options`
--
ALTER TABLE `tbl_options`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_page`
--
ALTER TABLE `tbl_page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_post`
--
ALTER TABLE `tbl_post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_slider`
--
ALTER TABLE `tbl_slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
