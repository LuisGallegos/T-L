<?php

include '../models/transportModel.php';
$transportPresenter = new transportPresenter();

$request = filter_input(INPUT_POST, "request", FILTER_SANITIZE_STRING);
$params = filter_input(INPUT_POST, "params");

$transportPresenter->$request($params);

class transportPresenter{
  private $transportModel;

  function __construct(){
    $this->transportModel = new transportModel();
  }

  function getTransports(){
	   echo $this->transportModel->getTransports();
  }

  function getLines(){
	   echo $this->transportModel->getLines();
  }

  function getTypes(){
	   echo $this->transportModel->getTypes();
  }

  function gerResposables(){
	   echo $this->transportModel->gerResposables();
  }

  public function setTransportStart($id){
    echo $this->transportModel->setTransportStart($id);
  }

  public function setTransportEnd($id){
    echo $this->transportModel->setTransportEnd($id);
  }

  public function insertTrasport($params){
    echo $this->transportModel->insertTrasport($params);
  }

  public function getReport1($line){
    echo $this->transportModel->getReport1($line);
  }

  public function getReport2($startDate){
    echo $this->transportModel->getReport2($startDate);
  }

}

?>
