<?php

namespace App\Controllers;

class Carousel extends BaseController
{

    public function uploadImages($id){
        
        $service = $this->serviceModel->asObject()->find($id);

        if (!empty($service)) {

            $data = [
                'title' => "Ajout d'images du service",
                'validation' => null,
                'service' => $service
            ];
            $path = './public/assets/es_admin/images/carousels';

            if ($this->request->getMethod() == 'post') {            
             
                if ($imagefile = $this->request->getFiles()) {

                    foreach ($imagefile['pictures'] as $img) {

                        if ($img->isValid() && ! $img->hasMoved()) {

                            $newName = $img->getRandomName();

                            $data = [
                                'pictures' => $newName,
                                'service_id' => $id,
                                'created_at' => date('Y-m-d'),
                                'updated_at' => date('Y-m-d'),
                            ];
                            
                            if($this->carouselModel->save($data)) {
                                $img->move($path, $newName);
                            }
                        }
                    }
                    return redirect()->to('service-carousels/'.$id)->with("success", "Ajojutée(s) avec succès !");
                }else {
                    return redirect()->to('/list-services')->with("error", "Une erreur est survenue !");
                }                
            }
            echo view('carousel/admin/image', $data);

        } else {
            return redirect()->back();
        }
    }


    function delete($id)
    {
        $carousel = $this->carouselModel->asObject()->find($id);
        $service = $carousel->service_id;

        if(!empty($carousel)){
            $file = $carousel->pictures;
            $path = './public/assets/es_admin/images/carousels';    
            
            if(file_exists($path .'/'. $file)){
                unlink($path .'/'. $file);
            }
            $this->carouselModel->where('car_id',$id)->delete();

            return redirect()->to('service-carousels/'.$service)->with("success", "Image supprimée avec succès");
        }
        else {
            return redirect()->back()->with("error", "Une erreur s'est produite lors de la suppression");
        }
    }
    
}
