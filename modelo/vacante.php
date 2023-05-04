<?php
class Vacante{
  

    public function readXML(){
        $objXmlDocument = simplexml_load_file('https://people-pro.com/xml-feed/indeed', 'SimpleXMLElement', LIBXML_NOCDATA);
        if ($objXmlDocument === FALSE) {
            echo "There were errors parsing the XML file.\n";
            foreach(libxml_get_errors() as $error) {
                echo $error->message;
            }
            exit;
        }
        $objJsonDocument = json_encode($objXmlDocument);
        $arrOutput = json_decode($objJsonDocument,true);

        return $arrOutput;
    }

    public function getVacantes(){
        $arrOutput=self::readXML();
        
        $info='';
        foreach($arrOutput['job'] as $vacante){
            $info.='<div class="card text-center mt-3">
            <div class="card-header">
              '.$vacante['title'].'
            </div>
            <div class="card-body">
              <h5 class="card-title">'.$vacante['company'].'</h5>
              <p class="card-text">Lugar: '.$vacante['city'].','.$vacante['state'].','.$vacante['country'].'</p>
              <button class="btn btn-primary" onclick="getDetalle('.$vacante['referencenumber'].')">Ver Detalles</button>
            </div>
            <div class="card-footer text-muted">
            Fecha Publicacion: '.$vacante['date'].'
            </div>
          </div>';
        }
        return $info;
    }

    public function getDetalle($referencenumber){
        $arrOutput=self::readXML();
        
        $info='';
        foreach($arrOutput['job'] as $vacante){
            if($referencenumber==$vacante['referencenumber']){
                $info.='<div class="card text-center mt-3">
                <div class="card-header">
                 Descripcion de <b>'.$vacante['title'].'</b>
                </div>
                <div class="card-body">
                 
                  <p class="card-text">'.$vacante['description'].'</p>
                  
                </div>
               
              </div>';
            }
            
        }
       
        return json_encode($info);
    }

   

    
}