-- This file is automatically generated using maintenance/generateSchemaSql.php.
-- Source: sql/tables.json
-- Do not modify this file directly.
-- See https://www.mediawiki.org/wiki/Manual:Schema_changes
CREATE TABLE echo_event (
  event_id SERIAL NOT NULL,
  event_type TEXT NOT NULL,
  event_agent_id INT DEFAULT NULL,
  event_agent_ip TEXT DEFAULT NULL,
  event_extra TEXT DEFAULT NULL,
  event_page_id INT DEFAULT NULL,
  event_deleted SMALLINT DEFAULT 0 NOT NULL,
  PRIMARY KEY(event_id)
);

CREATE INDEX echo_event_type ON echo_event (event_type);

CREATE INDEX echo_event_page_id ON echo_event (event_page_id);


CREATE TABLE echo_notification (
  notification_event INT NOT NULL,
  notification_user INT NOT NULL,
  notification_timestamp TIMESTAMPTZ NOT NULL,
  notification_read_timestamp TIMESTAMPTZ DEFAULT NULL,
  notification_bundle_hash TEXT NOT NULL,
  PRIMARY KEY(
    notification_user, notification_event
  )
);

CREATE INDEX echo_user_timestamp ON echo_notification (
  notification_user, notification_timestamp
);

CREATE INDEX echo_notification_event ON echo_notification (notification_event);

CREATE INDEX echo_notification_user_read_timestamp ON echo_notification (
  notification_user, notification_read_timestamp
);


CREATE TABLE echo_email_batch (
  eeb_id SERIAL NOT NULL,
  eeb_user_id INT NOT NULL,
  eeb_event_priority SMALLINT DEFAULT 10 NOT NULL,
  eeb_event_id INT NOT NULL,
  eeb_event_hash TEXT NOT NULL,
  PRIMARY KEY(eeb_id)
);

CREATE UNIQUE INDEX echo_email_batch_user_event ON echo_email_batch (eeb_user_id, eeb_event_id);

CREATE INDEX echo_email_batch_user_hash_priority ON echo_email_batch (
  eeb_user_id, eeb_event_hash, eeb_event_priority
);


CREATE TABLE echo_target_page (
  etp_id SERIAL NOT NULL,
  etp_page INT DEFAULT 0 NOT NULL,
  etp_event INT DEFAULT 0 NOT NULL,
  PRIMARY KEY(etp_id)
);

CREATE INDEX echo_target_page_event ON echo_target_page (etp_event);

CREATE INDEX echo_target_page_page_event ON echo_target_page (etp_page, etp_event);


CREATE TABLE echo_push_provider (
  epp_id SMALLSERIAL NOT NULL,
  epp_name TEXT NOT NULL,
  PRIMARY KEY(epp_id)
);


CREATE TABLE echo_push_subscription (
  eps_id SERIAL NOT NULL,
  eps_user INT NOT NULL,
  eps_token TEXT NOT NULL,
  eps_token_sha256 CHAR(64) NOT NULL,
  eps_provider SMALLINT NOT NULL,
  eps_updated TIMESTAMPTZ NOT NULL,
  eps_data TEXT DEFAULT NULL,
  eps_topic SMALLINT DEFAULT NULL,
  PRIMARY KEY(eps_id)
);

CREATE UNIQUE INDEX eps_token_sha256 ON echo_push_subscription (eps_token_sha256);

CREATE INDEX eps_provider ON echo_push_subscription (eps_provider);

CREATE INDEX eps_topic ON echo_push_subscription (eps_topic);

CREATE INDEX eps_user ON echo_push_subscription (eps_user);

CREATE INDEX eps_token ON echo_push_subscription (eps_token);


CREATE TABLE echo_push_topic (
  ept_id SMALLSERIAL NOT NULL,
  ept_text TEXT NOT NULL,
  PRIMARY KEY(ept_id)
);
