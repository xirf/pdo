SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `jabatan` (
  `id_jabatan` int(5) NOT NULL AUTO_INCREMENT,
  `nama_jabatan` varchar(26) NOT NULL,
  PRIMARY KEY (`id_jabatan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `jabatan` (`nama_jabatan`) VALUES
('5');

CREATE TABLE `karyawan` (
  `id_pegawai` int(5) NOT NULL AUTO_INCREMENT,
  `nama_pegawai` varchar(30) NOT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `foto` varchar(50) DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `id_jabatan` int(5) DEFAULT NULL,
  PRIMARY KEY (`id_pegawai`),
  KEY `jabatan` (`id_jabatan`),
  CONSTRAINT `jabatan_fk` FOREIGN KEY (`id_jabatan`) REFERENCES `jabatan` (`id_jabatan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `karyawan` (`nama_pegawai`, `tgl_lahir`, `foto`, `keterangan`, `id_jabatan`) VALUES
('Mbappe', '2023-11-08', '', 'hh', NULL),
('Fajar', '2023-11-08', '', 'b', NULL),
('Edwin Ganteng', '1998-01-01', 'vini.jpg', 'Tidak Masuk', NULL),
('Fajar tw', '2023-11-09', 'lewy.jpg', 'vvv', NULL);

COMMIT;
