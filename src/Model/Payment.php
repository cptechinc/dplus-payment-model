<?php

use Base\Payment as BasePayment;

use Dpluso\Payment\Model\ThrowErrorTrait;
use Dpluso\Payment\Model\MagicMethodTraits;

/**
 * Skeleton subclass for representing a row from the 'Payment' table.
 *
 *
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 */
class Payment extends BasePayment {
	use ThrowErrorTrait;
	use MagicMethodTraits;

	const RECORDTYPE_RESPONSE = 'RES';
	const RECORDTYPE_REQUEST  = 'REQ';


	/**
	 * Transaction Type
	 * CREDIT   = CAPTURE | AUTHORIZE & CAPTURE
	 * DEBIT    = RETURN
	 * VOID     = CANCEL TRRANSACTION
	 * PREAUTH  = PREAUTHORIZE FOR AMOUNT
	 * CPREAUTH = CAPTURE PREAUTHORIZED 
	 * @var string
	 */
	protected $type;

	/**
	 * Column Aliases to lookup / get properties
	 * @var array
	 */
	const COLUMN_ALIASES = array(
		'ordn'              => 'ordernbr',
		'recordtype'        => 'rectype',
		'cardnumber'        => 'cardnbr',
		'track1'            => 'track_i',
		'track2'            => 'track_ii',
		'expiredate'        => 'expdate',
		'transaction_type'  => 'type',
		'transaction_id'    => 'trans_id',
		'authorizationcode' => 'authcode'
	);

	/**
	 * Returns if Payment Record is a Request
	 *
	 * @return boolean
	 */
	public function is_request() {
		return $this->rectype == self::RECORDTYPE_REQUEST;
	}

	/**
	 * Returns if Payment Record is a Response
	 *
	 * @return boolean
	 */
	public function is_response() {
		return $this->rectype == self::RECORDTYPE_RESPONSE;
	}
}
