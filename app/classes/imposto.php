<?php
 
class Imposto {
 
		private $imposto_nome; 	// imposto_nome char
    private $imposto_regra; 	// imposto_regra char
    private $tipo_calculo; 					// tipo_calculo  char
		private $valor; 				// valor  int
		

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

	public function getDeducao($dinheiro) {
		$impostoTipo_calculo  = $this->getTipo_calculo();
		$impostoValor = $this->getValor();
		switch ($impostoTipo_calculo) {
			case 'percentual':
			$result = $dinheiro / 100 * $impostoValor;
			return (float) number_format($result, 3, '.', '');
				break;

			case 'fixo':
			$result = $dinheiro - ($dinheiro - $impostoValor);
			return (float) number_format($result, 3, '.', '');
				break;

			default:
			return NULL;
		}
	}

	public function getRestante($dinheiro) {
		$impostoTipo_calculo  = $this->getTipo_calculo();
		$impostoValor = $this->getValor();
		$_imposto = $this->getDeducao($dinheiro);
		return (float) $dinheiro - $_imposto;
	}




}
