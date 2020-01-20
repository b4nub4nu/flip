-- 1. create database
CREATE DATABASE IF NOT EXISTS `flip` ;

-- 2. use database flip
USE `flip`;

-- 3. create table disbursment
CREATE TABLE IF NOT EXISTS `disbursment` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `time_served` char(50) DEFAULT NULL,
    `id_disbursment` char(50) DEFAULT NULL,
    `receipt` varchar(250) DEFAULT NULL,
    `status_disbursment` varchar(250) DEFAULT NULL,
    `response` text,
    `request` text,
    `url_api` varchar(200) DEFAULT NULL,
    `created_at` datetime DEFAULT NULL,
    `updated_at` datetime DEFAULT NULL,
    `fee` int(11) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

