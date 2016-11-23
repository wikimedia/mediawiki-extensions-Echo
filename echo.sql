-- Database Schema for Echo notification system

CREATE TABLE /*_*/echo_event (
	event_id int unsigned not null primary key auto_increment,
	event_type varchar(64) binary not null,
	event_variant varchar(64) binary null,
	event_agent_id int unsigned null, -- The user who triggered it, if any
	event_agent_ip varchar(39) binary null, -- IP address who triggered it, if any
	event_page_namespace int unsigned null,
	event_page_title varchar(255) binary null,
	event_extra BLOB NULL,
	event_page_id int unsigned null,
	event_deleted tinyint unsigned not null default 0
) /*$wgDBTableOptions*/;

CREATE INDEX /*i*/echo_event_type ON /*_*/echo_event (event_type);
CREATE INDEX /*i*/echo_event_page_id ON /*_*/echo_event (event_page_id);

CREATE TABLE /*_*/echo_notification (
	notification_event int unsigned not null,
	notification_user int unsigned not null,
	notification_timestamp binary(14) not null,
	notification_read_timestamp binary(14) null,
	notification_bundle_base boolean not null default 1,
	notification_bundle_hash varchar(32) binary not null, -- The hash for bundling notifications regardless of timestamp
	notification_bundle_display_hash varchar(32) binary not null, -- The hash for displaying bundle notifications with regard to timestamp, this is is a subset of notification_bundle_hash
	PRIMARY KEY (notification_user, notification_event)
) /*$wgDBTableOptions*/;

CREATE INDEX /*i*/echo_user_timestamp ON /*_*/echo_notification (notification_user,notification_timestamp);
CREATE INDEX /*i*/echo_notification_user_base_read_timestamp ON /*_*/echo_notification (notification_user, notification_bundle_base, notification_read_timestamp);
CREATE INDEX /*i*/echo_notification_user_base_timestamp ON /*_*/echo_notification (notification_user, notification_bundle_base, notification_timestamp, notification_event);
CREATE INDEX /*i*/echo_notification_user_hash_timestamp ON /*_*/echo_notification (notification_user, notification_bundle_hash, notification_timestamp);
CREATE INDEX /*i*/echo_notification_user_hash_base_timestamp ON /*_*/echo_notification (notification_user, notification_bundle_display_hash, notification_bundle_base, notification_timestamp);
CREATE INDEX /*i*/echo_notification_event ON /*_*/echo_notification (notification_event);
CREATE INDEX /*i*/echo_notification_user_read_timestamp ON /*_*/echo_notification (notification_user, notification_read_timestamp);

CREATE TABLE /*_*/echo_email_batch (
	eeb_id int unsigned not null primary key auto_increment,
	eeb_user_id int unsigned not null,
	eeb_event_priority tinyint unsigned not null default 10, -- event priority
	eeb_event_id int unsigned not null,
	eeb_event_hash varchar(32) binary not null
) /*$wgDBTableOptions*/;

CREATE UNIQUE INDEX /*i*/echo_email_batch_user_event ON /*_*/echo_email_batch (eeb_user_id,eeb_event_id);
CREATE INDEX /*i*/echo_email_batch_user_hash_priority ON /*_*/echo_email_batch (eeb_user_id, eeb_event_hash, eeb_event_priority);

CREATE TABLE /*_*/echo_target_page (
	etp_id int unsigned not null primary key auto_increment,
	etp_page int unsigned not null default 0,
	etp_event int unsigned not null default 0
) /*$wgDBTableOptions*/;

CREATE INDEX /*i*/echo_target_page_event ON /*_*/echo_target_page (etp_event);
CREATE INDEX /*i*/echo_target_page_page_event ON /*_*/echo_target_page (etp_page, etp_event);
