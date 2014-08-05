<?php
/**
* Users Restful resource
*/
class Users_controller extends RestfulController    
{
    
    protected function get($id){
        $user = new User();
        $users = $user->findAll();
        echo json_encode($users);
    }

    protected function post($id){

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

    protected function put($id){

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

    protected function delete($id){

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