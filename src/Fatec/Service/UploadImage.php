<?php
require_once __DIR__ . "/../../../libs/wideImage/WideImage.php";

abstract class UploadImage
{
    public static function imagePrincipal($name,$tempName,$dir = '')
    {
        /*
        300 X 200 PAGINA PRINCIPAL
        200 X 100 ADMINISTRATIVO
        */
        $upDir = __DIR__ . '/../../../img/noticia/' . $dir . '/';
        if (!file_exists($upDir)){
            mkdir($upDir,0777);
        }
        $upDirThumb = __DIR__ . '/../../../img/noticia/' . $dir . '/thumb/';
        if (!file_exists($upDirThumb)){
            mkdir($upDirThumb,0777);
        }
        //exit($tempName);
        try {
            $fotos = WideImage::load($tempName);
            // FOTO PARA PAGINA INICIAL
            //$redimensionar = $fotos->resize(300, 200, "fill");
            $upDir = __DIR__ . '/../../../img/noticia/' . $dir . '/' . $name;
            $upDirThumb = __DIR__ . '/../../../img/noticia/' . $dir . '/thumb/' . $name;
            $fotos->saveToFile($upDir);
            if ($fotos->isValid()){
                //$redimensionar = $fotos->resize(180, 130, "fill");
                $redimensionar = $fotos->resize(300, 200, "fill");
                $redimensionar->saveToFile($upDirThumb);
                if ($redimensionar->isValid()) {
                    return [
                        'img' => "img/noticia/" . $dir . "/" . $name,
                        'thumb' => "img/noticia/" . $dir . "/thumb/" . $name
                    ];
                }else{
                    return false;
                }
            }else{
                return false;
            }
         } catch (WideImage_InvalidImageSourceException $e) {
            echo "Erro ao redimensionar" . $e->getMessage();
        }

    }

}