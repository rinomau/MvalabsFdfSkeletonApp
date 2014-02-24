<?php

namespace Fdf\Service;

class FdfService {
    
    /**
     * Directory dove scrivere i files fdf generati
     * @var type string
     */
    private $fdfFilePath;
    
    /**
     * Directory dove si trovano i pdf con i campi modulo
     * @var type string
     */
    private $pdfFilePath;
    
    public function __construct($s_fdfFilePath,$s_pdfFilePath) {
        $this->fdfFilePath = $s_fdfFilePath;
        $this->pdfFilePath = $s_pdfFilePath;
    }
    
    public function setFdfFilePath($s_fdfFilePath){
        $this->fdfFilePath = $s_fdfFilePath;
    }
    
    public function setPdfFilePath($s_pdfFilePath){
        $this->pdfFilePath = $s_pdfFilePath;
    }
    
    public function test(){
        return 'sono nella funzione test di FdfService. Leggo pdf in '.$this->pdfFilePath.' scrivo fdf in '.$this->fdfFilePath;
    }
    
}