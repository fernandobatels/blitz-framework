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
     * Insert row data in database
     * @param type $data
     * @param type $specificTable
     */
    protected function insertAux($table, $data = []) {

        try {
            self::$conn->insert($table, $data);

            return true;
        } catch (\Exception $e) {
            error_log($e);
        }
        
        return false;

    }

    /**
     * update row in database
     * @param type $data
     * @param type $where
     * @param type $dataToWhere
     * @param type $specificTable
     */
    protected function updateAux($table, $data = [], $where = null, $dataToWhere = []) {


        try {
            self::$conn->update($table, $data, $where, $dataToWhere);

            return true;
        } catch (\Exception $e) {
            error_log($e);
        }
        
        return false;
    }

    /**
     * Delete row in datasae
     * @param type $where
     * @param type $dataToWhere
     * @param type $specificTable
     */
    protected function deleteAux($table, $where, $dataToWhere = []) {

        try {
            self::$conn->delete($table, $where, $dataToWhere);

            return true;
        } catch (\Exception $e) {
            error_log($e);
        }
        
        return false;
    }

    /**
     * 
     * Save data to table
     *
     * @param type $data
     * @param type $primaryKey
     * @param type $specificTable
     */
    protected function saveAux($table, $data = [], $primaryKey = 'id') {

        try {
            self::$conn->save($table, $data, $primaryKey);

            return true;
        } catch (\Exception $e) {
            error_log($e);
        }
        
        return false;
        if ($specificTable === null) {
            $specificTable = $this->nameTable();
        }
        self::$conn->save($specificTable, $data, $primaryKey);
    }

    /**
     * Provide access to connecton object
     */
    protected function getConn() {
        return self::$conn;
    }

}
