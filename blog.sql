-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 12, 2024 at 12:21 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(50) DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`, `image`, `date_created`) VALUES
(9, 'PHP', 'uploads/categories/php.png_659bf66a369fe.png', '2024-01-08 13:19:38'),
(10, 'Javascript', 'uploads/categories/js.png_659bf67b9d7b1.png', '2024-01-08 13:19:55'),
(11, 'Typescript', 'uploads/categories/1.png_659d45c8aa8f5.png', '2024-01-09 13:10:32'),
(12, 'Tailwindcss', 'uploads/categories/tailwindcss.png_659d465590c0d.png', '2024-01-09 13:12:53'),
(13, 'Nestjs', 'uploads/categories/nest.png_659d466253bb2.png', '2024-01-09 13:13:06'),
(14, 'Nextjs', 'uploads/categories/typ.png_659d467078bc5.png', '2024-01-09 13:13:20'),
(15, 'Nodejs', 'uploads/categories/nodejs.png_659d4785c60c7.png', '2024-01-09 13:17:57');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `title` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `views` int(10) UNSIGNED DEFAULT 0,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp(),
  `archived` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `user_id`, `category_id`, `title`, `content`, `image`, `views`, `date_created`, `archived`) VALUES
(16, 2, 11, '6 Advanced TypeScript tricks for Clean Code', 'Six advanced TypeScript tips will be covered here, along with examples showing how each one works step by step and their benefits. By using these tips in your own TypeScript code, you not only raise the general standard of your writing but also grow your skills as a TypeScript programmer.', 'uploads/posts/b27d649bc2bfbd2b47205d6c2e6faab3.webp_659d4cfeb2e0b.webp', 3, '2024-01-09 13:41:18', 1),
(17, 2, 11, '5 Tips To Improve Your TypeScript Code', 'TypeScript is rapidly gaining popularity as a way to write type-safer, maintainable JavaScript code. However, while it is relatively easy to start, mastering it requires knowledge of its advanced features; learning TypeScript isn’t always easy. This article will cover five tips that will help you improve your TypeScript code, from using set theory to mastering enums and generics.\r\n\r\nThe tips in this article will help you utilize TypeScript’s type-checking to its full potential, producing improved code quality for your server and web development tasks. To get the most out of this text and become a great software developer, you must have sufficient knowledge of JavaScript, including variables, data types, and methods. To follow along with code samples provided in this article, you can make use of the official TypeScript playground.\r\n\r\nWhen you are ready, let’s dive in.', 'uploads/posts/51c9c98fd2f5725146f65d2ef828dc88.webp_659d4d4a70c2e.webp', 2, '2024-01-09 13:42:34', 1),
(18, 2, 14, 'Next.js 13.5', 'We\'ve made an exciting breakthrough to optimize package imports, improving both local dev performance and production cold starts, when using large icon or component libraries or other dependencies that re-export hundreds or thousands of modules.\r\n\r\nPreviously, we added support for modularizeImports, enabling you to configure how imports should resolve when using these libraries. In 13.5, we have superseeded this option with optimizePackageImports, which doesn\'t require you to specify the mapping of imports, but instead will automatically optimize imports for you.\r\n\r\nLibraries like @mui/icons-material, @mui/material, date-fns, lodash, lodash-es, ramda, react-bootstrap, @headlessui/react ,@heroicons/react , and lucide-react are now automatically optimized, only loading the modules you are actually using, while still giving you the convenience of writing import statements with many named exports.', 'uploads/posts/c7bc48c86ecf377a0dd94dd19e742780.webp_659d4d9a1eaa9.webp', 3, '2024-01-09 13:43:54', 1),
(19, 2, 14, 'Next.js Enterprise Project Structure', 'During a course on Enterprise Architecture Patterns by Łukasz Ruebbelke, I was introduced to the idea of \"The Iron Triangle of Programming\".\r\n\r\nThe concept is around about three pillars of code that when left poorly managed tend towards programmer purgatory. These concepts are:\r\nThe first change that we are aiming to make to opt to use a src folder to host our Next.js code.\r\n\r\nUsing src is documented under the Next.js src directory documentation.\r\n\r\nThe aim of this is to separate our application code from our top-level configuration.\r\n\r\nIf you have written a large Next.js project before, you\'ll notice that the top-level folders start to become unruly as you add more and more top-level folders to separate our application concerns.\r\n\r\nPlacing them within src enables us to keep our top-level folders clean and organized as well as have a mutual understanding across developers about where code for the application belongs.\r\n\r\nFor this project, we can move pages and styles into src.', 'uploads/posts/fb867d8b688a2d5cfadd59965e7dd822.webp_659d4e124c97d.webp', 3, '2024-01-09 13:45:54', 1),
(20, 10, 12, 'Why Tailwind CSS Won', 'Tailwind CSS is the new ubiquitous frontend framework. It replaces a generation of sites built with Twitter Bootstrap. However, Tailwind CSS is not a UI framework itself but has become synonymous to some degree with the UI components shipped through Tailwind UI (which is a UI framework). Why did Tailwind CSS become so popular? A few hypotheses:\r\n\r\nNo context switching from application logic. The tagline on the website reads, “Rapidly build modern websites without ever leaving your HTML.” That’s partly true, but few developers are writing HTML (instead, they are writing JSX or TSX). Switching to a CSS file to change styles is a costly context switch. Instead, developers write CSS as utility classes right in their application. This also vastly simplifies complex CSS build pipelines (which rarely worked).\r\nCopy-and-pastable. Bootstrap provided templates that were easy to get started with. It became the de facto landing page for any side project or new startup. But designs weren’t copy-pastable. Doing so would require you to copy the CSS and HTML. Instead, TailwindCSS is supremely easy to copy — everyone works with the same utility classes, so you can just copy and paste a list of classes or an HTML block into your application, and it should just work.\r\nFewer dependencies, smaller surface. Tailwind is tree-shaken by default and doesn’t have its own ideas of grids or flexboxes (it just defaults to the underlying CSS concepts). Compare this to the last-generation kits like Bootstrap, which had a surface that forced users to adopt JS, HTML, CSS, and CSS build systems like Saas. Tailwind is easy to coexist with other frameworks.\r\nReusability. For many years, developers thought that CSS reusability came through adding class hierarchies to CSS through preprocessors like Saas and Less. The best way to write the least amount of CSS is to just compose basic styles (without defining custom ones).', 'uploads/posts/c7b3829a1d70febc852089548f538913.webp_659d4f491a7e4.webp', 0, '2024-01-09 13:51:05', 1),
(21, 10, 12, 'Free Open Source Tailwind CSS Components', 'Free Open Source Tailwind CSS Components\r\nHyperUI\r\nHyperUI is a collection of free Tailwind CSS components that can be used in your next project. With a range of components, you can build your next marketing website, admin dashboard, eCommerce store and much more.', 'uploads/posts/0b1e86517720d5a5d1c679c8ad570cf7.webp_659d4f8068fcf.webp', 7, '2024-01-09 13:52:00', 1),
(22, 10, 14, 'Build an Event Launch Page: Next.js 13, React, TypeScript, Tailwind CSS', 'Next.js Event Launch Page\r\nOverview\r\nWelcome to the repository for building an Event Launch Page using Next.js 13, TypeScript, and Tailwind CSS. This project aims to recreate the captivating event registration experience from Builder.io\'s AI launch event. The page features a dynamic grid background, a rotating framework logo, an animated countdown timer, and a color-changing UI.\r\n\r\nHow to Code Along\r\nClone this repository to your local machine. Run npm install to install all the necessary packages. Run npm run dev to start the development server. Head to localhost:3000 to view the app.\r\n\r\nLinks & Resources\r\nYouTube Video Tutorial\r\n\r\nvelocity.builder.io', 'uploads/posts/sddefault.jpg_659d505d041bc.jpg', 8, '2024-01-09 13:55:41', 1),
(24, 10, 11, 'test', 'teso', 'uploads/posts/Screenshot Capture - 2024-01-09 - 11-25-46.png_659e52652e681.png', 2, '2024-01-10 08:16:37', 1),
(25, 12, 13, 'The Easy-to-Use Framework Revolutionizing Web Development', 'In the rapidly evolving landscape of web development, selecting the right framework is essential to ensure efficient and effective project completion. One such framework that has been gaining significant popularity is Nest.js. Scores of developers are flocking to this excellent tool for its simplicity and versatility. Let\'s delve into what makes Nest.js a game-changer and why it has become the framework of choice for many.\r\n\r\nAt its core, Nest.js is a progressive', 'uploads/posts/6840a1cbfeda04dce106541184454aa4.webp_659eb0fd6cb8e.webp', 0, '2024-01-10 15:00:13', 1),
(26, 10, 13, 'Understanding NestJS Architecture', 'NestJS is a NodeJs framework built on top of ExpressJs and is used for building efficient, scalable, loosely coupled, testable and easily maintainable server side web applications using architecture principles in mind.\r\n\r\nThe problem NestJs trying to solve is that of architecture. As Lee Barker says: Architectural approach promotes a whole heap of things from good design through to the early identification of potential risks, and gives stakeholders more clarity, among other things\r\n\r\nHello NestJS\r\n\r\nThe simplest approach is to create a Controller doing all things: from validation to request-processing to handling business logic to interacting with data base and so on.\r\n\r\n', 'uploads/posts/1b04f2c4e2b14a8bd6e513a209613e7a.webp_65a0feff8fb35.webp', 0, '2024-01-12 08:57:35', 1);

-- --------------------------------------------------------

--
-- Table structure for table `post_tags`
--

CREATE TABLE `post_tags` (
  `post_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `post_tags`
--

INSERT INTO `post_tags` (`post_id`, `tag_id`) VALUES
(16, 22),
(16, 25),
(17, 22),
(17, 25),
(18, 3),
(18, 15),
(18, 17),
(18, 22),
(18, 23),
(19, 3),
(19, 15),
(19, 17),
(19, 22),
(19, 23),
(19, 25),
(20, 20),
(20, 25),
(21, 20),
(21, 24),
(22, 3),
(22, 15),
(22, 17),
(22, 20),
(22, 23),
(25, 16),
(26, 16),
(26, 22);

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `tag_id` int(11) NOT NULL,
  `tag_name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`tag_id`, `tag_name`) VALUES
(15, 'javascript'),
(3, 'js'),
(16, 'nestjs'),
(24, 'news'),
(17, 'nextjs'),
(23, 'nodejs'),
(21, 'PHP'),
(20, 'tailwindcss'),
(28, 'test'),
(25, 'tips'),
(22, 'typescript');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('author','admin') NOT NULL DEFAULT 'author',
  `image` varchar(255) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp(),
  `isActive` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `password`, `role`, `image`, `date_created`, `isActive`) VALUES
(1, 'Yassine', 'admin@yassine.info', '$2y$10$DOLB0aNLDAyWiezhtbeBXuBg4tH7qhjJ4YG7tIkflMXVYYkhg5YNS', 'admin', 'uploads/users/me2.png_65998e2933e95.png', '2024-01-06 13:48:26', 1),
(2, 'siskoweb', 'siskoweb@yassine.info', '$2y$10$T..GAww8hno1qZEgChcr1.gXPqnFA3oJUm70Tk5RB4WMDG0RXMsXu', 'author', 'uploads/users/avatar.jpg', '2024-01-06 13:48:59', 1),
(3, 'user1', 'user1@yassine.info', '$2y$10$RGjaJoxUcIv2wlL5trpK4eGWciLvMy.2p/54J4ITdxROtiAyR8eZ.', 'author', 'uploads/users/avatar.jpg', '2024-01-06 17:28:36', 0),
(8, 'author1', 'author1@gmail.com', '$2y$10$2Ergb3SvEJWELdl/1XLnvOY2oeKZqE6TUJV8ggg4VaoeDKF.sQ1u6', 'author', 'Array', '2024-01-08 14:44:49', 0),
(9, 'author2', 'author2@gmail.com', '$2y$10$eXH.p5BEEdDVNU/fkwno8ONrPrDlDSlZAzBB4jvgk/6B2brWdPvta', 'author', 'Array', '2024-01-08 14:47:02', 0),
(10, 'authorx', 'authorx@gmail.com', '$2y$10$ywLM5wztpQjX3iZ9pweLeOxuZnoBmdTiaQ0b0aEwSH.yiiHWioTdS', 'author', 'uploads/users/avatar.jpg', '2024-01-08 14:48:54', 1),
(11, 'luffy', 'luffy@yassine.info', '$2y$10$H7.h821wCHWNnpRXKfDnc.m9/OH4zSbGbYW.InJ5muSRZFfKNdAOS', 'author', 'uploads/users/avatar.jpg', '2024-01-10 10:03:24', 1),
(12, 'gear5', 'luffy5@yassine.info', '$2y$10$Vu5ZWU88TpCMFK3NaI64ROtGq2yqrGQ6WRClk4uVJFYLnO4y0tnBC', 'author', 'uploads/users/avatar.jpg', '2024-01-10 10:05:01', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`),
  ADD UNIQUE KEY `category_name` (`category_name`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `post_tags`
--
ALTER TABLE `post_tags`
  ADD PRIMARY KEY (`post_id`,`tag_id`),
  ADD KEY `tag_id` (`tag_id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`tag_id`),
  ADD UNIQUE KEY `tag_name` (`tag_name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `tag_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `posts_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`) ON DELETE CASCADE;

--
-- Constraints for table `post_tags`
--
ALTER TABLE `post_tags`
  ADD CONSTRAINT `post_tags_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`post_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `post_tags_ibfk_2` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`tag_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
