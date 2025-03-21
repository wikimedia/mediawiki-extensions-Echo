-- This file is automatically generated using maintenance/generateSchemaSql.php.
-- Source: sql/tables.json
-- Do not modify this file directly.
-- See https://www.mediawiki.org/wiki/Manual:Schema_changes
CREATE TABLE /*_*/echo_event (
  event_id INT UNSIGNED AUTO_INCREMENT NOT NULL,
  event_type VARBINARY(64) NOT NULL,
  event_agent_id INT UNSIGNED DEFAULT NULL,
  event_agent_ip VARBINARY(39) DEFAULT NULL,
  event_extra BLOB DEFAULT NULL,
  event_page_id INT UNSIGNED DEFAULT NULL,
  event_deleted TINYINT UNSIGNED DEFAULT 0 NOT NULL,
  INDEX echo_event_type (event_type),
  INDEX echo_event_page_id (event_page_id),
  PRIMARY KEY(event_id)
) /*$wgDBTableOptions*/;


CREATE TABLE /*_*/echo_notification (
  notification_event INT UNSIGNED NOT NULL,
  notification_user INT UNSIGNED NOT NULL,
  notification_timestamp BINARY(14) NOT NULL,
  notification_read_timestamp BINARY(14) DEFAULT NULL,
  notification_bundle_hash VARBINARY(32) NOT NULL,
  INDEX echo_user_timestamp (
    notification_user, notification_timestamp
  ),
  INDEX echo_notification_event (notification_event),
  INDEX echo_notification_user_read_timestamp (
    notification_user, notification_read_timestamp
  ),
  PRIMARY KEY(
    notification_user, notification_event
  )
) /*$wgDBTableOptions*/;


CREATE TABLE /*_*/echo_email_batch (
  eeb_id INT UNSIGNED AUTO_INCREMENT NOT NULL,
  eeb_user_id INT UNSIGNED NOT NULL,
  eeb_event_priority TINYINT UNSIGNED DEFAULT 10 NOT NULL,
  eeb_event_id INT UNSIGNED NOT NULL,
  eeb_event_hash VARBINARY(32) NOT NULL,
  UNIQUE INDEX echo_email_batch_user_event (eeb_user_id, eeb_event_id),
  INDEX echo_email_batch_user_hash_priority (
    eeb_user_id, eeb_event_hash, eeb_event_priority
  ),
  PRIMARY KEY(eeb_id)
) /*$wgDBTableOptions*/;


CREATE TABLE /*_*/echo_target_page (
  etp_id INT UNSIGNED AUTO_INCREMENT NOT NULL,
  etp_page INT UNSIGNED DEFAULT 0 NOT NULL,
  etp_event INT UNSIGNED DEFAULT 0 NOT NULL,
  INDEX echo_target_page_event (etp_event),
  INDEX echo_target_page_page_event (etp_page, etp_event),
  PRIMARY KEY(etp_id)
) /*$wgDBTableOptions*/;


CREATE TABLE /*_*/echo_push_provider (
  epp_id TINYINT UNSIGNED AUTO_INCREMENT NOT NULL,
  epp_name TINYBLOB NOT NULL,
  PRIMARY KEY(epp_id)
) /*$wgDBTableOptions*/;


CREATE TABLE /*_*/echo_push_subscription (
  eps_id INT UNSIGNED AUTO_INCREMENT NOT NULL,
  eps_user INT UNSIGNED NOT NULL,
  eps_token BLOB NOT NULL,
  eps_token_sha256 CHAR(64) NOT NULL,
  eps_provider TINYINT UNSIGNED NOT NULL,
  eps_updated TIMESTAMP NOT NULL,
  eps_data BLOB DEFAULT NULL,
  eps_topic TINYINT UNSIGNED DEFAULT NULL,
  UNIQUE INDEX eps_token_sha256 (eps_token_sha256),
  INDEX eps_provider (eps_provider),
  INDEX eps_topic (eps_topic),
  INDEX eps_user (eps_user),
  INDEX eps_token (
    eps_token(10)
  ),
  PRIMARY KEY(eps_id)
) /*$wgDBTableOptions*/;


CREATE TABLE /*_*/echo_push_topic (
  ept_id TINYINT UNSIGNED AUTO_INCREMENT NOT NULL,
  ept_text TINYBLOB NOT NULL,
  PRIMARY KEY(ept_id)
) /*$wgDBTableOptions*/;
