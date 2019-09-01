<?php
 
class Imposto {
 
		public $imposto_nome; 	// imposto_nome char
    public $imposto_regra; 	// imposto_regra char
    public $tipo_calculo; 					// tipo_calculo  char
		public $valor; 				// valor  int
		

    public function __construct () {

    }
    public function setAllInLine (
        $imposto_nome, $imposto_regra, $tipo_calculo, $valor
    )
    {
        $this->imposto_regra = $imposto_regra;
        $this->imposto_nome = $imposto_nome;
        $this->tipo_calculo = $tipo_calculo;
        $this->valor = $valor;
    }

	public function getImposto_regra() {
		return $this->imposto_regra;
	}

	public function setImposto_regra($imposto_regra) {
		$this->imposto_regra = $imposto_regra;
	}

	public function getImposto_nome() {
		return $this->imposto_nome;
	}

	public function setImposto_nome($imposto_nome) {
		$this->imposto_nome = $imposto_nome;
	}

	public function getTipo_calculo() {
		return $this->tipo_calculo;
	}

	public function setTipo_calculo($tipo_calculo) {
		$this->tipo_calculo = $tipo_calculo;
	}

	public function getValor() {
		return $this->valor;
	}

	public function setValor($valor) {
		$this->valor = $valor;
	}


}
