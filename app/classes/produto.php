<?php
 
class Produto {
 
    private $cod_produto;   //cod_produto int
    private $nome;          //nome char
    private $status;        //status char
    private $estoque;       //estoque int
    private $tipo;          //tipo  char    

    public function __construct () {

    }
    public function setAllInLine (
        $cod_produto, $nome, $status, $estoque, $tipo
    )
    {
        $this->cod_produto = $cod_produto;
        $this->nome = $nome;
        $this->status = $status;
        $this->estoque = $estoque;
        $this->tipo = $tipo;
    }

	public function getCod_produto() {
		return $this->cod_produto;
	}

	public function setCod_produto($cod_produto) {
		$this->cod_produto = $cod_produto;
	}

	public function getNome() {
		return $this->nome;
	}

	public function setNome($nome) {
		$this->nome = $nome;
	}

	public function getStatus() {
		return $this->status;
	}

	public function setStatus($status) {
		$this->status = $status;
	}

	public function getEstoque() {
		return $this->estoque;
	}

	public function setEstoque($estoque) {
		$this->estoque = $estoque;
	}

	public function getTipo() {
		return $this->tipo;
	}

	public function setTipo($tipo) {
		$this->tipo = $tipo;
    }
        
 
}
