<?php

namespace Map;

use \Payment;
use \PaymentQuery;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\InstancePoolTrait;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\DataFetcher\DataFetcherInterface;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Map\RelationMap;
use Propel\Runtime\Map\TableMap;
use Propel\Runtime\Map\TableMapTrait;


/**
 * This class defines the structure of the 'authnet' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class PaymentTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.PaymentTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'paymentsdb';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'authnet';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Payment';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'Payment';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 23;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 23;

    /**
     * the column name for the ordernbr field
     */
    const COL_ORDERNBR = 'authnet.ordernbr';

    /**
     * the column name for the rectype field
     */
    const COL_RECTYPE = 'authnet.rectype';

    /**
     * the column name for the date field
     */
    const COL_DATE = 'authnet.date';

    /**
     * the column name for the time field
     */
    const COL_TIME = 'authnet.time';

    /**
     * the column name for the cardnbr field
     */
    const COL_CARDNBR = 'authnet.cardnbr';

    /**
     * the column name for the track_ii field
     */
    const COL_TRACK_II = 'authnet.track_ii';

    /**
     * the column name for the expdate field
     */
    const COL_EXPDATE = 'authnet.expdate';

    /**
     * the column name for the cvv field
     */
    const COL_CVV = 'authnet.cvv';

    /**
     * the column name for the type field
     */
    const COL_TYPE = 'authnet.type';

    /**
     * the column name for the amount field
     */
    const COL_AMOUNT = 'authnet.amount';

    /**
     * the column name for the card_name field
     */
    const COL_CARD_NAME = 'authnet.card_name';

    /**
     * the column name for the street field
     */
    const COL_STREET = 'authnet.street';

    /**
     * the column name for the zipcode field
     */
    const COL_ZIPCODE = 'authnet.zipcode';

    /**
     * the column name for the custid field
     */
    const COL_CUSTID = 'authnet.custid';

    /**
     * the column name for the custpo field
     */
    const COL_CUSTPO = 'authnet.custpo';

    /**
     * the column name for the trans_id field
     */
    const COL_TRANS_ID = 'authnet.trans_id';

    /**
     * the column name for the authcode field
     */
    const COL_AUTHCODE = 'authnet.authcode';

    /**
     * the column name for the avs_msg field
     */
    const COL_AVS_MSG = 'authnet.avs_msg';

    /**
     * the column name for the error_code field
     */
    const COL_ERROR_CODE = 'authnet.error_code';

    /**
     * the column name for the error_msg field
     */
    const COL_ERROR_MSG = 'authnet.error_msg';

    /**
     * the column name for the result field
     */
    const COL_RESULT = 'authnet.result';

    /**
     * the column name for the track_i field
     */
    const COL_TRACK_I = 'authnet.track_i';

    /**
     * the column name for the dummy field
     */
    const COL_DUMMY = 'authnet.dummy';

    /**
     * The default string format for model objects of the related table
     */
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldNames[self::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        self::TYPE_PHPNAME       => array('Ordernbr', 'Rectype', 'Date', 'Time', 'Cardnbr', 'TrackIi', 'Expdate', 'Cvv', 'Type', 'Amount', 'CardName', 'Street', 'Zipcode', 'Custid', 'Custpo', 'TransId', 'Authcode', 'AvsMsg', 'ErrorCode', 'ErrorMsg', 'Result', 'TrackI', 'Dummy', ),
        self::TYPE_CAMELNAME     => array('ordernbr', 'rectype', 'date', 'time', 'cardnbr', 'trackIi', 'expdate', 'cvv', 'type', 'amount', 'cardName', 'street', 'zipcode', 'custid', 'custpo', 'transId', 'authcode', 'avsMsg', 'errorCode', 'errorMsg', 'result', 'trackI', 'dummy', ),
        self::TYPE_COLNAME       => array(PaymentTableMap::COL_ORDERNBR, PaymentTableMap::COL_RECTYPE, PaymentTableMap::COL_DATE, PaymentTableMap::COL_TIME, PaymentTableMap::COL_CARDNBR, PaymentTableMap::COL_TRACK_II, PaymentTableMap::COL_EXPDATE, PaymentTableMap::COL_CVV, PaymentTableMap::COL_TYPE, PaymentTableMap::COL_AMOUNT, PaymentTableMap::COL_CARD_NAME, PaymentTableMap::COL_STREET, PaymentTableMap::COL_ZIPCODE, PaymentTableMap::COL_CUSTID, PaymentTableMap::COL_CUSTPO, PaymentTableMap::COL_TRANS_ID, PaymentTableMap::COL_AUTHCODE, PaymentTableMap::COL_AVS_MSG, PaymentTableMap::COL_ERROR_CODE, PaymentTableMap::COL_ERROR_MSG, PaymentTableMap::COL_RESULT, PaymentTableMap::COL_TRACK_I, PaymentTableMap::COL_DUMMY, ),
        self::TYPE_FIELDNAME     => array('ordernbr', 'rectype', 'date', 'time', 'cardnbr', 'track_ii', 'expdate', 'cvv', 'type', 'amount', 'card_name', 'street', 'zipcode', 'custid', 'custpo', 'trans_id', 'authcode', 'avs_msg', 'error_code', 'error_msg', 'result', 'track_i', 'dummy', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Ordernbr' => 0, 'Rectype' => 1, 'Date' => 2, 'Time' => 3, 'Cardnbr' => 4, 'TrackIi' => 5, 'Expdate' => 6, 'Cvv' => 7, 'Type' => 8, 'Amount' => 9, 'CardName' => 10, 'Street' => 11, 'Zipcode' => 12, 'Custid' => 13, 'Custpo' => 14, 'TransId' => 15, 'Authcode' => 16, 'AvsMsg' => 17, 'ErrorCode' => 18, 'ErrorMsg' => 19, 'Result' => 20, 'TrackI' => 21, 'Dummy' => 22, ),
        self::TYPE_CAMELNAME     => array('ordernbr' => 0, 'rectype' => 1, 'date' => 2, 'time' => 3, 'cardnbr' => 4, 'trackIi' => 5, 'expdate' => 6, 'cvv' => 7, 'type' => 8, 'amount' => 9, 'cardName' => 10, 'street' => 11, 'zipcode' => 12, 'custid' => 13, 'custpo' => 14, 'transId' => 15, 'authcode' => 16, 'avsMsg' => 17, 'errorCode' => 18, 'errorMsg' => 19, 'result' => 20, 'trackI' => 21, 'dummy' => 22, ),
        self::TYPE_COLNAME       => array(PaymentTableMap::COL_ORDERNBR => 0, PaymentTableMap::COL_RECTYPE => 1, PaymentTableMap::COL_DATE => 2, PaymentTableMap::COL_TIME => 3, PaymentTableMap::COL_CARDNBR => 4, PaymentTableMap::COL_TRACK_II => 5, PaymentTableMap::COL_EXPDATE => 6, PaymentTableMap::COL_CVV => 7, PaymentTableMap::COL_TYPE => 8, PaymentTableMap::COL_AMOUNT => 9, PaymentTableMap::COL_CARD_NAME => 10, PaymentTableMap::COL_STREET => 11, PaymentTableMap::COL_ZIPCODE => 12, PaymentTableMap::COL_CUSTID => 13, PaymentTableMap::COL_CUSTPO => 14, PaymentTableMap::COL_TRANS_ID => 15, PaymentTableMap::COL_AUTHCODE => 16, PaymentTableMap::COL_AVS_MSG => 17, PaymentTableMap::COL_ERROR_CODE => 18, PaymentTableMap::COL_ERROR_MSG => 19, PaymentTableMap::COL_RESULT => 20, PaymentTableMap::COL_TRACK_I => 21, PaymentTableMap::COL_DUMMY => 22, ),
        self::TYPE_FIELDNAME     => array('ordernbr' => 0, 'rectype' => 1, 'date' => 2, 'time' => 3, 'cardnbr' => 4, 'track_ii' => 5, 'expdate' => 6, 'cvv' => 7, 'type' => 8, 'amount' => 9, 'card_name' => 10, 'street' => 11, 'zipcode' => 12, 'custid' => 13, 'custpo' => 14, 'trans_id' => 15, 'authcode' => 16, 'avs_msg' => 17, 'error_code' => 18, 'error_msg' => 19, 'result' => 20, 'track_i' => 21, 'dummy' => 22, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, )
    );

    /**
     * Initialize the table attributes and columns
     * Relations are not initialized by this method since they are lazy loaded
     *
     * @return void
     * @throws PropelException
     */
    public function initialize()
    {
        // attributes
        $this->setName('authnet');
        $this->setPhpName('Payment');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Payment');
        $this->setPackage('');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('ordernbr', 'Ordernbr', 'VARCHAR', true, 10, ' ');
        $this->addPrimaryKey('rectype', 'Rectype', 'VARCHAR', true, 3, '');
        $this->addColumn('date', 'Date', 'INTEGER', false, 8, null);
        $this->addColumn('time', 'Time', 'INTEGER', false, 8, null);
        $this->addColumn('cardnbr', 'Cardnbr', 'LONGVARCHAR', false, null, null);
        $this->addColumn('track_ii', 'TrackIi', 'LONGVARCHAR', false, null, null);
        $this->addColumn('expdate', 'Expdate', 'LONGVARCHAR', false, null, null);
        $this->addColumn('cvv', 'Cvv', 'LONGVARCHAR', false, null, null);
        $this->addColumn('type', 'Type', 'VARCHAR', false, 10, null);
        $this->addColumn('amount', 'Amount', 'VARCHAR', false, 10, null);
        $this->addColumn('card_name', 'CardName', 'VARCHAR', false, 20, null);
        $this->addColumn('street', 'Street', 'VARCHAR', false, 20, null);
        $this->addColumn('zipcode', 'Zipcode', 'VARCHAR', false, 10, null);
        $this->addColumn('custid', 'Custid', 'VARCHAR', false, 6, null);
        $this->addColumn('custpo', 'Custpo', 'VARCHAR', false, 20, null);
        $this->addColumn('trans_id', 'TransId', 'VARCHAR', false, 30, null);
        $this->addColumn('authcode', 'Authcode', 'VARCHAR', false, 10, null);
        $this->addColumn('avs_msg', 'AvsMsg', 'VARCHAR', false, 50, null);
        $this->addColumn('error_code', 'ErrorCode', 'VARCHAR', false, 10, null);
        $this->addColumn('error_msg', 'ErrorMsg', 'VARCHAR', false, 150, null);
        $this->addColumn('result', 'Result', 'VARCHAR', false, 30, null);
        $this->addColumn('track_i', 'TrackI', 'LONGVARCHAR', false, null, null);
        $this->addColumn('dummy', 'Dummy', 'VARCHAR', false, 1, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
    } // buildRelations()

    /**
     * Adds an object to the instance pool.
     *
     * Propel keeps cached copies of objects in an instance pool when they are retrieved
     * from the database. In some cases you may need to explicitly add objects
     * to the cache in order to ensure that the same objects are always returned by find*()
     * and findPk*() calls.
     *
     * @param \Payment $obj A \Payment object.
     * @param string $key             (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (null === $key) {
                $key = serialize([(null === $obj->getOrdernbr() || is_scalar($obj->getOrdernbr()) || is_callable([$obj->getOrdernbr(), '__toString']) ? (string) $obj->getOrdernbr() : $obj->getOrdernbr()), (null === $obj->getRectype() || is_scalar($obj->getRectype()) || is_callable([$obj->getRectype(), '__toString']) ? (string) $obj->getRectype() : $obj->getRectype())]);
            } // if key === null
            self::$instances[$key] = $obj;
        }
    }

    /**
     * Removes an object from the instance pool.
     *
     * Propel keeps cached copies of objects in an instance pool when they are retrieved
     * from the database.  In some cases -- especially when you override doDelete
     * methods in your stub classes -- you may need to explicitly remove objects
     * from the cache in order to prevent returning objects that no longer exist.
     *
     * @param mixed $value A \Payment object or a primary key value.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && null !== $value) {
            if (is_object($value) && $value instanceof \Payment) {
                $key = serialize([(null === $value->getOrdernbr() || is_scalar($value->getOrdernbr()) || is_callable([$value->getOrdernbr(), '__toString']) ? (string) $value->getOrdernbr() : $value->getOrdernbr()), (null === $value->getRectype() || is_scalar($value->getRectype()) || is_callable([$value->getRectype(), '__toString']) ? (string) $value->getRectype() : $value->getRectype())]);

            } elseif (is_array($value) && count($value) === 2) {
                // assume we've been passed a primary key";
                $key = serialize([(null === $value[0] || is_scalar($value[0]) || is_callable([$value[0], '__toString']) ? (string) $value[0] : $value[0]), (null === $value[1] || is_scalar($value[1]) || is_callable([$value[1], '__toString']) ? (string) $value[1] : $value[1])]);
            } elseif ($value instanceof Criteria) {
                self::$instances = [];

                return;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or \Payment object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value, true)));
                throw $e;
            }

            unset(self::$instances[$key]);
        }
    }

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param array  $row       resultset row.
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return string The primary key hash of the row
     */
    public static function getPrimaryKeyHashFromRow($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        // If the PK cannot be derived from the row, return NULL.
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Ordernbr', TableMap::TYPE_PHPNAME, $indexType)] === null && $row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('Rectype', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return serialize([(null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Ordernbr', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Ordernbr', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Ordernbr', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Ordernbr', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Ordernbr', TableMap::TYPE_PHPNAME, $indexType)]), (null === $row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('Rectype', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('Rectype', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('Rectype', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('Rectype', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('Rectype', TableMap::TYPE_PHPNAME, $indexType)])]);
    }

    /**
     * Retrieves the primary key from the DB resultset row
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, an array of the primary key columns will be returned.
     *
     * @param array  $row       resultset row.
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return mixed The primary key of the row
     */
    public static function getPrimaryKeyFromRow($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
            $pks = [];

        $pks[] = (string) $row[
            $indexType == TableMap::TYPE_NUM
                ? 0 + $offset
                : self::translateFieldName('Ordernbr', TableMap::TYPE_PHPNAME, $indexType)
        ];
        $pks[] = (string) $row[
            $indexType == TableMap::TYPE_NUM
                ? 1 + $offset
                : self::translateFieldName('Rectype', TableMap::TYPE_PHPNAME, $indexType)
        ];

        return $pks;
    }

    /**
     * The class that the tableMap will make instances of.
     *
     * If $withPrefix is true, the returned path
     * uses a dot-path notation which is translated into a path
     * relative to a location on the PHP include_path.
     * (e.g. path.to.MyClass -> 'path/to/MyClass.php')
     *
     * @param boolean $withPrefix Whether or not to return the path with the class name
     * @return string path.to.ClassName
     */
    public static function getOMClass($withPrefix = true)
    {
        return $withPrefix ? PaymentTableMap::CLASS_DEFAULT : PaymentTableMap::OM_CLASS;
    }

    /**
     * Populates an object of the default type or an object that inherit from the default.
     *
     * @param array  $row       row returned by DataFetcher->fetch().
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType The index type of $row. Mostly DataFetcher->getIndexType().
                                 One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     * @return array           (Payment object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = PaymentTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = PaymentTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + PaymentTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = PaymentTableMap::OM_CLASS;
            /** @var Payment $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            PaymentTableMap::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }

    /**
     * The returned array will contain objects of the default type or
     * objects that inherit from the default.
     *
     * @param DataFetcherInterface $dataFetcher
     * @return array
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function populateObjects(DataFetcherInterface $dataFetcher)
    {
        $results = array();

        // set the class once to avoid overhead in the loop
        $cls = static::getOMClass(false);
        // populate the object(s)
        while ($row = $dataFetcher->fetch()) {
            $key = PaymentTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = PaymentTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Payment $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                PaymentTableMap::addInstanceToPool($obj, $key);
            } // if key exists
        }

        return $results;
    }
    /**
     * Add all the columns needed to create a new object.
     *
     * Note: any columns that were marked with lazyLoad="true" in the
     * XML schema will not be added to the select list and only loaded
     * on demand.
     *
     * @param Criteria $criteria object containing the columns to add.
     * @param string   $alias    optional table alias
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function addSelectColumns(Criteria $criteria, $alias = null)
    {
        if (null === $alias) {
            $criteria->addSelectColumn(PaymentTableMap::COL_ORDERNBR);
            $criteria->addSelectColumn(PaymentTableMap::COL_RECTYPE);
            $criteria->addSelectColumn(PaymentTableMap::COL_DATE);
            $criteria->addSelectColumn(PaymentTableMap::COL_TIME);
            $criteria->addSelectColumn(PaymentTableMap::COL_CARDNBR);
            $criteria->addSelectColumn(PaymentTableMap::COL_TRACK_II);
            $criteria->addSelectColumn(PaymentTableMap::COL_EXPDATE);
            $criteria->addSelectColumn(PaymentTableMap::COL_CVV);
            $criteria->addSelectColumn(PaymentTableMap::COL_TYPE);
            $criteria->addSelectColumn(PaymentTableMap::COL_AMOUNT);
            $criteria->addSelectColumn(PaymentTableMap::COL_CARD_NAME);
            $criteria->addSelectColumn(PaymentTableMap::COL_STREET);
            $criteria->addSelectColumn(PaymentTableMap::COL_ZIPCODE);
            $criteria->addSelectColumn(PaymentTableMap::COL_CUSTID);
            $criteria->addSelectColumn(PaymentTableMap::COL_CUSTPO);
            $criteria->addSelectColumn(PaymentTableMap::COL_TRANS_ID);
            $criteria->addSelectColumn(PaymentTableMap::COL_AUTHCODE);
            $criteria->addSelectColumn(PaymentTableMap::COL_AVS_MSG);
            $criteria->addSelectColumn(PaymentTableMap::COL_ERROR_CODE);
            $criteria->addSelectColumn(PaymentTableMap::COL_ERROR_MSG);
            $criteria->addSelectColumn(PaymentTableMap::COL_RESULT);
            $criteria->addSelectColumn(PaymentTableMap::COL_TRACK_I);
            $criteria->addSelectColumn(PaymentTableMap::COL_DUMMY);
        } else {
            $criteria->addSelectColumn($alias . '.ordernbr');
            $criteria->addSelectColumn($alias . '.rectype');
            $criteria->addSelectColumn($alias . '.date');
            $criteria->addSelectColumn($alias . '.time');
            $criteria->addSelectColumn($alias . '.cardnbr');
            $criteria->addSelectColumn($alias . '.track_ii');
            $criteria->addSelectColumn($alias . '.expdate');
            $criteria->addSelectColumn($alias . '.cvv');
            $criteria->addSelectColumn($alias . '.type');
            $criteria->addSelectColumn($alias . '.amount');
            $criteria->addSelectColumn($alias . '.card_name');
            $criteria->addSelectColumn($alias . '.street');
            $criteria->addSelectColumn($alias . '.zipcode');
            $criteria->addSelectColumn($alias . '.custid');
            $criteria->addSelectColumn($alias . '.custpo');
            $criteria->addSelectColumn($alias . '.trans_id');
            $criteria->addSelectColumn($alias . '.authcode');
            $criteria->addSelectColumn($alias . '.avs_msg');
            $criteria->addSelectColumn($alias . '.error_code');
            $criteria->addSelectColumn($alias . '.error_msg');
            $criteria->addSelectColumn($alias . '.result');
            $criteria->addSelectColumn($alias . '.track_i');
            $criteria->addSelectColumn($alias . '.dummy');
        }
    }

    /**
     * Returns the TableMap related to this object.
     * This method is not needed for general use but a specific application could have a need.
     * @return TableMap
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function getTableMap()
    {
        return Propel::getServiceContainer()->getDatabaseMap(PaymentTableMap::DATABASE_NAME)->getTable(PaymentTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(PaymentTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(PaymentTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new PaymentTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a Payment or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or Payment object or primary key or array of primary keys
     *              which is used to create the DELETE statement
     * @param  ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
     public static function doDelete($values, ConnectionInterface $con = null)
     {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(PaymentTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Payment) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(PaymentTableMap::DATABASE_NAME);
            // primary key is composite; we therefore, expect
            // the primary key passed to be an array of pkey values
            if (count($values) == count($values, COUNT_RECURSIVE)) {
                // array is not multi-dimensional
                $values = array($values);
            }
            foreach ($values as $value) {
                $criterion = $criteria->getNewCriterion(PaymentTableMap::COL_ORDERNBR, $value[0]);
                $criterion->addAnd($criteria->getNewCriterion(PaymentTableMap::COL_RECTYPE, $value[1]));
                $criteria->addOr($criterion);
            }
        }

        $query = PaymentQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            PaymentTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                PaymentTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the authnet table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return PaymentQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Payment or Criteria object.
     *
     * @param mixed               $criteria Criteria or Payment object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(PaymentTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Payment object
        }


        // Set the correct dbName
        $query = PaymentQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // PaymentTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
PaymentTableMap::buildTableMap();
