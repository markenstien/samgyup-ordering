CREATE TABLE `employee_time_sheets` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) NOT NULL,
  `time_in` datetime DEFAULT NULL,
  `time_out` datetime DEFAULT NULL,
  `duration` smallint(6) DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `remarks` varchar(100) DEFAULT NULL COMMENT 'add here if timesheet is late has ot etc',
  `status` enum('pending','approved','cancelled') DEFAULT 'approved',
  `approved_by` int(10) DEFAULT NULL,
  `type` enum('automatic','manual') DEFAULT 'automatic' COMMENT 'manual is sent via form',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `is_deleted` tinyint(1) DEFAULT 0,
  `is_ot` tinyint(1) DEFAULT 0,
  `flushed_hours` int(11) DEFAULT NULL COMMENT 'in minutes',
  `entry_type` char(50) DEFAULT NULL,
  `approval_date` datetime DEFAULT NULL,
  `created_by` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=97 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



alter table users
add column salary_per_hour decimal(10,2);


CREATE TABLE `schedules` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) NOT NULL,
  `day` enum('sunday','monday','tuesday','wednesday','thursday','friday','saturday') DEFAULT NULL,
  `time_in` time DEFAULT NULL,
  `time_out` time DEFAULT NULL,
  `is_off` tinyint(1) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;


alter table users 
    add column user_access varchar(50);