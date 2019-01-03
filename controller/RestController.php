<?php

abstract class RestController
{
    protected $method = null;
    protected $param = null;
    protected $methodOk = ['PUT','GET','DELETE','POST'];


    public function __construct($param=null)
    {

        if($param){
            $this->param = $param;
        }

        $this->setMethod($_SERVER['REQUEST_METHOD']);

        $this->executeMethod();

    }

    public function executeMethod(){
        echo json_encode($this->method);
        if($this->method){
            switch ($this->method){
                case 'PUT':
                    $this->executePut();
                    break;
                case 'GET':
                    $this->executeGet();
                    break;
                case 'POST':
                    $this->executePost();
                    break;
                case 'DELETE':
                    $this->executeDel();
                    break;
                default:
                    break;
            }
        }
    }

    public function executePut(){}
    public function executeGet(){}
    public function executePost(){}
    public function executeDel(){}


    public function setMethod($method){
        if(in_array($method,$this->methodOk)){
            $this->method = $method;
        }
    }

    public function getPostVar(){
        parse_str(file_get_contents("php://input"),$post_vars);
        return $post_vars;
    }



}