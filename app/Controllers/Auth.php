<?php

namespace App\Controllers;

use App\Libraries\Hash;

class Auth extends BaseController
{
    public function index()
    {
        $data = [];
        $data['validation'] = null;
        if ($this->request->getMethod() == 'post') {

            $this->validation->setRules([
                'u_email' => [
                    'label' => 'Email',
                    'rules' => 'required|valid_email|is_not_unique[users.u_email]',
                    'errors' => [
                        'required' => 'Complétez ce champ',
                        'valid_email' => "Cette adresse mail n'est pas valide",
                        'is_not_unique' => "Cet utilisateur n'existe pas dans le système",
                    ]
                ],
                'u_password' => [
                    'label' => 'Password',
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Complétez ce champ',
                    ]
                ],
            ]);

            if ($this->validation->withRequest($this->request)->run()) {
                $session = session();
                $data["sess_data"] = $this->userModel->findUserByEmail($this->request->getVar("u_email"));

                if (!empty($data["sess_data"])) {
                    if (password_verify($this->request->getVar('u_password'), $data["sess_data"]["u_password"])) {
                        $session->set('user_data', $data["sess_data"]);
                        return redirect()->to('/dashboard');
                    } else {
                        $session->setFlashdata('error', "Mot de passe incorrect", 5);
                    }
                }

            } else {
                $data['validation'] = $this->validation->getErrors();
            }
        }
        $data['title'] = altData();
        echo view('pages/login', $data);
    }

    function profile()
    {
        $user_data = session()->get('user_data');
        $data = [
            'user_data' => $user_data,
            'title' => 'Profile',
        ];
        echo view('users/admin/profile', $data);
    }

    function logout()
    {
        if (session()->has('user_data')) {
            session()->remove('user_data');
            return redirect()->to(site_url());
        } else {
            return redirect()->to('/');
        }
    }

    function change()
    {
        $user_data = session()->get('user_data');

        $data = [
            'title' => "Changement de mot de passe",
            'user_data' => $user_data,
            'u_password' => $user_data['u_password'],
            'validation' => null
        ];

        if ($this->request->getMethod() == 'post') {

            $this->validation->setRules([
                'current_password' => [
                    'label' => 'Mot de passe actuel',
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Ne peut pas être vide',
                    ]
                ],
                'new_password' => [
                    'label' => 'Nouveau mot de passe',
                    'rules' => 'required|min_length[6]',
                    'errors' => [
                        'required' => 'Ne peut pas être vide',
                        'min_length' => 'Pas moins de 6 caractères'
                    ]
                ],
                'conf_new_password' => [
                    'label' => 'Confirmation',
                    'rules' => 'required|matches[new_password]',
                    'errors' => [
                        'required' => 'Ne peut pas être vide',
                        'matches' => 'Les deux mots de passe ne correspondent pas'
                    ]
                ],
            ]);
            if ($this->validation->withRequest($this->request)->run()) {
                $curr_password = $this->request->getVar("current_password");

                if (password_verify($curr_password, $data['u_password'])) {

                    $data = array(
                        'u_password' => Hash::make($this->request->getVar('new_password'))
                    );

                    $this->userModel->update($user_data['u_id'], $data);

                    $newUserData = $this->userModel->where('u_id', $user_data['u_id'])->first();
                    session()->set('user_data', $newUserData);

                    session()->setFlashData("success", "Mot de passe changé avec succès !");
                    return redirect()->to('/profile');
                } else {
                    session()->setFlashData("error", "L'ancien mot de passe entré n'est pas correct !");
                }
            } else {
                $data['validation'] = $this->validation->getErrors();
                return view('pages/change', $data);
            }
        }
        return view('pages/change', $data);
    }

    function updateOneSelf()
    {
        $session_data = session()->get('user_data');
        if (!empty($session_data)) {
            if ($this->request->getMethod() == 'post') {
                $id = $session_data['u_id'];
                $data = $_POST;
                if (!empty($data)) {
                    $this->userModel->update($id, $data);
                    $data["sess_data"] = $this->userModel->findUserByID($id);
                    session()->set('user_data', $data["sess_data"]);
                    return redirect()->to("/profile");
                }
            }
        } else {
            return redirect()->to("/logout");
        }
    }

    public function contact()
    {
        $data = [
            'page' => $page = 'contact',
            'title' => 'Contactez-nous | ' . altData(),
            'posts' => $this->postModel->asObject()->findAll(3),
            'contacts' => $this->coordModel->asObject()->first(),
            'user_data' => session()->get('user_data')
        ];
        echo view('pages/contact', $data);
    }

    public function about()
    {
        $data = [
            'page' => 'about',
            'title' => 'A Propos de nous | ' . altData(),
            'posts' => $this->postModel->asObject()->findAll(3),
            'contacts' => $this->coordModel->asObject()->first(),
            'user_data' => session()->get('user_data')
        ];
        echo view('pages/about', $data);
    }
}
