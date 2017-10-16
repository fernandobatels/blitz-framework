<?php
/*
 * Blitz Framework - Small Framework to PHP
 * Copyright (C) 2016 Fernando Batels <luisfbatels@gmail.com>
 */
namespace blitz\vendor\core;

/**
 * Base Model to Database manipulate
 * 
 * Examples and doc in https://github.com/salebab/database
 * 
 * 
 *
 * @author Fernando Batels <luisfbatels@gmail.com>
 */
abstract class ModelDatabase extends Model {

    private static $conn;

    public function __construct() {
		if (!isset(self::$conn)) {
            $confs = \blitz\vendor\Bootstrap::$settings['db'];
		
			self::$conn = new \database\DB(
				$confs['dns'],
				$confs['user'],
				$confs['pass']
			);
			
			if($confs['attributes'] !== null) {
                foreach($confs['attributes'] as $k => $v) {
                    self::$conn->setAttribute($k, $v);
                }
			
			}
		}
    }

    /**
     * Default table name
     * @return string
     */
    protected function nameTable() {
        return "";
    }

    /**
     * Insert row data in database
     * @param type $data
     * @param type $specificTable
     */
    protected function insert($data = [], $specificTable = null) {
        if ($specificTable === null) {
            $specificTable = $this->nameTable();
        }
        self::$conn->insert($specificTable, $data);
    }

    /**
     * update row in database
     * @param type $data
     * @param type $where
     * @param type $dataToWhere
     * @param type $specificTable
     */
    protected function update($data = [], $where = null, $dataToWhere = [], $specificTable = null) {
        if ($specificTable === null) {
            $specificTable = $this->nameTable();
        }
        self::$conn->update($specificTable, $data, $where, $dataToWhere);
    }

    /**
     * Delete row in datasae
     * @param type $where
     * @param type $dataToWhere
     * @param type $specificTable
     */
    protected function delete($where, $dataToWhere = [], $specificTable = null) {
        if ($specificTable === null) {
            $specificTable = $this->nameTable();
        }
        self::$conn->delete($specificTable, $where, $dataToWhere);
    }

    /**
     * 
     * Save data to table
     *
     * @param type $data
     * @param type $primaryKey
     * @param type $specificTable
     */
    protected function save($data = [], $primaryKey = 'id', $specificTable = null) {
        if ($specificTable === null) {
            $specificTable = $this->nameTable();
        }
        self::$conn->save($specificTable, $data, $primaryKey);
    }

    /**
     * Count rows in one table 
     * @param type $where
     * @param type $dataToWhere
     * @param type $specificTable
     * @return type
     */
    protected function count($where = null, $dataToWhere = [], $specificTable = null) {
        if ($specificTable === null) {
            $specificTable = $this->nameTable();
        }
        return self::$conn->count($specificTable, $where, $dataToWhere);
    }

    /**
     * Get Database Query Builder
     * @param type $statement
     * @param type $specificTable
     * @return type
     */
    protected function select($statement = '*', $specificTable = null) {
        if ($specificTable === null) {
            $specificTable = $this->nameTable();
        }
        return self::$conn->select($statement)->from($specificTable);
    }

    /**
     * Execute an SQL statement and return the number of affected rows
     * @param type $statement
     * @return type
     */
    protected function exec($statement) {

        return self::$conn->exec($statement);
    }

    /**
     * Prepare & execute query with params
     * 
     * @param type $sql
     * @return type
     */
    protected function execQuery($sql) {
        return self::$conn->execQueryString($sql);
    }

}
