-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 20, 2022 at 12:50 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `secrery`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`) VALUES
(1, 'superadmin@secrery.com', '@BCD1234');

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `blog_heading` text NOT NULL,
  `blog_description` text NOT NULL,
  `industry_id` int(10) NOT NULL,
  `company_domain_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `blog_heading`, `blog_description`, `industry_id`, `company_domain_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Things to do before leaving Microsoft', 'Folks,\n\nCan you folks tell me things to do before leaving Microsoft.\n\nHere are few things that are on top of my mind\n1. Utilize Perks+\n2. 401K max out\n3. Bright Horizons backup care hours - Do you know how to benefit from this? May be take tution hours for kids?\n4. Backup personal files from \"Onedrive -Microsoft\" (as you will lose access to 5TB)\n5. W2 and Payslip backup\n6. Personal profile backup - People talk about managepointhr , i have not gone there recently and don\'t know a way to go there. How to take backup of your profile?\n\n7. Connects backup\n8. Microsoft store - People talk about buying M365 subs, is it worth?\n9. Anything else from benefits portal? Insurance? HSA?\n10. How about linkedin Premium? I already have one active, wondering if I can buy for next year (as new fiscal year as started) ?\n11. How about microsoft alumni network, is it worth $101 per year?', 1, 1, 3, '2022-11-23 16:37:40', '2022-11-23 16:37:40'),
(2, 'FB Network Engineering Corp - Coding Round Interview Experience', 'This is a test for the update process. 2                                    ', 2, 1, 3, '2022-11-23 17:04:23', '2022-11-23 17:04:23'),
(3, 'Test Heading', 'This is the post from a user who is not under any company.', 4, 0, 11, '2022-12-11 12:08:20', '2022-12-11 12:08:20');

-- --------------------------------------------------------

--
-- Table structure for table `blog_comment`
--

CREATE TABLE `blog_comment` (
  `id` int(11) NOT NULL,
  `user_id` int(10) NOT NULL,
  `blog_id` int(10) NOT NULL,
  `comment` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blog_comment`
--

INSERT INTO `blog_comment` (`id`, `user_id`, `blog_id`, `comment`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Nice Job!', '2022-11-23 17:04:37', '2022-11-23 17:04:37'),
(2, 11, 3, 'Hello', '2022-12-14 11:12:53', '2022-12-14 11:12:53'),
(3, 11, 3, 'Second Comment', '2022-12-14 11:14:52', '2022-12-14 11:14:52'),
(4, 11, 1, 'Second Comment', '2022-12-14 11:14:52', '2022-12-14 11:14:52'),
(5, 11, 1, 'Second Comment', '2022-12-14 11:14:52', '2022-12-14 11:14:52');

-- --------------------------------------------------------

--
-- Table structure for table `chanel_post`
--

CREATE TABLE `chanel_post` (
  `id` int(11) NOT NULL,
  `blog_heading` text NOT NULL,
  `blog_description` text NOT NULL,
  `industry_id` int(10) NOT NULL DEFAULT 0,
  `company_domain_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chanel_post`
--

INSERT INTO `chanel_post` (`id`, `blog_heading`, `blog_description`, `industry_id`, `company_domain_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'validate me or tell me i\'m trash or give me some dose of reality', 'I\'m writing this post after a few drinks. I lurked for so long on blind and i can only get the courage to seek validation thru inebriation.\r\n\r\nI graduated in Dec 2017 from a large state school with no connections. I switched from a math/ece background (double major) and self-studied computer science fundamentals to prove that I\'m capable as a software engineer. I took CS 101 (C programming) and used MATLAB in control system classes and senior design project so I know a few things about programming and bit manipulation. I created side projects (never hosted them on Github because of imposter syndrome) where I built backend systems. I hosted these services on my free Azure education credits. I learned networking, deployments, creating websites, etc. I learned Vue.js, React, and Angular just because they popular and they were on job applications. I played with Bootstrap, Material.js, Foundation. I struggled with the front end.\r\n\r\nI moved to the Bay Area because I wanted to see if I was good culture fit for california/west coast. I had no job lined up and I finished a year of internships at an engineering firm.\r\n\r\nMy dream when I moved to bay area (san jose) was to work as a distributed systems engineer and, on the side, pursue my entrepreneurial dream of creating hardware/IOT systems while learning the software side thru FTE jobs to create a full enterprise suite. I would make things like create a full home security solution connected to IOT edge nodes and make it generic and scalable thru enterprise software experience.\r\n\r\nIn the meantime, I learned swift/objective-c programming and created a simple macOS application CRM to manage my part time job. I kept applying to jobs. Still I could not find any. I was working 2 part time jobs while applying to at least 5 companies/roles a day.\r\n\r\nNone of that happened. I applied to 100s of entry level computer science jobs and startups. Because I came from a large state school (south/southeast US, think football champs) recruiters threw my resume in the trash. I didn\'t care about football but it\'s something to talk about during cocktail parties. I got there because of a full ride scholarship.\r\n\r\nI eventually ended up at a Fortune 100 company (.NET/C# stack) as a software engineer. I started my master’s degree at the same time. Large companies suck. I can’t build like I used to. It was a place where people retired and other engineers had the right pace of work. But I did learn politics and what it was like to work for a big company.\r\n\r\nSomeone with a political science background (2 years older than me) was given projects and now this person became a senior engineer at a startup then became senior at a large engineering firm. I compare myself to him. He was given opportunities that I never received.\r\n\r\nI was laid off in May 2020 and finished my master\'s degree (online degree in computer science from top X school - idk the number and i really dont care, its a top school on us news I guess). I got the master\'s degree to signal employers that i knew how to code. I did not make any connections/networking while pursuing the masters degree (I see my master’s as just another \"training/certification”. It is still in its cylindrical tube).\r\n\r\nI got a new job after finishing my master’s degree. I quit this job 15 months later (put in my two weeks recently). I, again, felt like I wasn’t given any opportunities to show what I was capable of. I did learn a lot in this environment (leadership, stress and legacy). I also learned about burnout.\r\n\r\nMy entrepreneurial spirit has not died down. But my approach towards it has never been muddier.\r\n\r\n1. Am I enough to be a senior engineer?\r\n\r\nNot at Honeywell anymore.\r\n\r\n*Things that make me insecure:\r\n-If I was given the same opportunities as him, would I do just as good, better, or worse?\r\n-Who determines whether or not someone is ready for senior engineering position?\r\n-Is my approach too lofty?\r\n-Should I just “coast” and stop being ambitious and stop giving 110% at the companies?\r\n-Should I create more side projects to prove to hiring managers that I am capable of being senior?\r\n-Should I start my business first then show them that I’m capable?                                    ', 3, 1, 3, '2022-12-01 10:39:47', '2022-11-23 10:39:47'),
(2, 'test', 'test the place', 0, 6, 11, '2022-12-14 07:19:05', '2022-12-14 07:19:05');

-- --------------------------------------------------------

--
-- Table structure for table `chanel_post_comment`
--

CREATE TABLE `chanel_post_comment` (
  `id` int(11) NOT NULL,
  `user_id` int(20) NOT NULL,
  `blog_id` int(20) NOT NULL,
  `comment` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chanel_post_comment`
--

INSERT INTO `chanel_post_comment` (`id`, `user_id`, `blog_id`, `comment`, `created_at`, `updated_at`) VALUES
(1, 3, 1, 'Hello', '2022-12-03 16:39:58', '2022-12-03 16:39:58'),
(2, 11, 2, 'This is a', '2022-12-14 13:43:05', '2022-12-14 13:43:05');

-- --------------------------------------------------------

--
-- Table structure for table `company_domain`
--

CREATE TABLE `company_domain` (
  `id` int(11) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `domain_name` varchar(255) NOT NULL,
  `sub_domain_name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `salary` decimal(10,0) NOT NULL,
  `hours` decimal(10,0) NOT NULL,
  `promotion` decimal(10,0) NOT NULL,
  `happiness` decimal(10,0) NOT NULL,
  `experience` varchar(255) NOT NULL,
  `monthly_income` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `working_hour` varchar(255) NOT NULL,
  `working_day` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `employee` int(10) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `company_domain`
--

INSERT INTO `company_domain` (`id`, `company_name`, `domain_name`, `sub_domain_name`, `description`, `salary`, `hours`, `promotion`, `happiness`, `experience`, `monthly_income`, `location`, `working_hour`, `working_day`, `image`, `employee`, `created_at`) VALUES
(1, '101 Network', '101network.com', '', 'One of the leading IT organizations in Hong Kong', '2', '5', '5', '1', '5', '1000 HKD', 'Hong Kong', '9 am to 5pm', '5 Days', 'img.png', 25, '2022-11-23 16:16:01'),
(3, 'Frog Bid', 'frogbid.com', 'xyz.com', '', '0', '0', '0', '0', '', '', '', '', '', '', 0, '2022-12-04 11:35:45'),
(6, 'Test Company', 'test.com', 'test1.com,test2.com', 'This is added for the test purpose', '0', '0', '0', '0', '2018', '1000', 'Bangladesh', '8 hours', '5 days', '', 0, '2022-12-13 13:28:46');

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `id` int(11) NOT NULL,
  `question` text NOT NULL,
  `answer` text NOT NULL,
  `company_id` int(10) NOT NULL,
  `user_email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`id`, `question`, `answer`, `company_id`, `user_email`) VALUES
(1, 'How the environment there?', 'It is quite a friendly environment.', 1, 'wing@101network.com');

-- --------------------------------------------------------

--
-- Table structure for table `industry`
--

CREATE TABLE `industry` (
  `id` int(11) NOT NULL,
  `industry` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `industry`
--

INSERT INTO `industry` (`id`, `industry`, `image`, `created_at`) VALUES
(1, 'Tech', 'assets/images/icons/technology.jpg', '2022-11-23 16:24:20'),
(2, 'Finance', 'assets/images/icons/finance.jpg', '2022-11-23 16:24:20'),
(3, 'Hardware & Semiconductors', 'assets/images/icons/hardware.jpg', '2022-11-23 16:24:20'),
(4, 'E-Commerce & Retail', 'assets/images/icons/E-Commerce&Retail.jpg', '2022-11-23 16:24:20'),
(5, 'Gaming', 'assets/images/icons/Gaming.jpg', '2022-11-23 16:24:20'),
(6, 'Auto', 'assets/images/icons/auto.jpg', '2022-11-23 16:24:20'),
(7, 'Media & Entertainment', 'assets/images/icons/social-media.jpg', '2022-11-23 16:24:20'),
(8, 'Telecom', 'assets/images/icons/telecommunications.jpg', '2022-11-23 16:24:20'),
(9, 'Health', 'assets/images/icons/healthcare.jpg', '2022-11-23 16:24:20'),
(10, 'Aviation', 'assets/images/icons/Aviation.jpg', '2022-11-23 16:24:20');

-- --------------------------------------------------------

--
-- Table structure for table `salary`
--

CREATE TABLE `salary` (
  `salary_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `job_rank` varchar(255) NOT NULL,
  `job_title` varchar(255) NOT NULL,
  `annual_salary` decimal(10,2) NOT NULL,
  `annual_bonas` decimal(10,2) NOT NULL,
  `salary_year` varchar(255) NOT NULL,
  `year_of_tenture` varchar(255) NOT NULL,
  `comments` text NOT NULL,
  `company` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` bigint(20) NOT NULL,
  `email` text NOT NULL,
  `company_email` varchar(255) NOT NULL,
  `f_name` varchar(255) NOT NULL DEFAULT 'Guest',
  `l_name` varchar(255) NOT NULL DEFAULT 'Guest',
  `image` varchar(255) NOT NULL DEFAULT 'images.png',
  `industry` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `c_domain_id` int(11) NOT NULL,
  `dob` date NOT NULL,
  `salary` decimal(10,0) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `password` varchar(500) NOT NULL,
  `vcode` int(11) NOT NULL,
  `status` int(10) NOT NULL DEFAULT 0,
  `created_at` varchar(255) NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `company_email`, `f_name`, `l_name`, `image`, `industry`, `position`, `c_domain_id`, `dob`, `salary`, `gender`, `password`, `vcode`, `status`, `created_at`) VALUES
(1, 'wing@101network.com', '', 'Wing', 'Chi', 'image-of-young-asian-businessman-with-glass-building-background-photo.jpg', '1', 'Account Manager', 1, '2000-02-08', '0', 'Male', '$argon2id$v=19$m=65536,t=4,p=1$ckZGc21KUDlCQW4uc3poMw$oo6PNifTWKwQDezOWXYz2FkC4XX72dWfsbQNX9J8dGY', 652570, 1, '2022-11-23 16:25:04'),
(3, 'test@gmail.com', 'test@companyname.com', 'Test', '3', '5.jpg', '2', 'Test Position', 1, '2022-11-01', '520', 'Male', '$argon2id$v=19$m=65536,t=4,p=1$dFZoUVFaNTRVeXFvLkVpdw$mB9xOQ7jAtdu6Jj+ErZkpbcdssIzgTAJWTm0OJSptI0', 521287, 1, '2022-11-29 16:40:44'),
(9, 'frogbidofficial@gmail.com', 'test@frogbid.com', 'Test Name', '', '3.jpg', '1', '', 3, '0000-00-00', '1200', 'Male', '$argon2id$v=19$m=65536,t=4,p=1$WC8wYjB5RG9TWUlPS0I4aQ$VQdY+CCiucFdjGKuW8IdpGUoVLK3mYjaUzwSJDH4Ors', 904706, 1, '2022-12-06 18:05:21'),
(10, 'abc@gmail.com', '', 'Test Name', 'Guest', 'images.png', '', '', 0, '0000-00-00', '0', '', '$argon2id$v=19$m=65536,t=4,p=1$WC8wYjB5RG9TWUlPS0I4aQ$VQdY+CCiucFdjGKuW8IdpGUoVLK3mYjaUzwSJDH4Ors', 106850, 1, '2022-12-08 14:44:00'),
(11, 'test@test.com', 'test@test.com', 'Test Name', '', '1.jpg', '2', 'CEO', 6, '2022-11-28', '500', 'Male', '$argon2id$v=19$m=65536,t=4,p=1$WC8wYjB5RG9TWUlPS0I4aQ$VQdY+CCiucFdjGKuW8IdpGUoVLK3mYjaUzwSJDH4Ors', 520067, 1, '2022-12-11 11:58:50');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_comment`
--
ALTER TABLE `blog_comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chanel_post`
--
ALTER TABLE `chanel_post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chanel_post_comment`
--
ALTER TABLE `chanel_post_comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company_domain`
--
ALTER TABLE `company_domain`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `industry`
--
ALTER TABLE `industry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salary`
--
ALTER TABLE `salary`
  ADD PRIMARY KEY (`salary_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
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
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `blog_comment`
--
ALTER TABLE `blog_comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `chanel_post`
--
ALTER TABLE `chanel_post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `chanel_post_comment`
--
ALTER TABLE `chanel_post_comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `company_domain`
--
ALTER TABLE `company_domain`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `industry`
--
ALTER TABLE `industry`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `salary`
--
ALTER TABLE `salary`
  MODIFY `salary_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
