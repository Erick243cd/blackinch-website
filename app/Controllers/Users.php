<?php

namespace App\Controllers;

use App\Libraries\Hash;

class Users extends BaseController
{
    public function index()
    {
        $data = [
            'user_data' => session()->get('user_data'),
            'title' => 'Les Utilisateurs |' . altData(),
            'users' => $this->userModel->asObject()->findUserByID(null)
        ];
        return view('users/admin/index', $data);
    }

    public function create()
    {
        $data = [];
        $data['validation'] = null;
        if ($this->request->getMethod() == 'post') {
            $this->validation->setRules([
                'firstname' => [
                    'label' => 'Prénom', 'rules' => 'required',
                    'errors' => [
                        'required' => 'Complétez ce champ',
                    ]
                ],
                'lastname' => [
                    'label' => 'Nom', 'rules' => 'required',
                    'errors' => [
                        'required' => 'Complétez ce champ',
                    ]
                ],
                'email' => [
                    'label' => 'Email',
                    'rules' => 'required|valid_email|is_unique[users.u_email]',
                    'errors' => [
                        'required' => 'Complétez ce champ',
                        'is_unique' => 'Cette adresse mail est déjà utilisée.'
                    ]
                ],
                'phone' => [
                    'label' => 'Téléphone', 'rules' => 'required',
                    'errors' => [
                        'required' => 'Complétez ce champ',
                    ]
                ],
                'role' => [
                    'label' => 'User role', 'rules' => 'required',
                    'errors' => [
                        'required' => 'Complétez ce champ',
                    ]
                ]
            ]);

            if ($this->validation->withRequest($this->request)->run()) {
                $data = array(
                    'u_firstname' => $this->request->getVar('firstname'),
                    'u_lastname' => $this->request->getVar('lastname'),
                    'u_email' => $this->request->getVar('email'),
                    'phone' => $this->request->getVar('phone'),
                    'u_role' => $this->request->getVar('role'),
                    'u_picture' => 'user-default-avatar.png',
                    'created_at' => date("Y-m-d"),
                    'u_password' => Hash::make("@12345"),
                    'status' => 'active'
                );
                $this->userModel->insert($data);
                //$this->sendMailforSignup($data['u_email'], $data['u_firstname']);
                $session = session();
                $session->setFlashData("success", "Utilisateur créé avec succès !");
                return redirect()->to('/list-users');

            } else {
                $data['validation'] = $this->validation->getErrors();
            }
        }
        $data['roles'] = $this->roleModel->asObject()->orderBy('role_type', 'desc')->findAll();
        echo view('users/admin/create', $data);
    }

    function sendMailforSignup($to, $name)
    {
        $subject = "Inscription sur " . altData();
        $content = "Nous vous envoyons ce mail pour vous confirmer de votre inscription sur notre site <br>
                    Le mot de passe par défaut est @123456, connectez-vous pour le modifier";
        $this->email->setFrom('support@rcl-tv.net', altData());
        $this->email->setTo($to);
        $this->email->setSubject($subject);
        $this->email->setMessage($this->mailContent($name, $content));
        if ($this->email->send()) {
            return true;
        } else {
            return true;
        }
    }

    function mailContent($name, $content)
    {
        $data = [
            'user' => $name,
            'content' => $content
        ];
        return view('mails/registration_mail', $data);
    }

    /*
     * Updates User Info and Add Organisations info
     */


    function addImage()
    {
        if (!is_logged()) return redirect()->to('/login');

        $session_data = session()->get('user_data');
        $data[] = null;
        $user_id = $session_data['u_id'];

        $data['user'] = $this->userModel->findUserByID($user_id);

        if (!empty($data['user'])) {

            echo view('users/admin/image', $data);

        } else {
            return redirect()->back();
        }
    }

    function saveImage()
    {
        if (!is_logged()) return redirect()->to('/login');


        $user = session()->get('user_data');
        $data['user'] = $user;
        if ($this->request->getMethod() == 'post') {
            $rules = [
                'picture' =>
                    [
                        'label' => 'Image',
                        'rules' => 'uploaded[picture]|max_size[picture, 4096]|is_image[picture]'
                    ]
            ];
            if ($this->validate($rules)) {

                $path = './public/assets/es_admin/images/tmp';
                $path_user = './public/assets/es_admin/images/user';

                $file = $this->request->getFile('picture');
                $imageName = $file->getRandomName();

                if ($file->isValid() && !$file->hasMoved()) {
                    $file->move($path, $imageName);

                    // resizing image
                    \Config\Services::image()->withFile($path . '/' . $imageName)
                        ->fit(80, 80, 'center')
                        ->save($path_user . '/' . $imageName);

                    $data = ['u_picture' => $imageName];

                    $id = $user['u_id'];
                    $this->userModel->update($id, $data);

                    $data["sess_data"] = $this->userModel->findUserByID($id);

                    session()->set('user_data', $data["sess_data"]);
                    return redirect()->to('/profile');
                }
            } else {
                $data['validation'] = $this->validation->getErrors();
            }
        }
        echo view('users/admin/image', $data);
    }

    function deleteUser($id)
    {
        $user_data = session()->get('user_data');
        $user = $this->userModel->findUserByID($id);
        if (!empty($user)) {
            $this->userModel->where('u_id', $id)->delete();
            $session = session();
            $session->setFlashData("success", "Utilisateur supprimé avec succès");
            return redirect()->to('list-users');
        }
    }

    function active($u_id)
    {
        $data = $this->userModel->findUserByID($u_id);
        $id = $data['u_id'];
        if (!empty($data)) {
            if ($data['status'] == 'desabled') {
                $data['status'] = 'active';
            } elseif ($data['status'] == 'active') {
                $data['status'] = 'desabled';
            } else {
                return redirect()->back();
            }
            $this->userModel->update($id, $data);
        } else {
            return redirect()->back();
        }
        return redirect()->to('list-users');
    }
}
