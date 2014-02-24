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
    
    /**
     * Nome del file fdf da generare
     * @var type string
     */
    private $fdfFileName;
    
    /**
     * Nome del file pdf contenente i campi modulo
     * @var type string
     */
    private $pdfFileName;
    
    
    public function __construct($s_fdfFilePath,$s_fdfFileName,$s_pdfFilePath,$s_pdfFileName) {
        $this->fdfFilePath = $s_fdfFilePath;
        $this->fdfFileName = $s_fdfFileName;
        
        $this->pdfFilePath = $s_pdfFilePath;
        $this->pdfFileName = $s_pdfFileName;
    }
    
    public function setFdfFilePath($s_fdfFilePath){
        $this->fdfFilePath = $s_fdfFilePath;
    }
    
    public function setPdfFilePath($s_pdfFilePath){
        $this->pdfFilePath = $s_pdfFilePath;
    }
    
    public function setFdfFileName($s_fdfFileName){
        $this->fdfFileName = $s_fdfFileName;
    }
    
    public function setPdfFileName($s_pdfFileName){
        $this->pdfFileName = $s_pdfFileName;
    }
    
    public function test(){
        return 'sono nella funzione test di FdfService. Leggo pdf in '.$this->pdfFilePath.$this->pdfFileName.' scrivo fdf in '.$this->fdfFilePath.$this->fdfFileName;
    }
    
    public function getFdf($as_values){
        $this->createXfdf($this->pdfFilePath.$this->pdfFileName, $as_values);
    }
    
    public function createFdf($as_values){
        $s_fdf = $this->createXfdf($this->pdfFilePath.$this->pdfFileName, $as_values);
        $this->writeFile($this->fdfFilePath.$this->fdfFileName, $s_fdf);
    }
    
    /**
     * Dato un array associativo genera un file fdf
     * @param type $file nome del file contentente i campi modulo a cui si riferisce l'fdf
     * @param type $as_values array associativo con chiavi e valori da inserire nei campi modulo
     * @param type $enc encoding del file
     * @return string contenuto del file fdf
     */
    private function createXfdf( $file, $as_values, $enc='UTF-8' )
    {
        $data = '<?xml version="1.0" encoding="'.$enc.'"?>' . "\n" .
            '<xfdf xmlns="http://ns.adobe.com/xfdf/" xml:space="preserve">' . "\n" .
            '<fields>' . "\n";
        foreach( $as_values as $field => $val )
        {
            $data .= '<field name="' . $field . '">' . "\n";
            if( is_array( $val ) )
            {
                foreach( $val as $opt )
                    $data .= '<value>' .
                        htmlentities( $opt, ENT_COMPAT, $enc ) .
                        '</value>' . "\n";
            }
            else
            {
                $data .= '<value>' .
                    htmlentities( $val, ENT_COMPAT, $enc ) .
                    '</value>' . "\n";
            }
            $data .= '</field>' . "\n";
        }
        $data .= '</fields>' . "\n" .
            '<ids original="' . md5( $file ) . '" modified="' .
                time() . '" />' . "\n" .
            '<f href="' . $file . '" />' . "\n" .
            '</xfdf>' . "\n";
        return $data;
    }
    
    /**
     * Data un path e una stringa scrive la stringa sul file
     * @param type $s_filePath
     * @param type $values
     */
    private function writeFile($s_filePath,$values){
        // @fixme Cosa fare in caso di errore di apertura del file?
        $handle = fopen($s_filePath,'w+');
        if (fwrite($handle, $values) === FALSE) {
            // @fixme Cosa fare in caso di errore di scrittura del file?
            die('Impossibile scrivere sul file ('.$s_filePath.')');
        }
        fclose($handle);
    }

}