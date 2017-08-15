<?php
require('queries.php');
include('../lib/sharedFunctions.php');  //// THIS FILES CONTAINTS executeQuery and startTransaction and endTransaction functions

class transportModel {

  public function getTransports(){
    global $SELECT_TRANSPORT;
    return executeQuery($SELECT_TRANSPORT);
  }

  public function getLines(){
    global $SELECT_LINES;
    return executeQuery($SELECT_LINES);
  }

  public function getTypes(){
    global $SELECT_TYPES;
    return executeQuery($SELECT_TYPES);
  }

  public function gerResposables(){
    global $SELECT_RESPONSABLES;
    return executeQuery($SELECT_RESPONSABLES);
  }

  public function setTransportStart($id){
    global $UPDATE_START_TRANSPORT;
    startTransaction();
    executeQuery($UPDATE_START_TRANSPORT,$id);
    return json_encode(endTransaction());
  }

  public function setTransportEnd($id){
    global $UPDATE_END_TRANSPORT;
    startTransaction();
    executeQuery($UPDATE_END_TRANSPORT,$id);
    return json_encode(endTransaction());
  }

  public function insertTrasport($params){
    global $INSERT_TRANSPORT;
    startTransaction();
    executeQuery($INSERT_TRANSPORT,json_decode($params,true));
    return json_encode(endTransaction());
  }

  public function getReport1($line){
    global $SELECT_REPORT1;
    return executeQuery($SELECT_REPORT1,$line);
  }

  public function getReport2($line){
    global $SELECT_REPORT2;
    return executeQuery($SELECT_REPORT2,$line);
  }

}

?>
