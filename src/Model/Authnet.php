<?php

use Base\Authnet as BaseAuthnet;

use Dpluso\Payment\Model\ThrowErrorTrait;
use Dpluso\Payment\Model\MagicMethodTraits;

/**
 * Skeleton subclass for representing a row from the 'authnet' table.
 *
 *
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 */
class Authnet extends BaseAuthnet {
	use ThrowErrorTrait;
	use MagicMethodTraits;
}
