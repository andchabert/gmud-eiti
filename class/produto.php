<?php
/**
 *
 */
class Produto {

    private $id;
    private $nome;
    private $data;
    private $Hinicio;
    private $Hfim;
    private $justificativa;
    private $descricao;
    private $riscos;
    private $usado;
    private $cliente;
    private $ticket;
    private $nrticket;
    private $email;
    private $nivel;

// INICIO DO CONTROLE DOS CAMPOS

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getNome() {
        return $this->nome;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function getData() {
        return $this->data;
    }

    public function setdata($data) {
        $this->data = $data;
    }

    public function getHinicio() {
        return $this->hinicio;
    }

    public function setHinicio($hinicio) {
        $this->hinicio = $hinicio;
    }

    public function getHfim() {
        return $this->hfim;
    }

    public function setHfim($hfim) {
        $this->hfim = $hfim;
    }

    public function getJustificativa() {
        return $this->justificativa;
    }

    public function setJustificativa($justificativa) {
        $this->justificativa = $justificativa;
    }

        public function getDescricao() {
        return $this->descricao;
    }

    public function setDescricao($descricao) {
        $this->descricao = $descricao;
    }
    
    public function getriscos() {
        return $this->riscos;
    }

    public function setRiscos($riscos) {
        $this->riscos = $riscos;
    }
    
    public function getUsado() {
        return $this->usado;
    }

    public function setUsado($usado) {
        $this->usado = $usado;
    }
    
    public function getCliente() {
        return $this->cliente;
    }

    public function setCliente($cliente) {
        $this->cliente = $cliente;
    }
    
    public function getTicket() {
        return $this->ticket;
    }

    public function setTicket($ticket) {
        $this->ticket = $ticket;
    }
    
    public function getNrticket() {
        return $this->nrticket;
    }

    public function setNrticket($nrticket) {
        $this->nrticket = $nrticket;
    }
    
    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function getNivel() {
        return $this->nivel;
    }

    public function setNivel($nivel) {
        $this->nivel = $nivel;
    }

// FIM CONTROLE DOS CAMPOS

    public function precoComDesconto ($valor) {
      if ($valor > 0 && $valor <= 0.5) {
        $this->preco -= $this->preco * $valor;
      }
      return $this->preco;
    }

}
?>
