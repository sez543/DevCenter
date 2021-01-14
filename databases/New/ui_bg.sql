-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 19, 2020 at 12:52 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ui_bg`
--

-- --------------------------------------------------------

--
-- Table structure for table `404`
--

CREATE TABLE `404` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `404`
--

INSERT INTO `404` (`id`, `name`, `value`) VALUES
(1, '404', 'Page not found.');

-- --------------------------------------------------------

--
-- Table structure for table `about_us_page`
--

CREATE TABLE `about_us_page` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `value` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `about_us_page`
--

INSERT INTO `about_us_page` (`id`, `name`, `value`) VALUES
(1, 'who_are_we', 'Who are we?'),
(2, 'who_are_we_content', 'Lorem ipsum dolor sit amet consectetur adip elit. Maiores deleniti explicabo voluptatem quisquam nulla asperiores aspernatur aperiam voluptate et consectetur minima delectus, fugiat eum soluta blanditiis adipisci, velit dolore magnam.Lorem ipsum dolor sit amet consectetur adip elit. Maiores deleniti explicabo voluptatem quisquam nulla asperiores aspernatur aperiam voluptate et consectetur minima delectus, fugiat eum soluta blanditiis adipisci, velit dolore magnam.'),
(3, 'our_history', 'Our History'),
(4, 'our_history_content', 'Lorem ipsum dolor sit amet consectetur adip elit. Maiores deleniti explicabo voluptatem quisquam nulla asperiores aspernatur aperiam voluptate et consectetur minima delectus, fugiat eum soluta blanditiis adipisci, velit dolore magnam.Lorem ipsum dolor sit amet consectetur adip elit. Maiores deleniti explicabo voluptatem quisquam nulla asperiores aspernatur aperiam voluptate et consectetur minima delectus, fugiat eum soluta blanditiis adipisci, velit dolore magnam.'),
(5, 'our_mission', 'Our Mission'),
(6, 'our_mission_content', 'Lorem ipsum dolor sit amet consectetur adip elit. Maiores deleniti explicabo voluptatem quisquam nulla asperiores aspernatur aperiam voluptate et consectetur minima delectus, fugiat eum soluta blanditiis adipisci, velit dolore magnam.Lorem ipsum dolor sit amet consectetur adip elit. Maiores deleniti explicabo voluptatem quisquam nulla asperiores aspernatur aperiam voluptate et consectetur minima delectus, fugiat eum soluta blanditiis adipisci, velit dolore magnam.');

-- --------------------------------------------------------

--
-- Table structure for table `contacts_page`
--

CREATE TABLE `contacts_page` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contacts_page`
--

INSERT INTO `contacts_page` (`id`, `name`, `value`) VALUES
(1, 'contacts_us', 'Contact us'),
(2, 'contacts_us_subtitle', 'Do you have any questions? Please do not hesitate to contact us directly. Our team will come back to you within a matter of hours to help you.'),
(3, 'your_name', 'Your name'),
(4, 'your_email', 'Your email'),
(5, 'subject', 'Subject'),
(6, 'your_message', 'Your message'),
(7, 'send', 'Send'),
(8, 'address', 'Russe, BG 7000, Bulgaria');

-- --------------------------------------------------------

--
-- Table structure for table `create_post`
--

CREATE TABLE `create_post` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `value` varchar(10000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `create_post`
--

INSERT INTO `create_post` (`id`, `name`, `value`) VALUES
(1, 'spam', 'In order to limit spam please enter a detailed despiption of at least 100 characters.'),
(2, 'create', 'Create'),
(3, 'error', 'Please follow the required format!');

-- --------------------------------------------------------

--
-- Table structure for table `dashboard`
--

CREATE TABLE `dashboard` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dashboard`
--

INSERT INTO `dashboard` (`id`, `name`, `value`) VALUES
(1, 'dashboard', 'Dashboard'),
(2, 'mods', 'Moderators'),
(3, 'users', 'Users'),
(4, 'joined', 'Joined'),
(5, 'action', 'Action'),
(6, 'remove', 'Remove'),
(7, 'make_mod', 'Mod');

-- --------------------------------------------------------

--
-- Table structure for table `edit_post`
--

CREATE TABLE `edit_post` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `edit_post`
--

INSERT INTO `edit_post` (`id`, `name`, `value`) VALUES
(1, 'your_posts', 'Your posts:'),
(2, 'completed', 'completed'),
(3, 'go_to_page', 'Go to page'),
(4, 'no_permission', 'You have no permission to edit this post.'),
(5, 'redirect', 'You will be redirected within 5 seconds.');

-- --------------------------------------------------------

--
-- Table structure for table `edit_profile`
--

CREATE TABLE `edit_profile` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `edit_profile`
--

INSERT INTO `edit_profile` (`id`, `name`, `value`) VALUES
(1, 'upload', 'Upload an image'),
(2, 'description', 'Description'),
(3, 'resume', 'Resume'),
(4, 'portfolio', 'Portfolio'),
(5, 'edit', 'Edit');

-- --------------------------------------------------------

--
-- Table structure for table `footer`
--

CREATE TABLE `footer` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `footer`
--

INSERT INTO `footer` (`id`, `name`, `value`) VALUES
(1, 'text', 'We connect developers with potential clients in an enjoyable environment focused on user convenience.'),
(2, 'copyright', 'Copyright:'),
(3, 'technologies', 'TECHNOLOGIES USED'),
(4, 'useful_links', 'USEFUL LINKS'),
(5, 'your_account', 'Your Account'),
(6, 'about_us', 'About us'),
(7, 'blog', 'Blog'),
(8, 'privacy', 'Privacy policy'),
(9, 'tos', 'Terms of service'),
(10, 'contacts', 'CONTACTS');

-- --------------------------------------------------------

--
-- Table structure for table `index_page`
--

CREATE TABLE `index_page` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `index_page`
--

INSERT INTO `index_page` (`id`, `name`, `value`) VALUES
(1, 'title', 'Start your career now'),
(2, 'button', 'Get Started'),
(3, 'from_today', 'From Today'),
(4, 'no_new_listings_have_been_posted_today', 'No new listings have been posted today! You can view the full catalogue'),
(5, 'here', 'Here');

-- --------------------------------------------------------

--
-- Table structure for table `jobs_page_search`
--

CREATE TABLE `jobs_page_search` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jobs_page_search`
--

INSERT INTO `jobs_page_search` (`id`, `name`, `value`) VALUES
(1, 'discover_new_opportunities', 'Discover new opportunities'),
(2, 'user', 'User'),
(3, 'minimum_reward', 'Minimum reward'),
(4, 'maximum_reward', 'Maximum reward'),
(5, 'all_time', 'All Time'),
(6, 'last_24_hours', 'Last 24 hours'),
(7, 'last_three_days', 'Last Three days'),
(8, 'last_week', 'Last Week'),
(9, 'last_month', 'Last month'),
(10, 'sort_by', 'Sort By'),
(11, 'date', 'Date'),
(12, 'title', 'Title'),
(13, 'reward', 'Reward'),
(14, 'user_sort', 'User'),
(15, 'asc', 'ASC'),
(16, 'desc', 'DESC');

-- --------------------------------------------------------

--
-- Table structure for table `job_listing`
--

CREATE TABLE `job_listing` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `job_listing`
--

INSERT INTO `job_listing` (`id`, `name`, `value`) VALUES
(1, 'currency', '$'),
(2, 'posted_on', 'Posted on'),
(3, 'learn_more', 'Learn more');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `value` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `name`, `value`) VALUES
(2, 'forgotten', 'Forgot password?'),
(3, 'incorrect', 'Incorrect email or password!'),
(4, 'not_a_member', 'Not a member?'),
(5, 'register', 'Register'),
(6, 'error_login', 'An Error occured while processing your request which prevented it finalization. Please try again.');

-- --------------------------------------------------------

--
-- Table structure for table `message_page`
--

CREATE TABLE `message_page` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `message_page`
--

INSERT INTO `message_page` (`id`, `name`, `value`) VALUES
(1, 'send_message_to_start', 'Send a message to start this conversation.'),
(2, 'your_message', 'Your message'),
(3, 'please_enter_message', 'Please enter a message!'),
(4, 'me', 'Me'),
(5, 'message_to', 'Message to'),
(6, 'personal_message', 'Personal message to');

-- --------------------------------------------------------

--
-- Table structure for table `navigation`
--

CREATE TABLE `navigation` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `navigation`
--

INSERT INTO `navigation` (`id`, `name`, `value`) VALUES
(1, 'title', 'DevCenter.org'),
(2, 'home', 'Home'),
(3, 'jobs', 'Jobs'),
(4, 'about', 'About us'),
(5, 'contacts', 'Contacts'),
(6, 'sign_in', 'Sign In'),
(7, 'register', 'Register'),
(8, 'my_posts', 'My Posts'),
(9, 'view_all_messages', 'View All Messages'),
(10, 'no_new_messages', 'No New Messages'),
(11, 'unread_messages_from', 'Unread messages from'),
(12, 'by', 'By'),
(13, 'about_post', 'About post'),
(14, 'sign_out', 'Sign out'),
(15, 'last_message', 'Last Message'),
(16, 'moderator', 'Moderator'),
(17, 'admin', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `post_page`
--

CREATE TABLE `post_page` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `post_page`
--

INSERT INTO `post_page` (`id`, `name`, `value`) VALUES
(1, 'posted_on', 'Posted on'),
(2, 'send_a_message', 'Send a message'),
(3, 'first_comment', 'Be the first to leave a comment'),
(4, 'your_comment', 'Your comment'),
(5, 'send', 'Send'),
(6, 'edit_post', 'Edit Post'),
(7, 'mark_as_active', 'Mark as active'),
(8, 'mark_as_done', 'Mark as done'),
(9, 'delete_post', 'Delete post'),
(10, 'login', 'Login'),
(11, 'to_send', 'in order to send messages'),
(12, 'no_comments', 'No comments have been posted yet'),
(13, 'comments', 'Comments'),
(14, 'delete_comment', 'Delete comment'),
(15, 'cannot send', 'Cannot send an empty comment');

-- --------------------------------------------------------

--
-- Table structure for table `privacy`
--

CREATE TABLE `privacy` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `value` varchar(10000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `privacy`
--

INSERT INTO `privacy` (`id`, `name`, `value`) VALUES
(1, 'terms', '<h1>Cookie Policy for DevCenter.org</h1>\r\n                    <p>This is the Cookie Policy for DevCenter.org, accessible from devit.org</p>\r\n                    <p><strong>What Are Cookies</strong></p>\r\n                    <p>As is common practice with almost all professional websites this site uses cookies, which are\r\n                        tiny files that are downloaded to your computer, to improve your experience. This page describes\r\n                        what information they gather, how we use it and why we sometimes need to store these cookies. We\r\n                        will also share how you can prevent these cookies from being stored however this may downgrade\r\n                        or `break` certain elements of the sites functionality.</p>\r\n                    <p>For more general information on cookies, please read <a\r\n                            href=\"https://www.cookieconsent.com/what-are-cookies/\">\"What Are Cookies\"</a>. Information\r\n                        regarding cookies from this Cookies Policy are from <a\r\n                            href=\"https://www.generateprivacypolicy.com/\">the Privacy Policy Generator</a>.</p>\r\n                    <p><strong>How We Use Cookies</strong></p>\r\n                    <p>We use cookies for a variety of reasons detailed below. Unfortunately in most cases there are no\r\n                        industry standard options for disabling cookies without completely disabling the functionality\r\n                        and features they add to this site. It is recommended that you leave on all cookies if you are\r\n                        not sure whether you need them or not in case they are used to provide a service that you use.\r\n                    </p>\r\n                    <p><strong>Disabling Cookies</strong></p>\r\n                    <p>You can prevent the setting of cookies by adjusting the settings on your browser (see your\r\n                        browser Help for how to do this). Be aware that disabling cookies will affect the functionality\r\n                        of this and many other websites that you visit. Disabling cookies will usually result in also\r\n                        disabling certain functionality and features of the this site. Therefore it is recommended that\r\n                        you do not disable cookies. This Cookies Policy was created with the help of the <a\r\n                            href=\"https://www.cookiepolicygenerator.com/cookie-policy-generator/\">Cookies Policy\r\n                            Generator from CookiePolicyGenerator.com</a>.</p>\r\n                    <p><strong>The Cookies We Set</strong></p>\r\n                    <ul>\r\n                        <li>\r\n                            <p>Login related cookies</p>\r\n                            <p>We use cookies when you are logged in so that we can remember this fact. This prevents\r\n                                you from having to log in every single time you visit a new page. These cookies are\r\n                                typically removed or cleared when you log out to ensure that you can only access\r\n                                restricted features and areas when logged in.</p>\r\n                        </li>\r\n                        <li>\r\n                            <p>Site preferences cookies</p>\r\n                            <p>In order to provide you with a great experience on this site we provide the functionality\r\n                                to set your preferences for how this site runs when you use it. In order to remember\r\n                                your preferences we need to set cookies so that this information can be called whenever\r\n                                you interact with a page is affected by your preferences.</p>\r\n                        </li>\r\n                    </ul>\r\n                    <p><strong>Third Party Cookies</strong></p>\r\n                    <p>In some special cases we also use cookies provided by trusted third parties. The following\r\n                        section details which third party cookies you might encounter through this site.</p>\r\n                    <ul>\r\n                        <li>\r\n                            <p>This site uses Google Analytics which is one of the most widespread and trusted analytics\r\n                                solution on the web for helping us to understand how you use the site and ways that we\r\n                                can improve your experience. These cookies may track things such as how long you spend\r\n                                on the site and the pages that you visit so we can continue to produce engaging content.\r\n                            </p>\r\n                            <p>For more information on Google Analytics cookies, see the official Google Analytics page.\r\n                            </p>\r\n                        </li>\r\n                    </ul>\r\n                    <p><strong>More Information</strong></p>\r\n                    <p>Hopefully that has clarified things for you and as was previously mentioned if there is something\r\n                        that you aren`t sure whether you need or not it`s usually safer to leave cookies enabled in case\r\n                        it does interact with one of the features you use on our site.</p>\r\n                    <p>However if you are still looking for more information then you can contact us through one of our\r\n                        preferred contact methods:</p>\r\n                    <ul>\r\n                        <li>Email: devit@gmail.com</li>\r\n                    </ul>');

-- --------------------------------------------------------

--
-- Table structure for table `profile_page`
--

CREATE TABLE `profile_page` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `profile_page`
--

INSERT INTO `profile_page` (`id`, `name`, `value`) VALUES
(1, 'user_score', 'User Score'),
(2, 'edit_profile', 'Edit profile'),
(3, 'create_a_listing', 'Create a listing'),
(4, 'edit_existing_lisitngs', 'Edit exiting listings'),
(5, 'resume', 'Resume'),
(6, 'portfolio', 'Portfolio'),
(7, 'recent_activity', 'Recent Activity'),
(8, 'messages', 'Messages'),
(9, 'no_messages', 'No messages received yet!'),
(10, 'unread_messages', 'Unread messages from'),
(11, 'about_post', 'About post:'),
(12, 'last_message', 'Last message:'),
(13, 'by', 'By'),
(14, 'open_conversation', 'Open conversation'),
(15, 'send_message', 'Send message'),
(16, 'no_user_scores', 'No user scores yet!'),
(17, 'no_conversation', 'No messages received yet!');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `value` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `name`, `value`) VALUES
(1, 'first_name', 'First name'),
(2, 'last_name', 'Last name'),
(3, 'email_taken', 'Email already taken! You can try a different one or '),
(4, 'password', 'Password'),
(5, 'password_req', 'At least 8 characters with 1 upper-case character, 1 digit and 1 special character'),
(6, 'phone', 'Phone number'),
(7, 'login', 'login'),
(8, 'phone_taken', 'Phone number already in use!'),
(9, 'by_clicking', 'By clicking'),
(10, 'you_agree', ' you agree with our '),
(11, 'and', 'and');

-- --------------------------------------------------------

--
-- Table structure for table `tos`
--

CREATE TABLE `tos` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `value` varchar(10000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tos`
--

INSERT INTO `tos` (`id`, `name`, `value`) VALUES
(1, 'tos_main', '<h1>Terms and Conditions</h1>\r\n                    <p>Last updated: September 10, 2020</p>\r\n                    <p>Please read these terms and conditions carefully before using Our Service.</p>\r\n                    <h1>Interpretation and Definitions</h1>\r\n                    <h2>Interpretation</h2>\r\n                    <p>The words of which the initial letter is capitalized have meanings defined under the following\r\n                        conditions. The following definitions shall have the same meaning regardless of whether they\r\n                        appear in singular or in plural.</p>\r\n                    <h2>Definitions</h2>\r\n                    <p>For the purposes of these Terms and Conditions:</p>\r\n                    <ul>\r\n                        <li>\r\n                            <p><strong>Affiliate</strong> means an entity that controls, is controlled by or is under\r\n                                common control with a party, where \"control\" means ownership of 50% or more of the\r\n                                shares, equity interest or other securities entitled to vote for election of directors\r\n                                or other managing authority.</p>\r\n                        </li>\r\n                        <li>\r\n                            <p><strong>Country</strong> refers to: Bulgaria</p>\r\n                        </li>\r\n                        <li>\r\n                            <p><strong>Company</strong> (referred to as either \"the Company\", \"We\", \"Us\" or \"Our\" in\r\n                                this Agreement) refers to Devit.org, Ruse, Bulgaria.</p>\r\n                        </li>\r\n                        <li>\r\n                            <p><strong>Device</strong> means any device that can access the Service such as a computer,\r\n                                a cellphone or a digital tablet.</p>\r\n                        </li>\r\n                        <li>\r\n                            <p><strong>Service</strong> refers to the Website.</p>\r\n                        </li>\r\n                        <li>\r\n                            <p><strong>Terms and Conditions</strong> (also referred as \"Terms\") mean these Terms and\r\n                                Conditions that form the entire agreement between You and the Company regarding the use\r\n                                of the Service. This Terms and Conditions agreement has been created with the help of\r\n                                the <a href=\"https://www.termsfeed.com/terms-conditions-generator/\"\r\n                                    target=\"_blank\">Terms and Conditions Generator</a>.</p>\r\n                        </li>\r\n                        <li>\r\n                            <p><strong>Third-party Social Media Service</strong> means any services or content\r\n                                (including data, information, products or services) provided by a third-party that may\r\n                                be displayed, included or made available by the Service.</p>\r\n                        </li>\r\n                        <li>\r\n                            <p><strong>Website</strong> refers to Devit, accessible from <a href=\"devit.org\"\r\n                                    rel=\"external nofollow noopener\" target=\"_blank\">devit.org</a></p>\r\n                        </li>\r\n                        <li>\r\n                            <p><strong>You</strong> means the individual accessing or using the Service, or the company,\r\n                                or other legal entity on behalf of which such individual is accessing or using the\r\n                                Service, as applicable.</p>\r\n                        </li>\r\n                    </ul>\r\n                    <h1>Acknowledgment</h1>\r\n                    <p>These are the Terms and Conditions governing the use of this Service and the agreement that\r\n                        operates between You and the Company. These Terms and Conditions set out the rights and\r\n                        obligations of all users regarding the use of the Service.</p>\r\n                    <p>Your access to and use of the Service is conditioned on Your acceptance of and compliance with\r\n                        these Terms and Conditions. These Terms and Conditions apply to all visitors, users and others\r\n                        who access or use the Service.</p>\r\n                    <p>By accessing or using the Service You agree to be bound by these Terms and Conditions. If You\r\n                        disagree with any part of these Terms and Conditions then You may not access the Service.</p>\r\n                    <p>You represent that you are over the age of 18. The Company does not permit those under 18 to use\r\n                        the Service.</p>\r\n                    <p>Your access to and use of the Service is also conditioned on Your acceptance of and compliance\r\n                        with the Privacy Policy of the Company. Our Privacy Policy describes Our policies and procedures\r\n                        on the collection, use and disclosure of Your personal information when You use the Application\r\n                        or the Website and tells You about Your privacy rights and how the law protects You. Please read\r\n                        Our Privacy Policy carefully before using Our Service.</p>\r\n                    <h1>Links to Other Websites</h1>\r\n                    <p>Our Service may contain links to third-party web sites or services that are not owned or\r\n                        controlled by the Company.</p>\r\n                    <p>The Company has no control over, and assumes no responsibility for, the content, privacy\r\n                        policies, or practices of any third party web sites or services. You further acknowledge and\r\n                        agree that the Company shall not be responsible or liable, directly or indirectly, for any\r\n                        damage or loss caused or alleged to be caused by or in connection with the use of or reliance on\r\n                        any such content, goods or services available on or through any such web sites or services.</p>\r\n                    <p>We strongly advise You to read the terms and conditions and privacy policies of any third-party\r\n                        web sites or services that You visit.</p>\r\n                    <h1>Termination</h1>\r\n                    <p>We may terminate or suspend Your access immediately, without prior notice or liability, for any\r\n                        reason whatsoever, including without limitation if You breach these Terms and Conditions.</p>\r\n                    <p>Upon termination, Your right to use the Service will cease immediately.</p>\r\n                    <h1>Limitation of Liability</h1>\r\n                    <p>Notwithstanding any damages that You might incur, the entire liability of the Company and any of\r\n                        its suppliers under any provision of this Terms and Your exclusive remedy for all of the\r\n                        foregoing shall be limited to the amount actually paid by You through the Service or 100 USD if\r\n                        You haven`t purchased anything through the Service.</p>\r\n                    <p>To the maximum extent permitted by applicable law, in no event shall the Company or its suppliers\r\n                        be liable for any special, incidental, indirect, or consequential damages whatsoever (including,\r\n                        but not limited to, damages for loss of profits, loss of data or other information, for business\r\n                        interruption, for personal injury, loss of privacy arising out of or in any way related to the\r\n                        use of or inability to use the Service, third-party software and/or third-party hardware used\r\n                        with the Service, or otherwise in connection with any provision of this Terms), even if the\r\n                        Company or any supplier has been advised of the possibility of such damages and even if the\r\n                        remedy fails of its essential purpose.</p>\r\n                    <p>Some states do not allow the exclusion of implied warranties or limitation of liability for\r\n                        incidental or consequential damages, which means that some of the above limitations may not\r\n                        apply. In these states, each party`s liability will be limited to the greatest extent permitted\r\n                        by law.</p>\r\n                    <h1>\"AS IS\" and \"AS AVAILABLE\" Disclaimer</h1>\r\n                    <p>The Service is provided to You \"AS IS\" and \"AS AVAILABLE\" and with all faults and defects without\r\n                        warranty of any kind. To the maximum extent permitted under applicable law, the Company, on its\r\n                        own behalf and on behalf of its Affiliates and its and their respective licensors and service\r\n                        providers, expressly disclaims all warranties, whether express, implied, statutory or otherwise,\r\n                        with respect to the Service, including all implied warranties of merchantability, fitness for a\r\n                        particular purpose, title and non-infringement, and warranties that may arise out of course of\r\n                        dealing, course of performance, usage or trade practice. Without limitation to the foregoing,\r\n                        the Company provides no warranty or undertaking, and makes no representation of any kind that\r\n                        the Service will meet Your requirements, achieve any intended results, be compatible or work\r\n                        with any other software, applications, systems or services, operate without interruption, meet\r\n                        any performance or reliability standards or be error free or that any errors or defects can or\r\n                        will be corrected.</p>\r\n                    <p>Without limiting the foregoing, neither the C');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `404`
--
ALTER TABLE `404`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `about_us_page`
--
ALTER TABLE `about_us_page`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts_page`
--
ALTER TABLE `contacts_page`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `create_post`
--
ALTER TABLE `create_post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dashboard`
--
ALTER TABLE `dashboard`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `edit_post`
--
ALTER TABLE `edit_post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `edit_profile`
--
ALTER TABLE `edit_profile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `footer`
--
ALTER TABLE `footer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `index_page`
--
ALTER TABLE `index_page`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs_page_search`
--
ALTER TABLE `jobs_page_search`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_listing`
--
ALTER TABLE `job_listing`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message_page`
--
ALTER TABLE `message_page`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `navigation`
--
ALTER TABLE `navigation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post_page`
--
ALTER TABLE `post_page`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `privacy`
--
ALTER TABLE `privacy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profile_page`
--
ALTER TABLE `profile_page`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tos`
--
ALTER TABLE `tos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `404`
--
ALTER TABLE `404`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `about_us_page`
--
ALTER TABLE `about_us_page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `contacts_page`
--
ALTER TABLE `contacts_page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `create_post`
--
ALTER TABLE `create_post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `dashboard`
--
ALTER TABLE `dashboard`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `edit_post`
--
ALTER TABLE `edit_post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `edit_profile`
--
ALTER TABLE `edit_profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `footer`
--
ALTER TABLE `footer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `index_page`
--
ALTER TABLE `index_page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `jobs_page_search`
--
ALTER TABLE `jobs_page_search`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `job_listing`
--
ALTER TABLE `job_listing`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `message_page`
--
ALTER TABLE `message_page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `navigation`
--
ALTER TABLE `navigation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `post_page`
--
ALTER TABLE `post_page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `privacy`
--
ALTER TABLE `privacy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `profile_page`
--
ALTER TABLE `profile_page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tos`
--
ALTER TABLE `tos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
