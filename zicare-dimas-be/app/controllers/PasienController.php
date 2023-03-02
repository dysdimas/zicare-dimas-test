<?php
use Phalcon\Http\Response;
use Phalcon\Mvc\Controller;

class PasienController extends \Phalcon\Mvc\Controller
{

    //Cors setup
    public function setJsonResponse($x)
    {
        $response = new Response();
        $response->setHeader('Access-Control-Allow-Origin', '*');
        $response->setHeader('Access-Control-Allow-Methods', 'GET, PUT, PATCH, DELETE, OPTIONS, HEAD');
        $response->setHeader('Access-Control-Allow-Credentials', 'true');
        $response->setHeader('Access-Control-Allow-Headers', 'origin, x-requested-with, content-type');
        $response->setHeader('Access-Control-Max-Age', '86400');
        $response->setJsonContent($x);
        return $response;
    }

    //List Data Pasien
    public function listAction()
    {
        $pasien = Pasien::find();

        $response = $this->setJsonResponse([
            'status' => [
                'code' => 200,
                'response' => 'success',
                'message' => 'success list pasien',
            ],
            'result' => $pasien,
        ]);

        return $response;
    }

    //Detail Data Pasien
    public function detailAction($id)
    {
        $pasien = Pasien::find($id);
        $response = $this->setJsonResponse(
            [
                'status' => [
                    'code' => 200,
                    'response' => 'success',
                    'message' => 'success detail pasien',
                ],
                'result' => $pasien,
            ]
        );

        return $response;
    }

    //Add Pasien
    public function createAction()
    {
        $pasien = new Pasien();

        $pasien->name = $this->request->getPost('name');
        $pasien->sex = $this->request->getPost('sex');
        $pasien->religion = $this->request->getPost('religion');
        $pasien->phone = $this->request->getPost('phone');
        $pasien->address = $this->request->getPost('address');
        $pasien->nik = $this->request->getPost('nik');

        if (!$pasien->save()) {
            $response = $this->setJsonResponse(
                [
                    'status' => [
                        'code' => 200,
                        'response' => 'warning',
                        'message' => 'failed add pasien',
                    ],
                    'result' => '',
                ]
            );
        }

        return $this->setJsonResponse(
            [
                'status' => [
                    'code' => 201,
                    'response' => 'success',
                    'message' => 'success add pasien',
                ],
                'result' => '',
            ]
        );
    }

    //Update Pasien
    public function updateAction($id)
    {
        $pasien = Pasien::findFirst($id);
        $pasien->name = $this->request->getPut('name');
        $pasien->sex = $this->request->getPut('sex');
        $pasien->religion = $this->request->getPut('religion');
        $pasien->phone = $this->request->getPut('phone');
        $pasien->address = $this->request->getPut('address');
        $pasien->nik = $this->request->getPut('nik');
        if (!$pasien->save()) {
            $response = $this->setJsonResponse(
                [
                    'status' => [
                        'code' => 200,
                        'response' => 'warning',
                        'message' => 'failed update pasien',
                    ],
                    'result' => '',
                ]
            );
            return $response;
        }

        $response = $this->setJsonResponse(
            [
                'status' => [
                    'code' => 200,
                    'response' => 'success',
                    'message' => 'success update pasien',
                ],
                'result' => '',
            ]
        );

        return $response;
    }

    //Delete Pasien
    public function deleteAction($id)
    {
        $pasien = Pasien::findFirst($id);
        if (!$pasien->delete()) {
            return $this->setJsonResponse(
                [
                    'status' => [
                        'code' => 200,
                        'response' => 'warning',
                        'message' => 'failed delete pasien',
                    ],
                    'result' => '',
                ]
            );
        }

        return $this->setJsonResponse(
            [
                'status' => [
                    'code' => 200,
                    'response' => 'success',
                    'message' => 'success delete pasien',
                ],
                'result' => '',
            ]
        );
    }
}
