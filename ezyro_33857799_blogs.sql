-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql107.ezyro.com
-- Generation Time: Sep 13, 2023 at 03:22 AM
-- Server version: 10.4.17-MariaDB
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
-- Database: `ezyro_33857799_blogs`
--

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `blog_id` int(10) NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `thumbnail` varchar(50) NOT NULL,
  `user_id` int(10) NOT NULL,
  `dt` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`blog_id`, `title`, `description`, `thumbnail`, `user_id`, `dt`) VALUES
(9, 'The HyperText Markup Language or HTML', 'The HyperText Markup Language or HTML is the standard markup language for documents designed to be displayed in a web browser. It defines the meaning and structure of web content. It is often assisted by technologies such as Cascading Style Sheets (CSS) and scripting languages such as JavaScript.\r\nWeb browsers receive HTML documents from a web server or from local storage and render the documents into multimedia web pages. HTML describes the structure of a web page semantically and originally included cues for its appearance.\r\n\r\nHTML elements are the building blocks of HTML pages. With HTML constructs, images and other objects such as interactive forms may be embedded into the rendered page. HTML provides a means to create structured documents by denoting structural semantics for text such as headings, paragraphs, lists, links, quotes, and other items. HTML elements are delineated by tags, written using angle brackets. Tags such as <img> and <input> directly introduce content into the page. Other tags such as <p> and </p> surround and provide information about document text and may include sub-element tags. Browsers do not display the HTML tags but use them to interpret the content of the page.\r\n\r\nHTML can embed programs written in a scripting language such as JavaScript, which affects the behavior and content of web pages. The inclusion of CSS defines the look and layout of content. The World Wide Web Consortium (W3C), former maintainer of the HTML and current maintainer of the CSS standards, has encouraged the use of CSS over explicit presentational HTML since 1997.[2] A form of HTML, known as HTML5, is used to display video and audio, primarily', 'HTML introduction.jpeg', 3, '2023-09-10 11:00:38'),
(10, 'Cascading Style Sheets (CSS)', 'Cascading Style Sheets (CSS) is a style sheet language used for describing the presentation of a document written in a markup language such as HTML or XML (including XML dialects such as SVG, MathML or XHTML).[1] CSS is a cornerstone technology of the World Wide Web, alongside HTML and JavaScript.\r\nCSS is designed to enable the separation of content and presentation, including layout, colors, and fonts.[3] This separation can improve content accessibility; provide more flexibility and control in the specification of presentation characteristics; enable multiple web pages to share formatting by specifying the relevant CSS in a separate .css file, which reduces complexity and repetition in the structural content; and enable the .css file to be cached to improve the page load speed between the pages that share the file and its formatting.\r\n\r\nSeparation of formatting and content also makes it feasible to present the same markup page in different styles for different rendering methods, such as on-screen, in print, by voice (via speech-based browser or screen reader), and on Braille-based tactile devices. CSS also has rules for alternate formatting if the content is accessed on a mobile device.[4]', 'cssimg.jpeg', 3, '2023-09-10 21:09:09'),
(14, 'Why Study JavaScript?', 'Letâ€™s see whatâ€™s so special about JavaScript, what we can achieve with it, and what other technologies play well with it.\r\n\r\nWhat is JavaScript?\r\nJavaScript was initially created to â€œmake web pages aliveâ€.\r\n\r\nThe programs in this language are called scripts. They can be written right in a web pageâ€™s HTML and run automatically as the page loads.\r\n\r\nScripts are provided and executed as plain text. They donâ€™t need special preparation or compilation to run.\r\n\r\nIn this aspect, JavaScript is very different from another language called Java.\r\n\r\nWhy is it called JavaScript?\r\nWhen JavaScript was created, it initially had another name: â€œLiveScriptâ€. But Java was very popular at that time, so it was decided that positioning a new language as a â€œyounger brotherâ€ of Java would help.\r\n\r\nBut as it evolved, JavaScript became a fully independent language with its own specification called ECMAScript, and now it has no relation to Java at all.\r\n\r\nToday, JavaScript can execute not only in the browser, but also on the server, or actually on any device that has a special program called the JavaScript engine.\r\n\r\nThe browser has an embedded engine sometimes called a â€œJavaScript virtual machineâ€.\r\n\r\nDifferent engines have different â€œcodenamesâ€. For example:\r\n\r\nV8 â€“ in Chrome, Opera and Edge.\r\nSpiderMonkey â€“ in Firefox.\r\nâ€¦There are other codenames like â€œChakraâ€ for IE, â€œJavaScriptCoreâ€, â€œNitroâ€ and â€œSquirrelFishâ€ for Safari, etc.\r\nThe terms above are good to remember because they are used in developer articles on the internet. Weâ€™ll use them too. For instance, if â€œa feature X is supported by V8â€, then it probably works in Chrome, Opera and Edge.\r\n\r\nHow do engines work?\r\nEngines are complicated. But the basics are easy.\r\n\r\nThe engine (embedded if itâ€™s a browser) reads (â€œparsesâ€) the script.\r\nThen it converts (â€œcompilesâ€) the script to machine code.\r\nAnd then the machine code runs, pretty fast.\r\nThe engine applies optimizations at each step of the process. It even watches the compiled script as it runs, analyzes the data that flows through it, and further optimizes the machine code based on that knowledge.\r\n\r\nWhat can in-browser JavaScript do?\r\nModern JavaScript is a â€œsafeâ€ programming language. It does not provide low-level access to memory or the CPU, because it was initially created for browsers which do not require it.\r\n\r\nJavaScriptâ€™s capabilities greatly depend on the environment itâ€™s running in. For instance, Node.js supports functions that allow JavaScript to read/write arbitrary files, perform network requests, etc.\r\n\r\nIn-browser JavaScript can do everything related to webpage manipulation, interaction with the user, and the webserver.\r\n\r\nFor instance, in-browser JavaScript is able to:\r\n\r\nAdd new HTML to the page, change the existing content, modify styles.\r\nReact to user actions, run on mouse clicks, pointer movements, key presses.\r\nSend requests over the network to remote servers, download and upload files (so-called AJAX and COMET technologies).\r\nGet and set cookies, ask questions to the visitor, show messages.\r\nRemember the data on the client-side (â€œlocal storageâ€).\r\nWhat CANâ€™T in-browser JavaScript do?\r\nJavaScriptâ€™s abilities in the browser are limited to protect the userâ€™s safety. The aim is to prevent an evil webpage from accessing private information or harming the userâ€™s data.\r\n\r\nExamples of such restrictions include:\r\n\r\nJavaScript on a webpage may not read/write arbitrary files on the hard disk, copy them or execute programs. It has no direct access to OS functions.\r\n\r\nModern browsers allow it to work with files, but the access is limited and only provided if the user does certain actions, like â€œdroppingâ€ a file into a browser window or selecting it via an <input> tag.\r\n\r\nThere are ways to interact with the camera/microphone and other devices, but they require a userâ€™s explicit permission. So a JavaScript-enabled page may not sneakily enable a web-camera, observe the surroundings and send the information to the NSA.\r\n\r\nDifferent tabs/windows generally do not know about each other. Sometimes they do, for example when one window uses JavaScript to open the other one. But even in this case, JavaScript from one page may not access the other page if they come from different sites (from a different domain, protocol or port).\r\n\r\nThis is called the â€œSame Origin Policyâ€. To work around that, both pages must agree for data exchange and must contain special JavaScript code that handles it. Weâ€™ll cover that in the tutorial.\r\n\r\nThis limitation is, again, for the userâ€™s safety. A page from http://anysite.com which a user has opened must not be able to access another browser tab with the URL http://gmail.com, for example, and steal information from there.\r\n\r\nJavaScript can easily communicate over the net to the server where the current page came from. But its ability to receive data from other sites/domains is crippled. Though possible, it requires explicit agreement (expressed in HTTP headers) from the remote side. Once again, thatâ€™s a safety limitation.\r\n\r\n\r\nSuch limitations do not exist if JavaScript is used outside of the browser, for example on a server. Modern browsers also allow plugins/extensions which may ask for extended permissions.\r\n\r\nWhat makes JavaScript unique?\r\nThere are at least three great things about JavaScript:\r\n\r\nFull integration with HTML/CSS.\r\nSimple things are done simply.\r\nSupported by all major browsers and enabled by default.\r\nJavaScript is the only browser technology that combines these three things.\r\n\r\nThatâ€™s what makes JavaScript unique. Thatâ€™s why itâ€™s the most widespread tool for creating browser interfaces.\r\n\r\nThat said, JavaScript can be used to create servers, mobile applications, etc.\r\n\r\nLanguages â€œoverâ€ JavaScript\r\nThe syntax of JavaScript does not suit everyoneâ€™s needs. Different people want different features.\r\n\r\nThatâ€™s to be expected, because projects and requirements are different for everyone.\r\n\r\nSo, recently a plethora of new languages appeared, which are transpiled (converted) to JavaScript before they run in the browser.\r\n\r\nModern tools make the transpilation very fast and transparent, actually allowing developers to code in another language and auto-converting it â€œunder the hoodâ€.\r\n\r\nExamples of such languages:\r\n\r\nCoffeeScript is â€œsyntactic sugarâ€ for JavaScript. It introduces shorter syntax, allowing us to write clearer and more precise code. Usually, Ruby devs like it.\r\nTypeScript is concentrated on adding â€œstrict data typingâ€ to simplify the development and support of complex systems. It is developed by Microsoft.\r\nFlow also adds data typing, but in a different way. Developed by Facebook.\r\nDart is a standalone language that has its own engine that runs in non-browser environments (like mobile apps), but also can be transpiled to JavaScript. Developed by Google.\r\nBrython is a Python transpiler to JavaScript that enables the writing of applications in pure Python without JavaScript.\r\nKotlin is a modern, concise and safe programming language that can target the browser or Node.\r\nThere are more. Of course, even if we use one of these transpiled languages, we should also know JavaScript to really understand what weâ€™re doing.\r\n\r\nSummary\r\nJavaScript was initially created as a browser-only language, but it is now used in many other environments as well.\r\nToday, JavaScript has a unique position as the most widely-adopted browser language, fully integrated with HTML/CSS.\r\nThere are many languages that get â€œtranspiledâ€ to JavaScript and provide certain features. It is recommended to take a look at them, at least briefly, after mastering JavaScript.', 'WhatsApp Image 2023-09-12 at 1.02.14 PM.jpeg', 3, '2023-09-12 07:07:20');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(10) NOT NULL,
  `name` text NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `dt` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `name`, `username`, `password`, `dt`) VALUES
(3, 'Ankit ', 'ankit', '$2y$10$IwUc8KR8O1NTqNBSN91Z2uGoJHMF6GAvPLbHbvHb/vZnNXzVwegTG', '2023-09-10 06:34:58');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`blog_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `blog_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
