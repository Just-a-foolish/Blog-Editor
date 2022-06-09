<?php

class ImageHandler{

    public function copy($file, $destPath){
        if (!isset($_FILES["file"])) {
            return ['error' => "Não existe arquivo para ser salvo."];
        }

        $newFilepath = $destPath . "/" . $file['name'] . ".png";

        if (!copy($file['tmp_name'], $newFilepath)) {
            return ['error' => "Não foi possível salvar a imagem."];
        }
        unlink($file['tmp_name']);
    }

}
?>