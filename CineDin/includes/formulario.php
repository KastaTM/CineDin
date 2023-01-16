<?php
abstract class Form
{

    private $formId;

    private $action;

    protected $opciones;

    public function __construct($formId, $opciones = array() )
    {
        $this->formId = $formId;

        $opcionesPorDefecto = array( 'action' => null, );
        $opciones = array_merge($opcionesPorDefecto, $opciones);

        $this->action = $opciones['action'];
        
        if ( !$this->action ) {
            $this->action = htmlentities($_SERVER["REQUEST_URI"]);
        }

    }
	
    public function gestiona()
    {   
        if ( ! $this->formularioEnviado($_POST) ) {
            return $this->generaFormulario();
        } else {
            
            $result = $this->procesaFormulario($_POST);
            if ( is_array($result) ) {
                return $this->generaFormulario($result, $_POST);
            } else {
                header('Location: ' .$result);
                exit();
            }
        }  
    }
	
	public function gestionaFormularioComentario($idPelicula, $idSerie){
		 if ( ! $this->formularioEnviadoComentario() ) {
            return $this->generaFormularioComentario();
        } else {
            $result = $this->procesaFormularioComment($idPelicula, $idSerie);
            if ( is_array($result) ) {
                return $this->generaFormularioComentario();
            } else {
                header('Location: ' .$result);
                exit();
            }
        }  
    }
	
	public function gestionaFormularioRespuesta($pregunta){
		 if ( ! $this->formularioEnviadoRespuesta() ) {
            return $this->generaFormularioRespuesta();
        } else {
            $result = $this->procesaFormularioRespuesta($pregunta);
            if ( is_array($result) ) {
                return $this->generaFormularioRespuesta();
            } else {
                header('Location: ' .$result);
                exit();
            }
        }  
    }
	
	
	public function gestionaFormularioApuntarseEvento($idEvento, $apuntado)
    {   
        if ( ! $this->formularioEnviadoApuntarseEvento() ) {
            return $this->generaFormularioApuntarseEvento($apuntado);
        } else {  
            $result = $this->procesaFormulario($idEvento);
            if ( is_array($result) ) {
                return $this->generaFormularioApuntarseEvento($apuntado);
            } else {
                header('Location: ' .$result);
                exit();
            }
        }  
    }
	
	public function gestionaFormularioFavorito($idPelicula,$idSerie, $apuntado)
    {   
        if ( ! $this->formularioEnviadoApuntarseEvento() ) {
            return $this->generaFormularioFavorito($apuntado);
        } else {  
            $result = $this->procesaFormularioFavorito($idPelicula,$idSerie);
            if ( is_array($result) ) {
                return $this->generaFormularioFavorito($apuntado);
            } else {
                header('Location: ' .$result);
                exit();
            }
        }  
    }
	
	public function gestionaFormularioApuntarseEvento2($idEvento, $apuntado){  
		if(!$apuntado){
			formularioApuntarseEvento::procesaFormulario($idEvento);
		}
		else{
			formularioDesapuntarseEvento::procesaFormulario($idEvento);
		}
		header('Location: vistaEventos.php?variable=' .$idEvento);
        exit();
    }

    protected static function generaCamposFormulario($datosIniciales)
    {
        return '';
    }

    protected function procesaFormulario($datos)
    {
        return array();
    }

    private function formularioEnviado(&$params)
    {
        return isset($params['action']) && $params['action'] == $this->formId;
    } 
	
	public function formularioEnviadoComentario(){
		if(isset($_POST['comentario'])){
			return true;
		}
		else{
			return false;
		}
    }
	
	public function formularioEnviadoRespuesta(){
		if(isset($_POST['comentario'])){
			
			return true;
		}
		else{
			
			return false;
		}
    }
	
	public function formularioEnviadoApuntarseEvento(){
		$c = $_POST['condi'] ?? "";
		if($c == 'ok'){
			return true;
		}else{
			return false;
		}
	}

    private function generaFormulario($errores = array(), &$datos = array())
    {
       
        $html= $this->generaListaErrores($errores);

        $html .= '<form method="POST" action="'.$this->action.'" id="'.$this->formId.'" enctype="multipart/form-data">';
        $html .= '<input type="hidden" name="action" value="'.$this->formId.'" />';
        
        $html .= $this->generaCamposFormulario($datos);
        $html .= '</form>';
       
        return $html;
    }
	
	public function generaFormularioComentario(){
		$datosIniciales = array();
        $html ='';
        $html .= '<form method="POST" id="'.$this->formId.'" enctype="multipart/form-data">';
        $html .= formularioSubirComentario::generaCamposFormulario($datosIniciales);
        $html .= '</form>';
        return $html;
    }
	
	public function generaFormularioRespuesta(){
		$datosIniciales = array();
        $html ='';
        $html .= '<form method="POST" id="'.$this->formId.'" enctype="multipart/form-data">';
        $html .= formularioSubirRespuesta::generaCamposFormulario($datosIniciales);
        $html .= '</form>';
        return $html;
    }
	
	public function generaFormularioApuntarseEvento($apuntado){
		$datosIniciales = array();
		$html ='';
		$html .= '<form method="POST" enctype="multipart/form-data">';
		if(!$apuntado){
			$html .= formularioApuntarseEvento::generaCamposFormulario($datosIniciales);
		}
		else{
			$html .= formularioDesapuntarseEvento::generaCamposFormulario($datosIniciales);
		}
		$html .= '</form>';
		return $html;		
	}
	
	public function generaFormularioFavorito($apuntado){
		$datosIniciales = array();
		$html ='';
		$html .= '<form method="POST" enctype="multipart/form-data">';
		if(!$apuntado){
			$html .= formularioAnadirFavorito::generaCamposFormulario($datosIniciales);
		}
		else{
			$html .= formularioEliminarFavorito::generaCamposFormulario($datosIniciales);
		}
		$html .= '</form>';
		return $html;		
	}

    private function generaListaErrores($errores)
    {
        $html='';
        $numErrores = count($errores);
        if (  $numErrores == 1 ) {
            $html .= "<ul><li>".$errores[0]."</li></ul>";
        } else if ( $numErrores > 1 ) {
            $html .= "<ul><li>";
            $html .= implode("</li><li>", $errores);
            $html .= "</li></ul>";
        }
        return $html;
    }
}