<?php
/**
* Abstract class of Restful Api resource
*/
abstract class RestfulController extends AppController
{
    
    public function index($id = null){
        $httpMethod = $_SERVER['REQUEST_METHOD'];
        switch ($httpMethod) {
            case 'GET':
                $this->get($id);
                break;
            case 'POST':
                $this->post($id);
            break;
            case 'PUT':
                parse_str(file_get_contents("php://input"), $this->data); // Accesing incoming put data
                $this->put($id);
            break;
            case 'DELETE':
                $this->delete($id);
            break;
        }
    }

    protected function get($id);
    protected function post($id);
    protected function put($id);
    protected function delete($id);
}
?>