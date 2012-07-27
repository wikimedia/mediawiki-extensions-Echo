-- Database Schema for Echo notification system

CREATE TABLE /*_*/echo_subscription (
	sub_user int unsigned not null,
	sub_event_type varchar(64) binary not null,
	sub_page_namespace int unsigned null,
	sub_page_title varchar(255) binary null,
	sub_notify_type varchar(64) binary not null,
	sub_enabled tinyint(1) unsigned not null default 1
) /*$wgDBTableOptions*/;

CREATE UNIQUE INDEX /*i*/user_subscriptions ON /*_*/echo_subscription (sub_user,sub_event_type,sub_page_namespace,sub_page_title,sub_notify_type,sub_enabled);
CREATE INDEX /*i*/page_subscriptions ON /*_*/echo_subscription (sub_page_namespace,sub_page_title,sub_event_type,sub_user);

CREATE TABLE /*_*/echo_event (
	event_id int unsigned not null primary key auto_increment,
	event_timestamp binary(14) not null,
	event_type varchar(64) binary not null,
	event_variant varchar(64) binary null,
	event_agent_id int unsigned null, -- The user who triggered it, if any
	event_agent_ip varchar(255) binary null, -- IP address who triggered it, if any
	event_page_namespace int unsigned null,
	event_page_title varchar(255) binary null,
	event_extra BLOB NULL
) /*$wgDBTableOptions*/;

CREATE INDEX /*i*/type_page ON /*_*/echo_event (event_type,event_page_namespace,event_page_title,event_timestamp);

CREATE TABLE /*_*/echo_notification (
	notification_event int unsigned not null,
	notification_user int unsigned not null,
	notification_timestamp binary(14) not null,
	notification_read_timestamp binary(14) null
) /*$wgDBTableOptions*/;

CREATE INDEX /*i*/user_timestamp ON /*_*/echo_notification (notification_user,notification_timestamp);
CREATE UNIQUE INDEX /*i*/user_event ON /*_*/echo_notification (notification_user,notification_event);
