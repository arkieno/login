<?php
 
namespace App\Controllers;
 
use App\Controllers\BaseController;
use App\Models\UserModel;
 
class Dashboard extends BaseController
{
    public function index()
    {
        $session = session();

        if ($session->has('user_data')) {
            $userData = $session->get('user_data');

            if (isset($userData['UserID'])) {
                $userID = $userData['UserID'];

                $userModel = new UserModel();
                $user = $userModel->find($userID);

                if($user) {
                    $data['users'] = [$user];
                    // return $this->response->setJSON($data);
                    return view ('/dashboards', $data);
                }else{
                    return view ('error',['error' => 'user not found']);
                }
            }else{
                return view ('error',['error' => 'userID not found in sessiondata']);
            }
        }else{
            return view ('error',['error' => 'userdata not found in sessiondata']);
        }

        
    }

    public function dashboards()
    {
        return view('dashboard');
    }
}