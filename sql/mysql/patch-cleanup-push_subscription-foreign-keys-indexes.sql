-- Drop foreign keys from echo_push_subscription - T306473
ALTER TABLE /*_*/echo_push_subscription DROP FOREIGN KEY IF EXISTS /*_*/echo_push_subscription_ibfk_1;
ALTER TABLE /*_*/echo_push_subscription DROP FOREIGN KEY IF EXISTS /*_*/echo_push_subscription_ibfk_2;

-- Rename index to match table prefix
DROP INDEX IF EXISTS /*i*/echo_push_subscription_user_id ON /*_*/echo_push_subscription;
CREATE INDEX IF NOT EXISTS /*i*/eps_user ON /*_*/echo_push_subscription (eps_user);

DROP INDEX IF EXISTS /*i*/echo_push_subscription_token ON /*_*/echo_push_subscription;
CREATE INDEX IF NOT EXISTS /*i*/eps_token ON /*_*/echo_push_subscription (eps_token(10));
