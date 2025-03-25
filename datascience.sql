-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 25, 2025 at 08:06 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `datascience`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `certificates`
--

CREATE TABLE `certificates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `section_title` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `certificate_image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `courses_details`
--

CREATE TABLE `courses_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `section_title` varchar(255) NOT NULL,
  `icon` text NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `parts` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`parts`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses_details`
--

INSERT INTO `courses_details` (`id`, `section_title`, `icon`, `title`, `description`, `parts`, `created_at`, `updated_at`) VALUES
(1, 'কোর্সের বর্ণনা', '<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\" class=\"lucide lucide-chart-no-axes-column-increasing w-8 h-8 text-green-500 mr-3\"><line x1=\"12\" x2=\"12\" y1=\"20\" y2=\"10\"></line><line x1=\"18\" x2=\"18\" y1=\"20\" y2=\"4\"></line><line x1=\"6\" x2=\"6\" y1=\"20\" y2=\"16\"></line></svg>', 'Power BI কোর্স সামারি', 'Power BI কোর্সটি একটি পূর্ণাঙ্গ প্রশিক্ষণ, যা বিজনেস ইন্টেলিজেন্স এবং ডেটা ভিজুয়ালাইজেশন এর প্রাথমিক ধারণা থেকে শুরু করে Microsoft-এর শক্তিশালী বিশ্লেষণাত্মক টুল Power BI ব্যবহারের দক্ষতা শেখায়। এটি বিশেষভাবে প্রাথমিক এবং মাঝারি স্তরের ব্যবহারকারীদের জন্য ডিজাইন করা হয়েছে, যা অংশগ্রহণকারীদের ইন্টারঅ্যাকটিভ ড্যাশবোর্ড এবং রিপোর্ট তৈরি করতে সক্ষম করে, যাতে তথ্যভিত্তিক সিদ্ধান্ত গ্রহণ সহজ হয়।', '\"[{\\\"title\\\":\\\"\\\\u09ae\\\\u09c2\\\\u09b2 \\\\u09ac\\\\u09c8\\\\u09b6\\\\u09bf\\\\u09b7\\\\u09cd\\\\u099f\\\\u09cd\\\\u09af\\\\u09b8\\\\u09ae\\\\u09c2\\\\u09b9:\\\",\\\"content\\\":[\\\"\\\\u09a1\\\\u09c7\\\\u099f\\\\u09be \\\\u0995\\\\u09be\\\\u09a8\\\\u09c7\\\\u0995\\\\u09b6\\\\u09a8 \\\\u098f\\\\u09ac\\\\u0982 \\\\u0987\\\\u09a8\\\\u09cd\\\\u099f\\\\u09bf\\\\u0997\\\\u09cd\\\\u09b0\\\\u09c7\\\\u09b6\\\\u09a8: \\\\u09ac\\\\u09bf\\\\u09ad\\\\u09bf\\\\u09a8\\\\u09cd\\\\u09a8 \\\\u09a1\\\\u09c7\\\\u099f\\\\u09be \\\\u09b8\\\\u09cb\\\\u09b0\\\\u09cd\\\\u09b8\\\\u09c7\\\\u09b0 \\\\u09b8\\\\u09be\\\\u09a5\\\\u09c7 \\\\u0995\\\\u09be\\\\u09a8\\\\u09c7\\\\u0995\\\\u09cd\\\\u099f \\\\u0995\\\\u09b0\\\\u09be\\\\u09b0 \\\\u09aa\\\\u09a6\\\\u09cd\\\\u09a7\\\\u09a4\\\\u09bf \\\\u098f\\\\u09ac\\\\u0982 Power BI-\\\\u09a4\\\\u09c7 \\\\u09a1\\\\u09c7\\\\u099f\\\\u09be \\\\u0987\\\\u09a8\\\\u09cd\\\\u099f\\\\u09bf\\\\u0997\\\\u09cd\\\\u09b0\\\\u09c7\\\\u09b6\\\\u09a8 \\\\u09b6\\\\u09bf\\\\u0996\\\\u09c1\\\\u09a8\\\\u0964\\\",\\\"\\\\u09a1\\\\u09c7\\\\u099f\\\\u09be \\\\u09ae\\\\u09a1\\\\u09c7\\\\u09b2\\\\u09bf\\\\u0982: \\\\u09a1\\\\u09c7\\\\u099f\\\\u09be \\\\u0986\\\\u0995\\\\u09be\\\\u09b0 \\\\u09a6\\\\u09c7\\\\u09af\\\\u09bc\\\\u09be, \\\\u09aa\\\\u09b0\\\\u09bf\\\\u09b7\\\\u09cd\\\\u0995\\\\u09be\\\\u09b0 \\\\u0995\\\\u09b0\\\\u09be, \\\\u098f\\\\u09ac\\\\u0982 \\\\u09ac\\\\u09bf\\\\u09b6\\\\u09cd\\\\u09b2\\\\u09c7\\\\u09b7\\\\u09a3\\\\u09c7\\\\u09b0 \\\\u099c\\\\u09a8\\\\u09cd\\\\u09af \\\\u09aa\\\\u09cd\\\\u09b0\\\\u09b8\\\\u09cd\\\\u09a4\\\\u09c1\\\\u09a4 \\\\u0995\\\\u09b0\\\\u09be\\\\u09b0 \\\\u09ae\\\\u09cc\\\\u09b2\\\\u09bf\\\\u0995 \\\\u0995\\\\u09cc\\\\u09b6\\\\u09b2\\\\u0964\\\",\\\"\\\\u0987\\\\u09a8\\\\u09cd\\\\u099f\\\\u09be\\\\u09b0\\\\u0985\\\\u09cd\\\\u09af\\\\u09be\\\\u0995\\\\u099f\\\\u09bf\\\\u09ad \\\\u09ad\\\\u09bf\\\\u099c\\\\u09c1\\\\u09af\\\\u09bc\\\\u09be\\\\u09b2\\\\u09be\\\\u0987\\\\u099c\\\\u09c7\\\\u09b6\\\\u09a8: \\\\u099a\\\\u09be\\\\u09b0\\\\u09cd\\\\u099f, \\\\u09ae\\\\u09cd\\\\u09af\\\\u09be\\\\u09aa, \\\\u098f\\\\u09ac\\\\u0982 \\\\u0985\\\\u09a8\\\\u09cd\\\\u09af\\\\u09be\\\\u09a8\\\\u09cd\\\\u09af \\\\u09ad\\\\u09bf\\\\u099c\\\\u09c1\\\\u09af\\\\u09bc\\\\u09be\\\\u09b2 \\\\u0989\\\\u09aa\\\\u09be\\\\u09a6\\\\u09be\\\\u09a8\\\\u09c7\\\\u09b0 \\\\u09ae\\\\u09be\\\\u09a7\\\\u09cd\\\\u09af\\\\u09ae\\\\u09c7 \\\\u09a1\\\\u09c7\\\\u099f\\\\u09be \\\\u0989\\\\u09aa\\\\u09b8\\\\u09cd\\\\u09a5\\\\u09be\\\\u09aa\\\\u09a8 \\\\u0995\\\\u09b0\\\\u09c7 \\\\u09a1\\\\u09be\\\\u09af\\\\u09bc\\\\u09a8\\\\u09be\\\\u09ae\\\\u09bf\\\\u0995 \\\\u09a1\\\\u09cd\\\\u09af\\\\u09be\\\\u09b6\\\\u09ac\\\\u09cb\\\\u09b0\\\\u09cd\\\\u09a1 \\\\u09a4\\\\u09c8\\\\u09b0\\\\u09bf\\\\u0964\\\",\\\"DAX (Data Analysis Expressions): \\\\u0995\\\\u09cd\\\\u09af\\\\u09be\\\\u09b2\\\\u0995\\\\u09c1\\\\u09b2\\\\u09c7\\\\u099f\\\\u09c7\\\\u09a1 \\\\u0995\\\\u09b2\\\\u09be\\\\u09ae \\\\u0993 \\\\u09ae\\\\u09c7\\\\u099c\\\\u09be\\\\u09b0 \\\\u09a4\\\\u09c8\\\\u09b0\\\\u09bf \\\\u0995\\\\u09b0\\\\u09c7 \\\\u0989\\\\u09a8\\\\u09cd\\\\u09a8\\\\u09a4 \\\\u09ac\\\\u09bf\\\\u09b6\\\\u09cd\\\\u09b2\\\\u09c7\\\\u09b7\\\\u09a3\\\\u09c7\\\\u09b0 \\\\u099c\\\\u09a8\\\\u09cd\\\\u09af DAX \\\\u09ac\\\\u09cd\\\\u09af\\\\u09ac\\\\u09b9\\\\u09be\\\\u09b0 \\\\u09b6\\\\u09bf\\\\u0996\\\\u09c1\\\\u09a8\\\\u0964\\\",\\\"\\\\u09a1\\\\u09c7\\\\u099f\\\\u09be \\\\u09a8\\\\u09bf\\\\u09b0\\\\u09be\\\\u09aa\\\\u09a4\\\\u09cd\\\\u09a4\\\\u09be: \\\\u09a1\\\\u09c7\\\\u099f\\\\u09be \\\\u09b8\\\\u09c1\\\\u09b0\\\\u0995\\\\u09cd\\\\u09b7\\\\u09bf\\\\u09a4 \\\\u0995\\\\u09b0\\\\u09be\\\\u09b0 \\\\u09aa\\\\u09a6\\\\u09cd\\\\u09a7\\\\u09a4\\\\u09bf \\\\u098f\\\\u09ac\\\\u0982 \\\\u09b0\\\\u09cb\\\\u09b2-\\\\u09ac\\\\u09c7\\\\u099c\\\\u09a1 \\\\u0985\\\\u09cd\\\\u09af\\\\u09be\\\\u0995\\\\u09cd\\\\u09b8\\\\u09c7\\\\u09b8 \\\\u0995\\\\u09a8\\\\u09cd\\\\u099f\\\\u09cd\\\\u09b0\\\\u09cb\\\\u09b2\\\\u09c7\\\\u09b0 \\\\u09aa\\\\u09cd\\\\u09b0\\\\u09af\\\\u09bc\\\\u09cb\\\\u0997\\\\u0964\\\",\\\"\\\\u09aa\\\\u09be\\\\u09ac\\\\u09b2\\\\u09bf\\\\u09b6\\\\u09bf\\\\u0982 \\\\u098f\\\\u09ac\\\\u0982 \\\\u09b6\\\\u09c7\\\\u09af\\\\u09bc\\\\u09be\\\\u09b0\\\\u09bf\\\\u0982: Power BI Service \\\\u09ac\\\\u09cd\\\\u09af\\\\u09ac\\\\u09b9\\\\u09be\\\\u09b0 \\\\u0995\\\\u09b0\\\\u09c7 \\\\u09a1\\\\u09cd\\\\u09af\\\\u09be\\\\u09b6\\\\u09ac\\\\u09cb\\\\u09b0\\\\u09cd\\\\u09a1 \\\\u0993 \\\\u09b0\\\\u09bf\\\\u09aa\\\\u09cb\\\\u09b0\\\\u09cd\\\\u099f \\\\u09b6\\\\u09c7\\\\u09af\\\\u09bc\\\\u09be\\\\u09b0 \\\\u098f\\\\u09ac\\\\u0982 \\\\u099f\\\\u09bf\\\\u09ae\\\\u09c7\\\\u09b0 \\\\u09b8\\\\u0999\\\\u09cd\\\\u0997\\\\u09c7 \\\\u09b8\\\\u09b9\\\\u09af\\\\u09cb\\\\u0997\\\\u09bf\\\\u09a4\\\\u09be\\\\u0964\\\"]},{\\\"title\\\":\\\"\\\\u09aa\\\\u09cd\\\\u09b0\\\\u09b6\\\\u09bf\\\\u0995\\\\u09cd\\\\u09b7\\\\u09a3\\\\u09c7\\\\u09b0 \\\\u09ab\\\\u09b2\\\\u09be\\\\u09ab\\\\u09b2:\\\",\\\"content\\\":[\\\"\\\\u09b6\\\\u0995\\\\u09cd\\\\u09a4\\\\u09bf\\\\u09b6\\\\u09be\\\\u09b2\\\\u09c0 \\\\u09a1\\\\u09c7\\\\u099f\\\\u09be \\\\u09ad\\\\u09bf\\\\u099c\\\\u09c1\\\\u09af\\\\u09bc\\\\u09be\\\\u09b2\\\\u09be\\\\u0987\\\\u099c\\\\u09c7\\\\u09b6\\\\u09a8 \\\\u09a4\\\\u09c8\\\\u09b0\\\\u09bf \\\\u0993 \\\\u09b6\\\\u09c7\\\\u09af\\\\u09bc\\\\u09be\\\\u09b0 \\\\u0995\\\\u09b0\\\\u09be\\\\u09b0 \\\\u09a6\\\\u0995\\\\u09cd\\\\u09b7\\\\u09a4\\\\u09be\\\\u0964\\\",\\\"\\\\u09ac\\\\u09bf\\\\u09ad\\\\u09bf\\\\u09a8\\\\u09cd\\\\u09a8 \\\\u09a1\\\\u09c7\\\\u099f\\\\u09be \\\\u09b8\\\\u09cb\\\\u09b0\\\\u09cd\\\\u09b8 \\\\u09a5\\\\u09c7\\\\u0995\\\\u09c7 \\\\u09a1\\\\u09c7\\\\u099f\\\\u09be \\\\u0996\\\\u09c1\\\\u0981\\\\u099c\\\\u09c7 \\\\u09ac\\\\u09c7\\\\u09b0 \\\\u0995\\\\u09b0\\\\u09be \\\\u098f\\\\u09ac\\\\u0982 \\\\u098f\\\\u0995\\\\u09a4\\\\u09cd\\\\u09b0\\\\u09bf\\\\u09a4 \\\\u0995\\\\u09b0\\\\u09be\\\\u0964\\\",\\\"Power BI-\\\\u098f\\\\u09b0 \\\\u09ac\\\\u09bf\\\\u09ad\\\\u09bf\\\\u09a8\\\\u09cd\\\\u09a8 \\\\u09ab\\\\u09bf\\\\u099a\\\\u09be\\\\u09b0 \\\\u098f\\\\u09ac\\\\u0982 \\\\u0995\\\\u09cd\\\\u09af\\\\u09be\\\\u09b2\\\\u0995\\\\u09c1\\\\u09b2\\\\u09c7\\\\u09b6\\\\u09a8 \\\\u09ac\\\\u09cd\\\\u09af\\\\u09ac\\\\u09b9\\\\u09be\\\\u09b0 \\\\u0995\\\\u09b0\\\\u09c7 \\\\u09a1\\\\u09c7\\\\u099f\\\\u09be \\\\u09a4\\\\u09c8\\\\u09b0\\\\u09bf \\\\u0995\\\\u09b0\\\\u09be\\\\u0964\\\",\\\"\\\\u09a1\\\\u09c7\\\\u099f\\\\u09be \\\\u09b8\\\\u0982\\\\u0997\\\\u09cd\\\\u09b0\\\\u09b9, \\\\u09ae\\\\u09a1\\\\u09c7\\\\u09b2\\\\u09bf\\\\u0982 \\\\u098f\\\\u09ac\\\\u0982 \\\\u09a8\\\\u09bf\\\\u09b0\\\\u09be\\\\u09aa\\\\u09a4\\\\u09cd\\\\u09a4\\\\u09be\\\\u09b0 \\\\u0995\\\\u09cc\\\\u09b6\\\\u09b2 \\\\u0985\\\\u09a8\\\\u09cd\\\\u09ac\\\\u09c7\\\\u09b7\\\\u09a3\\\\u0964\\\",\\\"DAX (Data Analysis Expressions) \\\\u09ac\\\\u09cd\\\\u09af\\\\u09ac\\\\u09b8\\\\u09be\\\\u09af\\\\u09bc\\\\u09bf\\\\u0995 \\\\u09b2\\\\u099c\\\\u09bf\\\\u0995 \\\\u098f\\\\u09ac\\\\u0982 \\\\u0995\\\\u09cd\\\\u09af\\\\u09be\\\\u09b2\\\\u0995\\\\u09c1\\\\u09b2\\\\u09c7\\\\u09b6\\\\u09a8 \\\\u09b8\\\\u09ae\\\\u09cd\\\\u09aa\\\\u09b0\\\\u09cd\\\\u0995\\\\u09c7 \\\\u09aa\\\\u09b0\\\\u09cd\\\\u09af\\\\u09be\\\\u09b2\\\\u09cb\\\\u099a\\\\u09a8\\\\u09be\\\\u0964\\\",\\\"\\\\u09b8\\\\u09cb\\\\u09b0\\\\u09cd\\\\u09b8 \\\\u09a1\\\\u09c7\\\\u099f\\\\u09be \\\\u09b0\\\\u09bf\\\\u09ab\\\\u09cd\\\\u09b0\\\\u09c7\\\\u09b6 \\\\u0995\\\\u09b0\\\\u09be\\\\u09b0 \\\\u09aa\\\\u09a6\\\\u09cd\\\\u09a7\\\\u09a4\\\\u09bf \\\\u098f\\\\u09ac\\\\u0982 \\\\u09a1\\\\u09c7\\\\u099f\\\\u09be \\\\u0993 \\\\u09b0\\\\u09bf\\\\u09aa\\\\u09cb\\\\u09b0\\\\u09cd\\\\u099f \\\\u09b8\\\\u09c1\\\\u09b0\\\\u0995\\\\u09cd\\\\u09b7\\\\u09bf\\\\u09a4 \\\\u0995\\\\u09b0\\\\u09be\\\\u09b0 \\\\u0995\\\\u09cc\\\\u09b6\\\\u09b2\\\\u0964\\\\n\\\"]}]\"', '2025-03-25 01:04:03', '2025-03-25 01:04:03');

-- --------------------------------------------------------

--
-- Table structure for table `course_data`
--

CREATE TABLE `course_data` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `enrollment_url` varchar(255) DEFAULT NULL,
  `enrollment_text` varchar(255) DEFAULT NULL,
  `organization_name` varchar(255) DEFAULT NULL,
  `organization_url` varchar(255) DEFAULT NULL,
  `organization_logo` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `course_data`
--

INSERT INTO `course_data` (`id`, `title`, `description`, `enrollment_url`, `enrollment_text`, `organization_name`, `organization_url`, `organization_logo`, `created_at`, `updated_at`) VALUES
(1, 'Data Science and Machine Learning Zero to Mastery (25th Batch)', 'দেশের সবচেয়ে বড় ডাটা সায়েন্স ও মেশিন লার্নিং কোর্সটি এখন Skill Jobs-এ, যা একদম বিগিনারদের জন্য সাজানো হয়েছে। এখানে আপনি জয়েন করতে পারবেন কোনো কোডিং নলেজ ছাড়াই!', 'https://forms.gle/YEYxLYr1fdtznTrs9', '২৪তম ব্যাচ এ Enroll করুন', 'A Concern Of Daffodil Family', 'http://localhost', 'images/daffodilgrouppng.png', '2025-03-25 01:04:03', '2025-03-25 01:04:03');

-- --------------------------------------------------------

--
-- Table structure for table `course_offerings`
--

CREATE TABLE `course_offerings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `section_title` varchar(255) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `course_offerings`
--

INSERT INTO `course_offerings` (`id`, `section_title`, `icon`, `title`, `description`, `created_at`, `updated_at`) VALUES
(1, 'কোর্সে আপনি পাচ্ছেন', 'images/৪ মাসের স্টাডিপ্ল্যান.png', '৬০ দিনের স্টাডি প্ল্যান', 'আপডেটেড কারিকুলাম', '2025-03-25 01:04:03', '2025-03-25 01:04:03'),
(2, 'কোর্সে আপনি পাচ্ছেন', 'images/35 টি লাইভ ক্লাস.png', '৭ টি লাইভ ক্লাস', 'ইন্ডাস্ট্রি এক্সপার্টদের কাছে শিখুন লাইভে', '2025-03-25 01:04:03', '2025-03-25 01:04:03'),
(3, 'কোর্সে আপনি পাচ্ছেন', 'images/project.png', '৪ টি রিয়েল লাইফ প্রজেক্ট', 'ইন্ডাস্ট্রি স্ট্যান্ডার্ড প্রজেক্ট এড করুন পিডিএফ, এক্সেল সবার চেয়ে এগিয়ে', '2025-03-25 01:04:03', '2025-03-25 01:04:03'),
(4, 'কোর্সে আপনি পাচ্ছেন', 'images/progress.png', 'প্রোগ্রেস ট্র্যাকিং', 'নিজের ড্যাশবোর্ড দেখুন এবং অগ্রগতির মূল্যায়ন করুন।', '2025-03-25 01:04:03', '2025-03-25 01:04:03'),
(5, 'কোর্সে আপনি পাচ্ছেন', 'images/support.png', '২৪/৭ সাপোর্ট', 'প্র্যাক্টিস করতে গিয়ে পাবেন লাইভ সাপোর্ট', '2025-03-25 01:04:03', '2025-03-25 01:04:03'),
(6, 'কোর্সে আপনি পাচ্ছেন', 'images/কমিউনিটি সাপোর্ট.png', 'কমিউনিটি সাপোর্ট', 'থাকুন কর্পোরেট প্রফেশনাল কমিউনিটির সাথে অলটাইমস', '2025-03-25 01:04:03', '2025-03-25 01:04:03'),
(7, 'কোর্সে আপনি পাচ্ছেন', 'images/access.png', 'লাইফটাইম এক্সেস', 'রিসোর্স এবং লাইভ ক্লাসের রেকর্ড লাইফটাইম অ্যাক্সেসযোগ্য থাকবে।', '2025-03-25 01:04:03', '2025-03-25 01:04:03'),
(8, 'কোর্সে আপনি পাচ্ছেন', 'images/certificate.jpg', 'সার্টিফিকেট', 'কোর্স শেষ করে পাবেন সেয়ারেবল প্রফেশনাল কোর্স কমপ্লিশন সার্টিফিকেট', '2025-03-25 01:04:03', '2025-03-25 01:04:03');

-- --------------------------------------------------------

--
-- Table structure for table `course_summaries`
--

CREATE TABLE `course_summaries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `section_title` varchar(255) NOT NULL,
  `stats` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`stats`)),
  `schedule` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`schedule`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `course_summaries`
--

INSERT INTO `course_summaries` (`id`, `section_title`, `stats`, `schedule`, `created_at`, `updated_at`) VALUES
(1, 'Course Summary', '[{\"value\":\"\\u09ed \\u099f\\u09bf\",\"label\":\"\\u09b2\\u09be\\u0987\\u09ad \\u0995\\u09cd\\u09b2\\u09be\\u09b8\"},{\"value\":\"\\u09e7\\u09eb \\u099f\\u09bf\",\"label\":\"\\u0998\\u09a8\\u09cd\\u099f\\u09be \\u09b2\\u09be\\u09b0\\u09cd\\u09a8\\u09bf\\u0982 \\u09b8\\u09c7\\u09b6\\u09a8 \"},{\"value\":\"\\u09ea \\u099f\\u09bf\",\"label\":\"\\u09b9\\u09cd\\u09af\\u09be\\u09a8\\u09cd\\u09a1\\u09b8-\\u0985\\u09a8 \\u09aa\\u09cd\\u09b0\\u099c\\u09c7\\u0995\\u09cd\\u099f\"},{\"value\":\"\",\"label\":\"\\u09b2\\u09be\\u0987\\u09ab\\u099f\\u09be\\u0987\\u09ae \\u0995\\u09cd\\u09b2\\u09be\\u09b8 \\u09b0\\u09c7\\u0995\\u09b0\\u09cd\\u09a1\\u09bf\\u0982 \\u0985\\u09cd\\u09af\\u09be\\u0995\\u09cd\\u09b8\\u09c7\\u09b8\"},{\"value\":\"\",\"label\":\"\\u0987\\u09a8\\u09cd\\u09a1\\u09be\\u09b8\\u09cd\\u099f\\u09cd\\u09b0\\u09bf-\\u09b0\\u09bf\\u09b2\\u09c7\\u09ad\\u09c7\\u09a8\\u09cd\\u099f \\u099f\\u09c1\\u09b2\\u09b8\"},{\"value\":\"\",\"label\":\"\\u09b8\\u09ae\\u09cd\\u09aa\\u09c2\\u09b0\\u09cd\\u09a3 \\u0995\\u09be\\u09b0\\u09bf\\u0995\\u09c1\\u09b2\\u09be\\u09ae\"},{\"value\":\"\",\"label\":\"\\u098f\\u0995\\u09cd\\u09b8\\u099f\\u09cd\\u09b0\\u09be \\u09b8\\u09be\\u09aa\\u09cb\\u09b0\\u09cd\\u099f \\u0995\\u09cd\\u09b2\\u09be\\u09b8 \"},{\"value\":\"\",\"label\":\"\\u098f\\u0995\\u09cd\\u09b8\\u09aa\\u09c7\\u09b0\\u09bf\\u09df\\u09c7\\u09a8\\u09cd\\u09b8 \\u09ae\\u09c7\\u09a8\\u09cd\\u099f\\u09b0\"}]', '[{\"icon\":\"calendar\",\"title\":\"\\u0995\\u09cb\\u09b0\\u09cd\\u09b8\\u099f\\u09bf \\u09b6\\u09c1\\u09b0\\u09c1:\",\"detail\":\"\\u09e7 \\u09ae\\u09c7, \\u09e8\\u09e6\\u09e8\\u09eb \\u0987\\u0982\"},{\"icon\":\"clock\",\"title\":\"\\u09b2\\u09be\\u0987\\u09ad \\u0995\\u09cd\\u09b2\\u09be\\u09b8\",\"detail\":\"\\u09b0\\u09be\\u09a4 \\u09ef:\\u09e6\\u09e6 \\u2013 \\u09e7\\u09e7:\\u09e6\\u09e6\"},{\"icon\":\"calendar\",\"title\":\"\\u0995\\u09cb\\u09b0\\u09cd\\u09b8 \\u09b6\\u09c7\\u09b7:\",\"detail\":\"\\u09e7 \\u099c\\u09c1\\u09b2\\u09be\\u0987, \\u09e8\\u09e6\\u09e8\\u09eb \\u0987\\u0982\"}]', '2025-03-25 01:04:03', '2025-03-25 01:04:03');

-- --------------------------------------------------------

--
-- Table structure for table `curriculums`
--

CREATE TABLE `curriculums` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `section_title` varchar(255) NOT NULL,
  `week` varchar(255) NOT NULL,
  `title` text DEFAULT NULL,
  `instructor` varchar(255) NOT NULL,
  `profile_image` varchar(255) DEFAULT NULL,
  `lessons` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`lessons`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `curriculums`
--

INSERT INTO `curriculums` (`id`, `section_title`, `week`, `title`, `instructor`, `profile_image`, `lessons`, `created_at`, `updated_at`) VALUES
(1, 'কারিকুলাম', 'সপ্তাহ ১', 'Power BI Desktop এবং Service সেটআপ', 'Shahriar Jahan Rafi', 'images/profile.png', '\"[\\\"\\\\u09aa\\\\u09b0\\\\u09bf\\\\u099a\\\\u09bf\\\\u09a4\\\\u09bf\\\",\\\"Power BI Desktop \\\\u0987\\\\u09a8\\\\u09b8\\\\u09cd\\\\u099f\\\\u09b2\\\\u09c7\\\\u09b6\\\\u09a8\\\",\\\"\\\\u0985\\\\u09cd\\\\u09af\\\\u09be\\\\u0995\\\\u09be\\\\u0989\\\\u09a8\\\\u09cd\\\\u099f \\\\u09a4\\\\u09c8\\\\u09b0\\\\u09bf \\\\u098f\\\\u09ac\\\\u0982 \\\\u09ab\\\\u09cd\\\\u09b0\\\\u09bf \\\\u099f\\\\u09cd\\\\u09b0\\\\u09be\\\\u09af\\\\u09bc\\\\u09be\\\\u09b2 \\\\u0997\\\\u09cd\\\\u09b0\\\\u09b9\\\\u09a3\\\",\\\"Power BI Service \\\\u0987\\\\u09a8\\\\u09cd\\\\u099f\\\\u09be\\\\u09b0\\\\u09ab\\\\u09c7\\\\u09b8 \\\\u09aa\\\\u09b0\\\\u09bf\\\\u099a\\\\u09bf\\\\u09a4\\\\u09bf\\\",\\\"\\\\u0986\\\\u09aa\\\\u09a8\\\\u09be\\\\u09b0 \\\\u09aa\\\\u09cd\\\\u09b0\\\\u09a5\\\\u09ae \\\\u0993\\\\u09af\\\\u09bc\\\\u09be\\\\u09b0\\\\u09cd\\\\u0995\\\\u09b8\\\\u09cd\\\\u09aa\\\\u09c7\\\\u09b8 \\\\u09a4\\\\u09c8\\\\u09b0\\\\u09bf\\\",\\\"\\\\u09a1\\\\u09cb\\\\u09ae\\\\u09c7\\\\u0987\\\\u09a8 \\\\u09af\\\\u09c1\\\\u0995\\\\u09cd\\\\u09a4 \\\\u0995\\\\u09b0\\\\u09be\\\\u09b0 \\\\u09aa\\\\u09a6\\\\u09cd\\\\u09a7\\\\u09a4\\\\u09bf\\\",\\\"\\\\u09b2\\\\u09be\\\\u0987\\\\u09b8\\\\u09c7\\\\u09a8\\\\u09cd\\\\u09b8 \\\\u098f\\\\u09ac\\\\u0982 \\\\u09a4\\\\u09c1\\\\u09b2\\\\u09a8\\\\u09be\\\",\\\"Power BI Service \\\\u09b8\\\\u09c7\\\\u099f\\\\u09bf\\\\u0982\\\\u09b8\\\",\\\"Power BI Desktop \\\\u0987\\\\u09a8\\\\u09cd\\\\u099f\\\\u09be\\\\u09b0\\\\u09ab\\\\u09c7\\\\u09b8\\\",\\\"Desktop \\\\u0985\\\\u09aa\\\\u09b6\\\\u09a8 \\\\u098f\\\\u09ac\\\\u0982 \\\\u09b8\\\\u09c7\\\\u099f\\\\u09bf\\\\u0982\\\\u09b8\\\",\\\"\\\\u09aa\\\\u09cd\\\\u09b0\\\\u09be\\\\u09a5\\\\u09ae\\\\u09bf\\\\u0995 \\\\u09ad\\\\u09bf\\\\u099c\\\\u09c1\\\\u09af\\\\u09bc\\\\u09be\\\\u09b2\\\\u09be\\\\u0987\\\\u099c\\\\u09c7\\\\u09b6\\\\u09a8 \\\\u098f\\\\u09ac\\\\u0982 \\\\u09a1\\\\u09c7\\\\u099f\\\\u09be \\\\u0987\\\\u09a8\\\\u09cd\\\\u099f\\\\u09be\\\\u09b0\\\\u0985\\\\u09cd\\\\u09af\\\\u09be\\\\u0995\\\\u099f\\\\u09bf\\\\u09ad \\\\u09b0\\\\u09bf\\\\u09aa\\\\u09cb\\\\u09b0\\\\u09cd\\\\u099f \\\\u09a1\\\\u09c7\\\\u09ae\\\\u09cb\\\"]\"', '2025-03-25 01:04:03', '2025-03-25 01:04:03'),
(2, 'কারিকুলাম', 'সপ্তাহ ২', 'বিভিন্ন ডেটা সোর্স থেকে ডেটা সংযুক্ত করা', 'Shahriar Jahan Rafi', 'images/profile.png', '\"[\\\"Power BI Desktop: \\\\u09aa\\\\u09b0\\\\u09bf\\\\u099a\\\\u09bf\\\\u09a4\\\\u09bf\\\",\\\"\\\\u09a1\\\\u09c7\\\\u099f\\\\u09be \\\\u09b8\\\\u0982\\\\u09af\\\\u09cb\\\\u0997 \\\\u09b8\\\\u09cd\\\\u09a5\\\\u09be\\\\u09aa\\\\u09a8\\\",\\\"\\\\u09a1\\\\u09c7\\\\u099f\\\\u09be \\\\u098f\\\\u09ac\\\\u0982 \\\\u0995\\\\u09cb\\\\u09af\\\\u09bc\\\\u09c7\\\\u09b0\\\\u09bf \\\\u098f\\\\u09a1\\\\u09bf\\\\u099f\\\\u09b0 \\\\u09b8\\\\u0982\\\\u09af\\\\u09cb\\\\u0997\\\",\\\"\\\\u09aa\\\\u09cd\\\\u09b0\\\\u09be\\\\u09a5\\\\u09ae\\\\u09bf\\\\u0995 \\\\u09ad\\\\u09bf\\\\u099c\\\\u09c1\\\\u09af\\\\u09bc\\\\u09be\\\\u09b2\\\\u09be\\\\u0987\\\\u099c\\\\u09c7\\\\u09b6\\\\u09a8 \\\\u098f\\\\u09ac\\\\u0982 \\\\u0987\\\\u09a8\\\\u09cd\\\\u099f\\\\u09be\\\\u09b0\\\\u0985\\\\u09cd\\\\u09af\\\\u09be\\\\u0995\\\\u099f\\\\u09bf\\\\u09ad \\\\u09b0\\\\u09bf\\\\u09aa\\\\u09cb\\\\u09b0\\\\u09cd\\\\u099f \\\\u09a1\\\\u09c7\\\\u09ae\\\\u09cb\\\",\\\"\\\\u09b8\\\\u09cd\\\\u099f\\\\u09cb\\\\u09b0\\\\u09c7\\\\u099c \\\\u09ae\\\\u09cb\\\\u09a1\\\\u09b8\\\",\\\"\\\\u09a1\\\\u09c7\\\\u099f\\\\u09be \\\\u09b8\\\\u09cb\\\\u09b0\\\\u09cd\\\\u09b8 \\\\u09b8\\\\u09c7\\\\u099f\\\\u09bf\\\\u0982\\\\u09b8\\\",\\\"\\\\u0997\\\\u09c7\\\\u099f\\\\u0993\\\\u09af\\\\u09bc\\\\u09c7 \\\\u099f\\\\u09be\\\\u0987\\\\u09aa \\\\u098f\\\\u09ac\\\\u0982 \\\\u09b8\\\\u09c7\\\\u099f\\\\u0986\\\\u09aa\\\",\\\"Power BI Service: \\\\u09aa\\\\u09b0\\\\u09bf\\\\u099a\\\\u09bf\\\\u09a4\\\\u09bf\\\",\\\"Dataflow \\\\u098f\\\\u09ac\\\\u0982 Datamart-\\\\u098f \\\\u09a1\\\\u09c7\\\\u099f\\\\u09be \\\\u09b8\\\\u0982\\\\u09af\\\\u09cb\\\\u0997\\\",\\\"\\\\u09aa\\\\u09be\\\\u0987\\\\u09aa\\\\u09b2\\\\u09be\\\\u0987\\\\u09a8\\\",\\\"\\\\u09b8\\\\u09cd\\\\u099f\\\\u09cb\\\\u09b0\\\\u09c7\\\\u099c \\\\u09ae\\\\u09cb\\\\u09a1\\\\u09b8\\\",\\\"\\\\u09a1\\\\u09c7\\\\u099f\\\\u09be \\\\u09b8\\\\u09cb\\\\u09b0\\\\u09cd\\\\u09b8 \\\\u09b8\\\\u09c7\\\\u099f\\\\u09bf\\\\u0982\\\\u09b8\\\",\\\"\\\\u0997\\\\u09c7\\\\u099f\\\\u0993\\\\u09af\\\\u09bc\\\\u09c7 \\\\u098f\\\\u09ac\\\\u0982 \\\\u09b8\\\\u0982\\\\u09af\\\\u09cb\\\\u0997 \\\\u09b8\\\\u09c7\\\\u099f\\\\u0986\\\\u09aa\\\"]\"', '2025-03-25 01:04:03', '2025-03-25 01:04:03'),
(3, 'কারিকুলাম', 'সপ্তাহ ৩', 'Power Query এবং ডেটা প্রোফাইলিং', 'Shahriar Jahan Rafi', 'images/profile.png', '\"[\\\"\\\\u09a1\\\\u09c7\\\\u099f\\\\u09be \\\\u09aa\\\\u09cd\\\\u09b0\\\\u09cb\\\\u09ab\\\\u09be\\\\u0987\\\\u09b2\\\\u09bf\\\\u0982: \\\\u09aa\\\\u09b0\\\\u09bf\\\\u099a\\\\u09bf\\\\u09a4\\\\u09bf\\\",\\\"\\\\u09ad\\\\u09bf\\\\u0989 \\\\u09ae\\\\u09c7\\\\u09a8\\\\u09c1\\\",\\\"\\\\u0995\\\\u09b2\\\\u09be\\\\u09ae \\\\u0995\\\\u09cb\\\\u09af\\\\u09bc\\\\u09be\\\\u09b2\\\\u09bf\\\\u099f\\\\u09bf\\\",\\\"\\\\u0995\\\\u09b2\\\\u09be\\\\u09ae \\\\u09a1\\\\u09bf\\\\u09b8\\\\u09cd\\\\u099f\\\\u09cd\\\\u09b0\\\\u09bf\\\\u09ac\\\\u09bf\\\\u0989\\\\u09b6\\\\u09a8\\\",\\\"\\\\u0995\\\\u09b2\\\\u09be\\\\u09ae \\\\u09aa\\\\u09cd\\\\u09b0\\\\u09cb\\\\u09ab\\\\u09be\\\\u0987\\\\u09b2\\\",\\\"\\\\u09aa\\\\u09cd\\\\u09b0\\\\u09cb\\\\u09ab\\\\u09be\\\\u0987\\\\u09b2\\\\u09bf\\\\u0982\\\",\\\"\\\\u09a1\\\\u09c7\\\\u099f\\\\u09be \\\\u0995\\\\u09cd\\\\u09b2\\\\u09bf\\\\u09a8\\\\u09bf\\\\u0982, \\\\u099f\\\\u09cd\\\\u09b0\\\\u09be\\\\u09a8\\\\u09cd\\\\u09b8\\\\u09ab\\\\u09b0\\\\u09cd\\\\u09ae\\\\u09bf\\\\u0982 \\\\u098f\\\\u09ac\\\\u0982 \\\\u09b2\\\\u09cb\\\\u09a1\\\\u09bf\\\\u0982:\\\",\\\"\\\\u099f\\\\u09c7\\\\u09ac\\\\u09bf\\\\u09b2 \\\\u099f\\\\u09cd\\\\u09b0\\\\u09be\\\\u09a8\\\\u09cd\\\\u09b8\\\\u09ab\\\\u09b0\\\\u09ae\\\\u09c7\\\\u09b6\\\\u09a8\\\",\\\"\\\\u0987\\\\u09a8\\\\u09a1\\\\u09c7\\\\u0995\\\\u09cd\\\\u09b8 \\\\u0995\\\\u09b2\\\\u09be\\\\u09ae\\\",\\\"\\\\u0995\\\\u09a8\\\\u09cd\\\\u09a1\\\\u09bf\\\\u09b6\\\\u09a8\\\\u09be\\\\u09b2 \\\\u0995\\\\u09b2\\\\u09be\\\\u09ae\\\",\\\"\\\\u0995\\\\u09be\\\\u09b8\\\\u09cd\\\\u099f\\\\u09ae \\\\u0995\\\\u09b2\\\\u09be\\\\u09ae\\\",\\\"\\\\u0989\\\\u09a6\\\\u09be\\\\u09b9\\\\u09b0\\\\u09a3 \\\\u09a5\\\\u09c7\\\\u0995\\\\u09c7 \\\\u0995\\\\u09b2\\\\u09be\\\\u09ae \\\\u09a4\\\\u09c8\\\\u09b0\\\\u09bf\\\",\\\"\\\\u0997\\\\u09cd\\\\u09b0\\\\u09c1\\\\u09aa\\\\u09bf\\\\u0982 \\\\u098f\\\\u09ac\\\\u0982 \\\\u098f\\\\u0997\\\\u09cd\\\\u09b0\\\\u09bf\\\\u0997\\\\u09c7\\\\u09b6\\\\u09a8\\\",\\\"\\\\u09aa\\\\u09bf\\\\u09ad\\\\u099f\\\\u09bf\\\\u0982 \\\\u098f\\\\u09ac\\\\u0982 \\\\u0986\\\\u09a8\\\\u09aa\\\\u09bf\\\\u09ad\\\\u099f\\\\u09bf\\\\u0982\\\",\\\"\\\\u0995\\\\u09cb\\\\u09af\\\\u09bc\\\\u09c7\\\\u09b0\\\\u09bf \\\\u09ae\\\\u09be\\\\u09b0\\\\u09cd\\\\u099c\\\\u09bf\\\\u0982\\\",\\\"\\\\u0995\\\\u09cb\\\\u09af\\\\u09bc\\\\u09c7\\\\u09b0\\\\u09bf \\\\u0985\\\\u09cd\\\\u09af\\\\u09be\\\\u09aa\\\\u09c7\\\\u09a8\\\\u09cd\\\\u09a1\\\\u09bf\\\\u0982\\\",\\\"\\\\u0995\\\\u09cb\\\\u09af\\\\u09bc\\\\u09c7\\\\u09b0\\\\u09bf \\\\u09ae\\\\u09a1\\\\u09bf\\\\u09ab\\\\u09be\\\\u0987\\\",\\\"M \\\\u0995\\\\u09cb\\\\u09a1\\\\u09c7\\\\u09b0 \\\\u09ad\\\\u09c2\\\\u09ae\\\\u09bf\\\\u0995\\\\u09be \\\\u098f\\\\u09ac\\\\u0982 \\\\u098f\\\\u09a1\\\\u09bf\\\\u099f\\\\u09bf\\\\u0982\\\",\\\"\\\\u0985\\\\u09cd\\\\u09af\\\\u09be\\\\u09a1\\\\u09ad\\\\u09be\\\\u09a8\\\\u09cd\\\\u09b8\\\\u09a1 \\\\u098f\\\\u09a1\\\\u09bf\\\\u099f\\\\u09b0\\\",\\\"IF \\\\u09ab\\\\u09be\\\\u0982\\\\u09b6\\\\u09a8 \\\\u098f\\\\u09ac\\\\u0982 \\\\u09b8\\\\u09be\\\\u09a7\\\\u09be\\\\u09b0\\\\u09a3 M \\\\u09ab\\\\u09be\\\\u0982\\\\u09b6\\\\u09a8\\\"]\"', '2025-03-25 01:04:03', '2025-03-25 01:04:03'),
(4, 'কারিকুলাম', 'সপ্তাহ ৪', 'ডেটা মডেলিং এবং DAX-এর ভূমিকা', 'Shahriar Jahan Rafi', 'images/profile.png', '\"[\\\"\\\\u09aa\\\\u09b0\\\\u09bf\\\\u099a\\\\u09bf\\\\u09a4\\\\u09bf\\\",\\\"\\\\u09a1\\\\u09c7\\\\u099f\\\\u09be \\\\u09ae\\\\u09a1\\\\u09c7\\\\u09b2 \\\\u0995\\\\u09bf?\\\",\\\"\\\\u099f\\\\u09c7\\\\u09ac\\\\u09bf\\\\u09b2 \\\\u09b0\\\\u09bf\\\\u09b2\\\\u09c7\\\\u09b6\\\\u09a8\\\\u09b6\\\\u09bf\\\\u09aa \\\\u09a4\\\\u09c8\\\\u09b0\\\\u09bf\\\",\\\"\\\\u0985\\\\u09cd\\\\u09af\\\\u09be\\\\u0995\\\\u09cd\\\\u099f\\\\u09bf\\\\u09ad \\\\u098f\\\\u09ac\\\\u0982 \\\\u0987\\\\u09a8\\\\u0985\\\\u09cd\\\\u09af\\\\u09be\\\\u0995\\\\u09cd\\\\u099f\\\\u09bf\\\\u09ad \\\\u09b0\\\\u09bf\\\\u09b2\\\\u09c7\\\\u09b6\\\\u09a8\\\\u09b6\\\\u09bf\\\\u09aa\\\",\\\"\\\\u0985\\\\u099f\\\\u09cb\\\\u09ae\\\\u09c7\\\\u099f\\\\u09bf\\\\u0995 \\\\u09a1\\\\u09c7\\\\u099f \\\\u099f\\\\u09c7\\\\u09ac\\\\u09bf\\\\u09b2\\\",\\\"\\\\u09a1\\\\u09c7\\\\u099f \\\\u099f\\\\u09c7\\\\u09ac\\\\u09bf\\\\u09b2\\\\u09c7\\\\u09b0 \\\\u09aa\\\\u09cd\\\\u09b0\\\\u09af\\\\u09bc\\\\u09cb\\\\u099c\\\\u09a8\\\\u09c0\\\\u09af\\\\u09bc\\\\u09a4\\\\u09be\\\",\\\"\\\\u099f\\\\u09c7\\\\u09ac\\\\u09bf\\\\u09b2 \\\\u09aa\\\\u09cd\\\\u09b0\\\\u09aa\\\\u09be\\\\u09b0\\\\u09cd\\\\u099f\\\\u09bf\\\\u099c \\\\u098f\\\\u09ac\\\\u0982 \\\\u09aa\\\\u09cd\\\\u09b0\\\\u09be\\\\u0987\\\\u09ae\\\\u09be\\\\u09b0\\\\u09bf \\\\u0995\\\\u09bf\\\",\\\"DAX-\\\\u098f\\\\u09b0 \\\\u09ad\\\\u09c2\\\\u09ae\\\\u09bf\\\\u0995\\\\u09be\\\",\\\"\\\\u0995\\\\u09cd\\\\u09af\\\\u09be\\\\u09b2\\\\u0995\\\\u09c1\\\\u09b2\\\\u09c7\\\\u099f\\\\u09c7\\\\u09a1 \\\\u0995\\\\u09b2\\\\u09be\\\\u09ae \\\\u098f\\\\u09ac\\\\u0982 \\\\u09ae\\\\u09c7\\\\u099c\\\\u09be\\\\u09b0\\\",\\\"\\\\u0995\\\\u09c1\\\\u0987\\\\u0995 \\\\u09ae\\\\u09c7\\\\u099c\\\\u09be\\\\u09b0\\\",\\\"DAX \\\\u098f\\\\u09ac\\\\u0982 \\\\u09ae\\\\u09c7\\\\u099c\\\\u09be\\\\u09b0\\\\u09c7\\\\u09b0 \\\\u09ae\\\\u09a7\\\\u09cd\\\\u09af\\\\u09c7 \\\\u09aa\\\\u09be\\\\u09b0\\\\u09cd\\\\u09a5\\\\u0995\\\\u09cd\\\\u09af\\\",\\\"\\\\u09b8\\\\u09be\\\\u09a7\\\\u09be\\\\u09b0\\\\u09a3 DAX \\\\u09ab\\\\u09be\\\\u0982\\\\u09b6\\\\u09a8\\\"]\"', '2025-03-25 01:04:03', '2025-03-25 01:04:03'),
(5, 'কারিকুলাম', 'সপ্তাহ ৫', 'ডেটা মডেলিং – DAX (Data Analysis Expression)', 'Shahriar Jahan Rafi', 'images/profile.png', '\"[\\\"CALCULATE \\\\u098f\\\\u09ac\\\\u0982 \\\\u09ab\\\\u09bf\\\\u09b2\\\\u09cd\\\\u099f\\\\u09be\\\\u09b0\\\",\\\"LOOKUP\\\",\\\"GENERATE_SERIES\\\",\\\"Earlier\\\",\\\"RANKX\\\",\\\"\\\\u09ad\\\\u09cd\\\\u09af\\\\u09be\\\\u09b0\\\\u09bf\\\\u09af\\\\u09bc\\\\u09c7\\\\u09ac\\\\u09b2 \\\\u09a1\\\\u09bf\\\\u0995\\\\u09cd\\\\u09b2\\\\u09c7\\\\u09af\\\\u09bc\\\\u09be\\\\u09b0\\\",\\\"\\\\u0985\\\\u09cd\\\\u09af\\\\u09be\\\\u09a1\\\\u09ad\\\\u09be\\\\u09a8\\\\u09cd\\\\u09b8 \\\\u098f\\\\u09ac\\\\u0982 \\\\u09ac\\\\u09c7\\\\u09b8\\\\u09bf\\\\u0995 \\\\u09ab\\\\u09bf\\\\u09b2\\\\u09cd\\\\u099f\\\\u09be\\\\u09b0\\\",\\\"\\\\u09ae\\\\u09c7\\\\u099c\\\\u09be\\\\u09b0 \\\\u09ab\\\\u09cb\\\\u09b2\\\\u09cd\\\\u09a1\\\\u09be\\\\u09b0 \\\\u098f\\\\u09ac\\\\u0982 \\\\u099f\\\\u09c7\\\\u09ac\\\\u09bf\\\\u09b2\\\",\\\"DAX \\\\u099f\\\\u09c7\\\\u09ac\\\\u09bf\\\\u09b2\\\"]\"', '2025-03-25 01:04:03', '2025-03-25 01:04:03'),
(6, 'কারিকুলাম', 'সপ্তাহ ৬', 'ডেটা ভিজুয়ালাইজেশন – রিপোর্ট, ড্যাশবোর্ড এবং ডিপ্লয়মেন্ট', 'Shahriar Jahan Rafi', 'images/profile.png', '\"[\\\"Power BI Report View\\\",\\\"\\\\u0985\\\\u09ac\\\\u099c\\\\u09c7\\\\u0995\\\\u09cd\\\\u099f \\\\u098f\\\\u09ac\\\\u0982 \\\\u09ac\\\\u09c7\\\\u09b8\\\\u09bf\\\\u0995 \\\\u099a\\\\u09be\\\\u09b0\\\\u09cd\\\\u099f\\\",\\\"\\\\u09b0\\\\u09bf\\\\u09aa\\\\u09cb\\\\u09b0\\\\u09cd\\\\u099f \\\\u0987\\\\u09a8\\\\u09cd\\\\u099f\\\\u09be\\\\u09b0\\\\u0985\\\\u09cd\\\\u09af\\\\u09be\\\\u0995\\\\u09b6\\\\u09a8 \\\\u098f\\\\u09a1\\\\u09bf\\\\u099f\\\\u09bf\\\\u0982\\\",\\\"\\\\u09a1\\\\u09cd\\\\u09b0\\\\u09bf\\\\u09b2-\\\\u09a5\\\\u09cd\\\\u09b0\\\\u09c1 \\\\u09ab\\\\u09bf\\\\u09b2\\\\u09cd\\\\u099f\\\\u09be\\\\u09b0\\\",\\\"\\\\u09b8\\\\u09bf\\\\u09b2\\\\u09c7\\\\u0995\\\\u09b6\\\\u09a8 \\\\u098f\\\\u09ac\\\\u0982 \\\\u09ac\\\\u09c1\\\\u0995\\\\u09ae\\\\u09be\\\\u09b0\\\\u09cd\\\\u0995\\\",\\\"\\\\u0995\\\\u09be\\\\u09b8\\\\u09cd\\\\u099f\\\\u09ae \\\\u09ad\\\\u09bf\\\\u099c\\\\u09c1\\\\u09af\\\\u09bc\\\\u09be\\\\u09b2 \\\\u0987\\\\u09ae\\\\u09aa\\\\u09cb\\\\u09b0\\\\u09cd\\\\u099f\\\",\\\"Power BI Service-\\\\u098f \\\\u09b0\\\\u09bf\\\\u09aa\\\\u09cb\\\\u09b0\\\\u09cd\\\\u099f \\\\u09aa\\\\u09be\\\\u09ac\\\\u09b2\\\\u09bf\\\\u09b6\\\",\\\"Power BI Service-\\\\u098f \\\\u09a1\\\\u09cd\\\\u09af\\\\u09be\\\\u09b6\\\\u09ac\\\\u09cb\\\\u09b0\\\\u09cd\\\\u09a1 \\\\u09a4\\\\u09c8\\\\u09b0\\\\u09bf\\\",\\\"\\\\u0993\\\\u09af\\\\u09bc\\\\u09c7\\\\u09ac \\\\u098f\\\\u09ac\\\\u0982 \\\\u09ae\\\\u09cb\\\\u09ac\\\\u09be\\\\u0987\\\\u09b2 \\\\u09b2\\\\u09c7\\\\u0986\\\\u0989\\\\u099f\\\"]\"', '2025-03-25 01:04:03', '2025-03-25 01:04:03'),
(7, 'কারিকুলাম', 'সপ্তাহ ৭', 'রিপোর্ট উন্নতকরণ এবং শেয়ারিং', 'Shahriar Jahan Rafi', 'images/profile.png', '\"[\\\"\\\\u099a\\\\u09be\\\\u09b0\\\\u09cd\\\\u099f \\\\u099f\\\\u09be\\\\u0987\\\\u09aa \\\\u098f\\\\u09ac\\\\u0982 \\\\u0985\\\\u09cd\\\\u09af\\\\u09be\\\\u09a8\\\\u09be\\\\u09b2\\\\u09bf\\\\u099f\\\\u09bf\\\\u0995 \\\\u0985\\\\u09aa\\\\u09b6\\\\u09a8\\\",\\\"AI \\\\u09ad\\\\u09bf\\\\u099c\\\\u09c1\\\\u09af\\\\u09bc\\\\u09be\\\\u09b2 \\\\u098f\\\\u09ac\\\\u0982 Q&A\\\",\\\"\\\\u09b8\\\\u09cd\\\\u09b2\\\\u09be\\\\u0987\\\\u09b8\\\\u09be\\\\u09b0 \\\\u098f\\\\u09ac\\\\u0982 \\\\u09ab\\\\u09bf\\\\u09b2\\\\u09cd\\\\u099f\\\\u09be\\\\u09b0\\\\u09bf\\\\u0982 \\\\u0985\\\\u09aa\\\\u09b6\\\\u09a8\\\",\\\"\\\\u09b0\\\\u09bf\\\\u09aa\\\\u09cb\\\\u09b0\\\\u09cd\\\\u099f \\\\u09aa\\\\u09be\\\\u09ac\\\\u09b2\\\\u09bf\\\\u09b6 \\\\u098f\\\\u09ac\\\\u0982 \\\\u09b6\\\\u09c7\\\\u09af\\\\u09bc\\\\u09be\\\\u09b0\\\\u09bf\\\\u0982\\\",\\\"\\\\u0987\\\\u09ae\\\\u09c7\\\\u09b2 \\\\u09b8\\\\u09be\\\\u09ac\\\\u09b8\\\\u09cd\\\\u0995\\\\u09cd\\\\u09b0\\\\u09bf\\\\u09aa\\\\u09b6\\\\u09a8 \\\\u098f\\\\u09ac\\\\u0982 \\\\u0985\\\\u09cd\\\\u09af\\\\u09be\\\\u099f\\\\u09be\\\\u099a\\\\u09ae\\\\u09c7\\\\u09a8\\\\u09cd\\\\u099f \\\\u09b6\\\\u09bf\\\\u09a1\\\\u09bf\\\\u0989\\\\u09b2\\\",\\\"\\\\u09b0\\\\u09bf\\\\u09aa\\\\u09cb\\\\u09b0\\\\u09cd\\\\u099f \\\\u098f\\\\u0995\\\\u09cd\\\\u09b8\\\\u09aa\\\\u09cb\\\\u09b0\\\\u09cd\\\\u099f \\\\u098f\\\\u09ac\\\\u0982 \\\\u098f\\\\u09ae\\\\u09cd\\\\u09ac\\\\u09c7\\\\u09a1\\\",\\\"PowerPoint-\\\\u098f \\\\u09b0\\\\u09bf\\\\u09aa\\\\u09cb\\\\u09b0\\\\u09cd\\\\u099f \\\\u098f\\\\u09ae\\\\u09cd\\\\u09ac\\\\u09c7\\\\u09a1\\\",\\\"\\\\u09a1\\\\u09c7\\\\u099f\\\\u09be\\\\u09b8\\\\u09c7\\\\u099f \\\\u09b0\\\\u09bf\\\\u09ab\\\\u09cd\\\\u09b0\\\\u09c7\\\\u09b6 \\\\u098f\\\\u09ac\\\\u0982 RLS (Row-Level Security)\\\",\\\"RLS \\\\u09aa\\\\u09cd\\\\u09b0\\\\u09af\\\\u09bc\\\\u09cb\\\\u0997 \\\\u098f\\\\u09ac\\\\u0982 \\\\u0987\\\\u0989\\\\u099c\\\\u09be\\\\u09b0 \\\\u09b0\\\\u09cb\\\\u09b2 \\\\u09b8\\\\u09c7\\\\u099f\\\\u0986\\\\u09aa\\\",\\\"Power BI Service-\\\\u098f \\\\u0985\\\\u09cd\\\\u09af\\\\u09be\\\\u09aa \\\\u09aa\\\\u09cd\\\\u09b0\\\\u0995\\\\u09be\\\\u09b6 \\\\u098f\\\\u09ac\\\\u0982 \\\\u09a1\\\\u09c7\\\\u099f\\\\u09be \\\\u09b2\\\\u09bf\\\\u09a8\\\\u09bf\\\\u09af\\\\u09bc\\\\u09c7\\\\u099c\\\"]\"', '2025-03-25 01:04:03', '2025-03-25 01:04:03');

-- --------------------------------------------------------

--
-- Table structure for table `enrollment_points`
--

CREATE TABLE `enrollment_points` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `point` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `enrollment_points`
--

INSERT INTO `enrollment_points` (`id`, `point`, `created_at`, `updated_at`) VALUES
(1, '💼 যারা কোনো কোডিং নলেজ ছাড়াই ডাটা বিশ্লেষণের মাধ্যমে সিদ্ধান্ত নিতে চান।', '2025-03-25 01:04:03', '2025-03-25 01:04:03'),
(2, '📊 বিজনেস এবং ডাটা এনালিটিক্সে ক্যারিয়ার গড়তে ইচ্ছুক শিক্ষার্থীরা।', '2025-03-25 01:04:03', '2025-03-25 01:04:03'),
(3, '🎓 যেকোনো ব্যাকগ্রাউন্ডের শিক্ষার্থী, যারা ডাটা সায়েন্স এবং বিশ্লেষণে দক্ষতা অর্জন করতে চান।', '2025-03-25 01:04:03', '2025-03-25 01:04:03'),
(4, '🔄 পেশাজীবীরা, যারা ক্যারিয়ার সুইচ করে ডাটা অ্যানালিটিক্স সেক্টরে প্রবেশ করতে চান।', '2025-03-25 01:04:03', '2025-03-25 01:04:03'),
(5, '🔄 পেশাজীবীরা, যারা ক্যারিয়ার সুইচ করে ডাটা অ্যানালিটিক্স সেক্টরে প্রবেশ করতে চান।', '2025-03-25 01:04:03', '2025-03-25 01:04:03'),
(6, '🌍 ফ্রিল্যান্সারদের জন্য যারা গ্লোবাল মার্কেটে ড্যাশবোর্ড এবং ডাটা অ্যানালাইসিস পরিষেবা দিতে চান।', '2025-03-25 01:04:03', '2025-03-25 01:04:03');

-- --------------------------------------------------------

--
-- Table structure for table `enrolls`
--

CREATE TABLE `enrolls` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `section_title` varchar(255) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `enroll_url` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `enrolls`
--

INSERT INTO `enrolls` (`id`, `section_title`, `title`, `enroll_url`, `created_at`, `updated_at`) VALUES
(1, 'এনালাইজিং ডাটা উইথ মাইক্রোসফট পাওয়ার বিআই (২৪ ব্যাচ)', '২৪তম ব্যাচ এ Enroll করুন', 'https://forms.gle/YEYxLYr1fdtznTrs9', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question` text NOT NULL,
  `answer` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id`, `question`, `answer`, `created_at`, `updated_at`) VALUES
(1, 'প্রশ্ন ১: Power BI কী?', 'Power BI একটি বিজনেস অ্যানালিটিক্স টুল, যা আপনাকে ডাটা ভিজ্যুয়ালাইজেশন তৈরি করতে এবং বিভিন্ন উৎস থেকে ডাটা সংগ্রহ ও বিশ্লেষণ করে অর্থবহ ইনসাইট বের করতে সাহায্য করে।', NULL, NULL),
(2, 'প্রশ্ন ২: এই কোর্সে কী কী শিখানো হবে?', 'Power BI এর বেসিক থেকে অ্যাডভান্সড লেভেল\n        ডাটা মডেলিং, ড্যাশবোর্ড এবং রিপোর্ট তৈরি\n        DAX (Data Analysis Expressions) ব্যবহার করে ডাটা অ্যানালাইসিস\n        বিভিন্ন API এবং ডাটা সোর্সের সাথে কাজ করা', NULL, NULL),
(3, 'প্রশ্ন ৩: Power BI শেখার জন্য কি কোডিং জানতে হবে?', 'না, Power BI শেখার জন্য কোডিং জানতে হবে না। এটি ব্যবহারকারী-বান্ধব একটি টুল যা নন-টেকনিক্যাল ব্যক্তিদের জন্যও উপযোগী।', NULL, NULL),
(4, 'প্রশ্ন ৪: কে এই কোর্সটি করতে পারবেন?', 'যেকোনো শিক্ষার্থী বা পেশাজীবী\n        বিজনেস অ্যানালিটিক্স এবং ডাটা সায়েন্সে আগ্রহী ব্যক্তিরা\n        যারা ক্যারিয়ার সুইচ করতে চান\n        ফ্রিল্যান্সাররা যারা ডাটা অ্যানালাইসিস এবং ড্যাশবোর্ড তৈরি করতে চান', NULL, NULL),
(5, 'প্রশ্ন ৫: এই কোর্স করার জন্য পূর্ব অভিজ্ঞতা কি প্রয়োজন?', 'না, এই কোর্সটি বিগিনার থেকে অ্যাডভান্সড সকল লেভেলের শিক্ষার্থীদের জন্য ডিজাইন করা হয়েছে।', NULL, NULL),
(6, 'প্রশ্ন ৬: Power BI কোথায় ব্যবহৃত হয়?', 'বিজনেস অ্যানালিটিক্স\n        মার্কেট রিসার্চ\n        সেলস এবং ফিনান্স রিপোর্টিং\n        প্রোজেক্ট ম্যানেজমেন্ট\n        বিভিন্ন ইন্ডাস্ট্রিতে ডাটা-চালিত সিদ্ধান্ত গ্রহণ', NULL, NULL),
(7, 'প্রশ্ন ৭: Power BI দিয়ে কী ধরনের কাজ করা যায়?', 'ডাটা ভিজ্যুয়ালাইজেশন এবং রিপোর্ট তৈরি\n        রিয়েল-টাইম ড্যাশবোর্ড তৈরি\n        ডাটা মডেলিং এবং বিশ্লেষণ\n        বিভিন্ন ডাটা সোর্স সংযোগ এবং ডাটা ক্লিনিং', NULL, NULL),
(8, 'প্রশ্ন ৮: কোর্স শেষে কী সুবিধা পাওয়া যাবে?', 'Power BI এর উপর প্রফেশনাল সার্টিফিকেট\n        রিয়েল-ওয়ার্ল্ড প্রজেক্টে কাজ করার অভিজ্ঞতা\n        ফ্রিল্যান্সিং বা কর্পোরেট সেক্টরে কাজের সুযোগ', NULL, NULL),
(9, 'প্রশ্ন ৯: কোর্স শেষে কি চাকরির সুযোগ থাকবে?', 'হ্যাঁ, স্কিল জবসের অংশীদার প্রতিষ্ঠানের মাধ্যমে চাকরি সংক্রান্ত সহায়তা প্রদান করা হবে।', NULL, NULL),
(10, 'প্রশ্ন ১০: আমি কীভাবে রেজিস্ট্রেশন করব?', 'রেজিস্ট্রেশন করতে ভিজিট করুন: https://powerbi.skill.jobs/ অথবা কল করুন +880 184-733-4766।', NULL, NULL),
(11, 'প্রশ্ন ১১: Power BI কীভাবে ডাউনলোড করব?', 'Power BI Desktop বিনামূল্যে ডাউনলোড করা যায়। মাইক্রোসফটের অফিসিয়াল ওয়েবসাইট থেকে এটি ডাউনলোড করতে পারেন।', NULL, NULL),
(12, 'প্রশ্ন ১২: এই কোর্সের সময়কাল কত?', 'কোর্সটি সাধারণত ৩০ ঘণ্টার লাইভ সেশন এবং বাস্তব প্রজেক্ট ভিত্তিক কাজের জন্য ৩-৪ সপ্তাহ সময় নেয়।', NULL, NULL),
(13, 'প্রশ্ন ১৩: Power BI শেখার মাধ্যমে আমি কী ধরনের চাকরির সুযোগ পেতে পারি?', 'Data Analyst\n        Business Intelligence Analyst\n        Reporting Analyst\n        Power BI Developer\n        Dashboard Designer', NULL, NULL),
(14, 'প্রশ্ন ১৪: এই কোর্সে কী ধরনের প্রজেক্টে কাজ করার সুযোগ থাকবে?', 'সেলস এবং মার্কেটিং রিপোর্টিং\n        ফিনান্স এবং বাজেট অ্যানালাইসিস\n        ক্লায়েন্ট ম্যানেজমেন্ট ড্যাশবোর্ড\n        রিয়েল-টাইম ডাটা ট্র্যাকিং প্রজেক্ট', NULL, NULL),
(15, 'প্রশ্ন ১৫: DAX (Data Analysis Expressions) কি, এবং এটি কেন গুরুত্বপূর্ণ?', 'DAX হল একটি ফর্মুলা ল্যাঙ্গুয়েজ যা Power BI-তে ডাটা অ্যানালাইসিস এবং জটিল গণনার জন্য ব্যবহৃত হয়। এটি আপনার ড্যাশবোর্ড এবং রিপোর্টিং-কে আরও কার্যকর করে তোলে।', NULL, NULL),
(16, 'প্রশ্ন ১৬: Power BI ব্যবহার করে কি ফ্রিল্যান্সিং করা যায়?', 'অবশ্যই! Power BI শেখার পর ফ্রিল্যান্স প্ল্যাটফর্ম যেমন Upwork, Fiverr, এবং Freelancer-এ কাজ করতে পারবেন। ড্যাশবোর্ড ডিজাইন এবং ডাটা অ্যানালাইসিসের জন্য অনেক চাহিদা রয়েছে।', NULL, NULL),
(17, 'প্রশ্ন ১৭: কোর্স শেষে সার্টিফিকেট কীভাবে পাব?', 'কোর্সের সমস্ত মডিউল এবং ফাইনাল প্রজেক্ট সফলভাবে সম্পন্ন করার পর, স্কিল জবস থেকে একটি প্রফেশনাল সার্টিফিকেট প্রদান করা হবে।', NULL, NULL),
(18, 'প্রশ্ন ১৮: কি ধরনের ডাটা সোর্স Power BI-তে সাপোর্ট করে?', 'Power BI বিভিন্ন ডাটা সোর্স যেমন Excel, SQL Server, Google Sheets, Azure, এবং APIs থেকে ডাটা ইন্টিগ্রেট করতে পারে।', NULL, NULL),
(19, 'প্রশ্ন ১৯: Power BI কি একাডেমিক ব্যাকগ্রাউন্ডে প্রভাব ফেলে?', 'হ্যাঁ, একাডেমিক গবেষণা, রিপোর্টিং এবং উপস্থাপনা তৈরির ক্ষেত্রে Power BI খুবই কার্যকর।', NULL, NULL),
(20, 'প্রশ্ন ২০: Power BI কি সেলস এবং মার্কেটিং টিমের জন্য উপযোগী?', 'হ্যাঁ, Power BI সেলস এবং মার্কেটিং টিমকে তাদের পারফরম্যান্স ট্র্যাক, টার্গেট নির্ধারণ এবং মার্কেট ট্রেন্ড বিশ্লেষণ করতে সহায়তা করে।', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `footer_data`
--

CREATE TABLE `footer_data` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `courses` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`courses`)),
  `resources` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`resources`)),
  `legal` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`legal`)),
  `contact` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`contact`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `footer_data`
--

INSERT INTO `footer_data` (`id`, `courses`, `resources`, `legal`, `contact`, `created_at`, `updated_at`) VALUES
(1, '[{\"name\":\"Full Stack Web Development\",\"url\":\"#\"},{\"name\":\"Microsoft Power BI\",\"url\":\"#\"},{\"name\":\"Video Editing\",\"url\":\"#\"}]', '[{\"name\":\"About Us\",\"url\":\"#\"},{\"name\":\"Blog\",\"url\":\"#\"},{\"name\":\"Contact Us\",\"url\":\"#\"}]', '[{\"name\":\"Terms & Conditions\",\"url\":\"#\"},{\"name\":\"Privacy Policy\",\"url\":\"#\"},{\"name\":\"Refund Policy\",\"url\":\"#\"}]', '{\"address\":\"DT4, 102\\/1 Shukrabad, Mirpur Road, Dhanmondi, Dhaka-1207\",\"phone\":[\"+880 184-733-4766\",\"+880 184-702-7537\"],\"email\":\"info@skill.jobs\"}', '2025-03-25 01:04:03', '2025-03-25 01:04:03');

-- --------------------------------------------------------

--
-- Table structure for table `graduates`
--

CREATE TABLE `graduates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `graduates`
--

INSERT INTO `graduates` (`id`, `image`, `created_at`, `updated_at`) VALUES
(1, 'images/1.jpg', NULL, NULL),
(2, 'images/2.jpg', NULL, NULL),
(3, 'images/3.jpg', NULL, NULL),
(4, 'images/4.jpg', NULL, NULL),
(5, 'images/5.jpg', NULL, NULL),
(6, 'images/6.jpg', NULL, NULL),
(7, 'images/7.jpg', NULL, NULL),
(8, 'images/8.jpg', NULL, NULL),
(9, 'images/9.jpg', NULL, NULL),
(10, 'images/10.jpg', NULL, NULL),
(11, 'images/11.jpg', NULL, NULL),
(12, 'images/12.jpg', NULL, NULL),
(13, 'images/13.jpg', NULL, NULL),
(14, 'images/14.jpg', NULL, NULL),
(15, 'images/15.jpg', NULL, NULL),
(16, 'images/16.jpg', NULL, NULL),
(17, 'images/17.jpg', NULL, NULL),
(18, 'images/18.jpg', NULL, NULL),
(19, 'images/19.jpg', NULL, NULL),
(20, 'images/20.jpg', NULL, NULL),
(21, 'images/21.jpg', NULL, NULL),
(22, 'images/22.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `instructors`
--

CREATE TABLE `instructors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `designation` text NOT NULL,
  `organization` text NOT NULL,
  `experience` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`experience`)),
  `education` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`education`)),
  `skills` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`skills`)),
  `certifications` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`certifications`)),
  `profile_image` varchar(255) DEFAULT NULL,
  `linkedin` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `instructors`
--

INSERT INTO `instructors` (`id`, `name`, `designation`, `organization`, `experience`, `education`, `skills`, `certifications`, `profile_image`, `linkedin`, `created_at`, `updated_at`) VALUES
(1, 'Md. Mahabub Alam', 'বিজনেস ডেটা এনালিস্ট', 'Dependable Solutions Inc., CA, USA', '\"[\\\"14+ years in Business Data Analysis & Visualization\\\",\\\"Currently working as an Operations Analyst at Dependable Solutions Inc., CA, USA\\\",\\\"BI Project Consultant at Logic Software Ltd.\\\",\\\"8+ years of experience in Training & Resource Development\\\"]\"', '\"[\\\"PGD in IT, Jahangirnagar University\\\",\\\"MBA in Finance, Presidency University\\\",\\\"BBA in Finance, Presidency University\\\"]\"', '\"[\\\"Power BI\\\",\\\"Google Studio\\\",\\\"\\\\u09a1\\\\u09c7\\\\u099f\\\\u09be \\\\u09ac\\\\u09bf\\\\u09b6\\\\u09cd\\\\u09b2\\\\u09c7\\\\u09b7\\\\u09a3\\\",\\\"\\\\u09ac\\\\u09cd\\\\u09af\\\\u09ac\\\\u09b8\\\\u09be\\\\u09af\\\\u09bc\\\\u09bf\\\\u0995 \\\\u09ac\\\\u09bf\\\\u09b6\\\\u09cd\\\\u09b2\\\\u09c7\\\\u09b7\\\\u09a3\\\",\\\"\\\\u09ad\\\\u09bf\\\\u099c\\\\u09c1\\\\u09af\\\\u09bc\\\\u09be\\\\u09b2\\\\u09be\\\\u0987\\\\u099c\\\\u09c7\\\\u09b6\\\\u09a8\\\",\\\"\\\\u09ac\\\\u09cd\\\\u09af\\\\u09ac\\\\u09b8\\\\u09be\\\\u09af\\\\u09bc\\\\u09bf\\\\u0995 \\\\u0987\\\\u09a8\\\\u09cd\\\\u099f\\\\u09c7\\\\u09b2\\\\u09bf\\\\u099c\\\\u09c7\\\\u09a8\\\\u09cd\\\\u09b8\\\",\\\"Office 365\\\"]\"', '\"[\\\"Microsoft Certified: Power BI Data Analyst Associate (2023-2025)\\\",\\\"Analytics & BI Engineering, Value Base Academy (2021)\\\",\\\"Management & Leadership Development, icddr,b (2018)\\\",\\\"Applied Statistics using SPSS, ISRT, Dhaka University (2018)\\\"]\"', 'images/profile.png', 'https://www.linkedin.com/in/md-mahabub-alam', '2025-03-25 01:04:03', '2025-03-25 01:04:03');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_03_19_185159_create_nav_links_table', 1),
(5, '2025_03_20_070007_create_tools_table', 1),
(6, '2025_03_20_070049_create_course_data_table', 1),
(7, '2025_03_20_070127_create_course_summaries_table', 1),
(8, '2025_03_20_070223_create_course_offerings_table', 1),
(9, '2025_03_20_070304_create_enrollment_points_table', 1),
(10, '2025_03_20_070341_create_instructors_table', 1),
(11, '2025_03_20_070414_create_requirements_table', 1),
(12, '2025_03_20_070451_create_faqs_table', 1),
(13, '2025_03_20_070526_create_testimonials_table', 1),
(14, '2025_03_20_070600_create_graduates_table', 1),
(15, '2025_03_20_070636_create_footer_data_table', 1),
(16, '2025_03_20_072542_create_curriculums_table', 1),
(17, '2025_03_20_080201_create_course_details_table', 1),
(18, '2025_03_24_073443_create_certificates_table', 1),
(19, '2025_03_24_074010_create_enrolls_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `nav_links`
--

CREATE TABLE `nav_links` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `route` varchar(255) NOT NULL,
  `text` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nav_links`
--

INSERT INTO `nav_links` (`id`, `route`, `text`, `created_at`, `updated_at`) VALUES
(1, 'home', 'Home', NULL, NULL),
(2, 'courses', 'Courses', NULL, NULL),
(3, 'online-course', 'Online Courses', NULL, NULL),
(4, 'workshop', 'Workshop', NULL, NULL),
(5, 'free-class', 'Free Class', NULL, NULL),
(6, 'events', 'Events', NULL, NULL),
(7, 'contact-us', 'Contact', NULL, NULL),
(8, 'short-course', 'Short Course', NULL, NULL),
(9, 'back-to-skills', 'Back To Skills', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `requirements`
--

CREATE TABLE `requirements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `requirements`
--

INSERT INTO `requirements` (`id`, `image`, `title`, `created_at`, `updated_at`) VALUES
(1, 'images/ল্যাপটপ_ডেস্কটপ.png', 'একটি ল্যাপটপ বা পিসি', NULL, NULL),
(2, 'images/ভালো ইন্টারনেট কানেকশন.png', 'ভালো ইন্টারনেট কানেকশন', NULL, NULL),
(3, 'images/প্রোগ্রামিং ফান্ডামেন্টালস জানা থাকলে ভালো.png', 'ক্যারিয়ার ফোকাসড', NULL, NULL),
(4, 'images/স্নাতক অধ্যয়নরত.png', 'স্নাতক অধ্যয়নরত বা স্নাতক পাশ', NULL, NULL),
(5, 'images/ক্যারিয়ার ফোকাসড.png', 'লেগে থাকার মানসিকতা', NULL, NULL),
(6, 'images/প্রোগ্রেস ট্র্যাকিং.png', 'ডাটা বিশ্লেষণের আগ্রহ', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('3iHQ6iilA6n9jnQCYbw2nCJ8Ug7bYohFlrG8ZY3m', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiNUtQeGo3dm5DNk1YMWJaeDBvUWFuMWZPcFphbWc3dFpwQU5lWmU5UiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6MzoidXJsIjthOjE6e3M6ODoiaW50ZW5kZWQiO3M6NDA6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi9jb3Vyc2UtZGF0YXMiO319', 1742886344);

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `name`, `image`, `title`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Sukanta Shuvo', 'images/Sukanta.jpg', 'আমি স্কিল জবস থেকে Power BI কোর্সটি সম্পন্ন করেছি এবং এটি একটি দুর্দান্ত অভিজ্ঞতা ছিল।', 'কোর্সের কনটেন্ট খুব ভালোভাবে সাজানো এবং প্রজেক্টভিত্তিক শিক্ষার মাধ্যমে আমি ড্যাশবোর্ড তৈরি ও ডেটা বিশ্লেষণের দক্ষতা অর্জন করেছি। দক্ষ মেন্টরদের সহায়তায় এই কোর্সটি আমাকে আত্মবিশ্বাস দিয়েছে। যারা ডেটা অ্যানালাইসিস শিখতে চান, তাদের জন্য আমি এই কোর্সটি সুপারিশ করছি।', NULL, NULL),
(2, 'MD. MOHIUDDIN HASAN', 'images/MOHIUDDIN.jpg', 'Power BI কোর্সটি আমার জন্য ক্যারিয়ার পরিবর্তনের একটি বড় সুযোগ তৈরি করেছে।', 'স্কিল জবসের এই কোর্সের মাধ্যমে আমি ডেটা ভিজ্যুয়ালাইজেশন এবং ইন্টারঅ্যাকটিভ ড্যাশবোর্ড তৈরির দক্ষতা অর্জন করেছি। মেন্টরদের গাইডেন্স এবং বাস্তব জীবনের প্রজেক্টে কাজ করার অভিজ্ঞতা আমাকে অনেক সাহায্য করেছে। যারা ডেটা অ্যানালাইসিসে ক্যারিয়ার শুরু করতে চান, তাদের জন্য এটি আদর্শ।', NULL, NULL),
(3, 'Md. Mahabub Hossain', 'images/Mahabub.jpg', 'স্কিল জবসের Power BI কোর্স আমাকে নতুন দৃষ্টিভঙ্গি শিখিয়েছে।', 'কোর্সটি এমনভাবে ডিজাইন করা হয়েছে, যা কোডিং না জানলেও ডেটা বিশ্লেষণ শিখতে সহায়ক। কেস স্টাডি এবং লাইভ ক্লাস আমাকে বাস্তব কাজের জন্য প্রস্তুত করেছে। এটি ডেটা অ্যানালাইসিস এবং ড্যাশবোর্ড তৈরিতে আমার দক্ষতা বাড়িয়েছে।', NULL, NULL),
(4, 'Donald Jerry Corraya', 'images/Donald.jpg', 'Power BI কোর্সটি আমাকে ডেটা-চালিত সিদ্ধান্ত গ্রহণের জন্য দক্ষ করেছে।', 'স্কিল জবসের মাধ্যমে আমি শিখেছি কীভাবে বিভিন্ন ডাটা সোর্সের সাথে কাজ করতে হয় এবং তা থেকে গুরুত্বপূর্ণ ইনসাইট তৈরি করতে হয়। এই কোর্সটি খুবই ইফেক্টিভ ছিল এবং মেন্টরদের সহায়তায় আমি অনেক আত্মবিশ্বাস পেয়েছি।', NULL, NULL),
(5, 'Sirazam Manira', 'images/Sirazam.jpg', 'Power BI কোর্সটি আমার ফ্রিল্যান্সিং ক্যারিয়ারে নতুন সুযোগ তৈরি করেছে।', 'এই কোর্সের মাধ্যমে আমি ড্যাশবোর্ড তৈরি ও ডেটা বিশ্লেষণে দক্ষতা অর্জন করেছি। এখন আমি আন্তর্জাতিক ক্লায়েন্টদের জন্য কাজ করতে পারছি। বাস্তব জীবনের উদাহরণ এবং মেন্টরশিপ আমাকে দক্ষ হতে সাহায্য করেছে। আমি এই কোর্সটি সবার জন্য সুপারিশ করছি।', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tools`
--

CREATE TABLE `tools` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tools`
--

INSERT INTO `tools` (`id`, `name`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Microsoft Power BI', 'images/powerbi.png', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin User', 'admin@example.com', NULL, '$2y$12$lGKCo3wPuIisGhjB9nTpLe4dCtLA0FRNO7MbzABb/Uz6f9dWcjxJG', 1, NULL, '2025-03-25 01:04:03', '2025-03-25 01:04:03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `certificates`
--
ALTER TABLE `certificates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses_details`
--
ALTER TABLE `courses_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_data`
--
ALTER TABLE `course_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_offerings`
--
ALTER TABLE `course_offerings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_summaries`
--
ALTER TABLE `course_summaries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `curriculums`
--
ALTER TABLE `curriculums`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `enrollment_points`
--
ALTER TABLE `enrollment_points`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `enrolls`
--
ALTER TABLE `enrolls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `footer_data`
--
ALTER TABLE `footer_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `graduates`
--
ALTER TABLE `graduates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `instructors`
--
ALTER TABLE `instructors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nav_links`
--
ALTER TABLE `nav_links`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `requirements`
--
ALTER TABLE `requirements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tools`
--
ALTER TABLE `tools`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `certificates`
--
ALTER TABLE `certificates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `courses_details`
--
ALTER TABLE `courses_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `course_data`
--
ALTER TABLE `course_data`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `course_offerings`
--
ALTER TABLE `course_offerings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `course_summaries`
--
ALTER TABLE `course_summaries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `curriculums`
--
ALTER TABLE `curriculums`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `enrollment_points`
--
ALTER TABLE `enrollment_points`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `enrolls`
--
ALTER TABLE `enrolls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `footer_data`
--
ALTER TABLE `footer_data`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `graduates`
--
ALTER TABLE `graduates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `instructors`
--
ALTER TABLE `instructors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `nav_links`
--
ALTER TABLE `nav_links`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `requirements`
--
ALTER TABLE `requirements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tools`
--
ALTER TABLE `tools`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
