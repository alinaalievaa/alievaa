
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";
CREATE TABLE `zayavka` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `info` varchar(15) DEFAULT NULL,
  `tarif` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
INSERT INTO `zayavka` (`id`, `name`, `email`, `info`, `tarif`) VALUES
(4, 'Алиева Алина Газраталиевна', 'alina@gmail.com', '89131667889', 'Запись на ногти 23.01');
ALTER TABLE `zayavka`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `zayavka`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

