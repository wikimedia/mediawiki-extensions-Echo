<?php

class EchoEmailFrequency {
	public const NEVER = -1; // Never send email notifications
	public const IMMEDIATELY = 0; // Send email notifications immediately as they come in
	public const DAILY_DIGEST = 1; // Send daily email digests
	public const WEEKLY_DIGEST = 7; // Send weekly email digests
}
