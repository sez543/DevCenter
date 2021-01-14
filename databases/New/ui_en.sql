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
-- Database: `ui_en`
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
(1, '404', 'Страницата не съществува.');

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
(1, 'who_are_we', 'Кои сме ние?'),
(2, 'who_are_we_content', 'Лорем ипсум долор сит амет, ех утинам ностро рецусабо вис, сеа цонсулату импердиет ех, еа меи иуварет доценди. Ут меи алтера адмодум. Сед не цоммодо салутанди. Те ест алияуид петентиум аппеллантур, ат фацете виртуте легимус вих, яуо зрил антиопам еу. Еа нец атяуи популо феугаит. Сцрипта иудицабит елояуентиам нам еа, еа меи орнатус алиенум садипсцинг, чоро аццусамус дефинитионем те яуи. При но фацилисис хонестатис цонтентионес. Инани вивендум хонестатис сеа ид, еа яуи омнис цлита модератиус. Еам еи дицант латине легимус, меи сале омиттам рецтеяуе еа.'),
(3, 'our_history', 'Нашата история'),
(4, 'our_history_content', 'Лорем ипсум долор сит амет, ех утинам ностро рецусабо вис, сеа цонсулату импердиет ех, еа меи иуварет доценди. Ут меи алтера адмодум. Сед не цоммодо салутанди. Те ест алияуид петентиум аппеллантур, ат фацете виртуте легимус вих, яуо зрил антиопам еу. Еа нец атяуи популо феугаит. Сцрипта иудицабит елояуентиам нам еа, еа меи орнатус алиенум садипсцинг, чоро аццусамус дефинитионем те яуи. При но фацилисис хонестатис цонтентионес. Инани вивендум хонестатис сеа ид, еа яуи омнис цлита модератиус. Еам еи дицант латине легимус, меи сале омиттам рецтеяуе еа.'),
(5, 'our_mission', 'Нашата мисия'),
(6, 'our_mission_content', 'Лорем ипсум долор сит амет, ех утинам ностро рецусабо вис, сеа цонсулату импердиет ех, еа меи иуварет доценди. Ут меи алтера адмодум. Сед не цоммодо салутанди. Те ест алияуид петентиум аппеллантур, ат фацете виртуте легимус вих, яуо зрил антиопам еу. Еа нец атяуи популо феугаит. Сцрипта иудицабит елояуентиам нам еа, еа меи орнатус алиенум садипсцинг, чоро аццусамус дефинитионем те яуи. При но фацилисис хонестатис цонтентионес. Инани вивендум хонестатис сеа ид, еа яуи омнис цлита модератиус. Еам еи дицант латине легимус, меи сале омиттам рецтеяуе еа.');

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
(1, 'contacts_us', 'Свържете се с нас'),
(2, 'contacts_us_subtitle', 'Имате въпроси? Не се притеснявайте да се свържете с нас. Нашият екип ще се свърже с вас до няколко часа за да ви помогне.'),
(3, 'your_name', 'Вашето име'),
(4, 'your_email', 'Вашият имейл'),
(5, 'subject', 'Тема'),
(6, 'your_message', 'Съобщение'),
(7, 'send', 'Изпрати'),
(8, 'address', 'Русе, BG 7000, България');

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
(1, 'spam', 'С цел намаляване на спам постовете, моля въведете детайлно описание от поне 100 символа.'),
(2, 'create', 'Създай'),
(3, 'error', 'Моля следвайте зададения формат!');

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
(1, 'dashboard', 'Контролен панел'),
(2, 'mods', 'Модератори'),
(3, 'users', 'Потребители'),
(4, 'joined', 'Присъединен'),
(5, 'action', 'Действие'),
(6, 'remove', 'Премахни'),
(7, 'make_mod', 'Мод');

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
(1, 'your_posts', 'Вашите обяви:'),
(2, 'completed', 'завършена'),
(3, 'go_to_page', 'Отиди на страница'),
(4, 'no_permission', 'Нямате право да променяте тази обява.'),
(5, 'redirect', 'Ще бъдете пренасочени след 5 секунди.');

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
(1, 'upload', 'Качете изображение'),
(2, 'description', 'Описание'),
(3, 'resume', 'CV'),
(4, 'portfolio', 'Портфолио'),
(5, 'edit', 'Промени');

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
(1, 'text', 'Ние свърваме разработчиците с потенциални клиенти в приятна среда с внимание към удобство на ползване'),
(2, 'copyright', 'Авторско право:'),
(3, 'technologies', 'Изполвани технологии'),
(4, 'useful_links', 'Полезни линкове'),
(5, 'your_account', 'Вашият акаунт'),
(6, 'about_us', 'За нас'),
(7, 'blog', 'Блог'),
(8, 'privacy', 'Политика за личните данни'),
(9, 'tos', 'Условия за ползане'),
(10, 'contacts', 'Контакти');

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
(1, 'title', 'Започни своята кариера сега'),
(2, 'button', 'Към обявите'),
(3, 'from_today', 'От днес'),
(4, 'no_new_listings_have_been_posted_today', 'Няма обяви публикувани днес! Можете да разгледате пълния каталог'),
(5, 'here', 'Тук');

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
(1, 'discover_new_opportunities', 'Търсене'),
(2, 'user', 'Потребител'),
(3, 'minimum_reward', 'Минимално възнаграждение'),
(4, 'maximum_reward', 'Максимално възнаграждение'),
(5, 'all_time', 'Всички'),
(6, 'last_24_hours', 'Послединте 24 часа'),
(7, 'last_three_days', 'Последните 3 дни'),
(8, 'last_week', 'Последната седмица'),
(9, 'last_month', 'Последният месец'),
(10, 'sort_by', 'Сортирай'),
(11, 'date', 'Дата'),
(12, 'title', 'Заглавие'),
(13, 'reward', 'Награда'),
(14, 'user_sort', 'Потребител'),
(15, 'asc', 'Възх.'),
(16, 'desc', 'Низх.');

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
(1, 'currency', 'лв.'),
(2, 'posted_on', 'Публикувана на'),
(3, 'learn_more', 'Детайли');

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
(1, 'forgotten', 'Забравена парола?'),
(2, 'incorrect', 'Неправилно потребителско име или парола!'),
(3, 'not_a_member', 'Нямате профил?'),
(4, 'register', 'Регистрация'),
(5, 'error_login', 'Възникна грешка при обработването на вашата заявка. Моля опитайте отново.');

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
(1, 'send_message_to_start', 'Изпратете съобшение за да започнете разговора.'),
(2, 'your_message', 'Вашето съобшение'),
(3, 'please_enter_message', 'Моля въведете съобщение!'),
(4, 'me', 'Аз'),
(5, 'message_to', 'Съобщение до'),
(6, 'personal_message', 'Лично съобщение до');

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
(1, 'title', 'ДевЦентър.орг'),
(2, 'home', 'Начало'),
(3, 'jobs', 'Обяви'),
(4, 'about', 'За нас'),
(5, 'contacts', 'Контакти'),
(6, 'sign_in', 'Вход'),
(7, 'register', 'Регистрация'),
(8, 'my_posts', 'Моите обяви'),
(9, 'view_all_messages', 'Вижте всички съобщения'),
(10, 'no_new_messages', 'Няма нови съобщения'),
(11, 'unread_messages_from', 'Непрочетени съобщения от'),
(12, 'by', 'от'),
(13, 'about_post', 'За обява'),
(14, 'sign_out', 'Изход'),
(15, 'last_message', 'Последно съобщение'),
(16, 'moderator', 'Модератор'),
(17, 'admin', 'Администратор');

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
(1, 'posted_on', 'Публикувана на'),
(2, 'send_a_message', 'Изпрати съобщение'),
(3, 'first_comment', 'Бъдете първият, публикувал коментар'),
(4, 'your_comment', 'Вашето съобщение'),
(5, 'send', 'Изпрати'),
(6, 'edit_post', 'Редактирай обява'),
(7, 'mark_as_active', 'Отбележи като активна'),
(8, 'mark_as_done', 'Отбележи като готова'),
(9, 'delete_post', 'Изтрий обява'),
(10, 'login', 'Влезте във вашия профил'),
(11, 'to_send', 'за да изпратите съобщение'),
(12, 'no_comments', 'Няма публикувани коментари'),
(13, 'comments', 'Коментара'),
(14, 'delete_comment', 'Изтрий коментар'),
(15, 'cannot send', 'Не можете да изпратите празен коментар');

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
(1, 'terms', '<h1> Правила за бисквитки за ДевЦентър.орг</h1>\r\n                    <p> Това е Политиката за бисквитките за ДевЦентър.орг, достъпна от devit.org </p>\r\n                    <p> <strong> Какво представляват „бисквитките“ </strong> </p>\r\n                    <p> Както е обичайната практика при почти всички професионални уебсайтове, този сайт използва бисквитки, които са\r\n                        малки файлове, които се изтеглят на вашия компютър, за да подобрите вашето изживяване. Тази страница описва\r\n                        каква информация събират, как я използваме и защо понякога трябва да съхраняваме тези бисквитки. Ние\r\n                        също ще сподели как можете да предотвратите съхраняването на тези бисквитки, но това може да понижи версията\r\n                        или „прекъсване“ на определени елементи от функционалността на сайтовете. </p>\r\n                    <p> За по-обща информация относно бисквитките, моля прочетете <a\r\n                            href = \"https://www.cookieconsent.com/what-are-cookies/\"> \"Какво представляват бисквитките\" </a>. Информация\r\n                        по отношение на бисквитките от тази Политика за бисквитките са от <a\r\n                            href = \"https://www.generateprivacypolicy.com/\"> Генератор на политиката за поверителност </a>. </p>\r\n                    <p> <strong> Как използваме бисквитки </strong> </p>\r\n                    <p> Използваме бисквитки по различни причини, описани по-долу. За съжаление в повечето случаи няма\r\n                        отраслови стандартни опции за деактивиране на бисквитките, без да се деактивира напълно функционалността\r\n                        и функции, които те добавят към този сайт. Препоръчително е да оставите на всички бисквитки, ако сте\r\n                        не сте сигурни дали имате нужда от тях или не, в случай че се използват за предоставяне на услуга, която използвате.\r\n                    </p>\r\n                    <p> <strong> Деактивиране на бисквитки </strong> </p>\r\n                    <p> Можете да предотвратите настройването на бисквитки, като коригирате настройките на вашия браузър (вижте вашия\r\n                        Помощ за браузъра за това как да направите това). Имайте предвид, че деактивирането на бисквитките ще повлияе на функционалността\r\n                        на този и много други уебсайтове, които посещавате. Деактивирането на бисквитките обикновено води и до\r\n                        деактивиране на определени функционалности и функции на този сайт. Затова се препоръчва това\r\n                        не деактивирате бисквитките. Тази политика за бисквитките е създадена с помощта на <a\r\n                            href = \"https://www.cookiepolicygenerator.com/cookie-policy-generator/\"> Политика за бисквитки\r\n                            Генератор от CookiePolicyGenerator.com </a>. </p>\r\n                    <p> <strong> Бисквитките, които задаваме </strong> </p>\r\n                    <ul>\r\n                        <li>\r\n                            <p> Бисквитки, свързани с влизането </p>\r\n                            <p> Използваме бисквитки, когато сте влезли, за да можем да запомним този факт. Това предотвратява\r\n                                не трябва да влизате всеки път, когато посещавате нова страница. Тези бисквитки са\r\n                                обикновено се премахва или изчиства, когато излезете, за да сте сигурни, че имате достъп само\r\n                                ограничени функции и зони, когато сте влезли в системата. </p>\r\n                        </li>\r\n                        <li>\r\n                            <p> бисквитки за предпочитания на сайта </p>\r\n                            <p> За да ви предоставим страхотно изживяване на този сайт, ние предоставяме функционалността\r\n                                за да зададете предпочитанията си за начина на работа на този сайт, когато го използвате. За да запомните\r\n                                Вашите предпочитания трябва да зададем бисквитки, така че тази информация да може да се извиква винаги\r\n                                взаимодействате със страница се влияе от вашите предпочитания. </p>\r\n                        </li>\r\n                    </ul>\r\n                    <p> <strong> Бисквитки на трети страни </strong> </p>\r\n                    <p> В някои специални случаи ние също използваме бисквитки, предоставени от доверени трети страни. Следното\r\n                        секция подробно кои бисквитки на трети страни може да срещнете през този сайт. </p>\r\n                    <ul>\r\n                        <li>\r\n                            <p> Този сайт използва Google Analytics, който е един от най-разпространените и надеждни анализи\r\n                                решение в мрежата, което ни помага да разберем как използвате сайта и начините, по които ние\r\n                                може да подобри вашия опит. Тези бисквитки могат да проследяват неща като например колко време прекарвате\r\n                                на сайта и страниците, които посещавате, за да можем да продължим да създаваме увлекателно съдържание.\r\n                            </p>\r\n                            <p> За повече информация относно бисквитките на Google Analytics вижте официалната страница на Google Analytics.\r\n                            </p>\r\n                        </li>\r\n                    </ul>\r\n                    <p> <strong> Повече информация </strong> </p>\r\n                                               <p> Надяваме се, че това е изяснило нещата за вас и както беше споменато по-рано, ако има нещо\r\n                         че не сте сигурни дали имате нужда или не, обикновено е по-безопасно да оставите бисквитките активирани в случай\r\n                         той взаимодейства с една от функциите, които използвате на нашия сайт. </p>\r\n                     <p> Ако обаче все още търсите повече информация, можете да се свържете с нас чрез един от нашите\r\n                         предпочитани методи за контакт: </p>\r\n                     <ul>\r\n                         <li> Имейл: devit@gmail.com </li>\r\n                     </ul>');

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
(1, 'user_score', 'Рейтинг'),
(2, 'edit_profile', 'Редактирай профила си'),
(3, 'create_a_listing', 'Създай обява'),
(4, 'edit_existing_lisitngs', 'Редактирай твоите обяви'),
(5, 'resume', 'CV'),
(6, 'portfolio', 'Портфолио'),
(7, 'recent_activity', 'Скорошна дейност'),
(8, 'messages', 'Съобщения'),
(9, 'no_messages', 'Няма нови съобщения!'),
(10, 'unread_messages', 'Непрочетени съобщения от'),
(11, 'about_post', 'За обява:'),
(12, 'last_message', 'Последно съобщение:'),
(13, 'by', 'От'),
(14, 'open_conversation', 'Отвори разговора'),
(15, 'send_message', 'Изпрати съобщение'),
(16, 'no_user_scores', 'Потребителят все още няма оценки!');

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
(1, 'first_name', 'Име'),
(2, 'last_name', 'Фамилия'),
(3, 'email_taken', 'Имейл адресът е вече използван. Можете да опитате друг или да '),
(4, 'password', 'Парола'),
(5, 'password_req', 'Поне 8 символа с 1 главна буква, 1 цифра и 1 специален символ'),
(6, 'phone', 'Телефонен номер'),
(7, 'login', 'влезете в акаунта си'),
(8, 'phone_taken', 'Телефонният номер вече се използва!'),
(9, 'by_clicking', 'С натискането'),
(10, 'you_agree', ' Вие се съглавяте '),
(11, 'and', 'и');

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
(1, 'tos_main', '<h1> Общи условия </h1>\r\n                    <p> Последна актуализация: 10 септември 2020 г. </p>\r\n                    <p> Моля, прочетете внимателно тези условия, преди да използвате Нашата услуга. </p>\r\n                    <h1> Тълкуване и определения </h1>\r\n                    <h2> Тълкуване </h2>\r\n                    <p> Думите, с които началната буква е главна, имат значения, дефинирани по-долу\r\n                        условия. Следните определения имат същото значение, независимо дали имат значение\r\n                        се появяват в единствено или в множествено число. </p>\r\n                    <h2> Определения </h2>\r\n                    <p> За целите на настоящите Общи условия: </p>\r\n                    <ul>\r\n                        <li>\r\n                            <p> <strong> Свързано лице </strong> означава обект, който контролира, контролира се или е под него\r\n                                общ контрол със страна, където \"контрол\" означава собственост върху 50% или повече от\r\n                                акции, дялови участия или други ценни книжа с право на глас за избор на директори\r\n                                или друг управляващ орган. </p>\r\n                        </li>\r\n                        <li>\r\n                            <p> <strong> Държава </strong> се отнася до: България </p>\r\n                        </li>\r\n                        <li>\r\n                            <p> <strong> Фирма </strong> (наричана или „Фирмата“, „Ние“, „Нас“ или „Нашата“ в\r\n                                настоящото споразумение) се отнася до Devit.org, Русе, България. </p>\r\n                        </li>\r\n                        <li>\r\n                            <p> <strong> Устройство </strong> означава всяко устройство, което има достъп до Услугата, като компютър,\r\n                                мобилен телефон или цифров таблет. </p>\r\n                        </li>\r\n                        <li>\r\n                            <p> <strong> Услуга </strong> се отнася до уебсайта. </p>\r\n                        </li>\r\n                        <li>\r\n                            <p> <strong> Общи условия </strong> (наричани също „Условия“) означават тези Условия и\r\n                                Условия, които формират цялото споразумение между Вас и Компанията относно използването\r\n                                на Услугата. Настоящото споразумение за условия е създадено с помощта на\r\n                                <a href = \"https://www.termsfeed.com/terms-conditions-generator/\"\r\n                                    target = \"_ blank\"> Генератор на условия и условия </a>. </p>\r\n                        </li>\r\n                                           <li>\r\n                            <p> <strong> Услуга на социални медии на трети страни </strong> означава всякакви услуги или съдържание\r\n                                (включително данни, информация, продукти или услуги), предоставени от трета страна, която може\r\n                                да бъдат показани, включени или предоставени от Услугата. </p>\r\n                        </li>\r\n                        <li>\r\n                            <p> <strong> Уебсайт </strong> се отнася до Devit, достъпен от <a href = \"devit.org\"\r\n                                    rel = \"external nofollow noopener\" target = \"_ blank\"> devit.org </a> </p>\r\n                        </li>\r\n                        <li>\r\n                            <p> <strong> Вие </strong> означава физическото лице, което има достъп или използва Услугата, или компанията,\r\n                                или друго юридическо лице, от името на което такова лице има достъп или използва\r\n                                Услуга, според случая. </p>\r\n                        </li>\r\n                    </ul>\r\n                    <h1> Потвърждение </h1>\r\n                    <p> Това са Общите условия, регулиращи използването на тази услуга и споразумението, което\r\n                        оперира между Вас и Компанията. Тези Общи условия определят правата и\r\n                        задължения на всички потребители относно използването на Услугата. </p>\r\n                    <p> Вашият достъп до и използването на Услугата е обусловен от Вашето приемане и спазване\r\n                        настоящите Общи условия. Тези Общи условия се отнасят за всички посетители, потребители и други\r\n                        които имат достъп или използват Услугата. </p>\r\n                    <p> Чрез достъпа или използването на Услугата вие се съгласявате да бъдете обвързани от настоящите Общи условия. Ако ти\r\n                        не се съгласявате с която и да е част от настоящите Общи условия, тогава нямате достъп до Услугата. </p>\r\n                    <p> Вие заявявате, че сте на възраст над 18 години. Компанията не позволява на лица под 18 години да използват\r\n                        Услугата. </p>\r\n                    <p> Вашият достъп до и използването на Услугата също е обусловен от Вашето приемане и спазване\r\n                        с Политиката за поверителност на Компанията. Нашата Политика за поверителност описва Нашите политики и процедури\r\n                        относно събирането, използването и разкриването на Вашата лична информация, когато използвате Приложението\r\n                        или уебсайта и Ви разказва за Вашите права за поверителност и как законът Ви защитава. Моля Прочети\r\n                        Нашата Политика за поверителност внимателно, преди да използвате нашата услуга. </p>\r\n                    <h1> Връзки към други уебсайтове </h1>\r\n                    <p> Нашата услуга може да съдържа връзки към уеб сайтове или услуги на трети страни, които не са собственост или\r\n                        контролирани от Дружеството. </p>\r\n                                           <p> Компанията няма контрол и не поема отговорност за съдържанието и поверителността\r\n                        политики или практики на уеб сайтове или услуги на трети страни. По-нататък признавате и\r\n                        се съгласявате, че Компанията не носи отговорност, пряка или непряка, за каквото и да било\r\n                        щети или загуби, причинени или за които се твърди, че са причинени от или във връзка с използването или разчитането на\r\n                        всяко такова съдържание, стоки или услуги, достъпни на или чрез такива уеб сайтове или услуги. </p>\r\n                    <p> Настоятелно Ви съветваме да прочетете условията и политиките за поверителност на трети страни\r\n                        уеб сайтове или услуги, които посещавате. </p>\r\n                    <h1> Прекратяване </h1>\r\n                    <p> Ние можем да прекратим или спрем Вашия достъп незабавно, без предварително уведомление или отговорност, за какъвто и да е такъв\r\n                        каквато и да е причина, включително без ограничение, ако нарушите тези Общи условия. </p>\r\n                    <p> При прекратяване Вашето право да използвате Услугата ще прекрати незабавно. </p>\r\n                    <h1> Ограничение на отговорността </h1>\r\n                    <p> Независимо от каквито и да е щети, които Вие бихте могли да претърпите, цялата отговорност на Компанията и някоя от\r\n                        неговите доставчици съгласно която и да е разпоредба от настоящите Условия и Вашето изключително средство за защита за всички\r\n                        гореизложеното ще бъде ограничено до действително платената от Вас сума чрез Услугата или 100 USD, ако\r\n                        Не сте закупили нищо чрез Услугата. </p>\r\n                    <p> В максималната степен, разрешена от приложимото законодателство, в никакъв случай Компанията или нейните доставчици не трябва\r\n                        да носите отговорност за каквито и да било специални, случайни, косвени или последващи щети (включително,\r\n                        но не само, щети за загуба на печалба, загуба на данни или друга информация за бизнеса\r\n                        прекъсване, за лично нараняване, загуба на поверителност, произтичаща от или по какъвто и да е начин свързана с\r\n                        използване или невъзможност за използване на Услугата, използван софтуер на трети страни и / или хардуер на трети страни\r\n                        с Услугата или по друг начин във връзка с която и да е разпоредба от настоящите Условия), дори ако\r\n                        Фирмата или който и да е доставчик е бил уведомен за възможността за такива щети и дори ако\r\n                        средство за защита се провали от основната си цел. </p>\r\n                    <p> Някои държави не позволяват изключването на подразбиращи се гаранции или ограничаване на отговорността за\r\n                        случайни или последващи щети, което означава, че някои от горните ограничения може да не са\r\n                        Приложи. В тези държави отговорността на всяка страна ще бъде ограничена в най-голямата степен, позволена\r\n                        по закон. </p>\r\n                    <h1> ОТКАЗ ОТ \"КАКВИ Е\" и \"КАТО НАЛИЧНИ\" </h1>\r\n                    <p> Услугата се предоставя на Вас \"КАКВИ Е\" и \"КАТО НАЛИЧНИ\" и с всички грешки и дефекти без\r\n                        гаранция от всякакъв вид. В максималната степен, разрешена от приложимото законодателство, Дружеството, на своя\r\n                        от свое име и от името на неговите филиали и неговите и техните съответни лицензодатели и услуги\r\n                        доставчици, изрично се отказва от всички гаранции, независимо дали са изрични, подразбиращи се, законови или по друг начин,\r\n                        по отношение на Услугата, включително всички подразбиращи се гаранции за продаваемост, годност за a\r\n                        конкретна цел, право на собственост и ненарушаване и гаранции, които могат да възникнат в рамките на\r\n                        сделки, ход на изпълнение, употреба или търговска практика. Без ограничение до гореизложеното,\r\n                        Дружеството не предоставя никакви гаранции или гаранции');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

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
