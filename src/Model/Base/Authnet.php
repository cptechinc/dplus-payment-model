<?php

namespace Base;

use \AuthnetQuery as ChildAuthnetQuery;
use \Exception;
use \PDO;
use Map\AuthnetTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveRecord\ActiveRecordInterface;
use Propel\Runtime\Collection\Collection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\BadMethodCallException;
use Propel\Runtime\Exception\LogicException;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Map\TableMap;
use Propel\Runtime\Parser\AbstractParser;

/**
 * Base class that represents a row from the 'authnet' table.
 *
 *
 *
 * @package    propel.generator..Base
 */
abstract class Authnet implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\Map\\AuthnetTableMap';


    /**
     * attribute to determine if this object has previously been saved.
     * @var boolean
     */
    protected $new = true;

    /**
     * attribute to determine whether this object has been deleted.
     * @var boolean
     */
    protected $deleted = false;

    /**
     * The columns that have been modified in current object.
     * Tracking modified columns allows us to only update modified columns.
     * @var array
     */
    protected $modifiedColumns = array();

    /**
     * The (virtual) columns that are added at runtime
     * The formatters can add supplementary columns based on a resultset
     * @var array
     */
    protected $virtualColumns = array();

    /**
     * The value for the ordernbr field.
     *
     * Note: this column has a database default value of: ' '
     * @var        string
     */
    protected $ordernbr;

    /**
     * The value for the rectype field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $rectype;

    /**
     * The value for the date field.
     *
     * @var        int
     */
    protected $date;

    /**
     * The value for the time field.
     *
     * @var        int
     */
    protected $time;

    /**
     * The value for the cardnbr field.
     *
     * @var        string
     */
    protected $cardnbr;

    /**
     * The value for the track_ii field.
     *
     * @var        string
     */
    protected $track_ii;

    /**
     * The value for the expdate field.
     *
     * @var        string
     */
    protected $expdate;

    /**
     * The value for the cvv field.
     *
     * @var        string
     */
    protected $cvv;

    /**
     * The value for the type field.
     *
     * @var        string
     */
    protected $type;

    /**
     * The value for the amount field.
     *
     * @var        string
     */
    protected $amount;

    /**
     * The value for the card_name field.
     *
     * @var        string
     */
    protected $card_name;

    /**
     * The value for the street field.
     *
     * @var        string
     */
    protected $street;

    /**
     * The value for the zipcode field.
     *
     * @var        string
     */
    protected $zipcode;

    /**
     * The value for the custid field.
     *
     * @var        string
     */
    protected $custid;

    /**
     * The value for the custpo field.
     *
     * @var        string
     */
    protected $custpo;

    /**
     * The value for the trans_id field.
     *
     * @var        string
     */
    protected $trans_id;

    /**
     * The value for the authcode field.
     *
     * @var        string
     */
    protected $authcode;

    /**
     * The value for the avs_msg field.
     *
     * @var        string
     */
    protected $avs_msg;

    /**
     * The value for the error_code field.
     *
     * @var        string
     */
    protected $error_code;

    /**
     * The value for the error_msg field.
     *
     * @var        string
     */
    protected $error_msg;

    /**
     * The value for the result field.
     *
     * @var        string
     */
    protected $result;

    /**
     * The value for the track_i field.
     *
     * @var        string
     */
    protected $track_i;

    /**
     * The value for the dummy field.
     *
     * @var        string
     */
    protected $dummy;

    /**
     * Flag to prevent endless save loop, if this object is referenced
     * by another object which falls in this transaction.
     *
     * @var boolean
     */
    protected $alreadyInSave = false;

    /**
     * Applies default values to this object.
     * This method should be called from the object's constructor (or
     * equivalent initialization method).
     * @see __construct()
     */
    public function applyDefaultValues()
    {
        $this->ordernbr = ' ';
        $this->rectype = '';
    }

    /**
     * Initializes internal state of Base\Authnet object.
     * @see applyDefaults()
     */
    public function __construct()
    {
        $this->applyDefaultValues();
    }

    /**
     * Returns whether the object has been modified.
     *
     * @return boolean True if the object has been modified.
     */
    public function isModified()
    {
        return !!$this->modifiedColumns;
    }

    /**
     * Has specified column been modified?
     *
     * @param  string  $col column fully qualified name (TableMap::TYPE_COLNAME), e.g. Book::AUTHOR_ID
     * @return boolean True if $col has been modified.
     */
    public function isColumnModified($col)
    {
        return $this->modifiedColumns && isset($this->modifiedColumns[$col]);
    }

    /**
     * Get the columns that have been modified in this object.
     * @return array A unique list of the modified column names for this object.
     */
    public function getModifiedColumns()
    {
        return $this->modifiedColumns ? array_keys($this->modifiedColumns) : [];
    }

    /**
     * Returns whether the object has ever been saved.  This will
     * be false, if the object was retrieved from storage or was created
     * and then saved.
     *
     * @return boolean true, if the object has never been persisted.
     */
    public function isNew()
    {
        return $this->new;
    }

    /**
     * Setter for the isNew attribute.  This method will be called
     * by Propel-generated children and objects.
     *
     * @param boolean $b the state of the object.
     */
    public function setNew($b)
    {
        $this->new = (boolean) $b;
    }

    /**
     * Whether this object has been deleted.
     * @return boolean The deleted state of this object.
     */
    public function isDeleted()
    {
        return $this->deleted;
    }

    /**
     * Specify whether this object has been deleted.
     * @param  boolean $b The deleted state of this object.
     * @return void
     */
    public function setDeleted($b)
    {
        $this->deleted = (boolean) $b;
    }

    /**
     * Sets the modified state for the object to be false.
     * @param  string $col If supplied, only the specified column is reset.
     * @return void
     */
    public function resetModified($col = null)
    {
        if (null !== $col) {
            if (isset($this->modifiedColumns[$col])) {
                unset($this->modifiedColumns[$col]);
            }
        } else {
            $this->modifiedColumns = array();
        }
    }

    /**
     * Compares this with another <code>Authnet</code> instance.  If
     * <code>obj</code> is an instance of <code>Authnet</code>, delegates to
     * <code>equals(Authnet)</code>.  Otherwise, returns <code>false</code>.
     *
     * @param  mixed   $obj The object to compare to.
     * @return boolean Whether equal to the object specified.
     */
    public function equals($obj)
    {
        if (!$obj instanceof static) {
            return false;
        }

        if ($this === $obj) {
            return true;
        }

        if (null === $this->getPrimaryKey() || null === $obj->getPrimaryKey()) {
            return false;
        }

        return $this->getPrimaryKey() === $obj->getPrimaryKey();
    }

    /**
     * Get the associative array of the virtual columns in this object
     *
     * @return array
     */
    public function getVirtualColumns()
    {
        return $this->virtualColumns;
    }

    /**
     * Checks the existence of a virtual column in this object
     *
     * @param  string  $name The virtual column name
     * @return boolean
     */
    public function hasVirtualColumn($name)
    {
        return array_key_exists($name, $this->virtualColumns);
    }

    /**
     * Get the value of a virtual column in this object
     *
     * @param  string $name The virtual column name
     * @return mixed
     *
     * @throws PropelException
     */
    public function getVirtualColumn($name)
    {
        if (!$this->hasVirtualColumn($name)) {
            throw new PropelException(sprintf('Cannot get value of inexistent virtual column %s.', $name));
        }

        return $this->virtualColumns[$name];
    }

    /**
     * Set the value of a virtual column in this object
     *
     * @param string $name  The virtual column name
     * @param mixed  $value The value to give to the virtual column
     *
     * @return $this|Authnet The current object, for fluid interface
     */
    public function setVirtualColumn($name, $value)
    {
        $this->virtualColumns[$name] = $value;

        return $this;
    }

    /**
     * Logs a message using Propel::log().
     *
     * @param  string  $msg
     * @param  int     $priority One of the Propel::LOG_* logging levels
     * @return boolean
     */
    protected function log($msg, $priority = Propel::LOG_INFO)
    {
        return Propel::log(get_class($this) . ': ' . $msg, $priority);
    }

    /**
     * Export the current object properties to a string, using a given parser format
     * <code>
     * $book = BookQuery::create()->findPk(9012);
     * echo $book->exportTo('JSON');
     *  => {"Id":9012,"Title":"Don Juan","ISBN":"0140422161","Price":12.99,"PublisherId":1234,"AuthorId":5678}');
     * </code>
     *
     * @param  mixed   $parser                 A AbstractParser instance, or a format name ('XML', 'YAML', 'JSON', 'CSV')
     * @param  boolean $includeLazyLoadColumns (optional) Whether to include lazy load(ed) columns. Defaults to TRUE.
     * @return string  The exported data
     */
    public function exportTo($parser, $includeLazyLoadColumns = true)
    {
        if (!$parser instanceof AbstractParser) {
            $parser = AbstractParser::getParser($parser);
        }

        return $parser->fromArray($this->toArray(TableMap::TYPE_PHPNAME, $includeLazyLoadColumns, array(), true));
    }

    /**
     * Clean up internal collections prior to serializing
     * Avoids recursive loops that turn into segmentation faults when serializing
     */
    public function __sleep()
    {
        $this->clearAllReferences();

        $cls = new \ReflectionClass($this);
        $propertyNames = [];
        $serializableProperties = array_diff($cls->getProperties(), $cls->getProperties(\ReflectionProperty::IS_STATIC));

        foreach($serializableProperties as $property) {
            $propertyNames[] = $property->getName();
        }

        return $propertyNames;
    }

    /**
     * Get the [ordernbr] column value.
     *
     * @return string
     */
    public function getOrdernbr()
    {
        return $this->ordernbr;
    }

    /**
     * Get the [rectype] column value.
     *
     * @return string
     */
    public function getRectype()
    {
        return $this->rectype;
    }

    /**
     * Get the [date] column value.
     *
     * @return int
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Get the [time] column value.
     *
     * @return int
     */
    public function getTime()
    {
        return $this->time;
    }

    /**
     * Get the [cardnbr] column value.
     *
     * @return string
     */
    public function getCardnbr()
    {
        return $this->cardnbr;
    }

    /**
     * Get the [track_ii] column value.
     *
     * @return string
     */
    public function getTrackIi()
    {
        return $this->track_ii;
    }

    /**
     * Get the [expdate] column value.
     *
     * @return string
     */
    public function getExpdate()
    {
        return $this->expdate;
    }

    /**
     * Get the [cvv] column value.
     *
     * @return string
     */
    public function getCvv()
    {
        return $this->cvv;
    }

    /**
     * Get the [type] column value.
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Get the [amount] column value.
     *
     * @return string
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Get the [card_name] column value.
     *
     * @return string
     */
    public function getCardName()
    {
        return $this->card_name;
    }

    /**
     * Get the [street] column value.
     *
     * @return string
     */
    public function getStreet()
    {
        return $this->street;
    }

    /**
     * Get the [zipcode] column value.
     *
     * @return string
     */
    public function getZipcode()
    {
        return $this->zipcode;
    }

    /**
     * Get the [custid] column value.
     *
     * @return string
     */
    public function getCustid()
    {
        return $this->custid;
    }

    /**
     * Get the [custpo] column value.
     *
     * @return string
     */
    public function getCustpo()
    {
        return $this->custpo;
    }

    /**
     * Get the [trans_id] column value.
     *
     * @return string
     */
    public function getTransId()
    {
        return $this->trans_id;
    }

    /**
     * Get the [authcode] column value.
     *
     * @return string
     */
    public function getAuthcode()
    {
        return $this->authcode;
    }

    /**
     * Get the [avs_msg] column value.
     *
     * @return string
     */
    public function getAvsMsg()
    {
        return $this->avs_msg;
    }

    /**
     * Get the [error_code] column value.
     *
     * @return string
     */
    public function getErrorCode()
    {
        return $this->error_code;
    }

    /**
     * Get the [error_msg] column value.
     *
     * @return string
     */
    public function getErrorMsg()
    {
        return $this->error_msg;
    }

    /**
     * Get the [result] column value.
     *
     * @return string
     */
    public function getResult()
    {
        return $this->result;
    }

    /**
     * Get the [track_i] column value.
     *
     * @return string
     */
    public function getTrackI()
    {
        return $this->track_i;
    }

    /**
     * Get the [dummy] column value.
     *
     * @return string
     */
    public function getDummy()
    {
        return $this->dummy;
    }

    /**
     * Set the value of [ordernbr] column.
     *
     * @param string $v new value
     * @return $this|\Authnet The current object (for fluent API support)
     */
    public function setOrdernbr($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->ordernbr !== $v) {
            $this->ordernbr = $v;
            $this->modifiedColumns[AuthnetTableMap::COL_ORDERNBR] = true;
        }

        return $this;
    } // setOrdernbr()

    /**
     * Set the value of [rectype] column.
     *
     * @param string $v new value
     * @return $this|\Authnet The current object (for fluent API support)
     */
    public function setRectype($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->rectype !== $v) {
            $this->rectype = $v;
            $this->modifiedColumns[AuthnetTableMap::COL_RECTYPE] = true;
        }

        return $this;
    } // setRectype()

    /**
     * Set the value of [date] column.
     *
     * @param int $v new value
     * @return $this|\Authnet The current object (for fluent API support)
     */
    public function setDate($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->date !== $v) {
            $this->date = $v;
            $this->modifiedColumns[AuthnetTableMap::COL_DATE] = true;
        }

        return $this;
    } // setDate()

    /**
     * Set the value of [time] column.
     *
     * @param int $v new value
     * @return $this|\Authnet The current object (for fluent API support)
     */
    public function setTime($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->time !== $v) {
            $this->time = $v;
            $this->modifiedColumns[AuthnetTableMap::COL_TIME] = true;
        }

        return $this;
    } // setTime()

    /**
     * Set the value of [cardnbr] column.
     *
     * @param string $v new value
     * @return $this|\Authnet The current object (for fluent API support)
     */
    public function setCardnbr($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->cardnbr !== $v) {
            $this->cardnbr = $v;
            $this->modifiedColumns[AuthnetTableMap::COL_CARDNBR] = true;
        }

        return $this;
    } // setCardnbr()

    /**
     * Set the value of [track_ii] column.
     *
     * @param string $v new value
     * @return $this|\Authnet The current object (for fluent API support)
     */
    public function setTrackIi($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->track_ii !== $v) {
            $this->track_ii = $v;
            $this->modifiedColumns[AuthnetTableMap::COL_TRACK_II] = true;
        }

        return $this;
    } // setTrackIi()

    /**
     * Set the value of [expdate] column.
     *
     * @param string $v new value
     * @return $this|\Authnet The current object (for fluent API support)
     */
    public function setExpdate($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->expdate !== $v) {
            $this->expdate = $v;
            $this->modifiedColumns[AuthnetTableMap::COL_EXPDATE] = true;
        }

        return $this;
    } // setExpdate()

    /**
     * Set the value of [cvv] column.
     *
     * @param string $v new value
     * @return $this|\Authnet The current object (for fluent API support)
     */
    public function setCvv($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->cvv !== $v) {
            $this->cvv = $v;
            $this->modifiedColumns[AuthnetTableMap::COL_CVV] = true;
        }

        return $this;
    } // setCvv()

    /**
     * Set the value of [type] column.
     *
     * @param string $v new value
     * @return $this|\Authnet The current object (for fluent API support)
     */
    public function setType($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->type !== $v) {
            $this->type = $v;
            $this->modifiedColumns[AuthnetTableMap::COL_TYPE] = true;
        }

        return $this;
    } // setType()

    /**
     * Set the value of [amount] column.
     *
     * @param string $v new value
     * @return $this|\Authnet The current object (for fluent API support)
     */
    public function setAmount($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->amount !== $v) {
            $this->amount = $v;
            $this->modifiedColumns[AuthnetTableMap::COL_AMOUNT] = true;
        }

        return $this;
    } // setAmount()

    /**
     * Set the value of [card_name] column.
     *
     * @param string $v new value
     * @return $this|\Authnet The current object (for fluent API support)
     */
    public function setCardName($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->card_name !== $v) {
            $this->card_name = $v;
            $this->modifiedColumns[AuthnetTableMap::COL_CARD_NAME] = true;
        }

        return $this;
    } // setCardName()

    /**
     * Set the value of [street] column.
     *
     * @param string $v new value
     * @return $this|\Authnet The current object (for fluent API support)
     */
    public function setStreet($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->street !== $v) {
            $this->street = $v;
            $this->modifiedColumns[AuthnetTableMap::COL_STREET] = true;
        }

        return $this;
    } // setStreet()

    /**
     * Set the value of [zipcode] column.
     *
     * @param string $v new value
     * @return $this|\Authnet The current object (for fluent API support)
     */
    public function setZipcode($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->zipcode !== $v) {
            $this->zipcode = $v;
            $this->modifiedColumns[AuthnetTableMap::COL_ZIPCODE] = true;
        }

        return $this;
    } // setZipcode()

    /**
     * Set the value of [custid] column.
     *
     * @param string $v new value
     * @return $this|\Authnet The current object (for fluent API support)
     */
    public function setCustid($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->custid !== $v) {
            $this->custid = $v;
            $this->modifiedColumns[AuthnetTableMap::COL_CUSTID] = true;
        }

        return $this;
    } // setCustid()

    /**
     * Set the value of [custpo] column.
     *
     * @param string $v new value
     * @return $this|\Authnet The current object (for fluent API support)
     */
    public function setCustpo($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->custpo !== $v) {
            $this->custpo = $v;
            $this->modifiedColumns[AuthnetTableMap::COL_CUSTPO] = true;
        }

        return $this;
    } // setCustpo()

    /**
     * Set the value of [trans_id] column.
     *
     * @param string $v new value
     * @return $this|\Authnet The current object (for fluent API support)
     */
    public function setTransId($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->trans_id !== $v) {
            $this->trans_id = $v;
            $this->modifiedColumns[AuthnetTableMap::COL_TRANS_ID] = true;
        }

        return $this;
    } // setTransId()

    /**
     * Set the value of [authcode] column.
     *
     * @param string $v new value
     * @return $this|\Authnet The current object (for fluent API support)
     */
    public function setAuthcode($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->authcode !== $v) {
            $this->authcode = $v;
            $this->modifiedColumns[AuthnetTableMap::COL_AUTHCODE] = true;
        }

        return $this;
    } // setAuthcode()

    /**
     * Set the value of [avs_msg] column.
     *
     * @param string $v new value
     * @return $this|\Authnet The current object (for fluent API support)
     */
    public function setAvsMsg($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->avs_msg !== $v) {
            $this->avs_msg = $v;
            $this->modifiedColumns[AuthnetTableMap::COL_AVS_MSG] = true;
        }

        return $this;
    } // setAvsMsg()

    /**
     * Set the value of [error_code] column.
     *
     * @param string $v new value
     * @return $this|\Authnet The current object (for fluent API support)
     */
    public function setErrorCode($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->error_code !== $v) {
            $this->error_code = $v;
            $this->modifiedColumns[AuthnetTableMap::COL_ERROR_CODE] = true;
        }

        return $this;
    } // setErrorCode()

    /**
     * Set the value of [error_msg] column.
     *
     * @param string $v new value
     * @return $this|\Authnet The current object (for fluent API support)
     */
    public function setErrorMsg($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->error_msg !== $v) {
            $this->error_msg = $v;
            $this->modifiedColumns[AuthnetTableMap::COL_ERROR_MSG] = true;
        }

        return $this;
    } // setErrorMsg()

    /**
     * Set the value of [result] column.
     *
     * @param string $v new value
     * @return $this|\Authnet The current object (for fluent API support)
     */
    public function setResult($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->result !== $v) {
            $this->result = $v;
            $this->modifiedColumns[AuthnetTableMap::COL_RESULT] = true;
        }

        return $this;
    } // setResult()

    /**
     * Set the value of [track_i] column.
     *
     * @param string $v new value
     * @return $this|\Authnet The current object (for fluent API support)
     */
    public function setTrackI($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->track_i !== $v) {
            $this->track_i = $v;
            $this->modifiedColumns[AuthnetTableMap::COL_TRACK_I] = true;
        }

        return $this;
    } // setTrackI()

    /**
     * Set the value of [dummy] column.
     *
     * @param string $v new value
     * @return $this|\Authnet The current object (for fluent API support)
     */
    public function setDummy($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->dummy !== $v) {
            $this->dummy = $v;
            $this->modifiedColumns[AuthnetTableMap::COL_DUMMY] = true;
        }

        return $this;
    } // setDummy()

    /**
     * Indicates whether the columns in this object are only set to default values.
     *
     * This method can be used in conjunction with isModified() to indicate whether an object is both
     * modified _and_ has some values set which are non-default.
     *
     * @return boolean Whether the columns in this object are only been set with default values.
     */
    public function hasOnlyDefaultValues()
    {
            if ($this->ordernbr !== ' ') {
                return false;
            }

            if ($this->rectype !== '') {
                return false;
            }

        // otherwise, everything was equal, so return TRUE
        return true;
    } // hasOnlyDefaultValues()

    /**
     * Hydrates (populates) the object variables with values from the database resultset.
     *
     * An offset (0-based "start column") is specified so that objects can be hydrated
     * with a subset of the columns in the resultset rows.  This is needed, for example,
     * for results of JOIN queries where the resultset row includes columns from two or
     * more tables.
     *
     * @param array   $row       The row returned by DataFetcher->fetch().
     * @param int     $startcol  0-based offset column which indicates which restultset column to start with.
     * @param boolean $rehydrate Whether this object is being re-hydrated from the database.
     * @param string  $indexType The index type of $row. Mostly DataFetcher->getIndexType().
                                  One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                            TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *
     * @return int             next starting column
     * @throws PropelException - Any caught Exception will be rewrapped as a PropelException.
     */
    public function hydrate($row, $startcol = 0, $rehydrate = false, $indexType = TableMap::TYPE_NUM)
    {
        try {

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : AuthnetTableMap::translateFieldName('Ordernbr', TableMap::TYPE_PHPNAME, $indexType)];
            $this->ordernbr = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : AuthnetTableMap::translateFieldName('Rectype', TableMap::TYPE_PHPNAME, $indexType)];
            $this->rectype = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : AuthnetTableMap::translateFieldName('Date', TableMap::TYPE_PHPNAME, $indexType)];
            $this->date = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : AuthnetTableMap::translateFieldName('Time', TableMap::TYPE_PHPNAME, $indexType)];
            $this->time = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : AuthnetTableMap::translateFieldName('Cardnbr', TableMap::TYPE_PHPNAME, $indexType)];
            $this->cardnbr = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 5 + $startcol : AuthnetTableMap::translateFieldName('TrackIi', TableMap::TYPE_PHPNAME, $indexType)];
            $this->track_ii = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 6 + $startcol : AuthnetTableMap::translateFieldName('Expdate', TableMap::TYPE_PHPNAME, $indexType)];
            $this->expdate = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 7 + $startcol : AuthnetTableMap::translateFieldName('Cvv', TableMap::TYPE_PHPNAME, $indexType)];
            $this->cvv = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 8 + $startcol : AuthnetTableMap::translateFieldName('Type', TableMap::TYPE_PHPNAME, $indexType)];
            $this->type = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 9 + $startcol : AuthnetTableMap::translateFieldName('Amount', TableMap::TYPE_PHPNAME, $indexType)];
            $this->amount = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 10 + $startcol : AuthnetTableMap::translateFieldName('CardName', TableMap::TYPE_PHPNAME, $indexType)];
            $this->card_name = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 11 + $startcol : AuthnetTableMap::translateFieldName('Street', TableMap::TYPE_PHPNAME, $indexType)];
            $this->street = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 12 + $startcol : AuthnetTableMap::translateFieldName('Zipcode', TableMap::TYPE_PHPNAME, $indexType)];
            $this->zipcode = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 13 + $startcol : AuthnetTableMap::translateFieldName('Custid', TableMap::TYPE_PHPNAME, $indexType)];
            $this->custid = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 14 + $startcol : AuthnetTableMap::translateFieldName('Custpo', TableMap::TYPE_PHPNAME, $indexType)];
            $this->custpo = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 15 + $startcol : AuthnetTableMap::translateFieldName('TransId', TableMap::TYPE_PHPNAME, $indexType)];
            $this->trans_id = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 16 + $startcol : AuthnetTableMap::translateFieldName('Authcode', TableMap::TYPE_PHPNAME, $indexType)];
            $this->authcode = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 17 + $startcol : AuthnetTableMap::translateFieldName('AvsMsg', TableMap::TYPE_PHPNAME, $indexType)];
            $this->avs_msg = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 18 + $startcol : AuthnetTableMap::translateFieldName('ErrorCode', TableMap::TYPE_PHPNAME, $indexType)];
            $this->error_code = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 19 + $startcol : AuthnetTableMap::translateFieldName('ErrorMsg', TableMap::TYPE_PHPNAME, $indexType)];
            $this->error_msg = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 20 + $startcol : AuthnetTableMap::translateFieldName('Result', TableMap::TYPE_PHPNAME, $indexType)];
            $this->result = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 21 + $startcol : AuthnetTableMap::translateFieldName('TrackI', TableMap::TYPE_PHPNAME, $indexType)];
            $this->track_i = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 22 + $startcol : AuthnetTableMap::translateFieldName('Dummy', TableMap::TYPE_PHPNAME, $indexType)];
            $this->dummy = (null !== $col) ? (string) $col : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 23; // 23 = AuthnetTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\Authnet'), 0, $e);
        }
    }

    /**
     * Checks and repairs the internal consistency of the object.
     *
     * This method is executed after an already-instantiated object is re-hydrated
     * from the database.  It exists to check any foreign keys to make sure that
     * the objects related to the current object are correct based on foreign key.
     *
     * You can override this method in the stub class, but you should always invoke
     * the base method from the overridden method (i.e. parent::ensureConsistency()),
     * in case your model changes.
     *
     * @throws PropelException
     */
    public function ensureConsistency()
    {
    } // ensureConsistency

    /**
     * Reloads this object from datastore based on primary key and (optionally) resets all associated objects.
     *
     * This will only work if the object has been saved and has a valid primary key set.
     *
     * @param      boolean $deep (optional) Whether to also de-associated any related objects.
     * @param      ConnectionInterface $con (optional) The ConnectionInterface connection to use.
     * @return void
     * @throws PropelException - if this object is deleted, unsaved or doesn't have pk match in db
     */
    public function reload($deep = false, ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("Cannot reload a deleted object.");
        }

        if ($this->isNew()) {
            throw new PropelException("Cannot reload an unsaved object.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(AuthnetTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildAuthnetQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
        $row = $dataFetcher->fetch();
        $dataFetcher->close();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true, $dataFetcher->getIndexType()); // rehydrate

        if ($deep) {  // also de-associate any related objects?

        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param      ConnectionInterface $con
     * @return void
     * @throws PropelException
     * @see Authnet::setDeleted()
     * @see Authnet::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(AuthnetTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildAuthnetQuery::create()
                ->filterByPrimaryKey($this->getPrimaryKey());
            $ret = $this->preDelete($con);
            if ($ret) {
                $deleteQuery->delete($con);
                $this->postDelete($con);
                $this->setDeleted(true);
            }
        });
    }

    /**
     * Persists this object to the database.
     *
     * If the object is new, it inserts it; otherwise an update is performed.
     * All modified related objects will also be persisted in the doSave()
     * method.  This method wraps all precipitate database operations in a
     * single transaction.
     *
     * @param      ConnectionInterface $con
     * @return int             The number of rows affected by this insert/update and any referring fk objects' save() operations.
     * @throws PropelException
     * @see doSave()
     */
    public function save(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("You cannot save an object that has been deleted.");
        }

        if ($this->alreadyInSave) {
            return 0;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(AuthnetTableMap::DATABASE_NAME);
        }

        return $con->transaction(function () use ($con) {
            $ret = $this->preSave($con);
            $isInsert = $this->isNew();
            if ($isInsert) {
                $ret = $ret && $this->preInsert($con);
            } else {
                $ret = $ret && $this->preUpdate($con);
            }
            if ($ret) {
                $affectedRows = $this->doSave($con);
                if ($isInsert) {
                    $this->postInsert($con);
                } else {
                    $this->postUpdate($con);
                }
                $this->postSave($con);
                AuthnetTableMap::addInstanceToPool($this);
            } else {
                $affectedRows = 0;
            }

            return $affectedRows;
        });
    }

    /**
     * Performs the work of inserting or updating the row in the database.
     *
     * If the object is new, it inserts it; otherwise an update is performed.
     * All related objects are also updated in this method.
     *
     * @param      ConnectionInterface $con
     * @return int             The number of rows affected by this insert/update and any referring fk objects' save() operations.
     * @throws PropelException
     * @see save()
     */
    protected function doSave(ConnectionInterface $con)
    {
        $affectedRows = 0; // initialize var to track total num of affected rows
        if (!$this->alreadyInSave) {
            $this->alreadyInSave = true;

            if ($this->isNew() || $this->isModified()) {
                // persist changes
                if ($this->isNew()) {
                    $this->doInsert($con);
                    $affectedRows += 1;
                } else {
                    $affectedRows += $this->doUpdate($con);
                }
                $this->resetModified();
            }

            $this->alreadyInSave = false;

        }

        return $affectedRows;
    } // doSave()

    /**
     * Insert the row in the database.
     *
     * @param      ConnectionInterface $con
     *
     * @throws PropelException
     * @see doSave()
     */
    protected function doInsert(ConnectionInterface $con)
    {
        $modifiedColumns = array();
        $index = 0;


         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(AuthnetTableMap::COL_ORDERNBR)) {
            $modifiedColumns[':p' . $index++]  = 'ordernbr';
        }
        if ($this->isColumnModified(AuthnetTableMap::COL_RECTYPE)) {
            $modifiedColumns[':p' . $index++]  = 'rectype';
        }
        if ($this->isColumnModified(AuthnetTableMap::COL_DATE)) {
            $modifiedColumns[':p' . $index++]  = 'date';
        }
        if ($this->isColumnModified(AuthnetTableMap::COL_TIME)) {
            $modifiedColumns[':p' . $index++]  = 'time';
        }
        if ($this->isColumnModified(AuthnetTableMap::COL_CARDNBR)) {
            $modifiedColumns[':p' . $index++]  = 'cardnbr';
        }
        if ($this->isColumnModified(AuthnetTableMap::COL_TRACK_II)) {
            $modifiedColumns[':p' . $index++]  = 'track_ii';
        }
        if ($this->isColumnModified(AuthnetTableMap::COL_EXPDATE)) {
            $modifiedColumns[':p' . $index++]  = 'expdate';
        }
        if ($this->isColumnModified(AuthnetTableMap::COL_CVV)) {
            $modifiedColumns[':p' . $index++]  = 'cvv';
        }
        if ($this->isColumnModified(AuthnetTableMap::COL_TYPE)) {
            $modifiedColumns[':p' . $index++]  = 'type';
        }
        if ($this->isColumnModified(AuthnetTableMap::COL_AMOUNT)) {
            $modifiedColumns[':p' . $index++]  = 'amount';
        }
        if ($this->isColumnModified(AuthnetTableMap::COL_CARD_NAME)) {
            $modifiedColumns[':p' . $index++]  = 'card_name';
        }
        if ($this->isColumnModified(AuthnetTableMap::COL_STREET)) {
            $modifiedColumns[':p' . $index++]  = 'street';
        }
        if ($this->isColumnModified(AuthnetTableMap::COL_ZIPCODE)) {
            $modifiedColumns[':p' . $index++]  = 'zipcode';
        }
        if ($this->isColumnModified(AuthnetTableMap::COL_CUSTID)) {
            $modifiedColumns[':p' . $index++]  = 'custid';
        }
        if ($this->isColumnModified(AuthnetTableMap::COL_CUSTPO)) {
            $modifiedColumns[':p' . $index++]  = 'custpo';
        }
        if ($this->isColumnModified(AuthnetTableMap::COL_TRANS_ID)) {
            $modifiedColumns[':p' . $index++]  = 'trans_id';
        }
        if ($this->isColumnModified(AuthnetTableMap::COL_AUTHCODE)) {
            $modifiedColumns[':p' . $index++]  = 'authcode';
        }
        if ($this->isColumnModified(AuthnetTableMap::COL_AVS_MSG)) {
            $modifiedColumns[':p' . $index++]  = 'avs_msg';
        }
        if ($this->isColumnModified(AuthnetTableMap::COL_ERROR_CODE)) {
            $modifiedColumns[':p' . $index++]  = 'error_code';
        }
        if ($this->isColumnModified(AuthnetTableMap::COL_ERROR_MSG)) {
            $modifiedColumns[':p' . $index++]  = 'error_msg';
        }
        if ($this->isColumnModified(AuthnetTableMap::COL_RESULT)) {
            $modifiedColumns[':p' . $index++]  = 'result';
        }
        if ($this->isColumnModified(AuthnetTableMap::COL_TRACK_I)) {
            $modifiedColumns[':p' . $index++]  = 'track_i';
        }
        if ($this->isColumnModified(AuthnetTableMap::COL_DUMMY)) {
            $modifiedColumns[':p' . $index++]  = 'dummy';
        }

        $sql = sprintf(
            'INSERT INTO authnet (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case 'ordernbr':
                        $stmt->bindValue($identifier, $this->ordernbr, PDO::PARAM_STR);
                        break;
                    case 'rectype':
                        $stmt->bindValue($identifier, $this->rectype, PDO::PARAM_STR);
                        break;
                    case 'date':
                        $stmt->bindValue($identifier, $this->date, PDO::PARAM_INT);
                        break;
                    case 'time':
                        $stmt->bindValue($identifier, $this->time, PDO::PARAM_INT);
                        break;
                    case 'cardnbr':
                        $stmt->bindValue($identifier, $this->cardnbr, PDO::PARAM_STR);
                        break;
                    case 'track_ii':
                        $stmt->bindValue($identifier, $this->track_ii, PDO::PARAM_STR);
                        break;
                    case 'expdate':
                        $stmt->bindValue($identifier, $this->expdate, PDO::PARAM_STR);
                        break;
                    case 'cvv':
                        $stmt->bindValue($identifier, $this->cvv, PDO::PARAM_STR);
                        break;
                    case 'type':
                        $stmt->bindValue($identifier, $this->type, PDO::PARAM_STR);
                        break;
                    case 'amount':
                        $stmt->bindValue($identifier, $this->amount, PDO::PARAM_STR);
                        break;
                    case 'card_name':
                        $stmt->bindValue($identifier, $this->card_name, PDO::PARAM_STR);
                        break;
                    case 'street':
                        $stmt->bindValue($identifier, $this->street, PDO::PARAM_STR);
                        break;
                    case 'zipcode':
                        $stmt->bindValue($identifier, $this->zipcode, PDO::PARAM_STR);
                        break;
                    case 'custid':
                        $stmt->bindValue($identifier, $this->custid, PDO::PARAM_STR);
                        break;
                    case 'custpo':
                        $stmt->bindValue($identifier, $this->custpo, PDO::PARAM_STR);
                        break;
                    case 'trans_id':
                        $stmt->bindValue($identifier, $this->trans_id, PDO::PARAM_STR);
                        break;
                    case 'authcode':
                        $stmt->bindValue($identifier, $this->authcode, PDO::PARAM_STR);
                        break;
                    case 'avs_msg':
                        $stmt->bindValue($identifier, $this->avs_msg, PDO::PARAM_STR);
                        break;
                    case 'error_code':
                        $stmt->bindValue($identifier, $this->error_code, PDO::PARAM_STR);
                        break;
                    case 'error_msg':
                        $stmt->bindValue($identifier, $this->error_msg, PDO::PARAM_STR);
                        break;
                    case 'result':
                        $stmt->bindValue($identifier, $this->result, PDO::PARAM_STR);
                        break;
                    case 'track_i':
                        $stmt->bindValue($identifier, $this->track_i, PDO::PARAM_STR);
                        break;
                    case 'dummy':
                        $stmt->bindValue($identifier, $this->dummy, PDO::PARAM_STR);
                        break;
                }
            }
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute INSERT statement [%s]', $sql), 0, $e);
        }

        $this->setNew(false);
    }

    /**
     * Update the row in the database.
     *
     * @param      ConnectionInterface $con
     *
     * @return Integer Number of updated rows
     * @see doSave()
     */
    protected function doUpdate(ConnectionInterface $con)
    {
        $selectCriteria = $this->buildPkeyCriteria();
        $valuesCriteria = $this->buildCriteria();

        return $selectCriteria->doUpdate($valuesCriteria, $con);
    }

    /**
     * Retrieves a field from the object by name passed in as a string.
     *
     * @param      string $name name
     * @param      string $type The type of fieldname the $name is of:
     *                     one of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                     TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *                     Defaults to TableMap::TYPE_PHPNAME.
     * @return mixed Value of field.
     */
    public function getByName($name, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = AuthnetTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
        $field = $this->getByPosition($pos);

        return $field;
    }

    /**
     * Retrieves a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param      int $pos position in xml schema
     * @return mixed Value of field at $pos
     */
    public function getByPosition($pos)
    {
        switch ($pos) {
            case 0:
                return $this->getOrdernbr();
                break;
            case 1:
                return $this->getRectype();
                break;
            case 2:
                return $this->getDate();
                break;
            case 3:
                return $this->getTime();
                break;
            case 4:
                return $this->getCardnbr();
                break;
            case 5:
                return $this->getTrackIi();
                break;
            case 6:
                return $this->getExpdate();
                break;
            case 7:
                return $this->getCvv();
                break;
            case 8:
                return $this->getType();
                break;
            case 9:
                return $this->getAmount();
                break;
            case 10:
                return $this->getCardName();
                break;
            case 11:
                return $this->getStreet();
                break;
            case 12:
                return $this->getZipcode();
                break;
            case 13:
                return $this->getCustid();
                break;
            case 14:
                return $this->getCustpo();
                break;
            case 15:
                return $this->getTransId();
                break;
            case 16:
                return $this->getAuthcode();
                break;
            case 17:
                return $this->getAvsMsg();
                break;
            case 18:
                return $this->getErrorCode();
                break;
            case 19:
                return $this->getErrorMsg();
                break;
            case 20:
                return $this->getResult();
                break;
            case 21:
                return $this->getTrackI();
                break;
            case 22:
                return $this->getDummy();
                break;
            default:
                return null;
                break;
        } // switch()
    }

    /**
     * Exports the object as an array.
     *
     * You can specify the key type of the array by passing one of the class
     * type constants.
     *
     * @param     string  $keyType (optional) One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME,
     *                    TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *                    Defaults to TableMap::TYPE_PHPNAME.
     * @param     boolean $includeLazyLoadColumns (optional) Whether to include lazy loaded columns. Defaults to TRUE.
     * @param     array $alreadyDumpedObjects List of objects to skip to avoid recursion
     *
     * @return array an associative array containing the field names (as keys) and field values
     */
    public function toArray($keyType = TableMap::TYPE_PHPNAME, $includeLazyLoadColumns = true, $alreadyDumpedObjects = array())
    {

        if (isset($alreadyDumpedObjects['Authnet'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Authnet'][$this->hashCode()] = true;
        $keys = AuthnetTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getOrdernbr(),
            $keys[1] => $this->getRectype(),
            $keys[2] => $this->getDate(),
            $keys[3] => $this->getTime(),
            $keys[4] => $this->getCardnbr(),
            $keys[5] => $this->getTrackIi(),
            $keys[6] => $this->getExpdate(),
            $keys[7] => $this->getCvv(),
            $keys[8] => $this->getType(),
            $keys[9] => $this->getAmount(),
            $keys[10] => $this->getCardName(),
            $keys[11] => $this->getStreet(),
            $keys[12] => $this->getZipcode(),
            $keys[13] => $this->getCustid(),
            $keys[14] => $this->getCustpo(),
            $keys[15] => $this->getTransId(),
            $keys[16] => $this->getAuthcode(),
            $keys[17] => $this->getAvsMsg(),
            $keys[18] => $this->getErrorCode(),
            $keys[19] => $this->getErrorMsg(),
            $keys[20] => $this->getResult(),
            $keys[21] => $this->getTrackI(),
            $keys[22] => $this->getDummy(),
        );
        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }


        return $result;
    }

    /**
     * Sets a field from the object by name passed in as a string.
     *
     * @param  string $name
     * @param  mixed  $value field value
     * @param  string $type The type of fieldname the $name is of:
     *                one of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *                Defaults to TableMap::TYPE_PHPNAME.
     * @return $this|\Authnet
     */
    public function setByName($name, $value, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = AuthnetTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\Authnet
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setOrdernbr($value);
                break;
            case 1:
                $this->setRectype($value);
                break;
            case 2:
                $this->setDate($value);
                break;
            case 3:
                $this->setTime($value);
                break;
            case 4:
                $this->setCardnbr($value);
                break;
            case 5:
                $this->setTrackIi($value);
                break;
            case 6:
                $this->setExpdate($value);
                break;
            case 7:
                $this->setCvv($value);
                break;
            case 8:
                $this->setType($value);
                break;
            case 9:
                $this->setAmount($value);
                break;
            case 10:
                $this->setCardName($value);
                break;
            case 11:
                $this->setStreet($value);
                break;
            case 12:
                $this->setZipcode($value);
                break;
            case 13:
                $this->setCustid($value);
                break;
            case 14:
                $this->setCustpo($value);
                break;
            case 15:
                $this->setTransId($value);
                break;
            case 16:
                $this->setAuthcode($value);
                break;
            case 17:
                $this->setAvsMsg($value);
                break;
            case 18:
                $this->setErrorCode($value);
                break;
            case 19:
                $this->setErrorMsg($value);
                break;
            case 20:
                $this->setResult($value);
                break;
            case 21:
                $this->setTrackI($value);
                break;
            case 22:
                $this->setDummy($value);
                break;
        } // switch()

        return $this;
    }

    /**
     * Populates the object using an array.
     *
     * This is particularly useful when populating an object from one of the
     * request arrays (e.g. $_POST).  This method goes through the column
     * names, checking to see whether a matching key exists in populated
     * array. If so the setByName() method is called for that column.
     *
     * You can specify the key type of the array by additionally passing one
     * of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME,
     * TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     * The default key type is the column's TableMap::TYPE_PHPNAME.
     *
     * @param      array  $arr     An array to populate the object from.
     * @param      string $keyType The type of keys the array uses.
     * @return void
     */
    public function fromArray($arr, $keyType = TableMap::TYPE_PHPNAME)
    {
        $keys = AuthnetTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setOrdernbr($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setRectype($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setDate($arr[$keys[2]]);
        }
        if (array_key_exists($keys[3], $arr)) {
            $this->setTime($arr[$keys[3]]);
        }
        if (array_key_exists($keys[4], $arr)) {
            $this->setCardnbr($arr[$keys[4]]);
        }
        if (array_key_exists($keys[5], $arr)) {
            $this->setTrackIi($arr[$keys[5]]);
        }
        if (array_key_exists($keys[6], $arr)) {
            $this->setExpdate($arr[$keys[6]]);
        }
        if (array_key_exists($keys[7], $arr)) {
            $this->setCvv($arr[$keys[7]]);
        }
        if (array_key_exists($keys[8], $arr)) {
            $this->setType($arr[$keys[8]]);
        }
        if (array_key_exists($keys[9], $arr)) {
            $this->setAmount($arr[$keys[9]]);
        }
        if (array_key_exists($keys[10], $arr)) {
            $this->setCardName($arr[$keys[10]]);
        }
        if (array_key_exists($keys[11], $arr)) {
            $this->setStreet($arr[$keys[11]]);
        }
        if (array_key_exists($keys[12], $arr)) {
            $this->setZipcode($arr[$keys[12]]);
        }
        if (array_key_exists($keys[13], $arr)) {
            $this->setCustid($arr[$keys[13]]);
        }
        if (array_key_exists($keys[14], $arr)) {
            $this->setCustpo($arr[$keys[14]]);
        }
        if (array_key_exists($keys[15], $arr)) {
            $this->setTransId($arr[$keys[15]]);
        }
        if (array_key_exists($keys[16], $arr)) {
            $this->setAuthcode($arr[$keys[16]]);
        }
        if (array_key_exists($keys[17], $arr)) {
            $this->setAvsMsg($arr[$keys[17]]);
        }
        if (array_key_exists($keys[18], $arr)) {
            $this->setErrorCode($arr[$keys[18]]);
        }
        if (array_key_exists($keys[19], $arr)) {
            $this->setErrorMsg($arr[$keys[19]]);
        }
        if (array_key_exists($keys[20], $arr)) {
            $this->setResult($arr[$keys[20]]);
        }
        if (array_key_exists($keys[21], $arr)) {
            $this->setTrackI($arr[$keys[21]]);
        }
        if (array_key_exists($keys[22], $arr)) {
            $this->setDummy($arr[$keys[22]]);
        }
    }

     /**
     * Populate the current object from a string, using a given parser format
     * <code>
     * $book = new Book();
     * $book->importFrom('JSON', '{"Id":9012,"Title":"Don Juan","ISBN":"0140422161","Price":12.99,"PublisherId":1234,"AuthorId":5678}');
     * </code>
     *
     * You can specify the key type of the array by additionally passing one
     * of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME,
     * TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     * The default key type is the column's TableMap::TYPE_PHPNAME.
     *
     * @param mixed $parser A AbstractParser instance,
     *                       or a format name ('XML', 'YAML', 'JSON', 'CSV')
     * @param string $data The source data to import from
     * @param string $keyType The type of keys the array uses.
     *
     * @return $this|\Authnet The current object, for fluid interface
     */
    public function importFrom($parser, $data, $keyType = TableMap::TYPE_PHPNAME)
    {
        if (!$parser instanceof AbstractParser) {
            $parser = AbstractParser::getParser($parser);
        }

        $this->fromArray($parser->toArray($data), $keyType);

        return $this;
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(AuthnetTableMap::DATABASE_NAME);

        if ($this->isColumnModified(AuthnetTableMap::COL_ORDERNBR)) {
            $criteria->add(AuthnetTableMap::COL_ORDERNBR, $this->ordernbr);
        }
        if ($this->isColumnModified(AuthnetTableMap::COL_RECTYPE)) {
            $criteria->add(AuthnetTableMap::COL_RECTYPE, $this->rectype);
        }
        if ($this->isColumnModified(AuthnetTableMap::COL_DATE)) {
            $criteria->add(AuthnetTableMap::COL_DATE, $this->date);
        }
        if ($this->isColumnModified(AuthnetTableMap::COL_TIME)) {
            $criteria->add(AuthnetTableMap::COL_TIME, $this->time);
        }
        if ($this->isColumnModified(AuthnetTableMap::COL_CARDNBR)) {
            $criteria->add(AuthnetTableMap::COL_CARDNBR, $this->cardnbr);
        }
        if ($this->isColumnModified(AuthnetTableMap::COL_TRACK_II)) {
            $criteria->add(AuthnetTableMap::COL_TRACK_II, $this->track_ii);
        }
        if ($this->isColumnModified(AuthnetTableMap::COL_EXPDATE)) {
            $criteria->add(AuthnetTableMap::COL_EXPDATE, $this->expdate);
        }
        if ($this->isColumnModified(AuthnetTableMap::COL_CVV)) {
            $criteria->add(AuthnetTableMap::COL_CVV, $this->cvv);
        }
        if ($this->isColumnModified(AuthnetTableMap::COL_TYPE)) {
            $criteria->add(AuthnetTableMap::COL_TYPE, $this->type);
        }
        if ($this->isColumnModified(AuthnetTableMap::COL_AMOUNT)) {
            $criteria->add(AuthnetTableMap::COL_AMOUNT, $this->amount);
        }
        if ($this->isColumnModified(AuthnetTableMap::COL_CARD_NAME)) {
            $criteria->add(AuthnetTableMap::COL_CARD_NAME, $this->card_name);
        }
        if ($this->isColumnModified(AuthnetTableMap::COL_STREET)) {
            $criteria->add(AuthnetTableMap::COL_STREET, $this->street);
        }
        if ($this->isColumnModified(AuthnetTableMap::COL_ZIPCODE)) {
            $criteria->add(AuthnetTableMap::COL_ZIPCODE, $this->zipcode);
        }
        if ($this->isColumnModified(AuthnetTableMap::COL_CUSTID)) {
            $criteria->add(AuthnetTableMap::COL_CUSTID, $this->custid);
        }
        if ($this->isColumnModified(AuthnetTableMap::COL_CUSTPO)) {
            $criteria->add(AuthnetTableMap::COL_CUSTPO, $this->custpo);
        }
        if ($this->isColumnModified(AuthnetTableMap::COL_TRANS_ID)) {
            $criteria->add(AuthnetTableMap::COL_TRANS_ID, $this->trans_id);
        }
        if ($this->isColumnModified(AuthnetTableMap::COL_AUTHCODE)) {
            $criteria->add(AuthnetTableMap::COL_AUTHCODE, $this->authcode);
        }
        if ($this->isColumnModified(AuthnetTableMap::COL_AVS_MSG)) {
            $criteria->add(AuthnetTableMap::COL_AVS_MSG, $this->avs_msg);
        }
        if ($this->isColumnModified(AuthnetTableMap::COL_ERROR_CODE)) {
            $criteria->add(AuthnetTableMap::COL_ERROR_CODE, $this->error_code);
        }
        if ($this->isColumnModified(AuthnetTableMap::COL_ERROR_MSG)) {
            $criteria->add(AuthnetTableMap::COL_ERROR_MSG, $this->error_msg);
        }
        if ($this->isColumnModified(AuthnetTableMap::COL_RESULT)) {
            $criteria->add(AuthnetTableMap::COL_RESULT, $this->result);
        }
        if ($this->isColumnModified(AuthnetTableMap::COL_TRACK_I)) {
            $criteria->add(AuthnetTableMap::COL_TRACK_I, $this->track_i);
        }
        if ($this->isColumnModified(AuthnetTableMap::COL_DUMMY)) {
            $criteria->add(AuthnetTableMap::COL_DUMMY, $this->dummy);
        }

        return $criteria;
    }

    /**
     * Builds a Criteria object containing the primary key for this object.
     *
     * Unlike buildCriteria() this method includes the primary key values regardless
     * of whether or not they have been modified.
     *
     * @throws LogicException if no primary key is defined
     *
     * @return Criteria The Criteria object containing value(s) for primary key(s).
     */
    public function buildPkeyCriteria()
    {
        $criteria = ChildAuthnetQuery::create();
        $criteria->add(AuthnetTableMap::COL_ORDERNBR, $this->ordernbr);
        $criteria->add(AuthnetTableMap::COL_RECTYPE, $this->rectype);

        return $criteria;
    }

    /**
     * If the primary key is not null, return the hashcode of the
     * primary key. Otherwise, return the hash code of the object.
     *
     * @return int Hashcode
     */
    public function hashCode()
    {
        $validPk = null !== $this->getOrdernbr() &&
            null !== $this->getRectype();

        $validPrimaryKeyFKs = 0;
        $primaryKeyFKs = [];

        if ($validPk) {
            return crc32(json_encode($this->getPrimaryKey(), JSON_UNESCAPED_UNICODE));
        } elseif ($validPrimaryKeyFKs) {
            return crc32(json_encode($primaryKeyFKs, JSON_UNESCAPED_UNICODE));
        }

        return spl_object_hash($this);
    }

    /**
     * Returns the composite primary key for this object.
     * The array elements will be in same order as specified in XML.
     * @return array
     */
    public function getPrimaryKey()
    {
        $pks = array();
        $pks[0] = $this->getOrdernbr();
        $pks[1] = $this->getRectype();

        return $pks;
    }

    /**
     * Set the [composite] primary key.
     *
     * @param      array $keys The elements of the composite key (order must match the order in XML file).
     * @return void
     */
    public function setPrimaryKey($keys)
    {
        $this->setOrdernbr($keys[0]);
        $this->setRectype($keys[1]);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {
        return (null === $this->getOrdernbr()) && (null === $this->getRectype());
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param      object $copyObj An object of \Authnet (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setOrdernbr($this->getOrdernbr());
        $copyObj->setRectype($this->getRectype());
        $copyObj->setDate($this->getDate());
        $copyObj->setTime($this->getTime());
        $copyObj->setCardnbr($this->getCardnbr());
        $copyObj->setTrackIi($this->getTrackIi());
        $copyObj->setExpdate($this->getExpdate());
        $copyObj->setCvv($this->getCvv());
        $copyObj->setType($this->getType());
        $copyObj->setAmount($this->getAmount());
        $copyObj->setCardName($this->getCardName());
        $copyObj->setStreet($this->getStreet());
        $copyObj->setZipcode($this->getZipcode());
        $copyObj->setCustid($this->getCustid());
        $copyObj->setCustpo($this->getCustpo());
        $copyObj->setTransId($this->getTransId());
        $copyObj->setAuthcode($this->getAuthcode());
        $copyObj->setAvsMsg($this->getAvsMsg());
        $copyObj->setErrorCode($this->getErrorCode());
        $copyObj->setErrorMsg($this->getErrorMsg());
        $copyObj->setResult($this->getResult());
        $copyObj->setTrackI($this->getTrackI());
        $copyObj->setDummy($this->getDummy());
        if ($makeNew) {
            $copyObj->setNew(true);
        }
    }

    /**
     * Makes a copy of this object that will be inserted as a new row in table when saved.
     * It creates a new object filling in the simple attributes, but skipping any primary
     * keys that are defined for the table.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param  boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @return \Authnet Clone of current object.
     * @throws PropelException
     */
    public function copy($deepCopy = false)
    {
        // we use get_class(), because this might be a subclass
        $clazz = get_class($this);
        $copyObj = new $clazz();
        $this->copyInto($copyObj, $deepCopy);

        return $copyObj;
    }

    /**
     * Clears the current object, sets all attributes to their default values and removes
     * outgoing references as well as back-references (from other objects to this one. Results probably in a database
     * change of those foreign objects when you call `save` there).
     */
    public function clear()
    {
        $this->ordernbr = null;
        $this->rectype = null;
        $this->date = null;
        $this->time = null;
        $this->cardnbr = null;
        $this->track_ii = null;
        $this->expdate = null;
        $this->cvv = null;
        $this->type = null;
        $this->amount = null;
        $this->card_name = null;
        $this->street = null;
        $this->zipcode = null;
        $this->custid = null;
        $this->custpo = null;
        $this->trans_id = null;
        $this->authcode = null;
        $this->avs_msg = null;
        $this->error_code = null;
        $this->error_msg = null;
        $this->result = null;
        $this->track_i = null;
        $this->dummy = null;
        $this->alreadyInSave = false;
        $this->clearAllReferences();
        $this->applyDefaultValues();
        $this->resetModified();
        $this->setNew(true);
        $this->setDeleted(false);
    }

    /**
     * Resets all references and back-references to other model objects or collections of model objects.
     *
     * This method is used to reset all php object references (not the actual reference in the database).
     * Necessary for object serialisation.
     *
     * @param      boolean $deep Whether to also clear the references on all referrer objects.
     */
    public function clearAllReferences($deep = false)
    {
        if ($deep) {
        } // if ($deep)

    }

    /**
     * Return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(AuthnetTableMap::DEFAULT_STRING_FORMAT);
    }

    /**
     * Code to be run before persisting the object
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preSave(ConnectionInterface $con = null)
    {
        if (is_callable('parent::preSave')) {
            return parent::preSave($con);
        }
        return true;
    }

    /**
     * Code to be run after persisting the object
     * @param ConnectionInterface $con
     */
    public function postSave(ConnectionInterface $con = null)
    {
        if (is_callable('parent::postSave')) {
            parent::postSave($con);
        }
    }

    /**
     * Code to be run before inserting to database
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preInsert(ConnectionInterface $con = null)
    {
        if (is_callable('parent::preInsert')) {
            return parent::preInsert($con);
        }
        return true;
    }

    /**
     * Code to be run after inserting to database
     * @param ConnectionInterface $con
     */
    public function postInsert(ConnectionInterface $con = null)
    {
        if (is_callable('parent::postInsert')) {
            parent::postInsert($con);
        }
    }

    /**
     * Code to be run before updating the object in database
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preUpdate(ConnectionInterface $con = null)
    {
        if (is_callable('parent::preUpdate')) {
            return parent::preUpdate($con);
        }
        return true;
    }

    /**
     * Code to be run after updating the object in database
     * @param ConnectionInterface $con
     */
    public function postUpdate(ConnectionInterface $con = null)
    {
        if (is_callable('parent::postUpdate')) {
            parent::postUpdate($con);
        }
    }

    /**
     * Code to be run before deleting the object in database
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preDelete(ConnectionInterface $con = null)
    {
        if (is_callable('parent::preDelete')) {
            return parent::preDelete($con);
        }
        return true;
    }

    /**
     * Code to be run after deleting the object in database
     * @param ConnectionInterface $con
     */
    public function postDelete(ConnectionInterface $con = null)
    {
        if (is_callable('parent::postDelete')) {
            parent::postDelete($con);
        }
    }


    /**
     * Derived method to catches calls to undefined methods.
     *
     * Provides magic import/export method support (fromXML()/toXML(), fromYAML()/toYAML(), etc.).
     * Allows to define default __call() behavior if you overwrite __call()
     *
     * @param string $name
     * @param mixed  $params
     *
     * @return array|string
     */
    public function __call($name, $params)
    {
        if (0 === strpos($name, 'get')) {
            $virtualColumn = substr($name, 3);
            if ($this->hasVirtualColumn($virtualColumn)) {
                return $this->getVirtualColumn($virtualColumn);
            }

            $virtualColumn = lcfirst($virtualColumn);
            if ($this->hasVirtualColumn($virtualColumn)) {
                return $this->getVirtualColumn($virtualColumn);
            }
        }

        if (0 === strpos($name, 'from')) {
            $format = substr($name, 4);

            return $this->importFrom($format, reset($params));
        }

        if (0 === strpos($name, 'to')) {
            $format = substr($name, 2);
            $includeLazyLoadColumns = isset($params[0]) ? $params[0] : true;

            return $this->exportTo($format, $includeLazyLoadColumns);
        }

        throw new BadMethodCallException(sprintf('Call to undefined method: %s.', $name));
    }

}
