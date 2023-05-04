-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2022. Jan 23. 17:26
-- Kiszolgáló verziója: 10.4.17-MariaDB
-- PHP verzió: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `grafikateszt`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `cities`
--

CREATE TABLE `cities` (
  `cityID` int(11) NOT NULL,
  `city` varchar(30) COLLATE utf8_hungarian_ci NOT NULL,
  `countryCity` varchar(30) COLLATE utf8_hungarian_ci NOT NULL,
  `accessibilityBus` tinyint(1) DEFAULT NULL,
  `accessibilityShip` tinyint(1) DEFAULT NULL,
  `accessibilityAirplane` tinyint(1) DEFAULT NULL,
  `accessibilityTrain` tinyint(1) DEFAULT NULL,
  `accessibilityLama` tinyint(1) DEFAULT NULL,
  `accessibilityNoCar` tinyint(1) DEFAULT NULL,
  `cityVideoLink` varchar(50) COLLATE utf8_hungarian_ci DEFAULT NULL,
  `cityAnthem` varchar(50) COLLATE utf8_hungarian_ci DEFAULT NULL,
  `weather` varchar(50) COLLATE utf8_hungarian_ci DEFAULT NULL,
  `cityLinkEgy` varchar(300) COLLATE utf8_hungarian_ci DEFAULT NULL,
  `cityLinkKetto` varchar(300) COLLATE utf8_hungarian_ci DEFAULT NULL,
  `cityKepMagyEgy` varchar(300) COLLATE utf8_hungarian_ci DEFAULT NULL,
  `cityKepMagyKetto` varchar(300) COLLATE utf8_hungarian_ci DEFAULT NULL,
  `cityKepMagyHarom` varchar(300) COLLATE utf8_hungarian_ci DEFAULT NULL,
  `cityKepAngoEgy` varchar(300) COLLATE utf8_hungarian_ci DEFAULT NULL,
  `cityKepAngoKetto` varchar(300) COLLATE utf8_hungarian_ci DEFAULT NULL,
  `cityKepAngoHarom` varchar(300) COLLATE utf8_hungarian_ci DEFAULT NULL,
  `cityKepNemeEgy` varchar(300) COLLATE utf8_hungarian_ci DEFAULT NULL,
  `cityKepNemeKetto` varchar(300) COLLATE utf8_hungarian_ci DEFAULT NULL,
  `cityKepNemeHarom` varchar(300) COLLATE utf8_hungarian_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `cities`
--

INSERT INTO `cities` (`cityID`, `city`, `countryCity`, `accessibilityBus`, `accessibilityShip`, `accessibilityAirplane`, `accessibilityTrain`, `accessibilityLama`, `accessibilityNoCar`, `cityVideoLink`, `cityAnthem`, `weather`, `cityLinkEgy`, `cityLinkKetto`, `cityKepMagyEgy`, `cityKepMagyKetto`, `cityKepMagyHarom`, `cityKepAngoEgy`, `cityKepAngoKetto`, `cityKepAngoHarom`, `cityKepNemeEgy`, `cityKepNemeKetto`, `cityKepNemeHarom`) VALUES
(3, 'Bendigo', 'Ausztralia - Bendigo', 1, 1, 1, 1, 0, 0, 'bUhVuxJfLGE', 'mOITXkzoeVA', '/48d43n123d37/victoria/', 'https://en.wikipedia.org/wiki/Bendigo', 'http://cseaustralia.com.au/ausztralia/ausztralia-a-tavoli-videk-reszletek/victoria', 'A hires Bendigo-i villamos', 'Bendigo-Shamrock Hotel', 'Szent Sziv Katedralis', 'The Famous Tram in Bendigo', 'Hotel Shamrock Bendigo', 'Sacred Heart Cathedral', 'Die beruhmte Straffenbahn in Bendigo', 'Hotel Shamrock Bendigo', 'Kathedrale des Heiligen Herzens'),
(2, 'Chicago', 'Amerika - Chicago', 1, 1, 1, 1, 0, 0, 'M6DtEAYgOsM', 'BxN4B8je5Wc', '/41d88n87d63/chicago/', 'https://hu.wikipedia.org/wiki/Chicago', 'https://www.destinationtips.com/attractions/12-attractions-see-3-days-chicago/?aid=3922971838&cid=853995045&gid=40104427421&tid=kwd-10065251&source=google-ads&gclid=CjwKCAiAlfqOBhAeEiwAYi43F6aVpW6GTXKy-pubdYUoUZkUjjMaFHRwYKBain9QsqT3ITE_wr814hoCud0QAvD_BwE', 'A Szent Patrick nap alkalmabol zoldre festett Chicago folyo', 'Chicago-i autopalya keresztezodes', 'Termeszettudomanyi Muzeum', 'Chicago River dyed green for St. Patrick s Day', 'Highway intersection in Chicago', 'A Field Museum of Natural History', 'Der Chicago River wurde zum St. Patrick s Day grun gefarbt', 'Autobahnkreuzung in Chicago', 'Das Fieldmuseum fur Naturgeschichte'),
(10, 'Cuzco', 'Peru - Cuzco', 1, 0, 1, 0, 1, 0, 'JK_uZpqIk1g', 'zFgBDLBTBVE', '/n13d53n71d97/cusco/', 'https://hu.wikipedia.org/wiki/Cuzco', 'https://utikritika.hu/peru/cusco', 'Cusco belvarosa', 'Plaza de Armas', 'Machu Picchu', 'Central city of Cusco', 'Plaza de Armas', 'Machu Picchu', 'Innenstadt von Cusco', 'Plaza de Armas', 'Machu Picchu'),
(7, 'Nairobi', 'Kenya - Nairobi', 1, 0, 1, 0, 0, 0, 'ofzQqJNEYBk', 'anli6AYKGnk', '/n1d2936d82/nairobi/', 'https://hu.wikipedia.org/wiki/Nairobi', 'https://nairobi.go.ke/', 'Panorama', 'Nairobi Nemzeti park', 'Nairobi-Kenya fovarosa', 'Panorama	Nairobi', 'National Park', 'Nairobi-The capital city of Kenya', 'Panorama', 'Nairobi-Nationalpark', 'Nairobi – Die Hauptstadt von Kenia'),
(5, 'Nantes', 'Franciaorszag - Nantes', 1, 0, 1, 1, 0, 0, '8UAjSxO-rpc', 'J-jdGVTZUpQ', '/47d22n1d55/nantes/', 'https://hu.wikipedia.org/wiki/Nantes', 'https://www.hetedhetorszag.hu/franciaorszag/nantes', 'Nantes-i legvar', 'Szent Peter es Szent Pal szekesegyhaz', 'Loire folyo', 'Nantes aerien château', 'Cathedral of Saint Pierre and Saint Paul', 'Loire river', 'Luftschloss in Nantes', 'Kathedrale von Saint-Pierre und Saint-Paul', 'der Loire Fluss'),
(6, 'Quebec', 'Kanada - Quebec', 1, 1, 1, 1, 0, 0, 'ri8x8jqnLUs', 'eF92-uSiVZQ', '/46d81n71d21/quebec-city/', 'https://utikritika.hu/kanada/quebec', 'https://hu.topworldtraveling.com/articles/travel-guides/15-best-things-to-do-in-quebec-quebec-canada.html', 'Château Frontenac', 'Quebec ovaros', 'A teli Quebec', 'Château Frontenac', 'Old Quebec', 'Quebec in winter', 'Chateau Frontenac', 'Altes Quebec', 'Quebec im Winter'),
(1, 'Sarospatak', 'Magyarorszag - Sarospatak', 1, 1, 1, 1, 0, 0, 'jZ7MlqjP4xw', '1_-n7x8EIe0', '/48d3221d57/sarospatak/', 'https://sarospatak.hu/2019/05/24/szamosujvaron-vendegszerepelt-a-bodrog-neptancegyuttes/', 'https://sarospatak.hu/', 'Rakoczi-Var', 'Reformatus Kollegium konyvtara', 'Arpad-vezer gimnazium', 'The Rakoczi-fortress', 'Library of the Reformed College', 'The Arpad-leader High School', 'Die Rakoczi Burg', 'Bibliothek des Reformierten Kollegiums', 'Das Arpad-fuhrer Gymnasium'),
(8, 'Shanghai', 'Kina - Shanghai', 1, 1, 1, 1, 0, 0, 'kI3Oc-sxSoA', 'Ie19OQhLUVI', '/31d23121d47/shanghai/', 'https://hu.wikipedia.org/wiki/Sanghaj', 'https://novekedes.hu/elemzesek/kina-globalis-kozpontjai-sanghaj', 'Shanghai-autopalya keresztezodes', 'Panorama', 'Shanghai-A varos', 'Shanghai-Hingway intersection', 'Panorama', 'Shanghai-The city', 'Shanghai-Autobahnkreuzung', 'Panorama', 'Shanghai-Die Stadt'),
(9, 'Vlagyivosztok', 'Oroszorszag - Vlagyivosztok', 1, 1, 1, 1, 0, 1, 'QYFimVAJN0g', 'CyLE7Hfl2w4', '/43d12131d89/vladivostok/', 'https://alitraveling.blog.hu/2014/08/28/vlagyivosztok', 'https://hun.lvltravels.com/top-10-things-do-a-427800', 'Arany-hid', 'Maria Kozbenjarasa templom', 'Panorama', 'Russky-bridge', 'Church of the Intercession of the Mother of God', 'Panorama', 'Russky-Brucke', 'Kirche der Furbitte der Muttergottes', 'Panorama'),
(4, 'Zell am See', 'Ausztria - Zell am See', 1, 0, 0, 1, 0, 0, 'lsZtyhn-mw0', 'tIZHcN5V7Js', '/47d3212d80/zell-am-see/', 'https://www.salzburgerland.com/hu/zell-am-see-kaprun-nyar/', 'https://www.austria.info/hu/tel-ausztriaban/salzburg-tartomany?gclid=CjwKCAiAlfqOBhAeEiwAYi43F5E1fzlWg_J0HzRqW6bjtrk2r5sK8ZkRsG1p4nggMx6yTRQi-IOlcRoChLAQAvD_BwE', 'Grand Hotel Zell am See', 'Zell am See-Kaprun', 'A Zelli-to', 'Grand Hotel Zell am See', 'Zell am See-Kaprun', 'Lake of Zell', 'Grand Hotel Zell am See', 'Zell am See-Kaprun', 'Der Zeller See');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
