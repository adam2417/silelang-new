CREATE TABLE `tb_daftar_lelang` (
  `id_lelang` int(5) DEFAULT NULL,
  `id_kontraktor` int(5) DEFAULT NULL,
  `proposal` varchar(200) DEFAULT NULL,
  `nopendaftaran` varchar(250) DEFAULT NULL
);

CREATE TABLE `tb_kontraktor` (
  `id_kontraktor` int(5) NOT NULL,
  `nama` varchar(500) DEFAULT NULL,
  `alamat` text,
  `notelp` varchar(25) DEFAULT NULL,
  `npwp` varchar(100) DEFAULT NULL,
  `deskripsi` text,
  `contactperson` varchar(1000) DEFAULT NULL,
  `namapemilik` varchar(1000) DEFAULT NULL
);

CREATE TABLE `tb_kriteria` (
  `id_kriteria` int(5) NOT NULL,
  `deskripsi` text
);

CREATE TABLE `tb_lelang` (
  `id_lelang` int(5) NOT NULL,
  `nama` varchar(2000) DEFAULT NULL,
  `deskripsi` text,
  `anggaran` double DEFAULT '0',
  `estimasi_waktu` varchar(50) DEFAULT NULL,
  `lokasi` text,
  `tgl_mulai` date DEFAULT NULL,
  `tgl_selesai` date DEFAULT NULL
);

CREATE TABLE `tb_penilaian` (
  `nopendaftaran` varchar(250) DEFAULT NULL,
  `id_sub_kriteria` int(11) DEFAULT NULL,
  id_kriteria int(11) DEFAULT NULL,
  `nilai` int(100) DEFAULT '0'
);

CREATE TABLE `tb_role` (
  `role_id` int(11) NOT NULL,
  `role_desc` varchar(500) DEFAULT NULL,
  `active` int(11) DEFAULT NULL
);

CREATE TABLE `tb_sub_kriteria` (
  `id_sub` int(5) NOT NULL,
  `id_kriteria` int(5) DEFAULT NULL,
  `deskripsi` text
);

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `username` varchar(25) DEFAULT NULL,
  `pass` varchar(150) DEFAULT NULL,
  `status` int(3) DEFAULT '1',
  `id_kontraktor` int(5) DEFAULT NULL,
  `role` int(11) NOT NULL
);

create table tb_mnu_list (
    mnu_id int primary key AUTO_INCREMENT,
    mnu_parent_id int default null,
    deskripsi varchar(150),
    links text,
    icons text,
    has_child int default 0,
    is_active int default 1
 );
 
create table tb_mnu_mapping( 
    mnu_id int, 
    role_id int, 
    is_active int default 1 
);

create table tb_mnu_action( 
    mnu_id int, 
    action_id int, 
    deskripsi varchar(100), 
    links text, 
    icons text, 
    is_active int default 1 
);

create table tb_mnu_action_map ( 
    action_id int, 
    role_id int, 
    is_active int default 1 
);

ALTER TABLE `tb_kontraktor`
  ADD PRIMARY KEY (`id_kontraktor`);
  
ALTER TABLE `tb_kriteria`
  ADD PRIMARY KEY (`id_kriteria`);
  
ALTER TABLE `tb_role`
  ADD PRIMARY KEY (`role_id`);
  
ALTER TABLE `tb_sub_kriteria`
  ADD UNIQUE KEY `idx_sub_kriteria` (`id_sub`,`id_kriteria`);
  
ALTER TABLE `tb_penilaian`
  ADD UNIQUE KEY `idx_penilaian` (`id_sub_kriteria`,`id_kriteria`,nopendaftaran);
  
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);
  
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
  
CREATE or replace VIEW `vw_daftar_lelang`  
AS  
select a.id_daftar,`a`.`id_lelang`,`a`.`id_kontraktor`,`a`.`proposal`,`a`.`nopendaftaran`,`b`.`nama` as nama_lelang,
`b`.`deskripsi`,`b`.`anggaran`,`b`.`estimasi_waktu`,`b`.`lokasi`,`b`.`tgl_mulai`,`b`.`tgl_selesai`,
`c`.`nama` as nama_kontraktor,`c`.`alamat`,`c`.`notelp`,`c`.`npwp`,`c`.`deskripsi` des_kontraktor,`c`.`contactperson`,`c`.`namapemilik`
from `tb_daftar_lelang` `a` 
join `tb_lelang` `b` on `a`.`id_lelang` = `b`.`id_lelang`
join `tb_kontraktor` `c` on `a`.`id_kontraktor` = `c`.`id_kontraktor`;

CREATE or replace VIEW `vw_user`  AS  
select `a`.`id`,`a`.`username`,`a`.`pass`,`a`.`role`,`a`.`status`,`b`.`id_kontraktor`,`b`.`nama`,`b`.`alamat`,
`b`.`notelp`,`b`.`npwp`,`b`.`deskripsi`,`b`.`contactperson`,`b`.`namapemilik` 
from `tb_user` `a` 
join `tb_kontraktor` `b` on `a`.`id_kontraktor` = `b`.`id_kontraktor`;

create or replace view vw_penilaian_by_kriteria
as
select distinct a.id_sub_kriteria,a.nilai,c.deskripsi desk_sub,b.deskripsi,a.nopendaftaran,a.id_kriteria
from tb_penilaian a
join tb_kriteria b on a.id_kriteria=b.id_kriteria
join tb_sub_kriteria c on a.id_sub_kriteria=c.id_sub and b.id_kriteria = c.id_kriteria;

CREATE or replace VIEW `vw_rekap_penilaian` AS 
select `a`.`nopendaftaran` AS `nopendaftaran`,`a`.`nilai` AS `nilai`,`c`.`nama` AS `kontraktor`,
`a`.`id_kriteria` AS `id_kriteria`,`d`.`deskripsi` AS `Kriteria`,`a`.`id_sub_kriteria` AS `id_sub_kriteria`,
`e`.`deskripsi` AS `SubKriteria`,`b`.`id_lelang` AS `ID_LELANG` 
from ((((`tb_penilaian` `a` join `tb_daftar_lelang` `b` on((`a`.`nopendaftaran` = `b`.`nopendaftaran`))) 
join `tb_kontraktor` `c` on((`b`.`id_kontraktor` = `c`.`id_kontraktor`))) 
join `tb_kriteria` `d` on((`a`.`id_kriteria` = `d`.`id_kriteria`))) 
join `tb_sub_kriteria` `e` on(((`a`.`id_sub_kriteria` = `e`.`id_sub`) and (`a`.`id_kriteria` = `e`.`id_kriteria`))));

CREATE or replace VIEW `vw_rekap_nilai_kriteria` AS 
select `vw_rekap_penilaian`.`nopendaftaran` AS `nopendaftaran`,`vw_rekap_penilaian`.`kontraktor` AS `kontraktor`,
`vw_rekap_penilaian`.`id_kriteria` AS `id_kriteria`,`vw_rekap_penilaian`.`Kriteria` AS `kriteria`,
avg(`vw_rekap_penilaian`.`nilai`) AS `nilaiKriteria`,`vw_rekap_penilaian`.`ID_LELANG` AS `ID_LELANG` 
from `vw_rekap_penilaian` group by `vw_rekap_penilaian`.`nopendaftaran`,`vw_rekap_penilaian`.`kontraktor`,
`vw_rekap_penilaian`.`id_kriteria`,`vw_rekap_penilaian`.`Kriteria`,`vw_rekap_penilaian`.`ID_LELANG`;

CREATE or replace VIEW `vw_pow_kontraktor` AS 
select `vw_rekap_nilai_kriteria`.`kontraktor` AS `KONTRAKTOR`,`vw_rekap_nilai_kriteria`.
`ID_LELANG` AS `ID_LELANG`,sum(pow(`vw_rekap_nilai_kriteria`.`nilaiKriteria`,2)) AS `NILAI` 
from `vw_rekap_nilai_kriteria` 
group by `vw_rekap_nilai_kriteria`.`kontraktor`,`vw_rekap_nilai_kriteria`.`ID_LELANG`;

CREATE or replace VIEW `vw_pow_kriteria` AS 
select `vw_rekap_nilai_kriteria`.`id_kriteria` AS `ID_KRITERIA`,
`vw_rekap_nilai_kriteria`.`ID_LELANG` AS `ID_LELANG`,sum(pow(`vw_rekap_nilai_kriteria`.`nilaiKriteria`,2)) AS `NILAI` 
from `vw_rekap_nilai_kriteria` group by `vw_rekap_nilai_kriteria`.`id_kriteria`,`vw_rekap_nilai_kriteria`.`ID_LELANG`;

CREATE or replace VIEW `vw_sqrt_kontraktor` AS 
select `vw_pow_kontraktor`.`KONTRAKTOR` AS `KONTRAKTOR`,`vw_pow_kontraktor`.`ID_LELANG` AS `ID_LELANG`,
sqrt(`vw_pow_kontraktor`.`NILAI`) AS `nilai` from `vw_pow_kontraktor`;

CREATE or replace VIEW `vw_sqrt_kriteria` AS 
select `vw_pow_kriteria`.`ID_KRITERIA` AS `ID_KRITERIA`,`vw_pow_kriteria`.`ID_LELANG` AS `ID_LELANG`,
sqrt(`vw_pow_kriteria`.`NILAI`) AS `nilai` from `vw_pow_kriteria`;

CREATE or replace VIEW `vw_matriks_normalisasi` AS 
select `a`.`ID_LELANG` AS `id_lelang`,`a`.`ID_KRITERIA` AS `id_kriteria`,`a`.`nilai` AS `nilai`,
`b`.`nilaiKriteria` AS `nilaikriteria`,(`b`.`nilaiKriteria` / `a`.`nilai`) AS `nilainormalisasi`,
`b`.`kontraktor` AS `kontraktor` from (`vw_sqrt_kriteria` `a` join `vw_rekap_nilai_kriteria` `b`) 
where ((`a`.`ID_LELANG` = `b`.`ID_LELANG`) and (`a`.`ID_KRITERIA` = `b`.`id_kriteria`));

CREATE or replace VIEW `vw_matriks_normalisasi_bobot` AS 
select `vw_matriks_normalisasi`.`id_lelang` AS `id_lelang`,`vw_matriks_normalisasi`.`id_kriteria` AS `id_kriteria`,
`vw_matriks_normalisasi`.`nilai` AS `nilai`,`vw_matriks_normalisasi`.`nilaikriteria` AS `nilaikriteria`,
(`vw_matriks_normalisasi`.`nilainormalisasi` * 100) AS `nilainormalisasi`,`vw_matriks_normalisasi`.`kontraktor` AS `kontraktor` 
from `vw_matriks_normalisasi`;

CREATE or replace VIEW `vw_ymax_ymin` AS 
select `vw_matriks_normalisasi_bobot`.`id_lelang` AS `id_lelang`,
`vw_matriks_normalisasi_bobot`.`id_kriteria` AS `id_kriteria`,
max(`vw_matriks_normalisasi_bobot`.`nilainormalisasi`) AS `ymax`,
min(`vw_matriks_normalisasi_bobot`.`nilainormalisasi`) AS `ymin` 
from `vw_matriks_normalisasi_bobot` 
group by `vw_matriks_normalisasi_bobot`.`id_lelang`,`vw_matriks_normalisasi_bobot`.`id_kriteria`;

CREATE or replace VIEW `vw_rekap_dmax_dmin` AS 
select `a`.`kontraktor` AS `kontraktor`,`a`.`id_lelang` AS `id_lelang`,`a`.`id_kriteria` AS `id_kriteria`,
(`a`.`nilainormalisasi` - `b`.`ymax`) AS `nilaimax`,(`a`.`nilainormalisasi` - `b`.`ymin`) AS `nilaimin`,
pow((`a`.`nilainormalisasi` - `b`.`ymax`),2) AS `dmax`,pow((`a`.`nilainormalisasi` - `b`.`ymin`),2) AS `dmin` 
from (`vw_matriks_normalisasi_bobot` `a` join `vw_ymax_ymin` `b`) where ((`a`.`id_lelang` = `b`.`id_lelang`) 
and (`a`.`id_kriteria` = `b`.`id_kriteria`));

CREATE or replace VIEW `vw_dmax_dmin_pow` AS 
select `a`.`kontraktor` AS `kontraktor`,`a`.`id_lelang` AS `id_lelang`,
`a`.`id_kriteria` AS `id_kriteria`,`a`.`nilainormalisasi` AS `nilainormalisasi`,
`b`.`ymax` AS `ymax`,(`a`.`nilainormalisasi` - `b`.`ymax`) AS `dmax`,`b`.`ymin` AS `ymin`,
(`a`.`nilainormalisasi` - `b`.`ymin`) AS `dmin` from (`vw_matriks_normalisasi_bobot` `a` join `vw_ymax_ymin` `b`) 
where ((`a`.`id_lelang` = `b`.`id_lelang`) and (`a`.`id_kriteria` = `b`.`id_kriteria`));

CREATE or replace VIEW `vw_hasil_dmax_dmin` AS 
select `vw_rekap_dmax_dmin`.`kontraktor` AS `kontraktor`,`vw_rekap_dmax_dmin`.`id_lelang` AS `id_lelang`,
sqrt(sum(`vw_rekap_dmax_dmin`.`dmax`)) AS `dmax`,sqrt(sum(`vw_rekap_dmax_dmin`.`dmin`)) AS `dmin` 
from `vw_rekap_dmax_dmin` group by `vw_rekap_dmax_dmin`.`kontraktor`,`vw_rekap_dmax_dmin`.`id_lelang`;

CREATE or replace VIEW `vw_hasil_akhir_spk` AS 
select `vw_hasil_dmax_dmin`.`id_lelang` AS `id_lelang`,`vw_hasil_dmax_dmin`.`kontraktor` AS `kontraktor`,
(`vw_hasil_dmax_dmin`.`dmin` / (`vw_hasil_dmax_dmin`.`dmax` + `vw_hasil_dmax_dmin`.`dmin`)) AS `hasilakhir` 
from `vw_hasil_dmax_dmin`;

create or replace view vw_hsl_penilaian as
select b.id_lelang,c.nama nama_kontraktor,e.deskripsi kriteria,d.deskripsi sub_kriteria,a.nilai from tb_penilaian a
join tb_daftar_lelang b on a.nopendaftaran=b.nopendaftaran
join tb_kontraktor c on b.id_kontraktor=c.id_kontraktor
join tb_sub_kriteria d on a.id_sub_kriteria=d.id_sub
join tb_kriteria e on a.id_kriteria=e.id_kriteria and e.id_kriteria=d.id_kriteria;

create or replace view vw_mnu_matriks AS
select a.mnu_id,mnu_parent_id,deskripsi,links,icons,has_child,role_id from tb_mnu_list a 
left join tb_mnu_mapping b on a.mnu_id=b.mnu_id


INSERT INTO tb_mnu_list(
    mnu_id,
    mnu_parent_id,
    deskripsi,
    links,
    icons,
    has_child
)
VALUES
(1, NULL, 'Home','/home','fa fa-home fa-fw',0),
(2,null,'Lelang','/lelang','fa fa-bullhorn fa-fw',0),
(3,null,'Daftar Lelang','/daftar-lelang','fa fa-list-alt fa-fw',0),
(4,null,'Penilaian','/penilaian','fa fa-table fa-fw',0),
(5,null,'Setting','#','fa fa-cogs fa-fw',1),
(6,5,'User','/user','fa fa-users fa-fw',0),
(7,5,'Kontraktor','/kontraktor','fa fa-sticky-note fa-fw',0),
(8,5,'Kriteria','/kriteria','fa fa-check-square fa-fw',0);

INSERT INTO `tb_mnu_mapping` (`mnu_id`, `role_id`, `is_active`) 
VALUES
('1', '1', '1'),
('2', '1', '1'),
('3', '1', '1'),
('4', '1', '1'),
('5', '1', '1'),
('6', '1', '1'),
('7', '1', '1'),
('8', '1', '1'),
('1', '2', '1'),
('2', '2', '1'),
('3', '2', '1'),
('5', '2', '1'),
('7', '2', '1');
