<?php

class Users_controller extends restful {
	
	protected function get($data) {
		$user = new User();		
		$users = $user->findAll();
		if ($user->isNew()) {
			$this->response("No existen usuarios", 404);
		} else {
			$this->response($users, 200);
		}
    }
	
	
	// Por el momento yo lo tengo así :Pecesama
	/*
	protected function post($data) {
		$this->response("No implementado", 405);
    }

    protected function put($data) {
		$this->response("No implementado", 405);
    }

    protected function delete($data) {
        $this->response("No implementado", 405);
    }*/


	// Nota de Pecesama
	// Lo que sigue aquí abajo no lo he probado
	// le cambié a la variable $data para que corresponda a la clase abstracta
    protected function post($data) {

        // Prepare response 
        $response = $this->data;
        $response['errors'] = array();

        // Attach user data
        $user = new User();
        $user->prepareFromArray($this->data);

        if ($user->save()) {
            # Do something
        } else {
            # Do something else
        }

        echo json_encode($response);
    }

    protected function put($data) {

        // Prepare response 
        $response = $this->data;
        $response['errors'] = array();

        // Find and attach user data
        $user = new User();
        $user->find($id);
        $user->prepareFromArray($this->data);

        if ($user->save()) {
            # Do something
        } else {
            # Do something else
        }

        echo json_encode($response);
    }

    protected function delete($data) {

        // Prepare response 
        $response['result'] = false;
        $response['errors'] = array();

        // find user
        $user = new User();
        if ($user->find($id)) {
            $response['result'] = $user->delete();
        } else {
            # Do something else
        }

        echo json_encode($response);
    }
}
?>